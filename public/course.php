<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../app/controllers/courseController.php";
