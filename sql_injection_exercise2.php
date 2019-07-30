<?php
/**
 * Take an ID and a string, change the someone's name to the string,
 * output "Changed <<old name>> to <<new name>>
 *
 */

if(isset($_GET['id'])){
    $db = new PDO('mysql:host=192.168.20.20; dbname=users','root', '');
    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );
    $idToSearchFor = $_GET['id'];
    $nameToChange = $_GET['name'];

    $sql = $db->prepare('SELECT `id`, `name` FROM `users` WHERE id=:id;');
    $sql->bindParam('id', $idToSearchFor, PDO::PARAM_INT);
    $sql->execute();

    $sqlUpdate = $db->prepare('UPDATE users SET name=:name WHERE id=' . $idToSearchFor);
    $sqlUpdate->execute(['name'=>$nameToChange]);

    $results = $sql->fetch();

    var_dump($results);
}



?>

<html>
<body>
<form action="sql_injection_exercise2.php" method="get">
    <label for="id">ID</label>
    <input type="text" name="id">
    <label for="name">New Name</label>
    <input type="text" name="name">
    <input type="submit">
    <p>
        <?php
        if(isset($_GET['id'])) {
            echo 'Changed ';
            echo $results["name"];
            echo ' to ';
            }

        if(isset($_GET['name'])){
            echo $nameToChange;
            }
        ?>
    </p>
</form>
</body>
</html>
