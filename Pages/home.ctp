<style>.carousel { background: -webkit-linear-gradient(top, rgba(255, 87, 87, 0.14) 0%, rgba(255, 87, 87, 0.26) 0%, #e84c3d30 6%, rgba(252,230,228,0) 27%, rgba(255,255,255,0) 41%, rgba(255,255,255,0) 70%, rgba(255,255,255,0) 100%);}</style>


<div class="carousel-content">
    <h2>Bienvenue sur</h2>
    <h1>HealyMC</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <span class="red">incididunt</span> ut labore et</p>
    <p>dolore magna alique. Ut enim ad <span class="red">minim</span> veniam, quis nostrud exercitation ullamco laboris nis ut aliquip</p>
    <p>ex ea commodo consequat.</p><p>Duis aute irrure dolor in reprehenderit in voluptate velit esse cillum <span class="red">dolore eu</span> fugiat nulla pariatur.</p>
    <br>
    <p>Execpteur sint occaecat <span class="red">cupidatat</span> non proidentsunt in culpa qui officia deserunt mollit id est labo-</p>
    <p>rum !</p>
    <br>
    <button class="btn btn-danger">Jouer</button>
    <br>
    <?= $this->Html->image('mouse.svg', array('alt' => 'Icon Souris')) ?>
</div>

</div>

</header>

<div class="home-launcher">
    <div class="container">
        <div class="row w-100 mx-auto">
            <div class="col-md-12 d-flex flex-column flex-md-row">
                <h3>Inscris toi et rejoins les <span>152</span> joueurs sur HealyMC</h3>
                <a href="" class="btn btn-danger">Télécharge notre launcher</a>
            </div>
        </div>
    </div>
</div>

<div class="page-wrapper">
    <div class="container">
        <div class="row w-100 mx-auto">
            <div class="col-12 col-lg-7 d-flex flex-column">
                <h3 class="title strikethrough"><span>Nos <span class="red">news</span></span></h3>
                <div class="blogs">
                    <?php if(!empty($search_news)) { ?>
                        <?php for($i = 0; $i < 3; $i++) { ?>
                            <div class="blog-container">
                                <img src="<?= $search_news[$i]['News']['img'] ?>" alt="Article">
                                <p><?= cut($search_news[$i]['News']['title'], 23) ?></p>
                                <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $search_news[$i]['News']['slug'])) ?>">voir plus</a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

            </div>
            <div class="col-12 col-lg-4 d-flex ms-auto flex-column">
                <h3 class="title strikethrough"><span><span class="red">Notre</span> Twitter</span></h3>
                <div>
                    <a class="twitter-timeline" height="502" data-lang="fr" href="https://twitter.com/HealyMCs?ref_src=twsrc%5Etfw">Tweets by HealyMCs</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
            <div class="col-md-12 d-flex flex-column">
                <h3 class="title strikethrough"><span>Nos <span class="red">devblogs</span></span></h3>
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                    <div class="item">
                        <p>09 Mai 2020</p>
                        <a href="">Points PVP</a>
                        <p>Les points pvp sont désormais affichés dans le ... </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->Html->css('owl.carousel.min.css') ?>
<?= $this->Html->css('owl.theme.default.min.css') ?>
<?= $this->Html->script('owl.carousel.min.js') ?>

<script>
    $('.owl-carousel').owlCarousel({
        loop:false,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>
