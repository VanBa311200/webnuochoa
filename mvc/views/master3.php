<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="/Webnuochoa/public/library/bootstrap/css/bootstrap.min.css">
    <!-- Flaticon -->
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/flaticon/flaticon.css">
    <link rel='stylesheet' href='/Webnuochoa/public/fonts/flaticon/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- font family -->
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/font-family/stylesheet.fonts.css">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/font-awesome/css/all.css">
    <link rel="stylesheet" href="/Webnuochoa/public/fonts/font-awesome/css/v4-shims.css">

    <!-- Css Style -->
    <link rel="stylesheet" href="/Webnuochoa/public/css/style.css">

    <!-- flaticon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <title>ShopPI</title>
</head>

<body>
    <div class="main">
        <?php
        require_once './mvc/views/components/headerAdmin.php';
        require_once "./mvc/views/pages/" . $data['page'] . ".php";
        ?>
    </div>

    <script src="/Webnuochoa/public/js/JQuery-3.6.0.js"></script>
    <script src="/Webnuochoa/public/js/main.js"></script>
    <script src="/Webnuochoa/public/library/bootstrap/js/bootstrap.min.js"></script>
    <script>
    </script>
</body>

</html>