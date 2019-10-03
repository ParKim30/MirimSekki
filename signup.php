<?php
    $host = "localhost";
    $user = "mirimmeals";
    $pw = "parkim30!";
    $dbName = "mirimmeals";
    $conn = new mysqli($host,$user,$pw,$dbName);
    mysql_query("set names utf8");

    $uid = $_POST['uid'];
    $upw = $_POST['upw'];
    $uname = $_POST['name'];
    $grade = $_POST['grade'];
    $classroom = $_POST['classroom'];
    $num = $_POST['num'];
    $home = $_POST['home'];
    $allergy = $_POST['allergy'];

    // for($i=0;$i < count($allergy);$i++) {
    //     echo $allergy[$i] . "<br>";
    //   }
   

    if(count($allergy)==0){
        $exist = false;
    }else if(count($allergy)>0){
        $exist = true;
        $sql2 = "insert into member_allergy(id,allergy_1,allergy_2,allergy_3,allergy_4,allergy_5,allergy_6,allergy_7,allergy_8,allergy_9,allergy_10,allergy_12,allergy_13,allergy_14,allergy_15,allergy_16,allergy_17,allergy_18)";
    }

    $sql = "insert into member (id, pw, name,grade, classroom, num, dor,allergy)";
    $sql = $sql. "values('{$uid}','{$upw}','{$uname}','{$grade}','{$classroom}','{$num}','{$home}','{$exist}')";

     //이제 알레르기여부 보고 있으면 프라이머리키 가져와서 넣어주고 알레르기여부도 넣어줘야 함
    if($exist==true){
        $sql2 = $sql2. "values('{$uid}','{$allergy}')";
    }

    if($conn->query($sql)){
        echo("<script>alert('회원가입 되었습니다')</script>");
        include('index.html');
    }else{
        echo 'fail to insert sql'.mysqli_error($conn);
    }
?>