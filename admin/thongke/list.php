<head>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
            <div class="frmtitle">
                <h1>Thống kê sản phẩm theo danh mục</h1>
            </div>
           
           
            <div>
                <table border="1">

                    <tr>
                        <th>STT</th>
                        <th>Loại Hàng</th>
                        <th>Số lượng</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá cao nhất</th>
                        <th>Giá trung bình</th>
                        <!-- <th>Thao tác</th> -->
                    </tr>
                        <?php 
                        $i=1;
                        foreach($thongke as $ke){
                            // extract($ke);
                            // $suabill="index.php?act=suabill&id_bill=$id_bill";
                            // $xoabill="index.php?act=xoabill&id_bill=$id_bill";
                            if($ke[3]!=""){  
                                $ke[3].=" VNĐ";
                            }
                            if($ke[2]!=""){  
                                $ke[2].=" VNĐ";
                            }
                            $ke[4]=round($ke[4]);
                            if($ke[4]!=0){  
                                $ke[4].=" VNĐ";
                            }else{
                                $ke[4]="";
                            }
                            echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$ke[0].'</td>
                                <td>'.$ke[1].'</td>
                                <td>'.$ke[2].'</td>
                                <td>'.$ke[3].'</td>
                                <td>'.$ke[4].'</td>
                                </tr>';
                            $i++;
                        }?>
                </table>
                <a href="index.php?act=bieudotk"><input type="button" value="Biểu đồ"></a>  
            </div>