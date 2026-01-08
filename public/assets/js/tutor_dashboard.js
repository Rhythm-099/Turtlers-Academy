function ajaxTutor(act) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('main-display').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/Turtlers-Academy/app/controllers/TutorController.php?action=" + act, true);
    xhttp.send();
}

function submitUpload(e) {
    e.preventDefault();
    var form = document.getElementById('uploadForm');
    var status = document.getElementById('status');
    var formData = new FormData(form);

    status.innerHTML = "Processing...";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            status.innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "/Turtlers-Academy/app/controllers/TutorController.php?action=process_upload", true);
    xhttp.send(formData);
}

function selectTab(el) {
    var tabs = document.querySelectorAll('.tab-btn');
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].classList.remove('active');
    }
    el.classList.add('active');
}

function ajaxLoadLessonDashboard() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('main-display').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/Turtlers-Academy/app/views/upload_lesson/lesson_dashboard.php", true);
    xhttp.send();
}