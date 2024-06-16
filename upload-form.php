<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload PDF</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose a PDF file:</label>
        <input type="file" name="file" id="file" accept="application/pdf" required>
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>

