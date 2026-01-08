<div class="greeting-widget" style="background: white; padding: 20px; border-radius: 12px; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
    <div>
        <h2 style="margin: 0; font-size: 24px;">Hello, <span id="user-name"><?php echo htmlspecialchars($displayName); ?></span>!</h2>
        <p id="greeting-text" style="margin: 5px 0 0; color: #666;"></p>
    </div>
    <div style="text-align: right;">
        <h3 id="current-time" style="margin: 0; font-size: 20px; color: #ff7b00;"></h3>
        <p id="current-date" style="margin: 5px 0 0; font-size: 14px; color: #888;"></p>
    </div>
</div>

<script>
function updateTime() {
    var now = new Date();
    
    var h = now.getHours();
    var m = now.getMinutes();
    var s = now.getSeconds();
    
    if (h < 10) h = "0" + h;
    if (m < 10) m = "0" + m;
    if (s < 10) s = "0" + s;
    
    var timeStr = h + ":" + m + ":" + s;
    document.getElementById("current-time").innerText = timeStr;
    
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById("current-date").innerText = now.toLocaleDateString(undefined, options);
    
    var greet = "";
    var role = "<?php echo isset($_SESSION['role']) ? $_SESSION['role'] : 'student'; ?>";
    
    if (now.getHours() < 12) {
        greet = "Good Morning! Have a great day.";
    } else if (now.getHours() < 18) {
        greet = "Good Afternoon! Hope you're doing well.";
    } else {
        if (role == "tutor") {
            greet = "Good Evening! Ready to do something productive?";
        } else {
            greet = "Good Evening! Ready to learn something new?";
        }
    }
    document.getElementById("greeting-text").innerText = greet;
}

setInterval(updateTime, 1000);
updateTime();
</script>