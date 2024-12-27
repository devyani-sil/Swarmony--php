<?php
// require('db.php');
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
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
    font-family: 'Poppins', sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url(assets/images/bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

/* Adjust the opacity of the background image */
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
  border-radius: 240px;
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
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "db.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
 
     <form action="login.php" method="post" class="formmm">
	 <h1>Login</h1></br>
	
        <div class="input-box">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="input-box">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
       <button type='submit'value="Login" name="login" >Login</button>
 <div class='register-link'>
                <p>New Here? <a href='signup.php'>Register</a></p>
            </div>
      </form>
	 </div>
</div>

</body>
</html>