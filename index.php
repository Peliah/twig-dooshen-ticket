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

// Simple localStorage-based "database" (stored in sessions)
session_start();
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// Parse URL for segments
$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);
$path = trim($path, '/');
$segments = $path ? explode('/', $path) : ['home'];

// Handle AJAX requests for auth operations
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    header('Content-Type: application/json');
    
    if ($segments[0] === 'auth' && isset($segments[1]) && $segments[1] === 'login') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                // Set cookie
                $sessionData = json_encode([
                    'user' => [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email']
                    ],
                    'timestamp' => time()
                ]);
                
                setcookie('ticketapp_session', $sessionData, time() + (86400 * 30), '/', '', false, true); // 30 days, httpOnly for security
                
                echo json_encode([
                    'success' => true,
                    'user' => [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email']
                    ]
                ]);
                exit;
            }
        }
        
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        exit;
    }
    
    if ($segments[0] === 'auth' && isset($segments[1]) && $segments[1] === 'register') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        
        if ($password !== $confirm_password) {
            echo json_encode(['success' => false, 'message' => 'Passwords do not match']);
            exit;
        }
        
        // Check if user exists
        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] === $email) {
                echo json_encode(['success' => false, 'message' => 'Email already exists']);
                exit;
            }
        }
        
        // Create new user
        $newUser = [
            'id' => uniqid(),
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        
        $_SESSION['users'][] = $newUser;
        
        // Set cookie
        $sessionData = json_encode([
            'user' => [
                'id' => $newUser['id'],
                'name' => $newUser['name'],
                'email' => $newUser['email']
            ],
            'timestamp' => time()
        ]);
        
        setcookie('ticketapp_session', $sessionData, time() + (86400 * 30), '/', '', false, true); // 30 days, httpOnly for security
        
        echo json_encode([
            'success' => true,
            'user' => [
                'id' => $newUser['id'],
                'name' => $newUser['name'],
                'email' => $newUser['email']
            ]
        ]);
        exit;
    }
}

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
        
    case 'auth':
        $template = 'auth.html.twig';
        $data = [
            'title' => 'Authentication - DST',
            'mode' => $_GET['mode'] ?? 'login',
            'hide_nav' => true,
            'hide_footer' => true
        ];
        break;
        
    case 'dashboard':
        // Store session data in cookies for server-side protection
        $sessionCookie = isset($_COOKIE['ticketapp_session']) ? $_COOKIE['ticketapp_session'] : null;
        
        // If no session cookie, show a simple page that redirects client-side
        if (!$sessionCookie) {
            $template = 'auth.html.twig';
            $data = [
                'title' => 'Authentication - DST',
                'mode' => $_GET['mode'] ?? 'login',
                'hide_nav' => true,
                'hide_footer' => true
            ];
        } else {
            if (isset($segments[1]) && $segments[1] === 'tickets') {
                $template = 'dashboard/tickets.html.twig';
            } else {
                $template = 'dashboard.html.twig';
            }
            $data = [
                'title' => 'Dashboard - DST'
            ];
        }
        break;
        
    case 'logout':
        header('Location: /');
        exit;
        
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
