#!/bin/bash
python db.py create_db
python db.py db init
python db.py db migrate
python db.py db upgrade
gunicorn app:easy_editor
