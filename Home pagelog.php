<?php 
	
	include('DBLink.php');
	
	if($_SESSION['email'] == null){
		header('location: Home page.php');
	}

	$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset = "utf-8" >
      <title>Home</title>

			   
			   
			   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
			   <link rel="stylesheet" type="text/css" href="styles.css" />
			   <link rel="stylesheet" type="text/css" href="TripleM.css" />

			   <script src="java.js"></script>
			   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>	
			   
			   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

	<link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
   </head>
   <?php include('errors.php'); ?>
   <?php if (isset($_GET['name'])){  ?>
			<section><br><div class="error success" >
				<h3>
					<?php 
						echo "You are now logged in!"; 
						
					?>
					
			<p>Welcome <?php if (strpos($_SESSION['email'] ,'@TripleM') !== false) {
		echo 'Admin';}?> <b><?php echo $_SESSION['fname']; ?>!</b></p>
		
				</h3>
			</div></section>
			<?php } ?>

			<?php if (isset($_GET['added'])){  
				$name=$_GET['added'] ?>
			<section><br><div class="error success" >
				<h3>
					<?php 
						echo "$name has been added!"; 
						
					?>
					
				</h3>
			</div></section>
			<?php } ?>
		
	<body>
	<marquee style=" padding-top:1%;font-size:35px;"width="100%" direction="right" height="1%" scrollamount="10">
			<img class="a" height="5%" width="5%" src="Help Center/W.png">elcome to the official <span style="color:#FFD700">Triple M</span> website </marquee>


	
		<p>
			<section class="TripleM sticky-top ">
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
			<li><a class="dropdown-item" href="http://localhost/ProjectWD/browse.php">Movies</a></li>
			<li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="browse TVshows.html">TV Shows</a></li>
          </ul>
        </li>
        <?php if (strpos($_SESSION['email'] ,'@TripleM') !== false) {?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"data-bs-toggle="modal" data-bs-target="#exampleModal">Add Movies/Shows</a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="#"data-bs-toggle="modal" data-bs-target="#admin">Add Admins</a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="http://localhost/ProjectWD/clients.php">Clients</a></li>
           
			
            
          </ul>
        </li><?php ; } ?>
        <li class="nav-item">
          <a class="nav-link" href="Help Center Logged.html">Help Center</a>
        </li>
		<li class="nav-item dropdown">
		<a class="nav-link" href="http://localhost/ProjectWD/Profile.php"><?php echo $_SESSION["username"] ?> <img src="profile pic/<?php echo $_SESSION["avatar"]?>" class="avatar5" ></a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
		  <form action="" method="post">
		    <li><button  type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#watchlist" >Watch Later</button></li>
            <li><hr class="dropdown-divider"></li>
			<li><button  type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#favorites" >Favorites</button></li>
			<li><hr class="dropdown-divider"></li>
            <li><button type="submit" class="dropdown-item"  name="logout_user">Log Out</button></li>
		  </form>
          </ul>
        
        
      </ul>
     
    </div>
  </div>
</nav>
		</section>
<div class="alert" style="background-color:#00b7ff; ">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <strong>Info!  </strong> <br> 
  Corona Virus is a Very Dangerous Desease that Risks Everyones lives.For more information about it vist <a class="nodec" href="https://www.who.int/health-topics/coronavirus#tab=tab_1">World Health Organization</a> Stay Home. Stay Safe.
</div>				
   </p>
   
   <section>
	
	<header class= "p" style= "color:white; font-size: 20pt; background-color: #3A3B3C; padding: 2%;"><strong>
Browse and Watch Movies and TV Shows in excellent Blu-Ray quality.</br>Enjoy the wide variaty of content provided by Triple M!
	</strong></header>
</section>	

	<hr>
	<h1 class= "header"> &#10052; Top Movies
		</h1>
	<section class="TripleM" style="background:none; padding:0.8rem;"> 
		
	
		<p>
		<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
		
		<?php

	$db = mysqli_connect('localhost', 'root', 'stargold989', 'triplem');

	$sql = "SELECT * FROM Movies WHERE Rating>= '8.0' ORDER BY Rating DESC LIMIT 4 ";
    $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>
			
			
				<div class="col" style="width:19rem; padding:0rem 2.5rem; ">
				 <a href="MoviePage.php?name=<?php echo$row['Name'] ?>" style="text-decoration: none;"> 
					<div class="overlay">
					  <img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Move Poster" class="image">
						<div class="middle">
							<div class="text">						
							<p><?php echo $row['Genre'] ?>
								 </p>
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br> <?php echo $row['Rating']  ?>	&#9733;
								</p>
							</div>
							<?php if (strpos($_SESSION['email'] ,'@TripleM') !== false) { ?>
              <p>
              <?php echo "<a class='button_M' href='delete.php?name=".$row['Name']."'style='text-decoration: none; color:white;'>Delete</a>" ?>
                </p>
              <?php ; } ?>
			  <p>
			  <form method="post" action="">
    <input type="text" style="display:none" name="username" value="<?php echo $_SESSION["username"]?>">
    <input type="text" style="display:none" name="name" value="<?php echo $row['Name'] ?>">
    <input type="text" style="display:none" name="poster" value="<?php echo$row['Poster'] ?>">
	<input type="text" style="display:none" name="place" value="Home">
    <button type="submit" type="button" style="background:none; border:none;" name="watchlater"><img src="logo\watchlater.png" title="Add to Watch Later" width="30"></button>
	<button type="submit" type="button" style="background:none; border:none;" name="favorites" ><img src="logo\favorites.jpg" title="Add to Favorites" width="34"></button>
	</form>
			  </p>
						</div>
					</div>
					</a>
					<figcaption class= "h11"> <strong> <?php echo $row['Name'] ?> </strong>	
					</figcaption>
				</div>

				<?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?></div>
			<span id="dots"></span>
			 <span id="more">
			 <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
			 <?php		
			 $sql = "SELECT * FROM Movies WHERE Rating>= '8.0' ORDER BY Rating DESC LIMIT 4,4";
    $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>
		
		
		<div class="col" style="width:19rem; padding:0rem 2.5rem; padding-top:3rem;">
				 <a href="MoviePage.php?name=<?php echo$row['Name'] ?>" style="text-decoration: none;"> 
					<div class="overlay">
					  <img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Move Poster" class="image">
						<div class="middle">
							<div class="text">						
							<p><?php echo $row['Genre'] ?>
								 </p>
								<p><img src="https://img.icons8.com/color/48/000000/imdb.png"/><br> <?php echo $row['Rating']  ?>	&#9733;
								</p>
							</div>
							<?php if (strpos($_SESSION['email'] ,'@TripleM') !== false) { ?>
              <p>
              <?php echo "<a class='button_M' href='delete.php?name=".$row['Name']."' style='text-decoration: none; color:white;'>Delete</a>" ?>
                </p>
              <?php ; } ?>
			  <p>
			  <form method="post" action="">
    <input type="text" style="display:none" name="username" value="<?php echo $_SESSION["username"]?>">
    <input type="text" style="display:none" name="name" value="<?php echo $row['Name'] ?>">
    <input type="text" style="display:none" name="poster" value="<?php echo$row['Poster'] ?>">
	<input type="text" style="display:none" name="place" value="Home">
	<button type="submit" type="button" style="background:none; border:none;" name="watchlater" ><img src="logo\watchlater.png" title="Add to Watch Later" width="30"></button>
    <button type="submit" type="button" style="background:none; border:none;" name="favorites" ><img src="logo\favorites.jpg" title="Add to Favorites" width="34"></button>
	</form>
			  </p>
						</div>
					</div>
					</a>
					<figcaption class= "h11"> <strong> <?php echo $row['Name'] ?> </strong>	
					</figcaption>
				</div>

				<?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>
			   </div></span>
			 
			  </section>
<button class="button_gr" style="  font-size: 18px; width:20%; margin-left:40%;"onclick="show()" id="myBtn">&#8659;  Show More  &#8659;</button>

	
		</p>
	
	<hr>

	<section> 
		<h1 class= "header"> &#10052; Top TV Shows 
		</h1>

		<p>
			<div class="row_h">
				<div class="column_h">
				<a href="13RW.html">
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
					<a href="Lucifer.html">
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
				<a href="PB.html">
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
				<a href="WW1.html">
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
	
		<h1 class= "header" id="comingsoon"> &#10052; Coming Soon 
		</h1>

		<section class="TripleM" style="background:none; padding:0.8rem;"> 
		

		<p>
		<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center" >
		<?php

$sql = "SELECT * FROM ComingSoon ORDER BY ID ASC LIMIT 4 ";
$rs_result = $db->query($sql);

if (mysqli_num_rows($rs_result) > 0) {
	while($row = $rs_result->fetch_assoc()) {?>

<div class="col" style="width:19rem; padding:0rem 2.5rem;">
					<div class="overlay">
					<img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Snow" class="image">
						 <div class="middle">	
							<div class="text">	
								<p>Coming Soon
								</p>
							</div>
							<?php if (strpos($_SESSION['email'] ,'@TripleM') !== false) { ?>
              <p>
              <?php echo "<a class='button_M' href='delete.php?name2=".$row['Name']."'style='text-decoration: none; color:white;'>Delete</a>" ?>
                </p>
              <?php ; } ?>
						</div>
					</div>  
					<figcaption class= "h11"> <strong><?php echo$row['Name'] ?></strong>	
					</figcaption>
				</div>

			<?php		
			}
	} else {
	  echo "0 results";
	}

			
	?></div>
			<span id="dots2"></span>
			 <span id="more2">
		<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center ">
			 <?php		
			 $sql = "SELECT * FROM ComingSoon ORDER BY ID ASC LIMIT 4,4";
    $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>
		
			
		<div class="col" style="width:19rem; padding:0rem 2.5rem; padding-top:3rem;">
					<div class="overlay">
					<img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Snow" class="image">
						 <div class="middle">	
							<div class="text">	
								<p>Coming Soon
								</p>
							</div>
							<?php if (strpos($_SESSION['email'] ,'@TripleM') !== false) { ?>
              <p>
              <?php echo "<a class='button_M' href='delete.php?name2=".$row['Name']."'style='text-decoration: none; color:white;'>Delete</a>" ?>
                </p>
              <?php ; } ?>
						</div>
					</div>  
					<figcaption class= "h11"> <strong><?php echo$row['Name'] ?></strong>	
					</figcaption>
				</div>


				<?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>
			  </div></span></section>
			
<button class="button_gr" style="  font-size: 18px; width:20%; margin-left:40%;"onclick="show2()" id="myBtn2">&#8659;  Show More  &#8659;</button>


		</p>
	
	
	

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

  <div class="modal fade" id="watchlist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style=" display:block;  overflow-y: initial !important; max-width: 350px;">
<div class="modal-content" style="border:none; color:white; background-color:#242526;">
<div>
<h6 class="modal-title" id="exampleModalLabel" style="font-size:30px; margin-left:2%"><strong>Watch Later</strong> <img src="logo\watchlater.png" title="Add to Watch Later" width="30"></h6>
</div>
<div class="modal-body " style="height: 60vh; overflow-y: auto; color:white; background-color:#242526;">
	  <div class="row">


<?php
$sql = "SELECT * FROM WatchLater WHERE Username='$username' ORDER BY ID DESC";
$rs_result = $db->query($sql);

if (mysqli_num_rows($rs_result) > 0) {
while($row = $rs_result->fetch_assoc()) {?>

<div class="col-md-3" style="background-color:#3A3B3C; padding:3%; margin-top:2%"">
<a href="MoviePage.php?name=<?php echo$row['MovieName'] ?>" style="text-decoration: none;"> 
<img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Snow" class="image hover">
</a>
</div>
<div class="col-md-9" style="background-color:#3A3B3C; padding:4%; margin-top:2%">
<div class="row">

<div class="col-md-10">
<a href="MoviePage.php?name=<?php echo$row['MovieName'] ?>"  style="color:White; text-decoration: none;"> 
<h6 class="hover"><?php echo $row['MovieName'] ?> </h6>
</a>
</div>
<div class="col-md-2">
<?php echo "<a  href='delete.php?Type=Watchlater&Place=Home&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
</div>
<div class="col-md-12" style="font-size:15px; color:#a7a7a7">
Added on
</div>
<div class="col-md-12" style="font-size:15px; color:#a7a7a7">
<?php echo $row['AddedDate'] ?> 
</div>



</div>
</div>

<?php		
}
} else {
echo "0 Movies";
}


?>




</div>
      </div>
    
    </div>
  </div>
</div>


<div class="modal fade" id="favorites" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style=" display:block;  overflow-y: initial !important; max-width: 350px;">
<div class="modal-content" style="border:none; color:white; background-color:#242526;">
<div>
<h6 class="modal-title" id="exampleModalLabel" style="font-size:30px; margin-left:2%"><strong>Favorites</strong><img src="logo\favorites.jpg" title="Add to Favorites" width="34"></h6>
</div>
<div class="modal-body " style="height: 60vh; overflow-y: auto; color:white; background-color:#242526;">
	  <div class="row">


<?php
$sql = "SELECT * FROM Favorites WHERE Username='$username' ORDER BY ID DESC";
$rs_result = $db->query($sql);

if (mysqli_num_rows($rs_result) > 0) {
while($row = $rs_result->fetch_assoc()) {?>

<div class="col-md-3" style="background-color:#3A3B3C; padding:3%; margin-top:2%"">
<a href="MoviePage.php?name=<?php echo$row['MovieName'] ?>" style="text-decoration: none;"> 
<img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Snow" class="image hover">
</a>
</div>
<div class="col-md-9" style="background-color:#3A3B3C; padding:4%; margin-top:2%">
<div class="row">

<div class="col-md-10">
<a href="MoviePage.php?name=<?php echo$row['MovieName'] ?>"  style="color:White; text-decoration: none;"> 
<h6 class="hover"><?php echo $row['MovieName'] ?> </h6>
</a>
</div>
<div class="col-md-2">
<?php echo "<a  href='delete.php?Type=Favorites&Place=Home&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
</div>
<div class="col-md-12" style="font-size:15px; color:#a7a7a7">
Added on
</div>
<div class="col-md-12" style="font-size:15px; color:#a7a7a7">
<?php echo $row['AddedDate'] ?> 
</div>



</div>
</div>

<?php		
}
} else {
echo "0 Movies";
}


?>




</div>
      </div>
    
    </div>
  </div>
</div>



<div class="modal fade" id="admin" tabindex="-1" aria-labelledby="admin" aria-hidden="true" >
  <div class="modal-dialog " style="display:block; overflow-y: hidden !important; max-width: 550px; ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admins</h5>
		</div>
		<form  method="post" action="home pagelog.php">
		<div class="modal-body" style="height: 50vh; overflow-y: auto; ">
<div class="row g-3">
<div class="col-md-6">
<label class="form-label">First Name</label>
      <input type="text" class="form-control" name="fname" id="floatingInputGrid" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>" required autofocus>
  </div>
  <div class="col-md-6">
  <label class="form-label">Last Name</label>
      <input type="text" class="form-control" name="lname" id="floatingInputGrid" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>">
  </div>
  <div class="col-md-6">
  <label class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="floatingInputGrid" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
  </div>
  <div class="col-md-6">
  <label class="form-label">Email</label>
	  <div class="input-group mb-3">
  <input type="text" class="form-control" name="email" id="floatingInputGrid" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"  aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">@TripleM.com</span>
</div>
  </div>
  <div class="col-md-6">
  <label class="form-label">Password</label>
      <input type="password" class="form-control" name="password" id="floatingInputGrid" >
  </div>
  <div class="col-md-6">
  <label class="form-label">Confirm Password</label>
      <input type="password" class="form-control" name="password_2" id="floatingInputGrid" >
  </div>
  <div class="col-md-6">
  <label class="form-label">Date of Birth</label>
      <input type="date" class="form-control" name="dob" id="floatingInputGrid" value="<?php echo isset($_POST["dob"]) ? $_POST["dob"] : ''; ?>" >
  </div>
  <div class="col-md-6">
  <label class="form-label">Gender</label>
      <select class="form-select" name="gender" id="formFile" value="<?php echo isset($_POST["gender"]) ? $_POST["gender"] : ''; ?>" aria-label="Floating label select example">
        <option selected style="display:none;">Choose</option>
        <option>Male</option>
        <option>Female</option>
      </select>
      
  
  </div>

  <div class="col-md-12">
  <label class="form-label">Choose Avatar</label>
  <input class="form-control" type="file" name="avatar" value="<?php echo isset($_POST["avatar"]) ? $_POST["avatar"] : ''; ?>">
  </div>

  <div class="col-md-12">
  <label class="form-label">Address</label>
      <input type="text" class="form-control" name="address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>" >
  </div>

  <div class="col-md-6">
  <label class="form-label">City</label>
      <input type="text" class="form-control" name="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>" >
  </div>

  <div class="col-md-6">
  <label class="form-label">Country</label>
      <input type="text" class="form-control" name="country" value="<?php echo isset($_POST["country"]) ? $_POST["country"] : ''; ?>">
  </div>

  <div class="col-md-6">
  <label class="form-label">Phone No.</label>
      <input type="text" class="form-control" name="phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" >
  </div>
  <div class="col-md-6">
  <label class="form-label">Zip Code</label>
      <input type="text" class="form-control" maxlength="4" name="zip" value="<?php echo isset($_POST["zip"]) ? $_POST["zip"] : ''; ?>" >
  </div>
</div>
</div>
 



      <div class="modal-footer">
        
	  <button type="submit" class="btn btn-primary" name="add_admin">Add</button>
      </div></form>
  </div>
</div>
</div>









  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog " style="display:block; overflow-y: hidden !important; max-width: 550px; ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Content</h5>
		<form  method="post" action="home pagelog.php">
        
    <label class="form-label">Choose</label>
    <select class="form-select form-control" name="type">
      <option selected style="display:none;"></option>
	  <option value="Movie">Movie</option>
	  <option>TV Show</option>
	  <option value="ComingSoon">Coming Soon</option>
    </select>
 
      </div>
	
	  <div class="Movie box">

      <div class="modal-body" style="height: 50vh; overflow-y: auto; ">
	  <div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="col-md-6">
    <label class="form-label">Genre</label>
    <input type="text" class="form-control" name="genre">
  </div>
  <div class="col-md-3">
    <label class="form-label">Released Year</label>
    <input type="text" class="form-control" name="release">
  </div>
  <div class="col-md-3">
    <label class="form-label">Runtime</label>
    <input type="text" class="form-control" name="runtime">
  </div>
  <div class="col-md-3">
    <label class="form-label">Rating</label>
    <input type="text" class="form-control" name="rating">
  </div>
  <div class="col-md-3">
    <label class="form-label">Poster Link</label>
    <input type="text" class="form-control" name="poster">
  </div>
  <div class="col-md-12">
    <label class="form-label">Synopsis</label>
    <textarea class="form-control" name="synopsis"></textarea>
  </div>
  <div class="col-md-6">
    <label class="form-label">VideoFile</label>
    <input type="text" class="form-control" name="video">
  </div>
  <div class="col-md-6">
    <label class="form-label">Youtube Link</label>
    <input type="text" class="form-control" name="utube">
  </div>
  <div class="col-md-6">
    <label class="form-label">Screenshot #1</label>
    <input type="text" class="form-control" name="screenshot1">
  </div>
  <div class="col-md-6">
    <label class="form-label">Screenshot #2</label>
    <input type="text" class="form-control" name="screenshot2">
  </div>
  <div class="col-md-6">
    <label class="form-label">Cast Member #1</label>
    <input type="text" class="form-control" name="cast1">
  </div>
  <div class="col-md-6">
    <label class="form-label">IMDB Link</label>
    <input type="text" class="form-control" name="castlink1">
  </div>
  <div class="col-md-6">
    <label class="form-label">Cast Member #2</label>
    <input type="text" class="form-control" name="cast2">
  </div>
  <div class="col-md-6">
    <label class="form-label">IMDB Link</label>
    <input type="text" class="form-control" name="castlink2">
  </div>
  <div class="col-md-6">
    <label class="form-label">Director</label>
    <input type="text" class="form-control" name="direc">
  </div>
  <div class="col-md-6">
    <label class="form-label">IMDB Link</label>
    <input type="text" class="form-control" name="direclink">
  </div>
  <div class="col-md-6">
    <label class="form-label">Writer #1</label>
    <input type="text" class="form-control" name="writer1">
  </div>
  <div class="col-md-6">
    <label class="form-label">IMDB Link</label>
    <input type="text" class="form-control" name="writer1link">
  </div>
  <div class="col-md-6">
    <label class="form-label">Writer #2</label>
    <input type="text" class="form-control" name="writer2">
  </div>
  <div class="col-md-6">
    <label class="form-label">IMDB Link</label>
    <input type="text" class="form-control" name="writer2link">
	
  </div>
  
  
  
  <div class="col-12">
    
  </div>

      </div>
	   </div>
	   </div>




	   <div class="ComingSoon box">

<div class="modal-body" style=" overflow-y: auto; ">
<div class="row g-3">
<div class="col-md-6">
<label class="form-label">Name</label>
<input type="text" class="form-control" name="name1">
</div>

<div class="col-md-6">
<label class="form-label">Poster Link</label>
<input type="text" class="form-control" name="poster1">

</div>



</div>
</div>
 </div>








      <div class="modal-footer">
        
	  <button type="submit" class="btn btn-primary" name="add_content">Add</button>
      </div></form>
  </div>
</div>
</div>
	</section>


	
	<script>  
$(document).ready(function(){
    $('#colorselector').on('change', function() {
      if ( this.value == 'red')
      {
        $("#divid").show();
      }
      else
      {
        $("#divid").hide();
      }
    });
});
</script>
</body>

</html>
