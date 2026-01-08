function selectTab(element) {
    var tabs = document.querySelectorAll('.tab-btn');
    for (var i = 0; i < tabs.length; i++) {
        tabs[i].classList.remove('active');
    }
    element.classList.add('active');
}

function ajaxLoadCourseList() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-display").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/Turtlers-Academy/app/views/course_list/course_list.php", true);
    xhttp.send();
}

function ajaxLoadAboutMe() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-display").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/Turtlers-Academy/app/controllers/dashboardController.php?action=aboutme", true);
    xhttp.send();
}

function ajaxLoadView(act) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-display").innerHTML = this.responseText;
            if (act === 'view_bookmarks' && typeof renderBookmarksPage === 'function') {
                renderBookmarksPage();
            }
        }
    };
    xhttp.open("GET", "/Turtlers-Academy/app/controllers/dashboardController.php?action=" + act, true);
    xhttp.send();
}