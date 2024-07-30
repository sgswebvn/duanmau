

            <div class="frmtitle">
                <h1>Danh sách hàng hoá</h1>
            </div>
            <form  action="index.php?act=listsp" method="post">
                <input type="text"  name="kyw" id="">
                <select name="iddm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php 
                          foreach($listdanhmuc as $danhmuc){
                            extract($danhmuc);
                            echo '<option value="'.$ma_loai.'">'.$ten_loai.'</option>';
                        }
                    ?>
                </select>
                <input name="listok" type="submit" value="Go">
            </form>
            <div class="frmcontent2">
                <table class="listsp" border="1">

                    <tr>
                        <th></th>
                        <th>Mã hàng</th>
                        <th>Tên hàng</th>
                        <th>Hình</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Ngày thêm</th>
                        <th>Mô tả</th>
                        <th>Số lượt xem</th>
                        <th>Mã loại</th>
                        <th>Hành động</th>
                    </tr>
                    
                        <?php foreach($listsanpham as $sanpham){
                            extract($sanpham);
                            $suasp="index.php?act=suasp&ma_hh=$ma_hh";
                            $xoasp="index.php?act=xoasp&ma_hh=$ma_hh";
                            echo '<tr>
                                <td><input type="checkbox" name="check_id" id=""></td>
                                <td>'.$ma_hh.'</td>
                                <td>'.$ten_hh.'</td>
                                <td><img src="../img/'.$hinh.'" alt="Lỗi"></td>
                                <td>'.$don_gia.'</td>
                                <td>'.$giam_gia.'</td>
                                <td>'.$ngay_nhap.'</td>
                                <td>'.$mo_ta.'</td>
                                <td>'.$so_luot_xem.'</td>
                                <td>'.$ma_loai.'</td>
                                <td>
                                    <a href="'.$suasp.'"><input type="button" value="Sửa" name="sua"></a>
                                    <a href="'.$xoasp.'"><input type="button" value="Xoá" name="xoa"></a>
                                </td>
                                </tr>';
                        }?>
                    
                </table>
            </div>