# 🚀 Deployment Guide

## Quick Start - Deploy in 5 Minutes

### Option 1: Railway.app (Easiest - Recommended) ⭐

1. **Push to GitHub**
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO.git
   git push -u origin main
   ```

2. **Deploy on Railway**
   - Visit [railway.app](https://railway.app)
   - Sign up with GitHub
   - Click "New Project" → "Deploy from GitHub"
   - Select your repository
   - Set these settings:
     - **Build Command**: `composer install --no-dev`
     - **Start Command**: `php -S 0.0.0.0:$PORT`
   - Deploy! ✨
   - Get free `.railway.app` URL or connect custom domain

**Cost:** Free tier gives $5 credit/month

---

### Option 2: Shared Hosting (Traditional)

1. **Buy hosting** with PHP 8.2+ support
   - Recommended: Bluehost, HostGator, SiteGround
   - Cost: $3-10/month

2. **Upload files**
   - Via FTP (FileZilla) or cPanel File Manager
   - Upload ALL files to `public_html/`

3. **Install dependencies**
   - Via cPanel Terminal or SSH:
   ```bash
   cd public_html
   composer install
   ```

4. **Set permissions**
   ```bash
   chmod 755 cache/
   ```

5. **Done!** Visit your domain

---

### Option 3: Render.com

1. **Push to GitHub** (same as Railway)

2. **Deploy on Render**
   - Visit [render.com](https://render.com)
   - Sign up with GitHub
   - New → Web Service
   - Connect your repository
   - Settings:
     - **Build Command**: `composer install --no-dev`
     - **Start Command**: `php -S 0.0.0.0:10000`
   - Deploy!

**Cost:** Free tier available

---

## After Deployment

### Important Checks:

1. **Environment Variables** (if needed)
   - Set in Railway/Render dashboard
   - Or in `.env` file on shared hosting

2. **Cache Permissions**
   - Ensure `cache/` folder is writable
   ```bash
   chmod -R 755 cache
   ```

3. **HTTPS** (Recommended)
   - Railway: Automatic
   - Shared Hosting: Enable in cPanel
   - Or use Cloudflare (free)

---

## Testing Your Deployment

Visit your deployed URL and test:
- ✅ Homepage loads
- ✅ Registration works
- ✅ Login works
- ✅ Dashboard accessible
- ✅ Tickets can be created
- ✅ Toast notifications appear

---

## Troubleshooting

### Issue: "Vendor directory not found"
**Solution:** Run `composer install` on server

### Issue: "Permission denied for cache/"
**Solution:** Run `chmod 755 cache/`

### Issue: "Page not found"
**Solution:** Ensure `.htaccess` file uploaded and `mod_rewrite` enabled

### Issue: "500 Internal Server Error"
**Solution:** Check PHP error logs in cPanel or server logs

---

## Production Checklist

- [ ] Set `debug: false` in `index.php` (line 11)
- [ ] Test all features
- [ ] Add custom domain (optional)
- [ ] Enable HTTPS
- [ ] Backup database (if using one later)
- [ ] Monitor error logs

---

## Cost Comparison

| Option | Cost | Difficulty | Best For |
|--------|------|------------|----------|
| Railway | Free tier | ⭐ Easy | Quick demos |
| Shared Hosting | $3-10/mo | ⭐⭐ Medium | Production sites |
| VPS | $5-20/mo | ⭐⭐⭐ Hard | Full control |

---

**Recommendation:** Start with **Railway** for quick deployment, then move to shared hosting for production if needed.

