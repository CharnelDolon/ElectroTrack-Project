# ElectroTrack

ElectroTrack is a simple inventory management web application for an electronics store, built with PHP and MySQL (no frameworks or third-party packages). It allows store employees to log in, view inventory, search, update quantities, and delete records.

## Features
- Secure login for employees
- View inventory (sorted by product ID)
- Search by product or supplier
- Update product quantities (prepared statements)
- Delete inventory records (prepared statements)

## Project Structure
```
public_html/
  ├── index.php         # Login page
  ├── dashboard.php     # Inventory dashboard
  ├── search.php        # Search handler
  ├── update.php        # Update handler
  ├── delete.php        # Delete handler
  ├── logout.php        # Logout handler
  ├── styles.css        # Basic styles
  └── includes/
      ├── db_connect.php # Database connection
      └── auth.php       # Authentication/session logic
sql/
  ├── create_tables.sql # SQL to create tables
  └── sample_data.sql   # SQL to insert sample data
```

## Setup Instructions

### 1. Install Apache, PHP, and MySQL
- **Do NOT use XAMPP, WAMP, phpMyAdmin, or MySQL Workbench.**
- Download and install [Apache](https://httpd.apache.org/), [PHP](https://windows.php.net/download/), and [MySQL Community Server](https://dev.mysql.com/downloads/mysql/) separately.
- Configure Apache to use PHP by editing `httpd.conf` and adding the PHP module.

### 2. Place Files in Web Root
- Copy the `public_html` folder to your Apache web root (e.g., `C:/Apache24/htdocs/ElectroTrack`).
- Copy the `sql` folder anywhere convenient for running SQL scripts.

### 3. Create the Database and Tables
- Open a MySQL command prompt:
  ```
  mysql -u your_mysql_user -p
  ```
- Run the SQL scripts:
  ```
  source path/to/sql/create_tables.sql;
  source path/to/sql/sample_data.sql;
  ```

### 4. Set MySQL Credentials
- Edit `public_html/includes/db_connect.php` and set your MySQL username and password.

### 5. Set a Real Password Hash for the Admin User
- In PHP, run:
  ```php
  <?php echo password_hash('password', PASSWORD_DEFAULT); ?>
  ```
- Copy the output and replace the hash in `sql/sample_data.sql` for the admin user.
- (Or update the password directly in the database.)

### 6. Start Apache and MySQL
- Start both services.

### 7. Access the Application
- Visit [http://localhost/ElectroTrack/index.php](http://localhost/ElectroTrack/index.php) in your browser.
- Login with the default user:
  - **Username:** admin
  - **Password:** password (or whatever you set)

## Security Notes
- All data-changing SQL uses prepared statements.
- Passwords are hashed (never stored in plain text).
- Sessions are used for authentication.

## Troubleshooting
- If you see connection errors, check your MySQL credentials and that the MySQL server is running.
- If you see blank pages, enable error reporting in PHP for debugging.
- Make sure all file paths are correct and Apache has permission to read the files.

## License
This project is for educational purposes only. 