# 🚀 Deploy MSPORT to Railway NOW!

## ✅ Prerequisites Complete
- ✅ Neon Database Created
- ✅ Database Credentials Ready
- ✅ Code Pushed to GitHub: https://github.com/Achraflgu/test3.git

---

## 📋 STEP 1: Create Railway Project

1. **Go to:** https://railway.app
2. **Sign in** with GitHub (Achraflgu)
3. Click **"New Project"**
4. Select **"Deploy from GitHub repo"**
5. Choose: **`Achraflgu/test3`**
6. Click **"Deploy Now"**

---

## 🔧 STEP 2: Configure Environment Variables

After deployment starts, click on your project, then go to **"Variables"** tab.

Add these environment variables:

```bash
# Database Connection
DB_HOST=ep-green-forest-ag0gs7i6-pooler.c-2.eu-central-1.aws.neon.tech
DB_PORT=5432
DB_NAME=neondb
DB_USER=neondb_owner
DB_PASSWORD=npg_3qhtrFepc5wj

# Database URL (for frameworks)
DATABASE_URL=postgresql://neondb_owner:npg_3qhtrFepc5wj@ep-green-forest-ag0gs7i6-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require

# PG Environment Variables
PGHOST=ep-green-forest-ag0gs7i6-pooler.c-2.eu-central-1.aws.neon.tech
PGUSER=neondb_owner
PGDATABASE=neondb
PGPASSWORD=npg_3qhtrFepc5wj
PGPORT=5432
```

---

## ⚙️ STEP 3: Configure Build Settings

In Railway project settings:

### Build Command (if needed):
```bash
composer install --no-dev --optimize-autoloader
```

### Start Command:
Railway will auto-detect PHP and use the built-in web server.

---

## 🌐 STEP 4: Get Your Domain

1. Go to **"Settings"** tab in Railway
2. Scroll to **"Domains"**
3. Click **"Generate Domain"**
4. You'll get a URL like: `https://your-app.up.railway.app`

---

## ✅ STEP 5: Verify Deployment

1. **Wait** for deployment to complete (2-3 minutes)
2. **Visit** your Railway domain
3. **Test** the website:
   - Homepage loads ✅
   - Products display ✅
   - Database connected ✅

---

## 🔍 STEP 6: Check Database Connection

Create a test file to verify database connection:

**File: `test-db.php`** (you can create this via Railway's file editor)

```php
<?php
require_once 'db_connection_postgres.php';

echo "<h1>Database Connection Test</h1>";

try {
    $stmt = $con->query("SELECT COUNT(*) as count FROM products");
    $result = $stmt->fetch();
    echo "<p>✅ Connected! Found " . $result['count'] . " products</p>";
} catch (Exception $e) {
    echo "<p>❌ Error: " . $e->getMessage() . "</p>";
}
?>
```

Visit: `https://your-app.up.railway.app/test-db.php`

---

## 🎯 Quick Copy: All Environment Variables

```env
DB_HOST=ep-green-forest-ag0gs7i6-pooler.c-2.eu-central-1.aws.neon.tech
DB_PORT=5432
DB_NAME=neondb
DB_USER=neondb_owner
DB_PASSWORD=npg_3qhtrFepc5wj
DATABASE_URL=postgresql://neondb_owner:npg_3qhtrFepc5wj@ep-green-forest-ag0gs7i6-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require
PGHOST=ep-green-forest-ag0gs7i6-pooler.c-2.eu-central-1.aws.neon.tech
PGUSER=neondb_owner
PGDATABASE=neondb
PGPASSWORD=npg_3qhtrFepc5wj
PGPORT=5432
```

---

## 🐛 Troubleshooting

### Issue: "Connection failed"
**Solution:** Double-check environment variables are set correctly

### Issue: "No such table"
**Solution:** Make sure you imported `msport_import.sql` to your Neon database

### Issue: "500 Internal Server Error"
**Solution:** Check Railway logs: Settings → View Logs

---

## 📱 Share Your Project

Once deployed, your MSPORT gym website will be live at:
**`https://your-app.up.railway.app`**

You can add this to your portfolio:
- GitHub: https://github.com/Achraflgu/test3
- Live Site: [Your Railway URL]
- Database: Neon PostgreSQL (Serverless)

---

## 🎉 You're Done!

Your university project is now:
- ✅ Hosted on Railway
- ✅ Using Neon PostgreSQL
- ✅ Available 24/7
- ✅ Ready for your portfolio

---

**Need help?** Check Railway logs or Neon dashboard for any issues.

