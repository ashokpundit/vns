<?php
include("connect.php");

$select_TipsType="select * from TipsType ";
$selectTipsType=mysql_query($select_TipsType);

if(isset($_POST["Save"]))
{
	$Typeid=$_POST['Typeid'];
	$TipHeading=$_POST['TipHeading'];
	$Tip=$_POST['Tip'];
	
	$sql="insert into Tips(typeid,tipheading,tip) values ('$Typeid','$TipHeading','$Tip');";
	
	mysql_query($sql);
	$flag='Save';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>www.onlineia.com</title>
</head>

<body>
	<form name="formt" action="" method="post">
    	<table border="0" align="center" cellpadding="2" cellspacing="2">
        	<tr>
            	<td align="right" class="text"><strong>Type:</strong>
        		</td>
                <td> 
                <select  name="Typeid" id= "Typeid">

                <?php
					               while($fetchedit1=mysql_fetch_array($selectTipsType))
								   {				
                						echo     '<option value="'.$fetchedit1['id'].'">'.$fetchedit1['typename'].'</option>';
									}
				?>
                </select>
                </td>
            </tr>
        	<tr>
            	<td align="right" class="text"><strong>Tip Heading:</strong>
        		</td>
                <td> 
                  <input style="WIDTH: 200px" name="TipHeading">
                </td>
            </tr>
        	<tr>
            	<td align="right" class="text"><strong>Tip:</strong>
        		</td>
                <td>
                <textarea  name="Tip"></textarea>
                </td>
            </tr>
            <tr>
            	<td>
                	<input class=fieldbox style="WIDTH:65px" type=submit value=Send name="Save">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>
