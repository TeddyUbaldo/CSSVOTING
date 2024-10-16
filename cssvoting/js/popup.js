    // SHOW / HIDE POPUPS
    document.querySelectorAll('.open-popup').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior
            const popupId = link.getAttribute('data-popup');
            document.querySelector('.popup-overlay').style.display = 'block'; // Show overlay
            document.querySelector(`#${popupId}`).style.display = 'block';
            document.querySelector('#login-popup').style.display = 'none'; // Hide login popup
        });
    });

    // CLOSE BUTTON FOR POPUPS
    document.querySelectorAll('.close-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.querySelector('.popup-overlay').style.display = 'none'; // Hide overlay
            this.closest('.popup').style.display = 'none';
        });
    });

    // TOGGLE MENU ON HOVER
document.querySelector('.login-link').addEventListener('click', function() {
    const loginPopup = document.querySelector('#login-popup');
    if (loginPopup.style.display === 'block') {
        loginPopup.style.display = 'none';
    } else {
        loginPopup.style.display = 'block';
    }
});

    // UPLOAD IMAGE

    document.getElementById('imageUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader(); 
            
            reader.onload = function(e) {
                document.getElementById('image').src = e.target.result; 
            };
            
            reader.readAsDataURL(file);
        }
    });
