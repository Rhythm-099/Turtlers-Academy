function validateForm() {
    let id = document.getElementById("id").value;
    let code = document.getElementById("code").value;
    let name = document.getElementById("name").value;
    let instructor = document.getElementById("instructor").value;
    let img = document.getElementById("image").value;
    let msg = document.getElementById("message");

    if (id === "" || code === "" || name === "" || instructor === "" || img === "") {
        msg.style.color = "red";
        msg.innerHTML = "Error: All fields and an image are required!";
        return false;
    }
    return true;
}