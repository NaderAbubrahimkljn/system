
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="styleforlogin$register.css"/>
    
</head>
<body>

<?php
    include('config/constants.php'); 

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string avoid injection in data base
        $username = mysqli_real_escape_string($conn, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $phone    = stripslashes($_REQUEST['phone']);
        $phone    = mysqli_real_escape_string($conn, $phone);
        $addres   = stripslashes($_REQUEST['addres']);
        $addres   = mysqli_real_escape_string($conn, $addres);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $sql="SELECT * FROM users WHERE username='$username'";
        $res=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);

        if($count==0){
        $query    = "INSERT into `users` (username, password, email, phone,addres,create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email','$phone','$addres','$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }}
        else{
            echo " <div class='form'>
                  <h4>username already exist.</h4><br/></div>";
                }
    } 
?>
    
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="email" class="login-input" name="email" placeholder="Email Adress" required />
        <input type="tel" class="login-input" name="phone" placeholder="Phone number" required />
        <input type="text" class="login-input" name="addres" placeholder="address" required />


        <input type="password"minlength="4" maxlength="20" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" name="submit" value="Register" class="login-button"> 
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
</body>
</html>