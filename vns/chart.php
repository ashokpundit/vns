<?php 
session_start();

// $_SESSION['examid']=1;
include("connect.php");
include("CheckLogin.php");
$studentid=$_SESSION['studentid'];
?>
<html> 
<head> 
<title>Chart Example</title> 

<script type="text/javascript" src="MochiKit/MochiKit.js"></script>
<script type="text/javascript" src="PlotKit/Base.js"></script>
<script type="text/javascript" src="PlotKit/Layout.js"></script>
<script type="text/javascript" src="PlotKit/Canvas.js"></script>
<script type="text/javascript" src="PlotKit/SweetCanvas.js"></script>

<script>
<?php
		$str0='"xTicks": [{v:0, label:"0"}';
		//{v:0, label:"zero"},	          {v:1, label:"one"},          {v:2, label:"two"},	          {v:3, label:"three"},		          {v:4, label:"four"}]';
	    $str='layout.addDataset("sqrt", [[0,0]';//, [1, 1], [2, 1.414], [3, 1.73], [4, 2]]); 
	    		 $sql="select t.Name, r.score from student_test_records as r,tests as t where r.StudentId=". $studentid." and r.TestId=t.TestId;";
	    		      $sql1qer=mysql_query($sql);
	    		      $testids;
	    		      $i=1;
	    		       while($fetchedit1=mysql_fetch_array($sql1qer))
	    				{
	    					//$fetchedit1['Name']
//	    					if($i===0)
//	    					{
//	    						$str0=$str0.'{v:'.$i.', label:"'.$fetchedit1['Name'].'"}';
//	    						$str=$str.'['.$i.','.$fetchedit1['score'].']';
//	    					}
//	    					else
	    					{
	    						$str0=$str0.',{v:'.$i.', label:"'.$fetchedit1['Name'].'"}';
	    						$str=$str.',['.$i.','.$fetchedit1['score'].']';
	    					}
	    					$i++;
//	    					$testids=$testids.";".	$fetchedit1['TestId'];
	    				}
	    				$str=$str.']);';
	    				$str0=$str0.']';
	    			
	    		?>
var options = {
		   "IECanvasHTC": "/plotkit/iecanvas.htc",
		   "colorScheme": PlotKit.Base.palette(PlotKit.Base.baseColors()[0]),
		   "padding": {left: 0, right: 0, top: 10, bottom: 30},
		   <?php echo $str0;?>,
		   "drawYAxis": true
		};
function drawGraph() {
    var layout = new PlotKit.Layout("bar",options);
    <?php echo $str;?>
    
    layout.evaluate();
    var canvas = MochiKit.DOM.getElement("graph");
    var plotter = new PlotKit.SweetCanvasRenderer(canvas, layout,options);
    plotter.render();
}
MochiKit.DOM.addLoadEvent(drawGraph);
</script>
</head> 
<body> 

<div><canvas id="graph" height="300" width="300"></canvas></div>

</body> 
</html>
