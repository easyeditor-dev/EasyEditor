<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EasyEditor</title>
    <link rel="stylesheet" href="static/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>
<h1>Easy Editor</h1>

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" id="lang_form">
    <label> 언어를 선택하세요
        <select name="lang" form="lang_form">
            <option value="c_cpp">C/C++</option>
            <option value="javascript">JS</option>
        </select>
    </label>
    <input name="code" style="display: none;">
    <input value="코드 저장하기" type="submit">
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


        $("#editor").change(function() {
            console.log("editor changed");
        	$("form input[name='code']").attr("value",editor.getValue());
        });
       
    });
</script>
</body>
</html>
