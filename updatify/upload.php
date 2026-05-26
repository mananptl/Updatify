<!DOCTYPE html>
<html>
<head>
<title>Upload Version</title>

<style>
body { background:#0d1c1c; font-family:Segoe UI; color:white; }
.form-box {
    max-width:700px; margin:50px auto; padding:30px;
    background:#1c2e2e; border-radius:15px;
}
input, textarea {
    width:100%; padding:10px; border-radius:8px; border:none; margin-top:5px;
}
button {
    background:#03ffb3; color:#003322; padding:12px 20px;
    font-weight:bold; border:none; border-radius:10px; cursor:pointer;
}
</style>
</head>
<body>

<div class="form-box">
    <h2 style="text-align:center;color:#03ffb3;">Upload New Version</h2>

    <form action="upload_handler.php" method="POST" enctype="multipart/form-data">

        <label>Version Number</label>
        <input type="text" name="version" required>

        <label>Update Details</label>
        <textarea name="details" rows="7" required></textarea>

        <label>Upload File</label>
        <input type="file" name="update_file" required>

        <br><br>
        <button type="submit">Upload Version</button>
    </form>
</div>

</body>
</html>
