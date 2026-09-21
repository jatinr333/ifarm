<?php
/**
 * Simple Router
 * 
 * Handles clean URL routing for the application.
 * This file should be used as the 404 handler in Apache or
 * as a front controller with nginx.
 */

$requestUri = $_SERVER['REQUEST_URI'];
$parseUrl = parse_url($requestUri);
$path = $parseUrl['path'];

// Remove trailing slash
$path = rtrim($path, '/');

// Route mapping
$routes = [
    '' => 'index.php',
    '/' => 'index.php',
    '/current-issues' => 'current-issues.php',
    '/archives' => 'archives.php',
    '/editorial-board' => 'editorial-board.php',
    '/submit' => 'submit.php',
    '/contact' => 'contact.php',
    '/instructions' => 'instructions.php',
    '/download' => 'download.php',
    '/portfolio' => 'portfolio/index.html',
];

// Check for exact match
if (isset($routes[$path])) {
    require __DIR__ . '/' . $routes[$path];
    exit;
}

// Check for archives with year/month
if (preg_match('#^/archives/(\d{4})/(\d{1,2})$#', $path, $matches)) {
    $_GET['year'] = $matches[1];
    $_GET['month'] = $matches[2];
    require __DIR__ . '/archives-view.php';
    exit;
}

// Check if file exists
$filePath = __DIR__ . $path;
if (is_file($filePath)) {
    // Don't serve PHP files directly for security
    $ext = pathinfo($filePath, PATHINFO_EXTENSION);
    if (in_array($ext, ['php', 'env', 'config']) || strpos(realpath($filePath), realpath(__DIR__)) !== 0) {
        http_response_code(403);
        exit('Access denied.');
    }
    
    // Serve static files
    $mimeTypes = [
        'css' => 'text/css',
        'js' => 'application/javascript',
        'html' => 'text/html; charset=utf-8',
        'json' => 'application/json; charset=utf-8',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        'pdf' => 'application/pdf',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf' => 'font/ttf',
    ];
    
    if (isset($mimeTypes[$ext])) {
        header('Content-Type: ' . $mimeTypes[$ext]);
        readfile($filePath);
        exit;
    }
}

// 404 Not Found
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | Indian Farmer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #2d5a27;
            --color-gray-100: #f3f4f6;
            --color-gray-500: #6b7280;
            --color-gray-800: #1f2937;
            --color-gray-900: #111827;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--color-gray-100);
            color: var(--color-gray-800);
        }
        
        .error-container {
            text-align: center;
            padding: 2rem;
            max-width: 500px;
        }
        
        .error-code {
            font-family: 'Merriweather', serif;
            font-size: 6rem;
            font-weight: 700;
            color: var(--color-primary);
            line-height: 1;
            margin-bottom: 1rem;
        }
        
        .error-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--color-gray-900);
        }
        
        .error-message {
            color: var(--color-gray-500);
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .error-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--color-primary);
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background 0.2s;
        }
        
        .error-link:hover {
            background: #1a3a18;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <h1 class="error-title">Page Not Found</h1>
        <p class="error-message">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <a href="/" class="error-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                <polyline points="9 22 9 12 15 12 15 22"/>
            </svg>
            Return Home
        </a>
    </div>
</body>
</html>
