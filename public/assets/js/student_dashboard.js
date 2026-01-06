window.selectTab = function(element) {
    const tabs = document.querySelectorAll('.tab-btn');
    tabs.forEach(tab => tab.classList.remove('active'));
    element.classList.add('active');
};

window.ajaxLoadAboutMe = function() {
    fetch(`/Turtlers-Academy/app/controllers/dashboardController.php?action=aboutme`)
        .then(res => res.text())
        .then(html => {
            document.getElementById('main-display').innerHTML = html;
        });
};

window.ajaxLoadView = function(action) {
    fetch(`/Turtlers-Academy/app/controllers/dashboardController.php?action=${action}`)
        .then(res => res.text())
        .then(html => {
            document.getElementById('main-display').innerHTML = html;
            if (action === 'view_bookmarks' && typeof renderBookmarksPage === 'function') {
                renderBookmarksPage();
            }
        });
};

window.ajaxLoadDetail = function(id) {
    fetch(`/Turtlers-Academy/app/controllers/dashboardController.php?id=${id}`)
        .then(res => res.text())
        .then(html => {
            document.getElementById('main-display').innerHTML = html;
        });
};