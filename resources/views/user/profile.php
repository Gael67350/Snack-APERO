<div class="profile">
    <?php if (Auth::user()->id_user === $user->id_user): ?>
		<h3 class="title">Mon profil</h3>
    <?php else: ?>
		<h3 class="title">Profil de <?= $user->email ?></h3>
    <?php endif ?>

	<div class="info">
		<div class="subtitle">Informations générales</div>

		<p>Adresse email : <?= $user->email ?></p>
		<p>Numéro de tél. : <?= $user->phone ?></p>
		<p>Privilège : <?= $user->getPrivilegeName() ?></p>
	</div>

	<div class="info">
		<div class="subtitle">Enfants associés</div>

        <?php if (count($user->children)): ?>
			<table>
				<thead>
				<tr>
					<th>Prénom</th>
					<th>Nom de famille</th>
					<th>Date de naissance</th>
					<th>Catégorie</th>
					<th>Solde</th>
				</tr>
				</thead>
				<tbody>

                <?php foreach ($user->children as $child): ?>
					<tr>
						<td><?= $child->name ?></td>
						<td><?= $child->lastName ?></td>
						<td><?= date_format($child->birthDate, 'd-m-Y') ?></td>
						<td><?= $child->category->name ?></td>
						<td><?= $child->getBalance() . ' €' ?></td>
					</tr>
                <?php endforeach; ?>

				</tbody>
			</table>
        <?php else: ?>
			<p>Aucun enfant n'est associé à ce compte utilisateur.</p>
        <?php endif; ?>
	</div>
</div>