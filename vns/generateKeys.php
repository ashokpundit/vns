<?php
include_once("connect.php");
if($_POST['submit'])
{
$password=$_POST['password'];
if(!($password==='india123'))
{
	echo "You are not authorized person";
	return;
}
else if(isset($_POST['examid']))
{

		$examid=$_POST['examid'];
		for($i=0;$i<100;$i++)
		{
		$c = uniqid('a',true);
		$c=substr($c,10);
		//$d=rand ();//,true);
		
		
		echo "<br>";
		$sql="INSERT INTO RegKeys VALUES ('".$c."', NULL, NULL, '".$examid."');";
		$query=mysql_query($sql);// or die(mysql_error());
		if(mysql_error()==="")
		echo $c;
		}
} 
}
//echo $d;
//echo "<br>";
?>
<html>
<head>

</head>
<body>

<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
   <p>Password: 
     <input type="text" name="password" id="password" />
  </p>
   <p>Exam Id :
     <select name="examid" id="examid">
       <?php
  $selectregkey="SELECT Name FROM exam ;";
		$selectrecord=mysql_query($selectregkey);
		while($fetchedit=mysql_fetch_array($selectrecord))
		{
			$examname=$fetchedit['Name'];

			echo  "<option>".$examname."</option>";
			
		}
  ?>
        </select>
      </p>
   <p>
     <input type="submit" name="submit" id="submit" value="submit" />
   </p>
</form>
</body>
</html>
