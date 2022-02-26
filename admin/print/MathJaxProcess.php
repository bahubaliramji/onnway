<?php

$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;



require_once $path .'/vendor/autoload.php';

//echo $path .'/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
//$sizeConverter = new \Mpdf\SizeConverter($mpdf->dpi, $mpdf->default_font_size , $mpdf);
//die();

$html = $_POST['bodydata'];
$html = urldecode($html);

preg_match('/<svg[^>]*>\s*(<defs.*?>.*?<\/defs>)\s*<\/svg>/', $html, $m);
//print_r($m);
$defs = $m[0];

$html = preg_replace('/<svg[^>]*>\s*<defs.*?<\/defs>\s*<\/svg>/', '', $html);
$html = preg_replace('/(<svg[^>]*>)/', "\\1" . $defs, $html);

//var_dump($html);die;

preg_match_all('/<svg([^>]*)>/', $html, $m);

//var_dump($m);die;

foreach ($m as $attributes) {
	foreach ($attributes as $attribute) {
		preg_match('/width="(.*?)"/', $attribute, $wr);
		preg_match('/height="(.*?)"/', $attribute, $hr);
		//var_dump($wr, $hr);
		if ($wr!=0 && $hr!=0) {
			$w = $sizeConverter->convert($wr[1], 0, $mpdf->FontSize) * $mpdf->dpi / 25.4;
			$h = $sizeConverter->convert($hr[1], 0, $mpdf->FontSize) * $mpdf->dpi / 25.4;
			//var_dump($w, $h);
			$html = str_replace('width="' . $wr[1] . '"', 'width="' . $w . '"', $html);
			$html = str_replace('height="' . $hr[1] . '"', 'height="' . $h . '"', $html);
		}
	}
}

$html = str_replace('stroke="currentColor"', 'stroke="#000"', $html);
$html = str_replace('fill="currentColor"', 'fill="#000"', $html);

if (isset($_POST['PDF']) && $_POST['PDF'] === 'PDF') {

	// add a stylesheet
	$stylesheet = '* {
            padding: 0px;
            margin: 0px;
            border-collapse: collapse;
            padding-left: 1px;
        }
        
        body {
        width: 250mm;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
            padding: 0px;
        }
        
        .nav {
            display: block;
            padding-top: 10px;
            border: 2px solid black;
            border-bottom: none;
        }
        
        .boxes {
            display: flex;
        }
        
        .box {
            text-align: center;
            width: 33.33%;
        }
        
        .title {
            color: white;
            background-color: grey;
            text-align: center;
        }
        
        .title h1 {
            font-size: 15px;
            /* background-color: grey; */
            padding: 0px;
        }
        
        .box3 {
            padding: 0px;
            margin: 0px;
            margin-left: -40px;
            width: 40%!important;
        }
        
        .box3 h2 {
            font-size: 14px;
            color: red;
        }
        
        .box3 p {
            font-size: 12px;
        }
        
        table,
        tr {
            width: 100%;
        }
        
        .nav table,
        .nav td,
        .nav th {
            border: none;
        }
        
        table,
        th,
        td {
            border: 2px solid black;
            border-collapse: collapse;
            padding: 0px;
            margin: 0px;
            text-align: left;
            /* padding-left: 5px; */
        }
        
        .nav th {
            width: 50%;
        }
        
        .grey {
            color: white;
            background-color: grey;
            border-right: none;
        }
        
        .grey p {
            font-size: 22px;
        }
        
        table p {
            font-size: 20px;
        }
        
        tr {
            width: 100%;
        }
        
        .border-none,
        .border-none tr,
        .border-none td {
            border-top: none;
            border-bottom: none;
        }
        
        .width-4-column td,
        .width-4-column th {
            width: 25%;
        }
        
        .width-2-column td,
        .width-2-column th {
            width: 50%;
        }
        
        .grey-col td {
            border-left: none;
        }
        
        .no-border,
        .no-border td,
        .no-border tr,
        .no-border table,
        .no-border th {
            border: none;
        }
        
        .border-bottom-none {
            border-bottom: none;
        }
        
        .border-top-none {
            border-top: none;
        }
        
        .border-left-none {
            border-left: none;
        }
        
        .border-right-none {
            border-right: none;
        }
        
        .border-left {
            border-left: 2px solid black;
        }
        
        .border-right {
            border-right: 2px solid black;
        }
        
        .border-top {
            border-top: 2px solid black;
        }
        
        .border-bottom-none {
            border-bottom: none;
        }
        
        .border-bottom {
            border-bottom: 2px solid black;
        }
        
        #newform table,
        tr,
        td,
        th {
            border: none;
        }
        
        .padding-2px {
            padding: 2px;
        }
        
        .text-center {
            text-align: center;
        }
        
        .padding-left-5px {
            padding-left: 5px;
        }
        
        .font-small {
            /* font-size: 12px; */
        }
        
        .font-small p {
            font-size: 11px;
        }
        
        .width-8-column td,
        th {
            width: 12.50%;
        }
        
        .padding-large {
            padding: 50px 5px;
        }
        
        .head-width {
            width: 60%;
        }
        
        .head-width2 {
            width: 20%;
        }
        
        .text-left {
            text-align: left;
        }
        
        tr span {
            font-size: 10px;
        }
        
        .width-70 {
            width: 60%;
        }
        
        .width-30 {
            width: 40%;
        }
        
        .last-box {
            display: flex;
            width: 100%;
            height: 100%;
            /* border: 2px solid red; */
        }
        
        #table1 {
            width: 70%;
            border: 2px solid black;
            margin: 0px;
        }
        
        #table1 li {
            font-size: 9px;
        }
        
        #table2 {
            width: 30%;
            /* padding-top: 40px; */
            padding-left: 5px;
            margin: 0px;
        }
        
        #table2 h2 {
            font-size: 25px;
            margin: 0px;
            /* padding:20px 0px!important; */
        }
        
        .footer {
            display: flex;
            width: 100%;
            text-align: center;
        }
        
        .footer h4 {
            width: 80%;
        }';
	/* $mpdf->SetWatermarkImage(
    'http://mylearningplan.in/images/bak3.png',
    0.1
); */



//$mpdf->showWatermarkImage = true;

	$mpdf->WriteHTML($stylesheet, 1);
	
	$mpdf->WriteHTML($html);
	
	$mpdf->Output();

} else {
	// To output SVG files readable by mPDF as text output
	header('Content-type: image/svg+xml');
	preg_match_all('/<svg(.*?)<\/svg>/', $html, $m);
	for ($i = 0; $i < count($m[0]); $i++) {
		$svg = $m[0][$i];
		$svg = preg_replace('/>/', ">\n", $svg); // Just add some new lines
		echo $svg . "\n\n";
	}
}

exit;