<?php
include_once('static/connection.php');
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
  <a  href="dashboard.php">Home</a>

  <a class="active" href="manage_tutors.php">Manage Tutors</a>
  <ul><a href="#performance.php" style="background-color:#e040fb;">Performance</a></ul>
  <ul><a href="#students_under_care.php" style="background-color:#e040fb;">Students Under Care</a></ul>
  <a href="manage_students.php">Manage Students</a>
  <a href="#performance_chart.php">Performance Chart</a>
  <a href="https://www.onlinegdb.com/classroom">ClassRoom</a>
  
  
</div>

<!-- Page content -->
<div class="content">

<nav>
    <div class="nav-wrapper grey lighten-5">
      <a href="#" class="brand-logo black-text" >Manage Tutors</a>
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">
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
         <th>Name</th>
         <th>Tutor-Id</th>
         <th>Gender</th>
         <th>Age</th>
         <th>Education</th>
         <th>Language</th>
         <th>Email</th>
         <th>Phone</th>
         <th>DOJ</th>
   
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
    $gender = $row['gender'];
    $age = $row['age'];
    $education = $row['education'];
    $language = $row['language'];
    $phone = $row['phone'];
    $email = $row['email'];
    $date_of_joining = $row['doj'];


echo "<tr><td>  $name  </td><td>  $tutor_id  </td><td> $gender </td><td> $age  </td><td> $education  </td><td> $language  </td><td> $phone  </td><td> $email  </td><td> $date_of_joining";

  }
    

  

?>
  </tr>
</tbody>
</table>



</div>
</body>
</html>