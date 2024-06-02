<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="home.php" class="navbar-brand">Home</a>
        <a href="mahasiswa.php" class="navbar-link">Data Mahasiswa</a>
        <form action="logout.php" method="post" class="logout-form">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</nav>
</body>
</html>