<?php

   if(isset($_GET['f_color'])) {

   $db = new PDO('mysql:host=192.168.20.20; dbname=ex2', 'root', '');
   $db->setAttribute(
      PDO::ATTR_DEFAULT_FETCH_MODE,
      PDO::FETCH_ASSOC
   );

   $favClrToGet = $_GET['f_color'];

   $favClr = $db->prepare('SELECT type FROM pets INNER JOIN parent_of ON pets.belongs_to = parent_of.adults_id JOIN children ON children.id = parent_of.children_id WHERE children.f_color =:f_color; ');
   $favClr->bindParam('f_color', $favClrToGet, PDO::PARAM_INT);
   $favClr->execute();
   $childId = $favClr->fetchAll();

   
   //var_dump($childId);
   foreach ($childId as $type) {
      echo $type['type'];
      echo '<br>';
   }

}

?>

<html>
<body>

<form action="number7.php" method="get">
    <label for="f_color">Favorite color (1~11)</label>
    <input type="number" name="f_color">
    <input type="submit">
</form>
</body>
</html>