function validateForm() {
    // Getting values from the IDs we added above
    let course = document.getElementById("course_id").value;
    let lecture = document.getElementById("lecture_week").value;
    let title = document.getElementById("lesson_title").value;
    let file = document.getElementById("lesson_file").value;
    let msg = document.getElementById("message");

    // Validation logic
    if (course === "" || lecture === "" || title === "" || file === "") {
        msg.style.color = "red";
        msg.style.marginBottom = "15px";
        msg.innerHTML = "Error: All fields and a lesson file are required!";
        return false;
    }

    // Optional: Basic file type check (e.g., PDF or Video)
    return true;
}