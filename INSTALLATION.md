# BULK HOMME Theme - Installation Guide

Complete step-by-step installation guide for Magento 2.

## 📋 Prerequisites

Before installing the theme, ensure you have:

- Magento 2.4.x installed and running
- SSH/Terminal access to your server
- Composer installed
- Admin access to Magento backend

## 🚀 Installation Methods

### Method 1: Manual Installation (Recommended for development)

#### Step 1: Upload Theme Files

```bash
# Navigate to your Magento root directory
cd /path/to/magento

# Create theme directory
mkdir -p app/design/frontend/BulkHomme/default

# Upload all theme files to this directory
# You can use FTP, SCP, or copy directly
```

#### Step 2: Set Permissions

```bash
# Set proper permissions
chmod -R 755 app/design/frontend/BulkHomme
chown -R www-data:www-data app/design/frontend/BulkHomme
```

#### Step 3: Clear Cache

```bash
# Clear all caches
php bin/magento cache:clean
php bin/magento cache:flush
```

#### Step 4: Run Setup Upgrade

```bash
# Run setup upgrade
php bin/magento setup:upgrade
```

#### Step 5: Deploy Static Content

```bash
# Deploy static content for all stores
php bin/magento setup:static-content:deploy -f

# Or for specific languages
php bin/magento setup:static-content:deploy en_US sk_SK -f
```

#### Step 6: Compile DI

```bash
# Compile dependency injection (production mode only)
php bin/magento setup:di:compile
```

#### Step 7: Enable Theme in Admin

1. Login to Magento Admin Panel
2. Go to **Content → Design → Configuration**
3. Select your store view
4. Click **Edit**
5. Under **Applied Theme**, select **BULK HOMME Default Theme**
6. Click **Save Configuration**

#### Step 8: Clear Cache Again

```bash
php bin/magento cache:clean
php bin/magento cache:flush
```

---

### Method 2: Composer Installation

#### Step 1: Add Repository

If hosting theme in a private repository, add to `composer.json`:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/your-username/bulkhomme-theme"
        }
    ]
}
```

#### Step 2: Require Package

```bash
composer require bulkhomme/theme-default:^1.0
```

#### Step 3: Run Setup Commands

```bash
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```

#### Step 4: Enable in Admin

Follow steps 7-8 from Method 1.

---

## 🔧 Post-Installation Configuration

### 1. Configure Header Logo

1. Go to **Content → Design → Configuration**
2. Select your store view
3. Click **Edit**
4. Expand **Header** section
5. Upload logo image
   - Recommended size: 200x60px
   - Format: PNG with transparency
6. Save configuration

### 2. Configure Favicon

1. In same Configuration page
2. Expand **HTML Head** section
3. Upload favicon (16x16px or 32x32px PNG/ICO)
4. Save configuration

### 3. Set Store Information

1. Go to **Stores → Configuration → General → General**
2. Expand **Store Information** section
3. Fill in:
   - Store Name
   - Store Phone Number
   - Store Hours
   - Country
4. Save configuration

### 4. Configure Footer

Footer content can be modified in:
- `app/design/frontend/BulkHomme/default/Magento_Theme/templates/html/footer/links.phtml`
- `app/design/frontend/BulkHomme/default/Magento_Theme/templates/html/footer/copyright.phtml`

After editing, run:
```bash
php bin/magento cache:clean layout
php bin/magento setup:static-content:deploy -f
```

### 5. Homepage Setup

1. Create new CMS page: **Content → Pages → Add New Page**
2. Set URL Key: `home`
3. Design your homepage using Page Builder or HTML
4. Go to **Stores → Configuration → Web → Default Pages**
5. Set CMS Home Page to your new page
6. Save configuration

---

## 🎨 Theme Customization

### Changing Colors

Edit `app/design/frontend/BulkHomme/default/web/css/source/_variables.less`:

```less
// Primary colors
@color-primary: #000000;     // Change to your brand color
@color-secondary: #FFFFFF;

// Accent colors
@color-accent: #333333;      // Add custom accent color
```

After changes:
```bash
php bin/magento setup:static-content:deploy -f
```

### Changing Typography

In `_variables.less`:

```less
// Change font family
@font-family-primary: 'Your Font', sans-serif;

// Adjust font sizes
@font-size-h1-desktop: 72px;
@font-size-base: 18px;
```

### Adding Custom Fonts

1. Place font files in `app/design/frontend/BulkHomme/default/web/fonts/`
2. Add @font-face in `_theme.less`:

```less
@font-face {
    font-family: 'CustomFont';
    src: url('../fonts/customfont.woff2') format('woff2'),
         url('../fonts/customfont.woff') format('woff');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}
```

3. Update variables:
```less
@font-family-primary: 'CustomFont', sans-serif;
```

---

## 🐛 Troubleshooting

### Issue: Styles Not Appearing

**Solution 1: Clear All Caches**
```bash
rm -rf var/cache/* var/page_cache/* var/view_preprocessed/* pub/static/*
php bin/magento cache:flush
php bin/magento setup:static-content:deploy -f
```

**Solution 2: Check File Permissions**
```bash
find var generated vendor pub/static pub/media app/etc -type f -exec chmod 644 {} \;
find var generated vendor pub/static pub/media app/etc -type d -exec chmod 755 {} \;
chmod 644 app/etc/*.xml
```

**Solution 3: Disable Minification (Development)**
```bash
php bin/magento config:set dev/css/merge_css_files 0
php bin/magento config:set dev/css/minify_files 0
php bin/magento cache:flush
```

### Issue: Layout Not Updating

**Solution:**
```bash
php bin/magento cache:clean layout
php bin/magento cache:clean full_page
php bin/magento setup:static-content:deploy -f
```

### Issue: 404 Error on Frontend

**Solution 1: Reindex**
```bash
php bin/magento indexer:reindex
```

**Solution 2: Check URL Rewrites**
```bash
php bin/magento setup:upgrade
php bin/magento cache:flush
```

### Issue: Mobile Menu Not Working

**Solution: Check jQuery**

1. Verify jQuery is loaded
2. Check browser console for JavaScript errors
3. Clear browser cache
4. Verify template file path is correct

---

## 🔄 Updating Theme

### Step 1: Backup Current Theme

```bash
cd app/design/frontend/BulkHomme
tar -czf default-backup-$(date +%Y%m%d).tar.gz default/
```

### Step 2: Update Files

Replace theme files with new version while preserving custom changes.

### Step 3: Run Update Commands

```bash
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```

---

## 📊 Performance Optimization

### 1. Enable Production Mode

```bash
php bin/magento deploy:mode:set production
```

### 2. Enable All Caches

```bash
php bin/magento cache:enable
```

### 3. Enable Flat Catalog

Admin → **Stores → Configuration → Catalog → Catalog**
- Enable Flat Catalog Category: Yes
- Enable Flat Catalog Product: Yes

Then:
```bash
php bin/magento indexer:reindex catalog_category_flat catalog_product_flat
```

### 4. Enable CSS/JS Merging

Admin → **Stores → Configuration → Advanced → Developer**

CSS Settings:
- Merge CSS Files: Yes
- Minify CSS Files: Yes

JavaScript Settings:
- Merge JavaScript Files: Yes
- Minify JavaScript Files: Yes
- Enable JavaScript Bundling: Yes (carefully test)

### 5. Image Optimization

- Use WebP format when possible
- Enable lazy loading
- Compress images before upload
- Use appropriate dimensions

### 6. Enable Varnish Cache

```bash
# Generate varnish VCL
php bin/magento varnish:vcl:generate --export-version=6 > /etc/varnish/default.vcl

# Configure in admin
# Stores → Configuration → Advanced → System → Full Page Cache
# Set Caching Application to Varnish Cache
```

---

## 🔒 Security Checklist

- [ ] Change default admin URL
- [ ] Enable 2FA for admin users
- [ ] Set proper file permissions (644 for files, 755 for directories)
- [ ] Enable HTTPS
- [ ] Keep Magento and extensions updated
- [ ] Regular security patches
- [ ] Use strong admin passwords
- [ ] Enable CAPTCHA for forms

---

## 📱 Testing Checklist

### Frontend Testing

- [ ] Homepage loads correctly
- [ ] Category pages display products
- [ ] Product pages show correct information
- [ ] Add to cart works
- [ ] Checkout process completes
- [ ] Mobile responsive design
- [ ] Cross-browser compatibility (Chrome, Firefox, Safari, Edge)
- [ ] Forms validation works
- [ ] Search functionality
- [ ] My Account pages
- [ ] Navigation menus

### Performance Testing

- [ ] Page load time < 3 seconds
- [ ] Lighthouse score > 80
- [ ] No console errors
- [ ] Images optimized
- [ ] CSS/JS minified in production

### Accessibility Testing

- [ ] Keyboard navigation works
- [ ] Screen reader compatible
- [ ] Color contrast meets WCAG AA
- [ ] Focus indicators visible
- [ ] Alt text on images

---

## 📞 Support

### Common Commands Reference

```bash
# Clear cache
php bin/magento cache:clean
php bin/magento cache:flush

# Deploy static content
php bin/magento setup:static-content:deploy -f

# Reindex
php bin/magento indexer:reindex

# Check status
php bin/magento setup:di:compile-multi-tenant

# Disable maintenance mode
php bin/magento maintenance:disable

# Check Magento version
php bin/magento --version
```

### Logs Location

- System logs: `var/log/system.log`
- Exception logs: `var/log/exception.log`
- Debug logs: `var/log/debug.log`
- Access logs: Check server logs (Apache/Nginx)

### Getting Help

1. Check Magento DevDocs: https://devdocs.magento.com
2. Magento Stack Exchange: https://magento.stackexchange.com
3. Review theme README.md
4. Check theme repository issues

---

## ✅ Final Checklist

- [ ] Theme installed successfully
- [ ] Static content deployed
- [ ] Theme enabled in admin
- [ ] Logo uploaded
- [ ] Favicon set
- [ ] Footer configured
- [ ] Homepage created
- [ ] All pages tested
- [ ] Mobile tested
- [ ] Performance optimized
- [ ] Caches enabled
- [ ] Production mode enabled

---

**Congratulations!** Your BULK HOMME theme is now installed and ready to use.

For customization help, see README.md  
For advanced configurations, see Magento DevDocs
