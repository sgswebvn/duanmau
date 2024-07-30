

<!DOCTYPE html>
<html>
<script src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div
id="myChart"  style="width:100%; max-width:600px; height:500px;">
</div>
<div>
    <a href="index.php?act=thongke"><input style="padding: 5px;" type="button" value="Trở về"></a>
</div>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Loại hàng', 'Số lưọng'],
  <?php
    $i=1;
    $tongdm=count($listbieudo);
        foreach($listbieudo as $tk){
            
            if($i==$tongdm){
                $dauphay="";
            }else{
                $dauphay=",";
            }
            echo "['".$tk['tenloai']."',".$tk['countsp']."]".$dauphay;
            $i++;
        }

    ?>
]);

// Set Options
const options = {
  title:'Thống kê sản phẩm theo danh mục'
};

// Draw
const chart = new google.visualization.PieChart(document.getElementById('myChart'));
chart.draw(data, options);

}
</script>

</body>
</html>
