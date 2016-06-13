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

## 사용법

## Contributing
```sh
$ heroku login
$ heroku git:clone -a easyeditor
$ cd easyeditor
$ heroku local
```
로컬에서 flask 웹서버가 동작하면서 에디터가 보입니다.

* .bowerrc : Bower 가 Javscript 라이브러리를 설치하는 디렉토리
* .buildpacks : 이 프로젝트에서 사용하는 heroku buildpack들 목록
* app.json : Heroku 가 인식하는 앱 description 파일
* bower.json : Bower 설정 파일
* config.py : Flask 를 구동하기 위한 설정 파일
* easyeditor.py : 핵심 파일 (코드 주석 읽기
* heroku.sh : heroku 배포를 위한 shell script
* package.json : npm 설정 파일
* Procfile : heroku repo push 시에 이 파일이 먼저 실행되면서 빌드를 시작한다
* manage.py : Database 관련 설정 파일이지만 heroku 를 쓰게 되면서 지금은 필요없음
* requirements.txt : 이 프로젝트에서 필요한 파이선 패키지 목록
* runtime.txt : heroku 에게 어떤 파이썬 버전을 쓰는 지 알려줌

```sh
# 로컬에서 테스트시
$ heroku local
# 배포하려고 할 때
$ git push heroku master
```
