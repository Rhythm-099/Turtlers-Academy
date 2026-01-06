<?php
// Note: session_start() removed as requested.

$studentProfile = [
    "name" => $_SESSION['student_name'] ?? "Nazat", 
    "institution" => "Turtlers Academy of Tech",
    "age" => 21,
    "cgpa" => 3.85,
    "enrolled_courses" => ["Web Technologies", "Database Systems"]
];

$availableCourses = [
    "web101" => ["title" => "Web Technologies", "tutor" => "Dr. Smith", "image" => "/Turtlers-Academy/public/assets/images/web.jpg"],
    "py101"  => ["title" => "Python Basics", "tutor" => "Prof. Jane", "image" => "/Turtlers-Academy/public/assets/images/python.jpg"],
    "db101"  => ["title" => "Database Systems", "tutor" => "Dr. Brown", "image" => "/Turtlers-Academy/public/assets/images/db.jpg"],
    "ds101"  => ["title" => "Data Structures", "tutor" => "Alice Wong", "image" => "/Turtlers-Academy/public/assets/images/ds.jpg"],
    "js101"  => ["title" => "JavaScript Mastery", "tutor" => "John Doe", "image" => "/Turtlers-Academy/public/assets/images/js.jpg"],
    "net101" => ["title" => "Networking", "tutor" => "Cisco Ray", "image" => "/Turtlers-Academy/public/assets/images/net.jpg"],
    "ai101"  => ["title" => "AI Fundamentals", "tutor" => "Dr. Turing", "image" => "/Turtlers-Academy/public/assets/images/ai.jpg"],
    "sec101" => ["title" => "Cyber Security", "tutor" => "Kevin Mit", "image" => "/Turtlers-Academy/public/assets/images/sec.jpg"],
    "app101" => ["title" => "Mobile App Dev", "tutor" => "Steve Jobs", "image" => "/Turtlers-Academy/public/assets/images/app.jpg"],
    "ux101"  => ["title" => "UI/UX Design", "tutor" => "Don Norman", "image" => "/Turtlers-Academy/public/assets/images/ux.jpg"]
];

// AJAX About Me Handler
if (isset($_GET['action']) && $_GET['action'] === 'aboutme') {
    echo "
    <div style='background:white; padding:30px; border-radius:12px;'>
        <button onclick='location.reload()' style='cursor:pointer; color:blue; border:none; background:none;'>← Back</button>
        <h2 style='margin:20px 0;'>My Profile</h2>
        <p><strong>Name:</strong> {$studentProfile['name']}</p>
        <p><strong>Institution:</strong> {$studentProfile['institution']}</p>
        <p><strong>Age:</strong> {$studentProfile['age']}</p>
        <p><strong>CGPA:</strong> {$studentProfile['cgpa']}</p>
        <hr>
        <h4>My Enrolled Courses:</h4>
        <ul>";
        foreach($studentProfile['enrolled_courses'] as $c) { echo "<li>$c</li>"; }
    echo "</ul></div>";
    exit;
}

// AJAX Courses Tab Handler
if (isset($_GET['action']) && $_GET['action'] === 'view_courses') {
    echo "<section class='course-grid'>";
    foreach ($availableCourses as $id => $course) {
        echo "
        <div class='course-card'>
            <img src='{$course['image']}' class='course-card-img'>
            <h4>{$course['title']}</h4>
            <button class='bookmark-btn' onclick='addBookmark(\"{$id}\", \"{$course['title']}\")' style='width:100%; background:#f0f0f0; border:none; padding:8px; cursor:pointer; border-radius:6px; margin-bottom:5px;'>🔖 Bookmark</button>
            <button class='view-btn' onclick='ajaxLoadDetail(\"{$id}\")'>View Details</button>
        </div>";
    }
    echo "</section>";
    exit;
}

// AJAX Bookmark View Handler
if (isset($_GET['action']) && $_GET['action'] === 'view_bookmarks') {
    echo "
    <div style='background:white; padding:30px; border-radius:12px;'>
        <h2>Your Bookmarked Courses</h2>
        <ul id='bookmarkPageList' style='list-style:none; padding:0; margin-top:20px;'></ul>
    </div>";
    exit;
}

// AJAX Detail Handler
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($availableCourses[$id])) {
        echo "<div style='background:white; padding:20px;'><h2>{$availableCourses[$id]['title']}</h2><p>Details Loaded!</p></div>";
    }
    exit;
}