sdocument.addEventListener("DOMContentLoaded", function () {
    var loginLink = document.getElementById("login-link");
    var loginPopup = document.getElementById("login-popup");

    loginLink.addEventListener("click", function () {
        loginPopup.style.display = "block";
    });

    window.addEventListener("click", function (e) {
        if (e.target == loginPopup) {
            loginPopup.style.display = "none";
        }
    });
});

const openPopupLinks = document.querySelectorAll('.open-popup');
const closeBtns = document.querySelectorAll('.close-btn');
const popups = document.querySelectorAll('.popup');

// CLOSE POPUP
openPopupLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const popupId = this.getAttribute('data-popup');
        document.getElementById(popupId).style.display = 'block';
    });
});

// CLOSE POPUP
closeBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        this.closest('.popup').style.display = 'none';
    });
});

// CLOSE WHEN NOT CLICKING
window.addEventListener('click', function(event) {
    popups.forEach(popup => {
        if (event.target === popup) {
            popup.style.display = 'none';
        }
    });
});