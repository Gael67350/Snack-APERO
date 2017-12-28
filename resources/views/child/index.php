<h3>Liste des enfants</h3>

<table class="bordered">
	<thead>
	<tr>
		<th>Prénom</th>
		<th>Nom de famille</th>
		<th>Date de naissance</th>
		<th>Catégorie</th>
		<th>Solde</th>
		<th>Actions</th>
	</tr>
	</thead>
	<tbody>

    <?php foreach ($children as $child): ?>
		<tr>
			<td><?= $child->name ?></td>
			<td><?= $child->lastName ?></td>
			<td><?= date_format($child->birthDate, 'd-m-Y') ?></td>
			<td><?= $child->category->name ?></td>
			<td><?= number_format($child->getBalance(), 2) ?>
			<td><a href="<?= action('ChildsController@display', ['id' => $child->id_child]) ?>">Voir</a></td>
		</tr>
    <?php endforeach; ?>

	</tbody>
</table>
