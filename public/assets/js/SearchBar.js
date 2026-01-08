function filterCourses() {
    var input = document.getElementById("courseSearch");
    var filter = input.value.toUpperCase();
    var grid = document.getElementById("courseGrid");
    var cards = grid.getElementsByClassName("course-card");
    var found = false;

    for (var i = 0; i < cards.length; i++) {
        var h4 = cards[i].getElementsByTagName("h4")[0];
        var txtValue = h4.textContent || h4.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
            found = true;
        } else {
            cards[i].style.display = "none";
        }
    }

    var noRes = document.getElementById("noCourseResults");
    if (noRes) {
        if (found == true) {
            noRes.style.display = "none";
        } else {
            noRes.style.display = "block";
        }
    }
}

function filterStudents() {
    var input = document.getElementById("studentSearch");
    var filter = input.value.toUpperCase();
    var table = document.getElementById("studentTable");
    if (!table) return;
    var tr = table.getElementsByClassName("student-row");
    var found = false;

    for (var i = 0; i < tr.length; i++) {
        var td = tr[i].getElementsByClassName("s-name")[0];
        if (td) {
            var txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                found = true;
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    var noRes = document.getElementById("noStudentResults");
    if (noRes) {
        if (found == true) {
            noRes.style.display = "none";
        } else {
            noRes.style.display = "block";
        }
    }
}
