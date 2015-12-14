<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
      <a class="navbar-brand" href="#">EasyEditor</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a id="save" href="#" >저장</a></li>
        <li><a id="load" href="#">불러오기</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">정보</a></li>
        <li><a href="#">Dropbox로 로그인</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" id="lang_form">
    <label> 언어를 선택하세요
        <select name="lang" form="lang_form">
            <option value="c_cpp">C/C++</option>
            <option value="javascript">JS</option>
        </select>
    </label>
</form>

<div id="editor"></div>
<p>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST") {
    echo $_POST["lang"].$_POST["code"];
}

?>
</p>

<script src="static/javascript/src/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.setValue("#include <stdio.h>\n\nint main()\n{\n\tprintf('Hello World');\n\treturn 0;\n} ");
    editor.getSession().setMode("ace/mode/"+$("select").val());

    $(document).ready(function(){
        $("select").change(function() {
            editor.getSession().setMode("ace/mode/"+$("select").val());
        });
    });


	// 쿠키를 이용하여 쉽게 코드를 저장하고 불러올 수 있음.
	// 쿠키에 있어야 할 정보 1, 언어 2. 작성일 
    $("#save").click(function() {
        document.cookie = encodeURIComponent(editor.getValue());
        });

    $("#load").click(function() {
        var code = decodeURIComponent(document.cookie);

        console.log(code);
        
		editor.setValue(code);
        });
</script>
</body>
</html>
