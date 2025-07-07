<?php

@include 'database.php';

if(isset($_POST['submit']))
{
    // ❌ No escaping/sanitization — vulnerable to XSS, SQLi
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $CPassword = $_POST['CPassword'];
    $Code = $_POST['Code'];
    // ❌ SQL Injection possible via Regno and Password
    $select = "SELECT * FROM adminloginn WHERE Email = '$Email' AND Password = '$Password' AND Code = '$Code'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = "User already exists! Email: $Email"; // ✅ Reflected XSS
    } else {
        if($Password != $CPassword){
            $error[] = "Passwords do not match!";
        } else {
            // ❌ SQL Injection possible here too
            $insertt = "INSERT INTO adminloginn (Email, Password, Code) VALUES('$Email', '$Password', '$Code')";
            
            if(mysqli_query($conn, $insertt)) {
                header('location:admin.php');
                exit();
            } else {
                $error[] = "Registration failed.";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>
            Register page
        </title>
        <link rel="stylesheet" href="register.css">
    </head>
    <style>
    body{
            margin: 0;
    padding: 0;
    overflow: hidden;
    height: 100%;
    }
.register .lg{
    color:blue
}
.register .lg:hover{
    color:black
}
.register{
    min-height: 100vh;
    display:inline-table;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    margin-left:35%;
}
.register form h1{
    font-size: 30px;
    margin-bottom: 10px;
    color: rgba(136, 184, 196, 0.9);
    padding: 15px;
    background:  #d29a2240;
    border-radius:15px;
}
.register form input,
.register form select{
    border-radius: 15px;
    width: 90%;
    padding: 10px 15px;
    font-size: 16px;
    margin: 8px 0;
    color:rgba(16, 69, 31, 0.71);
    text-align: center;
    margin-left: 15px;
    margin-right: 25px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(16, 108, 79, 0.3);
}
.register form .form-btn1{
    background: rgba(16, 108, 79, 0.73);
    color: black;
    align-items: center;
    display: inline;
}
.register form .form-btn1:hover{
    color: white;
    background: rgba(17, 130, 94, 0.58);
}
.register form p{
    margin-top: 10px;
    font-size: 20px;
    color: black;
}

.register form .error-msg{
    margin:10px 0;
    display: block;
    background: rgba(16, 108, 79, 0.4);
    color: white;
    border-radius: 5px;
    font-size: 20px;
}

.register form .reg-cont{
    padding: 30px;
    border-radius: 15px;
    background:-webkit-linear-gradient(#ac873624,rgba(19, 134, 117, 0.6));
}

.register form .cont .tnc{
    align-items:left;
}

.register form .cont .p1{
    text-align:center;
}
.title .logo{
    width:5%;
    height:5%;
}
.title{
    display: flex;
    align-items: center;
    gap: 20px;
    
    padding: 10px;
    border-radius: 15px;
    background: -webkit-linear-gradient(#ac873624, rgba(19, 134, 117, 0.6));
}
.video-background {
      position: fixed;
      top:0;
      left:0;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: -1;
    }

    .video-background video {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
    </style>
    <body >
    <div class="video-background">
    <video id="vid" autoplay muted loop>
      <source src="images/abg.mp4" type="video/mp4">
    </video>
  </div>
        <div class="title">
            <img class="logo" src="images/logo.png">
            <h1>Evergreen Ridge University</h1>
</div>
        <div class="register">
            <form action="" method="post">
            <h1>Register Now!</h1><br/>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
                <div class="reg-cont">
                    <input type="email" name="Email" required placeholder="Enter Email"/><br/>
                    <input type="password" name="Password" required placeholder="Enter your Password"><br/>
                    <input type="password" name="CPassword" required placeholder="Re-enter your Password"><br/>
                    <input type="password" autocomplete="off" name="Code" required placeholder="Enter Code"><br/>
                    <input type="submit" name="submit" value="Register" class="form-btn1"><br/>
                    <p>Already have an account?<a id="lg" href="adminlogin.php">Click to login</a></p>
                </div>
            </form>
        </div>
    </body>
</html>