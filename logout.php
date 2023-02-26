<?php
session_start();
require_once ('includes/functions/redirectUser.php');

unset($_SESSION['connected']);

redirectUser('index.php');


