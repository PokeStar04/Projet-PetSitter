<?php
include_once('./require.php');

if (isset($_SESSION['id'])) {

    $var = 'Bonjour ' . $_SESSION['prenom'] .  $_SESSION['nom'];
} else {
    $var = 'Bonjour à tous';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    require_once('./_head/meta.php');
    require_once('./_head/link.php');
    ?>

    <title>Petsitter</title>
    <link href="/style/homepage-style.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./_nav/navigation.php') ?>
    <!-- <h1><?= $var ?></h1> -->
    <div class="container homepage">
        <div class="row">

            <div class="col-7">
                <h2 class="font_raleway_bigtitle_50px" style="margin-top:100px;">Vos animaux font partis <br> de notre famille</h2>
                <p class="font_raleway_regular_15px" style="margin-top:10px;">
                    Nous croyons que trouver une personne fiable pour garder vos animaux est quelque chose de primordiale et doit être facile.
                </p>
                <a href='chercher_annonce.php'>
                    <button class="white_txt font_raleway_regular_15px">Trouver un petsitter</button>
                </a>
            </div>

            <div class="col-5 img">
                <img src="ressources/img-lapin.jpg" width="45%" alt="Photo de lapin" style="margin-top:50px; margin-bottom: 90px;">
                <img src="ressources/img-chien.jpg" width="45%" alt="Photo de chien" style="margin-bottom:50px;">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-7">
                <h3 class="font_raleway_regular_25px">Nos services</h3>
                <p class="font_raleway_regular_15px">En tant qu’amoureux des animaux, nous vous proposons des services à la hauteur de nos propres attentes.</p>
                <div class="row font_raleway_regular_15px services">
                    <div class="col-4-sm">
                        <img src="ressources/icone-promenade.svg" alt="Icône promenade">
                        <p>Promenade</p>
                    </div>
                    <div class="col-4-sm">
                        <img src="ressources/icone-nourrir.svg" alt="Icône gammelle de chien">
                        <p>Nourir</p>
                    </div>
                    <div class="col-4-sm">
                        <img src="ressources/icone-garder.svg" alt="Icône garder">
                        <p>Garder</p>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <img src="ressources/img-lezard.jpg" width="70%" alt="Photo de lézard" style="margin-top: 50px;">
                <img src="ressources/img-furet.jpg" width="70%" alt="Photo de furet" style="margin-top: 20px; float: right;">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-3">
                <img src="ressources/img-poisson.jpg" width="100%" alt="Photo de lapin" style="margin: 30px 0 30px 0;">
            </div>
            <div class="col-7">
                <p class="font_raleway_regular_25px engage">Des engagements <span class="green_txt"> certifiés</span> et <span class="green_txt">durables</span></p>
                <ul class="font_raleway_regular_15px engagements">
                    <li><span class="green_txt">✓</span> Des profesionnels à votre écoute</li>
                    <li><span class="green_txt">✓</span> Des petsitter certifiés</li>
                    <li><span class="green_txt">✓</span> Un personnel à votre écoute</li>
                    <li><span class="green_txt">✓</span> Des animaux aimés</li>
                    <li><span class="green_txt">✓</span> Un contact permanent avec vous</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-11">
                <p class="font_raleway_regular_25px">Des animaux <span class="green_txt">heureux</span> chez petsitter</p>
                <p class="font_raleway_regular_15px">Nous garantissons le bien-être de chaque animal et un suivi permanent avec le petsitter est garanti à chaque instant.</p>
            </div>
        </div>
        <div class="row with-slider">
            <div class="col-12 slider">
                <div class="slide font_raleway_regular_15px lightgrey_txt">
                    <img src="ressources/slide-1.jpg" alt="Photo d'un petsitter">
                    <span>Tom, petsitter depuis 10 mois.</span>
                </div>
                <div class="slide font_raleway_regular_15px lightgrey_txt">
                    <img src="ressources/slide-2.jpg" alt="Photo d'un petsitter">
                    <span>Marie-Anne petsitter depuis 3 mois.</span>
                </div>
                <div class="slide font_raleway_regular_15px lightgrey_txt">
                    <img src="ressources/slide-3.jpg" alt="Photo d'un petsitter">
                    <span>Léa, étudiante et petsitter depuis 1 an.</span>
                </div>
                <div class="slide font_raleway_regular_15px lightgrey_txt">
                    <img src="ressources/slide-4.jpg" alt="Photo d'un petsitter">
                    <span>Ilona, retraité et petsitter depuis 2 ans.</span>
                </div>
                <div class="slide font_raleway_regular_15px lightgrey_txt">
                    <img src="ressources/slide-5.jpg" alt="Photo d'un petsitter">
                    <span>Anne, petsitter depuis 2 ans et demi.</span>
                </div>
                <div class="slide font_raleway_regular_15px lightgrey_txt">
                    <img src="ressources/slide-6.jpg" alt="Photo d'un petsitter">
                    <span>Zoé, étudiante et petsitter depuis 2 ans.</span>
                </div>
            </div>
        </div>
    </div>


    <?php
        require_once('./_footer/footer.php');
        require_once('./_head/script.php');
    ?>


    <script>
        const slider = document.querySelector('.slider')

        const numberOfSlides = slider.querySelectorAll('.slide').length
        let currentSlide = 0
        const step = 260 + 20 // width of image + spacing

        setInterval(function() {
            currentSlide = (currentSlide + 1) % numberOfSlides

            slider.style.transform = `translateX(${ -currentSlide * step }px)`
        }, 2000)
    </script>
</body>

</html>