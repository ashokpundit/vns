<?php
session_start();
error_reporting(0);
$flag=false;
//$utype=$_SESSION["utype"];
include_once("Top.php");
include_once("connect.php");

if(isset($_REQUEST['submit']))
{
	$flag=true;
	//if(isset($_POST['RegKey']))
	{
		//$key=$_POST['RegKey'];
		//echo "key=".$key;
		/*$selectregkey="SELECT * FROM RegKeys WHERE Id='".$key."';";
		$selectrecord=mysql_query($selectregkey);
		while($fetchedit=mysql_fetch_array($selectrecord))
		{
			$id=$fetchedit['Id'];
			$userid=$fetchedit['UserId'];
			//echo "id=".$id;
			
		}
		if(!isset($id))
		{
			$msg="<font color='red'>Wrong key.</font>";
		}
		else if(isset($userid))
		{
			$msg="<font color='red'>Key already used.</font>";
		}
		else*/
		{
		
		
		
				$password=$_POST['Password'];//rand(1,9999999);
				$mobno=$_REQUEST['mob_num'];
				$name=$_REQUEST['name'];
				/*$selectregkey="SELECT * FROM users WHERE StudentId='".$mobno."';";
				$selectrecord=mysql_query($selectregkey);
				while($fetchedit=mysql_fetch_array($selectrecord))
				{
					$id=$fetchedit['Id'];
					
				}
		
				if(isset($id))
				{
					$msg="<font color='red'>User Id exist.</font>";
				}
				
				else */
				if($mobno==="")
				{
					$msg="<font color='red'>Mobile No should not be blank</font>";
				}
				else if($name==="")
				{
					$msg="<font color='red'>Name should not be blank</font>";
				}
				/*else if($password==="")
				{
					$msg="<font color='red'>Password should not be blank</font>";
				}
				else if( !eregi( "^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_REQUEST['mail']) ) 
					{
						// validate an email address
						$msg="<font color='red'>You have entered and invalid email address</font>";
					
					}*/
				else if( !ereg( '^[0-9]{10}$', $mobno ) ) 
					{
										// validate a phone number
							$msg="<font color='red'>Please enter a valid phone number</font>";
					
					} 
				else
				{
						 $queryInsert="INSERT into users (UserId,Name,Password,UserType,Email)VALUES('".$mobno."','".$name."',' ','2',' ')";//".$password." ".$_REQUEST['mail']."
						$query=mysql_query($queryInsert); //or die(mysql_error());

                                                $error=mysql_error();
						if($query)
						{
							 //$queryInsert1="UPDATE RegKeys SET UserId='".$_REQUEST['mob_num']."',Time=NOW() where Id='".$id."';"; 
							// 			$query1=mysql_query($queryInsert1) or die(mysql_error());
						//	if($query1)
							$msg="<font >Congatulation! You are registered successfully!your password is ".$password.". Go back to login page <a href='index.php'></a> </font>";
						}
                                                else
                                                {
                                                    $pos = strpos($error, "Duplicate entry");
                                                        if ($pos == false) {
                                                            $msg= "<font color='red'>UserId already in use. Input different mobile no.</font>";
                                                        }

                                                    }
				}
			
		}
	}
	}

?>

<div >
<form action="" method="post" name="frm">
<table align="center" width="55%" style="overflow:scroll">
<tr>
  <td colspan="3" align="center"><?php if($msg) {echo $msg;}?></td>
</tr>
<tr bgcolor="#00FF33">
	<td colspan="3" align="center">New student registration</td>
</tr>
<tr>
<td align="center">Mobile number</td>
<td>:</td>
<td><input type="text" name="mob_num" id="mob_num" maxlength="10"></td>
</tr>
<tr>
<td align="center">Name</td>
<td>:</td>
<td><input type="text" name="name" id="name"></td>
</tr>
<!--tr>
<td align="center">Password</td>
<td>:</td>
<td><input type="text" name="Password" id="Password" maxlength="20"></td>
</tr>

<tr>
<td align="center">Email Id</td>
<td>:</td>
<td><input type="text" name="mail" id="mail"></td>
</tr>
<tr>
<td align="center">Registration Key</td>
<td>:</td>
<td><input type="text" name="RegKey" id="RegKey"></td>
</tr-->
<tr>
  <td colspan="3" align="center"><input type="submit" name="submit" id="submit" value="join"><?php if($flag===true){?><a href="index.php"></a><?php }?></td>
  </tr>
</table>
</form>
<div>
<a href="index.php" >Go to Login Page</a>
</div>

</div>

<link rel="stylesheet" href="style.css" type="text/css" />