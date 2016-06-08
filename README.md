# [Easyeditor](http://easyeditor.herokuapp.com)

쉽고 간편한 Web 코드 에디터입니다.
평소에 코딩은 해야 하는데 에디터를 설치하기 귀찮다면 유용합니다.

## 주요 기능
* 주요 프로그래밍 언어 문법 하이라이팅
* 코드 저장 기능
* 저장한 코드 불러오기 (개발 중)
* 모바일에서 동작
* 에디터 글자 크기 조정
* 다양한 컬러 테마 적용 가능

## 사용법

## Contributing
```sh
$ git clone https://github.com/maxtortime/EasyEditor.git 
$ cd EasyEditor
$ pyvenv venv
$ . venv/bin/activate 
(venv) $ pip install -r requirements.txt
(venv) $ python db.py create_db
(venv) $ python db.py db init
(venv) $ python db.py db migrate
(venv) $ python db.py db upgrade
(venv) $ python app.py develop
```
로컬에서 flask 웹서버가 동작하면서 에디터가 보입니다.

