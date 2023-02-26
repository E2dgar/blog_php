<?php
function isUserConnected() : bool {
  if(session_status() === PHP_SESSION_NONE){
    session_start();
  }
  return !empty($_SESSION['connected']);
}