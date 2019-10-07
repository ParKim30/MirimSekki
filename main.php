<!DOCTYPE html>
<html>
    <head>
        <meta name="author" content="yejin">
        <meta name="description" content="미림세끼 사이트">
        <meta name="keywords" content="미림,미림세끼, 급식">
        <meta name="generator" content="vscode">
        <meta charset="utf-8">
        <title>미림세끼 메인페이지</title>
        <link rel="stylesheet" href="css/main_style.css">
        <link rel="stylesheet" href="css/reset.css">

        <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gaegu|Poor+Story&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                    <div class="header">
                        <div class="header-img">
                            <img src="img/LunchRoom.PNG">
                        </div>
                        <div class="header-logo">
                            <img src="img/logo.png">
                        </div> 
                        <div class="menu">
                            <?php
                                session_start();
                                $user_id = $_SESSION['user_id'];
                                echo "<a href='my_info.php'>$user_id</a>";
                            ?>/<a href="logout.php">로그아웃</a></span>
                        </div>
                    </div>
            </div>
            <div id="contents">
                    
                    <div class="pan">
                        <div class="pan_back"></div>
                        <div class="pan_bottom1"><a href="#">급식 메뉴</a></div>
                        <div class="pan_bottom2"><a href="application.php">급식 신청</a></div>
                        <div class="pan_bottom3"><a href="#">만족도 조사</a></div>
                        <div class="pan_bottom4"><img src="img/밥.png"></div>
                        <div class="pan_bottom5"><img src="img/국.png"></div>
                    </div>  
            </div>
            <div id="footer">
                Mirim Girls' Information Science High School
            </div>
        </div>
    </body>
</html>