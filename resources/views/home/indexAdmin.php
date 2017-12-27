<div class="table-section">
	<ul class="collapsible" data-collapsible="accordion">
		<li>
			<div class="collapsible-header">
				<i class="material-icons">
					list
				</i>
				Aperçu de la liste des enfants
			</div>
			<div class="collapsible-body">
				<table class="striped">
					<thead>
					<tr>
						<th>Prenom</th>
						<th>Nom</th>
						<th>Solde</th>
					</tr>
					</thead>

					<tbody>
                    <?php foreach ($children as $child): ?>
						<tr>
							<td><?= $child->name ?></td>
							<td><?= $child->lastName ?></td>
							<td><?= $child->getBalance() ?> €</td>
						</tr>
                    <?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</li>

		<li>
			<div class="collapsible-header">
				<i class="material-icons">
					list
				</i>
				Aperçu du stock
			</div>
			<div class="collapsible-body">
				<?php /* bandeau d'alerte de stock pour l'administrateur*/
				      if(isset($CurrentAlert[0]))
				      {
				        echo "<div class=\"red\"> ";
				          foreach ($CurrentAlert as $displayedLog) {
				            echo"<p> Alerte datant de : ".$displayedLog->created." message Associé : ".$displayedLog->message;
				          }
				          echo "<p class=\"borderedConten\"></p>";
				        echo "</div>";
				      }
				?>
				<table class="striped">
					<thead>
					<tr>
						<th>Produit</th>
						<th>Quantité en stock</th>
					</tr>
					</thead>
					<tbody>
                    <?php foreach ($products as $product): ?>
                        <?php if (isset($product->minQuantity)): ?>
							<tr>
								<td><?= $product->name ?></td>
								<td><?= $product->getStock() ?></td>
							</tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</li>
	</ul>
</div>
