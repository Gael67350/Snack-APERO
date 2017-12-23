<div class="form-box">

    <?= Form::open(['url' => 'login']) ?>

	<div class="title">Connexion</div>

	<div class="messages">
        <?= $errors->first('message') ?>
	</div>

	<div class="row">
		<div class="input-field col s12">
            <?= Form::email('email', \Illuminate\Support\Facades\Input::old('email')) ?>
            <?= Form::label('email', 'Adresse email') ?>
		</div>

		<div class="input-field col s12">
            <?= Form::password('password') ?>
            <?= Form::label('password', 'Mot de passe') ?>
		</div>

		<div class="input-checkbox col s12">
            <?= Form::hidden('remember', 0) ?>
            <?= Form::checkbox('remember', 1, null, ['id' => 'remember']) ?>
            <?= Form::label('remember', 'Se souvenir de moi ?') ?>
		</div>

		<div class="input-field col s12">
            <?= Form::submit('Se connecter', ['class' => 'waves-effect waves-light btn']) ?>
		</div>
	</div>

    <?= Form::close() ?>
</div>