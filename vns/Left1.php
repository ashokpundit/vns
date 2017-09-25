<div id="topdev"> 
<?php
session_start();
include("connect.php");
include("CheckLogin.php");
$utype=$_SESSION["utype"];
include_once("Top.php")
?>
<script type="text/javascript">

function menuRequest(url)
{
var arg = url;

var i=1;
for(;i<=2;i++)
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
<div >
<table align="left" id="left" style="width:18%; height:120%"  border="0" cellpadding="0" cellspacing="0" valign="top">
                            <tr >
                                   <td style="width:100%" height="22" valign="top">
                                          <img src="Images/title1.jpg" style="width:100%" height="22" alt=""></td>
                            </tr>
                            <tr >
                                   <td id="menu" style="width:100%; height:100%"  align="left" valign="top">
                               <ul>

	 <li ><table style="width:100%"><tr><td align="left" style="width:20%"><img src="Images/clipart_office_graphs_003.gif"/></td><td style=" width:80%; font-size:16px; color:#FF0099; font-family:'Times New Roman', Times, serif" align="left">Menu Details</td></tr></table> 
 <table><tr><td>
<div id="menu1">
		<ul>
              <li><img src="Images/bullets_30.gif"/><a href="Receipt.php">Fee Receipt</a></li>
             <li><img src="Images/bullets_30.gif"/><a href="Details.php">Add Standards</a></li> 
         	<li><img src="Images/bullets_30.gif"/><a href="logout.php">Logout</a></li>
               
            </ul>
        </div>
        </td></tr></table>			
			</li>
             

            </ul>
           
        




                                   </td>
                            </tr>
                            <tr>
                            <!--  <td style="width:70%" height="13" bgcolor="#82CF74"  valign="top">-->
                              <td style="width:100%; height:5%"   bgcolor="#B5E2AB"  valign="bottom">
                     <img src="Images/bg_18.jpg" style="width:100%"  height="13" alt=""></td>
                     
                     </tr>
                     </table>

</div>

<link rel="stylesheet" href="style.css" type="text/css" />






