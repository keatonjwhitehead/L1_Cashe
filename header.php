<!-- 
	Team: L1_Cache
	Website Name: Catch Me If You Can
	Page: Sign Up
-->
<?php


function myHeader($title){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery, Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
	<style>
		/* Style for top navigatin bar containing links to Log In, and Sign Up */ 
		.navbar {
			margin-bottom:0;
			border-radius:0;
		}
				
		/* For content*/
		.row.content {height:515px}
    
		/* Style for left naviagation bar. Background color is gray and height is 100%. Contains links to Rules and Feedback */
		.sidenav {
			padding-top:3%;
			padding-left:4%;
			background-color:#fff;
			height:100%;
		}
    
		/* Style for footer. Background color is gray, black text and padding */
		footer {
			background-color:#fff;
			color:black;
			padding:15px;
		}
    
		/* This is for small screens. Height is set to 'auto' for .sidenav and grid */
		@media screen and (max-width:767px) {
			.sidenav {
				height:auto;
				padding:15px;
			}
			.row.content {height:auto;} 
		}
	</style>
</head>
<body>

	<!-- Top navigation bar -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<!-- Logo
				<a class="navbar-brand" href="#"><img src="" class="img-rounded" width="43" height="33"></img></a>
				-->
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<?php 
						$pages = ["Home", "Sign Up", "Log In"];
						$links = ["./", "signup.php", "/login.php"];
						for ($i=0; $i < count($pages); $i++) {
							if ($title == $pages[$i]) {
								echo "<li class='active'><a href='#'>$title</a></li>";
							}else {
								echo "<li><a href='$links[$i]'>$pages[$i]</a></li>";
							}
						}
					?>
				</ul>
			</div>
		</div>
	</nav>
	
	<!-- Title -->
	<div class="jumbotron" style="background:#13c6ba; color:white">
		<div class="container text-center">
			<h1>Catch Me If You Can</h1>      
		</div>
	</div>

	<!-- Content -->
	<div class="container-fluid">    
<?php
	
}
