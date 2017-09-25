<?php
session_start();
// $_SESSION['examid']=1;
include("connect.php");
include("CheckLogin.php");
$studentid=$_SESSION['studentid'];
$pagetype;
if(isset($_REQUEST['testno']))
{
	$notest=$_REQUEST['testno'];
	$seltest;
	for($i=1;$i<$notest;$i++)
	{
		if(isset($_REQUEST['Test'.$i]))
		{
			if($_REQUEST['Test'.$i]==='Take Test')
			$pagetype=1;
			else
			$pagetype=2;
			$seltest=$_REQUEST['Testhd'.$i];
		}
	}
	
	if(isset($seltest))
	{
		$_SESSION['testid']=$seltest;
		$_SESSION['pagetype']=$pagetype;
		header("location:studenttest.php");
		}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>www.onlineia.com</title>
</head>

<body>
<div style="width:960px;" align="center" >
	<div align="center" style="padding-top:10px; padding-bottom:20px;">
                <?php
               // include("ad.php");
                ?>
    </div>
	<div style="width:250px; padding-top:10px; margin-bottom:10px; float:left">
    	<table>
        	<tr>
            	<td style="background-color:#0099ff; color:#FFFFFF; font-weight:700; text-align:justify; padding-left:10px; padding-right:10px;">
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Take test and analyze the performance. Now, its easy to maximise your performance in the test.
                </td>
            </tr>
        	<tr>
            	<td style="color:#666666; font-weight:700; text-align:justify; padding-left:10px; padding-right:10px; padding-top:20px;">
                	Click below to get the tips for performing better in exams.
                </td>
            </tr>
            <tr>
            	<td style="padding-bottom:20px;">
					<a href="tips.php"><img src="http://www.onlineia.com/vns/img/tips.jpg" width="220;" /></a>
                </td>
            </tr>
        	<tr>
            	<td style="color:#666666; font-weight:700; text-align:justify; padding-left:10px; padding-right:10px;">
                	Click the image below to analyze your performance.
                </td>
            </tr>
            <tr>
            	<td style="padding-bottom:20px;">
					<a href="mychart.php"><img src="http://www.onlineia.com/vns/img/testperformance.JPG" width="220;" /></a>
                </td>
            </tr>
         </table>   
	</div>
	<div style="width:708px; float:right; padding-bottom:20px;">
        <table align="center"  border="0" style="padding-top:20px; padding-bottom:20px; width:700px; text-align:justify; font-family:Verdana, Arial, Helvetica, sans-serif; line-height:20px;">
          <tr>
            <td align="center">
            <strong>Welcome VNS INSTITUTE student</strong>
             </td>
            </tr>
          <tr>
            <td align="justify" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; padding-top:20px; padding-bottom:20px;">
                 Please choose the test from below and click Start Test button. Before clicking the button please make sure that you are ready for the test. Also, make sure you are free for next one hour and 15 minutes to give the test. If you are not ready to take test now, please ckick below to go back to your instiute's website and give test later.
            </td>
          </tr>
          <tr>
            <td align="justify" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; padding-top:20px; padding-bottom:20px;">
                You can give the test only once. After you have submitted the test you will be able to analyze the test. If you have not completed the test within time limit givenn for the test; the test will be automatically submitted.
            </td>
          </tr>
          <tr>
            <td align="justify" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; padding-top:20px; padding-bottom:20px;">
                After clicking the button you will be taken to the test instruction page. Please read the instructions carefully before attempting the questions.
            </td>
          </tr>
          <tr>
            
            <td align="center" style="padding-top:30px">
              <form id="form1" name="form1" method="post" action="intro.php">
             <?php
             
             $sql1="select TestId from student_test_records where StudentId='".$studentid."';";
              $sql1qer=mysql_query($sql1);
              $testids;
               while($fetchedit1=mysql_fetch_array($sql1qer))
                {
                    $testids=$testids.";".	$fetchedit1['TestId'];
                }
               $questionno=1;
               $selectquestion="select * from tests;";
         
                $selectrecord=mysql_query($selectquestion);
                
                ?>
                
                <?php
                $i=1;
        //		echo "tests ".$testids;
                while($fetchedit=mysql_fetch_array($selectrecord))
                {
                    echo '<table border="2" width="700" style="border:solid; border-color:#ffffff; background-color:#0099FF;"><tr><td width="570" style="color:#ffffff; font-weight:700;">';
                    $testid=$fetchedit[TestId];
                    echo '		 <label> '.$fetchedit[Name].'      </label>';
                    echo '</td>';
                    $testch=';'.$testid;
        //			echo "ch ".$testch;
                    $pos=strpos($testids,$testch);
        //			echo "pos ".$pos; 
        echo '<td align="left">';
                    if($pos===false)
                    echo  '<input type="submit" name="Test'.$i.'" id="Test'.$i.'" value="Take Test" /><br>';
                    else
                            echo  '<input type="submit" name="Test'.$i.'" id="Test'.$i.'" value="Analyse Test" /><br>';
                    
                    echo '</td></tr></table>';		
                   echo   ' <input type="hidden" value="'.$fetchedit[TestId].'" name="Testhd'.$i.'"/>';
                /* echo '<input type="radio" name="Test" value='.$fetchedit[TestId].' id='.$fetchedit[TestId].' /> '.$fetchedit[Name] .'</label><br>';*/
                 $i++;
                }
               echo   ' <input type="hidden" value="'.$i.'" name="testno"/>';
                ?>
        
                <label ></label>
                    </form>      
                    </td>
          </tr>
          <tr>
            <td style="padding-top:20px; padding-bottom:20px; padding-left:10px; padding-right:10px; background-color:#0099FF; color:#FFFFFF; font-weight:700; font-style:normal;">
                 To view and analyze the performance across the given tests click here <a href="mychart.php" style="color:#666666">Track Your Performance</a>.
        
            </td>
          </tr>
          <tr>
             <td width="949" style="padding-top:20px; padding-bottom:20px">
                To go back to VNS Institute Web Page <a href="http://www.vnsinstitute.org/">Click Here.</a>
             </td>    
          </tr>
        </table>
       </div>
   	<div align="left">
     		<?php include("Bottom.php");
			?>
	</div>

</div>
</body>
</html>
