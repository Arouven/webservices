<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bootstrap Card</title>
	<meta charset="utf-8">
	<meta name="description" content="Cards are most extubate and important contents in Bootstrap. In the cards have some class which is use to make your cards more beautiful and attractive. here we create and design cards using Bootstrap 4 Responsive Card deck class. Bootstrap 4 have flexbox cards to manage your cards height and width. Also, we use a Font Awesome cdn for social icons and also used hover effects for font awesome icons and cards border hover effects in cards. This page is fully responsive with media queries with all views.">
	<meta name="keywords" content="responsive card in bootstrap,responsive card in bootstrap 4,responsive card deck bootstrap 4,responsive card layout bootstrap,responsive card slider bootstrap,how to make card responsive in bootstrap,card responsive bootstrap 3,responsive cards bootstrap 3">
	<meta name="author" content="w3hubs.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">


</head>

<body>
	<section id="w3hubs">
		<div class="container-fluid">
			<h2>BootStrap 4 Cards</h2>

			<div class="card-deck">
				<?php require 'displayCards.php'; ?>



				<div class="card bg-warning">
					<div class="card-body text-center">
						<img src="img/2.jpg" class="rounded-circle">
						<h3>Devid Martin</h3>
						<h5>Manger</h5>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<div class="socialicon">
							<a href="#"><i class="fa fa-facebook-square"></i></a>
							<a href="#"><i class="fa fa-twitter-square"></i></a>
							<a href="#"><i class="fa fa-google-plus-square"></i></a>
							<a href="#"><i class="fa fa-linkedin-square"></i></a>
						</div>
					</div>
				</div>
				<div class="card bg-success m1">
					<div class="card-body text-center">
						<img src="img/3.jpg" class="rounded-circle">
						<h3>Mark Gospel</h3>
						<h5>Team Leader</h5>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<div class="socialicon">
							<a href="#"><i class="fa fa-facebook-square"></i></a>
							<a href="#"><i class="fa fa-twitter-square"></i></a>
							<a href="#"><i class="fa fa-google-plus-square"></i></a>
							<a href="#"><i class="fa fa-linkedin-square"></i></a>
						</div>
					</div>
				</div>
				<div class="card bg-danger m1">
					<div class="card-body text-center">
						<img src="img/4.jpg" class="rounded-circle">
						<h3>Kevin Dean</h3>
						<h5>Web Developer</h5>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
						<div class="socialicon">
							<a href="#"><i class="fa fa-facebook-square"></i></a>
							<a href="#"><i class="fa fa-twitter-square"></i></a>
							<a href="#"><i class="fa fa-google-plus-square"></i></a>
							<a href="#"><i class="fa fa-linkedin-square"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>