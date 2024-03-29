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

<h3> Gestion du produit </h3>

<form class="" action="index.html" method="post">
  <div class="input-field">
      <?= Form::open(/*a définir*/) ?>
      <?php
        if(isset($product))
        {
          echo Form::text('productName', $product->name );
        }
        else
        {
          echo Form::text('productName');
        }
      ?>
      <?=Form::label('productName', 'Nom du produit');?>
  </div>
  <div class="input-field">
       <?php
        if(isset($product))
        {
          echo Form::number('price', $product->price ,['min' => "00.00", 'step' => "00.01"]);
        }
        else
        {
          echo Form::number('price' , "" ,['min' => "00.00", 'step' => "00.01"]);
        }
      ?>
      <?=Form::label('price', ' Prix du produit');?>
  </div>
  <div class="input-field">
      <input id="productMinQuantity" type="number" min="0"
      <?php
        if(isset($product))
        {
          echo Form::number('minQuantityStock', $product->minQuantity ,['min' => "0"]);
        }
        else
        {
          echo Form::number('minQuantityStock',"" ,['min' => "0"]);
        }
      ?>
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
      <?php
        if(isset($components[0]))
        {
          foreach ($components as $component)
          {
            echo "<tr>
                  <td> <i class=\"material-icons\"> remove_circle </i> </td>
                  <td>
                   <select class=\"browser-default\" name=\"productPicker\" value=\"".$component->name."\">
                   <option value=\".$component->name.\" disabled selected>".$component->name." </option>
                     <optgroup label=\"Produits Simples\">";
                     foreach ($productListUncomposed as $product)
                     {
                       echo "<option value=\"".$product->name."\">$product->name</option>";
                     }
                    echo" </optgroup>
                     <optgroup label=\"Produits composés\">";
                     foreach ($productListComposed as $product)
                     {
                       echo "<option value=\"".$product->name."\">$product->name</option>";
                     }
                     echo"</optgroup>
                     </td>
                     <td>
                     <div class=\"input-field\">
                       <input type=\"number\" name=\"prodQuantity\" value=\"$component->quantity\" min=\"0\">
                     </div>
                   </td>
                 </tr>";
          }
          //affichage supplémentaire pour ajouter un élément
          echo "<tr>
                <td> <i class=\"material-icons\"> remove_circle </i> </td>
                <td>
                 <select class=\"browser-default\" name=\"productPicker\">
                   <option value=\"\" disabled selected> selectionnez un produit </option>
                   <optgroup label=\"Produits Simples\">";
                   foreach ($productListUncomposed as $product)
                   {
                     echo "<option value=\"".$product->name."\">$product->name</option>";
                   }
                 echo" </optgroup>
                   <optgroup label=\"Produits composés\">";
                   foreach ($productListComposed as $product)
                   {
                     echo "<option value=\"".$product->name."\">$product->name</option>";
                   }
                   echo"</optgroup>
                   </td>
                   <td>
                   <div class=\"input-field\">
                     <input type=\"number\" name=\"prodQuantity\" value=\"\" min=\"0\">
                   </div>
                 </td>
               </tr>";
        }
        else
        {
           echo "<tr>
                 <td> <i class=\"material-icons\"> remove_circle </i> </td>
                 <td>
                  <select class=\"browser-default\" name=\"productPicker\">
                    <option value=\"\" disabled selected> selectionnez un produit </option>
                    <optgroup label=\"Produits Simples\">";
                    foreach ($productListUncomposed as $product)
                    {
                      echo "<option value=\"".$product->name."\">$product->name</option>";
                    }
                  echo" </optgroup>
                    <optgroup label=\"Produits composés\">";
                    foreach ($productListComposed as $product)
                    {
                      echo "<option value=\"".$product->name."\">$product->name</option>";
                    }
                    echo"</optgroup>
                    </td>
                    <td>
                    <div class=\"input-field\">
                      <input type=\"number\" name=\"prodQuantity\" value=\"\" min=\"0\">
                    </div>
                  </td>
                </tr>";
        }
      ?>

    </tbody>
  </table>

  <input type="submit" value="Enregistrer le produit" class="waves-effect waves-light btn btn-spaced borderedContent">
</form>
