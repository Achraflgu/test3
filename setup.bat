@echo off
REM MSPORT Deployment Setup Script for Windows
REM This script helps prepare your project for deployment

echo ==================================
echo   MSPORT Deployment Setup
echo ==================================
echo.

REM Check if .env exists
echo 1. Checking environment configuration...
if exist .env (
    echo [OK] .env file exists
) else (
    echo [WARNING] .env file not found
    if exist env.example (
        echo Creating .env from env.example...
        copy env.example .env > nul
        echo [OK] Created .env file
        echo [WARNING] Please update .env with your actual credentials!
    ) else (
        echo [ERROR] env.example not found!
    )
)
echo.

REM Check database connection
echo 2. Checking database connection...
findstr /C:"pgsql" db_connection.php > nul 2>&1
if %ERRORLEVEL% EQU 0 (
    echo [OK] Database connection configured for PostgreSQL
) else (
    findstr /C:"pgsql" db_connection_postgres.php > nul 2>&1
    if %ERRORLEVEL% EQU 0 (
        echo [WARNING] PostgreSQL connection file exists but not active
        echo    Run: copy db_connection_postgres.php db_connection.php
    ) else (
        echo [WARNING] Using MySQL connection (needs migration for Neon)
    )
)
echo.

REM Check PHP
echo 3. Checking PHP requirements...
php -v > nul 2>&1
if %ERRORLEVEL% EQU 0 (
    echo [OK] PHP installed
    php -v | findstr /C:"PHP"
) else (
    echo [ERROR] PHP not found! Please install PHP 8.0 or higher
)
echo.

REM Check Git
echo 4. Checking version control...
git --version > nul 2>&1
if %ERRORLEVEL% EQU 0 (
    echo [OK] Git installed
    if exist .git (
        echo [OK] Git repository initialized
    ) else (
        echo [WARNING] Git repository not initialized
        echo    Run: git init
    )
) else (
    echo [ERROR] Git not found! Install Git for deployment
    echo    Download from: https://git-scm.com/download/win
)
echo.

REM Check Composer
echo 5. Checking dependency manager...
composer --version > nul 2>&1
if %ERRORLEVEL% EQU 0 (
    echo [OK] Composer installed
    if exist composer.json (
        echo [OK] composer.json found
        echo    Run 'composer install' to install dependencies
    )
) else (
    echo [WARNING] Composer not found (optional but recommended)
    echo    Download from: https://getcomposer.org/download/
)
echo.

REM Check directory structure
echo 6. Checking directory structure...
if exist admin (
    echo [OK] Directory admin exists
) else (
    echo [WARNING] Directory admin not found
)
if exist assets (
    echo [OK] Directory assets exists
) else (
    echo [WARNING] Directory assets not found
)
if exist admin\uploads (
    echo [OK] Directory admin\uploads exists
) else (
    echo [WARNING] Directory admin\uploads not found
)
echo.

REM Check critical files
echo 7. Checking critical files...
if exist index.php (
    echo [OK] File index.php exists
) else (
    echo [ERROR] File index.php missing!
)
if exist shop.php (
    echo [OK] File shop.php exists
) else (
    echo [ERROR] File shop.php missing!
)
if exist admin\index.php (
    echo [OK] File admin\index.php exists
) else (
    echo [ERROR] File admin\index.php missing!
)
if exist msport.sql (
    echo [OK] File msport.sql exists
) else (
    echo [ERROR] File msport.sql missing!
)
echo.

REM Check .gitignore
echo 8. Checking Git ignore configuration...
if exist .gitignore (
    echo [OK] .gitignore exists
    findstr /C:".env" .gitignore > nul
    if %ERRORLEVEL% EQU 0 (
        echo [OK] .env is ignored by Git
    ) else (
        echo [WARNING] .env should be in .gitignore
    )
) else (
    echo [WARNING] .gitignore not found
    echo    Create .gitignore to prevent committing sensitive files
)
echo.

REM Summary
echo ==================================
echo   Setup Summary
echo ==================================
echo.
echo Next steps:
echo   1. Update .env with your database credentials
echo   2. If using PostgreSQL (Railway/Neon):
echo      - Run: copy db_connection_postgres.php db_connection.php
echo      - Import: msport_postgres.sql (if available)
echo   3. Initialize Git (if not done):
echo      - git init
echo      - git add .
echo      - git commit -m "Initial commit"
echo   4. Push to GitHub
echo   5. Deploy to Railway or your chosen platform
echo.
echo Documentation:
echo   - Railway deployment: deployment-guide.md
echo   - Alternative hosting: ALTERNATIVE_HOSTING.md
echo   - Deployment checklist: DEPLOYMENT_CHECKLIST.md
echo.
echo Testing:
echo   - Local: php -S localhost:8000
echo   - Then visit: http://localhost:8000
echo.
echo ==================================
echo [OK] Setup check complete!
echo ==================================
echo.
pause

