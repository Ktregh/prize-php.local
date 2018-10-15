<div style="width: 300px; margin: 0 auto 0; margin-top: 30px;">
    <p>
        Привет,
            <?php
            include_once ('../config.php');
            include_once(ROOT.'/controllers/UserController.php');
            if($_SESSION['login'])
            { 
                echo $_SESSION['login'].'.';?>
                    На счету <span id='bonus'><?= $bonus; ?></span> баллов. 
                <a href="/controllers/LoginController.php">Выйти.</a>
            <?php }
            else
            { ?>
                гость.
            <?php } ?>
    </p>
</div>
