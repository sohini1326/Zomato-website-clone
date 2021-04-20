<?php

// to destroy the session, we first need to start it
session_start();

session_destroy();

header('Location:index.php');

?>