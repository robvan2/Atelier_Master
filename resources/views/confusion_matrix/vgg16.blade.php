<!-- amCharts javascript code -->
<script type="text/javascript">
    AmCharts.makeChart("vgg16",
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
                    "text": "Vgg16 Last Model Confusion Matrix"
                }
            ],
            "dataProvider": [
                {
                    "category": "true positive",
                    "column-1": "362"
                },
                {
                    "category": "true negative",
                    "column-1": "213"
                },
                {
                    "category": "false positive",
                    "column-1": "28"
                },
                {
                    "category": "false negative",
                    "column-1": "21"
                }
            ]
        }
    );
</script>

<div id="vgg16" style="width: 100%; height: 400px; background-color: #fafafa;" ></div>
