<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Document</title>
</head>
<style>
    body{
        background-image: url('bg.2.jpg');
        text-align: center;
    }
    form {
        display: inline-block;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    table {
        margin: 0 auto;
    }
    td {
        padding: 10px;
    }
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border-radius: 20px;
    }
    input[type="submit"] {
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        text-align: center;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .button {
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #333;
        background-color: #007bff;
        color: white;
        border-radius: 20px;
        margin-right: 5px;
    }
    .button:hover {
        background-color: #0056b3;
    }

    .center{
      text=align: center;
    }
</style>

<body>

  <form method="post" action="aksi_daftar.php">
    <h2 align="center">Register!!</h2> <br>
      <table>
        <tr>
          <td>Username : </td>
          <td><input type="text" name="new_username" placeholder="Masukkan Username Baru"></td>
        </tr>
  
        <tr>
          <td>Password : </td>
          <td><input type="password" name="new_password" placeholder="Masukkan Password Baru"></td>
        </tr>

        <tr>
          <td></td>
          <td></td>
          <tr>
          <td colspan="2" class="center"><input type="submit" value="DAFTAR"></td>
        </tr>
      </table>
        <h3 align="center"><a href="index.php" class="button">Ga Jadiii!!!</a></h3>  
    </form>
    <br> 

</body>
</html>