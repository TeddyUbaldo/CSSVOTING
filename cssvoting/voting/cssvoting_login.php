<?php
session_start(); 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

if(!isset($_SESSION['try'])){
    $_SESSION['try']=0;
}

if(isset($_SESSION['nakapasokna'])){

    echo "<script> window.location.href='Home'</script>";
}

//setting timezone
date_default_timezone_set('Asia/Manila');

//storing current timestamp
$_SESSION['logdate'] = date("Y-m-d H:i:s");






    if(isset($_POST['login'])){

        $_POST['studnumber']=htmlspecialchars($_POST['studnumber']);
        $_POST['studpass']=htmlspecialchars($_POST['studpass']);


        $dec=md5($_POST['studpass']);

       

            include "../conf/cssvoting_config.php";

            $search=mysqli_query($conn, "SELECT * FROM users WHERE student_number='".$_POST['studnumber']."' AND password='".$dec."'");

            $T=mysqli_num_rows($search);

                if ($T>0) {
                        
                    $R=mysqli_fetch_array($search);

                    if($R['status']=='enrolled' && $R['role']=='standard'){

                        $_SESSION['name']=$R['name'];
                        $_SESSION['nakapasokna']='pasok';

                        echo "<script>window.location.href='Home'</script>";

                    }


                    elseif ($R['status']=='faculty' && $R['role']=='admin') {


                        $_SESSION['name']=$R['name'];
                       


                        echo "<script>window.location.href='Admin'</script>";
                        
                    }

                    else{

                        $error_message="Oops! Incorrect Credentials Please try again.";

                        $_SESSION['try']++;

                        

                    }
            
                }

            else{

                

                   // echo "<div class='incorrect-box'>";

                        echo"<p class='incorrect'>Oops! Incorrect Credentials. Please try again.</p>";

                   // echo"</div>";  

                $_SESSION['try']++;

                

            }

        }

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Voting Login</title>
    <link rel="stylesheet" href="style.php">
     <link rel="icon" href="../voting/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php include 'banner.php'; ?>    
    <header>
        <img src="pics/logo1.png" alt="Logo">
        <a class="login-link">LOG IN</a>
    </header>

    <video id="video-background" autoplay muted playsinline>
        <source src="pics/loginpage.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- LOGIN POPUP -->
    <div id="login-popup">
        <div class="login-popup-content">
            <br><br><h2>WELCOME.</h2><br><br>
            <hr><br>
            <form action="#" method="POST"><br><br>
                <input type="text" name="studnumber" placeholder="Student Number" minlength="9" maxlength="9" required>
                <input type="password" name="studpass" placeholder="Password"  required><br><br>
                <?php 

                    $timeRemaining=0;

                    if($_SESSION['try']>=5){

                    //$timeRemaining = 300;
                    $timeRemaining= 300;
             ?>

            <div class="logbutton">
                <input type="submit" name="login" value="Login" class="logb" disabled>
            </div>

            <div id="countdown-timer" class='timer'><?php echo floor($timeRemaining / 60) . ":" . ($timeRemaining % 60); ?></div>

            <?php 

                    
                    echo "<p class='errorbox'>Specific number of tries reached. Please wait.</p>"; 

                }


                else{
             ?>

                <div class="logbutton">
                <input type="submit" name="login" value="Login" class="logb">
            </div>



            <?php  
        }
                
            ?>
            </form>
        </div>
    </div>


  

<script type="text/javascript">
    
    // LOGIN TOGGLE
  document.querySelector('.login-link').addEventListener('mouseover', function() {
    document.querySelector('#login-popup').style.display = 'block';
  });

  document.querySelector('#login-popup').addEventListener('mouseleave', function() {
    document.querySelector('#login-popup').style.display = 'none';
  });

  // COUNTDOWN TIMER
  let countdownTimer = document.getElementById('countdown-timer');
  let timeRemaining = <?php echo $timeRemaining; ?>;

  function updateCountdown() {
    let minutes = Math.floor(timeRemaining / 60);
    let seconds = timeRemaining % 60;
    countdownTimer.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    timeRemaining--;
    if (timeRemaining >= 0) {
      setTimeout(updateCountdown, 1000);
    } 
  }

  updateCountdown(); // Call the updateCountdown function

</script>

<!--<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    // LOGIN TOGGLE
    document.querySelector('.login-link').addEventListener('mouseover', function() {
      document.querySelector('#login-popup').style.display = 'block';
    });

    document.querySelector('#login-popup').addEventListener('mouseleave', function() {
      document.querySelector('#login-popup').style.display = 'none';
    });

    // COUNTDOWN TIMER
    let countdownTimer = document.getElementById('countdown-timer');
    let timeRemaining = parseInt(countdownTimer.textContent); // Get the initial time remaining from the HTML element

    function updateCountdown() {
      let minutes = Math.floor(timeRemaining / 60);
      let seconds = timeRemaining % 60;
      countdownTimer.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
      timeRemaining--;
      if (timeRemaining >= 0) {
        setTimeout(updateCountdown, 1000);
      } 
    }

    updateCountdown(); // Call the updateCountdown function
  });
</script> -->

 
</body>
</html>
