<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
$category_id = filter_input(INPUT_GET, 'category_id', 
FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
$category_id = 1;
}
}

// Get name for current category
$queryCategory = "SELECT * FROM categories
WHERE categoryID = :category_id";
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$statement1->closeCursor();
$category_name = $category['categoryName'];

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get records for selected category
$queryRecords = "SELECT * FROM records
WHERE categoryID = :category_id
ORDER BY recordID";
$statement3 = $db->prepare($queryRecords);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();
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
    <!-- <style>
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
    </style> -->
    <link href="carousel.css" rel="stylesheet">
    <link href="./css/mystyle.css" rel="stylesheet">
</head>

<body>
    <?php
include('includes/header.php');
?>
    <!-- Carousel Start -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777" />
                </svg> -->
                <div class="carousel-caption text-start">
                    <strong>
                        <h1>The best recepies</h1>
                    </strong>

                    <p>Take your dinner to new heights</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                </div>
                <img class="d-block w-100" width="100%" height="100%" src="./images/1.jpg" alt="First slide">




            </div>
            <div class="carousel-item">
                <img class="d-block w-100" width="100%" height="100%" src="./images/2.jpg" alt="First slide">


                <div class="carousel-caption">
                    <h1>The best recepies</h1>
                    <p>Work Lunches Have Never Been Tastier!</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p> -->
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" width="100%" height="100%" src="./images/3.jpg" alt="First slide">


                <div class="carousel-caption text-end">
                    <h1>One more for good measure.</h1>
                    <p>Green wins Gold! Best Speedy Supper for the Healthy Food Guide</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p> -->
                </div>

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Carousel End -->

    <!-- Container Start -->


    <div class=" card-container">
        <!-- display a list of categories -->
        <div>
            <h2><?php echo $category_name; ?></h2>
        </div>
        <div class="container">

        </div>
        <!-- display a table of records -->


        <br><br>
        <table>

            <?php foreach ($records as $record) : ?>



            <div class="card">
                <div class="card-img-top"><img src="image_uploads/<?php echo $record['image']; ?>" />
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?php echo $record['name']; ?></h5>
                    <p class="card-text"><?php echo $record['description']; ?></p>
                    <a href="./recipe1.php" class="btn btn-primary">View recepe</a>
                </div>
                <div class="card_buttons">
                    <div>
                        <form action="delete_record.php" method="post" id="delete_record_form">
                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                            <!-- <input type="submit" value="Delete"> -->
                            <button class="delete_button" type="submit" name="submit"><i
                                    class="material-icons">delete_outline</i></button>
                        </form>
                    </div>
                    <div>
                        <form action="edit_record_form.php" method="post" id="delete_record_form">
                            <input type="hidden" name="record_id" value="<?php echo $record['recordID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $record['categoryID']; ?>">
                            <button class="edit_button" type="submit" name="submit"><i
                                    class="material-icons">edit</i></button>
                        </form>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </table>



        <!-- <form action="add_record_form.php" method="post" id="add_record_form">

                <input type="submit" value="Add Record">
            </form>
            <form action="category_list.php" method="post" id="category_list">

                <input type="submit" value="Manage Categories">
            </form> -->




    </div>
    <!-- Container End -->
    <div class="manage-categories">
        <form action=" add_record_form.php" method="post">

            <input class="btn btn-outline-success" type="submit" value="Add Record">
        </form>
        <form action="category_list.php" method="post">

            <input class="btn btn-outline-danger" type="submit" value="Manage Categories">
        </form>
    </div>


    <?php
include('includes/footer.php');
?>

    <script>
    //Hidden Nav bar
    const body = document.body;
    let lastScroll = 0;

    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll <= 10) {
            body.classList.remove("scroll-up");
            return;
        }

        if (currentScroll > lastScroll && !body.classList.contains("scroll-down")) {
            body.classList.remove("scroll-up");
            body.classList.add("scroll-down");
        } else if (
            currentScroll < lastScroll &&
            body.classList.contains("scroll-down")
        ) {
            body.classList.remove("scroll-down");
            body.classList.add("scroll-up");
        }
        lastScroll = currentScroll;
    });
    //End ofHidden Nav bar
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>