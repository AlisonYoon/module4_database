<?php
//PDO - PHP library that allows us to interact with database

if(isset($_GET['id'])) {
    $db = new PDO('mysql:host=192.168.20.20; dbname=pets', 'root', '');
    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC);   // as a default, PDO will give both indexed, associative array. so we set attribute to make it not to do that.

    $id= $_GET['id'];

    //$sql = 'SELECT * FROM `adults`';
    $sql = 'SELECT * FROM `adults` WHERE id=' . $id . ';';

    $query = $db->query($sql);   //use query method on $db, we don't need to know what query() returns.

    for($x=0; $x<4; $x++) {
        var_dump($result = $query->fetch());   //fetch grabs the first one. If you call fetch() again, it will grab the second one.
        echo'<br>';
        echo'<br>';
    }

    $results = $query->fetchAll();  //we use what query() returns at-> fetchAll(). This one returns an associative array. It grabs everything

    var_dump($results);
}


?>

<html>
<body>
<form action="pdo.php" method="get">
    <input type="text" name="id">
    <input type="submit">
</form>
</body>
</html>
