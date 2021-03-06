<?php 
  include('DBLink.php');

  $username = $_SESSION["username"];

	if($_SESSION['email'] == null){
		header('location: Home page.php');
	}

 if(isset($_GET['error'])){
  array_push($errors, "You need to have at least 1 card!");
 }

  $query = "SELECT * FROM users WHERE username='$username'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				while($row = $results->fetch_assoc()) {
					
					$fname= $row['First_Name'];
					$lname= $row["Last_Name"];
					$age= $row['Age'];
					$plan= $row['Plan'];
					$username= $row['Username'];
					$avatar= $row['Avatar'];

					$address= $row['Address'];
					$city= $row['City'];
					$country= $row['Country'];
					$phone= $row['Phone'];
					$zip= $row['Zip'];
                }
            }

            if(isset($_POST['password'])){
              $old = mysqli_real_escape_string($db, $_POST['old']);
              $new = mysqli_real_escape_string($db, $_POST['new']);
              $confirm = mysqli_real_escape_string($db, $_POST['confirm']);
          
              $query = "SELECT * FROM users WHERE username='$username' AND Password='$old'";
              $match = mysqli_query($db, $query);
              if (mysqli_num_rows($match) != 1) {
                array_push($errors, "Wrong Old Password!");
          
              }

              if ($new != $confirm) {
                array_push($errors, "The two passwords do not match");
              }
          
              $uppercase = preg_match('@[A-Z]@', $new);
              $lowercase = preg_match('@[a-z]@', $new);
              $number    = preg_match('@[0-9]@', $new);
          
              if(!$uppercase || !$lowercase || !$number|| strlen($new) < 8) {
                array_push($errors, "Password should be at least 8 characters in length and should include at least one upper case letter, and one number.");
              }
          
              if (count($errors) == 0) {
              $query = "UPDATE users SET Password='$new' WHERE Username='$username'";
              mysqli_query($db, $query);
              header("location: Profile.php?Success=True");
              }
          
              }

            if (isset($_POST['address'])) {
                $address = mysqli_real_escape_string($db, $_POST['address']);
                $city = mysqli_real_escape_string($db, $_POST['city']);
                $country = mysqli_real_escape_string($db, $_POST['country']);
                $phone = mysqli_real_escape_string($db, $_POST['phone']);
                $zip = mysqli_real_escape_string($db, $_POST['zip']);
                $username = mysqli_real_escape_string($db, $_POST['username']);
        
                
                $query = "UPDATE users set Address='$address', City='$city', Country='$country', Phone='$phone',Zip='$zip' where Username='$username'";
                mysqli_query($db, $query);
        
                
            }

            if (isset($_POST['avatar'])) {
                $avatar = mysqli_real_escape_string($db, $_POST['avatar']);
                
                $query = "UPDATE users set Avatar='$avatar' where Username='$username'";
                mysqli_query($db, $query);
        
                
            }

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset = "utf-8">
      <title>Profile</title>

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
           
			<li><a class="dropdown-item" href="http://localhost/ProjectWD/clients.php">Clients</a></li>
            
            
          </ul>
        </li><?php ; } ?>
        <li class="nav-item">
          <a class="nav-link" href="Help Center Logged.html">Help Center</a>
        </li>
		<li class="nav-item dropdown">
		<a class="nav-link active" href="http://localhost/ProjectWD/Profile.php"><?php echo $_SESSION["username"] ?> <img src="profile pic/<?php echo $avatar?>" class="avatar5" ></a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
		  <form action="" method="post">
      <li><button  type="button" class="dropdown-item" data-toggle="modal" data-target="#watchlist" >Watch Later</button></li>
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


<div class="container" style="display:block; height:140vh; background-color: ; ">
<?php include('errors.php') ; ?>
<h4>
   <?php
   
   if(isset($_GET["Success"])){
	echo "<div class='success'>Password successfully changed! </div>";
} 

 ?></h4>
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Billing info</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Card info</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Username</h6>
                            <p>
                            <?php echo $username?>
                            </p>
                            <h6>Name</h6>
                            <p>
                            <?php echo $fname." ".$lname ?>
                            </p>
                            <h6>Email</h6>
                            <p>
                            <?php echo $_SESSION["email"]?>
                            </p>
                            <h6>Age</h6>
                            <p>
                            <?php echo $age?> 
                            </p>
                            <p>
                            <form method="post" action="">
                            <a class="btn btn-primary" data-toggle="collapse" href="#pass1" role="button" aria-expanded="false" aria-controls="pass1">Change Password</a>
                            <button type="submit" type="button" name="password" class="btn btn-primary collapse multi-collapse" id="pass1">Save</button>
                            </p>
                            <p class="collapse multi-collapse" id="pass1">
                            <input type="password" class="form-control" name="old" id="old" placeholder="Old Password"><br>
                            <input type="password" class="form-control" name="new" id="new" placeholder="New Password"><br>
                            <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm New Password">
                             <div class="form-check">
                            <p class="collapse multi-collapse" id="pass1">
                            <input class="form-check-input" onclick="ShowPass()" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                             Show Password
                        		</label>
                            </p>
                            </div>
                            </p>
                            </form>
                        </div>
                        <div class="col-md-6">
                        <div class="modal-dialog" style=" display:block;  overflow-y: initial !important; max-width: 350px;">
<div class="modal-content" style="overflow-x: hidden; border:none; color:white; background-color:#242526;">
<div>
<h6 class="modal-title" id="exampleModalLabel" style="font-size:30px; margin-left:2%"><strong>Favorites</strong><img src="logo\favorites.jpg" title="Add to Favorites" width="34"></h6>
</div>
<div class="modal-body " style="height: 60vh; overflow-y: auto; color:white; background-color:#242526;">
  <div class="row">


<?php
$username = $_SESSION['username'];
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
<?php echo "<a  href='delete.php?Type=Favorites&Place=Profile&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
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
            
             $query = "SELECT * FROM comments WHERE username='$username' ORDER BY ID DESC LIMIT 5";
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
                <div class="tab-pane" id="messages">
                   
                    <form method="post" action="">
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Address</h6>
                            <p class="collapse multi-collapse show" id="multiCollapseExample1">
                            <?php echo $address?> 
                            </p>
                            <p class="collapse multi-collapse" id="multiCollapseExample1">
                            <input type="text" class="form-control" name="address" width="10%" value="<?php echo $address?>">
                            </p>
                            <h6>City</h6>
                            <p class="collapse multi-collapse show" id="multiCollapseExample1">
                            <?php echo $city?>
                            </p>
                            <p class="collapse multi-collapse" id="multiCollapseExample1">
                            <input type="text" class="form-control" width="10%" name="city" value="<?php echo $city?>">
                            </p>
                            <h6>Country</h6>
                            <p class="collapse multi-collapse show" id="multiCollapseExample1">
                            <?php echo $country?>
                            </p>
                            <p class="collapse multi-collapse" id="multiCollapseExample1">
                            <input type="text" class="form-control" width="10%" name="country" value="<?php echo $country?>">
                            </p>
                            <h6>Phone</h6>
                            <p class="collapse multi-collapse show" id="multiCollapseExample1">
                            <?php echo $phone?>
                            </p>
                            <p class="collapse multi-collapse" id="multiCollapseExample1">
                            <input type="text" class="form-control" width="10%" name="phone" value="<?php echo $phone?>">
                            </p>
                            <h6>Zip</h6>
                            <p class="collapse multi-collapse show" id="multiCollapseExample1">
                            <?php echo $zip?>
                            </p>
                            <p class="collapse multi-collapse" id="multiCollapseExample1">
                            <input type="text" class="form-control" width="10%" name="zip" value="<?php echo $zip?>">
                            </p>
                            <p class="collapse multi-collapse" id="multiCollapseExample1">
                            <button type="submit" type="button" class="btn btn-primary">Save</button>
                            </p>
                            
                            <input type="text" style="display:none" name="username" value="<?php echo $_SESSION["username"] ?>">
                        </div>
                        <div class="col-md-6">
                       
                        </div>
                        <div class="col-md-2">
                        <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Edit</a>
                      
                       
                    </div>
        </div>
                </div>
                </form>
                <div class="tab-pane" id="edit">
                <div class="accordion" id="accordionExample">
                <?php 
            
                $query = "SELECT * FROM cards WHERE username='$username'";
			    $results = mysqli_query($db, $query);
                $i=0;
                if (mysqli_num_rows($results) > 0) {
	            	while($row = $results->fetch_assoc()) {
                        $i++;
                        ?>
                        
                        <div class="card">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i ?>" aria-expanded="true" aria-controls="collapse<?php echo $i ?>">
                              Card #<?php echo $i ?>   <?php echo "<a class='button_M pull-right' href='delete.php?Username=".$username."&card=".$row['CardNumber']."'style='text-decoration: none; color:white;'>Delete</a>" ?>
                            </button>
                          </h2>
                        </div>
                    
                        <div id="collapse<?php echo $i ?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <h6>Card First Name</h6>
                            <p>
                            <?php echo $row['First_Name'] ?>
                            </p>
                            <h6>Card Last Name</h6>
                            <p>
                            <?php echo $row['Last_Name'] ?>
                            </p>
                            <h6>Card Number</h6>
                            <p>
                            <?php echo $row['CardNumber'] ?>
                            </p>
                            <h6>Card Expirey</h6>
                            <p>
                            <?php echo $row['ExpDate'] ?>
                            </p>
                  
                        </div>
                        </div>
                        </div>
        

        <?php		
				}
		} else {
		  echo "0 results";
		}

				
        ?>

                   <div class="card">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                              Add Card
                            </button>
                          </h2>
                        </div>
                    
                        <div id="collapse" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                          <form method="post" action="">
                          <div class="row g-3">
                          <div class="col-md-4">
                           <h6>First Name</h6>
                            <p>
                            <input type="text" class="form-control" width="10%" name="cfname" >
                            </p>
                            </div>
                           <div class="col-md-4">
                           <h6>Last Name</h6>
                            <p>
                            <input type="text" class="form-control" width="10%" name="clname">
                            </p>
                            </div>
                            <div class="col-md-2">
                           
                            </div>
                            <div class="col-md-2">
                            <p>
                            <button type="submit" type="button" class="btn btn-primary" name="add_card">Add</button>
                            </p>
                            </div>
                            <div class="col-md-12">
  
                             <h6>Card Number<h6>
    
                                   </div>
                              <div class="col-md-2">
                            <p>
                            <input type="text"  maxlength="4" class="form-control" width="10%" name="card1" placeholder="XXXX"> 
                            </p>
                            </div>
                             <div class="col-md-2">
                             <p>
                            <input type="text"  maxlength="4" class="form-control" width="10%" name="card2" placeholder="XXXX">
                            </p>
                            </div>
                             <div class="col-md-2">
                             <p>
                            <input type="text"  maxlength="4" class="form-control" width="10%" name="card3" placeholder="XXXX">
                            </p>
                            </div>
                            <div class="col-md-2">
                            <p>
                            <input type="text"  maxlength="4" class="form-control" width="10%" name="card4" placeholder="XXXX">
                            </p>
                           </div>
                           <div class="col-md-2">
                           <input type="text" style="display:none" name="username" value="<?php echo $_SESSION["username"] ?>">
                           </div>
                           <div class="col-md-4">
                           <h6>Zip</h6>
                            <p>
                            <input type="text" maxlength="4" class="form-control" width="10%" name="zip" placeholder="XXXX">
                            </p>
                            </div>
                            <div class="col-md-4">
                            <h6>Card Exp</h6>
                            <p>
                            <input type="date" class="form-control" width="10%" name="exp" ">
                            </p>
                            </div>
                            
                                   </div>
                  </form>
                        </div>
                        </div>
                        </div>




</div>


                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
        <form method="post" action="">
        <label class="custom-file">
                <input type="file" id="file" name="avatar" class="custom-file-input" value="<?php echo $avatar?>" onchange="this.form.submit()">
            <img src="profile pic/<?php echo $avatar?>" class="mx-auto img-fluid img-circle d-block avatar4" title="Change Avatar"alt="avatar4">
            <figcaption > <h6 class="mt-2">Profile Avatar</h6> 	
					</figcaption>
             </label>
    </form>
           
             
           
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
<?php echo "<a  href='delete.php?Type=Watchlater&Place=Profile&MovieName=".$row['MovieName']."&Username=".$row['Username']."'style='text-decoration: none; color:white;'  class='hover'>🗙</a>" ?>
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

<br>
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
  <script> 
function ShowPass() {
  var x = document.getElementById("old");
  var y = document.getElementById("new");
  var z = document.getElementById("confirm");

  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

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