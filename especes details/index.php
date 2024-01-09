<?php

require_once 'model-especesdetails.php';



$especes = EspecesDetails::getId();

$especesdetailsItems = EspecesDetails::getIddetails();
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
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="GET_ALL">
    <button type="submit">GET All EspecesDetails</button>
</form>

<!-- Form to test GET Circuit by ID -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="GET_BY_ID">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">GET EspecesDetails by ID</button>
</form>

<!-- Form to test CREATE Circuit -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="CREATE">
    <select id="created_id" name="idType">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($especes as $row) {
                echo '<option value="' . $row['idType'] . '">' . $row['idType'] . '</option>';
            }
        ?>
    </select>
    <!-- Include JSON data for POST -->
    name :<input type="text" name="name" value="" placeholder="name">
    desc :<input type="text" name="desc" value="" placeholder="desc">
    subDesc :<input type="text" name="subDesc" value="" placeholder="subDesc">
    image :<input type="file" name="image" value="" placeholder="image">
    color :<input type="text" name="color" value="" placeholder="color">
    <button type="submit">CREATE EspecesDetails</button>
</form>

<!-- Form to test UPDATE Circuit -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="UPDATE">
    <select id="update_id" name="id">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($especesdetailsItems as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
            }
        ?>
    </select>
    <!-- Include JSON data for PUT -->
    <select id="update_id" name="idType">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($especes as $row) {
                echo '<option value="' . $row['idType'] . '">' . $row['idType'] . '</option>';
            }
        ?>
    </select>
    name :<input type="text" name="name" value="" placeholder="name">
    desc :<input type="text" name="desc" value="" placeholder="desc">
    subDesc :<input type="text" name="subDesc" value="" placeholder="subDesc">
    image :<input type="file" name="image" value="" placeholder="Image">
    color :<input type="text" name="color" value="" placeholder="color">
    <button type="submit">UPDATE EspecesDetails</button>
</form>

<!-- Form to test DELETE Circuit -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="DELETE">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">DELETE EspecesDetails</button>
</form>
<br>
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="MERGE">
    <button type="submit">GET MERGE EspecesDetails</button>
</form>

</body>
</html>
