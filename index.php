<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="쉽고 간단한 웹 에디터">
    <title>EasyEditor</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.min.js"></script>
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
                <a class="navbar-brand" href="/">Easy Editor</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a id="save" href="#" >저장</a></li>
                    <li><a id="load" href="#">불러오기</a></li>

                </ul>
                <form class="navbar-form navbar-left" role="option">
                    <div class="form-group">
                        <input id="filename" type="text" class="form-control" placeholder="파일 이름을 입력하세요">
                        <input type="number" id="size" name="fontSize" class="form-control" placeholder="글꼴 크기">
                        <select id="lang" name="lang" form="lang_form" class="form-control">
                            <option value="c_cpp">C</option>
                            <option value="c_cpp">C++</option>
                            <option value="csharp">C#</option>
                            <option value="css">CSS</option>
                            <option value="java">Java</option>
                            <option value="javascript">JavaScript</option>
                            <option value="json">JSON</option>
                            <option value="html">HTML</option>
                            <option value="makefile">MakeFile</option>
                            <option value="markdown">MarkDown</option>
                            <option value="mysql">MySQL</option>
                            <option value="php">PHP</option>
                            <option value="python">Python</option>
                            <option value="mysql">MySQL</option>
                            <option value="plain_text">Plain Text</option>
                        </select>
                        <select id="theme" name="theme" form="lang_form" class="form-control">
                            <option value="ambiance">ambiance</option>
                            <option value="chaos">chaos</option>
                            <option value="chrome">chrome</option>
                            <option value="clouds">clouds</option>
                            <option value="clouds_midnight">clouds_midnight</option>
                            <option value="cobalt">cobalt</option>
                            <option value="crimson_editor">crimson_editor</option>
                            <option value="dawn">dawn</option>
                            <option value="dreamweaver">dreamweaver</option>
                            <option value="eclipse">eclipse</option>
                            <option value="github">github</option>
                            <option value="idle_fingers">idle_fingers</option>
                            <option value="iplastic">iplastic</option>
                            <option value="katzenmilch">katzenmilch</option>
                            <option value="kr_theme">kr_theme</option>
                            <option value="kuroir">kuroir</option>
                            <option value="merbivore">merbivore</option>
                            <option value="merbivore_soft">merbivore_soft</option>
                            <option value="mono_industrial">mono_industrial</option>
                            <option value="monokai">monokai</option>
                            <option value="pastel_on_dark">pastel_on_dark</option>
                            <option value="solarized_dark">solarized_dark</option>
                            <option value="solarized_light">solarized_light</option>
                            <option value="sqlserver">sqlserver</option>
                            <option value="terminal">terminal</option>
                            <option value="textmate">textmate</option>
                            <option value="tomorrow">tomorrow</option>
                            <option value="tomorrow_night">tomorrow_night</option>
                            <option value="tomorrow_night_blue">tomorrow_night_blue</option>
                            <option value="tomorrow_night_bright">tomorrow_night_bright</option>
                            <option value="tomorrow_night_eighties">tomorrow_night_eighties</option>
                            <option value="twilight">twilight</option>
                            <option value="vibrant_link">vibrant_link</option>
                            <option value="xcode">xcode</option>
                        </select>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="info.php">정보</a></li>
                    <li><a href="#">Dropbox로 로그인</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div id="editor"></div>
    <br>
    <div id="container"></div>
    <script src="static/javascript/src/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="static/javascript/main.js" type="text/javascript" charset="utf-8"></script>
</div>
</body>
</html>
