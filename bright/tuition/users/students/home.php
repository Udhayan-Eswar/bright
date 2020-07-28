<?php
include_once('static/connection.php');
?>
<?php
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
 <!-- <link rel="stylesheet" href="static/dashboard_dropdown.css">  -->
 <link rel="stylesheet" href="static/chatbox.css"> 

</head>
<body>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>



<!-- The sidebar -->
<div class="sidebar">
  <a class="active" href="home.php">Home</a>
  <a href="feedback.php">Feedback</a>
  <a href="#performance_chart.php">Performance Chart</a>
  <a href="#view_courses.php">View Courses</a>
  <a href="https://www.onlinegdb.com/classroom">ClassRoom</a>
  <a href="chat.php" style=" text-decoration:none" >Chat</a>
  <a href="../../contactus.php" style=" text-decoration:none" >Contact-Us</a>
  
</div>

<!-- Page content -->
<div class="content">

<nav>
    <div class="nav-wrapper grey lighten-5">
      <a href="home.php" class="brand-logo black-text" >Home</a>
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#profile.php"  style="color:black;"><?php echo strtoupper($name);?></a></li>
      <li><a href="#notifications.php"><i class="material-icons" style="color:black;">notifications</i></a></li></a>
      
        <!-- <li><a href="badges.html" class="black-text">Components</a></li> -->
        <li><a href="logout.php" class="black-text">Logout</a></li>
      </ul>
    </div>
  </nav>
  <!-- Chat Box -->
  <button class="openChatBtn" onclick="openForm()">Chat</button>
<div class="openChat">
<form method="POST">
<h1>Chat</h1>
<div class="form-group">
    <label for="Tutor" style="color:black;">type tutor id</label>
    <input type="text" name="to" placeholder="tutor_id">
</div>
  
<label for="msg"><b>Message</b></label>
<textarea placeholder="Type message.." name="msg" required></textarea>
<button class="btn waves-effect waves-light" type="submit" name="send" style="height:50px;">Send
    <i class="material-icons right">send</i>
  </button>
<button type="button" class="btn close" onclick="closeForm()"style="height:50px;">
Close
</button>
</form>
</div>
<script>
   document .querySelector(".openChatBtn") .addEventListener("click", openForm);
   document.querySelector(".close").addEventListener("click", closeForm);
   function openForm() {
      document.querySelector(".openChat").style.display = "block";
   }
   function closeForm() {
      document.querySelector(".openChat").style.display = "none";
   }
</script>



</div>
</body>
</html>