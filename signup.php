<?php
     $host = "localhost";
    $user = "mirimmeals";
     $pw = "parkim30!";
    $dbName = "mirimmeals";
      $conn = mysqli_connect($host,$user,$pw);
     mysqli_select_db($conn,$dbName);
   
    if($conn) 
   echo "db연결성공";
    else
   echo "db연결 실패"; 
// echo "testtest";
    
    $uid = $_POST['uid'];
    $upw = $_POST['upw'];
    $uname = $_POST['name'];
    $grade = $_POST['grade'];
    $classroom = $_POST['classroom'];
    $num = $_POST['num'];
    $home = $_POST['home'];
    $allergy = $_POST['allergy'];
    
    // for($i=0; $i<count($allergy);$i++){
    //     echo count($allergy);
    //     echo $allergy[$i]."<br>";
    // }
    
    
    if(count($allergy)==0){
        //echo "0 ";
        $exist = 0;
    }else if(count($allergy)>0){
        $exist = 1;
        //echo "1 ";
        $allergy_implode=implode(",",$allergy);
        //print_r ($allergy_explode);
        $sql2 = "insert into member_allergy (id, allergy)";
        $sql2 = $sql2. "values('{$uid}','{$allergy_implode}')";
        //echo "insert 성공 ";
    }
    $sql = "insert into member (id, pw, name,grade, classroom, num, dor,allergy)";
    $sql = $sql. "values('{$uid}','{$upw}','{$uname}','{$grade}','{$classroom}','{$num}','{$home}','{$exist}')";

     //이제 알레르기여부 보고 있으면 프라이머리키 가져와서 넣어주고 알레르기여부도 넣어줘야 함
    //if($exist==1){
        
    //}

    if($conn->query($sql)&&$conn->query($sql2)){
        echo("<script>alert('회원가입 되었습니다')</script>");
        include('index.html');
    }else{
        echo 'fail to insert sql'.mysqli_error($conn);
    }
?>