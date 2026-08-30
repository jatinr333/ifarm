<?php
/**
 * Current Issues Page
 * 
 * Displays articles from the current month.
 */

$pageTitle = 'Current Issues';
$pageDescription = 'Browse the latest research articles published in the current issue of Indian Farmer journal.';

require_once __DIR__ . '/includes/header.php';

$db = Database::getInstance();

// Get current month articles
$articles = $db->fetchAll(
    "SELECT id, title, cname, ctime, cfile, pages, dcount 
     FROM currentfiles 
     WHERE MONTH(ctime) = MONTH(CURRENT_DATE()) 
     AND YEAR(ctime) = YEAR(CURRENT_DATE()) 
     ORDER BY id DESC"
);

$currentMonth = date('F Y');
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-header__title">Current Issues</h1>
        <p class="page-header__subtitle"><?php echo htmlspecialchars($currentMonth); ?></p>
    </div>
</section>

<!-- Articles -->
<section class="section">
    <div class="container">
        <?php if (empty($articles)): ?>
            <div class="alert alert--info">
                <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <span>No articles have been published for <?php echo htmlspecialchars($currentMonth); ?> yet. Please check back later.</span>
            </div>
        <?php else: ?>
            <div class="section__header" style="text-align: left;">
                <span class="section__label">This Month</span>
                <h2 class="section__title"><?php echo htmlspecialchars($currentMonth); ?> Issue</h2>
                <p class="section__description" style="margin: 0;">
                    <?php echo count($articles); ?> article<?php echo count($articles) !== 1 ? 's' : ''; ?> published
                </p>
            </div>
            
            <div class="articles-grid">
                <?php foreach ($articles as $index => $article): ?>
                <article class="card animate-fade-in" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                    <div class="card__body">
                        <span class="card__category">Research Article</span>
                        <h3 class="card__title">
                            <a href="/download?id=<?php echo (int)$article['id']; ?>">
                                <?php echo htmlspecialchars($article['title']); ?>
                            </a>
                        </h3>
                        <div class="card__meta">
                            <span class="card__meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                                <?php echo date('M d, Y', strtotime($article['ctime'])); ?>
                            </span>
                            <span class="card__meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                </svg>
                                <?php echo (int)$article['pages']; ?> pages
                            </span>
                            <span class="card__meta-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="7 10 12 15 17 10"/>
                                    <line x1="12" y1="15" x2="12" y2="3"/>
                                </svg>
                                <?php echo (int)$article['dcount']; ?> downloads
                            </span>
                        </div>
                    </div>
                    <div class="card__footer">
                        <div class="card__author">
                            <div class="card__author-avatar">
                                <?php echo strtoupper(substr($article['cname'], 0, 1)); ?>
                            </div>
                            <span class="card__author-name">
                                <?php echo htmlspecialchars($article['cname']); ?>
                            </span>
                        </div>
                        <a href="/download?id=<?php echo (int)$article['id']; ?>" class="card__download-btn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Download PDF
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!-- Previous Issues Link -->
        <div class="text-center mt-4">
            <a href="/archives" class="btn btn--outline">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
                Browse Archives
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
