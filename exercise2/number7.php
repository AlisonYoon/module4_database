<?php

if(isset($_GET['f_color'])) {

$db = new PDO('mysql:host=192.168.20.20; dbname=ex2', 'root', '');
$db->setAttribute(
   PDO::ATTR_DEFAULT_FETCH_MODE,
   PDO::FETCH_ASSOC
);

$favClrToGet = $_GET['f_color'];

$favClr = $db->prepare('SELECT `id` FROM `children` WHERE `f_color` =:f_color');
$favClr->bindParam('f_color', $favClrToGet, PDO::PARAM_STR);
$favClr->execute();
$childId = $favClr->fetch();

var_dump($childId);


}

?>

<html>
<body>

<form action="number7.php" method="get">
    <label for="f_color">Favorite color (1~11)</label>
    <input type="text" name="f_color">
    <input type="submit">
</form>
</body>
</html>