<?php

if(isset($_GET['id']) && isset($_GET['newname']))
$db = new PDO('mysql:host=192.168.20.20; dbname=exercise set 2','root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$db->beginTransaction();
$id= $_GET['id'];
$newName = $_GET['newname'];

$getName = $db->prepare('SELECT `name` FROM `adults` WHERE `id`=:id');
$getName->bindParam('id', $id, PDO::PARAM_INT);
$getName->execute();
$getNameResult= $getName->fetch();

$changeName = $db->prepare('UPDATE `adults` SET `name`=:newName WHERE id=:id');
$changeName->bindParam('newName', $newName, PDO::PARAM_STR);
$changeName->bindParam('id', $id, PDO::PARAM_INT);
$changeName->execute();

$db->commit();

var_dump($getNameResult);


?>

<html>

<body>
<form action="transaction_ex.php" method="get">
    <p>Search for a user name</p>
    <input type="text" name="id">
    <input type="submit">

    <p>Search for a user email</p>
    <input type="text" name="newname">
    <input type="submit">

</form>
</body>
</html>
