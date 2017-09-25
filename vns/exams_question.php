<?php
session_start();
include("connect.php");
include("CheckLogin.php");
$select_exam="select * from exam ";
$selectexam=mysql_query($select_exam);
$select_sub="select * from subject ";


$selectsub=mysql_query($select_sub);

//$select_questions="select * from questiontypes";
//$selectquestion=mysql_query($select_questions);
//$msg="";
if(isset($_REQUEST['upload']))
		{
			 $testname=$_POST["testname"];
			 $timing=$_POST["timing"];
			  $noquestion=$_POST["noquestion"]; 
			  $markscor=$_POST["markscor"];
			  $markswrong=$_POST["markswrong"];
			 
			 
			 $filename=time()."-".$_FILES['file1']['name'];
			 $tmpname=$_FILES['file1']['tmp_name'];
			
					if(move_uploaded_file($tmpname,"file/$filename"))
					{
						$msg="<font color='red'>File uploaded successfully</font>";
						$filenameagain="file/".$filename;
						// code to extract questions from file
							$opfile=fopen($filenameagain,"r");
							$data = fread($opfile, 80000);
						
							 					$queryInsert1="INSERT into  tests( name,timing,NoQuestions,CorrMarks,WrongMarks) values ('$testname',$timing,$noquestion,$markscor, $markswrong);";									
												mysql_query($queryInsert1);

												 $testid= mysql_insert_id();
										$qno=0;				
							while(strlen($data)>0)
							{
												
													$qin=strpos($data,"<question "); 
													$ien=strpos($data,"</question>"); 
													$const=strpos($data,">",$qin);
													$ansin=strpos($data,'answer="');
													if($qin===false)
													break;
					//									$ansen=strpos($data,'"',$ansin+9);
														$ans=substr($data,$ansin+8,1);
													
													$cont=	addslashes(substr($data,$const+1,$ien-($const+1)));
													
													//$msg=$msg." quin =".$qin." ien=".$ien."<br> ".$cont." ".$opt1." ".$opt2." ".$opt3." ".$opt4." ".$ans;
													$data=substr($data,$ien+12);
													 $queryInsert="INSERT into questions(TestId,text,corOpt) values ('$testid','$cont','$ans');";
												 mysql_query($queryInsert);
												 $qno++;
												 	$msg=$msg.' <br> '.$qno.'. '.$cont.' <br> answer= '.$ans;
												 //$a=@mysql_errno($db) . ": " . @mysql_error($db) . "\n";
												 
												 
												

							}
							
							
				fclose($opfile);
				
					
				//code ends here
			}
		}
include_once("Top.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin Page</title>
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
<script language="javascript" type="text/javascript">




</script>
</head>

<body oncontextmenu="return false;" >

<div class="left">
<?php
include("Left2.php");
?>
</div>

<div id="contents" align="center" >

       <form action="" name="frm" method="post" enctype="multipart/form-data">
    <div id="question" style=" width: 55%;position:inherit; display: none; background-color:#FFFFFF; border:solid; border-color:#999999" align="center">
   

    </div>
    <div id="post">
      <table width="55%" align="center" border="0" style="overflow: scroll" cellpadding="3" cellspacing="3">
        <caption style="background-color: #00FF33">
        Add Test
        </caption>
        <tr>
          <td colspan="3" >:</td>
        </tr>
         
         <tr>
          <td width="32%" ><strong>Test Name</strong></td>
          <td width="2%">:</td>
          <td width="66%"><input type="text" name="testname" id="testname" /></td>
        </tr>
       
        <tr>
           <td ><strong>Timing</strong></td>
           <td>&nbsp;</td>
           <td><input type="text" name="timing" id="timing" /></td>
         </tr>
           <tr>
           <td >No of Questions</td>
           <td>&nbsp;</td>
           <td><input type="text" name="noquestion" id="noquestion" maxlength="3"  /></td>
         </tr>
           <tr>
           <td >Marks for Correct Answer</td>
           <td>&nbsp;</td>
           <td><input type="text" name="markscor" id="markscor"  maxlength="2"/></td>
         </tr>
         <tr>
           <td >Marks for Wrong Answer</td>
           <td>&nbsp;</td>
           <td><input type="text" name="markswrong" id="markswrong" maxlength="2"/></td>
         </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        

        <tr id="fileupload">
            <td colspan="2" nowrap="nowrap"><strong>Upload File(.txt format only)</strong></td>
        	<td>
            <input type="file" name="file1"  id="file1" /></td><td><input type="submit" name="upload" value="Upload" id="upload" />
            </td>
        </tr>
        <tr id="sendbut" style="display: none">
          <td colspan="3" align="center"><input type="submit" name="send" value="Submit" onclick="return show_form();" /></td>
          </tr>
      </table>
      
      	
    </div>
    
    </form>
   
      	<div align="center"><?php if($msg) { echo $msg;}?></div>
       
</div>
</div>


<div id="copyright">

<?php
include("Bottom.php");
?>
</div>
</body>
</html>
