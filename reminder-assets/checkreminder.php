<?php 
$subject = 'Reminder';
$header = "From: SmartOrganizer <staff@smartorganizer.ro>\r\n";
$header .="Reply-To: staff@smartorganizer.ro\r\n";
$header .="Content-type: text/html\r\n";
// urmatoarea interogare verifica daca exista remindere programate astazi
$s1="select * from reminders where date='".date('Y-m-d')."' and flag = '1'";
$Reminder_Result=mysqli_query($conn,$s1);
$NumOfResult = mysqli_num_rows($Reminder_Result);

if($NumOfResult > 0) // verifica daca exista rezultate
{
	while($Reminder = mysqli_fetch_assoc($Reminder_Result))
	{	
		$to = $Reminder['mail'];
		$message  = "Numele evenimentului: ".$Reminder['title'];
		$message .= "<br>Data: ".date('D M j, Y',strtotime($Reminder['date']));
		$message .= "<br>Descriere: ".$Reminder['description']."\n\n";
		mail($to,$subject,$message,$header);
		mysqli_query($conn, "update reminders set flag = '0' where id = '$Reminder[id]'"); // seteaza reminderul expirat in baza de date
				
	}
}
else
{
$Status_message = "Nu este programat nici un reminder astăzi: " .date('Y-m-d, H:i:s'); // in cazul in care nu sunt remindere programate
}

?> 