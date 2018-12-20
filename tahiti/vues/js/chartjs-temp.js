var Script = function () {
    var lineChartData = {
        labels : ["","","","","","",""],
        datasets : [

            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : [28,48,40,19,96,27,100]
            }
        ]

    };

    new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);

}();