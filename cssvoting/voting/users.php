<?php 

session_start();


//setting timezone
date_default_timezone_set('Asia/Manila');

//storing current timestamp
$_SESSION['logdate'] = date("Y-m-d H:i:s");


if(!isset($_SESSION['name'])){

  echo "<script> alert( 'Please login first...')</script>";
  echo "<script>window.location.href='Login'</script>";
}
      

/*if(isset($_POST['logout'])){

  unset($_SESSION['name']);
  
  include "config.php";

    $Logs=mysqli_query($conn, "INSERT INTO logs (user,status,logtime1) VALUES ('admin','Successfully LoggedOut','".$_SESSION['logdate']."')");

  mysqli_close($conn);

  echo "<script> alert( 'Logging out...')</script>";
  echo "<script>window.location.href='index.php'</script>";

  session_destroy();

}*/
 ?>

 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <!--<link rel="stylesheet" href="style.php">-->

<link rel="icon" type="image/x-icon" href="pics/SCHOOL-LOGO.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <title>Manage Users</title>
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



<!-- NAVIGATION POPUP -->
<div id="login-popup">
    <div class="login-popup-content" style="text-align: right;">
        <br>
        <a href="#" class="open-popup" data-popup="nominate-popup">NOMINATE</a><br><br>
        <a href="#" class="open-popup" data-popup="candidates-popup">CANDIDATES</a><br><br>
        <a href="#" class="open-popup" data-popup="vote-popup">VOTE</a><br><br>
        <a href="#" class="open-popup" data-popup="announcement-popup">MAKE AN ANNOUNCEMENT</a><br><br>
        <a href="#" class="open-popup" data-popup="open-nominations-popup">OPEN NOMINATIONS</a><br><br>
        <a href="#" class="open-popup" data-popup="open-voting-popup">OPEN VOTING</a><br><br>
        <a href="logout.php">LOG OUT</a><br><br>
    </div>
</div>

      <?php 


 echo "<div class='table-cont'>";  

   echo "<form action='#' method='post'>";   


    echo "<h1 class='user'>Add a User</h1>";

    echo "<table class='contab'>";

    echo "<thead>";
    echo "<tr>";
    echo "<th>Student/Employee Number</th>";
    echo "<th>Name</th>";
    echo "<th>Password</th>";
    echo "<th>Role</th>";
    echo "<th>Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";

  echo "<tr>";

    include "../conf/cssvoting_config.php";
    
    
  echo "<td>"."<input type='text' class='text' name='studnum' placeholder='Enter new Student Number' minlength='9' maxlength='9'>"."</td>";
  echo "<td>"."<input type='text' class='text' name='studname' placeholder='Enter Name'>"."</td>";
  echo "<td>"."<input type='text' class='text' name='studpass' placeholder='Enter new Password' minlength='13' maxlength='13'>"."</td>";
  
  
echo "<td>"."<Select name='role' class='sel'> 
                <option value='' hidden>Role</option> 
                <option value='admin'>Admin</option> 
                <option value='standard'>Standard</option> 
              </Select"."</td>";

echo "<td>"."<Select name='status' class='sel'> 
                <option value='' hidden>Status</option> 
                <option value='enrolled'>Enrolled</option> 
                 <option value='faculty'>Faculty</option> 
                <option value='unenrolled'>Unenrolled</option> 
              </Select"."</td>";

 
  //echo "<td>"."<input type='submit' class='buton1' value='Add'>"."</td>";

    echo "<td>".'<input type="submit" name="uadd" class="buton1" value="Add" onclick="return confirm(\'Add this user?\');">'."</td>";

  echo "</tr>";


 

    mysqli_close($conn);

  echo "</table>";
  echo "</form>";
  echo "</div>";


  if(isset($_POST['uadd'])){

      include "../conf/cssvoting_config.php";

      if(!empty($_POST['studnum']) && !empty($_POST['studname']) && !empty($_POST['studpass'])){

        $que=mysqli_query($conn, "SELECT * FROM users WHERE student_number='".$_POST['studnum']."' AND name='".$_POST['studname']."' AND password='".$_POST['studpass']."' AND role='".$_POST['role']."' AND status='".$_POST['status']."'");



        $row=mysqli_num_rows($que);

          if($row==0){
    
            //$_POST['unum']=mysqli_real_escape_string($conn, $_POST['unum']);
            $_POST['studname']=htmlspecialchars($_POST['studname']);
            $_POST['studpass']=htmlspecialchars($_POST['studpass']);

            $enc=md5($_POST['studpass']);

              echo $_POST['role'];
              $insert=mysqli_query($conn, "INSERT INTO users (student_number,name,password,role,status) VALUES ('".$_POST['studnum']."','".$_POST['studname']."','".$enc."','".$_POST['role']."','".$_POST['status']."')");

              //$Logs=mysqli_query($conn, "INSERT INTO logs (user,status,logtime1) VALUES ('admin','User Added','".$_SESSION['logdate']."')");

                echo "<script>alert('User Added!')</script>";
              echo "<script>window.location.href='Users'</script>";
          }


          else{

              echo "<script>alert('User already exists!')</script>";
              echo "<script>window.location.href='Users'</script>";
          }

      }

      else{

          echo "<script>alert('Please fill-out empty fields!')</script>";
          echo "<script>window.location.href='Users'</script>";

      }

     
      mysqli_close($conn);

  }




  echo "<form action='#' method='post'>";

echo "<div ='sbar'>";

  echo "<p class='spar'>Find a User</p>";
  echo "<input type='text' name='find' class='find' placeholder='Quick Search'>";
  echo "<input type='submit' name='search' value='Search' class='buton3'>";  

echo "</div>";

 if(isset($_POST['search'])){

  $find=$_POST['find'];

  include "../conf/cssvoting_config.php";

  $que=mysqli_query($conn,"SELECT * FROM users WHERE student_number LIKE '%$find%' OR name LIKE '%$find%' OR password LIKE '%$find%' OR role LIKE '%$find%' OR status LIKE '%$find%'");
  $r=mysqli_num_rows($que);


  if($r>0){


    echo "<div class='table-cont'>";

    echo "<table class='contab' cellspacing='0'cellpadding='0'>";

    echo "<thead>";
    echo "<tr>";
    echo "<th>Number</th>";
    echo "<th>Name</th>";
    echo "<th>Password</th>";
    echo "<th>Role</th>";
    echo "<th>Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";

    $ctr=0;

    while($fetch= mysqli_fetch_array($que)) {
  
    $ctr++;
    echo "<tr>";
    echo "<td>{$fetch['student_number']}</td>";
    echo "<td>{$fetch['name']}</td>";
    echo "<td>{$fetch['password']}</td>";
    echo "<td>{$fetch['role']}</td>";
    echo "<td>{$fetch['status']}</td>";

    echo "<td>"."<a href='ViewUser?id={$fetch['student_number']}'><i class='bx bxs-pencil'></i>Manage</a>"."</td>";

    echo "</tr>"; 

  }

}
  else{

    echo "<h2>There is no data found</h2>";

  }

  


echo "</table>";

mysqli_close($conn);

  }

echo "</div>";

     echo "<div class='table-cont'>";

    include "../conf/cssvoting_config.php";

  $que= mysqli_query($conn, "SELECT * FROM users");

    echo "<div class='table-cont'>";

     echo "<h1 class='inp'>Current Users</h1>";

    echo "<table class='contab'>";

    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Student Number</th>";
    echo "<th>Student Name</th>";
    echo "<th>Role</th>";
    echo "<th>Status</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    $ctr=0;

    while($fetch= mysqli_fetch_array($que)) {
  $ctr++; 


  echo "<tr>";

  echo "<td>".$ctr."</td>";
  echo "<td>".$fetch['student_number']."</td>";
  echo "<td>".$fetch['name']."</td>";
  echo "<td>".$fetch['role']."</td>";
  echo "<td>".$fetch['status']."</td>";
    echo "<td>"."<a href='ViewUser?id={$fetch['student_number']}'><i class='bx bxs-pencil'></i>Manage</a>"."</td>";

  echo "</tr>";


 

 
 }

  mysqli_close($conn);

  echo "</table>";

  echo "</div>";



 ?>
    </div>
  </div>
</form>
 </body>
  <script src="../js/popup.js"></script>
 </html>