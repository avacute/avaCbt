<?php 
include_once('config.php');
$userId = $_POST['user_id'] ;
$accessKey = $_POST['access_key'];
$act = $_POST['action'];
switch ($act) {
	case 'Login':
		userLogin($userId, $accessKey, $conn);
		break;
	
	default:
		# code...
		break;
}
function userLogin($user, $key, $conn){
  		$userTest = mysqli_query($conn,"select user_id,access_key, status from candidate where user_id = '$user'") or die(mysqli_error($conn));
  		if (mysqli_num_rows($userTest) == 1) {
		  	while($userRow = mysqli_fetch_array($userTest)){
		  	if($userRow['status'] == 0){
		  		if($key == $userRow['access_key']) {
		  				$_SESSION['islogin'] = 1;
		  				$_SESSION['user'] = $userRow['cand_nm'];
		  				$_SESSION['candId'] = $user;
		  			 mysqli_query($conn, "UPDATE candidate SET status = 1 where user_id = '$user'") or die(mysqli_error($conn));
		  				header('Location:../xam.php');	
		      	}else{
		      		header('Location:../index.php?error=username or Access Key not valid');
		      	}
		    }else{
		    	header('Location:../index.php?error=you have taken exam');
		    }
		}
	     }else{

	    	header('Location:../index.php?error=User Not found');
	    }
}

 ?>