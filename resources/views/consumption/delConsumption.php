<div class="left-border">
  <div class="icon-centered">
   <i class="material-icons"> person </i> gestion des consommations de <?=$managed->name?> <?=$managed->lastName?>
  </div>
  <div class="icon-centered borderedTopBottom">
   <i class="material-icons tiny"> lens </i> <a href= <?= action("ChildsController@openChildManager" , ['id' => $_GET['id']]) ?> > insérer une nouvelle consommation </a>
  </div>
   <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href= "#" >Supresion d'une consommation existante </a>
  </div>
    <div class="icon-centered borderedTopBottom">
     <i class="material-icons tiny"> lens </i> <a href= <?= action("InflowsController@openInflows" , ['id' => $_GET['id']]) ?> > approvisionner le compte </a>
   </div>
</div>

<h5> Liste des consommations existantes pour <?=$managed->name?> <?=$managed->lastName?></h5>

<?php
  use App\Models;
  echo  "<table class=\"striped\">";
    echo  "<thead>";
      echo  "<tr>";
        echo  "<th></th>";
        echo  "<th>date de consommations</th>";
        echo  "<th>Contenu de la consommation</th>";
      echo  "</tr>";
    echo  "</thead>";
    echo  "<tbody>";
    foreach ($associatedConsumption as $consumption)
    {
      echo"<tr>";
        if($consumption->transactionDate == date("Y-m-d"))
        {
          echo"<td> <i class=\"material-icons\"> remove_circle </i> </td>";
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
