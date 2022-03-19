<!-- the head section -->

<head>
    <title>Healty Recepies</title>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

</head>

<!-- the body section -->

<body>
    <div class="container__logo">
        <div class="logo">
            <a href="index.php"> <img src=" ./images/e.png" alt="Logo" /></a>
        </div>

    </div>
    <header>

        <nav class="header">

            <!-- <div class="header__nav"> -->

            <div class="header__link">

                <a class="header__alink" href="index.php">Homepage</a>
                <?php foreach ($categories as $category) : ?>
                <a class="header__alink" href=".?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
                <?php endforeach; ?>


            </div>
            <!-- </div> -->
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