<html>
<head>
    <title>Sample upload</title>
</head>
<body>
<form name="FileUpload" enctype="multipart/form-data" method="post" action="test.php">
    <input type="hidden" name="action" value="UPLOAD_PHOTO_ON_SERVER">
    <input type="hidden" name="user_id" value="3347">
    <input type="hidden" name="albumID" value="5244">
    <input type="hidden" name="type" value="photo">
    <input type="file" name="uploadFile00">
    <input type="submit" value="Submit">
</form>
</body>
</html>