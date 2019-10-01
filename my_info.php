<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pw = "mirim2";
    $dbName = "mirimsekki";
    $conn = new mysqli($host,$user,$pw,$dbName);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="yejin">
        <meta name="description" content="미림세끼 사이트">
        <meta name="keywords" content="미림,미림세끼, 급식">
        <meta name="generator" content="vscode">
        <title>미림세끼 회원가입</title>
        <link rel="stylesheet" href="css/php_my_info.css">
        <link rel="stylesheet" href="css/reset.css">
        <meta charset="UTF-8">
        <script src="js/signup.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <a href="index.html"><img src="img/logo.png"></a>
            </div>
            <div id="contents">
                <div class="signup">
                    <div class="signup_header">
                        <h1>회원가입</h1>
                        <hr>
                    </div>
                    <form method="post" action="signup.php" name="signup_form" id="signup_form" onsubmit="return checkAll()">
                        <table id="signup_table">
                            <tr>
                                <td class="td_text"><label for="name">이름</label></td>
                                <td colspan="3"><div id="name" class="input_text"><?echo $_SESSION['user_id'];?></div></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="uid">아이디</label></td>
                                <td colspan="3"><div id="uid" class="input_text"></td>
                            </tr>
                            <tr>
                                <td class="td_text" > <label for="upw" >비밀번호</label></td>
                                <td colspan="3"><div id="upw" name="upw" class="input_text"></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="upw2" >비밀번호 확인</label></td>
                                <td colspan="3"><div id="upw2" name="upw2" class="input_text"></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="grade">학년</label></td>
                                <td><div id="grade" class="select"> </div></td>
                                <td class="td_text"> <label for="classroom">반</label></td>
                                <td><div id="classroom" class="select"> </div></td>
                            </tr>
                            <tr>
                                <td class="td_text"> <label for="num">번호</label></td>
                                <td><div id="num" name="num" class="input_num"></td>
                                <td class="td_text">기숙사 여부</td>
                                <td><div name="home" id="dor" class="radio"><label for="dor"></div></td>
                            </tr>
                            <tr>
                                <td class="td_text">알레르기</td>
                                <td colspan="3">
                                    <ul class="allergy_ul">
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_1"value="1"><label for="allergy_1">난류</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_2"value="2"><label for="allergy_2">우유</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_3"value="3"><label for="allergy_3">메밀</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_4"value="4"><label for="allergy_4">땅콩</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_5"value="5"><label for="allergy_5">대두</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_6"value="6"><label for="allergy_6">밀</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_7"value="7"><label for="allergy_7">고등어</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_8"value="8"><label for="allergy_8">게</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_9"value="9"><label for="allergy_9">새우</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_10"value="10"><label for="allergy_10">돼지고기</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_11"value="11"><label for="allergy_11">복숭아</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_12"value="12"><label for="allergy_12">토마토</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_13"value="13"><label for="allergy_13">아황산염</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_14"value="14"><label for="allergy_14">호두</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_15"value="15"><label for="allergy_15">닭고기</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_16"value="16"><label for="allergy_16">쇠고기</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_17"value="17"><label for="allergy_17">오징어</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_18"value="18"><label for="allergy_18">조개류(굴, 조개)</label></li>
                                    </ul>
                                </td>
                            </tr>

                        </table>
                        <input type="submit" name="signup_check" class="signup_btn" value="회원가입">
                    </form>
                </div>
            </div>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>