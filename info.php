<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="쉽고 간단한 웹 에디터">
    <title>EasyEditor</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- For overriding -->
    <link rel="stylesheet" href="static/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js"
            id="dropboxjs" data-app-key="vzgw6i67spzm60b"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=$_SERVER['HTTP_REFERER']?>">EasyEditor - 201122037 김태환</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=$_SERVER['HTTP_REFERER']?>">편집기로 돌아가기</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="jumbotron">
        <h1>Easy Editor - 쉽고 간편한 웹 에디터</h1>
        <p>평소에 코딩은 해야 하는데 편집기를 설치하기 귀찮을 때 무척 유용합니다!</p>
    </div>
    <ul class="list-group">
        <li class="list-group-item">주요 프로그래밍 언어 문법 체크 및 하이라이팅(C,C++,HTML,PHP,Python,Javascript,Java ...)</li>
        <li class="list-group-item">코드를 저장하고 이전에 편집한 코드를 불러올 수 있음</li>
        <li class="list-group-item">모바일에서도 잘 동작함</li>
        <li class="list-group-item">글자 크기 조정 및 다양한 컬러 테마 적용 가능</li>
        <li class="list-group-item">개발언어: PHP, MySQL, JavaScript, HTML</li>
    </ul>
    <h2>사용한 라이브러리</h2>
    <div class="list-group">
        <a href="https://ace.c9.io/#nav=about" class="list-group-item">
        <h4 class="list-group-item-heading">1. ace code editor</h4>
        <p class="list-group-item-text">웹에서 작동하는 고성능의 편집기입니다. BSD LICENSE입니다.</p>
        </a>
        <a href="http://getbootstrap.com/" class="list-group-item">
        <h4 class="list-group-item-heading">2. bootstrap</h4>
        <p class="list-group-item-text">가볍고 빠르게 모바일 친화적인 페이지를 만드는 데 유용합니다. MIT LICENSE입니다.</p>
        </a>
    </div>
   <h2>사용법</h2>
    <div class="panel panel-default">
        <div class="panel-heading">로그인</div>
        <div class="panel-body">
            가입하지 않으셨더라도 오른쪽 상단의 로그인 버튼을 누르시고 아이디와 비밀번호를 적으면 알아서 로그인됩니다.
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">로그아웃</h3>
        </div>
        <div class="panel-body">
            역시 오른쪽 상단의 로그아웃 버튼을 누르면 로그아웃 됩니다.
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">코드 저장하기</h3>
        </div>
        <div class="panel-body">
            로그인 하지 않은 상태라면 그냥 쿠키에 코드가 저장됩니다. 로그인했다면 서버에 코드를 저장했다는 기록이 남습니다. 코드를 저장 후 나오는 링크로
            코드를 다운로드 할 수 있습니다. 코드는 암호화되지 않으니 보안을 유지해야 하는 코드는 주의하세요.

        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">코드 불러오기</h3>
        </div>
        <div class="panel-body">
            로그인 하지 않은 상태라면 쿠키에서 코드를 불러옵니다. 로그인 했다면 현재까지 저장한 코드 및 언어가 나오고 그 중 하나를 골라서 불러올 수 있습니다. 해당 파일 이름을 눌러서 다운로드 할 수도 있습니다.
        </div>
    </div>

</div>
</body>
</html>