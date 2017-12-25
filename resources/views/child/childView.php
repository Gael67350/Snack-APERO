<div class="left-border">
  <div class="icon-centered">
    <i class="material-icons"> supervisor_account </i>  Liste des enfants
  </div>
   <?php
     use App\Models;
     if(isset($children))
     {
       foreach ($children as $child) {
         echo  "<div class=\"icon-centered borderedTopBottom whiteText\">";
         echo  "<i class=\"material-icons tiny \"> lens </i> <a href=\"".action("ChildsController@showChilds",['toDisp' => $child->id_child])."\">".$child->name." ".$child->lastName."</a>";
         echo  "</div>";
       }
    }
   ?>
</div>

<?php
  if(isset($children))
  {
    echo "<h4> Résumé de ".$Display->name." ".$Display->lastName."</h4>";
    echo "<h5> Solde actuel : ".$Display->getBalance()  ."€ </h5>";
    echo "<h5 > Date de naissance : ".date("d-m-Y",strtotime($Display->birthDate))." catégorie : ".$Display->category->name."</h5>";

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
  else
  {
    echo"<h5> il n'y a pas d'enfants enregistrés pour ce compte </h5>";
  }
?>
