@echo off
REM Quick Deployment Script for MSPORT to GitHub
REM Repository: https://github.com/Achraflgu/test3.git

echo ========================================
echo   MSPORT GitHub Deployment Script
echo ========================================
echo.

echo Step 1: Creating .env file...
if not exist .env (
    copy env.example .env
    echo [OK] .env file created
    echo [WARNING] You'll need to update .env with Neon credentials later!
) else (
    echo [OK] .env file already exists
)
echo.

echo Step 2: Updating database connection for PostgreSQL...
copy db_connection_postgres.php db_connection.php
echo [OK] Database connection updated
echo.

echo Step 3: Checking Git status...
git status
echo.

echo Step 4: Initializing Git (if needed)...
git init
git branch -M main
echo [OK] Git initialized
echo.

echo Step 5: Adding files to Git...
git add .
echo [OK] Files staged
echo.

echo Step 6: Checking what will be committed...
echo.
echo === Files to be committed ===
git status
echo.
echo [VERIFY] Make sure .env is NOT in the list above!
echo.
pause

echo Step 7: Committing files...
git commit -m "Initial commit - MSPORT e-commerce platform ready for deployment"
echo [OK] Files committed
echo.

echo Step 8: Adding GitHub remote...
git remote remove origin 2>nul
git remote add origin https://github.com/Achraflgu/test3.git
echo [OK] Remote added
echo.

echo Step 9: Pushing to GitHub...
echo.
echo You may be asked for credentials:
echo Username: Achraflgu
echo Password: Use your Personal Access Token (NOT your GitHub password)
echo.
echo If you don't have a token, get one at:
echo https://github.com/settings/tokens
echo (Select 'repo' scope when creating)
echo.
pause

git push -u origin main

if %ERRORLEVEL% EQU 0 (
    echo.
    echo ========================================
    echo   SUCCESS! Code pushed to GitHub!
    echo ========================================
    echo.
    echo Check your repository:
    echo https://github.com/Achraflgu/test3
    echo.
    echo ========================================
    echo   NEXT STEPS:
    echo ========================================
    echo.
    echo 1. Create Neon database at: https://neon.tech
    echo 2. Save your Neon credentials
    echo 3. Create Railway project at: https://railway.app
    echo 4. Connect Railway to your GitHub repo
    echo 5. Add environment variables in Railway
    echo.
    echo Full guide: Open DEPLOY_NOW.md
    echo.
) else (
    echo.
    echo ========================================
    echo   Push Failed!
    echo ========================================
    echo.
    echo Common issues:
    echo 1. Wrong credentials - use Personal Access Token
    echo 2. Repository not empty - try: git push -f origin main
    echo 3. No internet connection
    echo.
    echo Get help in DEPLOY_NOW.md
    echo.
)

pause


