<div class="left-border">
  <div class="icon-centered">
   <i class="material-icons"> person </i> gestion des consommations de <?=$managed->name?> <?=$managed->lastName?>
  </div>
  <div class="icon-centered borderedTopBottom">
   <i class="material-icons tiny"> lens </i> <a href= <?= action("ChildsController@openChildManager" , ['id' => $_GET['id']]) ?> > insérer une nouvelle consommation </a>
  </div>
   <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href= <?=action("ConsumptionsController@showExistingConsumption" , ['id' => $_GET['id']]) ?> >Supresion d'une consommation existante </a>
  </div>
    <div class="icon-centered borderedTopBottom">
     <i class="material-icons tiny"> lens </i> <a href= "#"> approvisionner le compte </a>
   </div>
</div>

<h5>Nouvelle recharge pour</h5>
<h5><?=$managed->name?> <?=$managed->lastName?></h5>

  <?= Form::open(['url' => 'consumption/insInflow/validate']) ?>
  <div class="input-field">
    <?= Form::number('amount') ?>
    <?= Form::label('amount', 'Montant de la recharge') ?>
  </div>
  <?= Form::hidden('id' , $_GET['id'])?>

  <?= Form::submit('Enregistrer l\'approvisionnement' , ['class' => 'waves-effect waves-light btn']) ?>
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
        if($inflow->transactionDate == date('Y-m-d'))
        {
          echo"<td> <i class=\"material-icons\"> remove_circle </i> </td>";
        }
        else
        {
          echo"<td></td>";
        }
        echo "<td>".$inflow->transactionDate."</td>";
        echo "<td>".$inflow->amount."</td>";
      }
      echo"</tr>";
      ?>
  </tbody>
</table>
