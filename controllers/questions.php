<?php 
include_once('db.php');
$json = array();

$rst = mysqli_query($conn, "SELECT id,quest,answer,option_a,option_b,option_c,option_d,weight FROM questions ORDER BY RAND() LIMIT 5");
if (mysqli_num_rows($rst) > 0) {
	while($row = mysqli_fetch_array($rst)){

	 array_push($json, array(
	 	$row['id'], 
	 	$row['quest'], 
	 	$row['answer'],
	 	$row['option_a'],
		$row['option_b'],
		$row['option_c'],
		$row['option_d'],	
		$row['weight'])
	
	);
	
  	}

  	echo json_encode($json);
}


 ?>