<!DOCTYPE html>
<html lang="en">
<?php  //#128d77 
    session_start();
    //connect to user database table
    $conn = mysqli_connect('localhost','root','','ghaith');
    if(isset($_POST['submit'])){
        $user_phone_number=$_POST['phone_number'];
       // $password=$_POST['password'];

        $phone_number=mysqli_real_escape_string($conn,$user_phone_number);
       // $password=mysqli_real_escape_string($conn,$password);
    
        $query = "SELECT * FROM users WHERE phone_number='{$phone_number}' ";
        $userquery = mysqli_query($conn,$query);
        if(!$userquery){
            die("QUERY FAILED".mysqli_error($conn));
        } 
        while($row = mysqli_fetch_array($userquery)){
            $user_name = $row['name'];
            $user_phone_number = $row['phone_number'];
            $user_password = $row['password'];
            $user_age = $row['age'];
            $user_address = $row['address'];
            if (password_verify($password, $user_password)){
                $_SESSION['name'] = $user_name;
                $_SESSION['phone_number'] = $user_phone_number;
                $_SESSION['age'] = $user_age;
                $_SESSION['password'] = $user_password;
                $_SESSION['address'] = $user_address;
                header("Location:HP.php");
            } 
            else{
                header("Location:register.php");
            }
        }
    }

  
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png"/>
    <title>Ghaith</title>
    <style>
        form {display: grid;grid-template-columns: 1fr;grid-gap: 10px}
        body {display: grid;place-items: center;min-height: 100vh;background-color: #ccc; background-repeat: no-repeat;background-size:1400px 1000px;background-attachment: fixed;font-family: copperplate, Candara;color:#ccc;}
        input {width: 100%;padding: 0.75em 1.25em;margin: 0.5em 0;display: inline-block;border: 0.063em solid #ccc;box-sizing: border-box;}
        button {background-color: #ccc;color: 128d77;padding: 0.875em 1.25em;margin: 0.5em 0;border: none;cursor: pointer;width: 100%;}
        button:hover {opacity: 0.8;}
        .container {padding: 1em; .container {display: grid;grid-template-columns: 1fr;grid-gap: 20px;text-align: center;}}
        .main {position: relative;z-index: 1;padding:1.33em; border-radius: 0.67em;background-color: #128d77;/*background-color: rgba(255, 255, 255, .15);  backdrop-filter: blur(5px);*/justify-content: center;align-items: center;display: flex;flex-wrap: wrap;}
        .wrap-login100 {padding: 55px 15px 37px;width: 400px;margin: 0 auto;}
        @media (max-width: 576px) {.wrap-login100 {width: 80%;}}
        a {color:#ccc;}
    </style>
</head>
<body>
    <!--sign in form-->
    <img src="logo.jpg" alt="website-logo" width="130em" height="100em"/> 
    <div class ="wrap-login100 main">
        <p style="font-size:2.5em;"> Log In </p> 
        <form action="" method="post">
            <div class="container">
                <label for="uphone"><b>phone number</b></label>
                <input type="text" placeholder="Enter phone number" name="phone-number" required>
              <!--  <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required> -->
                <button type="submit" name="submit">Login</button>
                <!--<a href="resetpassword.php"> forget password? </a> -->
                <p style="text-align:center;font-weight: bold;color:#ccc"> Create an account- <a href="register.php"> Sign Up </a> </p>
            </div>
        </form>
    </div>
    <!--end of sign in form-->
</body>
</html>