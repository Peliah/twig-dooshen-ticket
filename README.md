# DST - Support Ticket Management System

A professional ticket management system built with Twig PHP, featuring localStorage-based authentication and ticket management.

## Features

- 🔐 User Authentication (Login/Register)
- 🎫 Ticket Management (Create, View, Delete)
- 📊 Dashboard with Statistics
- 🎨 Modern UI with Franken UI & Tailwind CSS
- 🔔 Toast Notifications
- 💾 localStorage-based data persistence
- 🍪 Cookie-based session management

## Tech Stack

- **PHP 8.2+**
- **Twig Template Engine**
- **Tailwind CSS**
- **Franken UI**
- **Lucide Icons**

## Local Development

### Requirements

- PHP 8.2+
- Composer

### Setup

1. Install dependencies:
```bash
composer install
```

2. Start PHP development server:
```bash
php -S localhost:8000
```

3. Visit `http://localhost:8000`

## Deployment

### Shared Hosting (cPanel, etc.)

1. Upload all files to your web root
2. Ensure PHP 8.2+ is installed
3. The `cache` folder must be writable (chmod 755)
4. No additional configuration needed

### VPS/Dedicated Server

1. Upload files to your web directory
2. Set proper permissions:
```bash
chmod -R 755 cache
chmod -R 755 public
```

3. Configure your web server (Apache/Nginx)

**Apache `.htaccess`:**
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

**Nginx:**
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### Platform-Specific Deployment

#### Heroku

1. Create a `Procfile`:
```
web: vendor/bin/heroku-php-apache2
```

2. Add to `composer.json`:
```json
{
  "require": {
    "twig/twig": "^3.0"
  }
}
```

3. Deploy:
```bash
heroku create your-app-name
git push heroku main
```

#### Railway.app

1. Connect your GitHub repository
2. Set PHP version: `8.2`
3. Add build command: `composer install`
4. Set start command: `php -S 0.0.0.0:$PORT`

#### Render

1. Connect your GitHub repository
2. Environment: PHP
3. Build Command: `composer install --no-dev`
4. Start Command: `php -S 0.0.0.0:10000`

## Environment Considerations

- **Cache Directory**: Must be writable (chmod 755)
- **Session Storage**: Uses PHP sessions (ensure session storage is configured)
- **Cookies**: Used for authentication token (`ticketapp_session`)
- **localStorage**: Client-side data storage (tickets are stored per user)

## File Structure

```
/
├── index.php              # Main entry point
├── composer.json          # Dependencies
├── cache/                 # Twig cache (writable)
├── public/                # Public assets
│   └── assets/
│       └── images/        # Image assets
└── templates/             # Twig templates
    ├── base.html.twig     # Base layout
    ├── auth.html.twig     # Authentication page
    ├── dashboard.html.twig
    ├── dashboard/
    │   └── tickets.html.twig
    ├── landing/
    │   ├── hero.html.twig
    │   └── features.html.twig
    └── auth/
        ├── login.html.twig
        └── register.html.twig
```

## Notes

- The app uses **localStorage** for ticket storage (client-side)
- Authentication uses **cookies** for server-side protection
- No database required - perfect for lightweight hosting
- Session data stored in PHP sessions

## License

MIT

