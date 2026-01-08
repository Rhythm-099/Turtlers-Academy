function addBookmark(id, title) {
    var raw = localStorage.getItem("student_bookmarks");
    var bookmarks = [];
    if (raw) {
        bookmarks = JSON.parse(raw);
    }

    var found = false;
    for (var i = 0; i < bookmarks.length; i++) {
        if (bookmarks[i].id == id) {
            found = true;
            break;
        }
    }

    if (found == true) {
        alert("This course is already in your bookmarks!");
        return;
    }

    bookmarks.push({ id: id, title: title });
    localStorage.setItem("student_bookmarks", JSON.stringify(bookmarks));
    alert("Added to Bookmarks!");
}

function renderBookmarksPage() {
    var list = document.getElementById('bookmarkPageList');
    if (list == null) return;

    var raw = localStorage.getItem("student_bookmarks");
    var bookmarks = [];
    if (raw) {
        bookmarks = JSON.parse(raw);
    }

    if (bookmarks.length == 0) {
        list.innerHTML = "<p style='padding:20px; color:#666;'>No courses bookmarked yet.</p>";
        return;
    }

    var html = "";
    for (var j = 0; j < bookmarks.length; j++) {
        var item = bookmarks[j];
        html = html + '<li style="padding:15px; background:#f9f9f9; border:1px solid #ddd; border-radius:8px; margin-bottom:10px; display:flex; justify-content:space-between; align-items:center;">';
        html = html + '<span>📚 <strong>' + item.title + '</strong></span>';
        html = html + '<button onclick="removeBookmark(\'' + item.id + '\')" style="color:red; border:none; background:none; cursor:pointer; font-weight:bold;">Remove</button>';
        html = html + '</li>';
    }
    list.innerHTML = html;
}

function removeBookmark(id) {
    var raw = localStorage.getItem("student_bookmarks");
    var bookmarks = [];
    if (raw) {
        bookmarks = JSON.parse(raw);
    }

    var newList = [];
    for (var k = 0; k < bookmarks.length; k++) {
        if (bookmarks[k].id != id) {
            newList.push(bookmarks[k]);
        }
    }

    localStorage.setItem("student_bookmarks", JSON.stringify(newList));
    renderBookmarksPage();
}