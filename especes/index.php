<?php

require_once 'model-especes.php';



$especesId = Especes::getId();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Router Test</title>
</head>
<body>

<!-- Form to test GET All Circuits -->
<form action="router-especes.php" method="post">
    <input type="hidden" name="test_action" value="GET_ALL">
    <button type="submit">GET All Especes</button>
</form>

<!-- Form to test GET Circuit by ID -->
<form action="router-especes.php" method="post">
    <input type="hidden" name="test_action" value="GET_BY_ID">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">GET Especes by ID</button>
</form>

<!-- Form to test CREATE Circuit -->
<form action="router-especes.php" method="post">
    <input type="hidden" name="test_action" value="CREATE">
    <!-- Include JSON data for POST -->
    espece :<input type="text" name="espece" value="" placeholder="espece">
    image :<input type="text" name="image" value="" placeholder="image">
    type :<input type="text" name="type" value="" placeholder="type">
    <button type="submit">CREATE Especes</button>
</form>

<!-- Form to test UPDATE Circuit -->
<form action="router-especes.php" method="post">
    <input type="hidden" name="test_action" value="UPDATE">
    <select id="update_id" name="id">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($especesId as $row) {
                echo '<option value="' . $row['idType'] . '">' . $row['idType'] . '</option>';
            }
        ?>
    </select>
    <!-- Include JSON data for PUT -->
    espece :<input type="text" name="espece" value="" placeholder="title">
    image :<input type="text" name="image" value="" placeholder="subTitle">
    type :<input type="text" name="type" value="" placeholder="icon">
    <button type="submit">UPDATE Especes</button>
</form>

<!-- Form to test DELETE Circuit -->
<form action="router-especes.php" method="post">
    <input type="hidden" name="test_action" value="DELETE">
    <input type="text" name="id" placeholder="Especes ID">
    <button type="submit">DELETE Especes</button>
</form>

</body>
</html>
