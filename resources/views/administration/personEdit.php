<div class="left-border">
  <div class="icon-centered">
   <i class="material-icons"> build </i> Administration du site
  </div>
  <div class="icon-centered borderedTopBottom">
   <i class="material-icons tiny"> lens </i> <a href="<?=action("UsersController@launchPersonSearch")?>"> gérer les utilisateurs </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@launchProductSearch")?>"> gérer les produits </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@displayLogs")?>"> historique des alertes de stock </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("PurchasesController@initDbReinitialiser")?>"> réinitialiser la base </a>
  </div>
</div>


<h3>Gestion de l'utilisateur </h3>

<form class="" action="index.html" method="post">
  <div class="input-field">
      <input id="email" type="email" class="validate"
      <?php
        if(isset($managed))
        {
          echo"value=\"". $managed->email ."\">";
        }
        else
        {
          echo "value=\"\">";
        }
      ?>
      <label for="email" data-error="wrong" data-success="right"> Adresse Mail</label>
  </div>
  <div class="input-field">
      <input id="phone" type="text" class="validate"
      <?php
        if(isset($managed))
        {
          echo"value=\"". $managed->phone ."\">";
        }
        else
        {
          echo "value=\"\">";
        }
      ?>
      <label for="phone"> Numero de telephone </label>
  </div>
  <div class="input-field">
      <input id="password" type="password" class="validate">
      <label for="password"> Mot de passe (entrer un mot de passe pour le changer) </label>
  </div>
  <div class="input-field">
      <input id="privilegeInput" type="number" class="validate" min="0" max="2"
      <?php
        if(isset($managed))
        {
          echo"value=\"". $managed->privilege ."\">";
        }
        else
        {
          echo "value=\"\">";
        }
      ?>
      <label for="privilegeInput"> Privilège </label>
  </div>
</form>

<h5>Enfants associés enregistrés</h5>

<form class="" action="index.html" method="post">
  <table>
    <thead>
      <tr>
        <th></th>
        <th> prenom </th>
        <th> nom de famille </th>
        <th> date de naissance </th>
        <th> categorie </th>
        <th> solde </th>
        <th> </th>
      </tr>
    </thead>
    <tbody>

        <?php
              if(isset($childrenRelated[0]))
              {
                foreach ($childrenRelated as $child)
                {
                  echo "<tr>";
                  echo "<td> <i class=\"material-icons\"> remove_circle </i></td>";
                  echo "<td> <input type=\"text\" name=\"prenomInput\" value=\"$child->name\"> </td>";
                  echo "<td> <input type=\"text\" name=\"nomInput\" value=\"$child->lastName\"></td>";
                  echo "<td> <input type=\"text\" name=\"dateInput\" value=\"$child->birthDate\" class=\"datepicker\"></td>";
                  echo "<td> ".$child->getCategory()->name." </td>";
                  echo "<td> ".$child->getBalance()." </td>";
                  if($child->getBalance()!=0)
                  {
                    echo "<td> <button type=\"button\" name=\"solder\" class=\"waves-effect waves-light btn\"> Solder </button> </td>";
                  }
                  echo "</tr>";
                }
                echo "<tr>";
                echo "<td></td>";
                echo "<td> <input type=\"text\" name=\"prenomInput\" value=\"\"> </td>";
                echo "<td> <input type=\"text\" name=\"nomInput\" value=\"\"></td>";
                echo "<td> <input type=\"text\" name=\"dateInput\" value=\"\" class=\"datepicker\"></td>";
                echo "</tr>";
              }
              else
              {
                echo "<tr>";
                echo "<td> <input type=\"text\" name=\"prenomInput\" value=\"\"> </td>";
                echo "<td> <input type=\"text\" name=\"nomInput\" value=\"\"></td>";
                echo "<td> <input type=\"text\" name=\"dateInput\" value=\"\" class=\"datepicker\"></td>";
                echo "</tr>";
              }
        ?>
    </tbody>
  </table>
  <input class="waves-effect waves-light btn" type="submit" name="valider" value="Enregistrer">
</form>
