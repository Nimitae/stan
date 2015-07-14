<?php

include('header.partial.php');
?>

<form method="post" action="userservices.php" onsubmit="register();return false;">
    <input type="text" name="email" id="email" placeholder="email">
    <input type="password" name="password" id="password" placeholder="password">
    <input type="password" name="repeat" id="repeat" placeholder="repeat password">
    <input type="submit">
</form>
