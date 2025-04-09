# Itrro PHP Mini Framework

Itrro is a lightweight and fast PHP mini framework designed for small-scale personal or niche websites. It offers simple routing, controller handling, and clean URL structures without any external dependencies. and without regex route simple route system.

---

## Features

- Lightweight and fast
- Clean folder structure
- Custom route handling with dynamic parameters like `{name}`
- Static page support (e.g., About, Contact, DMCA)
- Easy to expand and modify
- Optional admin panel (you can remove or customize it)

---
## Requirements

- PHP 7.2 or higher
- Apache server (with mod_rewrite enabled)
- Composer (optional, not required by default)

---

## Installation

1. Clone the repository or download the ZIP:
   ``` bash
   git clone https://github.com/yourusername/itrro-framework.git
   ```
2. Place the contents inside your web root (e.g., `htdocs` or `public_html`).

3. Ensure `.htaccess` file is present in the root for clean URLs.

4. Set proper permissions for necessary files and folders.

5. Configure your virtual host (if needed) to point to `index.php`.

---

## Folder Structure
```
itrro/
├── index.php                # Main entry file
├── .htaccess                # URL rewriting
├── public/route.php         # Route definitions
├── system/                  # Core framework logic
│   ├── boot.php             # Bootstrapper
│   ├── database.php         # DB handler (if needed)
│   └── routeHandler.php     # Router logic
├── admin/                   # Admin panel files (optional)
├── html/                    # Static page templates
└── assets/                  # CSS and image assets
```

---

## Routing

Routes are defined in `public/route.php`:
```
Router::add('/', 'home.php');
Router::add('/about', 'html/about.php');
Router::add('/video/:name', 'view.php');
Router::add('/tags/:tag', 'tags.php');
Router::add('/category/:name', 'category.php');
```

---

## Accessing Parameters

Inside `view.php` or any routed file, you can access route parameters like this:
```
$name = $params['name'];
$id = $params['id'];
```

---

## Creating New Pages

1. Create a new PHP file (e.g., contact.php) in appropriate folder.


2. Add route in `public/route.php`:



   `Router::add('/contact', 'contact.php');`

3. Or for dynamic:



   `Router::add('/profile/:username', 'profile.php');`


---

## License

MIT License – You are free to use, modify, and distribute.


---

## Author

Aman – Made with passion for learning and fun.
