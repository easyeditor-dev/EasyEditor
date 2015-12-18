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
        $form = "<form id='selForm' action='fileToCode.php' method='get'>";

        while($row=$result->fetch_assoc()) {
            $form.="<label>언어: ".$row["lang"]."</label>";
            $form.="<input style='margin-left: 20px;' type='radio' name='src' value='".$row["src"]."'><a download href='".$row["src"]."'>".explode("/UserFile/",$row["src"])[1]." 다운로드 하기</a></input><br>";
        }

        $form.= "<input type='submit' value='코드 불러오기'></form>";

        echo $form;
    }
    else {
        echo "0 results";
    }

    $conn->close();
}