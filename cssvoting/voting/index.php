<?php 


$url=isset($_GET['url']) ? $_GET['url'] : 'index';


switch ($url) {

	case 'Home':
		include 'cssvoting_home.php';
		break;

	case 'ViewUser':
		include 'viewuser.php';
		break;

	case 'Account':
		include 'changepass.php';
		break;	

	case 'Users':
		include 'users.php';
		break;	

	case 'Login':
		include 'cssvoting_login.php';
		break;

	case 'Admin':
		include 'admin_home.php';
		break;	
		
	default:
		echo "<script>window.location.href='Login'</script>";
		break;
}
 


 ?>
 