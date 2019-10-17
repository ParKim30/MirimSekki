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
        <link rel="stylesheet" href="css/signup_style2.css">
        <link rel="stylesheet" href="css/reset.css">
        <meta charset="UTF-8">
        <script src="js/signup.js"></script>

        <!--웹폰트
        <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap" rel="stylesheet">-->
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                <a href="index.html"><img src="img/logo.png"></a>
            </div>
            <div id="contents">
                <div class="signup">
                    <div class="signup_header">
                        <h1>내 정보 변경</h1>
                        <hr>
                    </div>
                    <form method="post" action="db_edit_myinfo.php" name="signup_form" id="signup_form" >
                            <!-- onsubmit="return checkAll()" -->
                        <table id="signup_table">
                            <tr>
                                <td class="td_text"><label for="name">이름</label></td>
                                <td colspan="3"><input type="text" id="name" name="name" class="input_text" maxlength="20" value="<?php echo $user_name ?>" disabled></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="uid">아이디</label></td>
                                <td colspan="3"><input type="text" id="uid" name="uid" class="input_text" maxlength="20" value="<?php echo $user_id ?>" disabled></td>
                            </tr>
                            <tr>
                                <td class="td_text" > <label for="upw" >비밀번호</label></td>
                                <td colspan="3"><input type="password" id="upw" name="upw" class="input_text" maxlength="20" value="<?php echo $user_pw ?>"></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="upw2" >비밀번호 확인</label></td>
                                <td colspan="3"><input type="password" id="upw2" name="upw2" class="input_text" maxlength="20" value="<?php echo $user_pw ?>"></td>
                            </tr>
                            <tr>
                                <td class="td_text"><label for="grade">학년</label></td>
                                <td><select name="grade" id="grade" class="select">
                                <option value="">학년</option>
                                <option value="1" <?php if($user_grade=='1'){echo "selected";} ?>>1</option>
                                <option value="2" <?php if($user_grade=='2'){echo "selected";} ?>>2</option>
                                <option value="3" <?php if($user_grade=='3'){echo "selected";} ?>>3</option>
                                 </select></td>
                                <td class="td_text"> <label for="classroom">반</label></td>
                                <td><select name="classroom" id="classroom" class="select">
                                <option value="">반</option>
                                <option value="1" <?php if($user_classroom=='1'){echo "selected";} ?> >1</option>
                                <option value="2" <?php if($user_classroom=='2'){echo "selected";} ?> >2</option>
                                <option value="3" <?php if($user_classroom=='3'){echo "selected";} ?> >3</option>
                                <option value="4" <?php if($user_classroom=='4'){echo "selected";} ?> >4</option>
                                <option value="5" <?php if($user_classroom=='5'){echo "selected";} ?> >5</option>
                                <option value="6" <?php if($user_classroom=='6'){echo "selected";} ?> >6</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td class="td_text"> <label for="num">번호</label></td>
                                <td><input type="text" id="num" name="num" class="input_num" maxlength="2" value="<?php echo $user_num ?>"></td>
                                <td class="td_text">기숙사 여부</td>
                                <td><input type="radio" name="home" value="dormitory" id="dor" class="radio" <?php if($user_dor=='dormitory'){echo "checked";} ?>><label for="dor">기숙사</label>
                                    <input type="radio" name="home" value="myhome" id="realhome" class="radio" <?php if($user_dor=='myhome'){echo "checked";} ?>><label for="home">통학</label></td>
                            </tr>
                            <tr>
                                <td class="td_text">알레르기</td>
                                <td colspan="3">
                                    <ul class="allergy_ul">
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_1"value="1"<?php if(in_array('1',$allergy_info)){echo "checked";}?>><label for="allergy_1">난류</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_2"value="2"<?php if(in_array('2',$allergy_info)){echo "checked";}?>><label for="allergy_2">우유</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_3"value="3"<?php if(in_array('3',$allergy_info)){echo "checked";}?>><label for="allergy_3">메밀</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_4"value="4"<?php if(in_array('4',$allergy_info)){echo "checked";}?>><label for="allergy_4">땅콩</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_5"value="5"<?php if(in_array('5',$allergy_info)){echo "checked";}?>><label for="allergy_5">대두</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_6"value="6"<?php if(in_array('6',$allergy_info)){echo "checked";}?>><label for="allergy_6">밀</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_7"value="7"<?php if(in_array('7',$allergy_info)){echo "checked";}?>><label for="allergy_7">고등어</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_8"value="8"<?php if(in_array('8',$allergy_info)){echo "checked";}?>><label for="allergy_8">게</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_9"value="9"<?php if(in_array('9',$allergy_info)){echo "checked";}?>><label for="allergy_9">새우</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_10"value="10"<?php if(in_array('10',$allergy_info)){echo "checked";}?>><label for="allergy_10">돼지고기</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_11"value="11"<?php if(in_array('11',$allergy_info)){echo "checked";}?>><label for="allergy_11">복숭아</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_12"value="12"<?php if(in_array('12',$allergy_info)){echo "checked";}?>><label for="allergy_12">토마토</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_13"value="13"<?php if(in_array('13',$allergy_info)){echo "checked";}?>><label for="allergy_13">아황산염</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_14"value="14"<?php if(in_array('14',$allergy_info)){echo "checked";}?>><label for="allergy_14">호두</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_15"value="15"<?php if(in_array('15',$allergy_info)){echo "checked";}?>><label for="allergy_15">닭고기</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_16"value="16"<?php if(in_array('16',$allergy_info)){echo "checked";}?>><label for="allergy_16">쇠고기</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_17"value="17"<?php if(in_array('17',$allergy_info)){echo "checked";}?>><label for="allergy_17">오징어</label></li>
                                        <li><input type="checkbox" name="allergy[]" class="allergy_box"id="allergy_18"value="18"<?php if(in_array('18',$allergy_info)){echo "checked";}?>><label for="allergy_18">조개류(굴, 조개)</label></li>
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