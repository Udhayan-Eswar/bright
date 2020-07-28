<?php
include_once('static/connection.php');
?>

<?php
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($con,"select name,email,password from students");
        while($row=mysqli_fetch_assoc($result))
        {
            if($row['email']==$email and $row['password']==$password)
            {
                    $name = $row['name'];
                    session_start();
                    $_SESSION['username'] = $name;
                    echo "<script> 
                    window.location.href = 'students/home.php';
                    </script>";
            }
        }
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
</head>
<body>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<nav class="blue darken-2">
    <div class="nav-wrapper">
    <a href="index.php" class="brand-logo center">Bright-Tuition</a>
     
      
    </div>
  </nav>

  <div class="card ">
    <div class="card-content ">
      <p></p>
    </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width blue darken-1">
      <li class="tab "><a class="active deep-purple accent-2 black-text text-darken-2" href="login_students.php">Login Students</a></li>
        <li class="tab "><a class="active deep-purple accent-2 black-text text-darken-2" href="login_tutors.php">Login Tutors</a></li>
        <li class="tab"><a class=" deep-purple accent-2 black-text text-darken-2" href="reg_student.php">Register as Student</a></li>
        <li class="tab"><a class=" deep-purple accent-2 black-text text-darken-2" href="reg_tutor.php">Register as Tutor</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-3">
    <div class="row">
    <form method="POST">
    <h3>Login-Students</h3>
      <div class="row">
        <div class="input-field col s5">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>


      <div class="row">
      
        <div class="input-field col s5">
        
          <input id="password" name="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
        <center>
        <button class="btn waves-effect waves-light" type="submit" name="login">Login
    <i class="material-icons right">login</i>
  </button>
  </center>
      </form>
    </div>
  </div>
</body>
</html>