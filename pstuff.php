<?php

include_once 'includes/dbh.inc.php';
session_start();

if (isset($_SESSION["useruid"])) {

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
    <link rel="stylesheet" href="cloud-assets/style.css">
</head>
<title>Portofel virtual</title>
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

                        <a href="note.php" class="nav__link">
                            <i class='bx bx-notepad nav__icon' ></i>
                            <span class="nav__name">Notițe</span>
                        </a>

                        <a href="pstuff.php" class="nav__link active">
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

<div id="body">
<div class="form-style-8">
 <form action="cloud-assets/upload.php" method="post" enctype="multipart/form-data" box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22)>
 <input type="file" name="file"/>
 <button type="submit" name="btn-upload" class="btn btn-success">Încarcă</button>
 </form>
</div>
    <br />

    <?php

 if(isset($_GET['success']))

 {

  ?>

        <label class="text-success">Fișier încărcat cu succes</label>

        <?php

 }

 else if(isset($_GET['fail']))

 {

  ?>

        <label class="text-danger">Probleme la încărcarea fișierului</label>

        <?php

 }

 else

 {

  ?>

        <label class="text-primary">Poți încărca unul din următoarele fișiere în portofelul tău virtual (PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>

        <?php

 }

 ?>

 <br><br><br><br><br><br>

 <table width="80%" class="table table-hover">

    
    <thead>
    <tr><th colspan="4">Fișierele încărcate</th></tr>
    <tr>
<b>
    <td>Numele fișierului</td>

    <td>Tipul fișierului</td>

    <td>Dimensiunea fișierului(KB)</td>

    <td>Vizionare</td>
</b>
    </tr>
    </thead>
    <?php

 $sql="SELECT * FROM stuff WHERE usrid=".$_SESSION['userid']."";

 $result_set=mysqli_query($conn, $sql);

 while($row=mysqli_fetch_array($result_set))

 {

  ?>

        <tr>

        <td><?php echo $row['file'] ?></td>

        <td><?php echo $row['type'] ?></td>

        <td><?php echo $row['size'] ?></td>

        <td><a href="cloud-assets/uploads/<?php echo $row['file'] ?>" target="_blank">Vezi fișier</a>
        <p><a href="cloud-assets/delete.php?id=<?php echo $row['id'];?>" onClick="return confirm('Ești sigur că dorești să ștergi acest fisier?')" class="text-danger">Șterge</a></p></td>

        </tr>

        <?php

 }

 ?>

    </table>



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