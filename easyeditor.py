import os
import subprocess
import sys
from os import mkdir
from os.path import isdir

from flask import Flask
from flask import render_template, request
from flask_babel import Babel
from flask_login import login_required, current_user
from flask_security import RoleMixin, UserMixin, SQLAlchemyUserDatastore, \
    Security
from flask_sqlalchemy import SQLAlchemy

from config import LANGUAGES

easy_editor = Flask(__name__)
easy_editor.config.from_object('config')

# for i18n
babel = Babel(easy_editor)

# Define the DB
db = SQLAlchemy(easy_editor)

# Define models
roles_users = db.Table('roles_users',
                       db.Column('user_id', db.Integer(),
                                 db.ForeignKey('user.id')),
                       db.Column('role_id', db.Integer(),
                                 db.ForeignKey('role.id')))


# Role table
class Role(db.Model, RoleMixin):
    id = db.Column(db.Integer(), primary_key=True)
    name = db.Column(db.String(80), unique=True)
    description = db.Column(db.String(255))


# User's table
class User(db.Model, UserMixin):
    id = db.Column(db.Integer, primary_key=True)
    email = db.Column(db.String(255), unique=True)
    password = db.Column(db.String(255))
    active = db.Column(db.Boolean())
    confirmed_at = db.Column(db.DateTime())
    roles = db.relationship('Role', secondary=roles_users,
                            backref=db.backref('users', lazy='dynamic'))


# file path table
class Path(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    user_id = db.Column(db.Integer, db.ForeignKey('user.id'))
    file_path = db.Column(db.String(255))

    def __init__(self, user_id, path):
        self.user_id = user_id
        self.file_path = path


# Setup Flask-Security
user_datastore = SQLAlchemyUserDatastore(db, User, Role)
security = Security(easy_editor, user_datastore)

USER_FILE_DIR_PATH = os.path.join(os.path.dirname(__file__), 'static',
                                  'UserFile')


@babel.localeselector
def get_locale():
    return request.accept_languages.best_match(LANGUAGES.keys())


@easy_editor.route('/')
def index():
    return render_template('index.html', files=[])


@login_required
@easy_editor.route('/_file_compile', methods=['POST'])
def file_compile():
    filename = request.form['filename']

    assert filename is not None

    if len(filename.split('.')[0]) == 0:
        return "ERROR"

    result = subprocess_open('gcc -S ' + USER_FILE_DIR_PATH + filename)

    if len(result[1]) == 0:
        return "Good"
    else:
        return result[1]


def subprocess_open(command):
    popen = subprocess.Popen(command,  stdout=subprocess.PIPE,
                             stderr=subprocess.PIPE, shell=True)
    (stdoutdata, stderrdata) = popen.communicate()
    return stdoutdata, stderrdata


@login_required
@easy_editor.route('/_code_to_file', methods=['POST'])
def code_to_file():
    filename = request.form['filename']

    if len(filename.split('.')[0]) == 0:
        return "ERROR"

    code = request.form['code']
    file_path = os.path.join(USER_FILE_DIR_PATH, filename)

    with open(file_path, 'w') as f:
        path_record = Path(user_id=User.query.filter_by(email=current_user.
                                                        email).one().id,
                           path=file_path)

        f.write(code)

    db.session.add(path_record)
    db.session.commit()

    return filename


# 목록 보여주기
@login_required
@easy_editor.route('/_file_list', methods=['GET'])
def file_list():
    return render_template('index.html',
                           files=[path.file_path[len(USER_FILE_DIR_PATH):]
                                  for path in Path.query.filter_by(
                                   user_id=User.query.filter_by(
                                       email=current_user.email).one().id).all(

                               )]
                           )


@login_required
@easy_editor.route('/_delete', methods=['POST'])
def delete():
    filename = request.form['filename']

    if len(filename.split('.')[0]) == 0:
        return "ERROR"

    file_path = USER_FILE_DIR_PATH + filename

    path_record = Path.query.filter_by(user_id=User.query
                                       .filter_by(email=current_user
                                                  .email).one().id,
                                       file_path=file_path).one()

    if not path_record:
        os.remove(file_path)

        db.session.delete(path_record)
        db.session.commit()
    else:
        return "ERROR"

    return filename


# 목록으로부터 파일 불러오기
@login_required
@easy_editor.route('/_load', methods=['POST', 'GET'])
def load():
    filename = request.form['filename']

    if len(filename.split('.')[0]) == 0:
        return "ERROR"

    file_path = os.path.join(USER_FILE_DIR_PATH, filename)
    with open(file_path, 'r') as f:
        code = f.read()
    return code


if __name__ == "__main__":
    if not isdir(USER_FILE_DIR_PATH):
        mkdir(USER_FILE_DIR_PATH)

    try:
        mode = sys.argv[1]
    except IndexError:
        mode = "develop"

    if mode == "develop":
        easy_editor.run(threaded=True, port=int(8080))
    elif mode == "deploy":
        easy_editor.config.update(DEBUG=False)
        easy_editor.run(host="0.0.0.0", port=int(80), threaded=True)
