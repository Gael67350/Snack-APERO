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

<h5>Nouvelle recharge pour</h5>
<h5>Nom Prenom</h5>

<form class="" action="index.html" method="post">
  <label for="ammount-input"> <h5> Montant a ajouter : </h5> </label>
  <input type="number" name="ammount-input" value="0" min="0">

  <button class="btn waves-effect waves-light" type="submit" name=""> Valider </button>
</form>

<table class="striped">
  <thead>
    <tr>
      <th> </th>
      <th> date </th>
      <th> montant </th>
    </tr>
  </thead>
  <tbody>

      <?php foreach ($inflows as $inflow)
      {
        echo"<tr>";
        if($inflow->transactionDate = date('aaaa-mm-jj'))
        {
          echo"<td> <i class=\"material-icons\"> remove_circle </i> </td>";
        }
        else
        {
          echo"<td></td>";
        }
        echo "<td>".$inflow->transactionDate."</td>";
        echo "<td>".$inflow->ammount."</td>";
      }
      echo"</tr>";
      ?>
  </tbody>
</table>
