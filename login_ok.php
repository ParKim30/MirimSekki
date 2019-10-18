<?php
 session_start();
 $uid = $_POST["uid"];
 $upw = $_POST["upw"];

$host = "localhost";
$user = "mirimmeals";
$pw = "parkim30!";
$dbName = "mirimmeals";
$conn = new mysqli($host,$user,$pw,$dbName);

$sql = "SELECT * FROM member WHERE id = '{$uid}' AND pw= '{$upw}'";
$res = $conn->query($sql);

$row = $res->fetch_array(MYSQLI_ASSOC);

if ($row != null) {
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['login'] = true;
    echo("<script>alert('로그인 되었습니다')</script>");
    echo("<script>location.href='main.php';</script>");
}

if($row == null){
    echo("<script>alert('로그인 실패 아이디와 비밀번호가 일치하지 않습니다.')</script>");
    include ('login2.html');
}
?>