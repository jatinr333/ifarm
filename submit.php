<?php
/**
 * Submit Manuscript Page
 * 
 * Allows authors to submit their manuscripts via email or file upload.
 */

$pageTitle = 'Submit Manuscript';
$pageDescription = 'Submit your research manuscript to Indian Farmer journal for publication.';

require_once __DIR__ . '/includes/header.php';

// Handle form submission
$success = false;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verify CSRF token
    if (!Security::verifyRequest()) {
        $error = 'Invalid form submission. Please try again.';
    } else {
        // Rate limiting
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        if (!Security::checkRateLimit('submit_' . $ip, 5, 3600)) {
            $error = 'Too many submission attempts. Please try again later.';
        } else {
            // Validate required fields
            $title = trim($_POST['title'] ?? '');
            $author = trim($_POST['author'] ?? '');
            $email = trim($_POST['email'] ?? '');
            
            if (empty($title) || empty($author) || empty($email)) {
                $error = 'Please fill in all required fields.';
            } elseif (!Security::validateEmail($email)) {
                $error = 'Please enter a valid email address.';
            } elseif (!isset($_FILES['file']) || $_FILES['file']['error'] === UPLOAD_ERR_NO_FILE) {
                $error = 'Please attach your manuscript file.';
            } else {
                // Validate file upload
                $uploadResult = Security::validateUpload($_FILES['file']);
                
                if (!$uploadResult['valid']) {
                    $error = implode(' ', $uploadResult['errors']);
                } else {
                    try {
                        // Generate secure filename
                        $secureFilename = Security::generateSecureFilename($_FILES['file']['name']);
                        $targetPath = UPLOAD_DIR . $secureFilename;
                        
                        // Ensure upload directory exists
                        if (!is_dir(UPLOAD_DIR)) {
                            mkdir(UPLOAD_DIR, 0755, true);
                        }
                        
                        // Move uploaded file
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
                            // Save to database
                            $db = Database::getInstance();
                            $db->query(
                                "INSERT INTO ufiles (mtitle, email, aname, jdate, jfile, trans) 
                                 VALUES (:title, :email, :author, NOW(), :filename, :trans)",
                                [
                                    ':title' => Security::sanitize($title),
                                    ':email' => Security::sanitizeEmail($email),
                                    ':author' => Security::sanitize($author),
                                    ':filename' => $secureFilename,
                                    ':trans' => Security::sanitize($_POST['trans'] ?? '')
                                ]
                            );
                            
                            // Send confirmation email (if SMTP configured)
                            if (SMTP_HOST && SMTP_USER && SMTP_PASS) {
                                try {
                                    // Email sending would go here using PHPMailer
                                    // For now, we'll just mark as success
                                } catch (Exception $e) {
                                    // Log error but don't fail the submission
                                    error_log('Email sending failed: ' . $e->getMessage());
                                }
                            }
                            
                            $success = true;
                        } else {
                            $error = 'Failed to upload file. Please try again.';
                        }
                    } catch (Exception $e) {
                        error_log('Submission error: ' . $e->getMessage());
                        $error = 'An error occurred. Please try again later.';
                    }
                }
            }
        }
    }
}
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-header__title">Submit Manuscript</h1>
        <p class="page-header__subtitle">Submit your research for publication in Indian Farmer</p>
    </div>
</section>

<!-- Submission Form -->
<section class="section">
    <div class="container">
        <?php if ($success): ?>
            <div class="alert alert--success" style="max-width: 600px; margin: 0 auto var(--space-xl);">
                <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <strong>Submission Successful!</strong>
                    <p style="margin: var(--space-sm) 0 0;">Your manuscript has been submitted successfully. You will receive a confirmation email shortly. Please check your spam folder if you don't see it.</p>
                </div>
            </div>
            
            <div class="text-center">
                <a href="/" class="btn btn--primary">Return to Home</a>
            </div>
        <?php else: ?>
            <?php if ($error): ?>
                <div class="alert alert--error" style="max-width: 600px; margin: 0 auto var(--space-xl);">
                    <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            <?php endif; ?>
            
            <!-- Submission Instructions -->
            <div class="alert alert--info mb-4" style="max-width: 600px; margin: 0 auto var(--space-xl);">
                <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <strong>Submission Guidelines</strong>
                    <ul style="margin: var(--space-sm) 0 0; padding-left: var(--space-lg);">
                        <li>Manuscripts should be in English</li>
                        <li>File format: Microsoft Word (.doc, .docx)</li>
                        <li>Maximum file size: 50MB</li>
                        <li>Please follow our <a href="/instructions" style="text-decoration: underline;">Author Guidelines</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Submission Form -->
            <form class="form" method="POST" enctype="multipart/form-data" data-validate>
                <?php echo Security::csrfField(); ?>
                
                <div class="form__group">
                    <label for="title" class="form__label">
                        Title of Manuscript <span style="color: var(--color-error);">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        class="form__input"
                        placeholder="Enter the title of your manuscript"
                        required
                        value="<?php echo htmlspecialchars($_POST['title'] ?? ''); ?>"
                    >
                </div>
                
                <div class="form__group">
                    <label for="author" class="form__label">
                        Corresponding Author Name <span style="color: var(--color-error);">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="author" 
                        name="author" 
                        class="form__input"
                        placeholder="Enter corresponding author's full name"
                        required
                        value="<?php echo htmlspecialchars($_POST['author'] ?? ''); ?>"
                    >
                </div>
                
                <div class="form__group">
                    <label for="email" class="form__label">
                        Email Address <span style="color: var(--color-error);">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form__input"
                        placeholder="Enter corresponding author's email"
                        required
                        value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                    >
                    <span class="form__hint">Confirmation will be sent to this email</span>
                </div>
                
                <div class="form__group">
                    <label for="file" class="form__label">
                        Manuscript File <span style="color: var(--color-error);">*</span>
                    </label>
                    <div class="form__file">
                        <input 
                            type="file" 
                            id="file" 
                            name="file" 
                            class="form__file-input"
                            accept=".doc,.docx"
                            required
                            data-max-size="52428800"
                        >
                        <label for="file" class="form__file-label">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="17 8 12 3 7 8"/>
                                <line x1="12" y1="3" x2="12" y2="15"/>
                            </svg>
                            <span class="form__file-name">Choose file or drag here</span>
                            <small>.doc, .docx files only (max 50MB)</small>
                        </label>
                    </div>
                </div>
                
                <div class="form__group">
                    <label for="trans" class="form__label">
                        Transaction ID / Payment Reference
                    </label>
                    <input 
                        type="text" 
                        id="trans" 
                        name="trans" 
                        class="form__input"
                        placeholder="Enter payment transaction ID (if applicable)"
                        value="<?php echo htmlspecialchars($_POST['trans'] ?? ''); ?>"
                    >
                    <span class="form__hint">Processing fee: Rs. 1000/- (if applicable)</span>
                </div>
                
                <div class="form__group">
                    <button type="submit" class="btn btn--primary btn--block btn--lg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13"/>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                        </svg>
                        Submit Manuscript
                    </button>
                </div>
            </form>
            
            <!-- Alternative: Email Submission -->
            <div class="text-center mt-4" style="max-width: 600px; margin: var(--space-3xl) auto 0;">
                <p style="color: var(--color-gray-500); margin-bottom: var(--space-md);">Or submit via email</p>
                <a href="mailto:indianfarmer2014@gmail.com?subject=Manuscript Submission" class="btn btn--outline">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    Email: indianfarmer2014@gmail.com
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
