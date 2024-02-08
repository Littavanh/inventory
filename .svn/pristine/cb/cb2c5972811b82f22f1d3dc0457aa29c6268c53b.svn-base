<?php 
session_start();
?>

<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        
        <?php 
        if ($_GET['recipeid'] != "" && $_GET['fdname'] != "" && $_GET['infoID'] != "") {
        	$_SESSION['EDPOSV1getFDID'] = $_GET['recipeid'];
            $_SESSION['EDPOSV1getFDIName'] = $_GET['fdname'];
            $_SESSION['EDPOSV1getFDIinfoID'] = $_GET['infoID'];
        	header( "location: index.php?d=manage/recipe" );
 			exit(0);         
		} else {
			$_SESSION['EDPOSV1getFDID'] = '';
            $_SESSION['EDPOSV1getFDIName'] = '';
            $_SESSION['EDPOSV1getFDIinfoID'] = '';
			header( "location: index.php?d=manage/price_setting" );
 			exit(0);		
		}	        
        ?>
    </head>
    <body>       
    </body>
</html>