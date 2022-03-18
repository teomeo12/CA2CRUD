<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!-- the head section -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Healty Recepies</title>
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <link href="carousel.css" rel="stylesheet">
    <link href="./css/mystyle.css" rel="stylesheet">
</head>

<body>
    <?php
include('includes/header.php');
?>
    <div class="form-container">


        <h1>Add Record</h1>

        <!-- Bootstrap form start -->
        <form action="add_record.php" method="post" enctype="multipart/form-data" id="add_record_form">
            <strong><label>Category:</label></strong>
            <select name="category_id">
                <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br> </br>


            <div class="form-group">
                <label>Name</label>
                <input class="form-control" type="text" name="name" placeholder="Enter the name of the product">

            </div>
            <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="description"
                    placeholder=" Enter the Description of the product">

            </div>
            <div class="form-group">
                <label>Method</label>
                <input class="form-control" type="text" name="method" placeholder=" Enter the Method of preparation">

            </div>
            <div class="form-group">
                <label>Ingredients</label>
                <input class="form-control" type="text" name="ingredients"
                    placeholder=" Enter the Ingredients of the product">

            </div>
            <div class="form-group">
                <label>Preparation time</label>
                <input class="form-control" type="text" name="prep" placeholder=" Enter the Preparation time">

            </div>
            <div class="form-group">
                <label>Cooking time</label>
                <input class="form-control" type="text" name="cook" placeholder=" Enter the Cooking time">

            </div>
            <div class="form-group">
                <label>Serving</label>
                <input class="form-control" type="text" name="serve" placeholder=" Enter the Serving portions">

            </div>
            <br> </br>
            <div class="form-group">
                <label>Choose image</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" accept="image/*">
            </div>

            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>

            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>
            <br> </br>

            <div class="form-buttons">
                <input type="submit" class="btn btn-outline-success" value="Add Record">


                <a href="./index.php" class="btn btn-outline-danger">Cancel</a>

            </div>

        </form>

        <!-- Bootstrap form end -->

    </div>

    <?php
include('includes/footer.php');
?>

</body>

</html>
<!-- <form action="add_record.php" method="post" enctype="multipart/form-data" id="add_record_form">

            <label>Category:</label>
            <select name="category_id">
                
            </select>
            <br>
            <label>Name:</label>
            <input type="input" name="name" required>
            <br>

            <label>List Price:</label>
            <input type="input" name="price" placeholder="Enter">
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Record">
            <br>
        </form> -->