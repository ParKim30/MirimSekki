<?php
    session_start();
    $host = "localhost";
    $user = "mirimmeals";
    $pw = "parkim30!";
    $dbName = "mirimmeals";
    $conn = mysqli_connect($host,$user,$pw);
    mysqli_select_db($conn,$dbName);

    if(isset($_SESSION['user_id'])){
        $edit_id=$_SESSION['user_id'];echo $edit_id;
        $edit_pw = $_POST['upw'];
        $edit_grade=$_POST['grade'];
        $edit_classroom=$_POST['classroom'];
        $edit_num=$_POST['num'];
        $edit_home=$_POST['home'];
        $edit_allergy = $_POST['allergy'];
    }

    if(count($edit_allergy)==0){
        $exist = 0;
        echo "error1";
    }else if(count($edit_allergy)>0){
        $exist = 1;
        $allergy_implode=implode(",",$edit_allergy);
        echo "error2";
        $sql2 = "UPDATE member_allergy SET allergy = '{$allergy_implode}' where id = '{$edit_id}'";


    }
    echo "error3";
    $sql = "UPDATE member set pw ='{$edit_pw}', grade = {$edit_grade}, classroom = '{$edit_classroom}', num ='{$edit_num}', dor = '{$edit_home}', allergy = '{$exist}' where id= '{$edit_id}'";
    echo "error4";
    
    switch($exist){
        case 0: if($conn->query($sql)){
                    echo("<script>alert('정보 수정 되었습니다')</script>");
                    include('my_info.php');
                }else{
                    echo 'fail to insert sql'.mysqli_error($conn);
                }

        case 1: if($conn->query($sql)&&$conn->query($sql2)){
                     echo("<script>alert('정보 수정 되었습니다')</script>");
                     include('my_info.php');
                 }else{
                    echo 'fail to insert sql'.mysqli_error($conn);
                }
    }
?>