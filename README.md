# Easyeditor
[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy?template=https://github.com/maxtortime/EasyEditor)
[![Build Status](https://travis-ci.org/maxtortime/EasyEditor.svg?branch=master)](https://travis-ci.org/maxtortime/EasyEditor)
[![Coverage Status](https://coveralls.io/repos/github/maxtortime/EasyEditor/badge.svg)](https://coveralls.io/github/maxtortime/EasyEditor)

[Just do it!](http://easyeditor.herokuapp.com)

[Korean translation](https://github.com/maxtortime/EasyEditor/wiki/Korean-README)

This is easy and simple web editor.
This is useful if it is bothersome to install the editor to coded as usual.

## Major function
* Major programming language syntax highlighting
* Code saving
* Load saved code
* Operate in mobile
* Change font size in editor
* Apply various color theme
* Can compile C codes.

## For Development
```sh
$ git clone https://github.com/maxtortime/EasyEditor.git
# Install python3, pip, virtualenv, bower
$ virtualenv -p $(which python3) venv
$ . venv/bin/activate
(venv) $ pip install -r requirements.txt
$ bower install
$ python3 easyeditor.py
```

### Translation
Basic language is Korean. Please wrap Korean words by `_(한국어 문장)` in HTML.
Python example is following.
```python
gettext(u'A simple string')
gettext(u'Value: %(value)s', value=42)
ngettext(u'%(num)s Apple', u'%(num)s Apples', number_of_apples)
```
After wrapping Korean words, Please invoke following commands.
```sh
$ pybabel extract -F babel.cfg -o messages.pot .
$ pybabel init -i messages.pot -d translations -l 'iso lang code ex) en,ja'
# Translate messages.po file at translations directory.
# Automatically running at deployment
$ pybabel compile -d translations 
```
