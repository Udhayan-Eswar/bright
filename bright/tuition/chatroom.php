<?php
include_once('users/students/static/connection.php');
session_start();
if(isset($_SESSION['username']))
{
  $name = $_SESSION['username'];
  $result = mysqli_query($con,"select student_id from students where name='$name'");
  while($row = mysqli_fetch_assoc($result))
  {
    $student_id = $row['student_id'];
  }
}
?>
<?php
$tutor_id = $_GET['id'];
$result = mysqli_query($con,"select name from tutors where tutorid='$tutor_id'");
while($row = mysqli_fetch_assoc($result))
{
  $tutor_name = $row['name'];
}
?>


<!-- chat_id	from_person	from_id	to_person	to_id	message	time	 -->

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
    <link rel="stylesheet" href="users/students/static/feedback.css">
    <link rel="stylesheet" href="users/students/static/dashboard.css"> 
    
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

  <a  href="users/students/home.php" style=" text-decoration:none" >Home</a>
  <a  href="users/students/feedback.php" style=" text-decoration:none" >Feedback</a>
  <a href="#users/students/performance_chart.php" style=" text-decoration:none" >Performance Chart</a>
  <a href="#view_courses.php" style=" text-decoration:none" >View Courses</a>
  <a href="https://www.onlinegdb.com/classroom" style=" text-decoration:none" >ClassRoom</a>
  <a class="active" href="users/students/chat.php" style=" text-decoration:none" >Chat</a>
  <a href="contactus.php" style=" text-decoration:none" >Contact-Us</a>
  
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
        <li><a href="users/students/logout.php" class="black-text" style=" text-decoration:none" >Logout</a></li>
      </ul>
    </div>
  </nav>
<!-- Chat-Area -->
<h4>Chatting with Tutor</h4><h6><?php echo strtoupper($tutor_name);?></h6>

  <!-- card -->
  <div class="row">
    <div class="col s12 m7">
      <div class="card">
        <div class="card-image">
        <div class="row">
    <form class="col s12" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <textarea name="message" id="message"  class="materialize-textarea" placeholder="Type your message"></textarea>
          
        </div>
      </div>
    <!-- </form> -->
  </div>
          
        </div>
        <div class="card-content">
          <p>
          <?php
           $result = mysqli_query($con,"select message from chat where from_id='$tutor_id' AND to_id='$student_id' AND from_person='$tutor_name'");
            while($row = mysqli_fetch_assoc($result))
            {
              $msg = $row['message'];
              echo"<p>from $tutor_name--->$msg </p> ";
            }
            
            ?>
</p>
        </div>
        <div class="card-action">
        
        <button type="submit" name="send" class="btn btn-outline-success">Send</button>
        </form>
        <?php
if(isset($_POST['send']))
{
  $msg = $_POST['message'];
  $query = "INSERT INTO chat (from_person,from_id,to_person,to_id,message) VALUES ('$name','$student_id','$tutor_name','$tutor_id','$msg')";
                 mysqli_query($con, $query);
        
}

?>
        </div>
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