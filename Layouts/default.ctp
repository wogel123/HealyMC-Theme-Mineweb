<?php if($title_for_layout != "Maintenance") { ?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HealyMC">
    <meta name="author" content="wogel123">

    <title><?= (isset($title_for_layout)) ? $title_for_layout : 'Error' ?> - <?= (isset($website_name)) ? $website_name : 'MineWeb' ?></title>


    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('all.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('jquery-1.11.0.js') ?>
    <link rel="icon" type="image/png" href="<?= (isset($theme_config) && isset($theme_config['favicon_url'])) ? $theme_config['favicon_url'] : '' ?>" />

</head>

<body>
<?php if(isset($Lang)) { ?>
<header>
    <nav class="navbar-top">
        <div class="container">
            <div class="row w-100 mx-auto">
                <div class="col-sm-4 col-md-7 d-none d-sm-flex">
                    <div class="navbar-item connected d-none d-md-flex">
                        <i class="fas fa-users"></i>
                        <p><span>256 / 1000</span> joueurs connectés</p>
                    </div>
                    <div class="navbar-item teamspeak d-none d-sm-flex">
                        <i class="fas fa-microphone"></i>
                        <p>ts.healymc.fr</p>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-5 d-flex justify-content-center justify-content-sm-end">
                    <?php if(isset($isConnected) && $isConnected) { ?>
                    <div class="navbar-item user">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><?= $user['pseudo'] ?> <i class="fas fa-angle-down"></i></a>
                        <img src="http://cravatar.eu/avatar/<?= $user['pseudo'] ?>/64.png" alt="Avatar de <?= $user['pseudo'] ?>">
                        <ul class="dropdown-menu dropdown-menu-end keep-open">
                            <div class="dropdown-header" id="dropdown-header">
                                <img src="http://cravatar.eu/avatar/<?= $user['pseudo'] ?>/64.png" alt="Avatar de wogel123">
                                <p class="pseudo"><?= $user['pseudo'] ?></p>
                                <p class="rank">
                                    <?php foreach ($available_ranks as $key => $value) {
                                        if($user['rank'] == $key) {
                                            echo $value;
                                        }
                                    } ?>
                                </p>
                            </div>
                            <li>
                                <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)) ?>">Mon profil</a>
                            </li>
                            <li style="position:relative;">
                                <a class="dropdown-item d-flex" href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-bs-toggle="modal">Mes notifications <i class="fas fa-envelope" style="color: #fff; margin-left: 16px;"></i></a>
                                <span class="notification-indicator"></span>
                            </li>
                            <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
                            <li>
                                <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'admin', 'action' => 'index', 'plugin' => false, 'admin' => true)) ?>"><?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a>
                            </li>
                            <?php } ?>
                            <li>
                                <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)) ?>"><?= $Lang->get('USER__LOGOUT') ?></a>
                            </li>
                        </ul>
                    </div>
                    <script>$('#dropdown-header').on('click', function (e) { e.stopPropagation(); });</script>
                    <?php } else { ?>
                    <div class="navbar-item register">
                        <i class="fas fa-rocket"></i>
                        <a href="#register" data-bs-toggle="modal">s'inscrire</a>
                    </div>
                    <div class="navbar-item login">
                        <i class="fas fa-user"></i>
                        <a href="#login" data-bs-toggle="modal">se connecter</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar">
        <div class="container">
            <div class="row w-100 mx-auto">
                <div class="d-flex d-md-none col-12">
                    <a href="" class="menu ms-auto"> <i class="fas fa-bars"></i></a>
                </div>
                <div class="d-none d-md-block col-md-6 col-lg-5 ">
                    <ul class="text-center text-lg-start justify-content-around">
                        <li class="navbar-item">
                            <a href="">Accueil</a>
                        </li>
                        <li class="navbar-item">
                            <a href="">Forum</a>
                        </li>
                        <li class="navbar-item">
                            <a href="">Jouer</a>
                        </li>
                        <li class="navbar-item">
                            <a href="">Voter</a>
                        </li>
                    </ul>
                </div>
                <div class="d-none d-lg-block col-md-2 position-relative">
                <?= $this->Html->image('logo.png', array('alt' => 'Logo HealyMC')) ?>
                </div>
                <div class="d-none d-md-block col-md-6 col-lg-5">
                    <ul class="text-center text-lg-end justify-content-around">
                        <li class="navbar-item">
                            <a href="">Boutique</a>
                        </li>
                        <li class="navbar-item">
                            <a href="">Stats</a>
                        </li>
                        <li class="navbar-item">
                            <a href="">Infos</a>
                        </li>
                        <li class="navbar-item d-none d-md-flex">
                            <a class="navbar-social discord ms-auto" href="">
                                <i class="fab fa-discord"></i>
                            </a>
                            <a class="navbar-social twitter me-auto me-lg-0" href="">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="carousel">
<?php } ?>

<?php
$flash_messages = $this->Session->flash();
if(!empty($flash_messages)) {
    echo '<div class="container">'.$flash_messages.'</div>';
} ?>
<?= $this->fetch('content'); ?>



<?php if(isset($Lang)) { ?>


<footer>
    <div class="footer">
        <div class="container">
            <div class="row w-100 mx-auto">
                <div class="d-md-none d-lg-block col-12 col-sm-6 col-lg-3 desc">
                    <?= $this->Html->image('letters.png', array('alt' => 'Logo HealyMC')) ?>
                    <p>Lorem ipsum dolor sit amet, consectetur adispisicing elit, sed do elusmod tempor incididunt ut labore et dolore magna</p>
                    <p>aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea com</p>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 voter">
                    <h3 class="title"><span class="red">Top</span> voteurs</h3>
                    <div class="footer-voters">
                        <div class="footer-voter">
                            <img src="http://cravatar.eu/avatar/wogel123/64.png" alt="Avatar de ">
                            <div class="footer-voter-data">
                                <p>wogel123</p>
                                <p>1er</p>
                                <p>20 votes</p>
                            </div>
                        </div>
                        <div class="footer-voter">
                            <img src="http://cravatar.eu/avatar/Mexoh/64.png" alt="Avatar de ">
                            <div class="footer-voter-data">
                                <p>Mexoh</p>
                                <p>2ème</p>
                                <p>16 votes</p>
                            </div>
                        </div>
                        <div class="footer-voter">
                            <img src="http://cravatar.eu/avatar/LiittleCookie/64.png" alt="Avatar de ">
                            <div class="footer-voter-data">
                                <p>LiittleCookie</p>
                                <p>3ème</p>
                                <p>5 votes</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 blog">
                    <h3 class="title"><span class="red">Dernières</span> news</h3>
                    <div class="footer-blog">

                        <?php if(!empty($search_news)) { ?>
                            <?php for($i = 0; $i < 5; $i++) { ?>
                                <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $search_news[$i]['News']['slug'])) ?>">
                                    <p style="text-overflow: ellipsis;"><?= $search_news[$i]['News']['title'] ?></p>
                                    <i class="fas fa-plus"></i>
                                </a>
                            <?php } ?>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 links">
                    <h3 class="title"><span class="red">Liens</span> utiles</h3>
                    <div class="footer-links">
                        <a href="">Nous-rejoindre</a>
                        <a href="">Wiki</a>
                        <a href="">Forum</a>
                        <a href="">Voter</a>
                        <a href="">Boutique</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row w-100 mx-auto">
                <div class="col-md-12 d-flex flex-row">
                    <p>© 2021 HealyMC - Tous droits réservés
                        <span class="red">
                            <a href="" class="red" style="margin-left: 10px">Mentions légales</a>
                            |
                            <a href="CGV">CGV</a>
                            |
                            <a href="CGU">CGU</a>
                        </span>
                    </p>
                    <p class="ms-auto">Théme par
                        <a href="" style="font-weight: 700;">wogel123</a>
                        -
                        Propulsé par
                        <span class="red">
                            <a href="">mineweb.org</a>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>








    <?= $this->element('modals') ?>
    <?= $this->Html->script('jquery-1.11.0.js') ?>

    <?= $this->Html->script('app.js') ?>
    <?= $this->Html->script('form.js') ?>
    <?= $this->Html->script('notification.js') ?>
    <script>
        <?php if($isConnected) { ?>
        // Notifications
        var notification = new $.Notification({
            'url': {
                'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
                'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
                'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
                'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
                'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
            },
            'messages': {
                'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
                'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
            }
        });
        <?php } ?>

        // Config FORM/APP.JS

        var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
        var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

        var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
        var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
        var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
        var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
        var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

        var CSRF_TOKEN = "<?= $csrfToken ?>";

        $(".navbar-collapse").css({ maxHeight: ($(window).height() - 130) - $(".navbar-header").height() + "px" });
    </script>

<?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?= $google_analytics ?>', 'auto');
        ga('send', 'pageview');
    </script>
<?php } ?>
    <?= (isset($configuration_end_code)) ? $configuration_end_code : '' ?>
<?php } ?>
</body>

</html>

<?php } else { ?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HealyMC">
    <meta name="author" content="wogel123">

    <title><?= (isset($title_for_layout)) ? $title_for_layout : 'Error' ?> - <?= (isset($website_name)) ? $website_name : 'MineWeb' ?></title>


    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('all.min.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('jquery-1.11.0.js') ?>
    <link rel="icon" type="image/png" href="<?= (isset($theme_config) && isset($theme_config['favicon_url'])) ? $theme_config['favicon_url'] : '' ?>" />

</head>

<body>
<?php if(isset($Lang)) { ?>
<header>
    <nav class="navbar-top">
        <div class="container">
            <div class="row w-100 mx-auto">
                <div class="col-sm-4 col-md-7 d-none d-sm-flex">
                    <div class="navbar-item connected d-none d-md-flex">
                        <i class="fas fa-users"></i>
                        <p><span>256 / 1000</span> joueurs connectés</p>
                    </div>
                    <div class="navbar-item teamspeak d-none d-sm-flex">
                        <i class="fas fa-microphone"></i>
                        <p>ts.healymc.fr</p>
                    </div>
                </div>
                <div class="col-12 col-sm-8 col-md-5 d-flex justify-content-center justify-content-sm-end">
                    <?php if(isset($isConnected) && $isConnected) { ?>
                        <div class="navbar-item user">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><?= $user['pseudo'] ?> <i class="fas fa-angle-down"></i></a>
                            <img src="http://cravatar.eu/avatar/<?= $user['pseudo'] ?>/64.png" alt="Avatar de <?= $user['pseudo'] ?>">
                            <ul class="dropdown-menu dropdown-menu-end keep-open">
                                <div class="dropdown-header" id="dropdown-header">
                                    <img src="http://cravatar.eu/avatar/<?= $user['pseudo'] ?>/64.png" alt="Avatar de wogel123">
                                    <p class="pseudo"><?= $user['pseudo'] ?></p>
                                    <p class="rank">
                                        <?php foreach ($available_ranks as $key => $value) {
                                            if($user['rank'] == $key) {
                                                echo $value;
                                            }
                                        } ?>
                                    </p>
                                </div>
                                <li>
                                    <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => false)) ?>">Mon profil</a>
                                </li>
                                <li style="position:relative;">
                                    <a class="dropdown-item d-flex" href="#notifications_modal" onclick="notification.markAllAsSeen(2)" data-bs-toggle="modal">Mes notifications <i class="fas fa-envelope" style="color: #fff; margin-left: 16px;"></i></a>
                                    <span class="notification-indicator"></span>
                                </li>
                                <?php if($Permissions->can('ACCESS_DASHBOARD')) { ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'admin', 'action' => 'index', 'plugin' => false, 'admin' => true)) ?>"><?= $Lang->get('GLOBAL__ADMIN_PANEL') ?></a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a class="dropdown-item" href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => false)) ?>"><?= $Lang->get('USER__LOGOUT') ?></a>
                                </li>
                            </ul>
                        </div>
                        <script>$('#dropdown-header').on('click', function (e) { e.stopPropagation(); });</script>
                    <?php } else { ?>
                        <div class="navbar-item register">
                            <i class="fas fa-rocket"></i>
                            <a href="#register" data-bs-toggle="modal">s'inscrire</a>
                        </div>
                        <div class="navbar-item login">
                            <i class="fas fa-user"></i>
                            <a href="#login" data-bs-toggle="modal">se connecter</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>





            <footer>
                <div class="sub-footer">
                    <div class="container">
                        <div class="row w-100 mx-auto">
                            <div class="col-md-12 d-flex flex-row">
                                <p>© 2021 HealyMC - Tous droits réservés
                                    <span class="red">
                            <a href="" class="red" style="margin-left: 10px">Mentions légales</a>
                            |
                            <a href="CGV">CGV</a>
                            |
                            <a href="CGU">CGU</a>
                        </span>
                                </p>
                                <p class="ms-auto">Théme par
                                    <a href="" style="font-weight: 700;">wogel123</a>
                                    -
                                    Propulsé par
                                    <span class="red">
                            <a href="">mineweb.org</a>
                        </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>








        <?= $this->element('modals') ?>
        <?= $this->Html->script('jquery-1.11.0.js') ?>

        <?= $this->Html->script('app.js') ?>
        <?= $this->Html->script('form.js') ?>
        <?= $this->Html->script('notification.js') ?>
            <script>
                <?php if($isConnected) { ?>
                // Notifications
                var notification = new $.Notification({
                    'url': {
                        'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
                        'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
                        'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
                        'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
                        'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
                    },
                    'messages': {
                        'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
                        'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
                    }
                });
                <?php } ?>

                // Config FORM/APP.JS

                var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
                var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

                var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
                var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
                var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
                var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
                var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

                var CSRF_TOKEN = "<?= $csrfToken ?>";

                $(".navbar-collapse").css({ maxHeight: ($(window).height() - 130) - $(".navbar-header").height() + "px" });
            </script>

        <?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                ga('create', '<?= $google_analytics ?>', 'auto');
                ga('send', 'pageview');
            </script>
        <?php } ?>
            <?= (isset($configuration_end_code)) ? $configuration_end_code : '' ?>
        <?php } ?>

<?php } ?>
