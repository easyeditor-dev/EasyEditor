#!/bin/bash
# user directory make
mkdir ./static/UserFile/
gunicorn easyeditor:easy_editor --log-file=-
