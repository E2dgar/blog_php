<?php
function redirectUser(string $location): void {
   header('Location: ' . $location);
}