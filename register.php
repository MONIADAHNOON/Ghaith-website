<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png"/>
    <title>ghaith</title>
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
        a.acss {  opacity: 0.8; background-color: #ccc;color: #128d77 ;   padding: 0.5em 1.5em;margin: 0.5em 0;border: none;cursor: pointer;width: 100%;}
        input.weightcss {font-size: 5pt;style="height:20px; width:50px;"}   


    </style>
</head>
<body>
        <!--register form-->
        <img src="logo.jpg" alt="website-logo" width="130em" height="100em"/> 
        <div class ="wrap-login100 main">
            <p style="font-size:2.5em;margin-top:0px; "> Sign UP </p> 
            <form action="" method="post">
                <div class="container">
                    <label for="fn"><b> Name</b></label>
                    <input type="text" placeholder="Enter your Name" name="name" required>
                    <label for="ln"><b>Phone</b></label>
                    <input type="text" placeholder="Enter your phone number" name="phone_number" required>
                  <!--   <label for="psw"><b>Password</b></label> -->
                  <!--   <input type="password" placeholder="Enter Password" name="password" required>-->
                    <label for="ln"><b>Age</b></label>
                    <input type="text" placeholder="Enter your Age" name="age" required>
                    <label for="ln"><b>Address</b></label>
                    <input type="text" placeholder="Enter your Address" name="address" required>
                    
                    
                    <label for="ln"><b>If you are interested in receiving notifications if there are orphans in need of support, click here</b></label>
                    <input type="checkbox" id="orphan" name="orphan" value="orphan"><label for="orphan"></label><br>

                    <label for="ln"><b>If you are interested in receiving notifications if there is a need for a blood unit, click here</b></label>
                    <input type="checkbox" id="blood" name="blood" value="blood"><label for="blood"> </label><br>


                                
                    <div class="additionalOptions2" id="additionalOptions2" style="display: none;">
                    <strong>Enter your data(Health Status):</strong><br>
                    <label for="type">Choose your blood type:</label>
                    <select>
                    <option>O-</option>
                    <option>O+</option>
                    <option>B-</option>
                    <option>B+</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>AB-</option>
                    <option>AB+</option>
                    </select><br>

                    <label for="gender">Click your gender:</label>
                      <select>
                      <option>male</option>
                      <option>female</option>
                      </select><br>

                     <label for="weight">Enter your weight in kilograms:</label>
                       <input  class="weightcss" style="height:20px; width:30px;"  type="text" name="additionalOption2" id="addOptionA">  
                       <br>
   
    
                       <label style="font-size:1em"> Do you suffer from high blood pressure?  </label>  <input style="height:20px; width:20px;" type="radio" name="bloodp" value="addOptionB" id="addOptionB">yes<br>
                       <label style="font-size:1em"> Do you suffer from diabetes?  </label>    <input style="height:20px; width:20px;" type="radio" name="diabetes" value="addOptionB" id="addOptionB">yes<br>
                       </div>
                       
                        <script>
                          document.getElementById("blood").addEventListener("click",
  
                          function() {
                            document.getElementById("additionalOptions2").style.display = "";
                          });
                          </script>
                      
 
     
                     <button id ="submit"  type="submit" name="submit">save data</button>

                     <a name='submit2' href='HP.php' class='acss' > Sign Up </a>
                     <p> Already have an account?- <a href="login.php"> Log In </a> </p>

                     <script>history.pushState({}, "", "")</script>


 


                </div>
            </form>
        </div>


        <?php 
    //insert new users in DB
    session_start(); 
    $conn = mysqli_connect('localhost','root','','ghaith');
    
    if(isset($_POST['submit'])){
        $user_name=$_POST['name'];
        $user_phone_number=$_POST['phone_number'];
       // $user_password=$_POST['password'];
        $user_age=$_POST['age'];
        $user_address=$_POST['address'];

        $name=mysqli_real_escape_string($conn,$user_name);
        $phone_number=mysqli_real_escape_string($conn,$user_phone_number);
        //$password=mysqli_real_escape_string($conn,$user_password);
        $age=mysqli_real_escape_string($conn,$user_age);
        $address=mysqli_real_escape_string($conn,$user_address);

       // $password=password_hash($password,PASSWORD_BCRYPT);
      //  $query = "INSERT INTO users (name, phone_number, password, age, address) VALUES ('{$name}', '{$phone_number}', '{$password}', '{$age}', '{$address}')";
        $query = "INSERT INTO users ( name, phone_number, age, address) VALUES ('{$name}', '{$phone_number}', '{$age}', '{$address}')";
       mysqli_query($conn,$query); 
       header("Location:login.php");
          exit();    

       
    }
?>
</body>
</html>