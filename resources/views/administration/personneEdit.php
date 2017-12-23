<div class="left-border">
   <p> Administration du site </p>
   <p>gérer les utilisateurs</p>
   <p>gérer les produits</p>
   <p>historique des alertes de stock</p>
   <p>réinitialiser la base</p>
</div>

<h3>Gestion de l'utilisateur </h3>

<form class="" action="index.html" method="post">
  <label for="mailInpt">Email:</label>
  <input type="text" name="mailInpt" value="">
  <label for="phoneInpt">Phone:</label>
  <input type="text" name="phoneInpt" value="">
  <label for="passwordInpt">Password:</label>
  <input type="text" name="passwordInpt" value="">
  <label for="privilegeInpt">Privilege:</label>
  <input type="number" name="privilegeInpt" value="" min="0" max="2">
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
