/**
 * Created by maxto on 2016-11-23.
 */
// 쿠키를 이용하여 쉽게 코드를 저장하고 불러올 수 있음.
// 쿠키에 있어야 할 정보 1, 언어 2. 작성일
$("#save").click(function () {
    var d = new Date();
    d.setTime(d.getTime() + (10 * 24 * 60 * 60 * 1000));
    var expires = d.toUTCString();

    var codeEncoded = encodeURIComponent(editor.getValue());

    document.cookie = "code=" + codeEncoded + "; " + "lang=" +
        $("#lang option:selected").text() + ";";

    document.cookie = "lang=" + $("#lang option:selected").text() + ";";

    $.post($SCRIPT_ROOT + '/_code_to_file',
        {
            code: editor.getValue(),
            filename: filename
        }
    ).done(function (name) {
        // 새로 다운로드 링크 만들기
        var downLinkHTML = "<br><a href='#'>{{ _('파일 이름을 입력하세요') }}</a>";

        if (name != "ERROR") {
            downLinkHTML = "<br><a download id='down' href='/static/UserFile/" + name + "'>"
                + name + " {{ _('다운로드 하기') }}</a>";
        }

        $("#container").append(downLinkHTML);

    });
});

$("#delete").click(function () { //삭제하기
    $.post($SCRIPT_ROOT + '/_delete',
        {
            filename: filename
        }
    ).done(function (name) {
        // 새로 다운로드 링크 만들기
        var deleteLinkHTML = "<br><a href='#'>{{ _('파일 이름을 입력하세요') }}</a>";

        if (name != "ERROR") {
            deleteLinkHTML = "<br><p>" + name + " " + "{{ _('이 삭제되었습니다') }}</p>";
        }

        $("#container").append(deleteLinkHTML);

    });
});