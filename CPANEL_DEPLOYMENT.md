# Turtlers Academy - cPanel Deployment Guide

## Deployment Information

**Hosting:** cPanel-based Shared Hosting
**Subdomain:** turtlers.akibhasan.me
**Root Directory:** /home/akibhasa/turtlers.akibhasan.me
**Database:** akibhasa_turtlers_academy
**Database User:** akibhasa_turtlers

---

## Pre-Deployment Checklist

### 1. Database Configuration

Before deploying, update the database credentials in `core/database.php`:

```php
$host = "localhost";
$user = "akibhasa_turtlers";
$pass = "YOUR_PASSWORD_HERE";  // ← CHANGE THIS
$db = "akibhasa_turtlers_academy";
```

**Steps:**
1. Go to cPanel → MySQL Databases
2. Create database: `akibhasa_turtlers_academy`
3. Create user: `akibhasa_turtlers` with a secure password
4. Assign all privileges to the user
5. Update `core/database.php` with your password

### 2. Create Database Tables

1. Go to cPanel → phpMyAdmin
2. Select database `akibhasa_turtlers_academy`
3. Go to SQL tab
4. Copy and paste the contents of `DATABASE_TABLES.sql`
5. Click "Go" to execute

### 3. Insert Dummy Data (Optional)

For testing purposes, you can insert dummy data:

1. In phpMyAdmin, go to SQL tab
2. Copy and paste the contents of `DUMMY_DATA.sql`
3. Click "Go" to execute

---

## File Structure

```
/home/akibhasa/turtlers.akibhasan.me/
├── index.php                    (Main entry point)
├── core/
│   └── database.php            (Database configuration)
├── config/
│   └── paths.php               (Path configuration)
├── app/
│   ├── controllers/            (Request handlers)
│   ├── models/                 (Database logic)
│   └── views/                  (HTML templates)
├── public/
│   ├── index.php               (Home page)
│   ├── course.php              (Courses page)
│   ├── quiz.php                (Quiz page)
│   ├── forum.php               (Forum page)
│   ├── enroll.php              (Enrollment page)
│   ├── results.php             (Results page)
│   ├── assets/                 (CSS, JS, images, uploads)
│   └── ajax/                   (AJAX endpoints)
└── DATABASE_TABLES.sql         (Table structure)
```

---

## Key Features Implemented

✅ **Relative Paths** - All asset paths are relative, no hardcoded domain paths
✅ **Database Configuration** - Easy to update for different environments
✅ **Session Management** - Safe session_start() without duplicates
✅ **Error Handling** - Proper error messages and database connection checks
✅ **Responsive Design** - Mobile-friendly interface
✅ **Asset Organization** - All CSS, JS, images in public/assets/

---

## URL Routing

Once deployed, access the website using these URLs:

| Feature | URL |
|---------|-----|
| Home | https://turtlers.akibhasan.me/ |
| Courses | https://turtlers.akibhasan.me/public/course.php |
| Quiz | https://turtlers.akibhasan.me/public/quiz.php |
| Forum | https://turtlers.akibhasan.me/public/forum.php |
| Results | https://turtlers.akibhasan.me/public/results.php |
| Enrollment | https://turtlers.akibhasan.me/public/enroll.php |

---

## Troubleshooting

### Database Connection Error
- **Problem:** "Database connection failed"
- **Solution:** Check credentials in `core/database.php` match cPanel MySQL settings

### 404 Not Found
- **Problem:** Pages not loading
- **Solution:** Ensure files are uploaded to `/home/akibhasa/turtlers.akibhasan.me/`

### CSS/JS Not Loading
- **Problem:** Unstyled pages or JavaScript not working
- **Solution:** Check if `public/assets/` folder exists with all subdirectories

### Permission Issues
- **Problem:** Cannot write to upload directories
- **Solution:** Set permissions to 755 for directories, 644 for files via cPanel File Manager

---

## Important Files to Update

1. **core/database.php** - Update with your cPanel database credentials
2. **public/assets/** - Ensure all CSS/JS files exist

---

## Support for Features

| Feature | Status | Notes |
|---------|--------|-------|
| User Authentication | ✅ | Requires login implementation |
| Course Management | ✅ | Admin dashboard working |
| Enrollment | ✅ | Students can enroll in courses |
| Quiz System | ✅ | Create and take quizzes |
| Forum | ✅ | Discussion threads and comments |
| Resources | ✅ | Tutors can share materials |
| Ratings | ✅ | Students can rate courses |

---

## Performance Optimization

1. **Enable gzip compression** in .htaccess
2. **Cache assets** for faster loading
3. **Optimize database indexes** for large datasets
4. **Use CDN** for static assets (optional)

---

## Security Recommendations

1. Never commit passwords to version control
2. Update PHP to the latest version in cPanel
3. Use HTTPS (Let's Encrypt - free in cPanel)
4. Sanitize all user inputs in forms
5. Use prepared statements for database queries
6. Set proper file permissions (755 for dirs, 644 for files)

---

## Maintenance

### Regular Tasks

- Monitor database size in phpMyAdmin
- Check error logs via cPanel
- Backup database regularly
- Update passwords periodically
- Review user accounts and permissions

### Backup

Create regular backups using cPanel's backup feature or via SSH:

```bash
mysqldump -u akibhasa_turtlers -p akibhasa_turtlers_academy > backup.sql
```

---

## Contact & Support

For issues or questions about the deployment:
1. Check the error logs in cPanel
2. Review database connection settings
3. Verify file permissions and uploads
4. Test in phpMyAdmin directly

---

**Last Updated:** January 15, 2026
**Version:** 1.0
