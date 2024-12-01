<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $adTitle = $_POST['ad_title'];
    $adDescription = $_POST['ad_description'];
    $adFormat = $_POST['ad_format'];

    // Handle the file upload
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['media']['name']);

    if (move_uploaded_file($_FILES['media']['tmp_name'], $uploadFile)) {
        // Store the ad information in the database or a file-based storage
        // (code to save the ad data goes here)

        // Provide feedback to the user
        echo "Ad created successfully!";
    } else {
        echo "Error uploading the media file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Ad</title>
</head>
<body>
    <h1>Add New Ad</h1>
    <form action="add_ad.php" method="post" enctype="multipart/form-data">
        <label for="ad_title">Ad Title:</label>
        <input type="text" id="ad_title" name="ad_title" required><br>

        <label for="ad_description">Ad Description:</label>
        <textarea id="ad_description" name="ad_description" required></textarea><br>

        <label for="ad_format">Ad Format:</label>
        <input type="radio" id="ad_format_video" name="ad_format" value="video" checked>
        <label for="ad_format_video">Video</label>
        <input type="radio" id="ad_format_image_carousel" name="ad_format" value="image_carousel">
        <label for="ad_format_image_carousel">Image Carousel</label>
        <input type="radio" id="ad_format_interactive" name="ad_format" value="interactive">
        <label for="ad_format_interactive">Interactive</label><br>

        <label for="media">Upload Media:</label>
        <input type="file" id="media" name="media" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>