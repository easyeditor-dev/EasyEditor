from flask_migrate import Migrate, MigrateCommand
from flask_script import Manager
from app import app, db
from config import SQLALCHEMY_DATABASE_URI
import sqlite3

migrate = Migrate(app, db)

manager = Manager(app)
manager.add_command('db', MigrateCommand)

@manager.command
def create_db():
    conn = sqlite3.connect('easyeditor.db')
    if conn:
        print("easyeditor.db created successfully")
    else:
        print("Creating easyeditor.db failed")


if __name__ == '__main__':
    manager.run()