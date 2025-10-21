@echo off
REM Prepare MSPORT for GitHub Desktop
REM Run this BEFORE opening in GitHub Desktop

echo ========================================
echo   Prepare MSPORT for GitHub Desktop
echo ========================================
echo.

echo This script prepares your files for easy deployment
echo using GitHub Desktop (no token needed!)
echo.

echo Step 1: Creating .env file...
if not exist .env (
    copy env.example .env
    echo [OK] .env created
) else (
    echo [OK] .env already exists
)
echo.

echo Step 2: Updating database connection for PostgreSQL...
copy db_connection_postgres.php db_connection.php
echo [OK] Database connection updated for PostgreSQL/Neon
echo.

echo Step 3: Verifying .gitignore exists...
if exist .gitignore (
    echo [OK] .gitignore exists - .env will not be committed
) else (
    echo [WARNING] .gitignore not found!
)
echo.

echo ========================================
echo   Files Ready!
echo ========================================
echo.
echo NEXT STEPS:
echo.
echo 1. Download GitHub Desktop (if you don't have it):
echo    https://desktop.github.com
echo.
echo 2. Open GitHub Desktop
echo.
echo 3. File -^> Add local repository
echo.
echo 4. Browse to: C:\Users\HUNTPC\Downloads\MSPORT
echo.
echo 5. If asked to initialize:
echo    - Click "create a repository"
echo    - Name: test3
echo.
echo 6. Commit your changes:
echo    - Summary: "Initial commit - MSPORT deployment"
echo    - Click "Commit to main"
echo.
echo 7. Publish repository:
echo    - Click "Publish repository"
echo    - Name: test3
echo    - Uncheck "Keep this code private" (for portfolio)
echo    - Click "Publish repository"
echo.
echo 8. Done! Check: https://github.com/Achraflgu/test3
echo.
echo ========================================
echo   No token needed with GitHub Desktop!
echo ========================================
echo.
echo Full guide: Open DEPLOY_EASY_NO_TOKEN.md
echo.
pause


