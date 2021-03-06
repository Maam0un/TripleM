<?php 
  include('DBLink.php');
  $user = $_GET["user"];
  $username = $_SESSION['username'];
  if($user == $username){
    header('location: profile.php');
  }

  if($_SESSION['email'] == null){
		header('location: Home page.php');
	}
  
  $query = "SELECT * FROM users WHERE username='$user'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				while($row = $results->fetch_assoc()) {
					
					
					$age= $row['Age'];
					$avatar= $row['Avatar'];
          $joined= $row['Date'];
					$country= $row['Country'];
					
                }
            }

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset = "utf-8">
      <title><?php echo $user ?> | User</title>

	       <link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
      
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
			   <link rel="stylesheet" type="text/css" href="styles.css" />
               <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
               <link rel="stylesheet" type="text/css" href="TripleM.css" />

			   <script src="java.js"></script>
               <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
			  
	<link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
   </head>
   
	<body style="background-color: #242526; ">
    <marquee style=" padding-top:1%;font-size:35px; color:white;"width="100%" direction="right" height="1%" scrollamount="10">
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
        <?php if (strpos($_SESSION['email'] ,'@TripleM') !== false) {
    ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"data-bs-toggle="modal" data-bs-target="#exampleModal">Add Movies/Shows</a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="http://localhost/ProjectWD/clients.php">Clients</a></li>
            
            
          </ul>
        </li><?php ; } ?>
        <li class="nav-item">
          <a class="nav-link" href="Help Center Logged.html">Help Center</a>
        </li>
		<li class="nav-item dropdown">
		<a class="nav-link active" href="http://localhost/ProjectWD/Profile.php"><?php echo $_SESSION["username"] ?> <img src="profile pic/<?php echo $_SESSION["avatar"] ?>" class="avatar5" ></a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
          <form action="" method="post">
          <li><button  type="button" class="dropdown-item" data-toggle="modal" data-target="#watchlist" >Watch Later</button></li>
            <li><hr class="dropdown-divider"></li>
			<li><button  type="button" class="dropdown-item" data-toggle="modal" data-target="#favorites" >Favorites</button></li>
			<li><hr class="dropdown-divider"></li>
            <li><button type="submit" class="dropdown-item"  name="logout_user">Log Out</button></li>
			
            
		  </form>
          </ul>
        
        
      </ul>
     
    </div>
  </div>
</nav>

		</section>
        <br>
<section>


<div class="container" style="display:block; height:145vh; background-color: ; ">
<?php include('errors.php') ; ?>
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active">User Profile</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Username</h6>
                            <p>
                            <?php echo $user ?>
                            </p>
                            <h6>Country</h6>
                            <p>
                            <?php echo $country ?>
                            </p>
                            <h6>Age</h6>
                            <p>
                            <?php echo $age?>
                            </p>
                            <h6>Member Since</h6>
                            <p>
                            <?php echo $joined?> 
                            </p>
                        </div>
                        <div class="col-md-6">
                        <div class="modal-dialog" style="overflow-x: hidden; display:block;  overflow-y: initial !important; max-width: 350px;">
<div class="modal-content" style="border:none; color:white; background-color:#242526;">
<div>
<h6 class="modal-title" id="exampleModalLabel" style="font-size:30px; margin-left:2%"><strong>Favorites</strong><img src="logo\favorites.jpg" title="Add to Favorites" width="34"></h6>
</div>
<div class="modal-body " style="height: 60vh; overflow-y: auto; color:white; background-color:#242526;">
  <div class="row">


<?php

$sql = "SELECT * FROM Favorites WHERE Username='$user' ORDER BY ID DESC";
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
                        <div class="col-md-12">
                            <h5> Recent Activity <img class="pull-right" src="logo\recent.png" alt="Poster" height="25" width="25"></h5> 
                            <table class="table table-sm table-hover table-striped">
                                <tbody>    
                                <?php 
            
             $query = "SELECT * FROM comments WHERE username='$user' ORDER BY ID DESC LIMIT 5";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) > 0) {
                while($row = $results->fetch_assoc()) {?>                                
                                    <tr>
                                        <td>
                                            <strong><?php echo $row['Username'] ?></strong> left a comment on <strong>`<?php echo $row['Page'] ?>`</strong>
                                        </td>
                                    </tr>
                                    <?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
              
          
                <div class="tab-pane" id="edit">
             


                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
 
     
            <img src="profile pic/<?php echo $avatar?>" style="cursor:default;" class="mx-auto img-fluid img-circle d-block avatar4" title="Avatar"alt="avatar4">
        
            <figcaption > <h6 class="mt-2">Profile Avatar</h6> 	
					</figcaption>
           
           
             
           
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
<?php echo "<a  href='delete.php?Type=Favorites&Place=User&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
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
<?php echo "<a  href='delete.php?Type=Watchlater&Place=User&MovieName=".$row['MovieName']."&User=".$user."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
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



</section>


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

</body>
	</html>