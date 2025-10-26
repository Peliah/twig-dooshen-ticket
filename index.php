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
            'title' => 'DST - Support Ticket Management System',
            'features' => [
                [
                    'icon' => 'ticket',
                    'title' => 'Comprehensive Ticket Management',
                    'description' => 'Create, assign, and track support tickets with our intuitive dashboard. Manage ticket lifecycle from creation to resolution with powerful tools.'
                ],
                [
                    'icon' => 'shield',
                    'title' => 'Secure & Reliable',
                    'description' => 'Enterprise-grade security ensures all ticket data is protected. Your customer information and support history are safe with our encrypted platform.'
                ],
                [
                    'icon' => 'smartphone',
                    'title' => 'Mobile Optimized',
                    'description' => 'Access your ticket management system anywhere, anytime. Our responsive design works perfectly on all devices for on-the-go support.'
                ],
                [
                    'icon' => 'clock',
                    'title' => 'Real-time Updates',
                    'description' => 'Get instant notifications about new tickets, status changes, and customer responses. Stay connected with your support team.'
                ],
                [
                    'icon' => 'users',
                    'title' => 'Team Collaboration',
                    'description' => 'Assign tickets to team members, track workload, and collaborate effectively. Built-in communication tools for seamless teamwork.'
                ],
                [
                    'icon' => 'bar-chart-3',
                    'title' => 'Analytics & Reporting',
                    'description' => 'Comprehensive analytics help you understand support trends, team performance, and customer satisfaction. Make data-driven decisions.'
                ]
            ]
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
