<!-- amCharts javascript code -->
<script type="text/javascript">

    AmCharts.makeChart("efficientNet",
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
                    "column-1": "373"
                },
                {
                    "category": "true negative",
                    "column-1": "17"
                },
                {
                    "category": "false positive",
                    "column-1": "209"
                },
                {
                    "category": "false negative",
                    "column-1": "25"
                }
            ]
        }
    );
</script>

<div id="efficientNet" style="width: 100%; height: 400px; background-color: #fafafa;" ></div>
