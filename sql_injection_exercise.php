<?php
/**
 * Connect to a database with PHP
 * Output something from that database onto the front-end
 * Use a form to SAFELY return and output something on the front-end based on what was entered into the form
 */
if(isset($_GET['name'])) {


$db = new PDO('mysql:host=192.168.20.20; dbname=users','root', '');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$nameToSearchFor = $_GET['name'];

//$sql = $db->prepare('SELECT `name` FROM `users` WHERE `name` LIKE %' . $nameToSearchFor . '%;');
$sql = $db->prepare("SELECT `name`, `email` FROM `users` WHERE `name` LIKE '%{$nameToSearchFor}%'");
//$sql->bindParam('name', $nameToSearchFor, PDO::PARAM_STMT);
$results = $sql->execute();

$results = $sql->fetch();

//var_dump($results);

} elseif(isset($_GET['email'])) {
    $db = new PDO('mysql:host=192.168.20.20; dbname=users','root', '');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $emailToSearchFor = $_GET['email'];

    $sql = $db->prepare("SELECT `name`, `email` FROM `users` WHERE `email` LIKE '%{$emailToSearchFor}%'");
    $results = $sql->execute();
    $results = $sql->fetch();
}

//$dbTwo = new PDO('mysql:host=192.168.20.20; dbname=users','root', '');
//$dbTwo->setAttribute(
//    PDO::ATTR_DEFAULT_FETCH_MODE,
//    PDO::FETCH_ASSOC
//);
//
//$emailToSearchFor =

?>

<html>
<body>
<form action="sql_injection_exercise.php" method="get">
    <p>Search for a user name</p>
    <input type="text" name="name">
    <input type="submit">
    <p><?php
        if(isset($_GET['name'])){
            echo 'User : ' . $results["name"];
            echo '<br>';
            echo 'Email : ' . $results["email"];
        }
        ?></p>

    <p>Search for a user email</p>
    <input type="text" name="email">
    <input type="submit">
    <p><?php
        if(isset($_GET['email'])){
            echo 'User : ' . $results["name"];
            echo '<br>';
            echo 'Email : ' . $results["email"];
        }
        ?></p>
</form>
</body>
</html>
