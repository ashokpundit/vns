<?php 
session_start();

// $_SESSION['examid']=1;
include("connect.php");
include("CheckLogin.php");
$studentid=$_SESSION['studentid'];
?>


<?php
//{ Test: "Test 1", Marks: 13 },
		//{ Test: "Test 2", Marks: 18 }
		$str0='"xTicks": [{v:0, label:"0"}';
		//{v:0, label:"zero"},	          {v:1, label:"one"},          {v:2, label:"two"},	          {v:3, label:"three"},		          {v:4, label:"four"}]';
	    $str='';//layout.addDataset("sqrt", [[0,0]';//, [1, 1], [2, 1.414], [3, 1.73], [4, 2]]); 
	    		 $sql="select t.Name, r.score, t.NoQuestions, r.corAns, r.wrongAns from student_test_records as r,tests as t where r.StudentId=". $studentid." and r.TestId=t.TestId;";
	    		      $sql1qer=mysql_query($sql);
	    		      $testids;
	    		      $i=0;
	    		       while($fetchedit1=mysql_fetch_array($sql1qer))
	    				{
	    					
	    					$corand=$fetchedit1['corAns'];
	    					$wrongans=$fetchedit1['wrongAns'];
	    					
	    					if($i===0)
	    					{
//	    						$str0=$str0.'{v:'.$i.', label:"'.$fetchedit1['Name'].'"}';
	    						$str='{ Test: "'.$fetchedit1['Name'].'", Correct: '.$corand.', Wrong: '.$wrongans.' }';//$str.'['.$i.','.$fetchedit1['score'].']';
	    					}
	    					else
	    					{
//	    						$str0=$str0.',{v:'.$i.', label:"'.$fetchedit1['Name'].'"}';
	    						$str=$str.',{ Test: "'.$fetchedit1['Name'].'", Correct: '.$corand.', Wrong: '.$wrongans.' }';
	    					}
	    					$i++;

	    				}
//	    				$str=$str.']);';
//	    				$str0=$str0.']';
	    			
	    		?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
 
 
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Skinning a Chart Example</title>
 
<style type="text/css"> 
/*margin and padding on body element
  can introduce errors in determining
  element position and are not recommended;
  we turn them off as a foundation for YUI
  CSS treatments. */
body {
	margin:0;
	padding:0;
}
</style>
 
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/fonts/fonts-min.css" />
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/json/json-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/element/element-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/datasource/datasource-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/swf/swf-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/charts/charts-min.js"></script>
 
 
<!--begin custom header content for this example-->
<style type="text/css"> 
	#chart
	{
		width: 580px;
		height: 400px;
	}
	
	.chart_title
	{
		display: block;
		font-size: 1.2em;
		font-weight: bold;
		margin-bottom: 0.4em;
	}
</style>
<!--end custom header content for this example-->
 
</head>
 
<body class="yui-skin-sam">
 
 
<h1></h1>
 
<div class="exampleIntro">
				
</div>
 
<!--BEGIN SOURCE CODE FOR EXAMPLE =============================== -->
 
<span class="chart_title"></span>
<div id="chart">Unable to load Flash content. The YUI Charts Control requires Flash Player 9.0.45 or higher. You can download the latest version of Flash Player from the <a href="http://www.adobe.com/go/getflashplayer">Adobe Flash Player Download Center</a>.</p></div>
 
<script type="text/javascript"> 
 
	YAHOO.widget.Chart.SWFURL = "http://yui.yahooapis.com/2.8.0r4/build/charts/assets/charts.swf";
 
//--- data
 
	YAHOO.example.salesComparison =
	[
		<?php echo $str;?>
	];
 
	var salesData = new YAHOO.util.DataSource( YAHOO.example.salesComparison );
	salesData.responseType = YAHOO.util.DataSource.TYPE_JSARRAY;
	salesData.responseSchema = { fields: [ "Test", "Correct","Wrong" ] };
 
//--- chart
 
	var seriesDef =
	[
		{
			yField: "Correct",
			displayName: "Correct Marks",
			style:
			{
				image: "img/tube.png",
				mode: "no-repeat",
				color: 0x00ff00,
				size: 40
			}
		},
		{
			yField: "Wrong",
			displayName: "Wrong Marks",
			style:
			{
				image: "img/tube.png",
				mode: "no-repeat",
				color: 0xff0000,
				size: 40
			}
		}
	];
 
	var mychart = new YAHOO.widget.ColumnChart( "chart", salesData,
	{
		series: seriesDef,
		xField: "Test",
		style:
		{
			border: {color: 0x96acb4, size: 12},
			font: {name: "Arial Black", size: 14, color: 0x586b71},
			dataTip:
			{
				border: {color: 0x2e434d, size: 2},
				font: {name: "Arial Black", size: 13, color: 0x586b71}
			},
			xAxis:
			{
				color: 0x2e434d
			},
			yAxis:
			{
				color: 0x2e434d,
				majorTicks: {color: 0x2e434d, length: 4},
				minorTicks: {color: 0x2e434d, length: 2},
				majorGridLines: {size: 0}
			}
		},
		//only needed for flash player express install
		expressInstall: "assets/expressinstall.swf"
	});
</script>
<!--END SOURCE CODE FOR EXAMPLE =============================== -->
 
</body>
</html>
