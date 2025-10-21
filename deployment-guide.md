# MSPORT Deployment Guide - Railway + Neon PostgreSQL

## 🎯 Deployment Stack
- **Frontend/Backend**: Railway.app (Free tier)
- **Database**: Neon PostgreSQL (Free tier)
- **Current**: PHP + MySQL → **Migrating to**: PHP + PostgreSQL

---

## 📋 Prerequisites
1. GitHub account
2. Railway account (https://railway.app)
3. Neon account (https://neon.tech)

---

## Step 1: Create Neon PostgreSQL Database

1. **Sign up at Neon.tech**
   - Go to https://neon.tech
   - Create free account

2. **Create a new project**
   - Project name: `msport-db`
   - Region: Choose closest to your users
   - PostgreSQL version: 15+

3. **Get connection details** (save these):
   ```
   Host: <your-host>.neon.tech
   Database: msport
   User: <your-username>
   Password: <your-password>
   Port: 5432
   ```

4. **Connection String Format**:
   ```
   postgresql://user:password@host/database?sslmode=require
   ```

---

## Step 2: Migrate Database from MySQL to PostgreSQL

### A. Run the migration script (provided in repo)
```bash
# Install PostgreSQL locally first
# Then run the migration script
php migrate_to_postgres.php
```

### B. Or use the converted SQL file
The `msport_postgres.sql` file in your repo is ready to import into Neon.

**Import to Neon:**
1. Connect to Neon using psql or pgAdmin
2. Run: `psql <your-neon-connection-string> -f msport_postgres.sql`

---

## Step 3: Update PHP Database Connection

Your connection file `db_connection.php` has been updated to use PostgreSQL.

**Environment variables needed:**
- `DB_HOST`
- `DB_NAME`
- `DB_USER`
- `DB_PASSWORD`
- `DB_PORT`

---

## Step 4: Deploy to Railway

### A. Push to GitHub
```bash
git init
git add .
git commit -m "Initial commit for deployment"
git branch -M main
git remote add origin <your-github-repo-url>
git push -u origin main
```

### B. Deploy on Railway
1. Go to https://railway.app
2. Click "New Project"
3. Select "Deploy from GitHub repo"
4. Choose your MSPORT repository
5. Railway will auto-detect PHP

### C. Add Environment Variables
In Railway dashboard:
- Go to your project → Variables
- Add:
  ```
  DB_HOST=<neon-host>
  DB_NAME=msport
  DB_USER=<neon-user>
  DB_PASSWORD=<neon-password>
  DB_PORT=5432
  ```

### D. Configure Nixpacks (Railway's build system)
The `nixpacks.toml` file is already configured in your repo.

---

## Step 5: Configure Domain (Optional)

### Railway provides a free domain:
- Format: `your-app.railway.app`

### Custom domain:
1. Go to Settings → Networking
2. Add your custom domain
3. Update DNS records as instructed

---

## 🔧 Alternative: Deploy to Traditional PHP Hosting

If you prefer traditional hosting:

### Option A: InfinityFree (Free)
1. Sign up at https://infinityfree.net
2. Upload files via FTP
3. Use their MySQL database (or remote Neon PostgreSQL)
4. Update `db_connection.php` with credentials

### Option B: Hostinger (Paid ~$2/month)
1. Purchase hosting plan
2. Upload via FTP/cPanel File Manager
3. Import database
4. Configure connection

---

## 📝 Important Notes

### Database Differences (MySQL → PostgreSQL)
1. **Auto-increment**: `SERIAL` instead of `AUTO_INCREMENT`
2. **Boolean**: `BOOLEAN` instead of `TINYINT(1)`
3. **Quotes**: Double quotes for identifiers, single for strings
4. **LIMIT**: Syntax is the same
5. **Date functions**: Different syntax

### PHP Code Changes Needed
The migration script handles most changes, but review:
- `mysqli_*` functions → `pg_*` functions (using PDO is better)
- SQL queries with MySQL-specific syntax
- Error handling

---

## 🐛 Troubleshooting

### Issue: Connection failed
- Check Neon connection string
- Verify SSL mode is enabled (`?sslmode=require`)
- Check firewall settings

### Issue: Database queries fail
- Review PostgreSQL vs MySQL syntax differences
- Check table/column names (PostgreSQL is case-sensitive)

### Issue: Files not uploading
- Check PHP upload limits
- Verify directory permissions
- Check Railway build logs

---

## 📚 Resources

- [Railway Documentation](https://docs.railway.app)
- [Neon Documentation](https://neon.tech/docs)
- [PostgreSQL Documentation](https://www.postgresql.org/docs/)
- [PHP PDO Tutorial](https://www.php.net/manual/en/book.pdo.php)

---

## 🎉 Success Checklist

- [ ] Neon PostgreSQL database created
- [ ] Database migrated and imported
- [ ] PHP connection updated
- [ ] Code pushed to GitHub
- [ ] Railway project created
- [ ] Environment variables configured
- [ ] Application deployed and accessible
- [ ] Database connection working
- [ ] All features tested

---

## 💡 Next Steps for Portfolio

1. **Add README.md** with project description
2. **Screenshots** of the application
3. **Live demo link** in GitHub repo
4. **Technology stack** badges
5. **Setup instructions** for local development

Good luck with your deployment! 🚀

