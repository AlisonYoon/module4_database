<?php

if(isset($_GET['name']) && isset($_GET['dob']) && isset($_GET['gender'])) {
    $db = new PDO('mysql:host=192.168.20.20; dbname=ex2', 'root', '');
    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    $nameToAdd = $_GET['name'];
    $dobToAdd = $_GET['dob'];
    $genderToAdd = $_GET['gender'];

    echo $nameToAdd;
    echo '<br>';
    echo $dobToAdd;
    echo '<br>';
    echo $genderToAdd;
    echo '<br>';

    $sql = $db->prepare('INSERT INTO `adults` (`name`, `DOB`, `gender`) VALUES (:name , :dob , :gender);');
    $sql->bindParam('name', $nameToAdd, PDO::PARAM_STR);
    $sql->bindParam('dob', $dobToAdd, PDO::PARAM_STR);
    $sql->bindParam('gender', $genderToAdd, PDO::PARAM_STR);

    $sql->execute();


    //$results = $sql->fetch();    // INSERT INTO  doesn't get data from db so nothing to fetch.


    //var_dump($results);
}
?>

<html>
<body>
<p>Add a person in the table</p>
<form action="number5.php" method="get">
    <label for="name">Name</label>
    <input type="text" name="name">
    <label for="dob">Date of Birth(yyyy-mm-dd)</label>
    <input type="text" name="dob">
    <label for="gender">Gender(f/m)</label>
    <input type="text" name="gender">
    <input type="submit">
</form>
</body>
</html>
