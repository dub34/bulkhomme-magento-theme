# BULK HOMME Magento 2 Theme - CSS Version

Минималистичная премиум тема для Magento 2 на чистом CSS (без LESS).

## 🎨 Особенности

- ✅ **Чистый CSS** - без препроцессоров
- ✅ **CSS Variables** - легкая кастомизация
- ✅ **Minimalist Design** - черно-белая эстетика
- ✅ **Sharp Corners** - border-radius: 0
- ✅ **Responsive** - mobile-first подход
- ✅ **Performance** - быстрая загрузка
- ✅ **Modern** - современные практики

## 📦 Что включено

```
BulkHomme/default/
├── registration.php
├── theme.xml
├── composer.json
├── README.md
├── web/
│   └── css/
│       └── styles/
│           ├── variables.css    # CSS переменные
│           └── theme.css        # Основные стили
├── media/
│   └── preview.jpg
└── Magento_Theme/
    └── layout/
        └── default_head_blocks.xml
```

## 🚀 Установка через Git

### 1. Clone репозиторий в тему

```bash
cd ~/web/shop-se.valet.business/public_html/app/design/frontend
mkdir -p BulkHomme
cd BulkHomme

# Клонируем тему
git clone YOUR_GIT_REPO_URL default

# Или если уже склонировали в другое место
git clone YOUR_GIT_REPO_URL bulkhomme-theme
mv bulkhomme-theme default
```

### 2. Установить тему

```bash
cd ~/web/shop-se.valet.business/public_html

# Очистить кеши
rm -rf var/cache/* var/page_cache/* var/view_preprocessed/* pub/static/frontend/* generated/*

# Установка
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```

### 3. Активировать в Admin Panel

1. **Content → Design → Configuration**
2. Выберите store view → **Edit**
3. **Applied Theme**: BULK HOMME Default Theme
4. **Save Configuration**
5. Очистите кеш: `php bin/magento cache:flush`

## 🎨 Кастомизация

### Изменить цвета

Откройте `web/css/styles/variables.css`:

```css
:root {
    /* Измените основной цвет */
    --color-primary: #1A1A1A;  /* вместо #000000 */
    
    /* Добавьте свой акцентный цвет */
    --color-accent: #FF0000;
}
```

### Изменить шрифты

```css
:root {
    --font-family-base: 'Montserrat', sans-serif;
    --font-size-base: 18px;
}
```

### Добавить border-radius

```css
:root {
    --border-radius: 4px;  /* вместо 0 */
}
```

### Изменить spacing

```css
:root {
    --spacing-lg: 20px;  /* вместо 16px */
    --spacing-xl: 32px;  /* вместо 24px */
}
```

## 🔧 Применить изменения

После любых изменений в CSS:

```bash
cd ~/web/shop-se.valet.business/public_html

# Очистить static content
rm -rf pub/static/frontend/* var/view_preprocessed/*

# Развернуть заново
php bin/magento setup:static-content:deploy -f

# Очистить кеш
php bin/magento cache:flush
```

## 💡 Преимущества CSS версии

1. **Быстрее** - нет компиляции LESS
2. **Проще** - обычный CSS, знакомый всем
3. **Динамичнее** - можно менять через JS
4. **Совместимее** - работает везде
5. **Удобнее** - легче дебажить в DevTools

## 📐 CSS Variables

Все переменные в одном месте:

```css
/* Цвета */
--color-primary: #000000
--color-secondary: #FFFFFF
--color-grey-*: 10 оттенков

/* Типографика */
--font-size-h1: 64px (desktop) / 32px (mobile)
--font-weight-*: 300-700

/* Spacing */
--spacing-xs: 2px
--spacing-7xl: 128px

/* Transitions */
--transition-fast: 0.15s
--transition-base: 0.3s
```

## 📱 Responsive

Breakpoints:
- Mobile: < 576px
- Tablet: 768px - 1023px
- Desktop: 1024px+

## 🎯 Структура CSS

```css
/* variables.css */
- Все CSS переменные
- Цвета, шрифты, spacing, shadows

/* theme.css */
- Базовые стили (body, typography)
- Компоненты (buttons, forms, cards)
- Layout (header, footer, grid)
- Utilities (margin, padding helpers)
```

## 🔍 Troubleshooting

### Стили не применяются

```bash
rm -rf pub/static/* var/view_preprocessed/*
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```

### CSS не обновляется

1. Очистить browser cache (Ctrl+Shift+R)
2. Проверить что файлы в `pub/static/frontend/BulkHomme/default/`
3. Проверить что `default_head_blocks.xml` правильный

### DevTools показывает старые стили

```bash
# Полная очистка
rm -rf var/cache/* var/page_cache/* var/view_preprocessed/* pub/static/* generated/*
php bin/magento setup:static-content:deploy -f
```

## 📚 Дополнительно

### Git Workflow

```bash
# Создать новую ветку для изменений
git checkout -b feature/custom-colors

# Внести изменения в CSS
# Закоммитить
git add .
git commit -m "Update primary color"

# Push в репозиторий
git push origin feature/custom-colors

# На сервере pull изменения
cd app/design/frontend/BulkHomme/default
git pull origin feature/custom-colors

# Применить на сайте
cd ~/web/shop-se.valet.business/public_html
php bin/magento setup:static-content:deploy -f
```

### Production Deploy

```bash
# Переключить в production mode
php bin/magento deploy:mode:set production

# Включить CSS minification
# Admin → Stores → Configuration → Developer → CSS Settings
# Minify CSS: Yes
```

## 🌟 Ключевые стили

- **Black & White**: Контрастный минимализм
- **Sharp Corners**: Современный вид
- **Generous Spacing**: Воздушный layout
- **Bold Typography**: Четкая иерархия
- **Smooth Transitions**: Приятные анимации

## 📄 Версия

- **Version**: 2.0.0
- **Magento**: 2.4.x
- **PHP**: 8.1+
- **Base Theme**: Magento/luma

## 📞 Support

- GitHub Issues
- Documentation: README.md

---

**Made with ❤️ for beautiful e-commerce**
