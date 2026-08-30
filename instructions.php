<?php
/**
 * Instructions to Authors Page
 * 
 * Displays guidelines for manuscript preparation and submission.
 */

$pageTitle = 'Instructions to Authors';
$pageDescription = 'Guidelines for preparing and submitting manuscripts to Indian Farmer journal.';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-header__title">Instructions to Authors</h1>
        <p class="page-header__subtitle">Guidelines for manuscript preparation and submission</p>
    </div>
</section>

<!-- Instructions Content -->
<section class="section">
    <div class="container">
        <div style="max-width: 800px; margin: 0 auto;">
            <!-- Introduction -->
            <div class="mb-4">
                <p style="font-size: 1.125rem; line-height: 1.8;">
                    Authors are requested to carefully read and follow these guidelines before submitting 
                    their manuscripts to Indian Farmer journal. Proper formatting ensures faster processing 
                    and review of your submission.
                </p>
            </div>
            
            <!-- Title -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    Title
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <ul style="margin: 0; padding-left: var(--space-lg); color: var(--color-gray-700);">
                        <li style="margin-bottom: var(--space-sm);">Title should be brief, specific, and informative</li>
                        <li style="margin-bottom: var(--space-sm);">Scientific names should be in <em>italics</em> or underlined</li>
                        <li>Avoid abbreviations in the title</li>
                    </ul>
                </div>
            </div>
            
            <!-- Authors -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    Authors
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <ul style="margin: 0; padding-left: var(--space-lg); color: var(--color-gray-700);">
                        <li style="margin-bottom: var(--space-sm);">Names of authors should be typed in CAPITALS</li>
                        <li style="margin-bottom: var(--space-sm);">Do not include degrees, titles, or qualifications with names</li>
                        <li>Present address of correspondence should be given as a footnote</li>
                    </ul>
                </div>
            </div>
            
            <!-- Address -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    Address
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <ul style="margin: 0; padding-left: var(--space-lg); color: var(--color-gray-700);">
                        <li style="margin-bottom: var(--space-sm);">Address of the institution where the work was carried out should be given below the author name(s)</li>
                        <li>Present address of correspondence should be given as a footnote with an asterisk (*) indicating the corresponding author</li>
                    </ul>
                </div>
            </div>
            
            <!-- Abstract -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                    Abstract
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <ul style="margin: 0; padding-left: var(--space-lg); color: var(--color-gray-700);">
                        <li style="margin-bottom: var(--space-sm);">The abstract should be informative and completely self-explanatory</li>
                        <li style="margin-bottom: var(--space-sm);">Briefly present the topic, state the scope of experiments, indicate significant data, and point out major findings and conclusions</li>
                        <li style="margin-bottom: var(--space-sm);">Length: 100 to 150 words</li>
                        <li style="margin-bottom: var(--space-sm);">Use standard nomenclature; avoid abbreviations</li>
                        <li>Do not cite literature in the abstract</li>
                    </ul>
                </div>
            </div>
            
            <!-- Keywords -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <line x1="4" y1="9" x2="20" y2="9"/>
                        <line x1="4" y1="15" x2="20" y2="15"/>
                        <line x1="10" y1="3" x2="8" y2="21"/>
                        <line x1="16" y1="3" x2="14" y2="21"/>
                    </svg>
                    Keywords
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <ul style="margin: 0; padding-left: var(--space-lg); color: var(--color-gray-700);">
                        <li style="margin-bottom: var(--space-sm);">Provide up to 5 keywords for indexing</li>
                        <li>Keywords should be listed in alphabetical order</li>
                    </ul>
                </div>
            </div>
            
            <!-- Formatting -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <polyline points="4 7 4 4 20 4 20 7"/>
                        <line x1="9" y1="20" x2="15" y2="20"/>
                        <line x1="12" y1="4" x2="12" y2="20"/>
                    </svg>
                    Formatting
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <ul style="margin: 0; padding-left: var(--space-lg); color: var(--color-gray-700);">
                        <li style="margin-bottom: var(--space-sm);">Font: Times New Roman</li>
                        <li style="margin-bottom: var(--space-sm);">Font Size: 12pt</li>
                        <li>Line Spacing: 1.5</li>
                    </ul>
                </div>
            </div>
            
            <!-- Conclusion -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    Conclusion
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <p style="margin: 0; color: var(--color-gray-700);">
                        Conclusion should be short and explanatory, summarizing the key findings and their significance.
                    </p>
                </div>
            </div>
            
            <!-- References -->
            <div class="mb-4">
                <h2 style="color: var(--color-primary); margin-bottom: var(--space-md);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; vertical-align: middle; margin-right: 8px;">
                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/>
                        <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/>
                    </svg>
                    References
                </h2>
                <div style="background: var(--color-gray-50); border-radius: var(--radius-lg); padding: var(--space-lg);">
                    <ul style="margin: 0; padding-left: var(--space-lg); color: var(--color-gray-700);">
                        <li style="margin-bottom: var(--space-sm);">Use the author-date format for citations (e.g., Hebbar et al. 2006; Subba Rao, 2001)</li>
                        <li style="margin-bottom: var(--space-sm);">List all references at the end of the paper</li>
                        <li style="margin-bottom: var(--space-sm);">Arrange alphabetically with surname of all authors followed by initials and year of publication in brackets</li>
                        <li>Include the full title of articles</li>
                    </ul>
                </div>
            </div>
            
            <!-- Submission -->
            <div style="background: linear-gradient(135deg, var(--color-primary-dark), var(--color-primary)); border-radius: var(--radius-xl); padding: var(--space-xl); color: white; text-align: center;">
                <h3 style="color: white; margin-bottom: var(--space-md);">Ready to Submit?</h3>
                <p style="color: rgba(255,255,255,0.9); margin-bottom: var(--space-lg);">
                    Submit your manuscript via our online form or email it directly to us.
                </p>
                <div style="display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap;">
                    <a href="/submit" class="btn btn--primary">Submit Online</a>
                    <a href="mailto:indianfarmer2014@gmail.com" class="btn btn--secondary">Email: indianfarmer2014@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
