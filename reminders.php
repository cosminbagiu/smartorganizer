<?php

session_start();

require_once('includes/dbh.inc.php'); // import page
if (isset($_SESSION["useruid"])) {

require_once('reminder-assets/checkreminder.php'); // import reminder checker

if(isset($_REQUEST['submit']))
{
	if(!empty($_REQUEST['title']) & !empty($_REQUEST['date']))
	{
		if($_REQUEST['date']<=date('Y-m-d')) // if selected is in future or not?
		{
		$flag = '0'; // if it is today or before, make it expired.
		$Status_message = "Reminder-ul postat este expirat, data reminder-ului trebuie să fie [data curentă]+1";
		}
		else
		{
		$flag = '1'; 
		}
		$title = addslashes(ucwords($_REQUEST['title']));
		$desc = addslashes(ucfirst($_REQUEST['description']));	
	
		mysqli_query($conn,"insert into reminders (title,description,date,flag,userid,mail)values('$title','$desc','$_REQUEST[date]','$flag','$_SESSION[userid]','$_SESSION[usermail]')"); // add reminder
	}
	else
	{
	$Status_message = "Titlul sau data lipsesc, reminder-ul nu a fost adăugat";
	}
}
$s2="select * from reminders order by id desc";
$Result = mysqli_query($conn,$s2);
$s3="SELECT * FROM `reminders` WHERE flag = '1' AND userid=".$_SESSION['userid']."";
$Reminder_Result = mysqli_query($conn, $s3); // select expired reminders

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="reminder-assets/css/style.css" />
        <link rel="stylesheet" href="reminder-assets/css/ui-lightness/jquery-ui-1.8.18.custom.css">
        <link rel="icon" href="images/favicon.ico">
        <script src="reminder-assets/js/jquery-1.7.1.min.js"></script>
        <script src="reminder-assets/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="reminder-assets/js/jquery.ui.datepicker.js"></script>
        <script src="reminder-assets/js/jquery.ui.tabs.js"></script>
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
        <link rel="stylesheet" href="dash-assets/css/styles.css">

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
                        
                        <a href="reminders.php" class="nav__link active">
                            <i class='bx bx-calendar-event nav__icon' ></i>
                            <span class="nav__name">Remindere</span>
                        </a>

                        <a href="note.php" class="nav__link">
                            <i class='bx bx-notepad nav__icon' ></i>
                            <span class="nav__name">Notițe</span>
                        </a>

                        <a href="pstuff.php" class="nav__link">
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
<div id="Container" >
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Remindere</a></li>
			<li><a href="#tabs-2">Adaugă Reminder</a></li>
		</ul>
		
		<div id="tabs-1">
		<?php if(isset($Status_message)){?><div id="message"><?php echo $Status_message;?></div><?php }
		
			$numRows = mysqli_num_rows($Reminder_Result);
			if($numRows > 0)
			{	
				while($Reminder = mysqli_fetch_assoc($Reminder_Result)){?>
				<div id="reminder"  >
				<a href="reminder-assets/edit.php?id=<?php echo $Reminder['id']?>"><?php echo $Reminder['title'];?></a>
				<p ><?php echo "este pe ".$Reminder['date'];?></p>
				
				</div>
				<?php 	}
			}
			else{
			echo "Nu există nici un reminder programat";
			}
			mysqli_free_result($Reminder_Result);?>
		</div>	
		
			
		<div id="tabs-2">		
				<form name="add_reminder" action="" method="post">
					<table width="60%" border="0">
					<tr>
					<td colspan="2" align="center" id="message"></td>
					</tr>
				  <tr>
					<td width="32%">Titlu</td>
					<td><input type="text" name="title" ></td>
				  </tr>
				  <tr>
					<td>Descriere</td>
					<td><textarea name="description" cols="30" rows="5" id="description"></textarea></td>
					</tr>
				  <tr>
					<td>Dată reminder</td>
					<td><input type="text" id="date" name="date"></td>
					</tr>
				  <tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="Salvează Reminder" name="submit" /></td>
				  </tr>
				</table>
				</form>
		</div>			
		
	</div>
</div>
</body>
        
        <!--===== MAIN JS =====-->
        <script src="dash-assets/js/main.js"></script>
    </body>
    <?php
        }

        else {
            header("Location: ../login.php");
        }

        ?> 
</html>