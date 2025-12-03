# BULK HOMME Magento 2 Theme

Premium minimalist theme for Magento 2, inspired by BULK HOMME's black & white aesthetic.

## 🎨 Design Features

- **Minimalist Black & White Design**: Clean, premium aesthetic
- **Sharp Corners**: No border-radius for modern, bold look
- **High Contrast Typography**: Clear hierarchy and readability
- **Responsive Grid System**: Mobile-first approach
- **Premium Interactions**: Smooth transitions and hover effects
- **Accessibility Focused**: WCAG compliant with proper focus states

## 📦 Theme Structure

```
BulkHomme/default/
├── registration.php                # Theme registration
├── theme.xml                       # Theme configuration
├── composer.json                   # Composer package definition
├── web/
│   ├── css/
│   │   └── source/
│   │       ├── _theme.less        # Main theme styles
│   │       ├── styles-l.less      # Desktop styles
│   │       └── styles-m.less      # Mobile styles
│   ├── fonts/                     # Custom fonts (if any)
│   └── images/                    # Theme images
├── Magento_Theme/
│   ├── layout/
│   │   └── default.xml            # Default page layout
│   └── templates/
│       └── html/
│           ├── header/
│           │   ├── logo.phtml
│           │   └── mobile-nav.phtml
│           └── footer/
│               ├── links.phtml
│               └── copyright.phtml
├── Magento_Catalog/
│   ├── layout/
│   │   └── catalog_product_view.xml
│   └── templates/
│       └── product/
│           └── view/
│               └── highlights.phtml
└── Magento_Checkout/
    └── layout/
        └── (checkout customizations)
```

## 🚀 Installation

### Method 1: Manual Installation

1. **Create theme directory**:
   ```bash
   mkdir -p app/design/frontend/BulkHomme/default
   ```

2. **Copy theme files**:
   ```bash
   cp -r bulkhomme-magento-theme/* app/design/frontend/BulkHomme/default/
   ```

3. **Clear cache and deploy**:
   ```bash
   php bin/magento cache:clean
   php bin/magento setup:upgrade
   php bin/magento setup:static-content:deploy -f
   ```

4. **Enable theme**:
   - Go to Admin Panel → Content → Design → Configuration
   - Select your store view
   - Choose "BULK HOMME Default Theme"
   - Save Configuration

### Method 2: Composer Installation

1. **Add repository** (if hosting theme in private repo):
   ```json
   {
       "repositories": [
           {
               "type": "vcs",
               "url": "your-repository-url"
           }
       ]
   }
   ```

2. **Install theme**:
   ```bash
   composer require bulkhomme/theme-default
   php bin/magento setup:upgrade
   php bin/magento setup:static-content:deploy -f
   ```

## 🎨 Customization

### Colors

All colors are defined in `web/css/source/_theme.less`:

```less
// Primary Colors
@color-primary: #000000;        // Black
@color-secondary: #FFFFFF;      // White

// Grey Scale
@color-grey-dark: #333333;
@color-grey: #666666;
@color-grey-light: #999999;
// ... and more
```

### Typography

Font settings in `_theme.less`:

```less
@font-family-base: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Arial, sans-serif;
@font-size-h1: 64px;
@font-size-body: 16px;
// ... and more
```

### Spacing

Using 8px base system:

```less
@spacing-xs: 2px;
@spacing-sm: 4px;
@spacing-md: 8px;
@spacing-base: 12px;
@spacing-lg: 16px;
@spacing-xl: 24px;
// ... up to 7xl (128px)
```

### Layout Width

```less
@layout-max-width: 1200px;
@layout-padding-desktop: 24px;
@layout-padding-mobile: 16px;
```

## 📱 Responsive Design

### Breakpoints

```less
@screen-xs: 375px;   // Mobile
@screen-sm: 576px;   // Large mobile
@screen-md: 768px;   // Tablet
@screen-lg: 1024px;  // Desktop
@screen-xl: 1280px;  // Large desktop
@screen-xxl: 1440px; // Extra large
```

### Mobile-First Approach

The theme uses mobile-first CSS:
- Base styles work for mobile
- `styles-m.less` adds mobile-specific enhancements
- `styles-l.less` adds desktop layouts

## 🔧 Component Customization

### Buttons

Override button styles by modifying in `_theme.less`:

```less
.action.primary {
    background: @color-primary;
    color: @color-secondary;
    padding: 16px 48px;
    // ... customize as needed
}
```

### Product Cards

Product grid customization:

```less
.product-item {
    border: 1px solid @color-grey-lightest;
    // ... your customizations
}
```

### Forms

Form elements in `_theme.less`:

```less
input[type="text"] {
    height: 48px;
    border: 1px solid @color-grey-lighter;
    // ... customize
}
```

## 🎯 Best Practices

### 1. Don't Modify Core Files

Always extend or override, never modify Magento core:

```xml
<!-- Good: Override in your theme -->
<referenceBlock name="product.info" template="Magento_Catalog::product/view/custom.phtml"/>

<!-- Bad: Modifying core Magento files -->
```

### 2. Use Layout XML

Use layout XML for structural changes:

```xml
<move element="product.info.price" destination="product.info.main" before="-"/>
```

### 3. Keep Styles Modular

Separate styles by module:
- `Magento_Theme/` for global styles
- `Magento_Catalog/` for catalog-specific styles
- `Magento_Checkout/` for checkout styles

### 4. Performance

```bash
# Enable production mode
php bin/magento deploy:mode:set production

# Enable CSS/JS merging
Admin → Stores → Configuration → Advanced → Developer → CSS/JS Settings
```

## 🎨 Design System

### Color Palette

| Color Name | Hex | Usage |
|------------|-----|-------|
| Black | #000000 | Primary text, buttons |
| White | #FFFFFF | Backgrounds |
| Charcoal | #1A1A1A | Dark backgrounds |
| Grey Dark | #333333 | Body text |
| Grey | #666666 | Secondary text |
| Error | #E60000 | Error messages |
| Success | #00A86B | Success messages |

### Typography Scale

| Level | Desktop | Mobile | Weight |
|-------|---------|--------|--------|
| H1 | 64px | 32px | Bold (700) |
| H2 | 42px | 28px | Bold (700) |
| H3 | 32px | 24px | SemiBold (600) |
| H4 | 24px | 24px | SemiBold (600) |
| Body | 16px | 16px | Regular (400) |

### Spacing Scale

| Name | Size | Usage |
|------|------|-------|
| xs | 2px | Micro spacing |
| sm | 4px | Tight spacing |
| md | 8px | Base unit |
| base | 12px | Small gaps |
| lg | 16px | Default spacing |
| xl | 24px | Card padding |
| 2xl | 32px | Section gaps |
| 3xl+ | 48px+ | Large sections |

## 🔍 SEO Optimization

The theme includes:
- Semantic HTML5 structure
- Proper heading hierarchy
- Alt text for images
- Meta description support
- Schema.org markup ready

## ♿ Accessibility

- WCAG 2.1 Level AA compliant
- Keyboard navigation support
- Focus indicators on all interactive elements
- Proper ARIA labels
- Color contrast ratios meet standards

## 🐛 Troubleshooting

### Styles not applying

```bash
# Clear cache
php bin/magento cache:clean

# Remove generated files
rm -rf var/cache/* var/page_cache/* var/view_preprocessed/* pub/static/*

# Redeploy
php bin/magento setup:static-content:deploy -f
```

### Layout not updating

```bash
# Clear layout cache
php bin/magento cache:clean layout

# Recompile
php bin/magento setup:di:compile
```

### Mobile menu not working

Check jQuery is loaded:
```xml
<!-- In layout XML -->
<referenceBlock name="head.components">
    <block class="Magento\Framework\View\Element\Js\Components" name="head.jquery" template="Magento_Theme::js/components.phtml"/>
</referenceBlock>
```

## 📚 Additional Customizations

### Adding Custom Fonts

1. Place font files in `web/fonts/`
2. Add @font-face in `_theme.less`:

```less
@font-face {
    font-family: 'CustomFont';
    src: url('../fonts/custom-font.woff2') format('woff2');
    font-weight: normal;
    font-style: normal;
}

@font-family-base: 'CustomFont', sans-serif;
```

### Custom Logo

Upload logo via:
- Admin → Content → Design → Configuration
- Select store view
- Header section → Logo Image

Recommended size: 200x60px (transparent PNG)

### Homepage Customization

1. Create CMS page: Admin → Content → Pages
2. Use Page Builder or HTML
3. Set as homepage: Admin → Stores → Configuration → Web → Default Pages

## 📊 Performance Tips

1. **Enable Full Page Cache**:
   ```bash
   php bin/magento cache:enable full_page
   ```

2. **Enable CSS/JS Minification**:
   - Admin → Stores → Configuration → Advanced → Developer
   - Enable Minify HTML, CSS, and JavaScript

3. **Use CDN**:
   - Configure in: Admin → Stores → Configuration → Web → Base URLs

4. **Image Optimization**:
   - Use WebP format
   - Enable lazy loading
   - Compress images before upload

## 🔄 Updates & Maintenance

### Updating Theme

1. Backup current theme
2. Update theme files
3. Run upgrade:
   ```bash
   php bin/magento setup:upgrade
   php bin/magento setup:static-content:deploy -f
   ```

### Version Control

Recommended `.gitignore`:
```
/var/*
/pub/media/*
/pub/static/*
!/pub/static/.htaccess
/generated/*
```

## 📞 Support

For issues or questions:
1. Check troubleshooting section
2. Review Magento 2 documentation
3. Check theme repository issues

## 📄 License

Proprietary - All rights reserved

## 🙏 Credits

- Design inspired by BULK HOMME
- Built on Magento 2 Blank theme
- Following Magento coding standards

---

**Version**: 1.0.0  
**Magento Compatibility**: 2.4.x  
**Last Updated**: November 2025
