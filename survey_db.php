<?php
    $host = "localhost";
    $user = "mirimmeals";
    $pw = "parkim30!";
    $dbName = "mirimmeals";
    $conn = new mysqli($host,$user,$pw,$dbName);
    session_start();

    $user_id=$_SESSION['user_id'];
    $student_id=$_SESSION['student_id'];
    

    $sql = "insert into survey (student_id,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8)";
    $sql = $sql. "values('{$student_id}','{$_POST['Q1']}','{$_POST['Q2']}','{$_POST['Q3']}','{$_POST['Q4']}','{$_POST['Q5']}','{$_POST['Q6']}','{$_POST['Q7']}','{$_POST['Q8']}')";

    if($conn->query($sql)){
        echo("<script>alert('만족도조사 제출되었습니다.')</script>");
        include('main.php');
    }else{
        echo 'fail to insert sql'.mysqli_error($conn);
    }
?>
<!-- $Q1=$_POST['Q1'];
    $Q2=$_POST['Q2'];
    $Q3=$_POST['Q3'];
    $Q4=$_POST['Q4'];
    $Q5=$_POST['Q5'];
    $Q6=$_POST['Q6'];
    $Q7=$_POST['Q7'];
    $Q8=$_POST['Q8'];
    

    $sql = "insert into survey (student_id,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,wantFood,NwantFood)";
    $sql = $sql. "values('{$student_id}','{$Q1}','{$Q2}','{$Q3}','{$Q4}','{$Q5}','{$Q6}','{$Q7}','{$Q8}','{$wantFood}','{$NwantFood}')"; -->