<?php
require_once __DIR__ . '\autoload.php';

use App\Router;
use App\Request;

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Quantox Calendar</title>

</head>

<body class="bg-light bg-gradient">
    <div class="d-flex flex-column">
        <h1 class="mx-auto mt-5 fs-1"><a href="/" class="text-reset text-decoration-none">Quantox Calendar</a></h1>
        <div class="row mt-5 pt-5 d-flex mx-auto w-25">
            <?php
            require Router::load(ROUTES_FILE)->redirect(Request::uri());
            ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>