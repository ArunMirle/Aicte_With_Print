<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
 include('../connection.php'); 

 $id = $_GET["id"];
 $name =   '';
 $usn = '';
 $phone_number ='';
 $organization_id =  '';
 $event_id =  '';
 $date =  '';
 $no_of_hours =  '';
 $sql_sel_booking = "SELECT * FROM `event_booking` where `id` = $id";
 $res_sel_booking = mysqli_query($data, $sql_sel_booking);
 while($row = mysqli_fetch_array($res_sel_booking)){
     $name = $row["user_name"];
     $usn = $row["usn"];
     $phone_number = $row["user_phone"];
     $organization_id = $row["organization_id"];
     $event_id = $row["event_id"];
     $date = $row["date"];
     $no_of_hours = $row["no_of_hours"];
 }

 $sql_ven_name = "SELECT * FROM `event` where `id` = $event_id";
 $res_ven_name = mysqli_query($data, $sql_ven_name);
 $ven_name="";
 while($row_ven_name = mysqli_fetch_array($res_ven_name)){
  $ven_name= $row_ven_name["name"];
 }
 
 $sql_eve_name = "SELECT * FROM `organization` where `id` = $organization_id";
 $res_eve_name = mysqli_query($data, $sql_eve_name);
 $eve_name="";
 while($row_eve_name = mysqli_fetch_array($res_eve_name)){
  $eve_name= $row_eve_name["name"];
 }

 




 ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | event List</title>
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
          <a class="navbar-brand" href="#">organization MANAGEMENT</a>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Bookings List</h1>
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
              <a href="bookings_list.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Bookings List </a>
              <a href="organizations.php" class="list-group-item"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> organizations </a>
              <a href="events.php" class="list-group-item"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> events </a>
              <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users </a>
              <a href="filter.php" class="list-group-item"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter </a>
              <a href="event_logs.php" class="list-group-item"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Deleted events </a>
        </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Bookings List</h3><br>
              <div class="panel-body">
              
            <div class="modal-body">
              <!-- <div class="form-group">
                <label>event</label>
                <select name="" id="">
                    <option>......</option>
                    <option>......</option>
                    <option>......</option>
                </select>
              </div> -->
              <form action="" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>" required>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="usn" class="form-control" placeholder="Email" value="<?php echo $usn; ?>" required>
                  </div>
              
              <div class="form-group">
                <label>Phone number</label>
                <input type="text" name="phone" class="form-control" placeholder="Contact" value="<?php echo $phone_number; ?>" required>
              </div>

              <div class="form-group">
                    <label>event</label>
                    <input type="text" name="event" class="form-control" placeholder="event name" value="<?php echo $ven_name; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>organization</label>
                    <input type="text" name="organization" class="form-control" placeholder="organization name" value="<?php echo $eve_name; ?>" required>
                  </div>
                  <div class="form-group">
                        <label for="Date">Date</label> 
                        <input style="color:black;" type="date" name="date" id="Date" value="<?php echo $date; ?>" required>
                     </div>
                  <div class="form-group">
                    <label>Audience size</label>
                    <input type="number" name="size" class="form-control" placeholder="size" value="<?php echo $no_of_hours; ?>" required>
                  </div>
                  
                    
            <div class="modal-footer">
            <a href="bookings_list.php"> <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
              <button type="submit" name="save" class="btn btn-default">Save changes</button>
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
            
            $sql_vbeq = " SELECT * FROM `event_booking` where `event_id` = '$event_id' and `date` = '$date'";
        $res_vbeq = mysqli_query($data, $sql_vbeq);
  if(mysqli_num_rows($res_vbeq) !=0){
    echo "<script>alert('Choose a different date or event!');</script>";
    echo "<script> window.location = 'bookings_list.php'</script>";
  }  else {
            
             $sql_updatebook = "UPDATE `user_info`.`event_booking` set `user_name`= '$name', `usn` = '$usn', `user_phone` = '$phone_number' , `event_id` = '$ven_id', `organization_id` = '$eve_id', `date` = '$date', `no_of_hours` = '$no_of_hours' where `id` = '$id';";
             $res = mysqli_query($data, $sql_updatebook);

             $sql_equip = "UPDATE  `user_info` where `event_booking_id` = '$id' ;"   ;
             $result = mysqli_query($data, $sql_equip);
             if($result)
               {
                 echo "<script>alert('Booking information updated successfully!');</script>";
                 echo "<script> window.location = 'bookings_list.php'</script>";
               }
              }
             echo "<meta http-equiv='refresh' content='0'>";
             $data->close();
           }
           
           ?>
          </div>
        </div>
      </div>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>