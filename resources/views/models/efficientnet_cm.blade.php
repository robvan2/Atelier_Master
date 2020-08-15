@extends('layouts.app')
@section('content')

<!-- amCharts javascript code -->
<script type="text/javascript">
    AmCharts.makeChart("chartdiv",
        {
            "type": "pie",
            "angle": 12,
            "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
            "depth3D": 25,
            "innerRadius": "40%",
            "titleField": "category",
            "valueField": "column-1",
            "fontSize": 18,
            "theme": "light",
            "allLabels": [],
            "balloon": {},
            "legend": {
                "enabled": true,
                "align": "center",
                "markerType": "circle"
            },
            "titles": [
                {
                    "id": "title",
                    "size": 20,
                    "text": "Efficient Net Last Model Confusion Matrix"
                }
            ],
            "dataProvider": [
                {
                    "category": "true positive",
                    "column-1": "377"
                },
                {
                    "category": "true negative",
                    "column-1": "13"
                },
                {
                    "category": "false positive",
                    "column-1": "200"
                },
                {
                    "category": "false negative",
                    "column-1": "34"
                }
            ]
        }
    );

    window.setTimeout(removeFun(),3000);
    function removeFun(){
        var a = document.getElementsByTagName("a")
        a.remove()
        console.log("im called")
    }



</script>
<body>
    <p>Hello world</p>
<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
</body>
@endsection
