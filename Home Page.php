<?php 
	
	include('DBLink.php');
	
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset = "utf-8" >
      <title>Triple M</title>

			   
			   
			   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
			   <link rel="stylesheet" type="text/css" href="styles.css" />
			   <link rel="stylesheet" type="text/css" href="TripleM.css" />

			   <script src="java.js"></script>
			   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>	
			   
	<link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
   </head>
   <?php include('errors.php'); ?>
<h3>
   <?php
   
   if(isset($_GET["email"])){
	   $email = $_GET['email'];
	   echo "<div class='success'>A verification Email was sent to ".$email." </div>";
   } 
   
   if(isset($_GET["Success"])){
	echo "<div class='success'>Password successfully changed! You may now login! </div>";
} 

if(isset($_GET["verified"])){
	echo "<div class='success'>Account Successfully Verified! </div>";
} 

 ?></h3>
  
	<body>
	<marquee style=" padding-top:1%;font-size:35px;"width="100%" direction="right" height="1%" scrollamount="10">
			<img class="a" height="5%" width="5%" src="Help Center/W.png">elcome to the official <span style="color:#FFD700">Triple M</span> website </marquee>


	
		<p>
			<section class="TripleM sticky-top">
		<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #3A3B3C;">
  <div class="container-fluid">
  <a class="navbar-brand"href="Home Pagelog.php">
		<img src = "Logo\Logopit_1587821924357.png" width="30" height="30" alt=""> </a>
    <button class="navbar-toggler pull-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home pagelog.php">Home</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Browse
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
			<li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#denied">Movies</a></li>
			<li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#denied">TV Shows</a></li>
          </ul>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="Help Center.php">Help Center</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/ProjectWD/SignUp.php">Register</a>
        </li>
        
      </ul>
     
    </div>
  </div>
</nav>
		</section>
		<div class="alert"> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>WARNING!!</strong> You aren't logged in. Log in or Sign Up and subscribe to one of our plans.
</div>				
   </p>
   
   <section>
	
	<header class= "p" style= "color:white; font-size: 20pt; background-color: #3A3B3C; padding: 2%;"><strong>
	Browse and Watch Movies and TV Shows in excellent Blu-Ray quality.</br>To gain access, please register and subscribe to one of our plans.
	</strong></header>
</section>	

	<hr>
		
	<section> 
		<h1 class= "header"> &#10052; Top Movies
		</h1>

		<p>

		<?php

	$db = mysqli_connect('localhost', 'root', 'stargold989', 'triplem');

	$sql = "SELECT * FROM Movies WHERE Rating>= '8.0' ORDER BY Rating DESC LIMIT 4 ";
    $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>
			 <div class="row_h">
			
				<div class="column_h">
				 <a href="javascript:void(0)" onclick="document.getElementById('id02').style.display='block'"> 
					<div class="overlay">
					  <img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Move Poster" class="image">
						<div class="middle">
							<div class="text">						
							<p><?php echo $row['Genre'] ?>
								 </p>
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br> <?php echo $row['Rating']  ?>	&#9733;
								</p>
							</div>
						</div>
					</div>
					</a>
					<figcaption class= "h1"> <strong> <?php echo $row['Name'] ?> </strong>	
					</figcaption>
				</div>

				<?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>
			<span id="dots"></span>
			 <span id="more">
			 <?php		
			 $sql = "SELECT * FROM Movies WHERE Rating>= '8.0' ORDER BY Rating DESC LIMIT 4,4";
    $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>
		
			
				<div class="column_h">
				 <a href="javascript:void(0)" onclick="document.getElementById('id02').style.display='block'"> 
					<div class="overlay">
					  <img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Move Poster" class="image">
						<div class="middle">
							<div class="text">						
							<p><?php echo $row['Genre'] ?>
								 </p>
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br> <?php echo $row['Rating']  ?>	&#9733;
								</p>
							</div>
						</div>
					</div>
					</a>
					<figcaption class= "h1"> <strong> <?php echo $row['Name'] ?> </strong>	
					</figcaption>
				</div>

				<?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>
			  </span>
			
<button class="button_gr" style="  font-size: 18px; width:20%; margin-left:40%;"onclick="show()" id="myBtn">&#8659;  Show More  &#8659;</button>

</div>
		</p>
	</section>
	<hr>

	<section> 
		<h1 class= "header"> &#10052; Top TV Shows 
		</h1>

		<p>
			<div class="row_h">
				<div class="column_h">
				<a href="javascript:void(0)" onclick="document.getElementById('id02').style.display='block'">
					<div class="overlay">
					<img src="Movie Posters\13RW.jpg" alt="13 Reasons Why " class="image">
						<div class="middle">	
							<div class="text">		
								<p> Drama / Mystery 
								</p> 
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br> 7.7 	&#9733;
								</p>
							</div>
						</div>
					</div>  	
					</a>
					<figcaption class= "h1"> <strong>13 Reasons Why </strong>	
					</figcaption>
				</div>
				<div class="column_h">
					<div class="overlay">
					<a href="javascript:void(0)" onclick="document.getElementById('id02').style.display='block'">
					<img  src="Movie Posters\L.jpg" alt="Lucifer  " class="image">
						<div class="middle">	
							<div class="text">
								<p> Crime / Drama / Fantasy 
								</p> 
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br>  8.2  	&#9733;
								</p>
							</div>
						</div>
					</div>  
</a>					
					<figcaption class= "h1"> <strong>Lucifer </strong>	
					</figcaption>
				</div>
				<div class="column_h">
				<a href="javascript:void(0)" onclick="document.getElementById('id02').style.display='block'">
					<div class="overlay">
					<img src="Movie Posters\PB.jpg" alt="Prison Break" class="image">
						<div class="middle">	
							<div class="text">
								<p>Action / Crime / Drama
								</p> 
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br> 8.3 	&#9733;
								</p>
							</div>
						</div>
					</div>  	
					</a>
					<figcaption class= "h1"> <strong>Prison Break</strong>	
					</figcaption> 
				</div>
				<div class="column_h">
				<a href="javascript:void(0)" onclick="document.getElementById('id02').style.display='block'">
					<div class="overlay">
					<img src="  Movie Posters\WW.jpg"   class="image" alt="Westworld">
						<div class="middle">	
							<div class="text">	
								<p>Drama / Mystery / Sci-Fi 
								</p> 
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br> 8.7 	&#9733;
								</p>
							</div>
						</div>
					</div>  
</a>					
					<figcaption class= "h1"> <strong>Westworld</strong>	
					</figcaption> 
				</div>
			</div>
		</p>
	</section>
	<hr>
	<section> 
		<h1 class= "header"> &#10052; Coming Soon 
		</h1>

		<p>
		<?php

$sql = "SELECT * FROM ComingSoon ORDER BY ID ASC LIMIT 4 ";
$rs_result = $db->query($sql);

if (mysqli_num_rows($rs_result) > 0) {
	while($row = $rs_result->fetch_assoc()) {?>

		 	<div class="row_h">
				<div class="column_h">
					<div class="overlay">
					<img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Snow" class="image">
						 <div class="middle">	
							<div class="text">	
								<p>Coming Soon
								</p>
							</div>
						</div>
					</div>  
					<figcaption class= "h1"> <strong><?php echo$row['Name'] ?></strong>	
					</figcaption>
				</div>

			<?php		
			}
	} else {
	  echo "0 results";
	}

			
	?>
			<span id="dots2"></span>
			 <span id="more2">
			 <?php		
			 $sql = "SELECT * FROM ComingSoon ORDER BY ID ASC LIMIT 4,4";
    $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>
		
			
				<div class="column_h">
					<div class="overlay">
					<img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Snow" class="image">
						 <div class="middle">	
							<div class="text">	
								<p>Coming Soon
								</p>
							</div>
						</div>
					</div>  
					<figcaption class= "h1"> <strong><?php echo$row['Name'] ?></strong>	
					</figcaption>
				</div>


				<?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>
			  </span>
			
<button class="button_gr" style="  font-size: 18px; width:20%; margin-left:40%;"onclick="show2()" id="myBtn2">&#8659;  Show More  &#8659;</button>

</div>
		</p>
	</section>
	
	

	<hr>
	<br>	
	<section> 
		<ul class="ul">
			<p>
			<img src = "Logo\Logopit_1587821924357.png" width = "200" height ="200"
				alt = "Triple M Logo">

				<a href="https://www.facebook.com/triple.triple.9809672" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>

<p>				Copyright &copy Triple M Licensed by <a class="nodec" href="https://www.mplc.org" >Motion Picture Licensing Corporation</a></p>
			</p> 
		</ul>	
  </div></section>


  <section class="TripleM">

  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " style="max-width: 400px;">
    <div class="modal-content">
      <div class="modal-header">
	  <div class="imgcontainer">
			<img src="Logo\Logopit_1587821924357.png" alt="Avatar" class="avatar3">
				</div>
      </div>
      <div class="modal-body">
	  <form action="Home Page.php" method="post">
	  <div class="row g-3">
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="pass">
  </div>
  <div class="col-8">
    <div class="form-check">
      <input class="form-check-input" onclick="ShowPass()" style="float: left" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Show Password
		</label>
    </div>
  </div>
  <div class="col-4">
  <a href="ForgetPass.php">Forget Pass?</a>
  </div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="login_user">Login</button>
      </div>
	</form>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="denied" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 400px;">
  <div class="modal-content">
      <div class="modal-header">
	  <div class="imgcontainer">
			<img src="unauthorised.png" alt="Avatar" class="avatar">
				</div>
      </div>
      <div class="modal-body"  style="font-size:20px;">
	  You need to be <strong>Signed In</strong> to be able to access Triple M content!<br>
				Please click <a class="nodec" href="http://localhost/ProjectWD/SignUp.php">HERE</a> to Regiter an account!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="background-color: #f44336, " data-bs-dismiss="modal">Understood</button>
      </div>
    </div>
  </div>
</div>


	
	</section>
	
	

	<section>
		<div id="id02" class="modal">
			<form class="modal-content animate" style= "color:black;">
				
			<div class="imgcontainer">
					<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
					<img src="unauthorised.png" alt="Avatar" class="avatar">
				</div>
				<div class="container" style="font-size:20px;">
				You need to be <strong>Signed In</strong> to be able to access Triple M content!<br>
				Please click <a class="nodec" href="http://localhost/ProjectWD/SignUp.php">HERE</a> to Regiter an account!
					
				</div>
					
				<div class="container" style="background-color:#f1f1f1">
					
				</div >
				
					
				</div>
				
			</form>
		</div>
	</section>

	
  <script> 

var modal1 = document.getElementById('id02');
var modal2 = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {     
	  if (event.target == modal1) {         
		  modal1.style.display = "none";    
		   }     
		   if (event.target == modal2) {        
			    modal2.style.display = "none";     
				} }

function ShowPass() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function show() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "&#8659;  Show More  &#8659;"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "&#8657;  Show Less  &#8657;"; 
    moreText.style.display = "inline";
  }
}
function show2() {
  var dots = document.getElementById("dots2");
  var moreText = document.getElementById("more2");
  var btnText = document.getElementById("myBtn2");

  if (dots2.style.display === "none") {
    dots2.style.display = "inline";
    btnText.innerHTML = "&#8659;  Show More  &#8659;"; 
    moreText.style.display = "none";
  } else {
    dots2.style.display = "none";
    btnText.innerHTML = "&#8657;  Show Less  &#8657;"; 
    moreText.style.display = "inline";
  }
}
</script> 
</body>

</html>
