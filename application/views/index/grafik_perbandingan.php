<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo !empty($title) ? $title : null ?></h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="pendaftar"></div>
        </div>
    </div>
</main>
<script>
    getGrafikColumn('pendaftar', <?= $grafik ?>, categories, 'Grafik Perbandingan Pembayaran Pendaftar Berdasarkan Bank Pembayaran', subtitle);

    function getGrafikColumn(selector, data, categories, title, subtitle) {
        Highcharts.chart(selector, {
    
    chart: {
        type: 'column'
    },
    title: {
        text: title
    },
    subtitle: {
        text:
            subtitle
    },
    xAxis: {
        type: categories,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pendaftar'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
        
};

</script>