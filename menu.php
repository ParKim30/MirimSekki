<?php
    $now = date("Y.m.d");
    $host = "localhost";
    $user = "mirimmeals";
    $pw = "parkim30!";
    $dbName = "mirimmeals";
    $conn = mysqli_connect($host,$user,$pw);
    mysqli_select_db($conn,$dbName);

    $conn->query("set names utf8;");
//    mysql_query("set session character_set_connection=utf8;");
//    mysql_query("set session character_set_results=utf8;");
//    mysql_query("set session character_set_client=utf8;");
    // mysql_set_charset("utf8", $conn);

    $today_arr=explode( '.' , $now);
    $today = implode('',$today_arr);
    //아침메뉴 db에서 불러오기
    $sql = "SELECT m1,m2,m3,m4,m5,m6,m7,m8 FROM Breakfast where today = '$today'";
    $res = $conn->query($sql);
    $menu1 = $res->fetch_array(MYSQLI_NUM);

    //점심메뉴 db에서 불러오기
    $sql = "SELECT m1,m2,m3,m4,m5,m6,m7,m8 FROM Lunch where today = '$today'";
    $res = $conn->query($sql);
    $menu2 = $res->fetch_array(MYSQLI_NUM);

    //석식메뉴 db에서 불러오기
    $sql = "SELECT m1,m2,m3,m4,m5,m6,m7,m8 FROM Dinner where today = '$today'";
    $res = $conn->query($sql);
    $menu3 = $res->fetch_array(MYSQLI_NUM);

?>
<!DOCTYPE html>
<html>
    <head>
        <!--메타태그 삽입-->
        <meta charset="UTF-8">
        <title>미림세끼</title>

        <!--CSS Style-->
        <link rel ="stylesheet" href="css/reset.css">
        <link rel ="stylesheet" href="css/menu?ver=1.css">

        <!--웹 폰트-->
        <link href="https://fonts.googleapis.com/css?family=Gaegu&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Do+Hyeon&display=swap" rel="stylesheet">

    </head>
    <body>
        <!-- <script type="text/javascript">
            var nowDate = new Date();
            var yesterDate;
            var tomorrow;
            var currentDate=nowDate;
            var date;
            window.onload =function(){
                document.getElementById("today_date").innerHTML=nowDate.getFullYear() + "." + (nowDate.getMonth()+1) +"."+nowDate.getDate();  
            }
            function pre_date(){
                yesterDate = new Date(Date.parse(currentDate)-1*24*60*60*1000);
                
                var yesterYear = yesterDate.getFullYear();
                var yesterMonth = yesterDate.getMonth()+1;
                var yesterDay = yesterDate.getDate();

                if(yesterMonth<10){yesterMonth = "0" + yesterMonth;}
                if(yesterDay<10){yesterDay = "0"+yesterDay};
                currentDate.setDate(yesterDate.getDate());
                
                document.getElementById("today_date").innerHTML=currentDate.getFullYear() + "." + (currentDate.getMonth()+1) +"."+currentDate.getDate();
                
            } 
            function next_date(){
                tomorrow = new Date(Date.parse(currentDate)+1*24*60*60*1000);
                
                var tomorrowYear = tomorrow.getFullYear();
                var tomorrowMonth = tomorrow.getMonth()+1;
                var tomorrowDay = tomorrow.getDate();

                if(tomorrowMonth<10){tomorrowMonth = "0" + tomorrowMonth;}
                if(tomorrowDay<10){tomorrowDay = "0"+tomorrowDay};
                currentDate.setDate(tomorrow.getDate());
               
                document.getElementById("today_date").innerHTML=currentDate.getFullYear() + "." + (currentDate.getMonth()+1) +"."+currentDate.getDate();
            }
        </script> -->
        <div id = "wrap">
            <div id="header">
                <div class="header-img">
                    <img src="img/LunchRoom.PNG">
                </div>
                <div class="header-logo">
                    <a href="main.php"><img src="img/logo.png"></a>
                </div> 
            </div><div class="header-menu">
                    <hr>
                    <ul>
                        <li><a href="#" id="menu">급식메뉴</a></li>
                        <?php  
                            session_start();
                            if(isset($_SESSION['user_id'])){
                                echo "<li><a href='application.php' id='application'>급식신청</a></li>";
                            }
                            else echo "<li><a href='NotLogin.html' id='application'>급식신청</a></li>";
                            
                        ?>

                        <li><a href="survey.html" id="survey">만족도조사</a></li>
                    </ul>
                    <hr>
                </div>
            <div id="contents">
                
                <div class="con_con">
                    <div id="cont_date">
                        <div class="container">
                            <h2 class="ir_pm">날짜</h2>
                            <div class="date">
                                
                                <!-- <a href="#"class="left_tri"><img src="img/left_tri.png" class="left_tri" onclick="pre_date()"></a> -->
                                <span id="today_date"><?php echo $now; ?></span>
                                <!-- <a href="#" class="right_tri"><img src="img/right_tri.png" class="right_tri" onclick="next_date()"></a> -->
                                <!-- <img src ="img/calendar.png" class="calendar_img"><span class="ir_pm">달력</span> -->
                              
                            </div>
                        </div>
                    </div>
                    <!--cont_date-->
                    <div id="cont_menu">
                        <div class="container">
                            <div class="tab_menu">
                                <h4 class="ir_pm">급식메뉴</h4>
                                    <div class="hanggi">
                                        <div class="ggi_txt">
                                        <span>한끼</span>
                                        </div>
                                        <div class="menu">
                                            <ul>
                                                <?php
                                                    for($i=0;$i<8;$i++){
                                                        echo "<li><span>".$menu1[$i]."</span></li>";
                                                    }
                                                ?>
                                                <!-- <li><span>현미밥</span></li>
                                                <li><span>쇠고기미역국</span></li>
                                                <li><span>언양식불고기</span></li>
                                                <li><span>찐고구마</span></li>
                                                <li><span>무생체</span></li>
                                                <li><span>백김치</span></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="duggi">
                                        <div class="ggi_txt">
                                        <span>두끼</span>
                                        </div>
                                        <div class="menu">
                                            <ul>    
                                                <?php
                                                    for($i=0;$i<8;$i++){
                                                        echo "<li><span>".$menu2[$i]."</span></li>";
                                                    }
                                                ?>
                                                <!-- <li><span>잡곡밥</span></li>
                                                <li><span>닭곰탕</span></li>
                                                <li><span>코다리무조림</span></li>
                                                <li><span>소시지오믈렛</span></li>
                                                <li><span>부추겉절이</span></li>
                                                <li><span>포기김치</span></li>
                                                <li><span>레드벨벳치즈케익</span></li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="seggi">
                                        <div class="ggi_txt">
                                        <span>세끼</span>
                                        </div>
                                        <div class="menu">
                                            <ul>
                                                <?php
                                                    for($i=0;$i<8;$i++){
                                                        echo "<li><span>".$menu3[$i]."</span></li>";
                                                    }
                                                ?>
                                                <!-- <li><span>참치마요덮밥</span></li>
                                                <li><span>김칫국</span></li>
                                                <li><span>납작비빔만두</span></li>
                                                <li><span>시즌샐러드</span></li>
                                                <li><span>깍두기</span></li>
                                                <li><span>쥬시쿨(트로피칼)</span></li> -->
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--cont_menu-->
                     <!-- <div id="cont_cbox">
                        <div class="container">
                            <div class="cbox_head">
                                <div class="cbox_head_inner">
                                    <span>의견을 남겨주세요!</span>
                                </div>
                            </div>
                            <form method="post" action="#" name="cbox_form" id="cbox_form">
                                <fieldset>
                                    <legend class="ir_pm"> 댓글쓰기</legend>
                                    <div class="cbox_write_wrap">
                                        <div class="cbox_write_inner">
                                            <div class="cbox_profile_area">
                                                <div class="cbox_name">
                                                    <span class="cbox_write_name">
                                                        김예은
                                                    </span>
                                                </div>
                                                <div class="star_rating">
                                                    <div class="star_score">
                                                        
                                                    </div>
                                                </div>
                                            </div> -->
                                        <!--댓글 이름부분-->
                                            <!-- <div class="cbox_write_area"> -->
                                                <!-- <strong class="ir_pm">댓글 입력</strong>
                                                <div class="cbox_inbox">
                                                    <textarea id="cbox_module" class="cbox_text" rows="3" cols="120"  onclick="this.value=''" style="border:none; margin-left:1px;">댓글을 입력해주세요</textarea>
                                                    <label for="cbox_module" class="cbox_text_guide" style="display:block;">
                                                        
                                                    </label>
                                                </div>
                                            </div>
                                        <!--댓글 내용 입력부분-->
                                            <!-- <div class="cbox_upload_btn_area">
                                                <button type="button" class="cbox_upload_btn">
                                                    <span class="cbox_txt_upload">등록</span>
                                                </button>
                                            </div> -->
                                        <!--댓글 버튼 부분-->
                                        <!-- </div>
                                    </div>
                                </fieldset>
                            </form> -->
                            <!-- <div class="cbox_content_wrap">
                                <ul class="cbox_list">
                                    <li>
                                        <div class="list_name">
                                            김예*
                                        </div>
                                        <div class="list_contents">
                                            난 태풍 올때마다 기자들 해안 근처에 가까이 가서 바람이 얼마나 쎄니 비가 
                                            얼마나 오니 중계 하는거 안전불감증이라 생각한다. 지금 얼마든지 그래픽이나 
                                            촬영 기술로 현재 보여 줄 수 있는데 사람들 공감 높이려 안전 등한시하고 위험한 
                                            곳에서 중계 하는거 없어지면 좋겠다. 
                                        </div>
                                        <div class="list_date">
                                            2019.09.07 10:58:51
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list_name">
                                            박예*
                                        </div>
                                        <div class="list_contents">
                                            기자 여러분도 조심하세요
                                        </div>
                                        <div class="list_date">
                                            2019.09.06 10:58:51
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list_name">
                                            박지*
                                        </div>
                                        <div class="list_contents">
                                            기자님께서 현장중계인데도 중언부언 하지않고 말씀을 참 잘하시네요~ 직업 프로의식이 느껴집니다!
                                        </div>
                                        <div class="list_date">
                                            2019.09.05 10:58:51
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list_name">
                                            김태*
                                        </div>
                                        <div class="list_contents">
                                            정말 넌 너무 잘생겼어 아우 눈부셔!
                                        </div>
                                        <div class="list_date">
                                            2019.09.04 10:58:51
                                        </div>
                                    </li>
                                </ul>
                                <div class="cbox_more_view">
                                        <a href="#" class="more_view">댓글더보기></a>
                                    </div>
                            </div>
                            
                        </div>
                    </div>  -->
                </div>
            </div>
            <div id="footer">
                <div class="address_wrap">
                <address><div>546 Hoam-ro, Gwanak-gu, Seoul, 08821 Korea</div></address>
                </div>
            </div>
        </div>
        <script>
        
</script>
    </body>
</html>