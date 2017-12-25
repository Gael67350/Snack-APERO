<!doctype html>
<html lang="<?= app()->getLocale() ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="<?= csrf_token() ?>">

		<title>Snack APERO</title>

		<link rel="stylesheet" href="<?= asset('/css/main.css') ?>">
		<link rel="stylesheet" href="<?= asset('/css/materialize.css') ?>">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>

	<body>
		<nav class="navbar">
			<div class="container nav-wrapper">
				<a href="<?= url('/') ?>" class="brand-logo">Snack APERO</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">

                    <?php if (Auth::check() && (Auth::user()->isVolunteer() || Auth::user()->isAdmin())): ?>

						<li><a href="<?=action("ChildsController@showChilds") ?>">Enfants</a></li>
						<li><a href="<?=action("ConsumptionsController@showChildSrch") ?>">Consommations</a></li>
						<li><a href="<?=action("ProductsController@displayStocks") ?>">Stock</a></li>

                        <?php if (Auth::user()->isAdmin()): ?>

						<li><a href="<?=action("ProductsController@displayLogs") ?>">Administration</a></li>

                        <?php endif; ?>

                    <?php endif; ?>

					<li class="nav-user">

                        <?php if (Auth::check()): ?>

							<a class="dropdown-button" data-activates="dropdownUser" href="#"><?= Auth::user()->email ?>
								<i
										class="material-icons">account_circle</i></a>
							<ul id="dropdownUser" class="dropdown-content">

								<li><a href="<?= route('profile', ['id' => Auth::user()->id_user]) ?>">Profil</a></li>
								<li><a href="<?= route('logout') ?>">Déconnexion</a></li>
							</ul>

                        <?php endif; ?>

					</li>
				</ul>
			</div>
		</nav>

		<div class="container">
            <?= $content ?>
		</div>

		<script type="text/javascript" src="<?= asset('/js/jquery-3.2.1.min.js') ?>"></script>
		<script type="text/javascript" src="<?= asset('js/materialize.min.js') ?>"></script>

	</body>
</html>
