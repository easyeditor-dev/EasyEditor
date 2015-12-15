/**
 * Created by maxto on 2015-12-15.
 */
var editor = ace.edit("editor"); // ace editor 초기화

var code = decodeURIComponent(document.cookie); // 쿠키에서 데이터 받아옴
var filename  = "foo.js";

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

editor.setTheme("ace/theme/monokai"); // 테마 설정

if (code.length == 0) {
    editor.setValue("#include <stdio.h>");
}
else {
    editor.setValue(code);
}

editor.getSession().setMode("ace/mode/"+$("select").val());

// 언어를 선택할 떄마다 syntax 하이라이팅을 바꿔주기 위해서
$(document).ready(function(){
    $("select").change(function() {
        editor.getSession().setMode("ace/mode/"+$("select").val());
        filename= $("#filename").val()+"."+$("select option:selected").text();
    });

    $("#filename").change(function() {
        filename= $("#filename").val()+"."+$("select option:selected").text();

    });
});

// 쿠키를 이용하여 쉽게 코드를 저장하고 불러올 수 있음.
// 쿠키에 있어야 할 정보 1, 언어 2. 작성일
$("#save").click(function() {
    document.cookie = encodeURIComponent(editor.getValue());
    $("#code").attr("value",editor.getValue());

    $.post("codeToFile.php",
        {
            lang: $("select").val(),
            code: editor.getValue(),
            filename: filename
        }
    ).done(function(name) {
        alert("Data: "+name);

        var downLinkHTML = "<a href='http://localhost/EasyEditor/UserFile/" + name + "'>다운로드하기</a>";

        $("#container").append(downLinkHTML);
    });
});

$("#load").click(function() {
    var code = decodeURIComponent(document.cookie);
    editor.setValue(code);

});


var button = Dropbox.createSaveButton(options);
document.getElementById("container").appendChild(button);
