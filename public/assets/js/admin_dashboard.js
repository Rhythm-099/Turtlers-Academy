document.addEventListener("DOMContentLoaded", function () {
    console.log("Dashboard Loaded. Fetching stats...");

    function fetchStats() {
        fetch('../../controllers/dashboardController.php')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error("Error:", data.error);
                    return;
                }

                
                if (document.getElementById('student-count')) document.getElementById('student-count').innerText = data.student_count;
                if (document.getElementById('tutor-count')) document.getElementById('tutor-count').innerText = data.tutor_count;
                if (document.getElementById('exam-count')) document.getElementById('exam-count').innerText = data.exam_count;
                if (document.getElementById('notice-count')) document.getElementById('notice-count').innerText = data.notice_count;

             
                if (document.getElementById('total-salary')) {
                    document.getElementById('total-salary').innerText = "$" + data.total_salary;
                }

            })
            .catch(error => console.error('Error fetching dashboard stats:', error));
    }


    fetchStats();


    document.querySelectorAll('a[data-ajax="true"]').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.getAttribute('href');


            document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
            this.classList.add('active');

            loadContent(url);
        });
    });

    document.querySelectorAll('a[data-link="dashboard"]').forEach(link => {
        link.addEventListener('click', function (e) {

        });
    });

    function loadContent(url) {
        const contentDiv = document.querySelector('.content');
        contentDiv.innerHTML = '<div style="text-align:center; padding:50px;"><h2>Loading...</h2></div>';

        fetch(url + '?ajax=true')
            .then(response => response.text())
            .then(html => {
                contentDiv.innerHTML = html;

            })
            .catch(error => {
                console.error('Error loading content:', error);
                contentDiv.innerHTML = '<div style="color:red; text-align:center;"><h2>Error loading content</h2></div>';
            });
    }


    setInterval(fetchStats, 30000);
});
