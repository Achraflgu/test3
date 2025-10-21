# 🚀 Deploy MSPORT to Railway + Neon

## Your Deployment Plan
- **GitHub Repo**: https://github.com/Achraflgu/test3.git
- **Platform**: Railway (Free tier)
- **Database**: Neon PostgreSQL (Free tier)

---

## 📋 What You'll Need (Get These Ready)

- [x] GitHub account (you have this: Achraflgu)
- [ ] Railway account → Sign up at https://railway.app
- [ ] Neon account → Sign up at https://neon.tech
- [ ] Git installed on your computer
- [ ] Time: ~1 hour

---

## 🎯 Phase 1: Push to GitHub (15 minutes)

### Step 1: Initialize Git (if not done)

Open Terminal/PowerShell in your MSPORT folder:

```bash
# Check if git is initialized
git status
```

**If you see "not a git repository"**, run:
```bash
git init
git branch -M main
```

### Step 2: Create .env file (IMPORTANT!)

```bash
# Copy the example file
copy env.example .env
```

**Don't edit .env yet** - we'll fill it in after creating the database.

### Step 3: Update Database Connection

```bash
# Replace db_connection.php with PostgreSQL version
copy db_connection_postgres.php db_connection.php
```

### Step 4: Add Files to Git

```bash
# Add all files (except those in .gitignore)
git add .

# Check what will be committed (should NOT include .env)
git status
```

**Verify**: `.env` should NOT appear in the list!

### Step 5: Commit Your Code

```bash
git commit -m "Initial commit - MSPORT e-commerce platform ready for deployment"
```

### Step 6: Push to GitHub

```bash
# Add your repository
git remote add origin https://github.com/Achraflgu/test3.git

# Push to GitHub
git push -u origin main
```

**If it asks for credentials:**
- Username: `Achraflgu`
- Password: Use a **Personal Access Token** (not your GitHub password)
  - Get token at: https://github.com/settings/tokens
  - Select: `repo` scope
  - Copy the token and use it as password

✅ **Success Check**: Visit https://github.com/Achraflgu/test3 - you should see all your files!

---

## 🗄️ Phase 2: Create Neon Database (20 minutes)

### Step 1: Sign Up for Neon

1. Go to https://neon.tech
2. Click "Sign up"
3. Sign up with GitHub (easiest) or email
4. Verify your email if needed

### Step 2: Create a New Project

1. Click **"Create a project"** or **"New Project"**
2. Fill in:
   - **Project name**: `msport-database`
   - **Region**: Choose closest to you (Europe/US)
   - **PostgreSQL version**: 15 or 16 (latest stable)
3. Click **"Create project"**

### Step 3: Get Connection Details

After creation, you'll see:

```
Connection String:
postgresql://username:password@host.neon.tech/dbname?sslmode=require
```

**SAVE THESE SEPARATELY:**
- Host: `ep-xxxxx-xxxxx.neon.tech`
- Database: `msport` (or neondb - you can rename)
- User: `username`
- Password: `your-password`
- Port: `5432`

**IMPORTANT**: Copy the connection string to a safe place!

### Step 4: Create Database Tables

**Option A: Using Neon Console**

1. In Neon dashboard, go to **"SQL Editor"**
2. You'll need to convert MySQL to PostgreSQL first

**Option B: Using psql (Recommended)**

First, install PostgreSQL client if you don't have it:
- **Windows**: Download from https://www.postgresql.org/download/windows/
- **Mac**: `brew install postgresql`
- **Linux**: `sudo apt-get install postgresql-client`

Then run:
```bash
# Connect to your Neon database
psql "postgresql://username:password@host.neon.tech/dbname?sslmode=require"
```

**You'll need the PostgreSQL version of your database.**

### Step 5: Convert MySQL to PostgreSQL

I'll create a converter script for you in the next step. For now, note that the main changes are:
- `AUTO_INCREMENT` → `SERIAL`
- `TINYINT(1)` → `BOOLEAN`
- Remove `ENGINE=InnoDB`
- Remove `CHARSET=utf8mb4`

✅ **Success Check**: You can connect to Neon and see your database listed.

---

## 🚂 Phase 3: Deploy to Railway (25 minutes)

### Step 1: Sign Up for Railway

1. Go to https://railway.app
2. Click **"Login"** or **"Start a New Project"**
3. **Sign in with GitHub** (easiest option)
4. Authorize Railway to access your GitHub repos

### Step 2: Create New Project

1. Click **"New Project"**
2. Select **"Deploy from GitHub repo"**
3. Choose **"Achraflgu/test3"**
4. Railway will detect PHP automatically

### Step 3: Configure Environment Variables

1. In Railway dashboard, click on your project
2. Go to **Variables** tab
3. Click **"Add Variable"** and add these:

```
DB_HOST=your-neon-host.neon.tech
DB_NAME=msport
DB_USER=your-neon-username
DB_PASSWORD=your-neon-password
DB_PORT=5432
APP_ENV=production
APP_DEBUG=false
```

Replace the values with your actual Neon credentials from Phase 2!

### Step 4: Wait for Deployment

Railway will automatically:
- ✅ Detect PHP from your files
- ✅ Use `nixpacks.toml` configuration
- ✅ Install PHP 8.2 and extensions
- ✅ Deploy your application

**Watch the logs** in the **Deployments** tab.

### Step 5: Get Your URL

1. Go to **Settings** tab
2. Under **Networking**, find **"Generate Domain"**
3. Click it to get your Railway URL: `your-app.railway.app`
4. Copy this URL!

✅ **Success Check**: Visit your Railway URL - you should see your site!

---

## ✅ Phase 4: Final Configuration & Testing (10 minutes)

### Step 1: Update Base URL (if needed)

If your code has hardcoded URLs like `http://localhost`, update them:

1. Search your code for `localhost`
2. Replace with your Railway URL
3. Commit and push:
   ```bash
   git add .
   git commit -m "Update URLs for production"
   git push
   ```

Railway will automatically redeploy!

### Step 2: Test Everything

Visit your Railway URL and test:

**Frontend:**
- [ ] Homepage loads
- [ ] Products display
- [ ] Search works
- [ ] Shopping cart functions
- [ ] User registration
- [ ] User login
- [ ] Blog loads

**Backend:**
- [ ] Visit: `your-app.railway.app/admin`
- [ ] Login with: `admin1@gmail.com` / `123`
- [ ] Dashboard displays
- [ ] Product management works
- [ ] View orders

### Step 3: Check for Errors

Open browser console (F12) and check:
- [ ] No red errors in Console tab
- [ ] No database connection errors
- [ ] Images load properly

### Step 4: Security (IMPORTANT!)

**Change default admin password:**
1. Login to admin panel
2. Go to Profile/Settings
3. Change password from `123` to something secure
4. Save

---

## 🎉 You're Live!

Congratulations! Your site is now deployed at:
- **Live URL**: `https://your-app.railway.app`
- **Admin**: `https://your-app.railway.app/admin`
- **GitHub**: https://github.com/Achraflgu/test3

---

## 📝 Update Your README

Add your live URL to README.md:

```bash
# Edit README.md and add:
**Live Demo**: https://your-app.railway.app
```

Then commit:
```bash
git add README.md
git commit -m "Add live demo link"
git push
```

---

## 🐛 Troubleshooting

### Issue: "Database connection failed"

**Check:**
1. Environment variables in Railway are correct
2. Neon database is running (check Neon dashboard)
3. Connection string includes `?sslmode=require`

**Fix:**
- Go to Railway → Variables
- Verify each value matches Neon credentials
- Click "Redeploy" after changes

### Issue: "500 Internal Server Error"

**Check:**
1. Railway deployment logs (Deployments tab)
2. Look for PHP errors
3. Check if `db_connection.php` was replaced

**Fix:**
```bash
# Ensure PostgreSQL connection is active
copy db_connection_postgres.php db_connection.php
git add .
git commit -m "Fix database connection"
git push
```

### Issue: "Images not loading"

**Check:**
1. Upload directory exists
2. Paths in database are correct

**Fix:**
- Ensure `admin/uploads/` exists
- Check file permissions

### Issue: "Git push rejected"

**Fix:**
```bash
# If you need to force push (first time only)
git push -u origin main --force
```

---

## 📊 Monitor Your App

### Railway Dashboard
- **Metrics**: View CPU, Memory usage
- **Logs**: Real-time application logs
- **Deployments**: Deployment history

### Neon Dashboard
- **Metrics**: Database queries, connections
- **Backups**: Automatic backups enabled
- **Usage**: Monitor free tier limits

---

## 💡 Pro Tips

### Free Tier Limits

**Railway:**
- $5 free credit per month
- Should be enough for portfolio/demo
- Monitor usage in dashboard

**Neon:**
- 10 GB storage
- 100 hours compute/month
- Unlimited projects

### Automatic Deployments

Every time you push to GitHub:
```bash
git push
```

Railway automatically redeploys! 🚀

### Custom Domain (Optional)

**Later, you can add custom domain:**
1. Buy domain (Namecheap, GoDaddy)
2. Railway Settings → Networking → Custom Domain
3. Add DNS records as instructed
4. Wait for DNS propagation (~24 hours)

---

## 🎓 For Your Portfolio

Add this to your resume/LinkedIn:

```
MSPORT E-Commerce Platform
• Full-stack PHP e-commerce application
• Deployed on Railway with PostgreSQL (Neon)
• Technologies: PHP, PostgreSQL, JavaScript, Bootstrap
• Live: https://your-app.railway.app
• GitHub: https://github.com/Achraflgu/test3
```

---

## 📞 Resources

- **Railway Docs**: https://docs.railway.app
- **Neon Docs**: https://neon.tech/docs
- **PostgreSQL**: https://www.postgresql.org/docs/
- **Your Guides**: See `deployment-guide.md` for more details

---

## ✅ Final Checklist

- [ ] Code pushed to GitHub
- [ ] Neon database created
- [ ] Database tables imported
- [ ] Railway project created
- [ ] Environment variables set
- [ ] App deployed successfully
- [ ] Site accessible via URL
- [ ] Admin panel works
- [ ] Default password changed
- [ ] README updated with live link

---

**Estimated Total Time**: 1 hour ⏱️

**You've got this!** Follow each phase step by step. 🚀

---

**Next Step**: Run the commands in Phase 1 to push to GitHub! ⬇️


