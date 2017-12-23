<div class="left-border">
   <p> gestion du stock </p>
   <p>consulter les stocks des produits</p>
   <p>enregistre un achat</p>
   <p>hystorique des achats</p>
</div>

<h5> Achat de produit </h5>

<form class="" action="index.html" method="post">
  <label for="dateInput"> Date d'achat </label>
  <input type="date" name="dateInput" value="">
  <label for="priceInput"> Prix total de l'achat </label>
  <input type="number" name="" value="00.00" min="0" step="0.01">

  <table class="striped">
    <thead>
      <tr>
        <th> produit </th>
        <th> quantité </th>
      </tr>
    </thead>
    <tbody>
      <tr>
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
          <input type="number" name="" value="00" min="0" step="1">
        </td>
      </tr>

      <tr>
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
          <input type="number" name="" value="00" min="0" step="1">
        </td>
      </tr>
      <tr>
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
        </td>
      </tr>
    </tbody>
  </table>

  <button value="" class="waves-effect waves-light btn btn-spaced"> Valider L'insertion </button>

</form>
