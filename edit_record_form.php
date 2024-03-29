<?php
require('database.php');



$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
FROM records
WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
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


        <h1>Edit Record</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data" id="">
            <div class="form-group">
                <label>Category ID:</label>
                <input class="form-control" type="category_id" name="category_id"
                    value="<?php echo $records['categoryID']; ?>" />
                <br>
            </div>
            <div class="form-group">
                <label>Record ID:</label>
                <input class="form-control" type="record_id" name="record_id"
                    value="<?php echo $records['recordID']; ?>" />
                <br>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="input" name="name" value="<?php echo $records['name']; ?>" />
                <br>
            </div>
            <div class="form-group">
                <label>Description</label>
                <!-- <input class="form-control" type="text" name="description"
                    value="<?php echo $records['description']; ?>"> -->

                <textarea class=" form-control" name="description" rows="3" cols="25"
                    placeholder="<?php echo $records['description']; ?>"></textarea>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Method</label>

                <textarea class=" form-control" name="method" rows="5" cols="25"
                    placeholder="<?php echo $records['method']; ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ingredients</label>

                <textarea class=" form-control" name="ingredients" rows="5" cols="25"
                    placeholder="<?php echo $records['ingredients']; ?>"></textarea>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Preparation time</label>
                <input class="form-control" type="text" name="prep" value="<?php echo $records['prep']; ?>">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Cooking time</label>
                <input class="form-control" type="text" name="cook" value="<?php echo $records['cook']; ?>">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Serving</label>
                <input class="form-control" type="text" name="serve" value="<?php echo $records['serve']; ?>">

            </div>
            <br> </br>
            <div class="form-group">

                <label>Choose image:</label>
                <input type="file" class="form-control-file" name="image" accept="image/*" />
                <br> </br>
                <?php if ($records['image'] != "") { ?>
                <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" border-radius="3" /></p>
                <?php } ?>
            </div>

            <br> </br>




            <div class=" form-buttons">
                <input type="submit" class="btn btn-outline-success" value="Edit Record">


                <a href="./index.php" class="btn btn-outline-danger">Cancel</a>

            </div>

        </form>



    </div>
    <?php
include('includes/footer.php');
?>
</body>

</html>




<!-- $query = 'SELECT *
FROM categories
ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor(); -->