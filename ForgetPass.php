<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<style>

.error {
width: 99%; 
margin: 0px auto; 
padding: 10px; 
border: 1px solid #a94442; 
color: #a94442; 
background: #f2dede; 
border-radius: 5px; 
text-align: left;
}

.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	width: 99%; 
margin: 0px auto; 
padding: 10px; 
border-radius: 5px; 
text-align: left;
}

</style>

</head>
<body>
<?php	

$errors = array(); 

$db = mysqli_connect('localhost', 'root', 'stargold989', 'TripleM');

if(isset($_POST['email'])){
$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE Email='$email'"; 
$result = $db->query($sql);
if (mysqli_num_rows($result) > 0) {

  $vkey=md5(time().$email);

  $query = "UPDATE users set Vkey='$vkey' where Email='$email'";
  mysqli_query($db, $query);

  $to_email = $email;
  $subject = 'Forget Pass | Reset';
  $body =  '
  ------------------------
  Please click this link to reset password:
  http://localhost/ProjectWD/forgetpass.php?email='.$email.'&vkey='.$vkey.'';
  $headers = "From: Triple M";
  
  mail($to_email, $subject, $body, $headers);



}else{
  array_push($errors, "Email doesn't exist");
}
}

 


if(isset($_GET['vkey'])){
  $vkey = $_GET['vkey'];
  $email = $_GET['email'];
  
  $sql = "SELECT * FROM users WHERE Email='$email' AND Vkey='$vkey'"; //You don't need a ; like you do in SQL
  $result = $db->query($sql);
  if (!mysqli_num_rows($result) > 0) {
    header("location: home page.php?vkey='$vkey'&email=$email");
  }
  }

  if(isset($_POST['password'])){
    $password = mysqli_real_escape_string($db, $_POST['password']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $email = mysqli_real_escape_string($db, $_GET['email']);
    $vkey = mysqli_real_escape_string($db, $_GET['vkey']);

    if ($password != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

    $uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number|| strlen($password) < 8) {
			array_push($errors, "Password should be at least 8 characters in length and should include at least one upper case letter, and one number.");
		}

    if (count($errors) == 0) {
    $query = "UPDATE users SET Password='$password' WHERE Email='$email' AND Vkey='$vkey'";
    mysqli_query($db, $query);
    header("location: home page.php?Success=True");
    }

    }
    

    ?>




  <div class="modal-dialog" >
    <div class="modal-content" style=" <?php echo isset($_GET["vkey"]) ? "display:none" : ''; ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
      </div>
      <div class="modal-body" >
      <?php include('errors.php'); ?>
   <?php if (isset($_POST['email'])){  ?>
			<section><br><div class="error success" >
				<h5>
					<?php 
						echo "Change password request has been sent to your email!"; 
					?>
          </h5>
			</div></section>
			<?php } ?>
        <p style=" <?php echo isset($_POST["email"]) ? "display:none" : ''; ?>">
        Please enter your email!
        </p>
        <p>
        <form method="post" action="Forgetpass.php">
        <input type="email" class="form-control" name="email" placeholder="Email" style=" <?php echo isset($_POST["email"]) ? "display:none" : ''; ?>">
        </p>
      </div>
      <div class="modal-footer">
      <a class="btn btn-primary" href="home page.php" style="text-decoration:none; <?php echo isset($_POST["email"]) ? '' : "display:none"; ?>">
    Back to TripleM</a>
        <button type="submit" class="btn btn-primary" style=" <?php echo isset($_POST["email"]) ? "display:none" : ''; ?>">Confirm</button>
        </form>
      </div>
</div>
      <div class="modal-content" style=" <?php echo isset($_GET["vkey"]) ? '' : "display:none"; ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Password Reset</h5>
      </div>
      <div class="modal-body" >
      <?php include('errors.php'); ?>
   <?php if (isset($_POST['password'])){ 
     if (count($errors) == 0) { ?>
			<section><br><div class="error success" >
				<h5>
					<?php 
						echo "Password successfuly changed!"; 
					?>
          </h5>
			</div></section>
			<?php }} ?>
        <p>
        Enter a new Password
        </p>
        <p>
        <form method="post" action="">
        <input type="password" class="form-control" name="password" id="new" placeholder="Password" ><br>
        <input type="password" class="form-control" name="password_2" id="confirm" placeholder="Confirm Password" ><br>
        <div class="form-check">
      <input class="form-check-input" onclick="ShowPass()" style="float: left" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Show Password
		</label>
    </div>
        </p>
      </div>
      
      <div class="modal-footer">
    
        <button type="submit" class="btn btn-primary" >Confirm</button>
        </form>
      </div>
    </div>
  </div>


  <script> 
function ShowPass() {

  var y = document.getElementById("new");
  var z = document.getElementById("confirm");

  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }

  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }
}
</script> 
</body>
</html>