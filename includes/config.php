<?php
/**
 * Application Configuration
 * 
 * All sensitive values should be set via environment variables in production.
 * For development, create a .env file (never commit it).
 */

// Load .env file if it exists
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}

// Database Configuration
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'aavpubli_farm');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_CHARSET', 'utf8mb4');

// Application Configuration
define('APP_NAME', 'Indian Farmer');
define('APP_URL', getenv('APP_URL') ?: 'http://localhost');
define('APP_ENV', getenv('APP_ENV') ?: 'development');
define('APP_DEBUG', APP_ENV === 'development');

// Security Configuration
define('CSRF_TOKEN_NAME', '_csrf_token');
define('SESSION_LIFETIME', 3600); // 1 hour
define('MAX_LOGIN_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutes

// File Upload Configuration
define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('ALLOWED_EXTENSIONS', ['pdf', 'doc', 'docx']);
define('MAX_FILE_SIZE', 50 * 1024 * 1024); // 50MB

// Email Configuration
define('SMTP_HOST', getenv('SMTP_HOST') ?: '');
define('SMTP_PORT', getenv('SMTP_PORT') ?: '465');
define('SMTP_USER', getenv('SMTP_USER') ?: '');
define('SMTP_PASS', getenv('SMTP_PASS') ?: '');
define('SMTP_FROM_EMAIL', getenv('SMTP_FROM_EMAIL') ?: 'info@indianfarmer.net');
define('SMTP_FROM_NAME', APP_NAME);

// Gemini AI Configuration
define('GEMINI_API_KEY', getenv('GEMINI_API_KEY') ?: '');
define('GEMINI_API_URL', 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent');

// Error Reporting
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
    ini_set('log_errors', '1');
    ini_set('error_log', __DIR__ . '/../logs/error.log');
}
