<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
</head>
<body>
    <header>

    </header>
    <main>
        <h1>this is 404 page</h1>
        <!-- this is why it wasn't working -->
        <?php echo($_SERVER["REQUEST_URI"]);?>
        <br>
        <?php echo($_GET['url']);?>
    </main>
    <footer>

    </footer>
</body>
</html>