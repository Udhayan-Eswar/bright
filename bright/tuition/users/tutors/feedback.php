<?php
include_once('static/connection.php');
session_start();
if(isset($_SESSION['username']))
{
  $name = $_SESSION['username'];
  $result = mysqli_query($con," select tutorid from tutors where name = '$name' ");
     while($row = mysqli_fetch_assoc($result))
     {
        $tutor_id = $row['tutorid'];
     }
}
else
{
  echo "<script>
    window.location.href = '../index.php';
    </script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bright-Tuition</title>
     <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="static/dashboard.css"> 
 <link rel="stylesheet" href="static/dashboard_dropdown.css"> 



</head>
<body>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



<!-- The sidebar -->
<div class="sidebar">
  <a  href="home.php">Home</a>
  <a class="active" href="feedback.php">Feedback</a>
  <a href="performance_chart.php">Performance Chart</a>
  <a href="#view_courses.php">View Courses</a>
  <a href="https://www.onlinegdb.com/classroom">ClassRoom</a>
  <a  href="users/students/chat.php" style=" text-decoration:none" >Chat</a>
  <a href="contactus.php" style=" text-decoration:none" >Contact-Us</a>
  
</div>

<!-- Page content -->
<div class="content">

<nav>
    <div class="nav-wrapper grey lighten-5">
      <a href="#" class="brand-logo black-text" >Received Feedbacks</a>
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#profile.php"  style="color:black;text-decoration:none;"><?php echo strtoupper($name);?></a></li>
      <li><a href="#notifications.php"><i class="material-icons" style="color:black;">notifications</i></a></li></a>
      
        <!-- <li><a href="badges.html" class="black-text">Components</a></li> -->
        <li><a href="logout.php" class="black-text">Logout</a></li>
      </ul>
    </div>
  </nav>

 
  <?php
  echo "
   <table>
   <thead>
     <tr>
         <th>Student_ID</th>
         <th>Student_Name</th>
         <th>Comments</th>
         <th>Date</th>
         
   
     </tr>
   </thead>
   

<tbody>
 <tr>";
$result = mysqli_query($con," select * from feedback where to_tutor_id = $tutor_id ");
// $count = mysqli_query($con," select count() from tutors ");
while($row = mysqli_fetch_assoc($result))
  {
    
    $student_id = $row['from_student_id'];
    $student_name = $row['from_student'];
    $comment = $row['comments'];
    $date_of_receiving = $row['time'];


echo "<tr><td>  $student_id  </td><td>  $student_name  </td><td> $comment </td><td> $date_of_receiving  </td></tr> ";

  }
    

  

?>
  </tr>
</tbody>
</table>



</div>
</body>
</html>