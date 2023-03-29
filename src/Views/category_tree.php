<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Tree</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/category-tree.css">
</head>

<body>
    <nav class="navbar">
        <h1 class="navbar-title">Category Manager</h1>
    </nav>
    <span>
        <a href="/" class="back-btn">Back</a>
    </span>
    <div class="container">
        <ul id="myUL">
            <?= $categoryTree; ?>
        </ul>
    </div>

    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>

</body>

</html>
