<!DOCTYPE html>
<html lang="en">
<head>
  <title>AICTE ACTIVITY | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="style3.css?v=<?php echo time(); ?>">
  <!DOCTYPE html>
<?php 


$host="localhost";
$user="root";
$password="";

session_start();


$data=mysqli_connect($host,$user,$password);
mysqli_select_db($data, "user_info");
if($data===false)
{
	die("connection error");
}

?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      
      <a class="navbar-brand" href="#myPage">AICTE ACTIVITY</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li><a href="#organization">ORGANIZATIONS</a></li>
        <li><a href="events.php">EVENTS</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="profile.php">PROFILE</a></li>
        <li><a href="../login.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>WELCOME TO AITCE ACTIVITY PAGE</h1> 
  </div>

<!-- Container About Section -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>About Us</h2>
      <p>In accordance with the provisions of the AICTE Act (1987), for the first five years after its inception in 1988, the Minister for Human Resource Development, the Government of India,
         was the Chairman of the Council. The first full-time Chairman was appointed on July 2, 1993 and the Council was reconstituted in March 1994 with a term of three years. The Executive Committee was re-constituted on July 7,
          1994 and All India Board of Studies and Advisory Boards were constituted in 1994-95. Regional Offices of the Ministry of Human Resource Development, the Government of India, located in Kolkata, Chennai, Kanpur, and Mumbai were transferred to AICTE 
          and the staff working in these offices were also deputed to the Council on foreign service terms w.e.f. October 1, 1995.
         These offices functioned as secretariats of regional Committees in the four regions (North, East, West and South). Three new regional Committees in southwest, central, and northwest regions with their secretariats located in Bangalore, Bhopal, and Chandigarh, 
         respectively, were also established on July 27, 1994. One more regional committee in South-Central region with its Secretariat in Hyderabad was notified on March 8, 2007.</p>
      </div>
    <div class="col-sm-4">
      <img src="images\sideimg1.jpeg"><br>
      <img src="images\sideimg2.jpg">

    </div>
  </div>
</div>


<!-- Container Services Section -->
<!-- <div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-star logo-small"></span>
      <h4>BIRTHDAY EVENTS</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-heart logo-small"></span>
      <h4>WEDDING EVENTS</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-bullhorn logo-small"></span>
      <h4>PROMOTION EVENTS </h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>SPORTS EVENTS</h4>
      <p>Lorem ipsum dolor sit amet..</p>
    </div>
    
  </div>
</div> -->

<!-- events -->
 <div id="organization" class="container-fluid text-center bg-grey slideanim">
 
    <h1 class="text-center">List of Organizations</h1>
    <?php 
               $sql="SELECT * from `event` LIMIT 5;";
               $res = mysqli_query ($data, $sql);
            
               while($row = mysqli_fetch_array($res)):
                
        ?>
  
  <div class="m-auto">
  <div class="row-centerd slideanim ">
    <div class="col-md-4 col-xs-6 text-center">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1><?php echo ucwords($row['name']) ?></h1>
        </div>
        <div class="panel-body">
          
          <p><?php echo strip_tags($row['description']) ?></p>
        </div>
        
      </div>      
    </div> 
               </div>
                 </div>
     <?php endwhile; ?>
               </div>


<div id="contact" class="container-fluid">
  <h2 class="text-center con-h">CONTACT US</h2>
  <div class="row text-center">
    
      <p style = "display: inline;"><span class="glyphicon glyphicon-map-marker"></span> Banglore,Karnataka,India</p>
      <p style = "display: inline;"><span class="glyphicon glyphicon-phone"></span> 888 444 5554</p>
      <p style = "display: inline;"><span class="glyphicon glyphicon-envelope"></span> aicte@gmail.com</p>
    </div>
                <!-- <form action="" method="post"></form>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5" required></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-primary" name ="save" type="submit"> Send </button>
       </div>
      </div>
    </div>
    </form> -->
  </div>
</div>
 <?php
// if (isset($_POST["save"])){
//   $name =  isset($_POST["name"]) ? $_POST["name"] : '';
//   $email =isset($_POST["email"]) ? $_POST['email'] : '';
//   $comments = isset($_POST['comments']) ? $_POST['comments'] : '';
//   echo "set";
//   $query = "INSERT INTO `feedback`(`name`,`email`,`comments`) VALUES('$name','$email','$comments');";
//  $result = mysqli_query($data, $query);

//   if($result)
//     {
//       echo "<script>alert('Message sent successfully!');</script>";
//       // echo "<script> window.location = 'index.php'</script>";
//     }
//     $data->close();
//   // if(! $result = $data->query($query)){
//   //   die('error occured['.$data->error.']');
//   // }
//   // else
//   // {
//   //   echo 'thank you for your feedback';
//   // }
// }

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
<script>
$(document).ready(function(){
  
  $(".navbar a, footer a[href='#myPage']").on('click', function(organization) {
   
    if (this.hash !== "") {
      
      organization.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
    window.location.hash = hash;
      });
    } 
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>


</body>
</html>