/**
 * Created by maxto on 2015-12-15.
 */
var editor = ace.edit("editor"); // ace editor 초기화

var curLang = getCookie("lang");

// 청므 열었을 떄 쿠키에서 데이터를 받아와 예전에 편집한 코드를 불러준다.
var code = decodeURIComponent(getCookie("code")); // 쿠키에서 데이터 받아옴
editor.getSession().setMode("ace/mode/"+curLang);
$("#lang option:selected").html(curLang);
var filename  = "";

var exts = {
    "C":"c",
    "C++":"cpp",
    "C#":"cs",
    "CSS":"css",
    "Java":"java",
    "JavaScript":"js",
    "JSON":"json",
    "HTML":"html",
    "MakeFile":"make",
    "MarkDown":"md",
    "MySQL":"sql",
    "PHP":"php",
    "Python":"py",
    "Plain Text":"txt"
}; // 대응되는 파일 확장자 목록

var helloWorlds = {
    "C":'#include <stdio.h>\nint main()\n{\n\tprintf("Hello World");\n\treturn 0;\n}',
    "C++":"#include <iostream.h>\nmain()\n{\n\tcout << 'Hello World' << endl;\n\treturn 0;\n}",
    "C#":"class HelloWorld {\n\tstatic void Main() {\n\t System.console.writeLine('Hello World!');\n\t}\n}",
    "CSS":"body:before {\n\tcontent:'Hello World';\n}",
    "Java":"class HelloWorld {\n\tstatic public void main(string args[]) {\n\t System.out.println('Hello World!');\n\t}\n}",
    "JavaScript":"console.log('Hello World')",
    "JSON":"{'hello':'Hello World'}",
    "HTML":"<HTML>\n<!-- Hello World in HTML -->\n<HEAD>\n<TITLE>Hello World!</TITLE>\n</HEAD>\n" +
    "<BODY>\nHello World!\n</BODY>\n</HTML>",
    "MakeFile":"all:\n\t@echo 'Hello World'",
    "MarkDown":"#Hello World",
    "MySQL": "-- Hello world in MySQL FUNCTION\n\nDELIMITER $$\n" +
    "CREATE FUNCTION hello_world() RETURNS TEXT COMMENT 'Hello World'\n" +
    "BEGIN\n" +
    "\tRETURN 'Hello World';\n" +
    "END;\n" +
    "$$\n" +
    "DELIMITER ;\n\n" +
    "SELECT hello_world();",
    "PHP":"<?php echo 'Hello World!'; ?>",
    "Python":"print('Hello World')",
    "Plain Text":"Hello World!"
}; // 코드를 바꿔주기 위해 Hello World 목록

var options =  {
    files: [
        // You can specify up to 100 files.
        {'url': 'http://localhost/EasyEditor/foo.js', 'filename': 'foo.js'}
        // ...
    ],

    // Success is called once all files have been successfully added to the user's
    // Dropbox, although they may not have synced to the user's devices yet.
    success: function () {
        // Indicate to the user that the files have been saved.
        alert("Success! Files saved to your Dropbox.");
    },

    // Progress is called periodically to update the application on the progress
    // of the user's downloads. The value passed to this callback is a float
    // between 0 and 1. The progress callback is guaranteed to be called at least
    // once with the value 1.
    progress: function (progress) {},

    // Cancel is called if the user presses the Cancel button or closes the Saver.
    cancel: function () {},

    // Error is called in the event of an unexpected response from the server
    // hosting the files, such as not being able to find a file. This callback is
    // also called if there is an error on Dropbox or if the user is over quota.
    error: function (errorMessage) {
        alert(errorMessage);
    }
};

editor.setTheme("ace/theme/"+$("#theme").val());
editor.$blockScrolling = Infinity;

editor.setOptions({
    maxLines: Infinity,
    fontSize: parseInt($("#size").val())
});

// 아직 저장을 한 번도 안 했으면 C Hello World 삽입
if (code.length == 0) {
    editor.setValue(helloWorlds["C"]);
}
else {
    editor.setValue(code);
}

editor.getSession().setMode("ace/mode/"+$("select").val());

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

// 언어를 선택할 떄마다 syntax 하이라이팅을 바꿔주기 위해서
$(document).ready(function(){

    function fileNameInit(ext) {
        if(ext == "MakeFile") {
            filename = "MakeFile"; //  Makefile 은 확장자가 없어서 따로 처리함
        }
        else {
            filename= $("#filename").val()+"."+exts[ext];
            // 나머지는 입력한 file 이름.확장자로 파일이름 결정
        }
    }

    $("#theme").change(function() {
        // theme 값이 바뀔 떄마다 테마 변경
        editor.setTheme("ace/theme/"+$("#theme").val());
    });

    $("#lang").change(function() {
        var ext =  $("#lang option:selected").text();
        var lang = $("#lang option:selected").val();

        fileNameInit(ext);

        // 에디터 내용 초기화
        editor.getSession().setMode("ace/mode/"+lang);
        editor.setValue(helloWorlds[ext]);
    });

    $("#filename").change(function() {
        var ext =  $("#lang option:selected").text();

        fileNameInit(ext);
    });

    $("#size").change(function () {
        editor.setFontSize(parseInt($("#size").val()));

        if (editor.getFontSize() >=34) {
            $("#editor").css({"width":"730px", "height":"600px"});
        }
        else {
            $("#editor").css({"width":"530px", "height":"200px"});
        }

    })
});

// 쿠키를 이용하여 쉽게 코드를 저장하고 불러올 수 있음.
// 쿠키에 있어야 할 정보 1, 언어 2. 작성일
$("#save").click(function() {
    setCookie("code",encodeURIComponent(editor.getValue()),10);
    setCookie("lang",$("#lang option:selected").text(),10);

    $.post("codeToFile.php",
        {
            lang: $("select").val(),
            code: editor.getValue(),
            filename: filename
        }
    ).done(function(name) {
        alert("Data: "+name);

        //$("#down").remove(); // 이전에 있었던 다운로드 링크 삭제

        // 새로 다운로드 링크 만들기
        var downLinkHTML = "<br><a id='down' href='UserFile/" + name + "'>"
            + name +" 다운로드 하기</a>";

        $("#container").append(downLinkHTML);
    });
});

// 불러오기 누르면 쿠키에서 코드를 꺼내서 에디터에 삽입함
$("#load").click(function() {
    var code = decodeURIComponent(getCookie("code"));
    var lang = getCookie("lang");

    editor.getSession().setMode("ace/mode/"+lang);
    $("#lang option:selected").html(lang);
    editor.setValue(code);

});

// 드랍박스 버튼 만들기
var button = Dropbox.createSaveButton(options);
document.getElementById("container").appendChild(button);
