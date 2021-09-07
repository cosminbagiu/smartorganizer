<?php
require_once('../includes/dbh.inc.php'); // import page
require_once('checkreminder.php'); // import reminder checker

session_start();

if(isset($_REQUEST['submit']))
{
	if(!empty($_REQUEST['title']) & !empty($_REQUEST['date']))
	{
		if($_REQUEST['date']<=date('Y-m-d'))
		{
		$flag = '0';
		}
		else
		{
		$flag = '1';
		}
		
		$title = addslashes(ucwords($_REQUEST['title']));
		$desc = addslashes(ucfirst($_REQUEST['description']));	
		
	mysqli_query($conn, "update reminders set title='$title',description='$desc',date='$_REQUEST[date]',flag='$flag' where id = '$_GET[id]'");
	$Status_message = 'Actualizat!';
	}
	else {
	$Status_message = 'Actualizare eșuată, titlul sau data lipsesc!';
	}

}
$result = mysqli_query($conn, "select * from reminders where id = '$_GET[id]'");
$row = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.18.custom.css">
        <script src="js/jquery-1.7.1.min.js"></script>
        <script src="js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="js/jquery.ui.datepicker.js"></script>
        <script src="js/jquery.ui.tabs.js"></script>
        <script>			
                $(function() {
                            $( "#tabs" ).tabs();
                        });
                        $(function() {
                $( "#date" ).datepicker();
            });
        </script>        
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="../dash-assets/css/styles.css">

        <title>Remindere</title>
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
                    <a href="../index.php" class="nav__logo">
                        <i class='bx bx-world nav__logo-icon'></i>
                        <span class="nav__logo-name">Smart Organizer</span>
                    </a>

                    <div class="nav__list">
                        <a href="../dashboard.php" class="nav__link">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Tablou de bord</span>
                        </a>

                        <a href="../profile.php" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Profilul meu</span>
                        </a>
                        
                        <a href="../reminders.php" class="nav__link active">
                            <i class='bx bx-calendar-event nav__icon' ></i>
                            <span class="nav__name">Remindere</span>
                        </a>

                        <a href="../note.php" class="nav__link">
                            <i class='bx bx-notepad nav__icon' ></i>
                            <span class="nav__name">Notițe</span>
                        </a>

                        <a href="../pstuff.php" class="nav__link">
                            <i class='bx bx-cloud-upload nav__icon' ></i>
                            <span class="nav__name">Portofel virtual</span>
                        </a>

                    </div>
                </div>

                <a href="#" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Deconectează-te</span>
                </a>
            </nav>
        </div>

        <body>
		<div id="Container">	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Detalii</a></li>
			<li><a href="#tabs-2">Editați reminder</a></li>
			<li style="float:right;"><a href="#tabs-3"><a href="../reminders.php">Înapoi</a></li>			
		</ul>
		
		<div id="tabs-1">
		<div id="message"><?php if(isset($Status_message)){ echo $Status_message;}?></div>

			<p><?php echo $row['title']?></p>
			<p><?php echo $row['description']?></p>
			<p><?php echo $row['date']?></p>
			<p><a href="delete.php?id=<?php echo $row['id'];?>" onClick="return confirm('Ești sigur că dorești să ștergi acest reminder?')" style="color:#FF9900;">Șterge</a></p>
		</div>
		
		<div id="tabs-2">
		
		<form name="edit_reminder" action="" method="post">
		<table width="50%" border="0">
		
	  <tr>
		<td width="32%">Titlu</td>
		<td><input type="text" name="title" value="<?php echo $row['title']?>" ></td>
	  </tr>
	  <tr>
		<td width="32%">Descriere</td>
		<td><textarea name="description" cols="30" rows="5" id="description"><?php echo $row['description']?></textarea></td>
	  </tr>
	  <tr>
		<td>Dată reminder</td>
		<td><input type="text" id="date" name="date" value="<?php echo $row['date']?>"></td>
		</tr>
	 
	  <tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="Actualizați" name="submit" /></td>
	  </tr>
	</table>
	</form>
		</div>
	
	</div>
</div>
</body>
        
        <!--===== MAIN JS =====-->
        <script src="../dash-assets/js/main.js"></script>
    </body>
</html>