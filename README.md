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

### Option 1: Shared Hosting (Recommended - Easiest)

**Popular Hosts:** GoDaddy, Bluehost, HostGator, cPanel hosting

#### Steps:
1. **Buy hosting** with PHP 8.2+ support
2. **Upload files** via FTP/cPanel File Manager:
   - Upload ALL files to your web root (usually `public_html/`)
   - Keep the same folder structure
3. **Set permissions**:
```bash
chmod 755 cache/
chmod 755 public/
```
4. **Done!** Your app will be live at `yourdomain.com`

**Advantages:** Cheap ($3-10/month), easy setup, email included

---

### Option 2: Railway.app (Recommended for Modern Hosting)

#### Steps:
1. Go to [railway.app](https://railway.app)
2. Sign up with GitHub
3. Click "New Project" → "Deploy from GitHub"
4. Connect your repository
5. Configure:
   - **Build Command**: `composer install --no-dev`
   - **Start Command**: `php -S 0.0.0.0:$PORT`
   - **PHP Version**: 8.2
6. Deploy! Get a free `.railway.app` domain or add custom domain

**Advantages:** Free tier ($5/month credit), auto-deploy from GitHub, modern

---

### Option 3: Render (Simple Deployment)

#### Steps:
1. Go to [render.com](https://render.com)
2. Sign up with GitHub
3. Click "New" → "Static Site" (or Web Service)
4. Connect your GitHub repository
5. Configure:
   - **Build Command**: `composer install --no-dev`
   - **Start Command**: `php -S 0.0.0.0:10000`
6. Deploy!

**Advantages:** Free tier available, simple setup

---

### Option 4: Vercel (Git-based)

**Note:** Requires `vercel.json` configuration for PHP

1. Install Vercel CLI: `npm i -g vercel`
2. Run `vercel` in your project
3. Follow prompts

---

### Quick Deploy Commands

#### For Railway/Render:
```bash
# 1. Initialize git (if not already)
git init
git add .
git commit -m "Initial commit"

# 2. Push to GitHub
git remote add origin https://github.com/yourusername/yourrepo.git
git push -u origin main

# 3. Connect to Railway/Render via their dashboard
```

#### For Shared Hosting:
1. Zip your project (excluding `vendor/`, `cache/`)
2. Upload via cPanel → File Manager
3. Extract on server
4. Run `composer install` via SSH or cPanel terminal
5. Set permissions on `cache/` folder

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

