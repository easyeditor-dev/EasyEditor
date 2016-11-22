#!/bin/bash
DIR="./static/UserFile/"
if [ ! -d $DIR ]; then
    # Control will enter here if dir_name exists.
    mkdir $DIR # Making user's directory make
fi
pybabel compile -d translations/
gunicorn easyeditor:easy_editor --log-file=-