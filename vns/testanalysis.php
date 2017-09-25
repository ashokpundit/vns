<?php
session_start();
// $_SESSION['examid']=1;
include("connect.php");
include("CheckLogin.php");
$studentid=$_SESSION['studentid'];
$exid= $_SESSION['testid'];
$sql="select t.Name, r.score from student_test_records as r,tests as t where r.StudentId=". $studentid." and r.TestId=t.TestId;";
echo phpinfo();
$result = mysql_query($sql);
$data = array();
while($fetchedit=mysql_fetch_array($result))
		{
  $data['values'][] = $fetchedit['score'];
  $data['labels'][] = $fetchedit['Name'];
}
// initialize object with chart type
$gdc = new GDChart(GDChart::BAR);

// add data points
$gdc->addValues($data['values']);

// add X-axis labels
$gdc->setLabels($data['labels']);

// set titles
$gdc->title = 'Test Analysis';
$gdc->xtitle = 'Test';
$gdc->ytitle = 'Marks';

// generate chart
header('Content-Type:image/png');
echo $gdc->out(300,200,GDChart::PNG);
?>
