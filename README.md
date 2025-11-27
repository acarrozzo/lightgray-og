# LGRPG

A PHP-based RPG game with MySQL database backend.

## Setup Instructions

### Prerequisites
- PHP 7.0 or higher
- MySQL/MariaDB
- Composer (for dependency management)
- Node.js and npm (for front-end assets)

### Installation

1. **Clone the repository**
   ```bash
   git clone <your-repository-url>
   cd lg-og
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Configure the database connection**
   
   Copy the example database connection file:
   ```bash
   cp db-connect.example.php db-connect.php
   ```

5. **Set up environment variables**
   
   Create a `.env` file in the root directory with the following variables:
   ```env
   # Local Database Configuration
   DB_USER_LOCAL=your_local_username
   DB_PASSWORD_LOCAL=your_local_password
   DB_NAME_LOCAL=your_local_database_name
   DB_HOST_LOCAL=localhost
   DB_PORT_LOCAL=3306

   # Production Database Configuration
   DB_USER=your_production_username
   DB_PASSWORD=your_production_password
   DB_NAME=your_production_database_name
   DB_HOST=your_production_host
   DB_PORT=3306
   ```

6. **Build assets (optional)**
   ```bash
   npm run build
   # or for Grunt
   grunt
   ```

7. **Set up your web server**
   
   Point your web server (Apache/Nginx) to the project root directory.

## Important Files Not in Repository

The following files contain sensitive information and are not tracked by git:
- `db-connect.php` - Database connection configuration
- `.env` - Environment variables with credentials
- `_mmServerScripts/` - Server-side database scripts
- Log files (`*.log`, `log.html`)
- Test files (`test-*.php`)

Make sure to create these files based on the provided examples for your local setup.

## Development

This is a legacy PHP project with some modern tooling:
- Grunt for task automation
- SASS/SCSS for styling
- RPG Awesome and Font Awesome for icons

## Security Note

Never commit sensitive files like database credentials to the repository. Always use environment variables and keep your `.env` file secure.
