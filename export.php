<?php
     //export.php
if(isset($_POST["export"]))
{
  $connect = mysqli_connect("localhost", "Techno_organizers", "SecuredPwd","Applied_candidates");

     header('Content-Type: text/csv; charset=utf-8');
     header('Content-Disposition: attachment; filename=data.csv');
     $output = fopen("php://output", "w");
     fputcsv($output, array('ID', 'Name', 'Address', 'Gender', 'Designation', 'Age'));
     $query = "SELECT * from candidate_list";
     $result = mysqli_query($connect, $query);
     while($row = mysqli_fetch_assoc($result))
     {
          fputcsv($output, $row);
     }
     fclose($output);
}
?>
