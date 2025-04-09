Itrro PHP Mini Framework

Itrro is a lightweight custom PHP mini framework built for performance and simplicity. Ideal for personal or niche web projects, it provides a basic routing mechanism, system configuration, controller handling, and admin support.


---

Features

Simple and clean routing system

Easy controller and view management

Admin panel ready (optional, remove if not needed)

Static pages setup (DMCA, About, USC, etc.)



---

Requirements

PHP 7.2 or higher

Apache with mod_rewrite enabled



---

Installation

1. Clone or download the repo:

git clone https://github.com/yourusername/itrro-framework.git


2. Place the contents inside your web root (e.g., htdocs or public_html).


3. Ensure .htaccess file is present in the root for clean URLs.


4. Set proper permissions for necessary files and folders.


5. Configure your virtual host (if needed) to point to index.php.




---

Folder Structure

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


---

Routing

Routes are defined in public/route.php:

Router::add('/', 'home.php');
Router::add('/about', 'html/about.php');
Router::add('/video/{name}/{id}', 'view.php');
Router::add('/tags/{name}', 'tags.php');
Router::add('/category/{name}', 'category.php');


---

Accessing Parameters

Inside view.php or any routed file, you can access route parameters like this:

$name = $params['name'];
$id = $params['id'];


---

Creating New Pages

1. Create a new PHP file (e.g., contact.php) in appropriate folder.


2. Add route in public/route.php:



Router::add('/contact', 'contact.php');

3. Or for dynamic:



Router::add('/profile/{username}', 'profile.php');


---

Admin Panel

Accessible via:

http://yourdomain.com/admin/

Ensure you secure the admin/ folder with login credentials or basic auth. (Optional – remove if not needed)


---

License

MIT License – You are free to use, modify, and distribute.


---

Author

Aman – Made with passion for learning and fun.



README ab update kar diya gaya hai with:

{name} style route support

Dynamic parameter explanation

Admin panel marked optional

Tumhari site se related parts hata diye gaye


Agar aur kisi section ko improve karna ho (jaise controller usage ya middleware future me), toh bata dena.

