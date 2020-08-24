@extends('layouts.app')

@section('content')

<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "category",
					"angle": 30,
					"depth3D": 30,
					"startDuration": 1,
					"theme": "light",
					"categoryAxis": {
						"gridPosition": "start",
						"title": "Les réseaux neurones"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "graph 1",
							"type": "column",
							"valueField": "column-1"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Temps en Seconde"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Temps d'execution "
						}
					],
					"dataProvider": [
						{
							"category": "VGG16",
							"column-1": "6535.7"
						},
						{
							"category": "Resnet-50",
							"column-1": "3717.3"
						},
						{
							"category": "Mobile Net V2",
							"column-1": "6991.2"
						},
						{
							"category": "Inception V3",
							"column-1": "10065.4"
						},
						{
							"category": "Efficient Net B4",
							"column-1": "13022.4"
						}
					]
				}
			);
		</script>
	<body>
		<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
	</body>
@endsection
