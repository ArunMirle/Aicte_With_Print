<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Print</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>ACTIVITY REPORT</h2>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>#</th>
                        <th>Student Information</th>
                        <th>Enrollment Information</th>
                      </tr>
                      <?php  include('connection.php'); ?>
                      <?php
                       $sql="SELECT * from `event_booking`;";
                       $res = mysqli_query ($data, $sql);
                       $i=1;
                       while($row = mysqli_fetch_array($res)
                       ){
                        echo "<tr>";
                        echo "<td> "; echo $i++ ;
                        echo"</td>";
                        echo "<td><p> NAME: "; echo $row["user_name"]."</p>";
                        echo "<p> usn: "; echo $row["usn"]."</p>";
                        echo "<p> CONTACT: " ;echo $row["user_phone"]."</p>" ;
                        echo"</td>";
                        $eid=$row["organization_id"] ;
                        $sql_organization_name = "SELECT `name` FROM `organization` where `id` = '$eid' ";
                        $res_organization_name = mysqli_query($data, $sql_organization_name);
                        $row_organization_name = mysqli_fetch_array($res_organization_name);
                        echo "<td><p> ORGANIZATION NAME: "; echo $row_organization_name["name"]."</p>";
                        $vid=$row["event_id"] ;
                        $sql_event = "SELECT * FROM `event` where `id` = '$vid' ";
                        $res_event = mysqli_query($data, $sql_event);
                        $row_event = mysqli_fetch_array($res_event);
                        $id =  $row["id"];
                        
                        echo "<p> EVENT NAME: " ;echo $row_event["name"]."</p>" ;
                        echo "<p> EVENT ADDRESS: " ;echo $row_event["address"]."</p>" ;
                        echo "<p> DATE: " ;echo $row["date"]."</p>" ;
                        echo "<p> NUMBER OF HOURS: " ;echo $row["no_of_hours"]."</p>" ;
                        $points =  $row_event["points"];
                        echo "<p> Points: " ;echo $points."</p>" ;
                        echo"</td>";
                       
                        // echo "<td>"; echo $row["description"]; echo" </td>";
                        
    
                        echo "</tr>";
                       }
                      ?>
                      
                   
                      
                    </table>

      <div class="text-center">
      
      <button class="btn btn-primary"  btn btn-primary.style.visibility = 'hidden'  onclick= "javascript:window.print();" > Print  </button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
