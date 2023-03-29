<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Categories Table</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/category.css">
</head>

<body>
    <nav class="navbar">
        <h1 class="navbar-title">Category Manager</h1>
    </nav>
    <span>
        <a href="/" class="back-btn">Back</a>
    </span>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Total Items</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td data-label="Name"><?php echo htmlspecialchars($category['name']); ?></td>
                        <td data-label="Total Items"><?php echo htmlspecialchars($category['total_items']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
