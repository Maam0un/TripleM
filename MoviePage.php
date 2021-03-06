<?php 

include('DBLink.php');
	
	if($_SESSION['email'] == null){
		header('location: Home page.php');
	}

  $name = $_GET['name'];




$db = mysqli_connect('localhost', 'root', 'stargold989', 'triplem');
	$sql = "SELECT * FROM Movies WHERE Name = '$name'";
	$result = $db->query($sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
     
    $genre= $row['Genre'];
    $youtube = $row['Youtube'];
    $screenshot1 = $row['Screenshot1'];
    $screenshot2 = $row['Screenshot2'];
    $video = $row['VideoFile'];
     $poster = $row['Poster'];
     $username= $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset = "utf-8">
      <title><?php echo$row['Name'] ?></title>

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
			   <link rel="stylesheet" type="text/css" href="styles.css" />
			   <link rel="stylesheet" type="text/css" href="TripleM.css" />

			   <script src="java.js"></script>
			   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
			  
	<link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
   </head>


	<body>
  <?php include('errors.php'); ?>
  <?php if (isset($_GET['added'])){  ?>
			<section><br><div class="error success" >
				<h3>
					<?php 
						echo "$name has been added!"; 
						
					?>
					
				</h3>
			</div></section>
			<?php } ?>
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
          <a class="nav-link" aria-current="page" href="home pagelog.php">Home</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
   </p><br>

   
   <section class="TripleM" style="color:white; background:none;">
   <div class="row row-cols-1 row-cols-md-3 g-3 justify-content-center">

<div class="col-md-3" style="width:20rem; padding:1rem 2rem; ">
				 <a href="MoviePage.php?name=<?php echo$row['Name'] ?>" style="text-decoration: none;"> 
					<div class="overlay" style="width: 280px; ">
					  <img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Move Poster" style="width: 260px; height: 407px;" class="image">
            <div class="middle">				
            <form action="" method="post" target="frame">
            <input type="text" style="display:none" name="name" value="<?php echo $name ?>">
            <input type="text" style="display:none" name="username" value="<?php echo $username?>">
							<button onclick="document.getElementById('id01').style.display='block'" onclick="this.form.submit()" type="submit" name="RemoveWatchLater" class="button_p" style="width:auto;   cursor: pointer;">
              </form>
              <img src="play.png" alt="Poster" height="120" width="120" class="zoomout" title="Play"></button>
    
								 
							
						</div>
					</div>
					</a>
					
				</div>


        
  <div class="col-md-5 " style="padding:0rem 2.5rem; ">
  <form method="post" action="">
  <p><h1 style="font-size:35px"><?php echo$row['Name'] ?> 
  
    <input type="text" style="display:none" name="username" value="<?php echo $username ?>">
    <input type="text" style="display:none" name="name" value="<?php echo $name ?>">
    <input type="text" style="display:none" name="poster" value="<?php echo $poster ?>">
    <input type="text" style="display:none" name="place" value="Movie">
    <button type="submit" type="button" style="background:none; border:none;" name="watchlater" ><img src="logo\watchlater.png" title="Add to Watch Later" width="30"></button>
    <button type="submit" type="button" style="background:none; border:none;" name="favorites" ><img src="logo\favorites.jpg" title="Add to Favorites" width="34"></button></h1>
        </form>
  <strong>Released:&nbsp; <?php echo$row['ReleaseYear'] ?></strong><br>
  <strong>Genre:&nbsp;&nbsp;&nbsp; <?php echo$row['Genre'] ?> </strong><br>
  <strong>Runtime:&nbsp;&nbsp;<?php echo$row['Runtime'] ?></strong> <br><br>
  
		<img class="a" src="Logo\Logopit_1587821924357.png" width="30" height="30" title="Triple M Rating"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.0 &#11088;<br>
  
		<img class="a" src="imdb.png" width="50" height="35" >  &nbsp;&nbsp;&nbsp;&nbsp;<?php echo$row['Rating'] ?> &#11088;<br><br>
		
		
		<p >
    <b>Cast: <a style="text-decoration:none; color:#FFD700;" href="<?php echo $row['Cast1Link'] ?>"><?php echo$row['Cast1'] ?></a>, 
	     <a style="text-decoration:none; color:#FFD700;" href="<?php echo $row['Cast2Link'] ?>"><?php echo$row['Cast2'] ?></a>...<br>	
     Director: <a style="text-decoration:none; color:#FFD700;" href="<?php echo $row['DirectorLink'] ?>"><?php echo$row['Director'] ?></a><br>
    Writers: <a style="text-decoration:none; color:#FFD700;" href="<?php echo $row['Writer1Link'] ?>"><?php echo$row['Writer1'] ?></a>,
	        <a style="text-decoration:none; color:#FFD700;" href="<?php echo $row['Writer2Link'] ?>"><?php echo$row['Writer2'] ?></a> </b>
        </p>
		<form target="frame">
</form>
	
  <p class="disc">
    <b><?php echo$row['Synopsis'] ?></p></b>
  </p>
  </div>
 
  <div class="col-md-3 ms-md-auto">
   
  <div class="row row-cols-1 row-cols-md-2 g-2 justify-content-end">
  <div class="col-md-12 ">
  <strong style="font-size:21px"> &nbsp;&nbsp;&nbsp;&nbsp;Related</strong>
        </div>
        <?php		
				}
		} else {
		  echo "0 results";
		}


	$query = "SELECT * FROM Movies ORDER BY RAND() ASC LIMIT 4 ";
    $rs_result = $db->query($query);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>
			
			
				<div class="col" style="width:9.5rem; padding: 0.6rem 0.8rem; ">
				 <a href="MoviePage.php?name=<?php echo$row['Name'] ?>" style="text-decoration: none;"> 
					<div class="overlay">
					  <img src="Movie Posters/<?php echo$row['Poster'] ?>" alt="Move Poster" class="image">
					
					</div>
					</a>
				
				</div>

				<?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?></div>
</div></div>
  </p>   </section>
  <hr><br><br>
  <section class="TripleM" style="color:white; background:none;">
  
  <div class="row justify-content-center" style="padding:1rem;">
  <div class="col">
     <iframe style="border:none;" width="100%" height="184" src="<?php echo $youtube ?>" allowFullScreen class="hover-shadow cursor">
</iframe></div>
  <div class="col">
  <a href="javascript:void(0)" title="View Screenshot" onclick="openModal();currentSlide(1)"><img src="Movie Posters/<?php echo $screenshot1 ?>" width="100%" height="184"  class="hover-shadow cursor"></a>
  
  </div>
  <div class="col">
  <a href="javascript:void(0)" title="View Screenshot" onclick="openModal();currentSlide(2)"> <img src="Movie Posters/<?php echo $screenshot2 ?>"  width="100%" height="184"  class="hover-shadow cursor"></a>
  </div>
</div>
</section><br><br>
<hr>
<div id="myModal1" class="modal1">
  <span class="close1 cursor1" onclick="closeModal()">&times;</span>
  <div class="modal1-content">

    <div class="mySlides">
      <div class="numbertext">1 / 2</div>
      <img src="Movie Posters/<?php echo $screenshot1 ?>" style="width:100%" >
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 2</div>
      <img src="Movie Posters/<?php echo $screenshot2 ?>" style="width:100%">
    </div>
    
    <a style="text-decoration:none; color:white;" class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a style="text-decoration:none; color:white;" class="next" onclick="plusSlides(1)">&#10095;</a>

  </div>
</div><br> <section>
            <div id="id01" class="modal1">
              
              <form class="modal1-content animate" action="project.html" method="post">
                  
                <video style="margin-left: 8.5%;" width="85%"  controls>
                  <source src="Movie Posters/<?php echo $video ?>" type="video/mp4">
                 
                 
                </video>
            
              
              </form>
            </div>
            </section>

     
       
<section class="TripleM" style="  background:none;" id="comments">
<div class="row g-3" style="padding:2rem">
  <div class="col-md-6">
<div class="modal-dialog" style="float:left; display:block;  overflow-y: initial !important; max-width: 550px;">
    <div class="modal-content" style="border:none; color:white; background-color:#242526;">
      <div>
        <h5 class="modal-title" id="exampleModalLabel" style="font-size:30px; margin-left:2%"><strong>Comments</strong></h5>
      </div>
      <div class="modal-body " style="height: 80vh; overflow-y: auto; color:white; background-color:#242526;">
      <div class="row">

      <div class="col-md-3" style="background-color:#3A3B3C; padding:3%">
          <img class="pull-left avatar1 " src="profile pic/<?php echo $_SESSION["avatar"]?>" alt="Avatar">
  </div>
          <div class="col-md-9" style="background-color:#3A3B3C; padding-top:1rem">
          <form method="post" action="">
          <input type="text" style="display:none" name="page" value="<?php echo $name ?>">
          <input type="text" style="display:none" name="username" value="<?php echo $_SESSION["username"]?>">
          <input type="text" style="display:none" name="avatar" value="<?php echo $_SESSION["avatar"]?>">
          <textarea class="pull-left form-control" style="width: 82% !important;  height: 97px; " name="comment" aria-label="With textarea" placeholder="Add Comment"></textarea>
          <button type="submit" class="btn btn-primary" name="add_comment" style="margin-left:2.3%; margin-top:5%">Post</button>
        </form>
        </div>
      

       


	<?php

	$sql = "SELECT * FROM Comments WHERE Page='$name' ORDER BY ID DESC";
    $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>

<div class="col-md-3" style="background-color:#3A3B3C; padding:3%; margin-top:2%"">
          <img class="pull-left avatar1 " src="profile pic/<?php echo $row['Avatar']?>" alt="Avatar">
  </div>
      <div class="col-md-9" style="background-color:#3A3B3C; padding:4%; margin-top:2%">
      <div class="row">
          
          <div class="col-md-3">
          <a href="user.php?user=<?php echo$row['Username'] ?>" style="color:#a7a7a7; text-decoration: none;" > 
          <p class="hover1"><?php echo $row['Username'] ?> </p>
          </a>
      </div>
      <div class="col-md-9" style="color:#a7a7a7">
      <?php echo $row['DatePosted'] ?> 
      </div>
      <div class="col-md-12">
      <?php echo $row['Comment'] ?> 
      </div>
      <?php if (strpos($_SESSION['email'] ,'@TripleM') !== false || $_SESSION['username'] == $row['Username']) { ?>
      <div class="cold-md-12">
      <?php echo "<a href='delete.php?Comment=".$row['Comment']."&Date=".$row['DatePosted']."&Page=".$row['Page']."&Usercom=".$row['Username']."'style='text-decoration: none; color:#a7a7a7; float:right;'  ><p class='hover1'>🗙</p></a>" ?>
      </div>
      <?php ; } ?>
      
  </div>
  </div>

  <?php		
				}
		} else {
		  echo "0 Comments";
		}

				
        ?>
 
 
      
     
  </div>
      </div>
     
    </div>
  </div>
  </div>
  <div class="col-md-6">
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
$username = $_SESSION['username'];
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
<?php echo "<a  href='delete.php?Type=Favorites&Place=Movie&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;' class='hover'>🗙</a>" ?>
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
<?php echo "<a  href='delete.php?Type=Favorites&Place=Movie&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
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




  <iframe name="frame" style="display:none;"></iframe>


</section>

<section > 
		<ul class="ul">
			<p>
			<img src = "Logo\Logopit_1587821924357.png" width = "200" height ="200"
				alt = "Triple M Logo">

				<a href="https://www.facebook.com/triple.triple.9809672" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>

<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
<p>					Copyright &copy Triple M Licensed by <a class="nodec" href="https://www.mplc.org" >Motion Picture Licensing Corporation</a> </p>
			</p> 
		</ul>
</section>
<script>
  // Get the modal
  var slides = document.getElementById('myModal1');


  window.onclick = function(event) {
    if (event.target == slides) {
      slides.style.display = "none";
    }
  }
   var search = document.getElementById('id01');
 
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == search ) {
      search.style.display = "none";
    }
  }
  </script>
</body>
	</html>