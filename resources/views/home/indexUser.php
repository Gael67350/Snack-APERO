<div class="left-border">
  <div class="icon-centered">
    <i class="material-icons"> supervisor_account </i>  Liste des enfants
  </div>
   <?php
    foreach ($childs as $child) {
      echo  "<div class=\"icon-centered borderedTopBottom\">";
      echo  "<i class=\"material-icons tiny \"> lens </i> ".$child->name." ".$child->lastName;
      echo  "</div>";
    }

   ?>
</div>

<?php
  use App\Models;
  if(isset($childs[$idDisplay]))
  {
    echo "<h4> Résumé de ".$childs[$idDisplay]->name." ".$childs[$idDisplay]->lastName."</h4>";
    echo "<h5> Solde actuel : ".$childBalance[0]->balance."€ </h5>";
    echo "<h5 > Date de naissance : ".$childs[$idDisplay]->birthDate." catégorie : ".$displayedCategory[0]->name."</h5>";

    echo  "<ul class=\"collapsible\" data-colapsible=\"accordion\">";
    echo  "<li>";
    echo  "<div class=\"collapsible-header\">";
    echo  "<i class=\"material-icons\"> list </i>";
    echo  "historique des consommations";
    echo  "</div>";
    echo  "<div class=\"collapsible-body\">";
    echo  "<table class=\"striped\">";
    echo  "<thead>";
    echo  "<tr>";
    echo  "<th>date de consommations</th>";
    echo  "<th>Contenu de la consommation</th>";
    echo  "</tr>";
    echo  "</thead>";
    echo  "<tbody>";
    foreach ($AssociatedConsumption as $consumption)
    {
        echo"<tr>";
        echo"<td>".$consumption->transactionDate."</td>";
        echo"<td>";
        echo"<table class=\"bordered\">";

        echo"<thead>";
          echo"<tr>";
            echo"<th>nom du produit</th>";
            echo"<th>quantité acheté</th>";
          echo"</tr>";
        echo"</thead>";
        echo"<tbody>";
        foreach (Models\Product::getAchats($consumption->id_consumption) as $achat)
        {
          echo"<tr>";
          echo"<td>".$achat->name."</td>";
          echo"<td>".$achat->quantity."</td>";
          echo"</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</li>";

    echo "<li>";
    echo "<div class=\"collapsible-header\"><i class=\"material-icons\"> list </i> historique des aprovisionnement</div>";
    echo "  <div class=\"collapsible-body\">";
    echo "  <table class=\"striped\">";
    echo "    <thead>";
    echo "      <tr>";
    echo "        <th>date de la recharge</th>";
    echo "        <th>montant de la recharge</th>";
    echo "      </tr>";
    echo "    </thead>";
    echo "    <tbody>";

    foreach ($AssociatedInflows as $inflow) {
      echo "      <tr>";
      echo "      <td>".$inflow->transactionDate."</td>";
      echo "        <td>".$inflow->amount."</td>";
      echo "      </tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</li>";
    echo "</ul>";

  }
?>
