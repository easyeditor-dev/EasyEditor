import sys
from os import mkdir
from os.path import isdir

from flask import render_template, request

from __init__ import easy_editor

USER_FILE_DIR_PATH = './static/UserFile/'

@easy_editor.route('/')
def index():
    return render_template('index.html')

@easy_editor.route('/_code_to_file', methods=['POST'])
def code_to_file():
    filename = request.form['filename']
    print(filename)
    code = request.form['code']

    with open(USER_FILE_DIR_PATH + filename, 'w') as f:
        f.write(code)

    return filename

if __name__ == "__main__":
    if not isdir(USER_FILE_DIR_PATH):
        mkdir(USER_FILE_DIR_PATH)

    try:
        mode = sys.argv[1]
    except IndexError:
        mode = "develop"

    if mode == "develop":
        easy_editor.run(threaded=True)
    elif mode == "deploy":
        easy_editor.config.update(DEBUG=False)
        easy_editor.run(host="0.0.0.0", port=int(80),threaded=True)