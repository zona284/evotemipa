<?php 
include_once '../db_connect.php';
include_once '../config.php';
$db = new DB_Connect();
$db->connect();

$query = mysql_query("select nama, suara from calon");
if($query){
    $data_nama = array();
    while ($data = mysql_fetch_array($query)){
        //array_push($data_nama, $data['nama']);
        $data_nama[] = $data['nama'];
        $data_suara[] = $data['suara'];
    }
    echo json_encode($data_nama);
    echo json_encode($data_suara);
    $len_suara = count($data_suara);
}
?>
    
        <script>
    $(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Hasil Perhitungan Suara'
        },
        xAxis: {
            categories: <?php echo json_encode($data_nama); ?>
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total suara'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'Jumlah suara',
            data: <?php 
                echo "[";
                for($i = 0; $i < $len_suara; $i++){
                    if($i == $len_suara-1)
                        echo $data_suara[$i] ;
                    else
                        echo $data_suara[$i] . "," ;
                }
                echo "]";
            ?>
        }]
    });
});    
        </script>

        <script src="../js/highcharts.js"></script>
        <script src="../js/exporting.js"></script>        

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>        