<div class="navbar white_txt green_bg">
    <div class="header font_raleway_regular_25px">
        <p class="logo">Petsitter</p>
    </div>
    <div class="navbar">
        <a class="font_raleway_regular_15px" href='/'>ACCUEIL</a>
        <a class="font_raleway_regular_15px" href='../voirAnnonce.php'>ANNONCES</a>
        <a class="font_raleway_regular_15px" href='../chercher_annonce.php'>CHERCHER</a>

        <?php if (!isset($_SESSION['id'])) { ?>
            <a class="font_raleway_regular_15px" href="../connexion.php">CONNEXION</a>
            <a class="font_raleway_regular_15px" href="../inscription.php">INSCRIPTION</a>
        <?php } else { ?>
            <a class="font_raleway_regular_15px" href="../deconnexion.php">DECONNEXION</a>
            <a class="font_raleway_regular_15px" href="../annonce.php">CRÉER UNE ANNONCE</a>
        <?php } ?>
    </div>
</div>