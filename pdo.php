<?php
//PDO - PHP library that allows us to interact with database

if(isset($_GET['id'])) {
    $db = new PDO('mysql:host=192.168.20.20; dbname=pets', 'root', '');
    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC);   // as a default, PDO will give both indexed, associative array. so we set attribute to make it not to do that.

    $idToSearchFor= $_GET['id'];

    //$sql = 'SELECT * FROM `adults`';
    //$sql = 'SELECT * FROM `adults` WHERE id=' . $idToSearchFor . ';';
    $sql = $db->prepare('SELECT * FROM `adults` WHERE id=' . $idToSearchFor . ';');  //   prepare will see if it's "good" database or not.
    $results = $sql->execute();    //   execute will then give the result what prepare filtered.

    //you can also do it like this, but if there are like 5 question marks, then it's difficult so see which ? is what.
    //$sql = $db->prepare('SELECT * FROM `adults` WHERE id=?;');
    //$sql->execute([$idToSearchFor]);

    //you can also do it like this:
    //$sql = $db->prepare('SELECT * FROM `adults` WHERE id=:id;');   //this makes it associative array
    //$sql->execute(['id'=>$idToSearchFor]);  //now it's getting it from associative array

    //you can also do it like this:
    //$sql = $db->prepare('SELECT * FROM `adults` WHERE id=:id;');
    //$sql->bindParam('id', $idToSearchFor, PDO::PARAM_INT)    // you can do type hinting this way.(PDO::PARAM_INT is the hint). It will see if it's good param or not.
    //$sql->execute();

    //$sql->bindValue('id', 4, PDO::PARAM_INT);    //id is parameter, 4 is value. This will only give you id 4 as result no matter what the input is.

    $results = $sql->fetch();






    //$query = $db->query($sql);   //use query method on $db, we don't need to know what query() returns.

//    for($x=0; $x<4; $x++) {
//        var_dump($result = $query->fetch());   //fetch grabs the first one. If you call fetch() again, it will grab the second one.
//        echo'<br>';
//        echo'<br>';
//    }

    //$results = $query->fetchAll();  //we use what query() returns at-> fetchAll(). This one returns an associative array. It grabs everything

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
