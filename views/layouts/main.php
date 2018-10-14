<?php
    define('ROOT', $_SERVER['DOCUMENT_ROOT']);
    
    ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="favicon.ico" />
        <title>Сайт с призами</title>
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="/js/myscript.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <header>
                <h1>
                    Сайт с призами
                </h1>
                <?php 
                    include_once(ROOT.'/views/site/userinfoview.php');
                ?>
            </header>
            <div class="content">
                <?php 
                    include_once(ROOT.'/views/site/pagerulesview.php');
                ?>
            </div>
            <footer class="footer">
                <p> Copyright &copy Призы</p>
            </footer>
        </div>
    </body>
</html>

