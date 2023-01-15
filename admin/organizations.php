<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Organization</title>
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
            <h1><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Organization</h1>
            </div>
            <div class="col-md-2">
              <div class="dropdown create">
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#addPage" >
                  Add Organization</button>
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
              <a href="bookings_list.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Enrollment List </a>
              <a href="organization.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Organization </a>
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
                <h3 class="panel-title">Organization</h3><br>
                
              </div>
              <div class="panel-body">
                
                <table class="table table-striped table-hover">
                      <tr>
                        <th>organization no</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Operation</th>
                      </tr>
                      <?php  include('../connection.php'); ?>
                      <?php
                       $sql="SELECT * from `organization`";
                       $res = mysqli_query ($data, $sql);
                       $i=1;
                       while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>"; echo $i++; echo" </td>";
                        echo "<td>"; echo $row["name"]; echo" </td>";
                        echo "<td>"; echo $row["description"]; echo" </td>";
                        $id =  $row["id"];
                        echo "<td>"; echo "<a class='btn btn-default' href='edit_organization.php?id= $id'>Edit</a> <a class='btn btn-primary' href='delete_organization.php?id= $id'>Delete</a>"; echo" </td>";
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
            <h4 class="modal-title" id="myModalLabel">New Event</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
            
           <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="desc" class="form-control" placeholder="Description" required >
                </div>
            
            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        </form>
        
      </div>
    </div>
    <?php
if(isset($_POST['save'])){ 
 
  $name =  isset($_POST['name']) ? $_POST['name'] : '';
  $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
  $sql_name="SELECT * FROM `event` WHERE `name`= '$name'";
    $db_name = mysqli_query($data, $sql_name);
    if(mysqli_num_rows($db_name)!=0){
      $name_error = "Organization already exits";
      echo "<script>alert('$name_error');</script>";
      echo "<script> window.location = 'organization.php'</script>";
  } else {
  $sql_addevent = "INSERT INTO `event`(`name`, `description`) VALUES ('$name','$desc');";
  $result = mysqli_query($data, $sql_addevent);
  echo "<meta http-equiv='refresh' content='0'>";
  if($result)
    {
      echo "<script>alert('Organization added successfully!');</script>";
      echo "<script> window.location = 'organizations.php'</script>";
    }
  $data->close();
  }
  unset($sql_name);
}

?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>