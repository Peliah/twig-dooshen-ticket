<?php
require_once 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Create Twig environment
$loader = new FilesystemLoader('templates');
$twig = new Environment($loader, [
    'cache' => 'cache',
    'debug' => true,
]);

// Simple routing
$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);

// Remove leading slash and get path segments
$path = trim($path, '/');
$segments = $path ? explode('/', $path) : ['home'];

// Route handling
switch ($segments[0]) {
    case 'dst':
    case 'dst-landing':
    case 'home':
    case '':
        $template = 'dst_landing.html.twig';
        $data = [
            'title' => 'DST - Support Ticket Management System'
        ];
        break;
        
    default:
        $template = 'dst_landing.html.twig';
        $data = [
            'title' => 'DST - Support Ticket Management System'
        ];
        break;
}

// Render the template
try {
    echo $twig->render($template, $data);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
