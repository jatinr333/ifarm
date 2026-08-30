<?php
/**
 * Editorial Board Page
 * 
 * Displays the editorial board members and subject editors.
 */

$pageTitle = 'Editorial Board';
$pageDescription = 'Meet the distinguished editorial board members of Indian Farmer journal.';

require_once __DIR__ . '/includes/header.php';

// Editorial Board Members
$editorialBoard = [
    ['name' => 'Dr. V. B. Dongre', 'role' => 'Editor-in-Chief', 'initials' => 'VD'],
    ['name' => 'Dr. A.R. Ahlawat', 'role' => 'Editor', 'initials' => 'AA'],
    ['name' => 'Dr. Alka Singh', 'role' => 'Member', 'initials' => 'AS'],
    ['name' => 'Dr. K.L Mathew', 'role' => 'Member', 'initials' => 'KM'],
    ['name' => 'Dr. Santosh', 'role' => 'Member', 'initials' => 'DS'],
    ['name' => 'Dr. R. K. Kalariya', 'role' => 'Member', 'initials' => 'RK'],
    ['name' => 'Dr. Zahida Rashid', 'role' => 'Member', 'initials' => 'ZR'],
];

// Subject Editors
$subjectEditors = [
    ['name' => 'Dr. R.K Tomar', 'subject' => 'Agriculture', 'initials' => 'RT'],
    ['name' => 'Dr. Surabhi Singh', 'subject' => 'Home Science', 'initials' => 'SS'],
    ['name' => 'Dr. Senthilkumar', 'subject' => 'Veterinary Science', 'initials' => 'DS'],
    ['name' => 'Dr. S. Rameshkumar', 'subject' => 'Horticulture', 'initials' => 'SR'],
    ['name' => 'Dr. Rehana Raj', 'subject' => 'Fishery Science', 'initials' => 'RR'],
    ['name' => 'Dr. Shesherao Kautkar', 'subject' => 'Agricultural Engineering', 'initials' => 'SK'],
];
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-header__title">Editorial Board</h1>
        <p class="page-header__subtitle">Our distinguished team of editors and reviewers</p>
    </div>
</section>

<!-- Editorial Board -->
<section class="section">
    <div class="container">
        <div class="section__header" style="text-align: left;">
            <span class="section__label">Leadership</span>
            <h2 class="section__title">Editorial Board Members</h2>
        </div>
        
        <div class="editorial-grid">
            <?php foreach ($editorialBoard as $member): ?>
            <div class="editorial-card">
                <div class="editorial-card__avatar">
                    <?php echo htmlspecialchars($member['initials']); ?>
                </div>
                <h3 class="editorial-card__name">
                    <?php echo htmlspecialchars($member['name']); ?>
                </h3>
                <p class="editorial-card__role">
                    <?php echo htmlspecialchars($member['role']); ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Subject Editors -->
<section class="section section--gray">
    <div class="container">
        <div class="section__header" style="text-align: left;">
            <span class="section__label">Specializations</span>
            <h2 class="section__title">Subject Editors</h2>
        </div>
        
        <div class="editorial-grid">
            <?php foreach ($subjectEditors as $editor): ?>
            <div class="editorial-card">
                <div class="editorial-card__avatar" style="background: linear-gradient(135deg, var(--color-secondary), #f59e0b);">
                    <?php echo htmlspecialchars($editor['initials']); ?>
                </div>
                <h3 class="editorial-card__name">
                    <?php echo htmlspecialchars($editor['name']); ?>
                </h3>
                <p class="editorial-card__role">
                    <?php echo htmlspecialchars($editor['subject']); ?>
                </p>
            </div>
            <?php endforeach; ?>
            
            <!-- Vacant Position -->
            <div class="editorial-card" style="border: 2px dashed var(--color-gray-300);">
                <div class="editorial-card__avatar" style="background: var(--color-gray-300);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="8" x2="12" y2="16"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                    </svg>
                </div>
                <h3 class="editorial-card__name" style="color: var(--color-gray-500);">
                    Position Open
                </h3>
                <p class="editorial-card__role" style="color: var(--color-gray-400);">
                    Dairy Science
                </p>
                <p style="font-size: 0.8125rem; color: var(--color-gray-500); margin-top: var(--space-sm);">
                    CVs invited
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Join Editorial Board CTA -->
<section class="hero" style="padding: var(--space-3xl) 0;">
    <div class="container" style="text-align: center;">
        <h2 style="color: white; margin-bottom: var(--space-md);">Interested in Joining Our Board?</h2>
        <p style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto var(--space-xl);">
            We welcome qualified researchers and academics to join our editorial board. 
            Please send your CV and area of expertise to our editorial office.
        </p>
        <a href="/contact" class="btn btn--primary">Contact Us</a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
