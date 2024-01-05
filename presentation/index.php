<?php

require_once 'model-presentation.php';



$presentationId = Presentation::getId();
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
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="GET_ALL">
    <button type="submit">GET All Presentation</button>
</form>

<!-- Form to test GET Circuit by ID -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="GET_BY_ID">
    <input type="text" name="id" placeholder="Localisation ID">
    <button type="submit">GET Presentation by ID</button>
</form>

<!-- Form to test CREATE Circuit -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="CREATE">
    <!-- Include JSON data for POST -->
    title :<input type="text" name="title" value="" placeholder="title">
    subtitle :<input type="text" name="subtitle" value="" placeholder="subtitle">
    description :<input type="text" name="description" value="" placeholder="description">
    image :<input type="text" name="image" value="" placeholder="image">
    <button type="submit">CREATE Presentation</button>
</form>

<!-- Form to test UPDATE Circuit -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="UPDATE">
    <select id="update_id" name="id">
        <!-- Populate the options dynamically based on the fetched IDs -->
        <?php
            foreach ($presentationId as $row) {
                echo '<option value="' . $row['id'] . '">' . $row['id'] . '</option>';
            }
        ?>
    </select>
    <!-- Include JSON data for PUT -->
    title :<input type="text" name="title" value="" placeholder="title">
    subtitle :<input type="text" name="subtitle" value="" placeholder="subtitle">
    description :<input type="text" name="description" value="" placeholder="description">
    image :<input type="text" name="image" value="" placeholder="image">
    <button type="submit">UPDATE Presentation</button>
</form>

<!-- Form to test DELETE Circuit -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="DELETE">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">DELETE Presentation</button>
</form>

</body>
</html>
