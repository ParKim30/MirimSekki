<?php
    $host = "localhost";
    $user = "mirimmeals";
    $pw = "parkim30!";
    $dbName = "mirimmeals";
    $conn = new mysqli($host,$user,$pw,$dbName);
    session_start();

    $user_id=$_SESSION['user_id'];
    $student_id=$_SESSION['student_id'];
    $user_home=$_SESSION['student_home'];
    $meal1=0;$meal2=0;$meal3=0;

    if(in_array('hanggi', $_POST['meal'])){
        $meal1=1;
    }
    if(in_array('duggi', $_POST['meal'])){
        $meal2=1;
    }if(in_array('seggi', $_POST['meal'])){
        $meal3=1;
    }

    $sql = "insert into application (id, student_id, meal1,meal2,meal3,dor )";

    $sql = $sql. "values('{$user_id}','{$student_id}','{$meal1}','{$meal2}','{$meal3}','{$user_home}')";

    if($conn->query($sql)){
        echo("<script>alert('급식 신청되었습니다.')</script>");
        include('main.php');
    }else{
        echo 'fail to insert sql'.mysqli_error($conn);
    }
?>