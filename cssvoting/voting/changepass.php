<?php 

session_start();


//setting timezone
date_default_timezone_set('Asia/Manila');

//storing current timestamp
$_SESSION['logdate'] = date("Y-m-d H:i:s");

 ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Voting Login</title>
    <link rel="stylesheet" href="style.php">
     <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<div class="popup-overlay"> </div>
<?php include 'banner.php'; ?>  
<header>  

    <img src="pics/logo1.png" alt="Logo">
    <a class="login-link" href="#">
        <img src="pics/menu.png" alt="Menu" style="width: 20px; height: 20px;">
    </a>
</header>
<body>

<div class="nav-link">
        <hr class="nav-divider"> 

</div>

<!-- INSTRUCTIONS -->
<div class="image-container">
    <img src="../uploads/instructions.png" alt="Image" id="image" style="max-width: 40%; height: auto;">
</div>

<!-- NAVIGATION POPUP -->
<div id="login-popup">
    <div class="login-popup-content" style="text-align: right;">
        <br>
        <a href="Home">HOME</a><br><br>
        <a href="logout.php">LOG OUT</a><br><br>
    </div>
</div>


<div class="changepass">
    
    <p class="ins">
        For your account safety. You may change your password by mailing<br><br>
        the Administrator with your new password. Please follow the following<br><br>
        formats:<br><br>

        <ul>
            <li>At least 13 characters</li>
            <li>With Uppercase and lowercase letters</li>
            <li>At least 2 special characters</li>
        </ul><br><br>

        Add a subject containing "CHANGE PASSWORD" to <br><br>
    </p>

        <a href="https://mail.google.com/mail/u/0/#inbox?compose=new" class="email">ccpcssvoting@gmail.com</a>

</div>



<script src="../js/popup.js"></script>


</body>
</html>