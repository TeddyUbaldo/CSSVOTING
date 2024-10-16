<?php
header("Content-Type: text/css");
?>




{
    box-sizing: border-box;
}

html, body {
    height: 100%;
    width: 100%;
    margin: 0; 
    padding: 0; 
    overflow-x: hidden;
}

body {
    background-image: url('home1.png');
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed; 
    background-position: right;
    font-family: 'Open Sauce', Helvetica, sans-serif;
}

* {
    margin: 0;
    padding: 0;
}










/* LOGINPAGE VIDEO BACKGROUND */

#video-background {
    position: fixed;
    top: 0;
    eft: 0;
    width: 100%; 
    height: 100%; 
    z-index: -1; 
    object-fit: fill; 
        }









/* BANNER */
#banner {
    position: fixed;
    top: 0;
    width: 100%;
    height: 1cm;
    background-color: black;
    color: white;
    text-align: center;
    line-height: 1cm;
    z-index: 1000;
}










/* HEADER */
header {
    position: fixed;
    top: 1cm;
    width: 100%;
    height: 2cm;
    background-color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0% 2%; 
    max-width: 100%; 
    margin: 0 auto;
    z-index: 999;
    box-sizing: border-box; 
}

header img {
    height: 1.2cm;
    width: auto;
}

.login-link {
    color: darkblue;
    text-decoration: none;
    font-weight: bold;
    cursor: pointer;
    z-index: 1000;
}

.login-link:hover {
    color: darkred;
    background-color: white;
}











/* LOGIN TOGGLE */
#login-popup {
    display: none;
    position: absolute;
    top: 2.5cm; 
    right: 0; 
    width: 20%;
    height: 80%;
    background-color: rgba(0, 0, 0, 0.85);
    background-image: url('popupbg.png');
    background-size: cover;
    color: white;
    text-align: center;
    font-family: 'Open Sauce', Helvetica, sans-serif;
    z-index: 1000;
    border-radius: 5px;
    animation: slideInRightToLeft 0.5s ease-out forwards; 
    overflow: hidden;
}

.login-popup-content {
    padding: 10px;
    text-align: center;
    overflow-y: auto;
    font-size: 22px;
}

.login-popup-content h2 {
    font-family: 'Open Sauce', Helvetica, sans-serif;
    font-size: 22px;
}

.login-popup-content input[type="text"],
.login-popup-content input[type="password"] {
    width: 60%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid white;
    background-color: transparent;
    color: white;
    font-family: 'Open Sauce', Helvetica, sans-serif;
}

.login-popup-content button {
    width: 30%;
    padding: 10px;
    margin: 10px 0;
    background-color: black;
    color: white;
    font-family: 'Open Sauce', Helvetica, sans-serif;
    cursor: pointer;
    border: none; /* Remove border */
    box-shadow: none; /* Remove shadow */
}

.login-popup-content button:hover {
    background-color: white;
    color: black;
}

.login-popup-content a {
    color: white !important; 
    text-decoration: none; 
}

.login-popup-content a:hover {
    text-decoration: underline; 
    color: lightgray; 
}









/* TOGGLE ANIMATION */
@keyframes slideInRightToLeft {
    from {
        opacity: 0;
        transform: translateX(100%); 
    }
    to {
        opacity: .92;
        transform: translateX(0); 
    }
}








/* HOVER EFFECTS */
.login-link:hover + #login-popup,
#login-popup:hover {
    display: block;
}

.login-link:hover img {
    cursor: pointer; 
    transform: scale(1.1); 
}







/* POPUPS */
.popup {
    display: none; 
    position: fixed; 
    top: 50%; 
    left: 50%;
    transform: translate(-50%, -50%); 
    background-color: rgba(255, 255, 255, 0.5); 
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 25%;
    height: 50%;
    z-index: 1001;
    padding: 20px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
    overflow: scroll;
}





/* OVERLAY */
.popup-overlay {
    display: none; 
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Black backdrop with 80% opacity */
    backdrop-filter: blur(5px); /* Add blur effect */
    z-index: 1000; /* Behind the popup */
}





/* LOGIN POPUP STYLES */
#login-popup {
    position: absolute;

}

.popup-content {
    max-width: 400px; 
    color: white;
    font-size: 22px;
    overflow: scroll;
}

.popup-content h2 {
    color: white;
    font-size: 22px;
    margin: 0; 
}

.close-btn {
    cursor: pointer;
    float: right; 
}

.popup-button {
    background-color: black; 
    color: white; 
    border: none; 
    padding: 10px 20px;
    font-size: 16px; 
    cursor: pointer; 
    text-align: center; 
    text-decoration: none; 
    display: inline-block; 
}

.popup-button:hover {
    background-color: white;
    color: black;
}









/* SELECT MENU */
.select-menu {
    width: 90%; 
    padding: 8px; 
    font-size: 16px; 
    border: 1px solid #ccc; 
    border-radius: 5px; 
    background-color: white;
    background-image: url('data:image/svg+xml;charset=UTF-8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'16\' height=\'16\' viewBox=\'0 0 16 16\' fill=\'%23333\'%3E%3Cpath d=\'M4 6l4 4 4-4z\'/%3E%3C/svg%3E'); /* SVG arrow */
    background-repeat: no-repeat; 
    background-position: right 10px center;
    background-size: 16px; 
    appearance: none; 
}

/* Optionally, add some custom styles for the select menu to improve appearance */
.select-menu:focus {
    border-color: darkblue; 
    outline: none; 
}










.nav-tabs ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.nav-tabs ul li {
    display: inline;
    margin-right: 20px;
}

.nav-tabs ul li a {
    text-decoration: none;
    color: darkblue; 
    padding: 10px 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f1f1f1;
    transition: background-color 0.3s ease;
}

.nav-tabs ul li a:hover {
    background-color: #ddd; 
}


.nav-link {
    text-decoration: none; 
    color: #000;
    font-weight: bold;
    text-align: left;
    margin-top: 12%;
}

.nav-link:hover {
    color: darkblue; 
}

.nav-divider {
    border: none; 
    height: 2px;
    background-color: black;
    margin-top: 10px; 
    margin-bottom: 20px; 
}






.image-container {
    text-align: left;
    margin: 5% 0%; 
    margin-left: 3%; 
}

.image-container img {
    max-width: 40%; 
    height: auto; 
}








/* RESPONSIVENESS */
@media (max-width: 768px) {
    header {
        flex-direction: column; 
        height: auto; 
        padding: 1%; 
    }

    header img {
        height: 1.2cm; 
    }

    .login-link {
        margin-top: 5px;
        font-size: 16px; 
    }

    #login-popup {
        width: 70%; 
        height: 70%; 
        top: 3.5cm; 
        right: 15%; 
    }

    .login-popup-content input[type="text"],
    .login-popup-content input[type="password"],
    .login-popup-content button {
        width: 60%; 

    }

    .nav-link {
    text-decoration: none; 
    color: #000; 
    font-weight: bold; 
    text-align: center;
    margin-top: 30%;
    }

    .image-container {
    text-align: center;
    margin: 5% 0; 
    margin-left: 3%; 
    }

    .image-container img {
    max-width: 70%;
    height: auto;

    }


}
