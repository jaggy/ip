# IP Management
This is a simple IP Management project. 

[View demo here](https://ip.jag.gy)

Email: jaggy@humans.ph
Password: password

## Requirements
To set it up locally, you must have the following installed:
- PHP 8.1 or higher
- Node 20 or higher
- MySQL 8


## Quick Setup
If you have everything installed, you can run a setup script to get the project set up in your machine.

```
sh scripts/setup.sh
```

If you're using Valet or Herd, you can visit the project via [project-name].test. You can also start a server by running `php artisan serve`.

---

## Manual

### 1. Create your database
```
mysql -uroot -e "create database ip_management if not exists";
```

### 2. Configure your `.env`
Copy the `.env.example` file to `.env`.
```
cp .env.example .env
```

Update the `.env` file with your database config.

 
### 2. Install the dependencies
```
composer install
npm ci
```

### 3. Build the front-end assets
```
npm run build
```

### 4. Set up the database.
```
php artisan migrate --seed
```

### 5. View the project
If you're using Valet or Herd, you can visit the project via [project-name].test.

If you not, you can start your server by running `php artisan serve`.
