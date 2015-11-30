<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Test</title>
    
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="static/css/style.css">
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
=======
    <title>EasyEditor</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
>>>>>>> origin/master
</head>
<body>
<h1>Easy Editor</h1>

<<<<<<< HEAD
<form action="export_code.php" method="post" id="lang_form">
=======
<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" id="lang_form">
>>>>>>> origin/master
    <label> 언어를 선택하세요
        <select name="lang" form="lang_form">
            <option value="c_cpp">C/C++</option>
            <option value="javascript">JS</option>
        </select>
    </label>
<<<<<<< HEAD
=======
    <input name="code" style="display: none;">
>>>>>>> origin/master
    <input value="코드 저장하기" type="submit">
</form>

<div id="editor"></div>
<<<<<<< HEAD
=======
<p>
<?php 
if($_SERVER["REQUEST_METHOD"]=="POST") {
    echo $_POST["lang"].$_POST["code"];
}

?>
</p>
>>>>>>> origin/master

<script src="static/javascript/src/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
<<<<<<< HEAD
    editor.setValue("#include <stdio.h>\nint main()\n{\nprintf('Hello World'); return 0; } ");
=======
    editor.setValue("#include <stdio.h>\n\nint main()\n{\n\tprintf('Hello World');\n\treturn 0;\n} ");
>>>>>>> origin/master
    editor.getSession().setMode("ace/mode/"+$("select").val());

    $(document).ready(function(){
        $("select").change(function() {
            editor.getSession().setMode("ace/mode/"+$("select").val());
        });
<<<<<<< HEAD
       
    });
</script>

=======


        $("#editor").change(function() {
            console.log("editor changed");
        	$("form input[name='code']").attr("value",editor.getValue());
        });
       
    });
</script>
>>>>>>> origin/master
</body>
</html>
