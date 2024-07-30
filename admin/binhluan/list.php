<head>
    <style>
        .frmcontent-bl{
            width: 100%;
        }
        .frmcontent-bl>table{
            text-align: center;
            border-collapse: collapse;
            width: 100%;
        }
        .frmcontent-bl>table th:nth-last-of-type(1){
            width: 10%;
        }
    </style>
</head>
<div class="frmtitle">
                <h1>Tổng hợp bình luận</h1>
            </div>
            <div class="frmcontent-bl">
                <table border="1">

                    <tr>
                        <th></th>
                        <th>Ma_bL</th>
                        <th>Nội dung</th>
                        <th>Ma_KH</th>
                        <th>Ma_HH</th>
                        <th>Ngày bình luận</th>
                        <th>Hành động</th>
                    </tr>
                        <?php foreach($list_bl as $bl){
                            extract($bl);
                            $xoadm="index.php?act=xoabl&ma_bl=$ma_bl";
                            echo '<tr>
                                <td><input type="checkbox" name="check_id" id=""></td>
                                <td>'.$ma_bl.'</td>
                                <td>'.$noi_dung.'</td>
                                <td>'.$id.'</td>
                                <td>'.$ma_hh.'</td>
                                <td>'.$ngay_bl.'</td>
                                <td>
                                    <a href="'.$xoadm.'"><input type="button" value="Xoá" name="xoa"></a>
                                </td>
                                </tr>';
                        }?>
                    
                </div>
                </table>