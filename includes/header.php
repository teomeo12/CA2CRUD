<!-- the head section -->

<head>
    <title>Healty Recepies</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

</head>

<!-- the body section -->

<body>
    <header>
        <nav class="header">
            <a href="index.php"> <img src="./images/e.png" class="header__logo" alt="Logo" /></a>

            <!-- <div class="header__nav">
                <div class="header__link">
                    <div class="header__option">
                        <span class="header__optionLineTwo">

                        </span>
                    </div>
                </div>

                </div> -->

            <div class="header__nav">

                <div class="header__link">

                    <a class="header__alink" href="index.php">Homepage</a>
                    <?php foreach ($categories as $category) : ?>
                    <a class="header__alink" href=".?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                    <?php endforeach; ?>

                    <div class="manage-categories">
                        <form action=" add_record_form.php" method="post" id="add_record_form">

                            <input type="submit" value="Add Record">
                        </form>
                        <form action="category_list.php" method="post" id="category_list">

                            <input type="submit" value="Manage Categories">
                        </form>
                    </div>
                </div>
        </nav>




    </header>
    <!-- <script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("header");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script> -->