<?php
	
	if(isset($_GET['vkey'])){
		$vkey = $_GET['vkey'];

		$db = mysqli_connect('localhost', 'root', 'stargold989', 'TripleM');

		$results = $db->query("SELECT Verified,Vkey FROM users WHERE Verified = 0 AND Vkey='$vkey'");
		
		if ($results->num_rows == 1) {

			$update=$db->query ("UPDATE users SET Verified = 1 WHERE Vkey='$vkey' LIMIT 1");

		if($update){
			header("location: home page.php?verified=true");
		 }
		}else{
			echo "Account is invalid or already verified!";
		}

		
	}else{
		echo "Account is invalid or already verified!";
	}
	
?>
			