<?php
session_start();

session_unset(); //takes all session variables and delete the values
session_destroy(); //destroys all the session

header("Location: ../employee.php");