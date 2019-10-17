<?php
    $connect=mysqli_connect("localhost","mirimmeals","parkim30!","mirimmeals");
    $output='';
    if(isset($_POST["export_excel"]))
    {
        $sql="SELECT * FROM application ORDER BY student_id";
        $result=mysqli_query($connect,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $output .='
                <table class="table" bordered="1">
                    <tr>
                        <th>student_id</th>
                        <th>meal1</th>
                        <th>meal2</th>
                        <th>meal3</th>
                    </tr>
            ';
            while($row=mysqli_fetch_array($result))
            {
                $output .='
                    <tr>
                        <td>'.$row["student_id"].'</td>
                        <td>'.$row["meal1"].'</td>
                        <td>'.$row["meal2"].'</td>
                        <td>'.$row["meal3"].'</td>
                    </tr>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename=download.xls");
            echo $output;
        }
    }
?>