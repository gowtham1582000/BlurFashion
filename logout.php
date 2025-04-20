<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
?>
<!DOCTYPE html>
<html>
<head>
    <script>
        // Clear user ID from local storage
        localStorage.removeItem("userid");

        // Redirect to login page or homepage
        window.location.href = "index.php";
    </script>
</head>
<body>
</body>
</html>
