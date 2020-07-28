<?php
include_once('static/connection.php');
session_start();
if(isset($_SESSION['username']))
{
  $name = $_SESSION['username'];
}
else{
    echo "<script>
 window.location.href = '../index.php';
 </script>";
}
?>


<!-- //  if(isset($_POST['chat']))
//  {
//      $flag=0;
//     // header("Location: ../../chatroom.php");
    
//     echo'
//     <script>
//     window.location.href("../chatroom.php");
//    </script>';

//  } -->


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="static/feedback.css">
    <link rel="stylesheet" href="static/dashboard.css"> 
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Chat</title>
    <style>
        .content{
            text-decoration:none;
        }
    </style>

<script>
    function redirect_to_url()
    {
    window.location.href="../../chatroom.php";
    }
</script>

  </head>
  <body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


  <!-- The sidebar -->
<div class="sidebar" >

  <a  href="home.php" style=" text-decoration:none" >Home</a>
  <a  href="feedback.php" style=" text-decoration:none" >Feedback</a>
  <a href="#performance_chart.php" style=" text-decoration:none" >Performance Chart</a>
  <a href="#view_courses.php" style=" text-decoration:none" >View Courses</a>
  <a href="https://www.onlinegdb.com/classroom" style=" text-decoration:none" >ClassRoom</a>
  <a href="chat.php" style=" text-decoration:none"class="active" >Chat</a>
  <a href="../../contactus.php" style=" text-decoration:none" >Contact-Us</a>
  
</div>

<!-- content -->
  <div class="content">

<nav>
    <div class="nav-wrapper grey lighten-5">
      <a href="Feedback.php" class="brand-logo black-text" style=" text-decoration:none;"  >Chat</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#profile.php"  style="color:black;text-decoration:none;"><?php echo strtoupper($name);?></a></li>
      <li><a href="#notifications.php" style=" text-decoration:none"><i class="material-icons" style="color:black;">notifications</i></a></li></a>
      
        <!-- <li><a href="badges.html" class="black-text">Components</a></li> -->
        <li><a href="logout.php" class="black-text" style=" text-decoration:none" >Logout</a></li>
      </ul>
    </div>
  </nav>
<!-- Chat -->
<?php
  echo "
   <table>
   <thead>
     <tr>
         <th>Name</th>
         <th>Tutor-Id</th>
        
   
     </tr>
   </thead>
   

<tbody>
 <tr>";
$result = mysqli_query($con," select * from tutors ");
// $count = mysqli_query($con," select count() from tutors ");
while($row = mysqli_fetch_assoc($result))
  {
    
    $tutor_id = $row['tutorid'];
    $name = $row['name'];


echo "<tr><td>  $name  </td><td>  $tutor_id  </td><td>";?></td><td><button class="btn btn-outline-success"><a  style="font-size:13px;text-decoration:none;color:black;" href="../../chatroom.php?id=<?php  echo $tutor_id;?>">Chat</a></button></td></tr>
<?php
  }
    

  

?>
 
  </tr>
</tbody>
</table>
  


  





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>