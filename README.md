"# Turtlers Academy - Learning Management System

A modern, responsive learning management system built with PHP and MySQL. Students can enroll in courses, take quizzes, participate in forums, and access learning resources.

## 🌐 Live Deployment

**Website:** https://turtlers.akibhasan.me/

## ✨ Features

### For Students
- ✅ Browse and enroll in courses
- ✅ Take quizzes and view results
- ✅ Participate in discussion forums
- ✅ Download lesson materials
- ✅ Rate courses and provide feedback
- ✅ View personalized dashboard
- ✅ Track learning progress

### For Tutors/Instructors
- ✅ Create and manage courses
- ✅ Upload lesson materials
- ✅ Create and grade quizzes
- ✅ Track enrolled students
- ✅ Share course resources
- ✅ View student progress
- ✅ Manage course content

### For Administrators
- ✅ Manage all courses
- ✅ Manage user accounts
- ✅ System administration
- ✅ Database management

## 🏗️ Project Structure

```
Turtlers-Academy/
├── index.php                       # Main entry point
├── public/
│   ├── index.php                   # Home page
│   ├── course.php                  # Course listing
│   ├── quiz.php                    # Quiz interface
│   ├── forum.php                   # Discussion forum
│   ├── enroll.php                  # Course enrollment
│   ├── results.php                 # Quiz results
│   ├── ajax/                       # AJAX endpoints
│   └── assets/                     # CSS, JS, images, uploads
├── app/
│   ├── controllers/                # Request handlers
│   ├── models/                     # Database logic
│   └── views/                      # HTML templates
├── core/
│   └── database.php                # Database configuration
├── config/
│   └── paths.php                   # Path configuration
├── DATABASE_TABLES.sql             # Database schema
├── CPANEL_DEPLOYMENT.md            # Deployment guide
└── DEPLOYMENT_CHECKLIST.md         # Pre-deployment checklist
```

## 💻 Technology Stack

- **Backend:** PHP 7.4+
- **Database:** MySQL 5.7+
- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Hosting:** cPanel-based shared hosting
- **Protocol:** HTTPS (Let's Encrypt)

## 📊 Database Tables (14 Tables)

1. users, course, enrollments, lesson, quizzes, questions, quiz_attempts, quiz_results, forum_threads, forum_comments, ratings, resources, students, instructors

## 🚀 Quick Start

### Prerequisites
- cPanel hosting account
- MySQL database access
- PHP 7.4 or higher

### Installation Steps

1. **Upload Files** to `/home/akibhasa/turtlers.akibhasan.me/`
2. **Create Database** in cPanel MySQL
3. **Execute** `DATABASE_TABLES.sql` in phpMyAdmin
4. **Update** `core/database.php` with credentials
5. **Set Permissions:** Directories 755, Files 644, uploads 777

### Full Guide
See [CPANEL_DEPLOYMENT.md](CPANEL_DEPLOYMENT.md)

## 🔐 Security Features

✅ Session management, HTTPS, Input validation, File restrictions, .htaccess protection

## 📱 Responsive Design

Works perfectly on desktop, tablet, and mobile devices.

## 🐛 Troubleshooting

See [DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md) for common issues and solutions.

## 📄 License

MIT License

## 👨‍💻 Author

Akib Hasan - https://akibhasan.me

---

**Version:** 1.0 | **Updated:** January 15, 2026
" 
