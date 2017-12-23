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

<h5>Nouvelle consommation pour </h5>
<h5> Nom Prenom 1</h5>

<p> Contenu de la consommation </p>

<form class="" action="index.html" method="post">
  <table class='striped'>
    <thead>
      <tr>
        <th></th>
        <th>produit</th>
        <th>prix unitaire</th>
        <th>quantité</th>
        <th>prix total</th>
      </tr>
    </thead>

    <tbody>
        <tr>
          <td>
              <i class="material-icons"> remove_circle </i>
          </td>
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
            </select>
          </td>
          <td>
            xxxxxxxxx
          </td>
          <td>
            <input type="number" name="qqtprodx" value="" min="0" class="smallPicker">
          </td>
          <td>
            xxxxxxxxx
          </td>
        </tr>
        <tr>
          <td>
              <i class="material-icons"> remove_circle </i>
          </td>
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
            </select>
          </td>
          <td>
            xxxxxxxxx
          </td>
          <td>
            <input type="number" name="qqtprodx" value="" min="0" class="smallPicker">
          </td>
          <td>
            xxxxxxxxx
          </td>
        </tr>
        <tr>
          <td>
          </td>
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
            </select>
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <p> Prix total de la consommation xx.xx€ </p>
    <button class="waves-effect waves-light btn btn-spaced" name="button"> Valider la consommation </button>
</form>
