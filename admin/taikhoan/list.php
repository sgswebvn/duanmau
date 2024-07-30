<head>
    <style>
        .border-tk{
            text-align: center;
        }
    </style>
</head>

<div class="frmtitle">
                <h1>Danh sách khách hàng</h1>
            </div>
            <div class="">
                <table class="border-tk" border="1">

                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Hình</th>
                        <th>Vai trò</th>
                        <th>Kích hoạt</th>
                        <th>Hành động</th>
                    </tr>
                        <?php foreach($listtk as $tk){
                            extract($tk);
                            $suatk="index.php?act=suatk&id=$id";
                            echo '<tr>
                                <td><input type="checkbox" name="check_id" id=""></td>
                                <td>'.$id.'</td>
                                <td>'.$user.'</td>
                                <td>'.$mat_khau.'</td>
                                <td>'.$email.'</td>
                                <td>'.$dia_chi.'</td>
                                <td><img src="./../img/'.$hinh.'"></td>
                                <td>'.$vai_tro.'</td>
                                <td>'.$kich_hoat.'</td>
                                <td>
                                    <a href="'.$suatk.'"><input type="button" value="Sửa" name="sua"></a>
                                </td>
                                </tr>';
                        }?>
                    
                </div>
                </table>