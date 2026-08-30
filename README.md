# Indian Farmer - Open Access Journal

An open access scientific research journal publishing articles from multidisciplinary fields including Agricultural Sciences, Veterinary Sciences, Fisheries, Horticulture, and more.

**ISSN:** 2394-1227

## Features

- 📄 Article publishing and management
- 📥 Secure PDF downloads with download counting
- 📧 Manuscript submission system
- 📬 Contact form
- 📚 Complete archives (2014-present)
- 🔒 Security-first architecture

## Tech Stack

- **Backend:** PHP 8.0+
- **Database:** MySQL 5.7+ / MariaDB
- **Frontend:** Modern CSS with CSS Variables, Vanilla JavaScript
- **Security:** PDO with prepared statements, CSRF protection, input sanitization

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/jatinr333/ifarm.git
   cd ifarm
   ```

2. Copy the environment file:
   ```bash
   cp .env.example .env
   ```

3. Configure your `.env` file with database credentials and other settings.

4. Import the database schema (if available).

5. Set proper permissions:
   ```bash
   chmod 755 uploads/
   chmod 644 .env
   ```

6. Configure your web server to point to the project directory.

## Directory Structure

```
ifarm/
├── assets/
│   ├── css/
│   │   └── style.css          # Main stylesheet
│   ├── img/
│   │   └── favicon.svg        # Favicon
│   └── js/
│       └── main.js            # Main JavaScript
├── includes/
│   ├── config.php             # Application configuration
│   ├── Database.php           # Database connection class
│   ├── Security.php           # Security utilities
│   ├── header.php             # Header template
│   └── footer.php             # Footer template
├── uploads/                   # User uploads (gitignored)
├── index.php                  # Homepage
├── current-issues.php         # Current month's articles
├── archives.php               # All past issues
├── editorial-board.php        # Editorial board members
├── submit.php                 # Manuscript submission
├── contact.php                # Contact form
├── instructions.php           # Author guidelines
├── download.php               # Secure file download handler
├── .env.example               # Environment template
├── .gitignore                 # Git ignore rules
├── .htaccess                  # Apache security rules
└── README.md                  # This file
```

## Security Features

- ✅ PDO with prepared statements (no SQL injection)
- ✅ CSRF token protection on all forms
- ✅ Input sanitization and validation
- ✅ XSS prevention with htmlspecialchars
- ✅ Secure file upload validation (extension + MIME type)
- ✅ Rate limiting on form submissions
- ✅ Security headers (X-Frame-Options, CSP, etc.)
- ✅ Path traversal prevention on downloads
- ✅ Environment-based configuration (no hardcoded credentials)

## Configuration

All sensitive configuration is stored in the `.env` file (never committed to Git). See `.env.example` for available options.

### Required Settings

- `DB_HOST` - Database host
- `DB_NAME` - Database name
- `DB_USER` - Database username
- `DB_PASS` - Database password

### Optional Settings

- `SMTP_*` - Email configuration for notifications
- `GEMINI_API_KEY` - Google Gemini API key for AI chatbot

## License

© 2024 Indian Farmer. All rights reserved.

## Contact

- **Email:** info@indianfarmer.net
- **Website:** https://indianfarmer.net
