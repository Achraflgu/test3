#!/bin/bash

# MSPORT Deployment Setup Script
# This script helps prepare your project for deployment

echo "=================================="
echo "  MSPORT Deployment Setup"
echo "=================================="
echo ""

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Function to print colored output
print_success() {
    echo -e "${GREEN}✓ $1${NC}"
}

print_error() {
    echo -e "${RED}✗ $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠ $1${NC}"
}

print_info() {
    echo -e "ℹ $1"
}

# Check if .env exists
echo "1. Checking environment configuration..."
if [ -f ".env" ]; then
    print_success ".env file exists"
else
    print_warning ".env file not found"
    if [ -f "env.example" ]; then
        echo "Creating .env from env.example..."
        cp env.example .env
        print_success "Created .env file"
        print_warning "Please update .env with your actual credentials!"
    else
        print_error "env.example not found!"
    fi
fi
echo ""

# Check if db_connection.php is updated
echo "2. Checking database connection..."
if grep -q "pgsql" "db_connection.php" 2>/dev/null; then
    print_success "Database connection configured for PostgreSQL"
elif grep -q "pgsql" "db_connection_postgres.php" 2>/dev/null; then
    print_warning "PostgreSQL connection file exists but not active"
    echo "   Run: cp db_connection_postgres.php db_connection.php"
else
    print_warning "Using MySQL connection (needs migration for Neon)"
fi
echo ""

# Check for required PHP extensions
echo "3. Checking PHP requirements..."
php -v > /dev/null 2>&1
if [ $? -eq 0 ]; then
    PHP_VERSION=$(php -v | head -n 1 | cut -d ' ' -f 2 | cut -d '.' -f 1,2)
    print_success "PHP installed (version $PHP_VERSION)"
    
    # Check extensions
    required_extensions=("pdo" "pgsql" "pdo_pgsql" "mbstring" "gd" "json")
    for ext in "${required_extensions[@]}"; do
        if php -m | grep -i "^$ext$" > /dev/null 2>&1; then
            print_success "Extension $ext available"
        else
            print_warning "Extension $ext not found (may be needed)"
        fi
    done
else
    print_error "PHP not found! Please install PHP 8.0 or higher"
fi
echo ""

# Check for Git
echo "4. Checking version control..."
if command -v git &> /dev/null; then
    print_success "Git installed"
    if [ -d ".git" ]; then
        print_success "Git repository initialized"
    else
        print_warning "Git repository not initialized"
        echo "   Run: git init"
    fi
else
    print_error "Git not found! Install Git for deployment"
fi
echo ""

# Check for Composer
echo "5. Checking dependency manager..."
if command -v composer &> /dev/null; then
    print_success "Composer installed"
    if [ -f "composer.json" ]; then
        print_success "composer.json found"
        echo "   Run 'composer install' to install dependencies"
    fi
else
    print_warning "Composer not found (optional but recommended)"
fi
echo ""

# Check directory structure
echo "6. Checking directory structure..."
required_dirs=("admin" "assets" "admin/uploads")
for dir in "${required_dirs[@]}"; do
    if [ -d "$dir" ]; then
        print_success "Directory $dir exists"
    else
        print_warning "Directory $dir not found"
    fi
done
echo ""

# Check critical files
echo "7. Checking critical files..."
critical_files=("index.php" "shop.php" "admin/index.php" "msport.sql")
for file in "${critical_files[@]}"; do
    if [ -f "$file" ]; then
        print_success "File $file exists"
    else
        print_error "File $file missing!"
    fi
done
echo ""

# Check .gitignore
echo "8. Checking Git ignore configuration..."
if [ -f ".gitignore" ]; then
    print_success ".gitignore exists"
    if grep -q ".env" ".gitignore"; then
        print_success ".env is ignored by Git"
    else
        print_warning ".env should be in .gitignore"
    fi
else
    print_warning ".gitignore not found"
    echo "   Create .gitignore to prevent committing sensitive files"
fi
echo ""

# Summary
echo "=================================="
echo "  Setup Summary"
echo "=================================="
echo ""

print_info "Next steps:"
echo "  1. Update .env with your database credentials"
echo "  2. If using PostgreSQL (Railway/Neon):"
echo "     - Run: cp db_connection_postgres.php db_connection.php"
echo "     - Import: msport_postgres.sql (if available)"
echo "  3. Initialize Git (if not done):"
echo "     - git init"
echo "     - git add ."
echo "     - git commit -m 'Initial commit'"
echo "  4. Push to GitHub"
echo "  5. Deploy to Railway or your chosen platform"
echo ""

print_info "Documentation:"
echo "  - Railway deployment: deployment-guide.md"
echo "  - Alternative hosting: ALTERNATIVE_HOSTING.md"
echo "  - Deployment checklist: DEPLOYMENT_CHECKLIST.md"
echo ""

print_info "Testing:"
echo "  - Local: php -S localhost:8000"
echo "  - Then visit: http://localhost:8000"
echo ""

echo "=================================="
print_success "Setup check complete!"
echo "=================================="

