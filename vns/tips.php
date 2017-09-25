<?php
	session_start();
	include("connect.php");
	include("CheckLogin.php");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<div>
        <div>
        	<?php
				include("Top.php");
			?>
        </div>
        <div style="float:left; width:650px; padding-left:40px; padding-top:20px;">
        	To go back to Home <a href="intro.php">Click Here.</a><br /><br />
            <?php
 				if(isset($_REQUEST['id']))
				{ 
                $query="select * from Tips where typeid=".$_REQUEST['id']." order by id;";
				//echo "quer ".$query;
                $rt=mysql_query($query);
                echo mysql_error();
                
                while($nt=mysql_fetch_array($rt))
                {
                echo '<font style="background-color:#339999; color:#ffffff; padding-left:10px; padding-right:10px;"><b>'.$nt[tipheading].'</font></b><br>' .$nt[tip].'<br><br>';
                }
    		}
            ?>
        </div>
        <div style="float:right; width:250px; padding-top:20px;">
        	<b>To view tips click below:</b><br />
				<?php
                    $tipsType="select * from TipsType";
                    $Type=mysql_query($tipsType);
                    
                    while($tp=mysql_fetch_array($Type))
                    {
                        echo '<a href="tips.php?id='.$tp['id'].'"><font style="color:#333333; text-decoration:none;">'.$tp['typename'].'</font></a><br>';
                    }
                ?>
        </div>
	</div>
</body>
</html>
