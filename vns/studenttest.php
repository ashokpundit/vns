<?php
session_start();
error_reporting(0);

include("connect.php");
include("CheckLogin.php");
$exid= $_SESSION['testid'];
$pagetype=$_SESSION['pagetype'];
$studentid=$_SESSION['studentid'];
//echo 'page type '.$pagetype;
if($pagetype===2)
{
	$sqlstmt="select * from student_test_records where StudentId='".$studentid."' and TestId='".$exid."';";
	$selectrecordset=mysql_query($sqlstmt);
		
		
		$index=0;
		while($fetchedit2=mysql_fetch_array($selectrecordset))
		{
			 
			$QuestionIds=$fetchedit2['QuestionIds']; 
			$Answers=$fetchedit2['Answers'];
			$score=$fetchedit2['score'];
			
		}
		$qids = explode(";", $QuestionIds);
		$ansids = explode(";", $Answers);
		
			 
			 
}
else
{
	$sqlstmt="select Timing from tests where TestId='".$exid."';";
	$selectrecordset=mysql_query($sqlstmt);
		
		
		$index=0;
		while($fetchedit2=mysql_fetch_array($selectrecordset))
		{
				$timing=$fetchedit2['Timing'];
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>www.onlineia.com</title>

<?php


						
			if(isset($_REQUEST['hdtmath1']))
			{
				$mt1=0;$mt2=0;$mt3=0;$mt4=0;$mt5=0;$ph1=0;$ph2=0;$ph3=0;$ph4=0;$ph5=0;$ch1=0;$ch2=0;$ch3=0;$ch4=0;$ch5=0;
				$wmt1=0;$wmt2=0;$wmt3=0;$wmt4=0;$wmt5=0;$wph1=0;$wph2=0;$wph3=0;$wph4=0;$wph5=0;$wch1=0;$wch2=0;$wch3=0;$wch4=0;$wch5=0;
				$tmt1=0;$tmt2=0;$tmt3=0;$tmt4=0;$tmt5=0;$tph1=0;$tph2=0;$tph3=0;$tph4=0;$tph5=0;$tch1=0;$tch2=0;$tch3=0;$tch4=0;$tch5=0;
				
				$right=0;
				$wrong=0;
				$result=0;
				
				$questionids;
				$answers;
				if(isset($_REQUEST['hdtmath1']))
				{
					$m1c=$_REQUEST['hdtmath1'];
					//echo 'm1c '.$m1c;
					$tmt1=$m1c;
					for($i=0;$i<$m1c;$i++)
					{
						
						if(isset($_REQUEST['math1'.$i]))
						{
							$val=$_REQUEST['math1'.$i];
							$id=$_REQUEST['idmath1'.$i];
							$questionids=$questionids.';'.$id;
							
							$ans=$_REQUEST['hdmath1'.$i];
							$answers=$answers.';'.$val;
							if($val==$ans)
							{
								$result+=3;
								$mt1++;
							}
							else
							{
							//$result-=1;
							$wmt1++;
							}
							//echo 'val '.$val.' ans '.$ans;
							
						}
						

					}
					if(strlen($questionids)>1)
				$questionids=substr($questionids,1);
					if(strlen($answers)>1)
				$answers=substr($answers,1);
					
				}
			
	$sql="INSERT INTO student_test_records (StudentId, TestId, QuestionIds, Answers, score, corAns,wrongAns) VALUES ('$studentid', '$exid', '$questionids', '$answers', '$result','$mt1','$wmt1');";
					
				mysql_query($sql);
					
				//echo "error ".mysql_error();
				
				
					echo '<p align="center"> Final Result '.$result;	
					
					echo '<table width="368" border="1" align="center">
					
  <tr>
    <td width="110"> Attempted Question</td>
    <td width="110"> Right Question</td>
    <td width="110">Wrong Question</td>
    <td width="139">Total Question</td>
  </tr>
  <tr>
  
   <td width="110">'.($mt1+$wmt1).'</td>
    <td width="110">'.$mt1.'</td>
    <td width="110">'.$wmt1.'</td>
    <td width="139">'.$tmt1.'</td>
  </tr>
 
</table>
<p align="center">
<form id="form1" name="form1" method="post" action="intro.php">
  <label>
  <input type="submit" name="Home" id="Home" value="Home" />
  </label>
</form>
&nbsp;</p>
<p align="center">
<form id="form1" name="form1" method="post" action="index.php">
  <label>
  <input type="submit" name="Logout" id="Logout" value="Logout" />
  </label>
</form>
&nbsp;</p> <p>';
			return;			
			}
			




//echo $ex= $_SESSION['examid'];

?>

<script type="text/javascript"> 
function start(){
block = setInterval("window.clipboardData.setData('text','')",20); 
}
function stop(){
clearInterval(block);
}

</script> 
<script type="text/javascript">
function updatequestion(name)
{
	//alert('a '+name.name);
	var a="ls"+name.name;
	//alert(document.getElementById(a));
	document.getElementById(a).style.backgroundColor="#00ff00";//"yellow";//.style="color:
}

function updatequestion5(name)
{
	//alert('a '+name.name);
	var ac=	name.name.substring(0,name.name.length-1);
	//alert('ac'+ac);
	var a="ls"+ac;
	//alert(document.getElementById(a));
	document.getElementById(a).style.backgroundColor="#00ff00";//"yellow";//.style="color:
}

function submitform()
{
	document.frm.submit();
}
</script>
<script language="JavaScript1.2">
 
//Disable select-text script (IE4+, NS6+)- By Andy Scott
//Exclusive permission granted to Dynamic Drive to feature script
//Visit http://www.dynamicdrive.com for this script
 
function disableselect(e){
return false
}
 
function reEnable(){
return true
}
 
//if IE4+
document.onselectstart=new Function ("return false")
 
//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}
</script>
<script language="JavaScript">
function disableCtrlKeyCombination(e)
{
alert('Hello');
        //list all CTRL + key combinations you want to disable
        var forbiddenKeys = new Array('a', 'n', 'c', 'x', 'v', 'j');
        var key;
        var isCtrl;
        if(window.event)
        {
                key = window.event.keyCode;     //IE
                if(window.event.ctrlKey)
                        isCtrl = true;
                else
                        isCtrl = false;
        }
        else
        {
                key = e.which;     //firefox
                if(e.ctrlKey)
                        isCtrl = true;
                else
                        isCtrl = false;
        }
        //if ctrl is pressed check if other key is in forbidenKeys array
        if(isCtrl)
        {
                for(i=0; i<forbiddenkeys .length; i++)
                {
                        //case-insensitive comparation
                        if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase())
                        {
                                alert('Key combination CTRL '  +String.fromCharCode(key)
                                        +' has been disabled.');
                                return false;
                        }
                }
        }
        return true;
}
</script>
<style type="text/css" media="print">
body { visibility: hidden; display: none }
</style>


</head>

<body>
<form name="frm" action="" method="post">
<table width="100%" border="0" style="padding-bottom:10px;">
  <tr>
    <td height="600px">
    <div style="overflow:scroll; height:inherit" >
    <table border="0">
      <tr>
        <td  ><input type="hidden" name="hddTime" id="hddTime" value="<?php echo $timing?>" /></td>
        
        
      </tr>
      <tr>
        <td><a href="logout.php" style="text-decoration:none">logout</a></td>
        
        </tr>
      
      <tr>
        <td>
       <?php 
       if($pagetype==2)
       {
       		$sqlstmt4="select COUNT(Id) as total from questions where TestId='".$exid."';";
	$selectrecordset4=mysql_query($sqlstmt4);
		
		
		$index=0;
		$totalmarks;
		while($fetchedit4=mysql_fetch_array($selectrecordset4))
		{
			$totalmarks=$fetchedit4['total'];
		}
		
		$totalmarks=$totalmarks*3;
       		echo '<table align="center">
				<tr>
					<td>
						<strong>
							You have scored				
						</strong>
					</td> 
					<td>
						<p align="center" style="color: green;">				
							<strong>
 								'.$score.' 
							</strong>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<strong>
							Out of maximum possible
						</strong>
					</td>
					<td>
						<p align="center" style="color: red;">
							<strong>
								'.$totalmarks.'
							</strong>
						</p>
					</td>
				</tr>
			</table>';
       }
       ?>
          <p align="justify"><!--
         
           Each question has 
            4 choices (a), (b), (c) and (d), out of which --><b>ONLY 
              ONE</b> is correct.</p>
       
        <p>
       <?php
     
	 
      
       
	   $questionno=1;
	   //echo 'testid = '.$_SESSION['testid'];
	   $selectquestion="select * from questions where questions.TestId=".$_SESSION['testid'].";";
 
		$selectrecord=mysql_query($selectquestion);
		
		?>
        
        <?php
		$index=0;
		while($fetchedit=mysql_fetch_array($selectrecord))
		{
		echo '<br /><strong>Qs. '.$questionno.'  </strong><li style="padding-left:40px;">'.$fetchedit[text].'</li><br />';			
		
		
		if($pagetype===1)
		{
		 echo '<table style="background-color:#eeeeee; padding-right:20px;"><tr>';
			echo '<td style="padding-left:20px"><label>   <input type="radio" onclick="updatequestion(this);" name="math1'.$index.'" value="1"  id="math1'.$index.'" /> a </label>      </td> ';
				echo '<td style="padding-left:20px"><label>   <input type="radio" onclick="updatequestion(this);" name="math1'.$index.'" value="2" id="math1'.$index.'" /> b </label>      </td> ';
				echo '<td style="padding-left:20px"><label>   <input type="radio" onclick="updatequestion(this);" name="math1'.$index.'" value="3" id="math1'.$index.'" /> c </label>      </td>';
				echo '<td style="padding-left:20px"><label>   <input type="radio" onclick="updatequestion(this);" name="math1'.$index.'" value="4" id="math1'.$index.'" /> d</label>    </td></tr> </table> ';
				echo       ' <input type="hidden" value="'.$fetchedit[corOpt].'" name="hdmath1'.$index.'"  />';
		echo       ' <input type="hidden" value="'.$fetchedit[Id].'" name="idmath1'.$index.'"  />';
		$sheethtml=$sheethtml.'<label style="align:center; background-color:#ff9900; color:#ffffff; padding-left:2px; margin-right:2px;" id="lsmath1'.$index.'">'.$questionno.' </label>';
		}	
		else if($pagetype===2) 
		{
			$found=false;
				for ($i=0;$i<count($qids);$i++)
				 { 
		               if ($qids[$i] === $fetchedit[Id])
		                {
		                	$found=true; 
		                        break; 
		                }
		        }
			if($found)
			{
				
				
				if($ansids[$i]===$fetchedit[corOpt])
				{
					$colcode="green";
				}				
				else
				{
					$colcode="red";
				}
				echo '<div style="background-color:'.$colcode.'; padding-top:10px; padding-bottom:10px;"><table align="center" border="2" bordercolor="'.$colcode.'" style="background-color:#ffffff; border-style:solid; text-align:center;" width="400">    <tr>
               <td><strong><label style="color:'.$colcode.';"> Your opted option '.$ansids[$i].'   </label></strong> </td>
               </tr>
               <tr>
               <td><strong><label style="color: green;">  The correct option is '.$fetchedit[corOpt].'  </label><strong> </td>
               </tr>
               </table></div>';
			  	
			}
			else
			{
				echo '<div style="background-color:#0000ff; padding-top:10px; padding-bottom:10px;"><table align="center" border="2" bordercolor="'.$colcode.'" style="background-color:#ffffff; border-style:solid; text-align:center;" width="400";>    <tr>
               <td><strong><label style="color:'.$colcode.';"> Your did not opted any option in this question.   </label></strong> </td>
               </tr>
               <tr>
               <td><strong><label style="color: green;">  The correct option is '.$fetchedit[corOpt].'  </label><strong> </td>
               </tr>
               </table></div>';
			}
		} 

		
			$index++;
			 $questionno++;
			 
		}
		echo       ' <input type="hidden" value="'.$index.'" name="hdtmath1"  />';
	   ?>
         </p>
              
               </td>
       
      </tr>
      
     </table>
    </div>
    </td>
     <?php
if($pagetype===1) 
{ 
?> 
    <td width="270" valign="top"">
    
    <div id="fixeddiv" top:10px; padding:16px; background:#FFFFFF; border:2px solid #2266AA">   
    <p>Welcome <?php echo $_SESSION["name"]; ?></p>
<div id="counter" align="center" style="font:Geneva, Arial, Helvetica, sans-serif; font-weight:700; background-color:#00ff00; color:#FFFFFF; border:#003366" >

</div>  
<p>
  <script> 
<!-- 
// 
 
 var minutes=document.getElementById('hddTime').value;
var seconds=0 ;
 var hours=0;

function display(){ 


 if (seconds<=0){ 
    seconds=59 ;
    minutes-=1 ;
 } else 
    seconds-=1 ;
 if (minutes<0){ 
   document.frm.submit();
 } 
 
var mydiv=	document.getElementById('counter');
    //document.counter.d2.value=minutes+"."+seconds 
	mydiv.innerHTML="Time Remaining "+minutes+"."+seconds ;
    setTimeout("display()",1000);
} 
display() ;
--> 
</script> 
  
</p>
<p>
<div style=" width:inherit;">


    <div><?php echo '<strong>'.$sheethtml.'</strong>';?></div>
   
 
</div>
</div>
</p>
<p>&nbsp; </p>

<input type="submit" name="Submit" id="send" value="Submit" onclick="submitform();"/>


    </div>
    </td>
    <?php }?>
  </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
</table>
</form>

</body>
</html>
