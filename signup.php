<?php
    $host = "127.0.0.1";
    $user = "root";
    $pw = "mirim2";
    $dbName = "mirimsekki";
    $conn = new mysqli($host,$user,$pw,$dbName);


    $uid = $_POST['uid'];
    $upw = $_POST['upw'];
    $grade = $_POST['grade'];
    $classroom = $_POST['classroom'];
    $num = $_POST['num'];
    $home = $_POST['home'];

    $sql = "insert into member (id, pw, grade, classroom, num, dor)";
    $sql = $sql. "values('{$uid}','{$upw}','{$grade}','{$classroom}','{$num}','{$home}')";

    if($conn->query($sql)){
        echo("<script>alert('회원가입 되었습니다')</script>");
        include('main.html');
    }else{
        echo 'fail to insert sql'.mysqli_error($conn);
    }
?>