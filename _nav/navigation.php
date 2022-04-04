<div class="header white_txt green_bg">
    <div class="logo font_raleway_regular_25px">
        <h1>Petsitter</h1>
    </div>
    <div class="navbar">
        <a class="font_raleway_regular_15px" href='/'>ACCUEIL</a>
        
        <a class="font_raleway_regular_15px" href='../chercher_annonce.php'>ANNONCE</a>

       
        <!-- <a class="font_raleway_regular_15px" href='../chercher_annonce.php'>CHERCHER</a> -->

        <?php if (!isset($_SESSION['id'])) { ?>
            <a class="font_raleway_regular_15px" href="../connexion.php">CONNEXION</a>
            <a class="font_raleway_regular_15px" href="../inscription.php">INSCRIPTION</a>
        <?php } else { ?>
            <a class="font_raleway_regular_15px" href="../espace-membre.php">MON ESPACE</a>
            <a class="font_raleway_regular_15px" href="../deconnexion.php">DECONNEXION</a>
            <a class="font_raleway_regular_15px" href="../profils.php">mon profils</a>
        <?php } ?>
    </div>
</div>