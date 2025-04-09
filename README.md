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
   git clone https://github.com/djaman/itrro-framework.git
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

## Database Class Usage Guide

This framework includes a lightweight custom `database` class built using PDO (PHP Data Objects) for safe and easy database interactions.

---

### Initialization

Use the static method `getIntance()` to create a database connection instance:


`$db = database::getIntance();`


> Note: Database credentials are hardcoded in getIntance(). You can update them as needed.

---

## Methods

1. get($query)

   Used to fetch records from the database.
   ```
   $result = $db->get("SELECT * FROM users WHERE status = 1");

   foreach ($result as $row) {
      echo $row['username'];
   }
   ```
2. insert($query)

   Used to insert new records into the database.
   ```
   $success = $db->insert("INSERT INTO users (username, email) VALUES ('john', 'john@example.com')");
   if ($success) {
      echo "User added successfully!";
   }
   ```
3. update($query)

   Used to update existing records.
   ```
   $success = $db->update("UPDATE users SET status = 1 WHERE id = 5");
   ```
4. getCount($query)

    Returns a single count value from the database.
    ```
    $total = $db->getCount("SELECT COUNT(*) FROM users WHERE status = 1");
    echo "Active users: $total";
    ```

---

## Example Usage in Controller
```
require_once "system/database.php";

$db = database::getIntance();
$users = $db->get("SELECT * FROM users LIMIT 5");

foreach ($users as $user) {
  echo $user['username'];
}
```

---

## Notes

This class uses prepared statements for queries.

You are expected to write raw SQL queries when using these methods.

For advanced querying, you can expand this class further with parameter binding, transactions, etc.



---

## License

MIT License – You are free to use, modify, and distribute.


---

## Author

Aman – Made with passion for learning and fun.
