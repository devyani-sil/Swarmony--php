<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body{
      font-family: 'Poppins' , sans-serif;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
       display: flex;
       justify-content: center;
       align-items: center;
       min-height: 100vh;
       background:url(assets/images/bg.jpg)
       no-repeat;
       background-size: cover;
       background-position: center;
    }
    body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.1);
     /* Adjust the opacity value here */
     backdrop-filter: blur(4px);
     z-index: -1;
}
    
    h1{
        color: #070707
    }
    
    .wrapper{
      width: 420px;
      background: transparent;
      border: 2px solid rgba(255 , 255, 255, .2);
      backdrop-filter: blur(10px);
      box-shadow: 0 0 10px rgba(0 , 0, 0, .2);
      color: black;
      border-radius: 10px;
      padding: 30px 40px;
    }
    
    .wrapper h1{
      text-align: center;
      font-size: 36px;
    }
    
    .wrapper .input-box{
      position: relative;
      width: 100%;
      height:50px;
      margin: 30px 0;
    }
    .input-box input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: 2px solid rgba(255 , 255, 255, .2);
      outline: none;
      border-radius: 40px;
      font-size: 16px;
      color: black;
      padding-left:10px ;
      
      
    }
    
    .input-box input::placeholder{
      color:black;
      font-weight: 500;
    }
    
    .input-box .icon{
      position: absolute;
      right: 20px;
      top: 30%;
      transform: translate(-50%);
      font-size: 16px;
    }
    
    .wrapper .remember-forgot{
      display: flex;
      justify-content: space-between;
      font-size: 14.5px;
      margin: -15px 0 15px;
    }
    
    .remember-forgot label input{
      accent-color:black;  margin-right:4px;
    }
    
    .remember-forgot .a{
      color:black;
      text-decoration: none;
    }
    
    .remember-forgot a:hover{
      text-decoration: underline;
    }
    
    .wrapper button{
      width:100%;
      height: 45px;
      background: transparent;
      backdrop-filter: blur(10px);
      border: none;
      outline: none;
      border-radius: 40px;
      box-shadow: 0 0 10px black;
      cursor:pointer;
      font-size: 16px;
      color: black;
      font-weight: 700;
    }
    
    .wrapper .register-link{
        font-size: 14.5px;
        font-weight: 500;
        text-align: center;
        margin: 20px 0 15px
    }
    
    .register-link p a {
      color: #070707;
      text-decoration:none;
      font-weight: 600;
    }
    .register-link p a:hover{
      text-decoration: underline;
    }
        </style>
</head>
<body>
    <div class="wrapper">
  <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["name"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }

 require_once "db.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                header("Location: login.php");
            exit();
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>

        <form action="signup.php" method="post">
            <h1>Sign-Up</h1>
            <div class="input-box">
                <input type="text" class="form-control" name="name" placeholder="Full Name:">
            </div>
            <div class="input-box">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="input-box">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="input-box">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <button type='submit' value="Register" name="submit">Sign-Up</button>
            <div class='register-link'>
                <p>One Of Us? <a href='login.php'>Login</a></p>
            </div>
        </form>
        <div>
      </div>
    </div>
</body>
</html>