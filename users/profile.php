<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


  
    <header class="homepage" >
      
        <nav id="navbar" class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header" style="font-size:30px;">
             AICTE ACTIVITY DBMS
             </div>  <ul style="margin-top:10px;">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                    <li><a href="../login.php">LOGOUT</a></li>
                    </ul>
                    
                    </nav>
      </header>
      
<?php include('../log1.php'); ?>
<?php
    // header("refresh: 3;");
?>
        
  <div class="container">
  <div class="card m-auto" style="width:400px">
    <h4 class="card-title">Welcome <?php echo $_SESSION['name'];?></h4>
    <img class="card-img-top m-auto" src="images/avtar.jpg" alt="Card image" style="width:100px; height: 100px; padding: 10px; border-radius:50%;">
    <div class="card-body">
      
      <p> <b>Name:  </b><?php echo $_SESSION['name'];?> <hr> </p>
      <p> <b>usn:  </b><?php echo $_SESSION['usn'];?> <hr> </p>
      <p> <b>Contact:  </b><?php echo $_SESSION['phone_no'];?> <hr> </p>
      <a href="editprofile.php" class="btn btn-primary">Edit profile</a>
    </div>
  </div>
  <br>  
</div>
<center>

        <div class="panel-body">
                
          <table class="table table-striped table-hover">
            <tr>
            <th>#</th>
            <th>Organization Type</th>
            <th>Event Type</th>
            <th>Organization Address</th>  
            <th>Date</th> 
            <th>No of Hours</th>
            <th>Points</th>
            <th>Action</th>
            </tr>
        <?php 
        $i=1;
        $link = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($link, "user_info");
        $sql="SELECT * from `event_booking` where `user_phone` ='".$_SESSION['phone_no']."' ";
        $sql_organization_name = "SELECT `name` FROM `organization` e, `event_booking` v where e.id = v.organization_id and v.user_phone = ".$_SESSION['phone_no']."  ";
        $res = mysqli_query ($link, $sql);
        $res_organization_name = mysqli_query($link, $sql_organization_name);
        $sql_event = "SELECT * FROM `event` v, `event_booking` vb where v.id = vb.event_id and vb.user_phone = ".$_SESSION['phone_no']."  ";
        $res_event = mysqli_query($link, $sql_event);
        while($row = mysqli_fetch_array($res) 
        and $row_organization_name = mysqli_fetch_array($res_organization_name)
         and $row_event = mysqli_fetch_array($res_event) 
         )
        { 
          $equip_id="";
        echo "<tr>";
          //  echo "<td>"; echo $row["user_name"]; echo" </td>";
          //  echo "<td>"; echo $row["user_phone"]; echo" </td>";
          echo "<td>"; echo $i++; echo" </td>";
           echo "<td>"; echo $row_organization_name["name"]; echo" </td>";
           echo "<td>"; echo $row_event["name"]; echo" </td>";
           echo "<td>"; echo $row_event["address"]; echo" </td>";
           echo "<td>"; echo $row["date"]; echo" </td>";
           echo "<td>"; echo $row["no_of_hours"]; echo" </td>";
            $points = $row_event["points"];
           echo "<td>"; echo $points; echo" </td>";
           $id = $row["id"];
           echo "<td> "; echo "<p><a href = 'delete.php?id= $id'>"; echo "<button type='submit'>Cancel</button></p>";
            echo "</td>";
        echo "</tr>";
        }
        
        ?>
        </table>
              </div>
     
</body>

<style>
  body{
    background-color:#B1D0E0;
    /* background: rgba(0,0,0,0.6); */
  }
  
    .card-title {
    margin-bottom: 0.5rem;
    color: black;
    text-align: center;
}
.card{
  padding: 10px;
  border-radius:20px;
  background-color: rgba(255, 255, 255,0.5);
}
button{
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
    border-radius:5px;
}
button:hover{
  color: #fff;
    background-color: #052d67;
    border-color: #052d67;
}
.container {
    margin-top: 6rem !important ;
}
 #navbar{
    background:#7E5EC2;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: auto;
    padding: 0 30px;
    width: 100%;
    top:0;
    position: fixed;
    height: 50px;
    z-index: 2;
}
#navbar ul{
    display: flex;
    list-style: none;
}
#navbar ul a{
margin-right: 80px;
padding: 20px;
color: #fff;
text-decoration: none;    
}
#navbar ul a:hover{
    background: white;
    color:#7E5EC2;
}
table{
  margin: 20px;
  display: inline;
  /* background-color: rgba(255, 255, 255, 1) !important; */

}
.table>:not(caption)>*>* {
    padding: 0.5rem 0.5rem;
    background-color: white !important;
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
</style>
</html>
