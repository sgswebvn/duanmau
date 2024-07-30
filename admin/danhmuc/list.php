<head>
    <!-- <link rel="stylesheet" href="../../css/style.css"> -->
</head>

            <div class="frmtitle">
                <h1>Danh sách loại hàng</h1>
            </div>
            <div class="frmcontent">
                <table border="1">

                    <tr>
                        <th></th>
                        <th>Mã loại</th>
                        <th>Tên loại</th>
                        <th>Hành động</th>
                    </tr>
                        <?php foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            $suadm="index.php?act=suadm&ma_loai=$ma_loai";
                            $xoadm="index.php?act=xoadm&ma_loai=$ma_loai";
                            echo '<tr>
                                <td><input type="checkbox" name="check_id" id=""></td>
                                <td>'.$ma_loai.'</td>
                                <td>'.$ten_loai.'</td>
                                <td>
                                    <a href="'.$suadm.'"><input type="button" value="Sửa" name="sua"></a>
                                    <a href="'.$xoadm.'"><input type="button" value="Xoá" name="xoa"></a>
                                </td>
                                </tr>';
                        }?>
                    
                </div>
                </table>