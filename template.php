<?php session_start(); // Démarrage de la session ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle; ?></title>
    <!-- Ajoutez vos liens vers les fichiers CSS et JavaScript ici -->
   
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header>
        <!-- Ajoutez votre en-tête commun ici -->
        <a href="/" class="logo">Voting System</a>
        <nav>
            <a href="/" class="nav-link">Home</a>
            <a href="/candidats" class="nav-link">Candidats</a>
            <div class="call-action">

                <a href="candidat-register" class="nav-link">candidat register</a>

                <?php if (isset($_SESSION['candidate_id'])) : ?>
                    <a href="candidat-logout" class="nav-link">logout</a>
                <?php endif; ?>


                <a href="candidat-login" class="nav-link">Candidat login</a>
            </div>
            <div class="call-action">
                <a href="user-register" class="nav-link">User register</a>
                <a href="user-login" class="nav-link">User login</a>
            </div>
        </nav>
    </header>
    
    <main>
        <?php echo $content; ?>
    </main>
    
    <footer>
        <!-- Ajoutez votre pied de page commun ici -->
        Footer Block
    </footer>
    <script src="./js/main.js"></script>
</body>
</html>
