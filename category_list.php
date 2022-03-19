<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>
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

    <link href="carousel.css" rel="stylesheet">
    <link href="./css/mystyle.css" rel="stylesheet">
</head>

<body>
    <?php
include('includes/header.php');
?>
    <div class="categoryForm-container">

        <h1>Category List</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['categoryName']; ?></td>
                <td>
                    <form action="delete_category.php" method="post" id="delete_product_form">
                        <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                        <input class="btn btn-outline-danger" type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>

        <h2>Add Category</h2>
        <form action="add_category.php" method="post" id="add_category_form">
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="input" name="name">
                <br>
                <div class="form-buttons">
                    <input id="add_category_button" type="submit" class="btn btn-outline-success" value="Add Category">


                    <a href="./index.php" class="btn btn-outline-danger">Cancel</a>

                </div>

            </div>
        </form>
        <br>

    </div>

    <?php
include('includes/footer.php');
?>