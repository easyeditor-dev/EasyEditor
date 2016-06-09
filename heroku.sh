#!/bin/bash
# user directory make
mkdir ./static/UserFile/
gunicorn app:easy_editor --log-file=-
