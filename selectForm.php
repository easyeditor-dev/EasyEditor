<?php
/**
 * Created by PhpStorm.
 * User: maxto
 * Date: 2015-12-18
 * Time: 오전 11:20
 */

$conn =  new mysqli("webauthoring.ajou.ac.kr","wa15f","1","WEB_APP_2015F");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM easyeditor_codes WHERE user_id = '$id'");

    if ($result->num_rows>0) {
        $form = "<form id='selForm'>";

        while($row=$result->fetch_assoc()) {
            $form.="<label>언어: ".$row["lang"]."</label>";
            $form.="<input style='margin-left: 20px;' type='radio' name='src' value='".$row["src"]."'><a download href='".$row["src"]."'>".explode("/UserFile/",$row["src"])[1]." 다운로드 하기</a></input><br>";
        }

        $form.= "<input type='button' class=\"btn btn-default\" id='loadCode' value='코드 불러오기'></form>";
        $form.="<script>
            $(\"#loadCode\").click(function() {
            $.get(\"fileToCode.php\",
                {
                    src:$(\"input[name=src]:checked\", \"#selForm\").val()
                }
            ).done(function(data) {
                $(\"#selForm\").remove();

                var res = data.split(\"<+>\");

                console.log(res[1]);


                var modes = {
                    \"c\":\"c_cpp\",
                    \"cpp\":\"c_cpp\",
                    \"cs\":\"csharp\",
                    \"css\":\"css\",
                    \"java\":\"java\",
                    \"js\":\"javascript\",
                    \"json\":\"json\",
                    \"html\":\"html\",
                    \"MakeFile\":\"makefile\",
                    \"md\":\"markdown\",
                    \"sql\":\"mysql\",
                    \"php\":\"php\",
                    \"py\":\"python\",
                    \"txt\":\"plain_text\"
                };

                $(\"#lang\").val(modes[res[1]]); // 언어 선택을 바꿈(태그 값 교체)
                editor.getSession().setMode(\"ace/mode/\"+modes[res[1]]); // 쿠키의 코드 언어로 현재 모드 변경

                editor.setValue(res[0]);

            });
        });</script>";

        echo $form;
    }
    else {
        echo "0 results";
    }

    $conn->close();
}