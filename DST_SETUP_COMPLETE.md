# DST Landing Page Setup - Clean Base

## ✅ What's Been Set Up

### 1. Base Template (`templates/base_dst.html.twig`)
- **Franken UI** CSS and JS loaded from CDN
- **Tailwind CSS** CDN
- **Lucide Icons** loaded from unpkg
- **Google Fonts** (Geist & Geist Mono)
- **Navbar** with:
  - DST branding
  - Navigation links (Home, Tickets, Dashboard, Contact)
  - Sign In / Sign Up buttons with Lucide icons
  - Responsive design
- **Footer** with:
  - DST branding and description
  - Social media links (Facebook, Twitter, Instagram)
  - Quick Links section
  - Support section with icons
  - Copyright notice

### 2. DST Landing Page (`templates/dst_landing.html.twig`)
- Simple "Hello World" content
- Extends base template
- Ready for you to build on

### 3. Routing (`index.php`)
- Route: `/dst` or `/dst-landing`
- Access at: http://localhost:8000/dst

### 4. Assets Copied
- All SVG images in `public/assets/images/`

## 📁 File Structure

```
templates/
├── base_dst.html.twig      # Base template with navbar & footer
└── dst_landing.html.twig   # DST landing page (extends base)

index.php                    # Routing

public/
└── assets/
    └── images/
        ├── blob-scatter-haikei.svg
        ├── blob-scene-haikei.svg
        ├── circle-scatter-haikei.svg
        ├── layered-waves-haikei.svg
        └── tickets-cuate.svg
```

## 🎨 Included Features

- ✅ Franken UI integration
- ✅ Tailwind CSS
- ✅ Lucide icons (with auto-initialization)
- ✅ Google Fonts
- ✅ Dark theme navbar (#232323)
- ✅ Responsive design
- ✅ All assets imported

## 🚀 Next Steps

Visit: **http://localhost:8000/dst**

You'll see "Hello World" with the base navbar and footer. Now you can build your content inside the content block!
