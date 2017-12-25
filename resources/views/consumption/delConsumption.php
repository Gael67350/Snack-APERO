<div class="left-border">
  <div class="icon-centered">
   <i class="material-icons"> person </i> gestion des consommations de Nom Prenom
  </div>
  <div class="icon-centered borderedTopBottom">
   <i class="material-icons tiny"> lens </i>insérer une nouvelle consommation
  </div>
   <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i>Supresion d'une consommation existante
  </div>
    <div class="icon-centered borderedTopBottom">
     <i class="material-icons tiny"> lens </i>approvisionner le compte
   </div>
</div>
<?php
  echo  "<table class=\"striped\">";
    echo  "<thead>";
      echo  "<tr>";
        echo  "<th></th>";
        echo  "<th>date de consommations</th>";
        echo  "<th>Contenu de la consommation</th>";
      echo  "</tr>";
    echo  "</thead>";
    echo  "<tbody>";
    foreach ($AssociatedConsumption as $consumption)
    {
      echo"<tr>";
        if($consumption->transactionDate = date("aaaa-mm-jj"))
        {
          echo"<td> <i class=\"material_icons\"> remove_circle </i> </td>";
        }
        else
        {
          echo"<td> </td>";
        }
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
?>
