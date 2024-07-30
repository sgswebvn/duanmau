
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
                <h1>Danh sách các đơn hàng</h1>
            </div>
            <div>
                <form action="index.php?act=listbill" method="post">
                    <input type="text" name="kyw">
                    <input type="submit" value="Tất cả" name="allsearch">
                    <input type="submit" name="search" value="Go">
                </form>
            </div>
            <div class="frmcontent-bill">
                <table border="1">

                    <tr>
                        <th></th>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Số lượng hàng</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Tình trạng đơn hàng</th>
                        <th>Thao tác</th>
                    </tr>
                        <?php foreach($listbill as $bill){
                            extract($bill);
                            $suabill="index.php?act=suabill&id_bill=$id_bill";
                            $xoabill="index.php?act=xoabill&id_bill=$id_bill";
                            $sl_hh=get_sl_mh($id_bill);
                            $ttdh=get_ttdh($status);
                            $kh=$bill['ho_ten'].
                            '<br>'.$bill['email'].
                            '<br>'.$bill['dia_chi'].
                            '<br>'.$bill['sdt'];

                            echo '<tr>
                                <td><input type="checkbox" name="check_id" id=""></td>
                                <td>'.$id_bill.'</td>
                                <td>'.$kh.'</td>
                                <td>'.$sl_hh['sum(so_luong)'].'</td>
                                <td>'.$total.'VNĐ</td>
                                <td>'.$ttdh.'</td>
                                <td>
                                    <a href="'.$suabill.'"><input type="button" value="Sửa" name="sua"></a>
                                    <a href="'.$xoabill.'"><input type="button" value="Xoá" name="xoa"></a>
                                </td>
                                </tr>';
                        }?>
                    
                </div>
                </table>