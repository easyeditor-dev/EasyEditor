import os

DEBUG = True
BABEL_DEFAULT_LOCALE = 'ko'
USER_FILE_DIR_PATH = os.path.join('static', 'UserFile')

LANGUAGES = {
    'ko': 'Korean',
    'en': 'English',
    'ja': 'Japanese'
}

# Enable protection agains *Cross-site Request Forgery (CSRF)*
WTF_CSRF_ENABLED = True
CSRF_ENABLED = True
CSRF_SESSION_KEY = "5587fa76fb736bd9fe38271a5d0fca38"

# Database
SQLALCHEMY_DATABASE_URI = os.environ["DATABASE_URL"]
SQLALCHEMY_TRACK_MODIFICATIONS = True
SECRET_KEY = 'super-secret'


# Application threads. A common general assumption is
# using 2 per available processor cores - to handle
# incoming requests using one and performing background
# operations using the other.

THREADS_PER_PAGE = 2

SECURITY_REGISTERABLE = True
SECURITY_CONFIRMABLE = False

# 회원가입 인증 메일 보내기 기능 켜기/끄기
SECURITY_SEND_REGISTER_EMAIL = False
SECURITY_PASSWORD_HASH = 'bcrypt'  # 비밀번호 암호화 Hash algorithm  설정
SECURITY_PASSWORD_SALT = os.environ["SECURITY_PASSWORD_SALT"]
SECURITY_RECOVERABLE = True  # 비밀번호 초기화 기능 켜기/끄기
SECURITY_CHANGEABLE = True  # 비밀번호 바꾸기 기능 켜기/끄기
