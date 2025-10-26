# Franken UI Integration for Twig

## Overview
Franken UI is now integrated into your Twig application! It's a HTML-first, Shadcn alternative UI library that works seamlessly with Twig templates.

## What's Been Added

### 1. Base Template Integration
- Franken UI CSS via CDN
- Franken UI JavaScript module
- Custom CSS variables for theming
- Ready-to-use component styling

### 2. Available Features

#### Components You Can Use:
- **Buttons**: Various styles and sizes
- **Cards**: Content containers with shadows
- **Alerts**: Notification and info messages
- **Forms**: Input fields and labels
- **Badges**: Small labels and tags
- **Modals**: Dialog windows
- **Dropdowns**: Menu dropdowns
- **Tabs**: Tabbed content sections
- **Accordions**: Collapsible content
- **And more...** (see franken-ui.dev/docs)

### 3. Usage Examples

#### Basic Button
```html
<button class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-700">
    Click Me
</button>
```

#### Card Component
```html
<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-bold mb-2">Card Title</h3>
    <p>Card content goes here...</p>
</div>
```

#### Alert Component
```html
<div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded">
    <p>This is an alert message!</p>
</div>
```

### 4. Customization

#### Theme Colors (in base.html.twig)
```css
:root {
    --franken-primary: 221 83% 53%;
    --franken-primary-foreground: 0 0% 100%;
    --franken-border: 214.3 31.8% 91.4%;
    --franken-radius: 0.5rem;
}
```

#### Using Custom Colors
```twig
<div class="bg-primary">Primary color</div>
<div class="bg-secondary">Secondary color</div>
<div class="border border-border">Border color</div>
```

## Documentation

- **Official Site**: https://franken-ui.dev
- **Components**: https://franken-ui.dev/docs/2.1/components
- **Installation**: https://franken-ui.dev/docs/2.1/installation

## Benefits Over Plain Tailwind

1. **Pre-built Components**: Ready-to-use components
2. **Consistent Design**: Unified design system
3. **Accessibility**: Built-in ARIA attributes
4. **Theming**: Easy color customization
5. **Framework-Agnostic**: Works with any backend

## Next Steps

1. Visit https://franken-ui.dev to browse all available components
2. Copy component HTML from the docs
3. Use them directly in your Twig templates
4. Customize colors and styles as needed

## Example Integration

Check out `templates/home.html.twig` for examples of Franken UI components in action!
