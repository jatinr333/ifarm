<?php
/**
 * Contact Page
 * 
 * Contact form and information.
 */

$pageTitle = 'Contact Us';
$pageDescription = 'Get in touch with Indian Farmer journal for queries, submissions, and support.';

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
        if (!Security::checkRateLimit('contact_' . $ip, 10, 3600)) {
            $error = 'Too many attempts. Please try again later.';
        } else {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $subject = trim($_POST['subject'] ?? '');
            $message = trim($_POST['message'] ?? '');
            
            // Validate
            if (empty($name) || empty($email) || empty($message)) {
                $error = 'Please fill in all required fields.';
            } elseif (!Security::validateEmail($email)) {
                $error = 'Please enter a valid email address.';
            } else {
                // Send email (if SMTP configured)
                if (SMTP_HOST && SMTP_USER && SMTP_PASS) {
                    try {
                        // Email sending would go here using PHPMailer
                        // For now, we'll just mark as success
                        $success = true;
                    } catch (Exception $e) {
                        error_log('Contact email failed: ' . $e->getMessage());
                        $error = 'Failed to send message. Please try again later.';
                    }
                } else {
                    // In development, just show success
                    $success = true;
                }
            }
        }
    }
}
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-header__title">Contact Us</h1>
        <p class="page-header__subtitle">We'd love to hear from you</p>
    </div>
</section>

<!-- Contact Content -->
<section class="section">
    <div class="container">
        <div class="about" style="gap: var(--space-3xl);">
            <!-- Contact Form -->
            <div>
                <?php if ($success): ?>
                    <div class="alert alert--success mb-3">
                        <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <strong>Message Sent!</strong>
                            <p style="margin: var(--space-sm) 0 0;">Thank you for contacting us. We'll get back to you soon.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if ($error): ?>
                        <div class="alert alert--error mb-3">
                            <svg class="alert__icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span><?php echo htmlspecialchars($error); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <h2 style="margin-bottom: var(--space-xl);">Send us a Message</h2>
                    
                    <form class="form" method="POST" data-validate style="max-width: 100%;">
                        <?php echo Security::csrfField(); ?>
                        
                        <div class="form__group">
                            <label for="name" class="form__label">
                                Your Name <span style="color: var(--color-error);">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="form__input"
                                placeholder="Enter your full name"
                                required
                                value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
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
                                placeholder="Enter your email address"
                                required
                                value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                            >
                        </div>
                        
                        <div class="form__group">
                            <label for="subject" class="form__label">
                                Subject
                            </label>
                            <input 
                                type="text" 
                                id="subject" 
                                name="subject" 
                                class="form__input"
                                placeholder="What is this regarding?"
                                value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>"
                            >
                        </div>
                        
                        <div class="form__group">
                            <label for="message" class="form__label">
                                Message <span style="color: var(--color-error);">*</span>
                            </label>
                            <textarea 
                                id="message" 
                                name="message" 
                                class="form__textarea"
                                placeholder="Type your message here..."
                                required
                                rows="5"
                            ><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                        </div>
                        
                        <div class="form__group">
                            <button type="submit" class="btn btn--primary btn--block btn--lg">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="22" y1="2" x2="11" y2="13"/>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                                </svg>
                                Send Message
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 style="margin-bottom: var(--space-xl);">Contact Information</h2>
                
                <div style="display: flex; flex-direction: column; gap: var(--space-xl);">
                    <!-- Email -->
                    <div style="display: flex; gap: var(--space-md); align-items: flex-start;">
                        <div style="width: 48px; height: 48px; background: var(--color-primary); border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div>
                            <h4 style="margin-bottom: var(--space-xs);">Email</h4>
                            <p style="margin: 0;">
                                <a href="mailto:info@indianfarmer.net">info@indianfarmer.net</a>
                            </p>
                            <p style="margin: var(--space-xs) 0 0;">
                                <a href="mailto:indianfarmer2014@gmail.com">indianfarmer2014@gmail.com</a>
                            </p>
                        </div>
                    </div>
                    
                    <!-- Response Time -->
                    <div style="display: flex; gap: var(--space-md); align-items: flex-start;">
                        <div style="width: 48px; height: 48px; background: var(--color-secondary); border-radius: var(--radius-lg); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div>
                            <h4 style="margin-bottom: var(--space-xs);">Response Time</h4>
                            <p style="margin: 0;">We typically respond within 24-48 hours during business days.</p>
                        </div>
                    </div>
                    
                    <!-- FAQ -->
                    <div style="background: var(--color-gray-50); border-radius: var(--radius-xl); padding: var(--space-xl);">
                        <h3 style="margin-bottom: var(--space-md);">Frequently Asked Questions</h3>
                        
                        <details style="margin-bottom: var(--space-md);">
                            <summary style="cursor: pointer; font-weight: 500; color: var(--color-gray-700);">
                                How long does the review process take?
                            </summary>
                            <p style="margin: var(--space-sm) 0 0; color: var(--color-gray-600);">
                                The typical review process takes 4-6 weeks from submission to decision.
                            </p>
                        </details>
                        
                        <details style="margin-bottom: var(--space-md);">
                            <summary style="cursor: pointer; font-weight: 500; color: var(--color-gray-700);">
                                Is there a publication fee?
                            </summary>
                            <p style="margin: var(--space-sm) 0 0; color: var(--color-gray-600);">
                                Yes, there is a processing/publication charge of Rs. 1000/- at the time of submission.
                            </p>
                        </details>
                        
                        <details>
                            <summary style="cursor: pointer; font-weight: 500; color: var(--color-gray-700);">
                                What file formats are accepted?
                            </summary>
                            <p style="margin: var(--space-sm) 0 0; color: var(--color-gray-600);">
                                We accept Microsoft Word documents (.doc, .docx) for manuscript submissions.
                            </p>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
