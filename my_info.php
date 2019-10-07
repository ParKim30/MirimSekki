<?php
    session_start();
    $host = "localhost";
    $user = "mirimmeals";
    $pw = "parkim30!";
    $dbName = "mirimmeals";
    $conn = mysqli_connect($host,$user,$pw);
    mysqli_select_db($conn,$dbName);
    
    if(isset($_SESSION['user_id'])){

        $user_id=$_SESSION['user_id'];
        $sql = "SELECT * FROM member WHERE id = '{$user_id}'";
        $res = $conn->query($sql);

        $row = $res->fetch_array(MYSQLI_ASSOC);

        $user_pw=$row['pw'];
        $user_name=$row['name'];
        $user_grade=$row['grade'];
        $user_classroom=$row['classroom'];
        $user_num=$row['num'];
        $user_dor=$row['dor'];
        $user_allergy=$row['allergy'];

        if($user_allergy==1){
            $sql="SELECT allergy FROM member_allergy WHERE id='{$user_id}'";
            $res = $conn->query($sql);
            $row = $res->fetch_array(MYSQLI_ASSOC);
            $allergy_info=explode(",",$row['allergy']);
        }
    }
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
                <a href="main.php"><img src="img/logo.png"></a>
            </div>
            <div id="contents">
                <div class="signup">
                    <div class="signup_header">
                        <h1>마이페이지</h1>
                        <hr>
                    </div>
                    <form method="post" action="edit_my_info.php" name="signup_form" id="signup_form" onsubmit="return checkAll()">
                        <table id="signup_table">
                            <tr>
                                <td class="td_text"><label for="name">이름</label></td>
                                <td colspan="3"><div id="name" name="name" class="input_text"> <?php echo $user_name;?></div></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="uid">아이디</label></td>
                                <td colspan="3"><div id="uid" name="uid" class="input_text"><?php echo $user_id;?></div></td>
                            </tr>
                            <tr>
                                <td class="td_text" > <label for="upw" >비밀번호</label></td>
                                <td colspan="3"><div id="upw" name="upw" class="input_text"><?php echo $user_pw;?></div></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="grade">학년</label></td>
                                <td><div id="grade" class="select"><?php echo $user_grade;?> </div></td>
                                <td class="td_text"> <label for="classroom">반</label></td>
                                <td><div id="classroom" class="select"> <?php echo $user_classroom;?></div></td>
                            </tr>
                            <tr>
                                <td class="td_text"> <label for="num">번호</label></td>
                                <td><div id="num" name="num" class="input_num"><?php echo $user_num;?></div></td>
                                <td class="td_text">기숙사 여부</td>
                                <td><div name="home" id="dor" class="radio"><label for="dor"><?php echo $user_dor;?></div></td>
                            </tr>
                            <tr>
                                <td class="td_text">알레르기</td>
                                <td colspan="3">
                                    <ul class="allergy_ul">
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_1"value="1"<?php if(in_array('1',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>> <label for="allergy_1">난류</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_2"value="2"<?php if(in_array('2',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>> <label for="allergy_2">우유</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_3"value="3"<?php if(in_array('3',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>> <label for="allergy_3">메밀</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_4"value="4"<?php if(in_array('4',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>> <label for="allergy_4">땅콩</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_5"value="5"<?php if(in_array('5',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>> <label for="allergy_5">대두</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_6"value="6"<?php if(in_array('6',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>> <label for="allergy_6">밀</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_7"value="7"<?php if(in_array('7',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>> <label for="allergy_7">고등어</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_8"value="8"<?php if(in_array('8',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_8">게</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_9"value="9"<?php if(in_array('9',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_9">새우</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_10"value="10"<?php if(in_array('10',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_10">돼지고기</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_11"value="11"<?php if(in_array('11',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_11">복숭아</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_12"value="12"<?php if(in_array('12',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_12">토마토</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_13"value="13"<?php if(in_array('13',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_13">아황산염</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_14"value="14"<?php if(in_array('14',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_14">호두</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_15"value="15"<?php if(in_array('15',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_15">닭고기</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_16"value="16"<?php if(in_array('16',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_16">쇠고기</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_17"value="17"<?php if(in_array('17',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_17">오징어</label></li>
                                        <li><input type="checkbox" name="allergy" class="allergy_box"id="allergy_18"value="18"<?php if(in_array('18',$allergy_info)){echo "checked onclick='return false'";}else{echo "disabled";}?>><label for="allergy_18">조개류(굴, 조개)</label></li>
                                    </ul>
                                </td>
                            </tr>

                        </table>
                        <input type="submit" name="signup_check" class="signup_btn" value="수정하기">
                    </form>
                </div>
            </div>
            <div id="footer">
                
            </div>
        </div>
    </body>
</html>