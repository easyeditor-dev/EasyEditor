/**
 * Created by Taehwan Kim<maxtortime@gmail.com> on 2015-12-15.
 */
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



var modes = {
    "C":"c_cpp",
    "C++":"c_cpp",
    "C#":"csharp",
    "CSS":"css",
    "Java":"java",
    "JavaScript":"javascript",
    "JSON":"json",
    "HTML":"html",
    "MakeFile":"makefile",
    "MarkDown":"markdown",
    "MySQL":"mysql",
    "PHP":"php",
    "Python":"python",
    "Plain Text":"plain_text"
};




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

var editor = ace.edit("editor"); // ace editor 초기화

editor.setFontSize(15); // 기본 폰트 사이즈 설정

var curLang = getCookie("lang"); // 쿠키에서 언어 코드 얻어옴

if (curLang.length == 0) {
    curLang = "C";

}

// 처음 열었을 때 쿠키에서 데이터를 받아와 예전에 편집한 코드를 불러준다.
var code = decodeURIComponent(getCookie("code")); // 쿠키에서 데이터 받아옴
$("#lang").val(modes[curLang]); // 언어 선택을 바꿈(태그 값 교체)
editor.getSession().setMode("ace/mode/"+modes[curLang]); // 쿠키의 코드 언어로 현재 모드 변경


$("#size").val(editor.getFontSize()); // 현재 폰트 사이즈로


var filename  = ""; // 파일 이름 초기화

editor.setTheme("ace/theme/"+$("#theme").val()); // 현재 테마 설정

editor.setOptions({
    maxLines: Infinity,
    fontSize: parseInt($("#size").val()),

});

// 아직 저장을 한 번도 안 했으면 C Hello World 삽입
if (code.length == 0) {
    editor.setValue(helloWorlds["C"]);
}
else {
    editor.setValue(code);
}

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

function setCookie(cname1, cvalue1, cname2, cvalue2, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();

    document.cookie = cname1 + "=" + cvalue1 + "; "+ cname2 + "="
        + cvalue2 + "; " + expires;
}

// 언어를 선택할 때마다 syntax 하이라이팅을 바꿔주기 위해서
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
        var $lang = $("#lang option:selected");

        var ext =  $lang.text();
        var lang = $lang.val();

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
        editor.setTheme("ace/theme/"+$("#theme").val());

    })
});


// 쿠키를 이용하여 쉽게 코드를 저장하고 불러올 수 있음.
// 쿠키에 있어야 할 정보 1, 언어 2. 작성일
$("#save").click(function() {
    var d = new Date();
    d.setTime(d.getTime() + (10*24*60*60*1000));
    var expires = d.toUTCString();

    var codeEncoded = encodeURIComponent(editor.getValue());

    document.cookie = "code=" + codeEncoded + "; " + "lang=" +
        $("#lang option:selected").text() +";";

    document.cookie =  "lang=" + $("#lang option:selected").text() +";";

    $.post($SCRIPT_ROOT + '/_code_to_file',
        {
            code: editor.getValue(),
            filename: filename
        }
    ).done(function(name) {
        // 새로 다운로드 링크 만들기
        var downLinkHTML = "<br><a href='#'>파일 이름을 입력하세요</a>";

        if (name != "ERROR" ) {
            downLinkHTML = "<br><a download id='down' href='/static/UserFile/" + name + "'>"
            + name +" 다운로드 하기</a>";
        }

        $("#container").append(downLinkHTML);

    });
});

$("#delete").click(function() { //삭제하기
    $.post($SCRIPT_ROOT + '/_delete',
        {
            filename: filename
        }
    ).done(function(name) {
        // 새로 다운로드 링크 만들기
        var deleteLinkHTML = "<br><a href='#'>파일 이름을 입력하세요</a>";

        if (name != "ERROR" ) {
            deleteLinkHTML = "<br><p>" + name +"이 삭제되었습니다.</p>";
        }

        $("#container").append(deleteLinkHTML);

    });
});

$("#load").click(function(){
    console.log($("#filename").text)
    $.post($SCRIPT_ROOT + '/_load',
        {
            filename: $("#filename").text
        }
    ).done(function(code){
        editor.setValue(code);
    })
})

// 목록으로부터 파일 불러오기
$(".load").click(function(){
    console.log(this.text);
    $.post($SCRIPT_ROOT + '/_load',
        {
            filename: this.text
        }
    ).done(function(code){
        editor.setValue(code);
    })
})


