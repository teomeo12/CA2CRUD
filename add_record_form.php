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
<?php
include('includes/header.php');
?>
<div class="container">

    <h1>Add Record</h1>
    <form action="add_record.php" method="post" enctype="multipart/form-data" id="add_record_form">

        <label>Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
            <?php endforeach; ?>
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
    </form>

</div>
<?php
include('includes/footer.php');
?>