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
    <ul style="list-style-type: none; padding: 0; margin: 0;">
        <li style="display: inline; margin-left: 5%; margin-right: 7%;">
            <a href="Home" class="nav-link">HOME</a>
        </li>
        <li style="display: inline; margin-right: 7%;">
            <a href="Home" class="nav-link">STANDINGS</a>
        </li>
    </ul>
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
        <a href="#" class="open-popup" data-popup="nominate-popup">NOMINATE</a><br><br>
        <a href="#" class="open-popup" data-popup="candidates-popup">CANDIDATES</a><br><br>
        <a href="#" class="open-popup" data-popup="vote-popup">VOTE</a><br><br>
        <a href="Account"  data-popup="settings-popup">CHANGE PASSWORD</a><br><br>
        <a href="logout.php">LOG OUT</a><br><br>
    </div>
</div>

<!-- NOMINATE POPUP -->
<div class="popup" id="nominate-popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>NOMINATION</h2>
        <hr>
        <p style="font-size:13px; color:white">Select your nominee and the position you want to nominate them for.</p><br><br>
        <center>
            <select class="select-menu" placeholder="Nominee">
                <option value="" disabled selected>Select Nominee</option>
                <!-- PHP CODE TO FOLLOW -->
            </select><br><br>
            <select class="select-menu" placeholder="Position">
                <option value="" disabled selected>Select Position</option>
                <option value="President">President</option>
                <option value="Vice President">Vice President</option>
                <option value="Secretary">Secretary</option>
                <option value="Treasurer">Treasurer</option>
                <option value="Auditor">Auditor</option>
                <option value="Public Relations Officer">Public Relations Officer</option>
            </select>
        </center><br><br>
        <center><button class="popup-button">NOMINATE</button></center>
        <p id="nomination-status"></p>
    </div>
</div>

<!-- CANDIDATES POPUP -->
<div class="popup" id="candidates-popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>CANDIDATES</h2>
        <hr>
        <div>
            <center><p style="font-size:18px"><br><b>President</b><br>
            Candidate1<br>
            Candidate2<br><br>

            <b>Vice President</b><br>
            Candidate1<br>
            Candidate2<br><br>

            <b>Secretary</b><br>
            Candidate1<br>
            Candidate2<br><br>

            <b>Treasurer</b><br>
            Candidate1<br>
            Candidate2<br><br>

            <b>Auditor</b><br>
            Candidate1<br>
            Candidate2<br><br>

            <b>Public Relations Officer</b><br>
            Candidate1<br>
            Candidate2<br><br></p></center></div>

<!-- CANDIDATES POPUP -->
<div class="popup" id="candidates-popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>CANDIDATES</h2>
        <hr>
        <div id="candidates-list">
            <!-- PHP CODE TO FOLLOW -->
        </div>
    </div>
</div>


        </div>
    </div>
</div>


<!-- VOTE POPUP -->
<div class="popup" id="vote-popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>VOTE</h2>
        <hr>
        <p style="font-size:13px; color:white">Select a candidate for each position.</p><br><br>
        <center>
            <select class="select-menu" placeholder="Position">
                <option value="" disabled selected>President</option>
                <option value="President">Candidate 1</option>
                <option value="Vice President">Candidate 2</option>
                <option value="Vice President">Abstain</option>                
            </select><br><br>
            <select class="select-menu" placeholder="Position">
                <option value="" disabled selected>Vice President</option>
                <option value="President">Candidate 1</option>
                <option value="Vice President">Candidate 2</option>
                <option value="Vice President">Abstain</option>                
            </select><br><br>
            <select class="select-menu" placeholder="Position">
                <option value="" disabled selected>Secretary</option>
                <option value="President">Candidate 1</option>
                <option value="Vice President">Candidate 2</option>
                <option value="Vice President">Abstain</option>                
            </select><br><br>
            <select class="select-menu" placeholder="Position">
                <option value="" disabled selected>Treasurer</option>
                <option value="President">Candidate 1</option>
                <option value="Vice President">Candidate 2</option>
                <option value="Vice President">Abstain</option>                
            </select><br><br>
            <select class="select-menu" placeholder="Position">
                <option value="" disabled selected>Auditor</option>
                <option value="President">Candidate 1</option>
                <option value="Vice President">Candidate 2</option>
                <option value="Vice President">Abstain</option>                
            </select><br><br>
            <select class="select-menu" placeholder="Position">
                <option value="" disabled selected>Public Relations Officer</option>
                <option value="President">Candidate 1</option>
                <option value="Vice President">Candidate 2</option>
                <option value="Vice President">Abstain</option>                
            </select><br><br>            
        </center><br><br>
        <center><button class="popup-button">VOTE</button></center>
        <p id="nomination-status"></p>
    </div>
</div>

<!-- SETTINGS POPUP
<div class="popup" id="settings-popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>ACCOUNT SETTINGS</h2>
        <hr><br>
        <center><input type="password" placeholder="Old Password"><br>
        <input type="password" placeholder="New Password"><br><br>
        <button class="change-password-button">CHANGE PASSWORD</button></center>
    </div>
</div>-->

<!-- ANNOUNCEMENT POPUP -->
<div class="popup" id="announcement-popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2>ANNOUNCEMENT</h2><br>
        <hr>
        <center><select><br>
            <option>Banner</option>
            <option>Popup</option>
        </select><br><br>
        <textarea placeholder="Enter message here..."></textarea><br><br>
        <button class="send-announcement-button">SEND</button><br><br></center>
    </div>
</div>

<script src="../js/popup.js"></script>


</body>
</html>