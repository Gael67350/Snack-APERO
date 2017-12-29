<div class="left-border">
	<div class="icon-centered">
		<i class="material-icons"> person </i>Gestion des consommations de <?= $child->name ?> <?= $child->lastName ?>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a href="#">Insérer une nouvelle consommation</a>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a
				href= <?= action("ConsumptionsController@showExistingConsumption", ['id' => $child->id_child]) ?>>Suppression
			d'une consommation existante </a>
	</div>
	<div class="icon-centered borderedTopBottom">
		<i class="material-icons tiny"> lens </i> <a
				href= <?= action("InflowsController@openInflows", ['id' => $child->id_child]) ?>>Approvisionner le
			compte</a>
	</div>
</div>

<h5>Nouvelle consommation pour <?= $child->name ?> <?= $child->lastName ?></h5>

<?= Form::open(['url' => action('ConsumptionsController@insert')]) ?>
<table class='striped'>
	<thead>
	<tr>
		<th></th>
		<th>Produit</th>
		<th>Prix unitaire</th>
		<th>Quantité</th>
		<th>Prix total</th>
	</tr>
	</thead>

	<tbody id='dynamic-rows-table'>
	<tr class="dynamic-row">
		<td><i class="material-icons"> remove_circle </i></td>
		<td>
			<select class="browser-default" name="0">
				<option value="" disabled selected>Sélectionnez un produit</option>

				<optgroup label="Produits Simples">
                    <?php foreach ($productUncomposed as $product): ?>
						<option value="<?= $product->id_product ?>"><?= $product->name ?></option>
                    <?php endforeach; ?>
				</optgroup>

				<optgroup label="Produits composés">
                    <?php foreach ($productComposed as $product): ?>
						<option value="<?= $product->id_product ?>"><?= $product->name ?></option>
                    <?php endforeach; ?>
				</optgroup>
			</select>
		</td>
		<td class="unitPrice">--,-- €</td>
		<td><?= Form::number('qqtprodx', 1, ['min' => 1, 'class' => 'smallPicker']) ?></td>
		<td class="totalRowPrice">--,--</td>
	</tr>
	</tbody>
</table>
<p> Prix total de la consommation : <span class="totalPrice">--,--</span> €</p>
<?= Form::submit('Valider la consommation', ['class' => 'waves-effect waves-light btn btn-spaced']) ?>
<?= Form::hidden('id_child', $child->id_child) ?>
<?= Form::hidden('number', 0, ['id' => 'dynamic-number']) ?>
<?= Form::close() ?>

<span class="hidden" id="dynamic-data">
	<?= $json ?>
</span>

<script type="text/javascript" src="<?= asset('/js/productPrice.js') ?>"></script>
