<?php
// Get the product data
$recordID = filter_input(INPUT_POST, 'recordID', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$method = filter_input(INPUT_POST, 'method');
$ingredients = filter_input(INPUT_POST, 'ingredients');
$prep = filter_input(INPUT_POST, 'prep', FILTER_VALIDATE_INT);
$cook = filter_input(INPUT_POST, 'cook', FILTER_VALIDATE_INT);
$serve = filter_input(INPUT_POST, 'serve', FILTER_VALIDATE_INT);

// Validate inputs
if ($category_id == null || $category_id == false ||
    $name == null || 
    $description == null || $method == null ||$ingredients == null||
    $prep == null|| $prep == false || $cook == null || $cook == false||
    $serve == null || $serve == false
    ) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
    exit();
} else {
    /**************************** Image upload ****************************/
    // error_reporting(~E_NOTICE); 
// avoid notice
    $imgFile = $_FILES['image']['name'];
    $tmp_dir = $_FILES['image']['tmp_name'];
    echo $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];

    if (empty($imgFile)) {
        $image = "";
    } else {
        $upload_dir = 'image_uploads/'; // upload directory

        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        // rename uploading image
        $image = rand(1000, 1000000) . "." . $imgExt;
        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
        // Check file size '5MB'
            if ($imgSize < 5000000) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $image)) {
                    echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                } else {
                    $error =  "Sorry, there was an error uploading your file.";
                    include('error.php');
                    exit();
                }
            } else {
                $error = "Sorry, your file is too large.";
                include('error.php');
                exit();
            }
        } else {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            include('error.php');
            exit();
        }
    }
    /************************** End Image upload **************************/
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO records
           (categoryID, name, description,method,ingredients,prep,cook,serve, image)
           VALUES
           (:category_id, :name, :description, :method, :ingredients, :prep, :cook, :serve,:image)";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':method', $method);
    $statement->bindValue(':ingredients', $ingredients);
    $statement->bindValue(':prep', $prep);
    $statement->bindValue(':cook', $cook);
     $statement->bindValue(':serve', $serve);
    $statement->bindValue(':image', $image);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}