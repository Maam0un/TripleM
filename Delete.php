<?php 


$card = $_GET['card'];
$email = $_GET['email'];
$name = $_GET['name'];
$name2 = $_GET['name2'];
$MovieName = $_GET['MovieName'];
$username = $_GET['Username'];
$place = $_GET['Place'];
$type = $_GET['Type'];
$user = $_GET['User'];
$page = $_GET['Page'];
$date = $_GET['Date'];
$usercom = $_GET['Usercom'];
$comment = $_GET['Comment'];

$db = mysqli_connect('localhost', 'root', 'stargold989', 'TripleM');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "DELETE FROM users WHERE Email = '$email'"; 
$results = mysqli_query($db, $query);

if($email !== null){
if ($results) {
    $db->close();
     header('Location: clients.php'); 
     exit;
 } else {
     echo "Error deleting record";
 }
}

$sql = "DELETE FROM Movies WHERE Name = '$name'"; 
$results2 = mysqli_query($db, $sql);

if($name !== null){
if ($results2) {
    $db->close();
     header('Location: browse.php#movies'); 
     exit;
 } else {
     echo "Error deleting record";
 }
}



$sql = "DELETE FROM ComingSoon WHERE Name = '$name2'"; 
$results3 = mysqli_query($db, $sql);

if($name2 !== null){
if ($results3) {
    $db->close();
     header('Location: home pagelog.php#comingsoon'); 
     exit;
 } else {
     echo "Error deleting record";
 }
}

if($_GET['Usercom'])
$sql = "DELETE FROM Comments WHERE Username = '$usercom' AND DatePosted = '$date' AND Page = '$page' AND Comment = '$comment' "; 
$results3 = mysqli_query($db, $sql);

if($comment !== null){
if ($results3) {
    $db->close();
     header("Location: MoviePage.php?name=$page#comments"); 
     exit;
 } else {
     echo "Error deleting record";
 }
}

if($card !== null){
    $sql = "SELECT COUNT(ID) AS total FROM Cards WHERE Username='$username'"; 
    $results5 = mysqli_query($db, $sql);
    $row = $results5->fetch_assoc();
    $total = $row["total"];
if ($total > 1) {
    $sql = "DELETE FROM Cards WHERE CardNumber = '$card'";
    $results6 = mysqli_query($db, $sql);
    $db->close();
     header('Location: profile.php'); 
     exit;
 } else {
     header("Location: profile.php?error=True"); 
 }
}

if($type == "Watchlater"){
    $sql = "DELETE FROM WatchLater WHERE MovieName='$MovieName' AND Username='$username'"; 
    }elseif($type == "Favorites") {
        $sql = "DELETE FROM Favorites WHERE MovieName='$MovieName' AND Username='$username'"; 
    }

$results = mysqli_query($db, $sql);

if($MovieName !== null){
if ($results) {
    $db->close();
    if($place == "Home"){
     header('Location: home pagelog.php'); 
    }elseif($place == "Browse"){
     header('Location: browse.php'); 
    }elseif($place == "Profile"){
     header('Location: profile.php');
    }elseif($place == "Movie"){
    header("Location: MoviePage.php?name=$MovieName");
    }elseif($place == "User"){
        header("Location: user.php?user=$user");
        }
     exit;
 } else {
     echo "Error deleting record";
 }
}


?>
