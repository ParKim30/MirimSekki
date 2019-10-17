<?php
    $connect=mysqli_connect("localhost","mirimmeals","parkim30!","mirimmeals");
    $output='';
    if(isset($_POST["export_excel"]))
    {
        $sql="SELECT * FROM survey ORDER BY student_id";
        $result=mysqli_query($connect,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $output .='
                <table class="table" bordered="1">
                    <tr>
                        <th>student_id</th>
                        <th>질문 1</th>
                        <th>질문 2</th>
                        <th>질문 3</th>
                        <th>질문 4</th>
                        <th>질문 5</th>
                        <th>질문 6</th>
                        <th>질문 7</th>
                        <th>질문 8</th>
                    </tr>
            ';
            while($row=mysqli_fetch_array($result))
            {
                $output .='
                    <tr>
                        <td>'.$row["student_id"].'</td>
                        <td>'.$row["Q1"].'</td>
                        <td>'.$row["Q2"].'</td>
                        <td>'.$row["Q3"].'</td>
                        <td>'.$row["Q4"].'</td>
                        <td>'.$row["Q5"].'</td>
                        <td>'.$row["Q6"].'</td>
                        <td>'.$row["Q7"].'</td>
                        <td>'.$row["Q8"].'</td>
                    </tr>
                ';
            }
            $output .= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition:attachment; filename=survey_download.xls");
            echo $output;
        }
    }
?>