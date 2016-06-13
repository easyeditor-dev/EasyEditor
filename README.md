# [Easyeditor](http://easyeditor.herokuapp.com)

[![Deploy](https://www.herokucdn.com/deploy/button.svg)]
(https://heroku.com/deploy?template=https://github.com/maxtortime/EasyEditor)

쉽고 간편한 Web 코드 에디터입니다.
평소에 코딩은 해야 하는데 에디터를 설치하기 귀찮다면 유용합니다.

## 주요 기능
* 주요 프로그래밍 언어 문법 하이라이팅
* 코드 저장 기능
* 저장한 코드 불러오기 (개발 중)
* 모바일에서 동작
* 에디터 글자 크기 조정
* 다양한 컬러 테마 적용 가능

## flask-babel 사용법
1. flask-babel 설치 (requirements.txt 에 있음)
> $ pip install flask-babel
2. Python 코드에서는 gettext , html 에서는 > {{ _('문자열') }} 을 써서 번역할 단어 표시
3. 아래 명령어를 사용하면 아까 표시한 단어들이 messages.pot 에 표시됨
> $ pybabel extract -F babel.cfg -o messages.pot .
4. 아래 명령어를 사용하면 새로운 언어를 번역할 수 있음
> $ pybabel init -i messages.pot -d translations -l '[iso 언어코드(ko,en 등)](http://www.mcanerin.com/en/articles/meta-language.asp)'
5. 위 명령어 실행 후 translations/언어코드/LC_MESSAGES/messages.po 이 생기는데 적절히 번역기를 돌리든 본인의 뛰어난 어학 실력을
동원하든 해서 대응하는 단어를 번역하면 됨. ([Poedit](https://poedit.net/) 라는 프로그램 추천)
6. 번역 후 아래 명령어를 실행시켜 mo 파일을 만든다
> pybabel compile -d translations
7. 자세한 건 https://pythonhosted.org/Flask-Babel/ 에 다 나옴

* 새로운 언어를 추가했다면 config.py 의 LANGUAGES 변수에 대응하는 언어와 코드를 넣어줄 것
* 잘 됬나 테스트 시 이 [크롬 확장 프로그램](https://chrome.google.com/webstore/detail/quick-language-switcher/pmjbhfmaphnpbehdanbjphdcniaelfie) 추천 (locale 을 바꿔줌)

 
