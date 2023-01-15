<!DOCTYPE html>
<html lang="en">
<?php 
 include('../connection.php'); 

 $organization_id = $_GET["id"];
 $name ="";
 $description ="";
 $sql_sel = "SELECT * FROM `organization` where `id` = $organization_id";
 $res = mysqli_query($data, $sql_sel);
 while($row = mysqli_fetch_array($res)){
     $name = $row["name"];
     $description = $row["description"];
 }
 
 ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Organizations</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <?php
if(isset($_POST["update"])){
    $name1 =  isset($_POST['name']) ? $_POST['name'] : '';
    $description1 = isset($_POST['description']) ? $_POST['description'] : '';
    $sql_name="SELECT * FROM `organization` WHERE `name`= '$name1'";
    $db_name = mysqli_query($data, $sql_name);
    if($name!= $name1 && mysqli_num_rows($db_name)!=0){
      $name_error = "organization already exits";
      echo "<script>alert('$name_error');</script>";
      echo "<script> window.location = 'organizations.php'</script>";
  } else {
    $sql_update = "UPDATE `user_info`.`organization` set `name`= '$name1' , `description` = '$description1' where `id` = '$organization_id' ";
    $result = mysqli_query($data, $sql_update);
    if($result)
    {
      echo "<script>alert('organization updated successfully!');</script>";
      echo "<script> window.location = 'organizations.php'</script>";
    }
    $data->close();
  }
}


?>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          </button>
          <a class="navbar-brand" href="#">AICTE Activity</a>
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
            <h1><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>Organizations</h1>
            </div>
            <div class="col-md-2">
      </div>
    </header>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item ">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="bookings_list.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Bookings List </a>
              <a href="organizations.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Organizations </a>
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
                <h3 class="panel-title">Organizations</h3><br>
                
          
              <div class="panel-body">
              <form action="" method="post">
        
              <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>" required>
                </div>
            
           <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="description" class="form-control" placeholder="Description" value="<?php echo $description; ?>" required >
                </div>
            
            
          <div class="modal-footer">
          <a href="organizations.php">  <button type="button" class="btn btn-default" >Close</button></a>
            <button type="submit" name="update" class="btn btn-default">Save changes</button>
          </div>
        </div>
        </form>
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>
    <?php
   unset($name_error);
  
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>