<?php
/**
 * Download Handler
 * 
 * Securely handles PDF downloads with download counting.
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/Database.php';
require_once __DIR__ . '/includes/Security.php';

// Set security headers
Security::setSecurityHeaders();

// Validate ID parameter
$id = isset($_GET['id']) ? Security::sanitizeInt($_GET['id']) : 0;

if ($id <= 0) {
    http_response_code(400);
    die('Invalid request.');
}

try {
    $db = Database::getInstance();
    
    // Get article details
    $article = $db->fetchOne(
        "SELECT id, title, cname, cfile, dcount 
         FROM currentfiles 
         WHERE id = :id",
        [':id' => $id]
    );
    
    if (!$article) {
        http_response_code(404);
        die('Article not found.');
    }
    
    // Increment download count
    $db->query(
        "UPDATE currentfiles SET dcount = dcount + 1 WHERE id = :id",
        [':id' => $id]
    );
    
    // Build file path
    $filePath = UPLOAD_DIR . basename($article['cfile']);
    
    // Check if file exists
    if (!file_exists($filePath)) {
        // Try alternative path
        $altPath = __DIR__ . '/uploads/' . basename($article['cfile']);
        if (file_exists($altPath)) {
            $filePath = $altPath;
        } else {
            http_response_code(404);
            die('File not found.');
        }
    }
    
    // Verify file is within allowed directory (prevent path traversal)
    $realPath = realpath($filePath);
    $uploadDir = realpath(UPLOAD_DIR);
    
    if ($realPath === false || strpos($realPath, $uploadDir) !== 0) {
        http_response_code(403);
        die('Access denied.');
    }
    
    // Get file info
    $fileSize = filesize($realPath);
    $mimeType = 'application/pdf';
    
    // Send file headers
    header('Content-Type: ' . $mimeType);
    header('Content-Disposition: inline; filename="' . basename($article['cfile']) . '"');
    header('Content-Length: ' . $fileSize);
    header('Cache-Control: public, max-age=3600');
    header('X-Content-Type-Options: nosniff');
    
    // Output file
    readfile($realPath);
    exit;
    
} catch (Exception $e) {
    error_log('Download error: ' . $e->getMessage());
    http_response_code(500);
    die('An error occurred. Please try again later.');
}
