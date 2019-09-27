<?php
 session_start();
 $uid = $_POST["uid"];
 $upw = $_POST["upw"];

$host = "127.0.0.1";
$user = "root";
$pw = "mirim2";
$dbName = "mirimsekki";
$conn = new mysqli($host,$user,$pw,$dbName);

$sql = "SELECT * FROM member WHERE id = '{$uid}' AND pw= '{$upw}'";
$res = $conn->query($sql);

$row = $res->fetch_array(MYSQLI_ASSOC);

if ($row != null) {
    $_SESSION['user_id'] = $row['id'];
    echo("<script>alert('로그인 되었습니다')</script>");
    include ('main.php');
}

if($row == null){
    echo("<script>alert('로그인 실패 아이디와 비밀번호가 일치하지 않습니다.')</script>");
    include ('login2.html');
}
?>