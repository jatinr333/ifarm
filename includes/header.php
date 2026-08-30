<?php
/**
 * Header Template
 * 
 * Includes security headers, meta tags, and navigation.
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load configuration and helpers
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Security.php';

// Set security headers
Security::setSecurityHeaders();

// Get current page for active state
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | ' : ''; ?>Indian Farmer - Open Access Journal</title>
    <meta name="description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Indian Farmer is an open access scientific research journal publishing articles from multidisciplinary fields including Agricultural Sciences, Veterinary Sciences, and more.'; ?>">
    <meta name="keywords" content="indian farmer, agriculture journal, open access, scientific research, farming, veterinary, horticulture">
    <meta name="author" content="Indian Farmer Journal">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) . ' | ' : ''; ?>Indian Farmer">
    <meta property="og:description" content="<?php echo isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Open access scientific research journal for agricultural sciences.'; ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="/assets/img/favicon.svg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
    <?php if (isset($extraCss)): ?>
        <style><?php echo $extraCss; ?></style>
    <?php endif; ?>
</head>
<body>
    <!-- Skip to main content -->
    <a href="#main-content" class="sr-only">Skip to main content</a>
    
    <!-- Header -->
    <header class="header" role="banner">
        <div class="container">
            <div class="header__inner">
                <!-- Logo -->
                <a href="/" class="header__logo" aria-label="Indian Farmer Home">
                    <div class="header__logo-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div>
                        <div class="header__logo-text">Indian Farmer</div>
                        <div class="header__logo-subtitle">Open Access Journal • ISSN 2394-1227</div>
                    </div>
                </a>

                <!-- Mobile Toggle -->
                <button class="nav__toggle" aria-label="Toggle navigation" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Navigation -->
                <nav class="nav" role="navigation" aria-label="Main navigation">
                    <ul class="nav__list">
                        <li>
                            <a href="/" class="nav__link <?php echo $currentPage === 'index' ? 'nav__link--active' : ''; ?>">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="/current-issues" class="nav__link <?php echo $currentPage === 'current-issues' ? 'nav__link--active' : ''; ?>">
                                Current Issues
                            </a>
                        </li>
                        <li>
                            <a href="/archives" class="nav__link <?php echo $currentPage === 'archives' ? 'nav__link--active' : ''; ?>">
                                Archives
                            </a>
                        </li>
                        <li>
                            <a href="/editorial-board" class="nav__link <?php echo $currentPage === 'editorial-board' ? 'nav__link--active' : ''; ?>">
                                Editorial Board
                            </a>
                        </li>
                        <li>
                            <a href="/submit" class="nav__link <?php echo $currentPage === 'submit' ? 'nav__link--active' : ''; ?>">
                                Submit Manuscript
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="nav__link <?php echo $currentPage === 'contact' ? 'nav__link--active' : ''; ?>">
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main id="main-content" role="main">
