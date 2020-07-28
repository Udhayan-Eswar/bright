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

<?php
 if(isset($_POST['feedback']))
 {
     $student_id='';
     $by = $name;
     $result = mysqli_query($con," select student_id from students where name = '$by' ");
     while($row = mysqli_fetch_assoc($result))
     {
        $student_id = $row['student_id'];
     }
     $tutor_id = $_POST['select_tutor'];
     $rating = $_POST['rating'];
     $comment = $_POST['comments'];
     $result = mysqli_query($con," select name from tutors where tutorid=$tutor_id ");
     while($row = mysqli_fetch_assoc($result))
     {
        $tutor_name = $row['name'];
     }
    //  feedback_id	from_student	from_student_id	to_tutor	to_tutor_id	rating	comments	time	
     $query = "INSERT INTO feedback (from_student,from_student_id,to_tutor,to_tutor_id,rating,comments) VALUES ('$by','$student_id','$tutor_name','$tutor_id','$rating','$comment')";
     if(mysqli_query($con, $query))
     {
       echo"
       <script>
      window.alert('Feedback Sent');
      </script>";
     }
 }
?>

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

    <title>Feedback</title>
    <style>
        .content{
            text-decoration:none;
        }
    </style>
  </head>
  <body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


  <!-- The sidebar -->
<div class="sidebar" >

  <a  href="home.php" style=" text-decoration:none" >Home</a>
  <a class="active" href="feedback.php" style=" text-decoration:none" >Feedback</a>
  <a href="#performance_chart.php" style=" text-decoration:none" >Performance Chart</a>
  <a href="#view_courses.php" style=" text-decoration:none" >View Courses</a>
  <a href="https://www.onlinegdb.com/classroom" style=" text-decoration:none" >ClassRoom</a>
  <a href="chat.php" style=" text-decoration:none" >Chat</a>
  <a href="../../contactus.php" style=" text-decoration:none" >Contact-Us</a>
  
</div>

<!-- content -->
  <div class="content">

<nav>
    <div class="nav-wrapper grey lighten-5">
      <a href="Feedback.php" class="brand-logo black-text" style=" text-decoration:none;"  >Feedback</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#profile.php"  style="color:black;text-decoration:none;"><?php echo strtoupper($name);?></a></li>
      <li><a href="#notifications.php" style=" text-decoration:none"><i class="material-icons" style="color:black;">notifications</i></a></li></a>
      
        <!-- <li><a href="badges.html" class="black-text">Components</a></li> -->
        <li><a href="logout.php" class="black-text" style=" text-decoration:none" >Logout</a></li>
      </ul>
    </div>
  </nav>

  


  
<div class="card green lighten-5" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title">Feedback</h5>
    <h6 class="card-subtitle mb-2 text-muted">Your Feedback helps us grow!</h6>
    <p class="card-text">Please give the rating on what u felt not for name sake.</p>
    <form method="POST">
  <div class="form-group">
    <label for="Tutor" style="color:black;">Select Tutor</label>
    <select class="form-control" name="select_tutor" id="Tutor">
    <?php
    $result = mysqli_query($con," select name,tutorid from tutors ");
    while($row = mysqli_fetch_assoc($result))
    {
        $tutor_id = $row['tutorid'];
        $name = $row['name'];
        ?>
      <option value='<?php echo $tutor_id;?>'Name:<?php echo $name; ?>> ------ Id:<?php echo $tutor_id;?> </option>
      <?php
    }
    ?>
    </select>
  </div>
  <label for="rating" style="color:black;">Rate our tutor out of 5:</label> 
  <div>
  <p>
    <label>
      <input class="with-gap" name="rating" value="1" type="radio"  />
      <span style="color:black;">1</span>
    </label>
  </p>
  <p>
    <label>
      <input class="with-gap" name="rating" value="2" type="radio"  />
      <span style="color:black;">2</span>
    </label>
  </p>
  <p>
    <label>
      <input class="with-gap" name="rating" value="3" type="radio"  />
      <span style="color:black;">3</span>
    </label>
  </p>
  <p>
    <label>
      <input class="with-gap" name="rating" value="4" type="radio"  />
      <span style="color:black;">4</span>
    </label>
  </p>
  <p>
    <label>
      <input class="with-gap" name="rating" value="5" type="radio"  />
      <span style="color:black;">5</span>
    </label>
  </p>
  </div>
<div class="form-group">
    <label for="comments" style="color:black;">Write us what we need to improve or what we need to change</label>
    <textarea class="form-control" id="comment" rows="3" placeholder="Write your comments" name="comments"></textarea>
  </div>
  <center>  <button type="submit" name="feedback" class="btn btn-outline-success">Send</button>
  <button type="reset" name="reset" class="btn btn-outline-danger">Reset</button>
  </center>
  
  </form>
  </div>
</div>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>