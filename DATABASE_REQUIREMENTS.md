# Database Tables Required for Turtlers Academy Project

## Summary
Based on comprehensive analysis of the entire project codebase, the following **14 database tables** are required to be created in the `turtlers_academy` database.

---

## Complete Table List

### 1. **users**
- **Purpose**: Store all user accounts (students, tutors, instructors, admins)
- **Key Fields**: id, username, full_name, email, password, role, profile_pic
- **Used By**: studentModel, tutorModel, enrollModel, quizModel, forumModel, resultModel, resourceModel
- **Priority**: ⭐⭐⭐ CRITICAL (Foundation table)

### 2. **course** (or **courses**)
- **Purpose**: Store course information
- **Key Fields**: id, course_code, course_name, instructor_name, description, course_image
- **Used By**: courseModel, AdminCourseModel, tutorModel, LessonModel, enrollModel, resourceModel
- **Priority**: ⭐⭐⭐ CRITICAL (Core table)

### 3. **enrollments**
- **Purpose**: Track which students are enrolled in which courses
- **Key Fields**: id, user_id, course_id, full_name, email, phone, status, enrolled_at
- **Used By**: enrollModel, studentModel, tutorModel, courseModel, resourceModel
- **Priority**: ⭐⭐⭐ CRITICAL (Required for course management)

### 4. **lesson**
- **Purpose**: Store lesson/lecture materials and content
- **Key Fields**: id, course_id, lecture_week, lesson_title, file_path, created_at
- **Used By**: LessonModel
- **Priority**: ⭐⭐⭐ HIGH (Essential for course content)

### 5. **quizzes**
- **Purpose**: Store quiz information and metadata
- **Key Fields**: id, course_id, title, description, created_at
- **Used By**: quizModel, resultModel
- **Priority**: ⭐⭐ MEDIUM (For assessment features)

### 6. **questions**
- **Purpose**: Store individual quiz questions
- **Key Fields**: id, quiz_id, question_text, option_a, option_b, option_c, option_d, correct_answer
- **Used By**: quizModel
- **Priority**: ⭐⭐ MEDIUM (Required for quizzes)

### 7. **quiz_attempts**
- **Purpose**: Track quiz attempts and scores
- **Key Fields**: id, user_id, quiz_id, score, total, percentage, attempted_at
- **Used By**: quizModel
- **Priority**: ⭐⭐ MEDIUM (For quiz tracking)

### 8. **quiz_results**
- **Purpose**: Store detailed quiz results for students
- **Key Fields**: id, user_id, quiz_id, score, total, percentage, attempted_at
- **Used By**: resultModel
- **Priority**: ⭐⭐ MEDIUM (For result tracking)

### 9. **forum_threads**
- **Purpose**: Store forum discussion threads
- **Key Fields**: id, user_id, course_id, title, description, created_at
- **Used By**: forumModel
- **Priority**: ⭐⭐ MEDIUM (For community features)

### 10. **forum_comments**
- **Purpose**: Store comments/replies on forum threads
- **Key Fields**: id, thread_id, user_id, comment, created_at
- **Used By**: forumModel
- **Priority**: ⭐⭐ MEDIUM (For forum interactions)

### 11. **ratings**
- **Purpose**: Store course ratings from students
- **Key Fields**: id, user_id, course_id, rating, created_at
- **Used By**: courseModel
- **Priority**: ⭐ LOW (Optional feature)

### 12. **resources**
- **Purpose**: Store course resources (files, documents, materials)
- **Key Fields**: id, tutor_id, course_id, title, file_path, uploaded_at
- **Used By**: resourceModel
- **Priority**: ⭐ LOW (Optional but useful)

### 13. **students** (Optional)
- **Purpose**: Store additional student-specific information
- **Key Fields**: id, student_name, user_id, institution, age, cgpa
- **Used By**: studentModel
- **Priority**: ⭐ LOW (Optional - extends user table)

### 14. **instructors** (Optional)
- **Purpose**: Store additional instructor-specific information
- **Key Fields**: id, name, user_id, bio
- **Used By**: tutorModel
- **Priority**: ⭐ LOW (Optional - extends user table)

---

## Implementation Steps

### Phase 1: Create Essential Tables (CRITICAL)
1. `users` - User management foundation
2. `course` - Course information
3. `enrollments` - Course enrollment tracking

### Phase 2: Add Content Tables (HIGH)
4. `lesson` - Course lesson materials

### Phase 3: Add Assessment Tables (MEDIUM)
5. `quizzes` - Quiz information
6. `questions` - Quiz questions
7. `quiz_attempts` - Quiz attempt tracking
8. `quiz_results` - Quiz results

### Phase 4: Add Community Features (MEDIUM)
9. `forum_threads` - Forum discussions
10. `forum_comments` - Forum comments

### Phase 5: Add Optional Features (LOW)
11. `ratings` - Course ratings
12. `resources` - Course resources
13. `students` - Extended student info
14. `instructors` - Extended instructor info

---

## Foreign Key Relationships

```
users
  ├── enrollments (user_id → users.id)
  ├── quiz_attempts (user_id → users.id)
  ├── quiz_results (user_id → users.id)
  ├── forum_threads (user_id → users.id)
  ├── forum_comments (user_id → users.id)
  ├── ratings (user_id → users.id)
  └── resources (tutor_id → users.id)

course
  ├── enrollments (course_id → course.id)
  ├── lesson (course_id → course.id)
  ├── quizzes (course_id → course.id)
  ├── forum_threads (course_id → course.id)
  ├── resources (course_id → course.id)
  └── ratings (course_id → course.id)

quizzes
  ├── questions (quiz_id → quizzes.id)
  ├── quiz_attempts (quiz_id → quizzes.id)
  └── quiz_results (quiz_id → quizzes.id)

forum_threads
  └── forum_comments (thread_id → forum_threads.id)
```

---

## Notes

1. **Table Name Variations**: The code uses both `course` and `courses` - verify which one should be used or create both
2. **Quiz Tables**: Both `quiz_attempts` and `quiz_results` tables are referenced - may be redundant or serve different purposes
3. **Students/Instructors Tables**: Optional tables that extend the `users` table for additional fields
4. **Database Connection**: Uses `turtlers_academy` database (defined in `core/database.php`)
5. **Timestamps**: All tables include created_at and updated_at timestamps for audit trails
6. **Foreign Keys**: All relationships use CASCADE delete for data integrity

---

## Next Steps

1. Execute the SQL script in `DATABASE_TABLES.sql`
2. Verify all tables are created correctly
3. Create any necessary indexes for performance optimization
4. Test CRUD operations on each table
5. Implement data validation in models
