<div class="left-border">
   <p> Administration du site </p>
   <p>gérer les utilisateurs</p>
   <p>gérer les produits</p>
   <p>historique des alertes de stock</p>
   <p>réinitialiser la base</p>
</div>

<h3> Gestion du produit </h3>

<form class="" action="index.html" method="post">
  <div class="input-field">
      <input id="productName" type="text" value="">
      <label for="productName"> Nom du produit </label>
  </div>
  <div class="input-field">
      <input id="productPrice" type="number" min="00.00" step="00.01">
      <label for="productName"> Prix du produit </label>
  </div>
  <div class="input-field">
      <input id="productMinQuantity" type="number" value="" min="0">
      <label for="productName"> Quantité minimale a avoir en stock </label>
  </div>

  <h5> Gstion des composants </h5>
  <table class="striped">
    <thead>
      <tr>
        <th></th>
        <th> nom </th>
        <th> quantité </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td> <i class="material-icons"> remove_circle </i> </td>
        <td>
           <select class="browser-default" name="productPicker">
            <option value="" disabled selected> selectionnez un produit </option>
              <optgroup label="Produits Simples">
                <option value="sucette">sucette</option>
                <option value="painChoco">pain au chocolat</option>
                <option value="can">canette au choix</option>
              </optgroup>
              <optgroup label="Produits composés">
                <option value="menu1">Menu1</option>
                <option value="menu 2">Menu 2</option>
                <option value="painBarChoc">pain avec barette de chocolat</option>
              </optgroup>
          </td>
          <td>
            <div class="input-field">
              <input type="number" name="prodQuantity" value="" min="0">
            </div>
          </td>
      </tr>
    </tbody>
  </table>
  
  <input type="submit" value="Enregistrer le produit" class="waves-effect waves-light btn btn-spaced borderedContent">
</form>
