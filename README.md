# Blog Website
1. Install the LIL.PHP
   `git clone https://github.com/imp-sike/lil.php blog_platform`
2. Change `config/ConfigClass.php`
```php
class ConfigClass {
    public static $db_host = "localhost";
    public static $db_name = "blog_lilphp";   // <-- changed this
    public static $db_port = "3306";
    public static $db_uname = "root";
    public static $db_pass = "";
    public static $base_uri = "/lil.php-examples/blog";  // <-- changed this
}
```
3. Create and run the migration file
4. Create models
5. Create views and controllers