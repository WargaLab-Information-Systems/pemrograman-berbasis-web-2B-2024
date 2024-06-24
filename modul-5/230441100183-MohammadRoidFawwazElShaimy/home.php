<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color:gray;
}

.container {
    max-width: 700px;
    margin: 50px auto;
    background-color: white;
    padding: 80px;
    border-radius: 5px;
    box-shadow: 0px 10px 40px #030000;
}

h2 {
    text-align: center;
    margin: 5px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"],
button {
    width: 99%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #163bf2;
    border-radius: 50px;
}

button {
    background-color: #4e66de;
    color: white;
    cursor: pointer;
}

button:hover {
    background-color: #252c52;
}

.error {
    color: red;
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 8px;
    text-align: center;
    border: 2px solid #2f3030;
}

a.logout-button {
    background-color: green; 
    color: white;
    padding: 10px 40px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    margin : 300px ;
  }
  

a:hover {
    background-color: #252c52;
}

</style>
<body>
    <div class="container">
        <b><h2>WELCOME</h2></b>
        <br>
        <p><center>Selamat datang RoidFawwaz jangan lupa bahagia !!!</center></p>
        <br>
        <br>
        <br>
        <a href="mahasiswa.php" class="logout-button">Data</a>
    </div>
</body>
</html>