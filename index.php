<?php
// index.php

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
    <button type="submit">GET All Circuits</button>
</form>

<!-- Form to test GET Circuit by ID -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="GET_BY_ID">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">GET Circuit by ID</button>
</form>

<!-- Form to test CREATE Circuit -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="CREATE">
    <!-- Include JSON data for POST -->
    <textarea name="data" placeholder="JSON Data"></textarea>
    <button type="submit">CREATE Circuit</button>
</form>

<!-- Form to test UPDATE Circuit -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="UPDATE">
    <input type="text" name="id" placeholder="Circuit ID">
    <!-- Include JSON data for PUT -->
    <textarea name="data" placeholder="Updated JSON Data"></textarea>
    <button type="submit">UPDATE Circuit</button>
</form>

<!-- Form to test DELETE Circuit -->
<form action="router.php" method="post">
    <input type="hidden" name="test_action" value="DELETE">
    <input type="text" name="id" placeholder="Circuit ID">
    <button type="submit">DELETE Circuit</button>
</form>

</body>
</html>
