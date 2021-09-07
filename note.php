<?php

/** @var Connection $connection */
$connection = require_once 'notes-assets/pdo.php';
if (isset($_SESSION["useruid"])) {

// Read notes from database
$notes = $connection->getNotes();

$currentNote = [
    'id' => '',
    'title' => '',
    'description' => '',
];
if (isset($_GET['id'])) {
    $currentNote = $connection->getNoteById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico">
     <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="dash-assets/css/styles.css">
    <link rel="stylesheet" href="css/note-css.css">
</head>
<title>Notițe</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="index.php" class="nav__logo">
                        <i class='bx bx-world nav__logo-icon'></i>
                        <span class="nav__logo-name">Smart Organizer</span>
                    </a>

                    <div class="nav__list">
                        <a href="dashboard.php" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Tablou de bord</span>
                        </a>

                        <a href="profile.php" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Profilul meu</span>
                        </a>
                        
                        <a href="reminders.php" class="nav__link">
                            <i class='bx bx-calendar-event nav__icon' ></i>
                            <span class="nav__name">Remindere</span>
                        </a>

                        <a href="note.php" class="nav__link active">
                            <i class='bx bx-notepad nav__icon' ></i>
                            <span class="nav__name">Notițe</span>
                        </a>

                        <a href="pstuff.php" class="nav__link">
                            <i class='bx bx-cloud-upload nav__icon' ></i>
                            <span class="nav__name">Portofel virtual</span>
                        </a>

                    </div>
                </div>

                <a href="includes/logout.inc.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Deconectează-te</span>
                </a>
            </nav>
        </div>
<body>
<div>
    <form class="new-note" action="notes-assets/create.php" method="post">
        <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>">
        <input type="text" name="title" placeholder="Titlu" autocomplete="off"
               value="<?php echo $currentNote['title'] ?>">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Descriere"><?php echo $currentNote['description'] ?></textarea>
        <button>
            <?php if ($currentNote['id']): ?>
                Actualizați
            <?php else: ?>
                Notiță nouă
            <?php endif ?>
        </button>
    </form>
    <div class="notes">
        <?php foreach ($notes as $note): ?>
            <div class="note">
                <div class="title">
                    <a href="?id=<?php echo $note['id'] ?>">
                        <?php echo $note['title'] ?>
                    </a>
                </div>
                <div class="description">
                    <?php echo $note['description'] ?>
                </div>
                <small><?php echo date('d/m/Y H:i', strtotime($note['create_date'])) ?></small>
                <form action="notes-assets/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                    <button class="close">X</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
        <!--===== MAIN JS =====-->
        <script src="dash-assets/js/main.js"></script>
        <?php
        }

        else {
            header("Location: ../login.php");
        }

        ?> 
</html>
