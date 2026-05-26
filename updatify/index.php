<?php  
// Load version updates from JSON
$version_updates = [];
if (file_exists("updates.json")) {
    $version_updates = json_decode(file_get_contents("updates.json"), true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AutoManager Version Updates</title>
<link rel="icon" type="image/png" href="auto.png">

<style>
/* SAME STYLING YOU PROVIDED */
body {
    margin: 0;
    font-family: "Segoe UI", sans-serif;
    background: linear-gradient(145deg, #0d1c1c, #143232);
    color: #e4fdfc;
}

header {
    text-align: center;
    padding: 50px 20px;
    background: rgba(15, 77, 70, 0.55);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 8px 25px rgba(0,0,0,0.4);
    margin-bottom: 30px;
    border-radius: 0 0 20px 20px;
}
header h1 {
    color: #fff;
    font-size: 38px;
    letter-spacing: 2px;
}


.container {
    max-width: 1300px;
    margin: 20px auto;
    padding: 30px 20px;
}

/* Make exactly 3 items per row */
.version-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 per row */
    gap: 30px; /* spacing */
    justify-items: center;
}

.version-card {
    background: linear-gradient(155deg, #1c2e2e, #264545);
    border-radius: 15px;
    padding: 25px;
    width: 350px;
    height: 420px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.6);
    transition: .3s ease;
    display: flex;
    flex-direction: column;
}

.version-card:hover {
    transform: translateY(-10px) scale(1.03);
    background: linear-gradient(155deg, #2d4747, #00cca3);
    box-shadow: 0 15px 40px rgba(0,0,0,0.7);
}

.version-number {
    font-size: 1.8em;
    text-align: center;
    color: #00fcb1;
    font-weight: bold;
    margin-bottom: 15px;
    text-shadow: 0 0 10px #00ffd5;
}

.change-details {
    flex-grow: 1;
    overflow-y: scroll; /* scrolling works */
    scrollbar-width: none;  /* hide scrollbar - Firefox */
    height: 300px;
}

/* Hide scrollbar - Chrome, Edge, Safari */
.change-details::-webkit-scrollbar {
    display: none;
}

.change-details ul {
    list-style: none;
    padding-left: 20px;
}

.change-details li {
    margin: 10px 0;
    padding-left: 25px;
    position: relative;
    font-size: 1em;
}

.change-details li::before {
    content: "✔";
    position: absolute;
    left: 0;
    color: #03ffb3;
    font-weight: bold;
}

.download-btn {
    margin-top: 18px;
    padding: 13px;
    background: #03ffb3;
    color: #003322;
    font-weight: bold;
    text-align: center;
    display: block;
    border-radius: 10px;
    text-decoration: none;
    transition: .2s;
}

.download-btn:hover {
    background: #00d897;
}

.not-available {
    background: #555 !important;
    color: #ddd !important;
}
/* Modern Neon Search Bar */
.search-box {
    display: flex;
    justify-content: center;
    margin-bottom: 35px;
}

.search-box input {
    width: 380px;
    padding: 14px 20px;
    border: none;
    border-radius: 50px;
    outline: none;
    font-size: 16px;
    background: #223737;
    color: #e4fdfc;
    box-shadow: 0 0 12px rgba(0,255,200,0.25);
    transition: 0.3s;
    text-align: center;
    letter-spacing: 0.5px;
}

.search-box input:focus {
    background: #1b2d2d;
    box-shadow: 0 0 15px rgba(0,255,200,0.55);
    transform: scale(1.05);
}


</style>

</head>
<body>

<header>
    <h1>Updatify</h1>
    <p>“New Versions, New Levels!”</p>
</header>

<div class="container">

    <!-- SEARCH BAR -->
    <div class="search-box">
        <input id="searchInput" onkeyup="filterVersions()" placeholder="Search version (e.g., 25.30)...">
    </div>

    <div class="version-container" id="versionList">

        <?php
        if (!empty($version_updates)):
            foreach($version_updates as $version => $data): ?>
        <div class="version-card" data-version="<?= $version ?>">

            <div class="version-number">v<?= $version ?></div>

            <div class="change-details">
                <ul>
                    <?php 
                    $lines = array_filter(array_map('trim', explode("\n", $data['details'])));
                    foreach($lines as $line): ?>
                        <li><?= htmlspecialchars($line) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php if (!empty($data['link'])): ?>
                <a href="<?= $data['link'] ?>" class="download-btn">⬇ Download v<?= $version ?></a>
            <?php else: ?>
                <span class="download-btn not-available">❌ Not Available</span>
            <?php endif; ?>

        </div>
        <?php endforeach;
        else:
            echo "<h2>No versions uploaded yet.</h2>";
        endif;
        ?>

    </div>
</div>

<script>
function filterVersions() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let cards = document.querySelectorAll(".version-card");

    cards.forEach(card => {
        let version = card.getAttribute("data-version").toLowerCase();
        card.style.display = version.includes(input) ? "block" : "none";
    });
}
</script>

</body>
</html>
