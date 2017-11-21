<?php // content="text/plain; charset=utf-8"
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_bar.php');
include('grafico.php');
$obj = new Anexo_8();

$d1 = $obj->anexo8(0);
$d2 = $obj->anexo8(1);
$d3 = $obj->anexo8(2);
$d4 = $obj->anexo8(3);

 
$data1y=array($d1[0],$d2[0],$d3[0],$d4[0]);
$data2y=array($d1[1],$d2[1],$d3[1],$d4[1]);
$data3y=array($d1[2],$d2[2],$d3[2],$d4[2]);
$data4y=array($d1[3],$d2[3],$d3[3],$d4[3]);
$data5y=array($d1[4],$d2[4],$d3[4],$d4[4]);

 
// Create the graph. These two calls are always required
$graph = new Graph(620,400);    
$graph->SetScale("textlin");
 
$graph->SetShadow();
$graph->img->SetMargin(40,30,20,40);
 
// Create the bar plots
$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("#9370DB");
$b1plot->SetLegend("Valor 1");

$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("#9370DB");
$b2plot->SetLegend("Valor 2");

$b3plot = new BarPlot($data3y);
$b3plot->SetFillColor("#9370DB");
$b3plot->SetLegend("Valor 3");

$b4plot = new BarPlot($data4y);
$b4plot->SetFillColor("#9370DB");
$b4plot->SetLegend("Valor 4");

$b5plot = new BarPlot($data5y);
$b5plot->SetFillColor("#9370DB");
$b5plot->SetLegend("Valor 5");



// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot,$b4plot,$b5plot));
 
// ...and add it to the graPH
$graph->Add($gbplot);

$b1plot->value->SetFormat('%d');
$b1plot->value->Show();
$b1plot->value->SetColor("black","darkred");
$b1plot->value->SetAngle(45);

$b2plot->value->SetFormat('%d');
$b2plot->value->Show();
$b2plot->value->SetColor("black","darkred");
$b2plot->value->SetAngle(45);

$b3plot->value->SetFormat('%d');
$b3plot->value->Show();
$b3plot->value->SetColor("black","darkred");
$b3plot->value->SetAngle(45);

$b4plot->value->SetFormat('%d');
$b4plot->value->Show();
$b4plot->value->SetColor("black","darkred");
$b4plot->value->SetAngle(45);

$b5plot->value->SetFormat('%d');
$b5plot->value->Show();
$b5plot->value->SetColor("black","darkred");
$b5plot->value->SetAngle(45);

$graph->title->Set("EVALUACION DEL TUTOR");
$graph->xaxis->title->Set("Preguntas");
$graph->yaxis->title->Set("Alumnos");
 
$graph->title->SetFont(FF_FONT2,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
 
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
ob_start();
imagepng($gdImgHandler);
$image_data = ob_get_contents();
ob_end_clean();
$datos = '<div class="animated fadeIn">';
$datos .= "<img class='anexosBox' src='" ."data:$contentType;base64," . base64_encode($image_data)."' />";
$obs = '<hr />
		<div class="row centered animated fadeIn"><div class="col col-3">
		<button class="button aceptar width-100 anexosBox" id="impre-graf"><i class="fa fa-file-pdf-o fa-lg"></i> generar PDF</button>
		</div></div></div>';
echo $datos.$obs;
?>
