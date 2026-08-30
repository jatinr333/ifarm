<?php
/**
 * Homepage
 * 
 * Displays hero section, latest articles, about section, and gallery.
 */

$pageTitle = 'Home';
$pageDescription = 'Indian Farmer - Open access scientific research journal publishing articles from multidisciplinary fields.';

require_once __DIR__ . '/includes/header.php';

// Fetch latest articles
$db = Database::getInstance();
$articles = $db->fetchAll(
    "SELECT id, title, cname, ctime, cfile, pages, dcount 
     FROM currentfiles 
     WHERE ctime >= DATE_SUB(CURDATE(), INTERVAL 2 MONTH) 
     ORDER BY id DESC 
     LIMIT 10"
);
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero__content">
            <span class="hero__badge">Open Access Journal</span>
            <h1 class="hero__title">Indian Farmer</h1>
            <p class="hero__subtitle">
                Advancing agricultural research through open access publication. 
                ISSN 2394-1227
            </p>
            <div class="hero__actions">
                <a href="/current-issues" class="btn btn--primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Current Issue
                </a>
                <a href="/submit" class="btn btn--secondary">
                    Submit Manuscript
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section">
    <div class="container">
        <div class="about">
            <div class="about__image">
                <div style="background: linear-gradient(135deg, #2d5a27, #4a8c3f); width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                    <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="1">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>
            </div>
            <div class="about__content">
                <span class="section__label">About Us</span>
                <h2 class="about__title">Advancing Agricultural Research</h2>
                <p class="about__text">
                    Agriculture is the backbone of rural India. Much emphasis is required to transfer 
                    scientific technologies and information to farmers and policy makers.
                </p>
                <p class="about__text">
                    Indian Farmer is an open access scientific research journal that publishes selected 
                    original research articles, reviews, short communications, and policy papers in the 
                    fields of Agricultural Sciences, Veterinary Sciences, Fisheries, Horticulture, and more.
                </p>
                <a href="/submit" class="btn btn--outline">Submit Your Research</a>
                
                <div class="about__stats">
                    <div class="about__stat">
                        <div class="about__stat-number">10+</div>
                        <div class="about__stat-label">Years Publishing</div>
                    </div>
                    <div class="about__stat">
                        <div class="about__stat-number">1000+</div>
                        <div class="about__stat-label">Articles Published</div>
                    </div>
                    <div class="about__stat">
                        <div class="about__stat-number">500+</div>
                        <div class="about__stat-label">Authors</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles Section -->
<?php if (!empty($articles)): ?>
<section class="section section--gray">
    <div class="container">
        <div class="section__header">
            <span class="section__label">Recent Publications</span>
            <h2 class="section__title">Latest Articles</h2>
            <p class="section__description">
                Browse our most recent research publications across various agricultural disciplines.
            </p>
        </div>
        
        <div class="articles-grid">
            <?php foreach ($articles as $article): ?>
            <article class="card">
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
                        PDF
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="/current-issues" class="btn btn--outline">View All Articles</a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Subject Areas Section -->
<section class="section">
    <div class="container">
        <div class="section__header">
            <span class="section__label">Research Areas</span>
            <h2 class="section__title">Subject Disciplines</h2>
            <p class="section__description">
                We publish research across multiple agricultural and related science disciplines.
            </p>
        </div>
        
        <div class="articles-grid" style="grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));">
            <?php
            $subjects = [
                ['icon' => '🌾', 'name' => 'Agricultural Sciences', 'desc' => 'Crop science, soil science, agronomy, and farming systems'],
                ['icon' => '🐄', 'name' => 'Veterinary Sciences', 'desc' => 'Animal health, livestock management, and veterinary medicine'],
                ['icon' => '🐟', 'name' => 'Fisheries Sciences', 'desc' => 'Aquaculture, fish biology, and fisheries management'],
                ['icon' => '🏡', 'name' => 'Home Science', 'desc' => 'Family resource management, nutrition, and textile science'],
                ['icon' => '🌻', 'name' => 'Horticultural Sciences', 'desc' => 'Fruit, vegetable, flower cultivation and post-harvest technology'],
                ['icon' => '🥛', 'name' => 'Dairy Science', 'desc' => 'Milk production, dairy technology, and quality control'],
                ['icon' => '⚙️', 'name' => 'Agricultural Engineering', 'desc' => 'Farm machinery, irrigation, and agricultural technology'],
                ['icon' => '🐔', 'name' => 'Poultry Science', 'desc' => 'Poultry nutrition, breeding, and disease management']
            ];
            
            foreach ($subjects as $subject): ?>
            <div class="card" style="text-align: center;">
                <div class="card__body">
                    <div style="font-size: 2.5rem; margin-bottom: var(--space-md);">
                        <?php echo $subject['icon']; ?>
                    </div>
                    <h3 class="card__title" style="font-size: 1rem;">
                        <?php echo htmlspecialchars($subject['name']); ?>
                    </h3>
                    <p style="font-size: 0.875rem; color: var(--color-gray-500); margin: 0;">
                        <?php echo htmlspecialchars($subject['desc']); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="hero" style="padding: var(--space-3xl) 0;">
    <div class="container" style="text-align: center;">
        <h2 style="color: white; margin-bottom: var(--space-md);">Ready to Publish Your Research?</h2>
        <p style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto var(--space-xl);">
            Submit your manuscript to Indian Farmer and reach a wide audience of researchers, 
            farmers, and policy makers across India and beyond.
        </p>
        <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
            <a href="/submit" class="btn btn--primary">Submit Manuscript</a>
            <a href="/instructions" class="btn btn--secondary">Author Guidelines</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
