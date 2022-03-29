<nav>
    <li><a href="/">acceuil</a></li>
    <li><a href="../voirAnnonce.php">Voir annonce</a></li>
    <?php
    if(!isset($_SESSION['id'])){
    ?>
        <li><a href="../connexion.php">Connexion</a></li>
        <li><a href="../inscription.php">Incription</a></li>
    <?php
    }else{
    ?>
        <li><a href="../deconnexion.php">Deconnexion</a></li>
        <li><a href="../annonce.php">Crée une annonce</a></li>
    <?php
        }
    ?>



</nav>