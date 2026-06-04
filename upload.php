<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include 'db.php';

// security key (simple admin lock)
$password = "realm123";

if (!isset($_GET['key']) || $_GET['key'] !== $password) {
    die("Access denied");
}

// check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // image upload handling
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $upload_dir = "uploads/";
    $target_file = $upload_dir . basename($image);

    // move file into uploads folder
    if (move_uploaded_file($tmp_name, $target_file)) {

        // save to database
        $sql = "INSERT INTO artworks (title, description, price, image)
                VALUES ('$title', '$description', '$price', '$image')";

        if ($conn->query($sql)) {
            echo "Artwork uploaded successfully!";
        } else {
            echo "Database error: " . $conn->error;
        }

    } else {
        echo "Image upload failed.";
    }
}
?>

<!-- SIMPLE UPLOAD FORM -->
<form method="POST" enctype="multipart/form-data">

    <h2>Upload Artwork</h2>

    <input type="text" name="title" placeholder="Artwork Name" required><br><br>

    <textarea name="description" placeholder="Description"></textarea><br><br>

    <input type="number" name="price" placeholder="Price" step="0.01"><br><br>

    <input type="file" name="image" required><br><br>

    <button type="submit">Upload</button>

</form>