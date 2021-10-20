<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="/Asset/Css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.1.0/sweetalert2.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="/Asset/js/bootstrap.min.js" ></script>
    <script src="/Asset/js/database.js" ></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.1.0/sweetalert2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-dark" href="/">MVC BASE</a>
        <button class="navbar-toggler btn-secondary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark text-center" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-center" href="">Link-1</a>
                </li>
            <?php if(isset($_SESSION['user'])): ?>
                <?php if($_SESSION['user']['role'] == "admin"): ?>
                    <li class="nav-item">
                        <a class="nav-link text-dark text-center" href="">Link-2</a>
                    </li>
                <?php endif ?>
                <li class="nav-item dropdown text-center">
                    <a class="nav-link  text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://picsum.photos/75/75?grayscale" style="width:20px;height:20px;" class="rounded ml-2"/>
                    </a>
                    <div class="dropdown-menu mt-4" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-center" href="">Link-6</a>
                            <a class="dropdown-item text-center" href="">Link-7</a>
                        <?php if($_SESSION['user']['role'] === "admin"): ?>
                            <a class="dropdown-item text-center" href="">Link-8</a>
                        <?php endif ?>      
                    </div>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link text-dark text-center" href="/auth/login">Link-3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-center" href="/user/register">Link-4</a>
                </li>   
            <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link text-dark text-center" href="/contact/createMessage">Link-5</a>
                </li> 
            </ul>
        </div>
    </nav>
    <hr class="w-25 bg-danger">

    <div class="container">
        <?= $content ?>
    </div>

    
    
    
    
</body>

</html>