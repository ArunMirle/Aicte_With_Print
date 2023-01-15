
<!DOCTYPE html>
<?php
  include "../connection.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
</head>
<body>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">
    
</head>
<body id="home">
    <header class="homepage">
        <nav id="navbar">

            
             <h1 id="logo">AICTE ACTIVITY</h1>
                    <ul>
                    <li><a href="../users/index.php">Home</a></li>
                    </ul>
        </nav>  
            <div class="homepage-content">
                <h1>Enroll for events by filling your details here</h1>
                <form action="" class="booking" method="post">
                    <div class="booking-form">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" required>
                    </div>
                    <div class="booking-form">
                        <label for="usn$usn">USN</label>
                        <input type="usn$usn" name="usn$usn" id="usn$usn" placeholder="Enter usn" required>
                    </div>
                    <div class="booking-form">
                       <label for="phone">Phone</label> 
                       <input type="text" name="phone_number" id="number" placeholder="Enter phone" required>
                    </div>
                    <div class="booking-form">
                        <label for="organization Type" >Organization Type</label> 
                        <div class="select">
                            <select name="organizations" id="organizations" required>
                            
                         <?php 
                            $sql1="SELECT * from `organization`;";
                            $res1 = mysqli_query ($data, $sql1);
                         
                            while($row1 = mysqli_fetch_array($res1)):      
                         ?>
                
                        <option><?php echo ucwords($row1['name']) ?></option>
                        <?php endwhile; ?>
                         </select>
                    </div>
                    </div>
                    
                    <div class="booking-form">
                        <label for="Date">Date</label> 
                        <input type="date" name="date" id="Date" required>
                     </div>
                     <div class="booking-form">
                        <label for="size">No of Hours</label> 
                        <input type="text" name="size" id="size" placeholder="Enter no of hours" required>
                     </div>
                    <div class="booking-form">
                        <input type="submit" name="submit" value="Confirm" id="submit" class="btn">
                    </div>
            </form>
            </div>
     </header>

     
<?php
if(isset($_POST["submit"])){ 
 
    $name =  isset($_POST['name']) ? $_POST['name'] : '';
    $usn =isset($_POST['usn$usn']) ? $_POST['usn$usn'] : '';
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $organization =  isset($_POST['organizations']) ? $_POST['organizations'] : '';
    $date =  isset($_POST['date']) ? $_POST['date'] : '';
    $no_of_hours=isset($_POST['size']) ? $_POST['size'] : '';
    $event_id = $_GET["id"];
  
  $sql_1 = "SELECT * FROM `event_booking`";
  $res_sql_1 = mysqli_query($data, $sql_1);
  $count1=mysqli_num_rows($res_sql_1);

  $sql_eid = "SELECT * FROM `organization` where `name` = '$organization'";
  $res_eid = mysqli_query($data, $sql_eid);
 
 $row_eid = mysqli_fetch_array($res_eid);
  $eid = $row_eid['id'];

  $sql_vbeq = " SELECT * FROM `event_booking` where `event_id` = '$event_id' and `date` = '$date'";
  $res_vbeq = mysqli_query($data, $sql_vbeq);
  if(mysqli_num_rows($res_vbeq) !=0){
    echo "<script>alert('Choose a different date!');</script>";
    echo "<script> window.location = 'booking.php'</script>";
  }  else {
  
  

  $sql = "INSERT INTO `user_info`.`event_booking`(`user_name`,`usn`, `user_phone`, `event_id`, `organization_id`, `date`, `no_of_hours`) values ('$name','$usn' ,'$phone_number','$event_id', '$eid','$date','$no_of_hours');";
 mysqli_query($data, $sql);
 
    //  echo $sql;
    $sql = "SELECT * FROM `event_booking`";
    $res_sql = mysqli_query($data, $sql);
    $count=mysqli_num_rows($res_sql);

    $chairs =  $no_of_hours; 
    $tables =  $no_of_hours/2 ;
    $speakers = $no_of_hours>10 ? $no_of_hours/10 : 2;
    $lights = $no_of_hours>10 ? $no_of_hours/5 : 5 ;
    $microphones = $no_of_hours>10 ? $no_of_hours/15 : 3 ;

    if($count-$count1 == 1){
  
  $sql_vbi = "SELECT `id` from `user_info`.`event_booking` ORDER BY `id` DESC LIMIT 1;  ";
  $res = mysqli_query($data, $sql_vbi);
  while($row = mysqli_fetch_array($res)){
    $id = $row["id"];
  }

}
  }
  $data->close();
    }
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <!-- <script type="text/javascript">
     $(function(){
        $('#submit').click(function(){

            var valid = this.form.checkValidity();
            organization.prorganizationDefault();
            if(valid){
            var name = $('#name').val();
            var usn$usn = $('#usn$usn').val();
            var phone = $('#number').val();
            Swal.fire(
  'Congratulations!',
  'organization Booked',
  'success',
  
            
)
. then(function() {
window.location = "../users/index.php";
});
         } else {
            Swal.fire(
  'Error!',
  'Booking failed',
  'error'
)
         }
         });
       
     });
     </script> -->
</body>
</html>