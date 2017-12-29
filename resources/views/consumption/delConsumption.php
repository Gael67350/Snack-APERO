<div class="left-border">
	<div class="icon-centered">
		<i class="material-icons"> person </i>Gestion des consommations
		de <?= $child->name ?> <?= $child->lastName ?>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a
				href= <?= action("ChildsController@openChildManager", ['id' => $child->id_child]) ?>>Insérer une
			nouvelle consommation</a>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a href="#">Suppression d'une consommation existante </a>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a
				href= <?= action("InflowsController@openInflows", ['id' => $child->id_child]) ?>>Approvisionner le
			compte</a>
	</div>
</div>

<h5> Liste des consommations existantes pour <?= $child->name ?> <?= $child->lastName ?></h5>

<table class="striped">
	<thead>
	<tr>
		<th></th>
		<th>Date de consommation</th>
		<th>Contenu de la consommation</th>
	</tr>
	</thead>
	<tbody>
    <?php foreach ($consumptions as $consumption): ?>
		<tr>
            <?php if ($consumption->transactionDate == date("Y-m-d")): ?>
				<td><i class="material-icons"> remove_circle </i></td>
            <?php else: ?>
				<td></td>
            <?php endif; ?>
			<td><?= date_format($consumption->transactionDate, 'd-m-Y') ?></td>
			<td>
				<table class="bordered">
					<thead>
					<tr>
						<th>Nom du produit</th>
						<th>Quantité achetée</th>
					</tr>
					</thead>
					<tbody>
                    <?php foreach ($consumption->products as $product): ?>
						<tr>
							<td><?= $product->name ?></td>
							<td><?= $product->getQuantity() ?></td>
						</tr>
                    <?php endforeach; ?>
					</tbody>
				</table>
			</td>
		</tr>
    <?php endforeach; ?>
	</tbody>
</table>
