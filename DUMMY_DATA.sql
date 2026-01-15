-- =============================================
-- DUMMY DATA FOR TURTLERS ACADEMY DATABASE
-- =============================================
-- Insert realistic sample data for all tables

-- =============================================
-- 1. INSERT INTO users
-- =============================================
INSERT INTO `users` (`username`, `full_name`, `email`, `password`, `role`, `profile_pic`) VALUES
('john_student', 'John Doe', 'john.doe@example.com', 'hashed_password_123', 'student', '/Turtlers-Academy/public/assets/images/profile.png'),
('jane_student', 'Jane Smith', 'jane.smith@example.com', 'hashed_password_456', 'student', '/Turtlers-Academy/public/assets/images/profile.png'),
('mike_student', 'Michael Johnson', 'michael.j@example.com', 'hashed_password_789', 'student', '/Turtlers-Academy/public/assets/images/profile.png'),
('sarah_student', 'Sarah Williams', 'sarah.w@example.com', 'hashed_password_101', 'student', '/Turtlers-Academy/public/assets/images/profile.png'),
('alex_student', 'Alex Brown', 'alex.brown@example.com', 'hashed_password_202', 'student', '/Turtlers-Academy/public/assets/images/profile.png'),
('dr_smith', 'Dr. Smith', 'dr.smith@turtlers.com', 'hashed_tutor_123', 'tutor', '/Turtlers-Academy/public/assets/images/tutor.png'),
('dr_johnson', 'Dr. Johnson', 'dr.johnson@turtlers.com', 'hashed_tutor_456', 'instructor', '/Turtlers-Academy/public/assets/images/tutor.png'),
('prof_williams', 'Prof. Williams', 'prof.williams@turtlers.com', 'hashed_tutor_789', 'tutor', '/Turtlers-Academy/public/assets/images/tutor.png'),
('admin_user', 'Admin User', 'admin@turtlers.com', 'hashed_admin_123', 'admin', '/Turtlers-Academy/public/assets/images/profile.png');

-- =============================================
-- 2. INSERT INTO course
-- =============================================
INSERT INTO `course` (`course_code`, `course_name`, `instructor_name`, `description`, `course_image`) VALUES
('CS101', 'Introduction to Web Development', 'Dr. Smith', 'Learn the fundamentals of HTML, CSS, and JavaScript to build responsive websites.', '/Turtlers-Academy/public/assets/upload/web-dev.jpg'),
('CS102', 'Python Programming Basics', 'Dr. Johnson', 'Master Python programming from basic syntax to object-oriented programming concepts.', '/Turtlers-Academy/public/assets/upload/python.jpg'),
('CS103', 'Data Structures and Algorithms', 'Prof. Williams', 'Deep dive into essential data structures and algorithms for efficient coding.', '/Turtlers-Academy/public/assets/upload/dsa.jpg'),
('CS104', 'Database Management Systems', 'Dr. Smith', 'Learn database design, SQL, and advanced database concepts.', '/Turtlers-Academy/public/assets/upload/database.jpg'),
('CS105', 'Web Design Fundamentals', 'Dr. Johnson', 'Create beautiful and user-friendly web interfaces with modern design principles.', '/Turtlers-Academy/public/assets/upload/design.jpg');

-- =============================================
-- 3. INSERT INTO enrollments
-- =============================================
INSERT INTO `enrollments` (`user_id`, `course_id`, `full_name`, `email`, `phone`, `status`) VALUES
(1, 1, 'John Doe', 'john.doe@example.com', '555-0101', 'active'),
(1, 2, 'John Doe', 'john.doe@example.com', '555-0101', 'active'),
(2, 1, 'Jane Smith', 'jane.smith@example.com', '555-0102', 'active'),
(2, 3, 'Jane Smith', 'jane.smith@example.com', '555-0102', 'active'),
(3, 2, 'Michael Johnson', 'michael.j@example.com', '555-0103', 'active'),
(3, 4, 'Michael Johnson', 'michael.j@example.com', '555-0103', 'active'),
(4, 1, 'Sarah Williams', 'sarah.w@example.com', '555-0104', 'active'),
(4, 5, 'Sarah Williams', 'sarah.w@example.com', '555-0104', 'active'),
(5, 2, 'Alex Brown', 'alex.brown@example.com', '555-0105', 'active'),
(5, 3, 'Alex Brown', 'alex.brown@example.com', '555-0105', 'active');

-- =============================================
-- 4. INSERT INTO lesson
-- =============================================
INSERT INTO `lesson` (`course_id`, `lecture_week`, `lesson_title`, `file_path`) VALUES
(1, 1, 'HTML Basics - Introduction', 'lesson_1_html_basics.pdf'),
(1, 1, 'Setting Up Your Development Environment', 'lesson_1_setup.pdf'),
(1, 2, 'CSS Styling and Layouts', 'lesson_2_css.pdf'),
(1, 3, 'JavaScript Fundamentals', 'lesson_3_js.pdf'),
(1, 4, 'Responsive Design with CSS Grid', 'lesson_4_responsive.pdf'),
(2, 1, 'Python Installation and Setup', 'lesson_1_python_setup.pdf'),
(2, 2, 'Variables, Data Types, and Operators', 'lesson_2_variables.pdf'),
(2, 3, 'Control Flow - If, Else, Loops', 'lesson_3_control_flow.pdf'),
(2, 4, 'Functions and Scope', 'lesson_4_functions.pdf'),
(3, 1, 'Introduction to Data Structures', 'lesson_1_intro_ds.pdf'),
(3, 2, 'Arrays and Lists', 'lesson_2_arrays.pdf'),
(3, 3, 'Stacks and Queues', 'lesson_3_stacks.pdf'),
(4, 1, 'Database Basics and SQL Introduction', 'lesson_1_db_intro.pdf'),
(4, 2, 'CREATE, INSERT, UPDATE, DELETE Operations', 'lesson_2_crud.pdf'),
(5, 1, 'UX/UI Principles', 'lesson_1_ux_ui.pdf'),
(5, 2, 'Color Theory and Typography', 'lesson_2_design_basics.pdf');

-- =============================================
-- 5. INSERT INTO quizzes
-- =============================================
INSERT INTO `quizzes` (`course_id`, `title`, `description`) VALUES
(1, 'HTML & CSS Basics Quiz', 'Test your understanding of HTML and CSS fundamentals'),
(1, 'JavaScript Fundamentals Quiz', 'Evaluate your JavaScript knowledge'),
(2, 'Python Basics Quiz', 'Basic Python programming concepts'),
(2, 'Python Functions Quiz', 'Test your knowledge of Python functions'),
(3, 'Data Structures Quiz', 'Understanding of arrays, stacks, and queues'),
(4, 'SQL Fundamentals Quiz', 'Basic SQL operations'),
(5, 'Design Principles Quiz', 'UX/UI and design principles');

-- =============================================
-- 6. INSERT INTO questions
-- =============================================
INSERT INTO `questions` (`quiz_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`) VALUES
(1, 'What does HTML stand for?', 'Hyper Text Markup Language', 'High Tech Modern Language', 'Home Tool Markup Language', 'Hyperlinks and Text Markup Language', 'a'),
(1, 'Which HTML tag is used for paragraphs?', '<para>', '<p>', '<paragraph>', '<p-tag>', 'b'),
(1, 'What is the correct CSS syntax?', 'body {color: red;}', 'body: color red;', '{body;color:red;}', 'body [color: red]', 'a'),
(2, 'How do you declare a variable in JavaScript?', 'var myVar;', 'variable myVar;', 'v myVar;', 'declare myVar;', 'a'),
(2, 'What is the output of 2 + "2" in JavaScript?', '4', '"4"', '22', 'Error', 'c'),
(3, 'Which of the following is a mutable data type in Python?', 'String', 'Tuple', 'List', 'Integer', 'c'),
(3, 'What keyword is used to create a function in Python?', 'function', 'def', 'define', 'func', 'b'),
(4, 'What is the correct way to define a function with parameters?', 'def myFunc(x, y):', 'def myFunc x, y:', 'function myFunc(x, y):', 'def myFunc[x, y]:', 'a'),
(5, 'What is the time complexity of binary search?', 'O(n)', 'O(log n)', 'O(n^2)', 'O(1)', 'b'),
(6, 'Which SQL keyword is used to retrieve data?', 'FETCH', 'GET', 'SELECT', 'RETRIEVE', 'c'),
(6, 'What does SQL stand for?', 'Structured Query Language', 'Strong Question Language', 'Simple Query Logic', 'Systematic Question Level', 'a'),
(7, 'What is the primary goal of UX design?', 'Making things look pretty', 'Solving user problems', 'Writing code', 'Creating databases', 'b');

-- =============================================
-- 7. INSERT INTO quiz_attempts
-- =============================================
INSERT INTO `quiz_attempts` (`user_id`, `quiz_id`, `score`, `total`, `percentage`) VALUES
(1, 1, 8, 10, 80.00),
(1, 2, 7, 10, 70.00),
(2, 1, 9, 10, 90.00),
(2, 3, 6, 10, 60.00),
(3, 3, 8, 10, 80.00),
(3, 5, 7, 10, 70.00),
(4, 1, 10, 10, 100.00),
(4, 6, 8, 10, 80.00),
(5, 3, 9, 10, 90.00),
(5, 5, 6, 10, 60.00);

-- =============================================
-- 8. INSERT INTO quiz_results
-- =============================================
INSERT INTO `quiz_results` (`user_id`, `quiz_id`, `score`, `total`, `percentage`) VALUES
(1, 1, 8, 10, 80.00),
(1, 2, 7, 10, 70.00),
(2, 1, 9, 10, 90.00),
(2, 3, 6, 10, 60.00),
(3, 3, 8, 10, 80.00),
(3, 5, 7, 10, 70.00),
(4, 1, 10, 10, 100.00),
(4, 6, 8, 10, 80.00),
(5, 3, 9, 10, 90.00),
(5, 5, 6, 10, 60.00),
(1, 3, 7, 10, 70.00),
(2, 5, 8, 10, 80.00);

-- =============================================
-- 9. INSERT INTO forum_threads
-- =============================================
INSERT INTO `forum_threads` (`user_id`, `course_id`, `title`, `description`) VALUES
(1, 1, 'How to center a div with CSS?', 'I am struggling with centering a div element horizontally and vertically. Can anyone help me with the best approach?'),
(2, 1, 'Flexbox vs Grid - Which one to use?', 'I am confused about when to use Flexbox and when to use CSS Grid. Can someone explain the differences?'),
(3, 2, 'Understanding Python list comprehensions', 'Can someone explain list comprehensions in Python with some practical examples?'),
(4, 2, 'Best practices for Python variable naming', 'What are the naming conventions I should follow for variables in Python?'),
(5, 3, 'Difference between Stack and Queue', 'I need clarification on the key differences between Stack and Queue data structures.'),
(1, 4, 'How to optimize slow SQL queries?', 'My database queries are running slow. What are some optimization techniques?'),
(2, 5, 'Color palettes for modern web design', 'What are some trendy color palettes for modern web design in 2024?');

-- =============================================
-- 10. INSERT INTO forum_comments
-- =============================================
INSERT INTO `forum_comments` (`thread_id`, `user_id`, `comment`) VALUES
(1, 2, 'You can use flexbox with justify-content and align-items properties. That is the most common approach.'),
(1, 3, 'Another way is to use CSS Grid with place-items: center. This works great too!'),
(2, 1, 'Flexbox is better for one-dimensional layouts, while Grid is for two-dimensional layouts.'),
(2, 4, 'Great explanation! I prefer Grid because it gives me more control over the layout.'),
(3, 5, 'List comprehensions are a concise way to create lists. Example: [x*2 for x in range(10)]'),
(4, 1, 'Python PEP 8 style guide recommends using lowercase with underscores for variable names.'),
(5, 2, 'Stack uses LIFO (Last In First Out) while Queue uses FIFO (First In First Out) principle.'),
(6, 3, 'Adding indexes on frequently queried columns and using EXPLAIN to analyze query plans helps.'),
(7, 4, 'I recommend using the Material Design color palette or Adobe Color for inspiration.');

-- =============================================
-- 11. INSERT INTO ratings
-- =============================================
INSERT INTO `ratings` (`user_id`, `course_id`, `rating`) VALUES
(1, 1, 5),
(1, 2, 4),
(2, 1, 5),
(2, 3, 4),
(3, 2, 5),
(3, 4, 4),
(4, 1, 5),
(4, 5, 4),
(5, 2, 4),
(5, 3, 5);

-- =============================================
-- 12. INSERT INTO resources
-- =============================================
INSERT INTO `resources` (`tutor_id`, `course_id`, `title`, `file_path`) VALUES
(6, 1, 'Web Development Cheat Sheet', '/Turtlers-Academy/public/assets/upload/web-cheatsheet.pdf'),
(6, 1, 'HTML5 Reference Guide', '/Turtlers-Academy/public/assets/upload/html5-reference.pdf'),
(7, 2, 'Python Quick Reference', '/Turtlers-Academy/public/assets/upload/python-reference.pdf'),
(7, 2, 'Common Python Algorithms', '/Turtlers-Academy/public/assets/upload/python-algorithms.pdf'),
(8, 3, 'Data Structures Visualization', '/Turtlers-Academy/public/assets/upload/ds-visualization.pdf'),
(8, 3, 'Algorithm Complexity Cheat Sheet', '/Turtlers-Academy/public/assets/upload/complexity-cheatsheet.pdf'),
(6, 4, 'SQL Commands Reference', '/Turtlers-Academy/public/assets/upload/sql-reference.pdf'),
(6, 4, 'Database Design Best Practices', '/Turtlers-Academy/public/assets/upload/db-design.pdf'),
(7, 5, 'UI/UX Design Principles Guide', '/Turtlers-Academy/public/assets/upload/ux-principles.pdf'),
(7, 5, 'Web Design Templates Collection', '/Turtlers-Academy/public/assets/upload/design-templates.pdf');

-- =============================================
-- 13. INSERT INTO students
-- =============================================
INSERT INTO `students` (`student_name`, `user_id`, `institution`, `age`, `cgpa`) VALUES
('John Doe', 1, 'Tech University', 20, 3.75),
('Jane Smith', 2, 'Engineering Institute', 21, 3.85),
('Michael Johnson', 3, 'Science Academy', 19, 3.65),
('Sarah Williams', 4, 'Tech University', 22, 3.95),
('Alex Brown', 5, 'Computer Science College', 20, 3.55);

-- =============================================
-- 14. INSERT INTO instructors
-- =============================================
INSERT INTO `instructors` (`name`, `user_id`, `bio`) VALUES
('Dr. Smith', 6, 'Expert in Web Development with 15+ years of industry experience. Passionate about teaching modern web technologies.'),
('Dr. Johnson', 7, 'Python specialist with expertise in data science and machine learning. Published researcher in AI.'),
('Prof. Williams', 8, 'Data structures and algorithms expert. Former tech lead at major software companies.');

-- =============================================
-- SUMMARY OF DUMMY DATA
-- =============================================
-- Total Users: 9 (5 students, 3 tutors, 1 admin)
-- Total Courses: 5
-- Total Enrollments: 10
-- Total Lessons: 16
-- Total Quizzes: 7
-- Total Questions: 12
-- Total Quiz Attempts: 10
-- Total Quiz Results: 12
-- Total Forum Threads: 7
-- Total Forum Comments: 9
-- Total Ratings: 10
-- Total Resources: 10
-- Total Student Profiles: 5
-- Total Instructor Profiles: 3
-- =============================================
