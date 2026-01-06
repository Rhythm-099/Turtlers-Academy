// Navigation
window.ajaxTutor = function(action) {
    const displayArea = document.getElementById('main-display');
    fetch(`/Turtlers-Academy/app/controllers/TutorController.php?action=${action}`)
        .then(response => response.text())
        .then(html => {
            displayArea.innerHTML = html;
        });
};

// File Upload (Stops page reload)
window.submitUpload = function(e) {
    e.preventDefault();
    const form = document.getElementById('uploadForm');
    const statusDiv = document.getElementById('status');
    const formData = new FormData(form);
    statusDiv.innerHTML = "Processing...";
    fetch('/Turtlers-Academy/app/controllers/TutorController.php?action=process_upload', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => { statusDiv.innerHTML = data; })
    .catch(err => console.error(err));
};

// Search: Courses
window.filterCourses = function() {
    let input = document.getElementById('courseSearch').value.toLowerCase();
    let cards = document.getElementsByClassName('course-card');
    let noResults = document.getElementById('noResultsMessage');
    let visibleCount = 0;

    for (let card of cards) {
        let title = card.getElementsByTagName('h4')[0].innerText.toLowerCase();
        if (title.includes(input)) {
            card.style.display = "";
            visibleCount++;
        } else {
            card.style.display = "none";
        }
    }
    noResults.style.display = (visibleCount === 0) ? "block" : "none";
};

// Search: Students
window.filterStudents = function() {
    let input = document.getElementById('studentSearch').value.toLowerCase();
    let rows = document.getElementsByClassName('student-row');
    let noResults = document.getElementById('noStudentResults');
    let visibleCount = 0;

    for (let row of rows) {
        let name = row.getElementsByClassName('s-name')[0].innerText.toLowerCase();
        if (name.includes(input)) {
            row.style.display = "";
            visibleCount++;
        } else {
            row.style.display = "none";
        }
    }
    noResults.style.display = (visibleCount === 0) ? "block" : "none";
};