<?php
session_start();

include("connect.php");
error_reporting(0);

if(isset($_REQUEST['login']))
{
	if($_REQUEST['select']=='admin')
	{
	$uname=$_POST["user"];
	 $pass=$_POST["pass"];
	  $queryAdmin="select * from users where UserId='$uname' && Password='$pass' && UserType='1' ";
		$query1=mysql_query($queryAdmin) or die(mysql_error());
		$num=mysql_num_rows($query1);
		$fetch=mysql_fetch_array($query1);
		$name=$fetch["Name"];
		$pwd1=$fetch["Password"];
		$utype=$fetch["Type"];
		
		if($num>0)
		{
		$_SESSION['name']=$name;
			$_SESSION["uname"]=$uname;
			$_SESSION["pwd"]=$pwd1;
			$_SESSION["utype"]=$utype;
			header("location: Left2.php");
		}
		else
		{
			$msg="<font color='red' size=-1>Login Failed</font>";
		} 
		
	}
	else if($_POST['select']=='Student')
	{
		 $queryStudent="SELECT * from users WHERE UserId='".$_REQUEST['user']."' AND UserType='2'";//"' AND Password='".$_REQUEST['pass'].
		$res_queryStudent=mysql_query($queryStudent) or die(mysql_error());
		if(mysql_num_rows($res_queryStudent)>0)
		{
			$db=mysql_fetch_array($res_queryStudent);
			$_SESSION['studentid']=$_REQUEST['user'];
			$_SESSION['name']=$db['Name'];
			$_SESSION['examid']=$db['ExamId'];
			header("location:intro.php");
			
		}
		else
		{
			echo "<font color='red'>sorry wrong mobile number</font>";// or password
		}
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>welcome</title>
<script language="javascript" type="text/javascript">
 function show_newlabel()
 {
 	
 	document.getElementById('log').innerHTML="User Name";
 }
 function show_stulabel()
 {
 	
 	document.getElementById('log').innerHTML="Mobile number";
 }
</script>
</head>

<body background="image/login2.jpg">
<div style="padding:20px">
<?php include("Top.php");?>
<table width="100%" height="200" border="0" align="center">
  <tr>
    <td  height="150">&nbsp;</td>
    <td width="413px"  height="150"></td>
    <td >&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="middle" background="index_clip_image001_0000.gif" height="237" width="413px">
    <div>
    <form name="frm" action="" method="post">
    <table width="99%"  >
    	
    	<tr>
    	  <td colspan="3" align="center"><input type="radio" name="select" id="admin" value="admin" onclick="show_newlabel()"/>Admin&nbsp;&nbsp;&nbsp;<input type="radio" name="select" id="student" value="Student" checked="checked" onclick="show_stulabel();" />Student</td>
  	  </tr>
    	<tr>
        <td width="44%" align="center"><span id="log">Mobile number</span></td>
        <td width="2%" align="center">:</td>
        <td width="54%"><input type="text" name="user" id="user"/></td>
        </tr>
        <!--tr>
        <td align="center">Password</td>
        <td>:</td>
        <td><input type="password" name="pass" id="pass" /></td>
        </tr-->
        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="login" value="login" /><a href="newstu.php">new student</a></td>
        </tr>
        <tr>
    	  <td height="70" colspan="3" align="center"><?php if($msg){ echo $msg;}?></td>
  	  </tr>
    </table>
    </form>
    </div>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
