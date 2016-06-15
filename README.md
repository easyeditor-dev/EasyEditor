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
### 회원가입

1. '로그인' 버튼을 누른다.
2. Menu의 'Register' 클릭한다.
3. 'Email Address'란에 사용할 이메일 주소를 입력 한다.
4. 'Password'란에 비밀번호를 입력한다. (6자 이상)
5. 'Retype Password'란에 비밀번호를 다시 입력한다.

### 로그인
1. '로그인' 버튼을 누른다.
2. 'Email Address'란에 자신의 메일 주소를 입력한다.
3. 'Password'란에 비밀번호를 입력한다.
4. 만약 자동 로그인을 하고 싶다면 'Remember Me'를 체크한다.
5. '로그인' 버튼을 누른다.

### 저장
1. 로그인을 한다.
2. 소스 코드를 수정한다.
3. '파일 이름을 입력하세요'란에 원하는 파일명을 입력한다.
4. '저장' 버튼을 클릭한다.

### 불러오기
#### 파일 이름 입력해서 불러오기
1. 로그인을 한다.
2. '파일 이름을 입력하세요'란에 불러올 파일명을 입력한다.
3. '불러오기' 버튼을 클릭한다.

#### 목록에서 불러오기
1. 로그인을 한다.
2. 목록 보기.
3. 목록의 파일을 클릭한다.

### 삭제
1. 로그인을한다.
2. '파일 이름을 입력하세요'란에 삭제할 파일명을 입력한다.
3. '삭제' 버튼을 클릭한다.

### 목록 보기
1. 로그인을 한다.
2. '목록' 버튼을 클릭한다.

## 개발 하기
1. 이 프로젝트 clone 하기
2. Python 3.5 설치
3. virtualenv 만든 후 pip install -r requirements.txt 실행해서 종속 패키지 설치
4. npm install -g bower
5. bower install
6. python easyeditor.py

This is easy and simple web editor.
This is useful if it is bothersome to install the editor to coded as usual.

## Major function
* Major programming language syntax highlighting
* Code saving
* Load saved code
* Operate in mobile
* Change font size in editor
* Apply various color theme

##Manual
### Register
1. Click the 'Login' button.
2. Click the 'Register' in the menu.
3. Input your email address to register in the 'Email address' text field. (More than 6 characters)
4. Input your paassword to register in the 'Password' text field.
5. Input your password in the 'Retype Password' text field again.

### Login
1. Click the 'Login' button.
2. Input your email address in the 'Email address' text field.
3. Input your password in the 'Password' text field.
4. If you want to login automatically in the page, check the 'Remember Me'.
5. Click the 'Login' button.

### Save
1. Login.
2. Edit the source code.
3. Input a file name in the 'File name' text field.
4. Click the 'Save' button.

### Load
#### Input file name
1. Login.
2. Input a file name in the 'File name' text field.
3. Click the 'Load' button.

#### browse file list
1. Login.
2. Show list.
3. Click the file in the list.

### Delete
1. Login.
2. Input a file name in the 'File name' text field.
3. Click the 'Delete' button.

### Show list
1. Login.
2. Click the 'List' button.

## Develop
1. Clone this project.
2. Install Python 3.5
3. Create virtualenv, then run 'pip install -r requirements.txt' to install the dependent packages.
4. npm install -g bower
5. bower install
6. python easyeditor.py
