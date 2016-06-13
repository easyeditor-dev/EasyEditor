#!/bin/bash
mkdir ./static/UserFile/ # Making user's directory make
gunicorn easyeditor:easy_editor --log-file=- # run by gunicorn
