<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <script>
        localStorage.clear();

        window.location.href = 'login.php';
    </script>
</head>

<body>
</body>

</html>

</html>