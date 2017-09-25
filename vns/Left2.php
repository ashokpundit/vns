

<?php
session_start();
include("connect.php");
include("CheckLogin.php");
$utype=$_SESSION["utype"];
include_once("Top.php")
?>

<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

function menuRequest(url)
{
var arg = url;

var i=1;
for(;i<=1;i++)
{
	var idd1=document.getElementById("menu"+i);
	
	idd1.style.visibility='hidden';
	idd1.style.display = "none";

	
	}

var idd=document.getElementById(url);

idd.style.visibility='visible';
idd.style.display = "block";


}
</script>

<table align="left" id="left" style="width:18%; "  border="0" cellpadding="0" cellspacing="0" valign="top">
<tr>
<td>
<div >
<div id="Accordion1" class="Accordion" tabindex="0">
  <div class="AccordionPanel">
    <div class="AccordionPanelTab"><span style=" width:80%; font-size:16px; font-family:'Times New Roman', Times, serif">Exams Details</span></div>
    <div class="AccordionPanelContent"><a href="exams_question.php">Add Questions</a><br />

             
             <a href="questions_list.php">Show Questions</a><br />
             <a href="createtest.php">Create New Test</a><br />
    </div>
  </div>
  <div class="AccordionPanel">
    <div class="AccordionPanelTab"><span style=" width:80%; font-size:16px;  font-family:'Times New Roman', Times, serif">Logout Now</span></div>
    <div class="AccordionPanelContent"><a href="logout.php">Logout</a></div>
  </div>
</div>
</td>
</tr>
                            
                     </table>
                     

</div>

<link rel="stylesheet" href="style.css" type="text/css" />






<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>
