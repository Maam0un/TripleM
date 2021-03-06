<?php 
  include('DBLink.php');

	if($_SESSION['email'] == null){
		header('location: Home page.php');
	}
  ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Clients</title>
  
         <link rel="stylesheet" href="styles.css">
	       <link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
			   <link rel="stylesheet" type="text/css" href="TripleM.css" />

			   <script src="java.js"></script>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        
</head>

<body>

<marquee style=" padding-top:1%;font-size:35px;"width="100%" direction="right" height="1%" scrollamount="10">
			<img class="a" height="5%" width="5%" src="Help Center/W.png">elcome to the official <span style="color:#FFD700">Triple M</span> website </marquee>
			<section style="
                            line-height: 1.6;
                            color: #fff;
                            font-size: 1.6rem;
							font-family: 'Lato', sans-serif;">
							
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
          <a class="nav-link " aria-current="page" href="home pagelog.php">Home</a>
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
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
        
			<li><a class="dropdown-item" href="http://localhost/ProjectWD/clients.php">Clients</a></li>
           
			
            
          </ul>
        </li><?php ; } ?>
       
		<li class="nav-item dropdown">
		<a class="nav-link" href="http://localhost/ProjectWD/Profile.php"><?php echo $_SESSION["username"] ?> <img src="profile pic/<?php echo $_SESSION["avatar"]?>" class="avatar5" ></a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
		  <form action="" method="post">
		   
            <li><button type="submit" class="dropdown-item"  name="logout_user">Log Out</button></li>
		  </form>
          </ul>
        
        
      </ul>
     
    </div>
  </div>
</nav>
		</section>		
   </p>
<hr>
   <section class="TripleM" style="background:none; padding:1rem;">
   <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
   
  <?php

$sql = "SELECT * FROM users"; //You don't need a ; like you do in SQL
$result = $db->query($sql);
$i=0;
if (mysqli_num_rows($result) > 0) {
	while($row = $result->fetch_assoc()) {
    $user=$row['Username'];
    $i++;?>
          
  <div class="col">
                
  <div class="card" style="width: 20rem;">
  <img src="profile pic/<?php echo $row['Avatar'] ?>" class="card-img-top "  alt="...">
  <div class="card-body collapse multi-collapse show" id="user<?php echo $i ?>">
  <div style=" background-color: #3A3B3C;">
  <a href="user.php?user=<?php echo$row['Username'] ?>" style="color:White; text-decoration: none; "> 
  <h5 class="card-title text-center hover" style=" padding:1rem;"><?php echo $row['Username'] ?></h5></a>
    </div>
    <hr>
    <p class="card-text">
    <div class="row">
    <div class="col-md-8">
    <h6>Name</h6> 
    <p><?php echo $row['First_Name']." ". $row["Last_Name"] ?></p>
    </div>

    <div class="col-md-4">
    <h6>  Age </h6>
    <p><?php echo $row['Age'] ?></p>
    </div>

    <div class="col-md-8">
    <h6> Email </h6>
    <p><?php echo $row['Email'] ?></p>
    </div>

    <div class="col-md-4">
    <h6> Plan </h6>
    <p><?php echo $row['Plan'] ?></p>
    </div>

    <div class="col-md-4">
    <h6> Gender </h6>
    <p><?php echo $row['Gender'] ?></p>
    </div>
    
    </div>
    </p>

    <a class="btn btn-primary text-center" style="margin-left:38%; margin-right:38%" data-toggle="collapse" href="#user<?php echo $i ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">More</a>

  </div>

  <div class="card-body collapse multi-collapse " id="user<?php echo $i ?>">
    <h5 class="card-title text-center">More Info</h5>
    <hr>
    <p class="card-text">
    <div class="row">
 

    <div class="col-md-7">
    <h6>  Address </h6>
    <p><?php echo $row['Address'] ?></p>
    </div>

    <div class="col-md-5">
    <h6> Phone # </h6>
    <p><?php echo $row['Phone'] ?></p>
    </div>

    <div class="col-md-7">
    <h6> City </h6>
    <p><?php echo $row['City'] ?></p>
    </div>

    <div class="col-md-5">
    <h6> Country </h6>
    <p><?php echo $row['Country'] ?></p>
    </div>

    <div class="col-md-7">
    <h6>Member Since</h6> 
    <p><?php echo $row['Date'] ?></p>
    </div>

    <div class="col-md-5">
    <h6>Cards Used</h6> 
    <p><?php  
    
     $sql = "SELECT count(*) FROM Cards WHERE Username = '$user'";
     $results = mysqli_query($db, $sql);
     $row = $results->fetch_array();
     $total = $row[0];
     echo $total;
    ?>

    </p>
    </div>
    
    </div>
    
    
    
    
    </p>
    <a class="btn btn-primary" data-toggle="collapse" style="margin-left:38%; margin-right:38%" href="#user<?php echo $i ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Back</a>
  </div>
</div>


                </div>
                <?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>
        

</div>

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
<a href="#" class="fa fa-google"></a><br>
Copyright &copy Triple M Licensed by <a class="nodec" href="https://www.mplc.org" >Motion Picture Licensing Corporation</a>
			</p> 
		</ul>	
	</section>	
	

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

</body>
</html>
