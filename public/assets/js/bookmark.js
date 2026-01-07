function addBookmark(id, title) {
    let bookmarks = JSON.parse(localStorage.getItem("student_bookmarks")) || [];
    const isDuplicate = bookmarks.some(item => item.id === id);
    if (isDuplicate) { alert("already bookmarked"); return; }
    bookmarks.push({ id: id, title: title });
    localStorage.setItem("student_bookmarks", JSON.stringify(bookmarks));
    alert("Added to Bookmarks!");
}
function renderBookmarksPage() {
    const list = document.getElementById('bookmarkPageList');
    if (!list) return;
    let bookmarks = JSON.parse(localStorage.getItem("student_bookmarks")) || [];
    if (bookmarks.length === 0) { list.innerHTML = "<p>No courses bookmarked yet.</p>"; return; }
    list.innerHTML = bookmarks.map(item => `
        <li style="padding:15px;background:#f9f9f9;border:1px solid #ddd;border-radius:8px;margin-bottom:10px;display:flex;justify-content:space-between;align-items:center;">
            <span>📚 <strong>${item.title}</strong></span>
            <button onclick="removeBookmark('${item.id}')" style="color:red;border:none;background:none;cursor:pointer;font-weight:bold;">Remove</button>
        </li>
    `).join('');
}
function removeBookmark(id) {
    let bookmarks = JSON.parse(localStorage.getItem("student_bookmarks")) || [];
    bookmarks = bookmarks.filter(item => item.id.toString() !== id.toString());
    localStorage.setItem("student_bookmarks", JSON.stringify(bookmarks));
    renderBookmarksPage();
}
