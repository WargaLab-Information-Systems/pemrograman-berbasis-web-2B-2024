<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if (password !== confirm_password) {
            alert("Password yang anda masukkan tidak sama!");
            return false; 
        }
        alert("Terima kasih sudah mendaftar!");
        return true; 
    }
    </script>
</head>
<body>
    <div class="container" id="shadow">
        <h1>SIGN UP</h1>
        <div class="form-container">
            <form method="post" action="signup_process.php" onsubmit="return validateForm()">
                <input type="text" id="username" name="username" placeholder="Username" required><br><br>
                <input type="email" id="email" name="email" placeholder="Email" required><br><br>
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required><br><br>
                <input type="submit" value="SIGNUP">
                <p>Sudah punya akun? <a href="login.php">Login disini</a></p>
            </form>
        </div>
    </div>  
</body>
</html>
