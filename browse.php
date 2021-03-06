<?php 
	
	include('DBLink.php');
	
	if($_SESSION['email'] == null){
		header('location: Home page.php');
	}

  
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset = "utf-8">
      <title>Browse</title>

  
			   
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
			   <link rel="stylesheet" type="text/css" href="styles.css" />
			   <link rel="stylesheet" type="text/css" href="TripleM.css" />

			   <script src="java.js"></script>
			   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 

	<link rel="icon" href="Logo\Logopit_1587821924357.png" type="image/gif" sizes="16x16">
   </head>

   
	<body>
  <?php include('errors.php'); ?>
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
          <a class="nav-link " aria-current="page" href="home pagelog.php">Home</a>
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
            <li><a class="dropdown-item" href="#"data-bs-toggle="modal" data-bs-target="#exampleModal">Add Movies/Shows</a></li>
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
   </p>

        <h1 class="header"> Browse Movies</h1>
      <section class="TripleM" style="background-image: linear-gradient(#FFD700, #333); padding-top:1rem; border-radius:20px;" >

       

        <div class="row row-cols-1 row-cols-md-3 g-3 text-center">
        <div class="col-md-4">
          <h3>Genres:</h3>
          <form method="post" action="browse.php">
<div  class="custom-select">
  <select name="cat" id="cat" onchange="this.form.submit()">
  <option style="display:none"><?php echo isset($_POST["cat"]) ? $_POST["cat"] : 'All'; ?></option>
  <option value="All">All</option>
  <option value="Action" >Action</option>
	<option value="Adventure">Adventure</option>
	<option value="Comedy">Comedy</option>	
    <option value="Thriller">Thriller</option>
  <option value="Sci-Fi">Sci-Fi</option>
  <option  value="Crime">Crime</option>
</select>
        </div>
        </div>
</form>
        <div class="col-md-4">
          <h3>Year:</h3>
          <form method="post" action="browse.php" >
<div class="select">
  <select name="year" id="year" onchange="this.form.submit()">
  <option style="display:none"><?php echo isset($_POST["year"]) ? $_POST["year"] : 'All'; ?></option>
  <option value="All">All</option>
  <option value="2021">2021</option>
  <option value="2020">2020</option>
  <option value="2019">2019</option>
  <option value="2018">2018</option>
  <option value="2017">2017</option>
  <option value="2016">2016</option>
  <option value="2015">2015</option>
  <option value="Older">Older</option>

</select>
        </div>
      </div>
      </form>
      <div class="col-md-4">
          <h3>Order By:</h3>
          <form method="post" action="browse.php" >
<div class="select">
  <select name="order" id="order" onchange="this.form.submit()">
  <option style="display:none"><?php echo isset($_POST["order"]) ? $_POST["order"] : 'Latest'; ?></option>
    <option value="Latest">Latest</option>
    <option value="Oldest">Oldest</option>
	<option value="Alphabet">Alphabetical</option>
  <option value="Highest Rating">Highest Rating</option>
  <option value="Lowest Rating">Lowest Rating</option>
	

</select>

        </div>
      </div>
      </form>
      <div class="col-md-12" style="padding:1rem 3rem;" id="movies">
    <form method="post" action="">
    <input type="text " class="form-control" style="border-radius:20px; " name="search" id="name"  autocomplete="off" placeholder="Search..."> 
    <br><button type="submit" type="button" class="btn " style="background:gold; color:black">Search</button>
        </form>
        </div>
      
  </section>

	  
	  
	
	
	
  <section id="content" class="TripleM" style="background:none; padding:1.7rem; ">

	<br>
  <div class="row row-cols-1 row-cols-md-5 g-5 justify-content-center" >
	<?php
	$results_per_page = 20;
	$db = mysqli_connect('localhost', 'root', 'stargold989', 'triplem');
  
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
  $start_from = ($page-1) * $results_per_page;

  if(isset($_POST['cat'])) {
    $genre=$_POST['cat'];
    if($genre == 'All'){ $sql = "SELECT * FROM Movies ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;}
    else{
    $sql = "SELECT * FROM Movies WHERE genre LIKE '%$genre%' ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;}
  } elseif(isset($_POST['search'])) {
      $search = $_POST['search'];
      $sql = "SELECT * FROM Movies WHERE name='$search'";
    }elseif(isset($_POST['order'])) {
        $order=$_POST['order'];
        if($order == 'Latest'){ $sql = "SELECT * FROM Movies ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;}
        elseif($order == 'Oldest'){
        $sql = "SELECT * FROM Movies ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;}
        elseif($order == 'Alphabet'){
          $sql = "SELECT * FROM Movies ORDER BY Name ASC LIMIT $start_from, ".$results_per_page;}
          elseif($order == 'Highest Rating'){
            $sql = "SELECT * FROM Movies ORDER BY Rating DESC LIMIT $start_from, ".$results_per_page;}
            elseif($order == 'Lowest Rating'){
              $sql = "SELECT * FROM Movies ORDER BY Rating ASC LIMIT $start_from, ".$results_per_page;}
      }elseif(isset($_POST['year'])) {
        $year=$_POST['year'];
        if($year == 'All'){$sql = "SELECT * FROM Movies ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;}
        elseif($year == 'Older'){ $sql = "SELECT * FROM Movies WHERE ReleaseYear < '2015' ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;}
        else{
        $sql = "SELECT * FROM Movies WHERE ReleaseYear = '$year' ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;}
      }else{
  $sql = "SELECT * FROM Movies ORDER BY ID DESC LIMIT $start_from, ".$results_per_page;
}

  

  $rs_result = $db->query($sql);

	if (mysqli_num_rows($rs_result) > 0) {
		while($row = $rs_result->fetch_assoc()) {?>

			
				<div class="col" >
				 <a href="MoviePage.php?name=<?php echo$row['Name'] ?>" style='text-decoration: none; color:white;'> 
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
	<input type="text" style="display:none" name="place" value="Browse">
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

				
        ?></div></section>
        <section ><hr>
     
       <nav class="pagination-outer " aria-label="Page navigation">
  
       <ul class="pagination">
        
       <li class="page-item" style="list-style-type: none;">
                <a href="browse.php?page=<?php echo isset($_GET["page"]) ? $_GET["page"]-1 : ''; ?>" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            

        <?php 
        if(isset($_POST['cat'])) {
          if($genre == 'All'){$sql = "SELECT COUNT(ID) AS total FROM Movies";}
          else{
          $sql = "SELECT COUNT(ID) AS total FROM Movies WHERE genre LIKE '%$genre%'";}
        } elseif(isset($_POST['search'])) {
          $search = $_POST['search'];
          $sql = "SELECT COUNT(ID) AS total FROM Movies WHERE name='$search'";
        }elseif(isset($_POST['year'])) {
          $year=$_POST['year'];
          if($year == 'All'){$sql = "SELECT COUNT(ID) AS total FROM Movies ";}
          elseif($year == 'Older'){ $sql = "SELECT COUNT(ID) AS total FROM Movies WHERE ReleaseYear < '2015'";}
          else{
          $sql = "SELECT COUNT(ID) AS total FROM Movies WHERE ReleaseYear = '$year'";}
        }else {
$sql = "SELECT COUNT(ID) AS total FROM Movies";}
$result = $db->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

for ($i=1; $i<=$total_pages; $i++) {?>  
            
            <li class=" page-item <?php if ($i==$page)  echo  'active' ?>" style="background:#242526; list-style-type: none;"><a class="page-link" href="browse.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            
           
 <?php }; ?>

 <li class="page-item" style="list-style-type: none;">
                <a href="browse.php?page=<?php echo isset($_GET["page"]) ? $_GET["page"]+1 : $i-1; ?>" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>

        </ul>
     
    </nav>


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
	<section>
		
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
<?php echo "<a  href='delete.php?Type=Watchlater&Place=Browse&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
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
<?php echo "<a  href='delete.php?Type=Favorites&Place=Browse&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
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











  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Content</h5>
       
      </div>
      <div class="modal-body">
	  <form class="row g-3" method="post" action="browse.php">
  <div class="col-md-6">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="col-md-6">
    <label class="form-label">Genre</label>
    <input type="text" class="form-control" name="genre">
  </div>
  <div class="col-md-4">
    <label class="form-label">Released Year</label>
    <input type="text" class="form-control" name="release">
  </div>
  <div class="col-md-4">
    <label class="form-label">Runtime</label>
    <input type="text" class="form-control" name="runtime">
  </div>
  <div class="col-md-4">
    <label class="form-label">Rating</label>
    <input type="text" class="form-control" name="rating">
  </div>
  <div class="col-md-12">
    <label class="form-label">Synopsis</label>
    <textarea class="form-control" name="synopsis"></textarea>
  </div>
  <div class="col-md-6">
    <label class="form-label">Type</label>
    <select class="form-select form-control" name="type">
      <option selected style="display:none;"></option>
	  <option selected>Movie</option>
	  <option>TV Show</option>
	  <option>Coming Soon</option>
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">Poster Link</label>
    <input type="text" class="form-control" name="poster">
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
      <div class="modal-footer">
      <input style="display:none;" type="text" class="form-control" name="poster1">
      <input style="display:none;" type="text" class="form-control" name="name1">
	  <button type="submit" class="btn btn-primary" name="add_content">Add</button>
      </div></form>
    </div>
  </div>
</div>
	</section>

<script>
$(document).ready(function(){
 
 $('#name').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"search.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>

</body>


</html>
