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
    $childNameToAdd1 = $_GET['child1Name'];
    $childDobToAdd1 = $_GET['child1Dob'];
    $childColorToAdd1 = $_GET['favColor1'];
    //child 2
    $childNameToAdd2 = $_GET['child2Name'];
    $childDobToAdd2 = $_GET['child2Dob'];
    $childColorToAdd2 = $_GET['favColor2'];
    //child 3
    $childNameToAdd3 = $_GET['child3Name'];
    $childDobToAdd3 = $_GET['child3Dob'];
    $childColorToAdd3 = $_GET['favColor3'];

    //Add in Pets Table
    $typeToAdd = $_GET['type'];

    
    $sql = $db->prepare('INSERT INTO `adults` (`name`, `DOB`, `gender`) VALUES (:name , :dob , :gender);');
    $sql->bindParam('name', $nameToAdd, PDO::PARAM_STR);
    $sql->bindParam('dob', $dobToAdd, PDO::PARAM_STR);
    $sql->bindParam('gender', $genderToAdd, PDO::PARAM_STR);

    $sql->execute();

    if(isset($_GET['child1Name']) && isset($_GET['child1Dob']) && isset($_GET['favColor1']) || isset($_GET['type'])) {
        //Retrieve new adult's id
        $newAdult = $db->prepare('SELECT `id` FROM `adults` ORDER BY `id` DESC LIMIT 1');
        $newAdult->execute();
        $newAdultId = $newAdult->fetch();
        $newAdultId =  $newAdultId["id"];

        //Add first child in the Children Table
        $newChild1 = $db->prepare('INSERT INTO `children` (`name`, `DOB`, `f_color`) VALUES (:child1Name, :child1Dob, :favColor1);');
        $newChild1->bindParam('child1Name', $childNameToAdd1, PDO::PARAM_STR);
        $newChild1->bindParam('child1Dob', $childDobToAdd1, PDO::PARAM_STR);
        $newChild1->bindParam('favColor1', $childColorToAdd1, PDO::PARAM_INT);

        $newChild1->execute();

        //Add a pet in the Pets Table
        $newPet = $db->prepare('INSERT INTO `pets` (`type`, `belongs_to`) VALUES (:type, :belongs_to)');
        $newPet->bindParam('type', $typeToAdd, PDO::PARAM_STR);
        $newPet->bindParam('belongs_to', $newAdultId, PDO::PARAM_INT);

        $newPet->execute();

        //Retrieve Child1's id
        $newChildAdded = $db->prepare('SELECT `id` FROM `children` ORDER BY `id` DESC LIMIT 1');
        $newChildAdded ->execute();
        $newChildId1  = $newChildAdded->fetch();
        $newChildId1  =  $newChildId1["id"];

        //Update Parent_of Table
        $parentOf1 = $db->prepare('INSERT INTO `parent_of` (`adults_id`, `children_id`) VALUES (:adults_id, :children_id);');
        $parentOf1->bindParam('adults_id', $newAdultId, PDO::PARAM_INT);
        $parentOf1->bindParam('children_id', $newChildId1, PDO::PARAM_INT);

        $parentOf1->execute();

        if(isset($_GET['child2Name']) && isset($_GET['child2Dob']) && isset($_GET['favColor2'])) {
            $newChild2 = $db->prepare('INSERT INTO `children` (`name`, `DOB`, `f_color`) VALUES (:child2Name, :child2Dob, :favColor2);');
            $newChild2->bindParam('child2Name', $childNameToAdd2, PDO::PARAM_STR);
            $newChild2->bindParam('child2Dob', $childDobToAdd2, PDO::PARAM_STR);
            $newChild2->bindParam('favColor2', $childColorToAdd2, PDO::PARAM_INT);

            $newChild2->execute();

            if(isset($_GET['child3Name']) && isset($_GET['child3Dob']) && isset($_GET['favColor3'])) {
                $newChild3 = $db->prepare('INSERT INTO `children` (`name`, `DOB`, `f_color`) VALUES (:child3Name, :child3Dob, :favColor3);');
                $newChild3->bindParam('child3Name', $childNameToAdd3, PDO::PARAM_STR);
                $newChild3->bindParam('child3Dob', $childDobToAdd3, PDO::PARAM_STR);
                $newChild3->bindParam('favColor3', $childColorToAdd3, PDO::PARAM_INT);

                $newChild3->execute();

            }
        }

    }
    
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
    <p>Add children</p>
    <div class="child1">
        <label for="child1Name">Child Name</label>
        <input type="text" name="child1Name">
        <label for="child1Dob">child Date of Birth(yyyy-mm-dd)</label>
        <input type="text" name="child1Dob">
        <label for="favColor1">child favorite color (1~11)</label>
        <input type="text" name="favColor1">
    </div>
    <div class="child2">
        <label for="child2Name">Child Name</label>
        <input type="text" name="child2Name">
        <label for="child2Dob">child Date of Birth(yyyy-mm-dd)</label>
        <input type="text" name="child2Dob">
        <label for="favColor2">child favorite color (1~11)</label>
        <input type="text" name="favColor2">
    </div>
    <div class="child3">
        <label for="child3Name">Child Name</label>
        <input type="text" name="child3Name">
        <label for="child3Dob">Child Date of Birth(yyyy-mm-dd)</label>
        <input type="text" name="child3Dob">
        <label for="favColor3">child favorite color (1~11)</label>
        <input type="text" name="favColor3">
    </div>

    <p>Add a pet</p>
    <div class="pet">
        <label for="type">Pet Type</label>
        <input type="text" name="type">
    </div>
    <input type="submit">
</form>
</body>
</html>
