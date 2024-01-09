<?php

require_once 'model-circuitsdetails.php';



$circuits = CircuitDetails::getId();

$circuitsdetails = CircuitDetails::getIddetails();
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
    <button type="submit">GET All CircuitDetails</button>
</form>

<!-- Form to test GET Circuit by ID -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="GET_BY_ID">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">GET CircuitDetails by ID</button>
</form>

<!-- Form to test CREATE Circuit -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="CREATE">
    <select id="created_id" name="idCircuits">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($circuits as $row) {
                echo '<option value="' . $row['idCircuit'] . '">' . $row['idCircuit'] . '</option>';
            }
        ?>
    </select>
    <!-- Include JSON data for POST -->
    title :<input type="text" name="title" value="" placeholder="title">
    desc :<input type="text" name="desc" value="" placeholder="desc">
    tel :<input type="text" name="tel" value="" placeholder="tel">
    email :<input type="email" name="email" value="" placeholder="email">
    pinmap :<input type="text" name="pinmap" value="" placeholder="pinmap">
    image :<input type="file" name="image" value="" placeholder="image">
    <button type="submit">CREATE CircuitDetails</button>
</form>

<!-- Form to test UPDATE Circuit -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="UPDATE">
    <select id="update_id" name="id">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($circuitsdetails as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
            }
        ?>
    </select>
    <!-- Include JSON data for PUT -->
    <select id="update_id" name="idCircuits">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($circuits as $row) {
                echo '<option value="' . $row['idCircuit'] . '">' . $row['idCircuit'] . '</option>';
            }
        ?>
    </select>
    title :<input type="text" name="title" value="" placeholder="title">
    desc :<input type="text" name="desc" value="" placeholder="desc">
    tel :<input type="text" name="tel" value="" placeholder="tel">
    email :<input type="email" name="email" value="" placeholder="email">
    pinmap :<input type="text" name="pinmap" value="" placeholder="pinmap">
    image :<input type="file" name="image" value="" placeholder="image">
    <button type="submit">UPDATE CircuitDetails</button>
</form>

<!-- Form to test DELETE Circuit -->
<form action="router details.php" method="post">
    <input type="hidden" name="test_action" value="DELETE">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">DELETE CircuitDetails</button>
</form>

</body>
</html>
