<!DOCTYPE html>
<html>
    <head>
        <!--메타태그 삽입-->

        <meta charset="UTF-8">

        <title>미림세끼 급식신청</title>

        <!--CSS Style-->
        <link rel ="stylesheet" href="css/reset.css">
        <link rel ="stylesheet" href="css/application.css">

        <!--웹 폰트-->
        <link href="https://fonts.googleapis.com/css?family=Gaegu&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="wrap">
            <div id ="header">
                <div class="header-img">
                    <img src="img/LunchRoom.PNG">
                </div>
                <div class="header-logo">
                    <a href="index.html"><img src="img/logo.png"></a>
                </div> 
            </div>
            <div id="contents">
                <div class="header-menu">
                    <hr>
                    <ul>
                        <li><a href="menu.html">급식메뉴</a></li>
                        <li><a href="application.html" id="application">급식신청</a></li>
                        <li><a href="survey.html">만족도조사</a></li>
                    </ul>
                    <hr>
                </div>
                <div class="name_wrap">
                    <div class="name">
                        <p>
                            <?php
                                error_reporting(E_ALL);

                                ini_set("display_errors", 1);
                                
                                session_start();
                                $host = "localhost";
                                $user = "mirimmeals";
                                $pw = "parkim30!";
                                $dbName = "mirimmeals";
                                $conn = new mysqli($host,$user,$pw,$dbName);

                                $user_id=$_SESSION['user_id'];
                                $sql = "SELECT * FROM member WHERE id = '{$user_id}'";
                                $res = $conn->query($sql);
                                
                                $row = $res->fetch_array(MYSQLI_ASSOC);
                                $user_grade=$row['grade'];
                                $user_class=$row['classroom'];
                                $user_num=$row['num'];
                                $user_name=$row['name'];
                                
                                
                                if(strlen($user_num)==1){
                                    $student_id=$user_grade.$user_class."0".$user_num;
                                }
                                else {$student_id=$user_grade.$user_class.$user_num;}
                                $_SESSION['student_id']=$student_id;
                                if($row['dor']=="myhome") $user_home="통학";
                                else if($row['dor']=="dormitory") $user_home="기숙사";
                                $_SESSION['student_home']=$user_home;
    
                                echo $student_id." ".$user_name." - ".$user_home;

                                
                            ?>
                        </p>
                    </div>
                    <form method="post" action="application_db.php" name="checkbox_form" id="checkbox_form">
                        <div class="checkbox">
                            <span>
                                <input type='checkbox' name='meal[]' value='hanggi' id="meal1">
                                <label for="meal1">조식</label>
                            </span>
                            <span>
                                <input type='checkbox' name='meal[]' value='duggi' id="meal2">
                                <label for="meal2">중식</label>
                            </span>
                            <span>
                                <input type='checkbox' name='meal[]' value='seggi' id="meal3">
                                <label for="meal3">석식</label>
                            </span>
                        </div>
                        <div class="notice">
                            <ol>
                                <li>기숙사 변동학생 유무 확인바랍니다.</li>
                                <li>기숙사생은 조식, 중식, 석식 모두 신청해야 합니다.</li>
                                <li>부득이하게 급식 신청을 하지 못하는 경우 학생안전복지부로 연락바랍니다.</li>
                                <li>특이사항으로 인해 급식 신청 못하는 학생은 사유를 기입해주기 바랍니다.</li>
                            </ol>
                        </div>
                        <div class="submit_btn">
                            <input type="submit" name="submit_btn" value='신청하기' id="submit_btn">
                        </div>   
                    </form>
                </div>
            </div>
            <div id="footer">

            </div>
        </div>
    </body>
</html>