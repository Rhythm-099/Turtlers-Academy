#!/usr/bin/env php
<?php
/**
 * Turtlers Academy - Deployment Verification Script
 * Run this script to verify your project structure before deployment
 */

echo "╔════════════════════════════════════════════════════════════╗\n";
echo "║     TURTLERS ACADEMY - DEPLOYMENT VERIFICATION SCRIPT     ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n\n";

$checks_passed = 0;
$checks_failed = 0;

// Color codes
$GREEN = "\033[92m";
$RED = "\033[91m";
$YELLOW = "\033[93m";
$RESET = "\033[0m";

echo "Checking project structure and configuration...\n\n";

// Check 1: Core files exist
echo "1. Checking core files...\n";
$core_files = [
    'index.php',
    'core/database.php',
    'config/paths.php',
    'public/index.php',
    'public/course.php',
    'public/quiz.php',
    'public/forum.php',
    'public/enroll.php',
    'public/results.php'
];

foreach ($core_files as $file) {
    if (file_exists(__DIR__ . '/' . $file)) {
        echo "   ${GREEN}✓${RESET} $file\n";
        $checks_passed++;
    } else {
        echo "   ${RED}✗ MISSING${RESET} $file\n";
        $checks_failed++;
    }
}

// Check 2: Controllers exist
echo "\n2. Checking controllers...\n";
$controllers = [
    'HomeController.php',
    'courseController.php',
    'quizController.php',
    'forumController.php',
    'enrollController.php',
    'resultController.php',
    'LessonControllers.php',
    'TutorController.php',
    'AdminCourseControllers.php',
    'dashboardController.php'
];

foreach ($controllers as $controller) {
    if (file_exists(__DIR__ . '/app/controllers/' . $controller)) {
        echo "   ${GREEN}✓${RESET} $controller\n";
        $checks_passed++;
    } else {
        echo "   ${RED}✗ MISSING${RESET} $controller\n";
        $checks_failed++;
    }
}

// Check 3: Models exist
echo "\n3. Checking models...\n";
$models = [
    'courseModel.php',
    'quizModel.php',
    'forumModel.php',
    'enrollModel.php',
    'resultModel.php',
    'LessonModel.php',
    'studentModel.php',
    'tutorModel.php',
    'resourceModel.php',
    'AdminCourseModel.php'
];

foreach ($models as $model) {
    if (file_exists(__DIR__ . '/app/models/' . $model)) {
        echo "   ${GREEN}✓${RESET} $model\n";
        $checks_passed++;
    } else {
        echo "   ${RED}✗ MISSING${RESET} $model\n";
        $checks_failed++;
    }
}

// Check 4: Views exist
echo "\n4. Checking view directories...\n";
$view_dirs = [
    'app/views/home',
    'app/views/course',
    'app/views/quiz',
    'app/views/forum',
    'app/views/enroll',
    'app/views/student_dashboard',
    'app/views/tutor_dashboard',
    'app/views/course_dashboard',
    'app/views/course_details',
    'app/views/course_list',
    'app/views/download_lesson',
    'app/views/upload_lesson',
    'app/views/partials',
    'app/views/error'
];

foreach ($view_dirs as $dir) {
    if (is_dir(__DIR__ . '/' . $dir)) {
        echo "   ${GREEN}✓${RESET} $dir/\n";
        $checks_passed++;
    } else {
        echo "   ${RED}✗ MISSING${RESET} $dir/\n";
        $checks_failed++;
    }
}

// Check 5: Asset directories
echo "\n5. Checking asset directories...\n";
$asset_dirs = [
    'public/assets/css',
    'public/assets/js',
    'public/assets/images',
    'public/assets/upload',
    'public/assets/lesson'
];

foreach ($asset_dirs as $dir) {
    if (is_dir(__DIR__ . '/' . $dir)) {
        echo "   ${GREEN}✓${RESET} $dir/\n";
        $checks_passed++;
    } else {
        echo "   ${RED}✗ MISSING${RESET} $dir/\n";
        $checks_failed++;
    }
}

// Check 6: Documentation files
echo "\n6. Checking documentation...\n";
$docs = [
    'README.md',
    'DATABASE_TABLES.sql',
    'DUMMY_DATA.sql',
    'CPANEL_DEPLOYMENT.md',
    'DEPLOYMENT_CHECKLIST.md',
    'DEPLOYMENT_COMPLETE.md',
    '.env.example',
    '.htaccess'
];

foreach ($docs as $doc) {
    if (file_exists(__DIR__ . '/' . $doc)) {
        echo "   ${GREEN}✓${RESET} $doc\n";
        $checks_passed++;
    } else {
        echo "   ${YELLOW}⚠${RESET} $doc (Optional)\n";
    }
}

// Check 7: Configuration check
echo "\n7. Checking configuration files...\n";
if (file_exists(__DIR__ . '/core/database.php')) {
    $db_content = file_get_contents(__DIR__ . '/core/database.php');
    if (strpos($db_content, 'akibhasa_turtlers') !== false) {
        echo "   ${GREEN}✓${RESET} Database configured for cPanel\n";
        $checks_passed++;
    } else {
        echo "   ${YELLOW}⚠${RESET} Database credentials may need updating\n";
    }
}

// Summary
echo "\n╔════════════════════════════════════════════════════════════╗\n";
echo "║                    VERIFICATION SUMMARY                    ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n\n";

echo "Checks Passed: ${GREEN}${checks_passed}${RESET}\n";
echo "Checks Failed: ${RED}${checks_failed}${RESET}\n\n";

if ($checks_failed === 0) {
    echo "${GREEN}✓ All critical files are present!${RESET}\n";
    echo "${GREEN}✓ Project is ready for cPanel deployment!${RESET}\n\n";
    echo "Next steps:\n";
    echo "1. Read CPANEL_DEPLOYMENT.md for detailed guide\n";
    echo "2. Upload all files to: /home/akibhasa/turtlers.akibhasan.me/\n";
    echo "3. Create database: akibhasa_turtlers_academy\n";
    echo "4. Import DATABASE_TABLES.sql\n";
    echo "5. Update database password in core/database.php\n";
    echo "6. Set file permissions (755 for dirs, 644 for files)\n";
    echo "7. Visit https://turtlers.akibhasan.me/ to verify\n\n";
} else {
    echo "${RED}✗ Some files are missing. Please check the errors above.${RESET}\n";
}

echo "═══════════════════════════════════════════════════════════════\n";
echo "Generated: " . date('Y-m-d H:i:s') . "\n";
echo "═══════════════════════════════════════════════════════════════\n";
?>
