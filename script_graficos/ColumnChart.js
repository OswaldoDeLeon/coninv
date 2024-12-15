    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(dibujarGrafico);

    function dibujarGrafico() {
        fetch('script_graficos/data_ColumnChart.php')
        .then(response=> response.json())
        .then(data => {

                    // Crea la Tabla dataTable
                    var dataTable = google.visualization.arrayToDataTable(data);

                    //Opciones del Grafico
                    var options = {
                    title: 'Inventario por Categoria',
                    hAxis: {title: 'Producto'},
                    vAxis: {title: 'Cantidad'},
                    legend: {position: 'none'},
                    bars: 'vertical',
                    colors: ['#4285F4'],
                    width: 600,
                    height: 400
                    };
                
                    //Dibujar el Grafico,
                    var chart = new google.visualization.ColumnChart(document.getElementById('graficoCol2'));
                    chart.draw(dataTable, options);
                    
    });
    }
