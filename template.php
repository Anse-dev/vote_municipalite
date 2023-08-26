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
            <a href="register-candidat" class="nav-link">Register candidat</a>
            <a href="register-user" class="nav-link">Register User</a>
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
