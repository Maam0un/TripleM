<?php include('DBLink.php') ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset = "utf-8">
      <title>Sign Up</title>

	           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
			   <link rel="stylesheet" type="text/css" href="styles.css" />
			   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

			   <script src="java.js"></script>
			   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

	<link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
   </head>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<body style="background-color: #242526; ">
	<marquee style=" padding-top:1%;font-size:35px; color:white;"width="100%" direction="right" height="1%" scrollamount="10">
			<img class="a" height="5%" width="5%" src="Help Center/W.png">elcome to the official <span style="color:#FFD700">Triple M</span> website </marquee>
		
		<p>
		<section class="TripleM">
		<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #3A3B3C;">
  <div class="container-fluid">
  <a class="navbar-brand"href="Home Pagelog.php">
		<img src = "Logo\Logopit_1587821924357.png" width="30" height="30" alt=""> </a>
    <button class="navbar-toggler pull-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home page.php">Home</a>
        </li>
       
        
        <li class="nav-item">
          <a class="nav-link" href="Help Center.php">Help Center</a>
		</li>
		<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Register</a>
        </li>
        
        
      </ul>
     
    </div>
  </div>
</nav>
		</section>
  <br>







		
		
  <section  id="Page1">

  <form method="post" action="SignUp.php" >
  <div class="modal-dialog " style="max-width: 550px;">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong>Sign Up</strong></h3>
      </div>
      <div class="modal-body">
      <?php include('errors.php') ; ?>
	  <div class="row g-3">
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="fname" id="floatingInputGrid" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>" placeholder="name@example.com" >
      <label for="floatingInputGrid">First Name</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="lname" id="floatingInputGrid" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Last Name</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="username" id="floatingInputGrid" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Username</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="email" id="floatingInputGrid" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Email</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingInputGrid" placeholder="name@example.com">
      <label for="floatingInputGrid">Password</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="password" class="form-control" name="password_2" id="floatingInputGrid" placeholder="name@example.com">
      <label for="floatingInputGrid">Confirm Password</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="date" class="form-control" name="dob" id="floatingInputGrid" value="<?php echo isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Date of Birth</label>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-floating">
      <select class="form-select" name="gender" id="floatingSelectGrid" value="<?php echo isset($_POST["gender"]) ? $_POST["gender"] : ''; ?>" aria-label="Floating label select example">
        <option selected style="display:none;">Choose</option>
        <option>Male</option>
        <option>Female</option>
      </select>
      <label for="floatingSelectGrid">Gender</label>
    </div>
  </div>
  <div class="col-md-12">
  <div class="mb-3">
  <label for="formFile" class="form-label">Choose Avatar</label>
  <input class="form-control" type="file" name="avatar" id="formFile" value="<?php echo isset($_POST["avatar"]) ? $_POST["avatar"] : ''; ?>">
</div>
  </div>
  <table class="table" style="text-align: center;">
  <thead class="thead-dark table-dark">
    <tr>
      <th scope="col">Specifications</th>
      <th scope="col">Plan A</th>
      <th scope="col">Plan B</th>
      <th scope="col">Plan C</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Price</th>
      <td>12.99$</td>
      <td>8.99$</td>
      <td>5.99$</td>
    </tr>
    <tr>
      <th scope="row">Video Quality</th>
      <td>4k</td>
      <td>1080p</td>
      <td>720p</td>
    </tr>
	<tr class="table-dark">
      <th scope="row">Cboose</th>
      <td><input class="form-check-input" type="radio" name="plan" value="A" ></td>
      <td><input class="form-check-input" type="radio" name="plan" value="B" ></td>
      <td><input class="form-check-input" type="radio" name="plan" value="C" ></td>
    </tr>
  </tbody>
</table>
 
</div>
	  </div>

      <div class="modal-footer">
        <button type="button" onclick="return show('Page2','Page1');" class="btn btn-primary">Next</button>
	  </div>
	  </section>
	  













	  <section id="Page2" style="display:none">
	  <div class="modal-dialog " style="max-width: 550px;">
    <div class="modal-content">
      <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
		<img src = "Logo\visa.jpg" width = "70" height ="40" alt = "Visa Logo" style="border-radius: 15%;"> 
			<img src = "Logo\mastercard.jpg" width = "70" height ="40" alt = "Mastercard Logo" style="border-radius: 15%;"> 
			<img src = "Logo\american.jpg" width = "70" height ="40" alt = "American Express Logo" style="border-radius: 15%;">
      </div>
      <div class="modal-body">
	  <div class="row g-3">
    <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="cfname" id="floatingInputGrid" value="<?php echo isset($_POST["cfname"]) ? $_POST["cfname"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">First Name</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="clname" id="floatingInputGrid"  value="<?php echo isset($_POST["clname"]) ? $_POST["clname"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Last Name</label>
    </div>
  </div>
  <div class="col-md-12">
  
      Card Number
    
  </div>
  <div class="col-md-3">
  <div class="form-floating">
      <input type="text" class="form-control" maxlength="4" name="creditCard1" value="<?php echo isset($_POST["creditCard1"]) ? $_POST["creditCard1"] : ''; ?>" id="floatingInputGrid" placeholder="name@example.com">
    </div>
  </div>
  <div class="col-md-3">
  <div class="form-floating">
      <input type="text" class="form-control" maxlength="4" name="creditCard2" value="<?php echo isset($_POST["creditCard2"]) ? $_POST["creditCard2"] : ''; ?>" id="floatingInputGrid"  placeholder="name@example.com">
    </div>
  </div>
  <div class="col-md-3">
  <div class="form-floating">
      <input type="text" class="form-control" maxlength="4" name="creditCard3" value="<?php echo isset($_POST["creditCard3"]) ? $_POST["creditCard3"] : ''; ?>" id="floatingInputGrid"  placeholder="name@example.com">
    </div>
  </div>
  <div class="col-md-3">
  <div class="form-floating">
      <input type="text" class="form-control" maxlength="4" name="creditCard4" value="<?php echo isset($_POST["creditCard4"]) ? $_POST["creditCard4"] : ''; ?>" id="floatingInputGrid"  placeholder="name@example.com">
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="date" class="form-control" name="exp" id="floatingInputGrid"  value="<?php echo isset($_POST["exp"]) ? $_POST["exp"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Expiration Date</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="password" class="form-control" maxlength="4" id="floatingInputGrid" placeholder="name@example.com">
      <label for="floatingInputGrid">CVV</label>
    </div>
  </div>

<strong>Billing Address</strong>

<div class="col-md-12">
  <div class="form-floating">
      <input type="text" class="form-control" name="address" id="floatingInputGrid"  value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>"  placeholder="name@example.com">
      <label for="floatingInputGrid">Address</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="city" id="floatingInputGrid" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">City</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="country" id="floatingInputGrid" value="<?php echo isset($_POST["country"]) ? $_POST["country"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Country</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" name="phone" id="floatingInputGrid" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Phone No.</label>
    </div>
  </div>
  <div class="col-md-6">
  <div class="form-floating">
      <input type="text" class="form-control" maxlength="4" name="zip" id="floatingInputGrid" value="<?php echo isset($_POST["zip"]) ? $_POST["zip"] : ''; ?>" placeholder="name@example.com">
      <label for="floatingInputGrid">Zip Code</label>
    </div>
  </div>
  
</div>


<div class="modal-footer">
        <button type="button" onclick="return show('Page1','Page2');" class="btn btn-primary">Back</button>
        <button type="submit" type="button" class="btn btn-primary" name="reg_user">Subscribe</button>
	  </div>


</section>

    </div>
  </div>
  </form>



		<hr>
		<section> 
		<ul class="ul">
			<p>
			<img src = "Logo\Logopit_1587821924357.png" width = "200" height ="200"
				alt = "Triple M Logo">

				<a href="https://www.facebook.com/triple.triple.9809672" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>

<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
<p>				<a>Copyright &copy Triple M
				</a></p>
			</p> 
		</ul>
</section>	
 <script>
    function show(shown, hidden) {
      document.getElementById(shown).style.display='block';
      document.getElementById(hidden).style.display='none';
      return false;
	}
	
	
	function ShowPass() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
	</body>
</html>