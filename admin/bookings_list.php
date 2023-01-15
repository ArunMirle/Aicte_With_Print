<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Events List</title>
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
            <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Enrollment List</h1>
          </div>
          <div class="col-md-2">
            <div class="dropdown create">
              
              </div>
      </div>
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
              <a href="bookings_list.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Enrollment List </a>
              <a href="organizations.php" class="list-group-item"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Organizations </a>
              <a href="events.php" class="list-group-item"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Events </a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users </a>
              <a href="filter.php" class="list-group-item"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter </a>
              <a href="event_logs.php" class="list-group-item"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Deleted events </a>
              </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Enrollment List</h3><br>
                
              </div>
              <div class="panel-body">
                <table class="table table-striped table-hover">
                      <tr>
                        <th>#</th>
                        <th>Student Information</th>
                        <th>Enrollment Information</th>
                        <th>Operation</th>
                      </tr>
                      <?php  include('../connection.php'); ?>
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
                        echo "<p> points: " ;echo $points."</p>" ;
                        echo"</td>";
                       
                        // echo "<td>"; echo $row["description"]; echo" </td>";
                        
                        echo "<td>"; echo "<a class='btn btn-default' href='edit_bookings.php?id=$id'>Edit</a> <a class='btn btn-primary' href='delete_bookings.php?id=$id'>Delete</a>"; echo" </td>";
                        echo "</tr>";
                       }
                      ?>
                      
                   
                      
                    </table>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="" method="post">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">New Entry</h4>
              </div>
             <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                  </div>

                  <div class="form-group">
                    <label>usn</label>
                    <input type="text" name="usn" class="form-control" placeholder="usn" required>
                  </div>
              
              <div class="form-group">
                <label>Phone number</label>
                <input type="text" name="phone" class="form-control" placeholder="Contact" required>
              </div>

              <div class="form-group">
                    <label>event</label>
                    <input type="text" name="event" class="form-control" placeholder="event name" required>
                  </div>
                  <div class="form-group">
                    <label>organization</label>
                    <input type="text" name="organization" class="form-control" placeholder="organization name" required>
                  </div>
                  <div class="form-group">
                        <label for="Date">Date</label> 
                        <input type="date" name="date" id="Date" required>
                     </div>
                  <div class="form-group">
                    <label>Audience size</label>
                    <input type="number" name="size" class="form-control" placeholder="size" required>
                  </div>
                  
              <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="save" class="btn btn-primary">Save </button>
             </div>
              </div>
           </form>
          <?php

           if(isset($_POST['save'])){ 
            
             $name =  isset($_POST['name']) ? $_POST['name'] : '';
             $usn =isset($_POST['usn']) ? $_POST['usn'] : '';
             $phone_number = isset($_POST['phone']) ? $_POST['phone'] : '';
             $event =  isset($_POST['event']) ? $_POST['event'] : '';
             $organization =  isset($_POST['organization']) ? $_POST['organization'] : '';
             $date =  isset($_POST['date']) ? $_POST['date'] : '';
             $size =  isset($_POST['size']) ? $_POST['size'] : '';

            $sql_ven = "SELECT * FROM `event` WHERE `name`='$event'";
            $res_ven = mysqli_query($data, $sql_ven);
            $row_ven = mysqli_fetch_array($res_ven);
            $ven_id = $row_ven['id'];
            
            $sql_eve = "SELECT * FROM `organization` WHERE `name`='$organization'";
            $res_eve = mysqli_query($data, $sql_eve);
            $row_eve = mysqli_fetch_array($res_eve);
            $eve_id = $row_eve['id'];
            
            $sql_vbeq = " SELECT * FROM `event_booking` where `event_id` = '$ven_id' and `date` = '$date'";
            $res_vbeq = mysqli_query($data, $sql_vbeq);
      
              if($vbeq)
             {
               echo "<script>alert('organization added successfully!');</script>";
               echo "<script> window.location = 'bookings_list.php'</script>";
             }
             }

          
             
      //        echo "<meta http-equiv='refresh' content='0'>";
             $data->close();
           
           
           ?>
          </div>
        </div>
      </div>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>