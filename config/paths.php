<?php
/**
 * Path Configuration for Turtlers Academy
 * This file defines all important paths for the application
 * Works for both local development and cPanel hosting
 */

// Define root directory
define('ROOT_DIR', __DIR__ . '/..');

// Define base URL (works for both local and production)
if (empty($_SERVER['HTTP_HOST'])) {
    // CLI/Development
    define('BASE_URL', 'http://localhost/Turtlers-Academy/public/');
} else {
    // Web request
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    
    // Remove /public or other paths and build clean base URL
    if (strpos($host, 'turtlers.akibhasan.me') !== false) {
        define('BASE_URL', $protocol . $host . '/');
    } else {
        define('BASE_URL', $protocol . $host . '/Turtlers-Academy/public/');
    }
}

// Define path constants
define('APP_DIR', ROOT_DIR . '/app');
define('CONTROLLERS_DIR', APP_DIR . '/controllers');
define('MODELS_DIR', APP_DIR . '/models');
define('VIEWS_DIR', APP_DIR . '/views');
define('CORE_DIR', ROOT_DIR . '/core');
define('PUBLIC_DIR', ROOT_DIR . '/public');
define('ASSETS_DIR', PUBLIC_DIR . '/assets');
define('UPLOAD_DIR', ASSETS_DIR . '/upload');
define('LESSON_DIR', ASSETS_DIR . '/lesson');
define('RESOURCES_DIR', ASSETS_DIR . '/uploads/resources');

// Define asset URLs
define('ASSETS_URL', BASE_URL . 'assets/');
define('CSS_URL', ASSETS_URL . 'css/');
define('JS_URL', ASSETS_URL . 'js/');
define('IMG_URL', ASSETS_URL . 'images/');
define('UPLOAD_URL', ASSETS_URL . 'upload/');
define('LESSON_URL', ASSETS_URL . 'lesson/');

?>
