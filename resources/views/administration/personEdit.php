<div class="left-border">
   <p> Administration du site </p>
   <p>gérer les utilisateurs</p>
   <p>gérer les produits</p>
   <p>historique des alertes de stock</p>
   <p>réinitialiser la base</p>
</div>

<h3>Gestion de l'utilisateur </h3>

<form class="" action="index.html" method="post">
  <div class="input-field">
      <input id="email" type="email" class="validate">
      <label for="email" data-error="wrong" data-success="right"> Adresse Mail</label>
  </div>
  <div class="input-field">
      <input id="phone" type="text" class="validate">
      <label for="phone" data-error="wrong" data-success="right"> Numero de telephone </label>
  </div>
  <div class="input-field">
      <input id="password" type="password" class="validate">
      <label for="password" data-error="wrong" data-success="right"> Mot de passe </label>
  </div>
  <div class="input-field">
      <input id="privilegeInput" type="number" class="validate" min="0" max="2">
      <label for="privilegeInput" data-error="wrong" data-success="right"> Privilège </label>
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
      <tr>
        <td> <i class="material-icons"> remove_circle </i></td>
        <td> <input type="text" name="prenomInput" value=""> </td>
        <td> <input type="text" name="nomInput" value=""></td>
        <td> <input type="text" name="dateInput" value="" class="datepicker"></td>
        <td> xxxxxxx </td>
        <td> xxxxxxx </td>
        <td> <button type="button" name="solder"> Solder </button> </td>
      </tr>
    </tbody>
  </table>
  <input type="submit" name="valider" value="Enregistrer">
</form>
