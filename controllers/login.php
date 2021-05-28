<?php
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","root","projdevweb");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE user_name='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Données utilisateur invalides!";
	} else {
		$message = "Vous êtes correctement authentifié!";
	}
}
?>