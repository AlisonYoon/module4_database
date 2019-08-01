<?php

if(isset($_GET['name']) && isset($_GET['dob']) && isset($_GET['gender'])) {
    $db = new PDO('mysql:host=192.168.20.20; dbname=ex2', 'root', '');
    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );
    //Add in Adults Table
    $nameToAdd = $_GET['name'];
    $dobToAdd = $_GET['dob'];
    $genderToAdd = $_GET['gender'];
    //Add in Children Table
    $childNameToAdd = $_GET['childName'];
    $childDobToAdd = $_GET['childDob'];
    $childGenderToAdd = $_GET['childGender'];
    //Add in Parent_of Table
    $adultIDToAdd = $_GET['adultID'];
    $childIDToAdd = $_GET['childID'];
    //Add in Pets Table
    $typeToAdd = $_GET['type'];
    $belongsToToAdd = $_GET['belongsTo'];




    $sql = $db->prepare('INSERT INTO `adults` (`name`, `DOB`, `gender`) VALUES (:name , :dob , :gender);');
    $sql->bindParam('name', $nameToAdd, PDO::PARAM_STR);
    $sql->bindParam('dob', $dobToAdd, PDO::PARAM_STR);
    $sql->bindParam('gender', $genderToAdd, PDO::PARAM_STR);

    $sql->execute();

}
?>

<html>
<head>
    <style>
        body {
            font-family: sans-serif;
        }
        div {
            margin: 20px 0;
        }
        p {
            font-weight: 600;
            color: cadetblue;
        }
    </style>
</head>
<body>

<form action="number6.php" method="get">
    <p>Add an adult in the table</p>
    <div class="adult">
        <label for="name">Adult Name</label>
        <input type="text" name="name">
        <label for="dob">Adult Date of Birth(yyyy-mm-dd)</label>
        <input type="text" name="dob">
        <label for="gender">Adult Gender(f/m)</label>
        <input type="text" name="gender">
    </div>
    <p>Add a child in the table</p>
    <div class="child">
        <label for="childName">Child Name</label>
        <input type="text" name="childName">
        <label for="childDob">child Date of Birth(yyyy-mm-dd)</label>
        <input type="text" name="childDob">
        <label for="childGender">child Gender(f/m)</label>
        <input type="text" name="childGender">
    </div>
    <p>Add a parent-child relationship in the table</p>
    <div class="parent-child">
        <label for="adultID">Adult ID</label>
        <input type="number" name="adultID">
        <label for="childID">Children ID</label>
        <input type="number" name="childID">
    </div>
    <p>Add a pet in the table</p>
    <div class="pet">
        <label for="type">Pet Type</label>
        <input type="text" name="type">
        <label for="belongsTo">Belongs To (Adult Id)</label>
        <input type="number" name="belongsTo">
    </div>
    <input type="submit">
</form>
</body>
</html>
