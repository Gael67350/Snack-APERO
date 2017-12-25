<h5>Consommations</h5>
<h5> choisissez l'enfant dont il faut gérer les consommations :</h5>

<div class="input-field">
<input id="searchedText" type="text">
<label for="searchedText">
  <div class="iconCentered">
        <i class="material-icons tiny"> search </i> nom/prenom de l'enfant recherché
  </div>
</label>
</div>
<table class="striped">
  <thead>
    <tr>
      <th>Nom </th>
      <th>Prenom</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($childs as $child)
      {
        echo "<tr> ";
        echo "<td> <a href=\"".action("ChildsController@openChildManager",["id" => $child->id_child])."\"> ".$child->name." </a> </td>";
        echo "<td> <a href=\"".action("ChildsController@openChildManager",["id" => $child->id_child])."\">".$child->lastName."</a> </td>";
        echo "</a> </tr>";
      }
    ?>
  </tbody>
</table>
