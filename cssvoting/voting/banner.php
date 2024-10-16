<?php

//session_start();

$bannerFile = 'banner.txt'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['banner_content'])) {
    $bannerContent = trim($_POST['banner_content']);
    
    // SAVE NEW BANNER
    if (!empty($bannerContent)) {
        file_put_contents($bannerFile, $bannerContent);
        // Optional: Set a session message to indicate success
        $_SESSION['banner_message'] = "Banner updated successfully!";
    }
}

// READ CURRENT BANNER CONTENT
$currentBannerContent = file_exists($bannerFile) ? file_get_contents($bannerFile) : "WELCOME TO THE CSS VOTING SYSTEM. PLEASE WAIT FOR ANNOUNCEMENTS.";
?>

<!-- BANNER SECTION -->
<div id="banner">
    <marquee><?php echo htmlspecialchars($currentBannerContent); ?></marquee>
</div>