<?php
/**
 * Archives Page
 * 
 * Displays all past issues organized by year and volume.
 */

$pageTitle = 'Archives';
$pageDescription = 'Browse the complete archive of Indian Farmer journal articles from 2014 to present.';

require_once __DIR__ . '/includes/header.php';

$db = Database::getInstance();

// Get all articles grouped by year and month
$articles = $db->fetchAll(
    "SELECT YEAR(ctime) as year, MONTH(ctime) as month, COUNT(*) as article_count
     FROM currentfiles 
     GROUP BY YEAR(ctime), MONTH(ctime) 
     ORDER BY year DESC, month DESC"
");

// Organize by year
$archives = [];
foreach ($articles as $article) {
    $year = $article['year'];
    $month = $article['month'];
    if (!isset($archives[$year])) {
        $archives[$year] = [];
    }
    $archives[$year][$month] = $article['article_count'];
}
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-header__title">Archives</h1>
        <p class="page-header__subtitle">Complete collection of published research articles</p>
    </div>
</section>

<!-- Archives Content -->
<section class="section">
    <div class="container">
        <?php if (empty($archives)): ?>
            <div class="alert alert--info">
                <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <span>No archives available yet.</span>
            </div>
        <?php else: ?>
            <?php foreach ($archives as $year => $months): ?>
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-lg); padding-bottom: var(--space-sm); border-bottom: 2px solid var(--color-primary);">
                    <?php echo (int)$year; ?>
                </h2>
                
                <div class="archives-issues" style="gap: var(--space-md);">
                    <?php
                    $monthNames = [
                        1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                        5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                        9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                    ];
                    
                    foreach ($months as $month => $count): ?>
                    <a href="/archives/<?php echo (int)$year; ?>/<?php echo (int)$month; ?>" 
                       class="archives-issue"
                       style="padding: var(--space-md) var(--space-lg); font-size: 0.9375rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                        </svg>
                        <span>
                            <strong><?php echo $monthNames[$month]; ?></strong>
                            <br>
                            <small style="color: var(--color-gray-500);"><?php echo $count; ?> article<?php echo $count !== 1 ? 's' : ''; ?></small>
                        </span>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <!-- Static Archives (Legacy PDFs) -->
        <div class="mt-4">
            <h2 style="color: var(--color-primary); margin-bottom: var(--space-lg); padding-bottom: var(--space-sm); border-bottom: 2px solid var(--color-primary);">
                Legacy Archives (2014-2020)
            </h2>
            
            <div class="alert alert--info mb-3">
                <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <span>Earlier issues are available as PDF archives. Click on a year to expand and view available issues.</span>
            </div>
            
            <?php
            $legacyYears = range(2020, 2014);
            $legacyMonths = [
                'JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE',
                'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'
            ];
            
            foreach ($legacyYears as $year): ?>
            <details class="mb-2" style="background: var(--color-white); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden;">
                <summary style="padding: var(--space-md) var(--space-lg); cursor: pointer; font-weight: 600; color: var(--color-gray-800); display: flex; align-items: center; gap: var(--space-sm);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="transition: transform 0.2s;">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                    Volume <?php echo $year - 2013; ?> (<?php echo $year; ?>)
                </summary>
                <div style="padding: 0 var(--space-lg) var(--space-lg);">
                    <div class="archives-issues">
                        <?php foreach ($legacyMonths as $index => $month): ?>
                        <a href="/assets/archives/<?php echo $year; ?>/<?php echo $month; ?> <?php echo $year; ?>.pdf" 
                           class="archives-issue"
                           target="_blank"
                           rel="noopener noreferrer">
                            <?php echo ucfirst(strtolower($month)); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
