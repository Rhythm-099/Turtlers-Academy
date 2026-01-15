# Turtlers Academy - cPanel Deployment Checklist

## Pre-Deployment Tasks

### 1. Database Setup
- [ ] Create MySQL database: `akibhasa_turtlers_academy`
- [ ] Create MySQL user: `akibhasa_turtlers`
- [ ] Assign all privileges to the user
- [ ] Note down the database credentials
- [ ] Update `core/database.php` with credentials

### 2. File Uploads
- [ ] Upload all files to `/home/akibhasa/turtlers.akibhasan.me/`
- [ ] Ensure directory structure is maintained
- [ ] Set correct permissions:
  - [ ] Directories: 755
  - [ ] Files: 644
  - [ ] Special: public/assets/upload - 777 (for file uploads)

### 3. Database Tables & Data
- [ ] Execute `DATABASE_TABLES.sql` to create tables
- [ ] Execute `DUMMY_DATA.sql` to insert sample data (optional)
- [ ] Verify all 14 tables are created in phpMyAdmin

### 4. Configuration Files
- [ ] Update `core/database.php` with cPanel credentials
- [ ] Verify `config/paths.php` settings
- [ ] Check `.htaccess` file exists in root directory
- [ ] Review `.env.example` and create `.env` if needed

---

## Directory Permissions

```bash
# From cPanel File Manager, set these permissions:

Root directory (/home/akibhasa/turtlers.akibhasan.me/)
├── app/                    → 755
├── config/                 → 755
├── core/                   → 755
├── public/                 → 755
│   └── assets/
│       └── upload/         → 777  (for user uploads)
├── *.php files             → 644
├── .htaccess               → 644
└── *.md files              → 644
```

---

## Testing Checklist

### Home Page
- [ ] Navigate to https://turtlers.akibhasan.me/
- [ ] Page loads without errors
- [ ] CSS styles are applied
- [ ] Navigation menu works
- [ ] No console errors (F12 → Console)

### Database Connection
- [ ] No "Database connection failed" error
- [ ] Courses display correctly
- [ ] Tutors section loads

### Navigation
- [ ] Home link works
- [ ] Courses link loads
- [ ] Quiz link loads
- [ ] Forum link loads
- [ ] Results link loads
- [ ] Enrollment link loads

### Asset Loading
- [ ] CSS files load (check styling)
- [ ] JavaScript files load (check console)
- [ ] Images display correctly
- [ ] No 404 errors in console

### Forms & Submission
- [ ] Course enrollment form works
- [ ] Quiz submission works
- [ ] Forum thread creation works
- [ ] Comments can be posted

---

## Common Issues & Solutions

### Issue: "Database connection failed"
```
Solution:
1. Verify credentials in core/database.php
2. Check user exists in cPanel MySQL Users
3. Verify user has all privileges
4. Test connection in phpMyAdmin
```

### Issue: CSS/JS not loading
```
Solution:
1. Check public/assets/ directory exists
2. Verify subdirectories: css/, js/, images/
3. Check file permissions (644)
4. Clear browser cache (Ctrl+Shift+Delete)
5. Check browser console for 404 errors
```

### Issue: 404 errors on pages
```
Solution:
1. Verify .htaccess file exists
2. Check mod_rewrite is enabled in cPanel
3. Verify all PHP files exist in public/
4. Check file paths in include statements
```

### Issue: File upload failures
```
Solution:
1. Set public/assets/upload/ to 777 permissions
2. Verify max upload size in php.ini
3. Check disk space available
4. Verify file is allowed type
```

---

## After Deployment

### Security Hardening
- [ ] Remove DUMMY_DATA.sql from server
- [ ] Remove DATABASE_TABLES.sql from server
- [ ] Set APP_DEBUG=false in configuration
- [ ] Enable HTTPS (Let's Encrypt in cPanel)
- [ ] Configure firewall rules if available
- [ ] Set up automated backups

### Performance Optimization
- [ ] Test page load speed
- [ ] Enable gzip compression (.htaccess installed)
- [ ] Optimize database indexes
- [ ] Compress images if necessary
- [ ] Consider CDN for static assets

### Monitoring
- [ ] Set up error logging
- [ ] Monitor server storage
- [ ] Track database size
- [ ] Check error logs regularly
- [ ] Test backup restoration

---

## Useful cPanel Locations

| Task | Path |
|------|------|
| File Manager | Home → File Manager |
| Database | Home → MySQL Databases |
| phpMyAdmin | Home → phpMyAdmin |
| PHP Settings | Home → Select PHP Version |
| Error Logs | Home → Error Log |
| Email | Home → Email Accounts |
| SSL/TLS | Home → SSL/TLS Status |
| Backups | Home → Backup |

---

## Quick Reference URLs

```
Home:         https://turtlers.akibhasan.me/
Courses:      https://turtlers.akibhasan.me/public/course.php
Quiz:         https://turtlers.akibhasan.me/public/quiz.php
Forum:        https://turtlers.akibhasan.me/public/forum.php
Results:      https://turtlers.akibhasan.me/public/results.php
Enrollment:   https://turtlers.akibhasan.me/public/enroll.php
phpMyAdmin:   https://turtlers.akibhasan.me/phpmyadmin/
```

---

## Support Resources

- [cPanel Documentation](https://documentation.cpanel.net/)
- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [LAMP Stack Guide](https://lamphowto.com/)

---

## Sign-Off

- [ ] All items checked
- [ ] Site tested and working
- [ ] Database backed up
- [ ] Ready for production

**Deployment Date:** _______________
**Deployed By:** _______________
**Tested By:** _______________

---

**Last Updated:** January 15, 2026
