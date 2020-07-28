<?php
include_once('static/connection.php');
?>


<?php
 if(isset($_POST['register']))
 {
   $phone = $_POST['phone'];
   $language = $_POST['language'];
   $name = $_POST['name'];
   $gender =$_POST['gender'];
   $age = $_POST['age'];
   $education = $_POST['education'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $flag = 0;

  if(($name==null)or($name==""))
  {
    echo "please fill the name ";
  }
  else{
    if($gender==null)
    {
      echo "please fill the gender";
    }
    else{
      if($age==null)
      {
        echo "please fill the age";
      }
      else{
        if($email==null)
        {
          echo "please fill the email";
        }
        else{
          if($password==null)
          {
            echo "please fill the password";
          }
          else{
            if($education==null)
            {
              echo "please fill the education";
            }
            else{
              if($language==null)
              {
                echo "please fill the language ur proficient in";
              }
              else{
                if(strlen($phone)<10)
                {
                  echo 'please fill the phone number with 10-digits';
                }
                else{
                  $result = mysqli_query($con,"select email from tutors");
                  while($row=mysqli_fetch_assoc($result))
                  {
                     if($row['email']==$email)
                     {
                         //echo "Email already registered";
                         $flag=1;
                     }
                  }
                  if($flag==0)
                  {
                
                 $query = "INSERT INTO tutors (name,gender,email,password,age,education,language,phone) VALUES ('$name','$gender','$email','$password','$age','$education','$language','$phone')";
                 mysqli_query($con, $query);
                 echo "<script> 
                 alert('registered');
                 </script>";
                }
              }
            }
          }
        }
      }
    }
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
     
      <!-- <ul class="left hide-on-med-and-down">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li class="active"><a href="collapsible.html">JavaScript</a></li>
      </ul> -->
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
    <!-- Form -->
    <form method="POST">
    <h3>Register-Tutors</h3>
      <div class="row">
      <!-- Name -->
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" name="name" class="validate">
          <label for="icon_prefix">Name</label>
        </div>
        <div class="col s12">
        <!-- Gender -->
       Gender:
       <p>
      <label>
        <input name="gender" type="radio"  value="male"/>
        <span>Male</span>
      </label>
    </p>
    <p>
      <label>
        <input name="gender" type="radio" value="female"/>
        <span>Female</span>
      </label>
    </p>
    <!-- Email and password -->

    <div class="row">
        <div class="input-field col s5 ">
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
    
    <!-- Age -->
    <div class="col s12">
          Age:
          <div class="input-field inline">
            <input id="age" type="text" class="validate" name="age">
            <label for="age">Age</label>
            <span class="helper-text" data-error="wrong" data-success="right"></span>
          </div>
        
    </p>
      <!-- </div> -->
<!-- Education -->
Education:
<p>
      <label>
        <input type="checkbox" class="filled-in" value="10" name="education"/>
        <span>X</span>
      </label>
    </p>
    <p>
    <p>

<label>
  <input type="checkbox" class="filled-in" value="11" name="education"/>
  <span>XI</span>
</label>
</p>
<p>

      <label>
        <input type="checkbox" class="filled-in" value="12" name="education"/>
        <span>XII</span>
      </label>
    </p>
    <p>

      <label>
        <input type="checkbox" class="filled-in" value="be" name="education"/>
        <span>B.E</span>
      </label>
    </p>
<p>

      <label>
        <input type="checkbox" class="filled-in" value="me" name="education"/>
        <span>M.E</span>
      </label>
    </p>
    <p>

      <label>
        <input type="checkbox" class="filled-in" value="bsc"name="education"/>
        <span>BSc Computer Science</span>
      </label>
    </p>
    <p>

      <label>
        <input type="checkbox" class="filled-in" value="others" name="education" />
        <span>Others</span>
      </label>
    </p>
    <br>
   <!-- Teach -->
   Language Proficient:
       <p>
      <label>
        <input name="language" type="radio"  value="python"/>
        <span>Python</span>
      </label>
    </p>
    <p>
      <label>
        <input name="language" type="radio" value="java" />
        <span>Java</span>
      </label>
    </p>
    <p>
      <label>
        <input name="language" type="radio" value="c"/>
        <span>C</span>
      </label>
    </p>
    <p>
      <label>
        <input name="language" type="radio" value="php"/>
        <span>Php</span>
      </label>
    </p>
    </div>

    <!-- phone -->
    <div class="input-field col s4">
          <i class="material-icons prefix">phone</i>
          <input name="phone" id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Mobile Number</label>
        </div>
        </div>
        </div>
        <center>
        <button class="btn waves-effect waves-light" type="submit" name="register">Register
    <i class="material-icons right">send</i>
  </button>
  </center>
      </form>
    </div>
  </div>
</body>
</html>