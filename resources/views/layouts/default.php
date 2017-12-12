<!doctype html>
<html lang="<?= app()->getLocale() ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Snack APERO</title>

		<link rel="stylesheet" href="./css/main.css">
		<link rel="stylesheet" href="./css/materialize.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar">
			<div class="container nav-wrapper">
				<a href="#" class="brand-logo">Snack APERO</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="#">Consommations</a></li>
					<li><a href="#">Stock</a></li>
					<li class="nav-user">
						<a class="dropdown-button" data-activates="dropdownUser" href="#">John Doe <i
									class="material-icons">account_circle</i></a>

						<ul id="dropdownUser" class="dropdown-content">
							<li><a href="#">Profil</a></li>
							<li><a href="#">Déconnexion</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container">
			<?= $content ?>
		</div>

		<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="./js/materialize.min.js"></script>

	</body>
</html>
