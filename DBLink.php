<?php 
	session_start();

	
	$fname = "";
	$lname = "";
	$email    = "";
	$password    = "";
	$date = "";
	$plan    = "";
	$errors = array(); 
	$_SESSION['success'] = "";


	$db = mysqli_connect('localhost', 'root', 'stargold989', 'TripleM');

	
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		
		$email = mysqli_real_escape_string($db, $_POST['email']);

		$query = "SELECT * FROM users WHERE email='$email'";
		$match1 = mysqli_query($db, $query);

		
		if (mysqli_num_rows($match1) == 1) {
			array_push($errors, "Email already exists");

		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			array_push($errors, "Invalid email");
        }


		$username = mysqli_real_escape_string($db, $_POST['username']);

		$query = "SELECT * FROM users WHERE username='$username'";
		$match2 = mysqli_query($db, $query);
		if (mysqli_num_rows($match2) == 1) {
			array_push($errors, "Username already exists");

		}
		

	    $avatar = mysqli_real_escape_string($db, $_POST['avatar']);	
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$plan = mysqli_real_escape_string($db, $_POST['plan']);

		$cfname = mysqli_real_escape_string($db, $_POST['cfname']);
		$clname = mysqli_real_escape_string($db, $_POST['clname']);
		$card1 = mysqli_real_escape_string($db, $_POST['creditCard1']);
		$card2 = mysqli_real_escape_string($db, $_POST['creditCard2']);
		$card3 = mysqli_real_escape_string($db, $_POST['creditCard3']);
		$card4 = mysqli_real_escape_string($db, $_POST['creditCard4']);
		$exp = mysqli_real_escape_string($db, $_POST['exp']);

		$address = mysqli_real_escape_string($db, $_POST['address']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$country = mysqli_real_escape_string($db, $_POST['country']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$zip = mysqli_real_escape_string($db, $_POST['zip']);
		
		if (empty($username) || empty($avatar) || empty($fname) || empty($lname) || empty($dob) || empty($gender) || 
		empty($plan) || empty($cfname) || empty($lname) || empty($card1) || empty($card2) || empty($card3) || 
		empty($card4) || empty($exp) || empty($address) || empty($city) || empty($phone) || empty($zip)) {
			array_push($errors, "Empty Fields!");
		}

		if ($password != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number|| strlen($password) < 8) {
			array_push($errors, "Password should be at least 8 characters in length and should include at least one upper case letter, and one number.");
		}

	
		$card2=$card3 = "XXXX";
		$card = $card1."-".$card2."-".$card3."-".$card4;

		// register user if there are no errors in the form
		if (count($errors) == 0) {
	    	$birthdate = new DateTime($dob);
			$today   = new DateTime('today');
			$age = $birthdate->diff($today)->y;
			$current_timestamp = date('Y-m-d');
			$vkey=md5(time().$username);

			$query = "INSERT INTO users (Avatar, First_Name, Last_Name, Username, Email, Password, Age, Gender, Plan, Date, Address, City, Country, Phone, Zip, Verified, Vkey) 
					  VALUES('$avatar', '$fname', '$lname','$username', '$email', '$password', '$age', '$gender', '$plan', '$current_timestamp', '$address', '$city', '$country', '$phone', '$zip', '0', '$vkey')";
			mysqli_query($db, $query);

	    $to_email = $email;
		$subject = 'Signup | Verification';
		$body =  '
		  
		Thanks for signing up!
		Your account has been created, you can login after you have activated your account by pressing the url below.
		  
		------------------------
		Name: '.$fname.' '.$lname.'
		Username: '.$username.'
		------------------------
		  
		Click this link to activate your account:
		http://localhost/ProjectWD/verify.php?vkey='.$vkey.'';
		$headers = "From: Triple M";
		
		mail($to_email, $subject, $body, $headers);


			$sql = "INSERT INTO Cards (Username, First_Name, Last_Name, CardNumber, ExpDate) 
			VALUES('$username', '$cfname', '$clname', '$card', '$exp')";		  
			mysqli_query($db, $sql);
			
			header("location: home page.php?email=$email");
		}


	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);


		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}


		if (count($errors) == 0) {
			
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				while($row = $results->fetch_assoc()) {
					
					$fname= $row['First_Name'];
					$lname= $row["Last_Name"];
					$username= $row['Username'];
					$avatar= $row['Avatar'];
					$verify= $row['Verified'];

					$_SESSION["avatar"] = $avatar;
					$_SESSION['fname'] = $fname;
					$_SESSION['lname'] = $lname;
					$_SESSION['username'] = $username;
				  }
				
				if($verify == 0){
					header("location: home page.php?email=$email");
				}else{
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in!";
				header("location: home pagelog.php?name=Home");}
			}else {
				array_push($errors, "Wrong Email/Password Combination!");
			}
		}
	}

	if (isset($_POST['logout_user'])) {
		
		session_destroy();
		header('location: home page.php');
		exit();
	}


    //add content
	if (isset($_POST['add_content'])) {
		// receive all input values from the form
		
		$video = mysqli_real_escape_string($db, $_POST['video']);
		$utube = mysqli_real_escape_string($db, $_POST['utube']);
		$screenshot1 = mysqli_real_escape_string($db, $_POST['screenshot1']);
		$screenshot2 = mysqli_real_escape_string($db, $_POST['screenshot2']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$name1 = mysqli_real_escape_string($db, $_POST['name1']);
		$synopsis = mysqli_real_escape_string($db, $_POST['synopsis']);
		$genre = mysqli_real_escape_string($db, $_POST['genre']);
		$rating = mysqli_real_escape_string($db, $_POST['rating']);
		$release = mysqli_real_escape_string($db, $_POST['release']);
		$poster = mysqli_real_escape_string($db, $_POST['poster']);
		$poster1 = mysqli_real_escape_string($db, $_POST['poster1']);
		$runtime = mysqli_real_escape_string($db, $_POST['runtime']);
		$cast1 = mysqli_real_escape_string($db, $_POST['cast1']);
		$cast2 = mysqli_real_escape_string($db, $_POST['cast2']);
		$castlink1 = mysqli_real_escape_string($db, $_POST['castlink1']);
		$castlink2 = mysqli_real_escape_string($db, $_POST['castlink2']);
		$direc = mysqli_real_escape_string($db, $_POST['direc']);
		$direclink = mysqli_real_escape_string($db, $_POST['direclink']);
		$writer1 = mysqli_real_escape_string($db, $_POST['writer1']);
		$writer2 = mysqli_real_escape_string($db, $_POST['writer2']);
		$writer1link = mysqli_real_escape_string($db, $_POST['writer1link']);
		$writer2link = mysqli_real_escape_string($db, $_POST['writer2link']);
		$type = mysqli_real_escape_string($db, $_POST['type']);
		
		
		if (empty($type)) {
			array_push($errors, "Error Empty Fields");
		}
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			if($type == "ComingSoon"){
				$query = "INSERT INTO ComingSoon (Name, Poster ) 
					  VALUES('$name1', '$poster1')";

			mysqli_query($db, $query);
			
			header('location: home pagelog.php#comingsoon');

			}else{
				$sql = "SELECT * FROM ComingSoon WHERE Name='$name'";
		        $match = mysqli_query($db, $sql);
		        if (mysqli_num_rows($match) == 1) {
					$sql = "DELETE FROM ComingSoon WHERE Name = '$name'"; 
					$results = mysqli_query($db, $sql);

		}

			$query = "INSERT INTO Movies (VideoFile, Youtube, Screenshot1, Screenshot2, name, 
			Synopsis, poster, genre, rating,  ReleaseYear, Runtime, Cast1, Cast1link, Cast2, Cast2link, 
			Director, Directorlink, writer1, writer1link, writer2, writer2link, Type ) 
					  VALUES('$video', '$utube', '$screenshot1', '$screenshot2', '$name', 
					  '$synopsis', '$poster', '$genre', '$rating', '$release', '$runtime', '$cast1', '$castlink1', 
					  '$cast2', '$castlink2', '$direc', '$direclink', '$writer1', '$writer1link', '$writer2', 
					  '$writer2link', '$type')";
					  
			mysqli_query($db, $query);
			header('Location: browse.php#movies');
		
		        }
		}
	}

	if (isset($_POST['add_comment'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$avatar = mysqli_real_escape_string($db, $_POST['avatar']);
		$page = mysqli_real_escape_string($db, $_POST['page']);
		$comment = mysqli_real_escape_string($db, $_POST['comment']);
		date_default_timezone_set('Asia/Beirut'); 
		$f=date("F jS, Y");
		$s=" at ";
		$t=date("h:iA");

		if (empty($comment)) {
			array_push($errors, "Error Empty Field");
		}

		$posted = $f.$s.$t;
		
		if (count($errors) == 0) {
		$query = "INSERT INTO Comments (Username, Avatar, Page, Comment, Dateposted) 
		VALUES('$username', '$avatar', '$page', '$comment', '$posted')";
        mysqli_query($db, $query);
		header("location: Moviepage.php?name=$page#comments");
		}
		
	}

	if (isset($_POST['add_card'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$cfname = mysqli_real_escape_string($db, $_POST['cfname']);
		$clname = mysqli_real_escape_string($db, $_POST['clname']);
		$card1 = mysqli_real_escape_string($db, $_POST['card1']);
		$card2 = mysqli_real_escape_string($db, $_POST['card2']);
		$card3 = mysqli_real_escape_string($db, $_POST['card3']);
		$card4 = mysqli_real_escape_string($db, $_POST['card4']);
		$exp = mysqli_real_escape_string($db, $_POST['exp']);
		$card2=$card3 = "XXXX";
		$card = $card1."-".$card2."-".$card3."-".$card4;

		$query = "SELECT * FROM Cards WHERE username='$username' AND CardNumber='$card'";
		$match = mysqli_query($db, $query);
		if (mysqli_num_rows($match) == 1) {
			array_push($errors, "Card already exists");

		}

		if (count($errors) == 0) {
		$sql = "INSERT INTO Cards (Username, First_Name, Last_Name, CardNumber, ExpDate) 
			VALUES('$username', '$cfname', '$clname', '$card', '$exp')";		  
			mysqli_query($db, $sql);
			
			header("location: profile.php");
            mysqli_query($db, $query);
		}
		
	}

	if (isset($_POST['watchlater']) || isset($_POST['favorites'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$poster = mysqli_real_escape_string($db, $_POST['poster']);
		$place = mysqli_real_escape_string($db, $_POST['place']);
		$added=date("F jS, Y");
	
		if(isset($_POST['watchlater'])){
		$query = "SELECT * FROM WatchLater WHERE MovieName='$name' AND Username='$username'";
		}elseif(isset($_POST['favorites'])) {
			$query = "SELECT * FROM Favorites WHERE MovieName='$name' AND Username='$username'";
		}
		$match2 = mysqli_query($db, $query);

		if (mysqli_num_rows($match2) == 1) {
			array_push($errors, "$name has already been added!");

		}
		
		if(count($errors) == 0) {
			if(isset($_POST['watchlater'])){

				$sql = "INSERT INTO WatchLater (Username, MovieName, Poster, AddedDate) 
			VALUES('$username', '$name', '$poster', '$added')";	

				}elseif(isset($_POST['favorites'])) {

					$sql = "INSERT INTO Favorites (Username, MovieName, Poster, AddedDate) 
			VALUES('$username', '$name', '$poster', '$added')";	
			
				}
			  
			mysqli_query($db, $sql);
			if($place == "Movie"){
			header("location: MoviePage.php?name=$name&added=True");
			}elseif($place == "Home"){
				header("location: Home Pagelog.php?added=$name");
			}elseif($place == "Browse"){
				header("location: browse.php?added=$name");
			}
		}
           
	}
	
	if (isset($_POST['RemoveWatchLater'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$name = mysqli_real_escape_string($db, $_POST['name']);

		$query = "DELETE FROM WatchLater WHERE MovieName = '$name' AND Username='$username'"; 
        $results = mysqli_query($db, $query);
	
	}


	if (isset($_POST['add_admin'])) {
		// receive all input values from the form
		
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$query = "SELECT * FROM users WHERE username='$username'";
		$match2 = mysqli_query($db, $query);
		if (mysqli_num_rows($match2) == 1) {
			array_push($errors, "Username already exists");

		}

	    $avatar = mysqli_real_escape_string($db, $_POST['avatar']);	
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$dob = mysqli_real_escape_string($db, $_POST['dob']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);

		$address = mysqli_real_escape_string($db, $_POST['address']);
		$city = mysqli_real_escape_string($db, $_POST['city']);
		$country = mysqli_real_escape_string($db, $_POST['country']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$zip = mysqli_real_escape_string($db, $_POST['zip']);


		if ($password != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number|| strlen($password) < 8) {
			array_push($errors, "Password should be at least 8 characters in length and should include at least one upper case letter, and one number.");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
	    	$birthdate = new DateTime($dob);
			$today   = new DateTime('today');
			$age = $birthdate->diff($today)->y;
			$_SESSION["age"] = $age;
			$current_timestamp = date('Y-m-d');
			$vkey=md5(time());
			$plan="Admin";
			$email = $email."@TripleM.com";

			$query = "INSERT INTO users (Avatar, First_Name, Last_Name, Username, Email, Password, Age, Gender, Plan, Date, Address, City, Country, Phone, Zip, Verified, Vkey) 
					  VALUES('$avatar', '$fname', '$lname','$username', '$email', '$password', '$age', '$gender', '$plan', '$current_timestamp', '$address', '$city', '$country', '$phone', '$zip', '1', '$vkey')";
			mysqli_query($db, $query);

			
		}


	}

	
	
	

		
?>

