<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Filter</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          </button>
          <a class="navbar-brand" href="#">AICTE ACTIVITY</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../login.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-filter" aria-hidden="true"></span>Filter</h1>
            </div>
            
      </div>
    </header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="bookings_list.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Enrollment List </a>
              <a href="organizations.php" class="list-group-item"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Organizations </a>
              <a href="events.php" class="list-group-item"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Events </a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users </a>
              <a href="filter.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter </a>
              <a href="event_logs.php" class="list-group-item"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Deleted events </a>
        </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Filters</h3><br>
                
              </div>
              <div class="panel-body">
              <form action="" method="post">
              <div class="booking-form">
                        <label for="organization Type" >Organization Type</label> 
                        <div class="select">
                            <select name="organizations" id="organizations" >
                            <option></option>
                            <?php  
                            include('../connection.php');
                            $sql = "SELECT * from `organization`";
                            $res = mysqli_query ($data, $sql);
                            while($row = mysqli_fetch_array($res)){
                              echo "<option>"; echo $row['name']; echo "</option>";
                            }
                            
                            ?>
                         </select>
                        
                         <button type="submit" name="save" class="btn btn-primary">GO</button>
                         <br>
                         <label for="event Type" >Event Type</label> 
                         <div class="select">
                            <select name="event" id="event" >
                            <option></option>
                            <?php  
                           
                            $sql_ven = "SELECT * from `event`";
                            $res_ven = mysqli_query ($data, $sql_ven);
                            while($row_ven = mysqli_fetch_array($res_ven)){
                              echo "<option>"; echo $row_ven['name']; echo "</option>";
                            }
                            
                            ?>
                         </select>
                        
                         <button type="submit" name="go" class="btn btn-primary">GO</button>
                         <br>
                         <label for="User" >User</label> 
                         <div class="select">
                            <select name="user" id="user" >
                            <option></option>
                            <?php  
                           
                            $sql_user = "SELECT * from `user`";
                            $res_user = mysqli_query ($data, $sql_user);
                            while($row_user = mysqli_fetch_array($res_user)){
                              echo "<option>"; echo $row_user['usn']; echo "</option>";
                            }
                            
                            ?>
                         </select>
                        
                         <button type="submit" name="submit" class="btn btn-primary">GO</button>
                    </div>
             
              </div>
</form>
                <br>
             <table class="table table-striped table-hover">
                      <tr>
                        <th>#</th>
                        <th>Student Information</th>
                        <th>Enrollment Information</th>
                      </tr>
             <?php
if(isset($_POST['save'])){ 
  $i=1;
  $name =  isset($_POST['organizations']) ? $_POST['organizations'] : '';
 
  $sql_organization_id = "SELECT * FROM `organization` where `name`='$name'";
  $res_organization_id = mysqli_query ($data, $sql_organization_id);
  $row_organization_id = mysqli_fetch_array($res_organization_id);
  $organization_id = $row_organization_id['id'];

  $sql_view = "SELECT * FROM `event_booking` where `organization_id`='$organization_id'";
  $res_view = mysqli_query($data, $sql_view);
  while($row = mysqli_fetch_array($res_view)
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
                        echo "<td><p> organization NAME: "; echo $row_organization_name["name"]."</p>";
                        $vid=$row["event_id"] ;
                        $sql_event = "SELECT * FROM `event` where `id` = '$vid' ";
                        $res_event = mysqli_query($data, $sql_event);
                        $row_event = mysqli_fetch_array($res_event);
                        $id =  $row["id"];
                        echo "<p> event NAME: " ;echo $row_event["name"]."</p>" ;
                        echo "<p> event ADDRESS: " ;echo $row_event["address"]."</p>" ;
                        echo "<p> DATE: " ;echo $row["date"]."</p>" ;
                        echo "<p> NO OF Hours " ;echo $row["no_of_hours"]."</p>" ;
                        $points =  $row_event["points"];
                        echo "<p> points: " ;echo $points."</p>" ;
                        echo"</td>";
                       echo "<td>";
                       }
  // echo "<meta http-equiv='refresh' content='0'>";
  // $data->close();
}

?>
<?php
if(isset($_POST['go'])){ 
  $i=1;
  $name =  isset($_POST['event']) ? $_POST['event'] : '';
 
  $sql_event_id = "SELECT * FROM `event` where `name`='$name'";
  $res_event_id = mysqli_query ($data, $sql_event_id);
  $row_event_id = mysqli_fetch_array($res_event_id);
  $event_id = $row_event_id['id'];

  $sql_v = "SELECT * FROM `event_booking` where `event_id`='$event_id'";
  $res_v = mysqli_query($data, $sql_v);
  while($row = mysqli_fetch_array($res_v)
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
                        echo "<td><p> organization NAME: "; echo $row_organization_name["name"]."</p>";
                        $vid=$row["event_id"] ;
                        $sql_event = "SELECT * FROM `event` where `id` = '$vid' ";
                        $res_event = mysqli_query($data, $sql_event);
                        $row_event = mysqli_fetch_array($res_event);
                        $id =  $row["id"];
                        echo "<p> event NAME: " ;echo $row_event["name"]."</p>" ;
                        echo "<p> event ADDRESS: " ;echo $row_event["address"]."</p>" ;
                        echo "<p> DATE: " ;echo $row["date"]."</p>" ;
                        echo "<p> AUDIENCE SIZE: " ;echo $row["no_of_hours"]."</p>" ;
                        $points = $row_event["points"];
                        echo "<p> points: " ;echo $points."</p>" ;
                        echo"</td>";
                       }
  // echo "<meta http-equiv='refresh' content='0'>";
  
}

?>

            
              <?php
              if(isset($_POST['submit'])){ 
              $usnid = isset($_POST['user']) ? $_POST['user'] : '';
              $sql_sp = "CALL getBookings('$usnid')"; #procedure id implemented here
              $i=1; 
              if($res_sp = mysqli_query($data,$sql_sp)) {
                while($row_sp = mysqli_fetch_row($res_sp)){
                  //  print_r($row_sp);

                  echo "<br>";

                  echo "<tr>";
                        echo "<td> "; echo $i++ ;
                        echo"</td>";
                        echo "<td><p> NAME: "; echo $row_sp["1"]."</p>";
                        echo "<p> usn: "; echo $row_sp["2"]."</p>";
                        echo "<p> CONTACT: " ;echo $row_sp["3"]."</p>" ;
                        echo"</td>";
                        echo "<td><p> organization ID: "; echo $row_sp["5"]."</p>";  
                        echo "<p> event ID: "; echo $row_sp["4"]."</p>"; 
                        echo "<p> DATE: " ;echo $row_sp["6"]."</p>" ;
                        echo "<p> No of Hours " ;echo $row_sp["7"]."</p>" ;  
                        echo "<td>";
                        
                        while(mysqli_next_result($data));
                }
                
            
                
               
            }
            
            //  else {
            //     $error = $data->errno . ' ' . $data->error;
            //     echo $error; 
            // }
           
             }
              ?>
             </table>
             
              </div>
          </div>
        </div>
      </div>
    </section>
    

    
          </div>
        </div>
      </div>
    </div>
    <?php
      $data->close();
    ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
