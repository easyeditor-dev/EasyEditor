import sys
from os import mkdir
from os.path import isdir

from flask import Flask, url_for
from flask import render_template, request, redirect
from flask_security import RoleMixin, UserMixin, SQLAlchemyUserDatastore, Security
from flask_sqlalchemy import SQLAlchemy

easy_editor = Flask(__name__)
easy_editor.config.from_object('config')

# Define the DB
db = SQLAlchemy(easy_editor)

# Define models
roles_users = db.Table('roles_users',
        db.Column('user_id', db.Integer(), db.ForeignKey('user.id')),
        db.Column('role_id', db.Integer(), db.ForeignKey('role.id')))


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

# Setup Flask-Security
user_datastore = SQLAlchemyUserDatastore(db, User, Role)
security = Security(easy_editor, user_datastore)

USER_FILE_DIR_PATH = './static/UserFile/'

@easy_editor.route('/')
def index():
    return render_template('index.html', files = [])

@easy_editor.route('/_code_to_file', methods=['POST']) #저장하기 눌렀을때.
def code_to_file():
    filename = request.form['filename']
    print(filename)
    code = request.form['code']

    with open(USER_FILE_DIR_PATH + filename, 'w') as f:
        f.write(code)

    return filename

# 목록 보여주기
@easy_editor.route('/_list', methods=['GET'])
def list():
    files = ['RecordMaker.java', 'control.c','hello.py', 'hi.cpp', 'index.js']
    for i in files:
        print(i)
    return render_template('index.html', files = files)


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
        easy_editor.run(host="0.0.0.0", port=int(80),threaded=True)
