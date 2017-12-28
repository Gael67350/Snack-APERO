<h3>Résumé de <?= $child->name ?> <?= $child->lastName ?></h3>
<h5>Solde actuel : <?= $child->getBalance() ?> €</h5>
<h5>Date de naissance : <?= date("d-m-Y", strtotime($child->birthDate)) ?></h5>
<h5>Catégorie : <?= $child->category->name ?></h5>

<ul class="collapsible" data-colapsible="accordion">
	<li>
		<div class="collapsible-header">
			<i class="material-icons"> list </i> Historique des consommations
		</div>
		<div class="collapsible-body">
			<table class="striped">
				<thead>
				<tr>
					<th>Date de consommation</th>
					<th>Contenu de la consommation</th>
				</tr>
				</thead>
				<tbody>
                <?php foreach ($child->consumptions as $consumption): ?>
					<tr>
						<td><?= date_format($consumption->transactionDate, 'd-m-Y') ?></td>
						<td>

							<table class="bordered">
								<thead>
								<tr>
									<th>Nom du produit</th>
									<th>Quantité consommée</th>
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
		</div>
	</li>

	<li>
		<div class="collapsible-header"><i class="material-icons"> list </i> Historique des approvisionnements</div>
		<div class="collapsible-body">
			<table class="striped">
				<thead>
				<tr>
					<th>Date de la recharge</th>
					<th>Montant</th>
				</tr>
				</thead>

				<tbody>
                <?php foreach ($child->inflows as $inflow): ?>
					<tr>
						<td><?= date_format($inflow->transactionDate, "d-m-Y") ?></td>
						<td><?= number_format($inflow->amount, 2) ?> €</td>
					</tr>
                <?php endforeach; ?>
				</tbody>

			</table>
		</div>
	</li>
</ul>