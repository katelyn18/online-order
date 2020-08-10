<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>Simple Eats</title>
        <link rel="stylesheet" href="styles/home.css?<?php echo time(); ?>">
        <link rel="icon" type="image/png" href="img/favicon.png">
</head>
<body>
    <h1>EMPLOYEES OF SIMPLE EATS</h1>
    <form action="includes/employee.inc.php" method="post">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="employee_submit">Login</button>
    </form>
</body>
<?php
    require "footer.php";
?>