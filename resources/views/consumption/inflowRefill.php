<div class="left-border">
	<div class="icon-centered">
		<i class="material-icons"> person </i>Gestion des consommations
		de <?= $child->name ?> <?= $child->lastName ?>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a
				href= <?= action("ChildsController@openChildManager", ['id' => $child->id_child]) ?>>Insérer une
			nouvelle
			consommation</a>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a
				href= <?= action("ConsumptionsController@showExistingConsumption", ['id' => $child->id_child]) ?>>Suppression
			d'une consommation existante</a>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a href="#">Approvisionner le compte </a>
	</div>
</div>

<h5>Nouvelle recharge pour <?= $child->name ?> <?= $child->lastName ?></h5>

<?= Form::open(['url' => 'consumption/insInflow/validate']) ?>
<div class="input-field">
    <?= Form::number('amount') ?>
    <?= Form::label('amount', 'Montant de la recharge') ?>
</div>
<?= Form::hidden('id', $child->id_child) ?>

<?= Form::submit('Enregistrer l\'approvisionnement', ['class' => 'waves-effect waves-light btn']) ?>
</form>

<table class="striped">
	<thead>
	<tr>
		<th></th>
		<th>Date</th>
		<th>Montant</th>
	</tr>
	</thead>
	<tbody>
    <?php foreach ($inflows as $inflow): ?>
		<tr>
            <?php if (date("Y-m-d", strtotime($inflow->transactionDate)) === date('Y-m-d')): ?>
				<td> <a href="<?= action("InflowsController@delInflow",['id' => $inflow->id_inflow])?>"> <i class="material-icons"> remove_circle </i> </a> </td>
            <?php else: ?>
				<td></td>
            <?php endif; ?>
			<td><?= date("Y-m-d", strtotime($inflow->transactionDate)) ?></td>
			<td><?= $inflow->amount ?></td>
		</tr>
    <?php endforeach; ?>
	</tbody>
</table>
