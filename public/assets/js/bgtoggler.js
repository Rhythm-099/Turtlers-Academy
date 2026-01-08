function checkTheme(mode) {
    var allElements = document.getElementsByTagName("*");

    for (var i = 0; i < allElements.length; i++) {
        var el = allElements[i];

        if (el.className.indexOf("theme-section") != -1) {
            continue;
        }

        var style = window.getComputedStyle(el);
        var bg = style.backgroundColor;
        var text = style.color;

        if (mode == "dark") {
            if (bg == "rgb(255, 255, 255)" || bg == "rgba(0, 0, 0, 0)" || bg == "transparent" || bg == "rgb(244, 247, 246)") {
                if (el.tagName == "DIV" || el.tagName == "MAIN" || el.tagName == "SECTION" || el.tagName == "NAV" || el.tagName == "HEADER") {
                    if (!el.getAttribute("data-old-bg")) {
                        el.setAttribute("data-old-bg", el.style.backgroundColor || "transparent");
                        el.style.backgroundColor = "#1e1e1e";
                    }
                }
            }

            if (text == "rgb(51, 51, 51)" || text == "rgb(0, 0, 0)" || text == "rgb(33, 37, 41)") {
                if (!el.getAttribute("data-old-color")) {
                    el.setAttribute("data-old-color", el.style.color || "");
                    el.style.color = "#e0e0e0";
                }
            }

            if (el.className.indexOf("course-card") != -1 || el.className.indexOf("help-container") != -1 || el.className.indexOf("greeting-widget") != -1) {
                el.style.backgroundColor = "#2c2c2c";
                el.style.borderColor = "#444";
            }
        } else {
            if (el.getAttribute("data-old-bg")) {
                el.style.backgroundColor = el.getAttribute("data-old-bg");
                el.removeAttribute("data-old-bg");
            }
            if (el.getAttribute("data-old-color")) {
                el.style.color = el.getAttribute("data-old-color");
                el.removeAttribute("data-old-color");
            }

            if (el.className.indexOf("course-card") != -1 || el.className.indexOf("help-container") != -1 || el.className.indexOf("greeting-widget") != -1) {
                el.style.backgroundColor = "";
                el.style.borderColor = "";
            }
        }
    }

    if (mode == "dark") {
        document.body.style.backgroundColor = "#1e1e1e";
        document.body.style.color = "#f0f0f0";
    } else {
        document.body.style.backgroundColor = "";
        document.body.style.color = "";
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var theme = localStorage.getItem("siteTheme");
    if (!theme) {
        theme = "light-mode";
    }

    document.body.className = theme;

    setTimeout(function () {
        if (theme == "dark-mode") {
            checkTheme("dark");
        }
    }, 100);

    var btn = document.getElementById("themeToggle");
    if (btn) {
        btn.onclick = function () {
            if (document.body.className == "light-mode") {
                document.body.className = "dark-mode";
                localStorage.setItem("siteTheme", "dark-mode");
                checkTheme("dark");
            } else {
                document.body.className = "light-mode";
                localStorage.setItem("siteTheme", "light-mode");
                checkTheme("light");
            }
        };
    }
});