<!-- the head section -->

<head>
    <title>Healty Recepies</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

</head>

<!-- the body section -->

<body>
    <header>
        <nav class="header">
            <img src="./images/e.png" class="header__logo" alt="Logo" />

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

                    <form action="add_record_form.php" method="post" id="add_record_form">

                        <input type="submit" value="Add Record">
                    </form>
                    <form action="category_list.php" method="post" id="category_list">

                        <input type="submit" value="Manage Categories">
                    </form>
                    <select>


                        <?php foreach ($categories as $category) : ?> <option>
                            <a class="header__alink" href=".?category_id=<?php echo $category['categoryID']; ?>">
                                <?php echo $category['categoryName']; ?>
                            </a>
                        </option>
                        <?php endforeach; ?>
                    </select>
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
</body>