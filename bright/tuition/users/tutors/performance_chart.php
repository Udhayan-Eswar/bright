<html>
  <head>
    
  </head>
  <body>
    
  </body>
</html>

<?php
include_once('static/connection.php');
?>
<?php
session_start();
if(isset($_SESSION['username']))
{
  $name = $_SESSION['username'];
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
 <link rel="stylesheet" href="static/feedback.css"> 


    <!-- Chart -->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Time','Student', 'Rating'],
          <?php
$result = mysqli_query($con," select * from feedback where to_tutor = '$name' ");
while($row = mysqli_fetch_assoc($result))
     {
        $rating = $row['rating'];
        $student_id = $row['from_student_id'];
        $time = $row['time'];
        ?>
    ['<?php echo $time;?>',<?php echo $student_id;?>,<?php echo $rating;?>],
    <?php
    }
    ?>
        ]);

        var options = {
          title: 'Tutor Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


</head>
<body>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



<!-- The sidebar -->
<div class="sidebar">
  <a  href="home.php">Home</a>
  <a href="feedback.php">Feedback</a>
  <a class="active" href="performance_chart.php">Performance Chart</a>
  <!-- <a href="#view_courses.php">View Courses</a> -->
  <a href="https://www.onlinegdb.com/classroom">ClassRoom</a>
  <a  href="users/students/chat.php" style=" text-decoration:none" >Chat</a>
  <a href="contactus.php" style=" text-decoration:none" >Contact-Us</a>
  
</div>

<!-- Page content -->
<div class="content">

<nav>
    <div class="nav-wrapper grey lighten-5">
      <a href="home.php" class="brand-logo black-text" >Performance over the time period</a>
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#profile.php"  style="color:black;"><?php echo strtoupper($name);?></a></li>
      <li><a href="#notifications.php"><i class="material-icons" style="color:black;">notifications</i></a></li></a>
      
        <!-- <li><a href="badges.html" class="black-text">Components</a></li> -->
        <li><a href="logout.php" class="black-text">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- Chart comes here -->
  <div class="mid" id="curve_chart" style="width: 900px; height: 500px"></div>




</div>
</body>
</html>