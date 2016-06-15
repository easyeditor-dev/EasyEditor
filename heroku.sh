#!/bin/bash
mkdir ./static/UserFile/ # Making user's directory make
pybabel compile -d translations/
gunicorn easyeditor:easy_editor --log-file=- # run by gunicorn
