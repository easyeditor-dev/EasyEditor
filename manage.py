import sqlite3

from flask_migrate import Migrate, MigrateCommand
from flask_script import Manager
from config import SQLALCHEMY_DATABASE_URI
from easyeditor import easy_editor, db

migrate = Migrate(easy_editor, db)

manager = Manager(easy_editor)
manager.add_command('db', MigrateCommand)

# local sqlite db를 만듬
@manager.command
def create_db():
    conn = sqlite3.connect('easyeditor.db')
    if conn:
        print("easyeditor.db created successfully")
    else:
        print("Creating easyeditor.db failed")

if __name__ == '__main__':
    manager.run()
