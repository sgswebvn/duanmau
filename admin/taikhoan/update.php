<head>
    <style>
        .frmcontent-updatebill{
            width: 95%;
            margin: 10px auto;
        }
        .frmcontent-updatebill select{
            width: 100%;
            height: 30px;
            margin-bottom: 5px;
        }
    </style>
</head>
<div class="frmtitle">
                <h1>Cập nhật tài khoản</h1>
            </div>
            <div class="frmcontent-updatebill">
                <form action="index.php?act=suatk" method="post">
                    <div>
                        <h2>Vai trò: <?=$vai_tro?></h2>
                    </div>
                    <div >
                        <select name="vai_tro" id="" >
                            <?php
                            $i=0;
                                $option=array("Người dùng","Quản trị viên");
                                foreach($option as $op){
                                    if($i==$vai_tro){
                                        echo '<option selected value="'.$i.'">'.$op.'</option>';
                                    }else{
                                        echo '<option value="'.$i.'">'.$op.'</option>';
                                    }
                                    $i++;
                                }
                            ?>
                            
                        </select>
                    </div>
                    <div>
                        <h2>Trạng thái kích hoạt: <?=$kich_hoat?></h2>
                    </div>
                    <div >
                        <select name="kich_hoat" id="" >
                            <?php
                            $i=0;
                                $option_kh=array("Đang hiện hành","Vô hiệu hoá");
                                foreach($option_kh as $op){
                                    if($i==$kich_hoat){
                                        echo '<option selected value="'.$i.'">'.$op.'</option>';
                                    }else{
                                        echo '<option value="'.$i.'">'.$op.'</option>';
                                    }
                                    $i++;
                                }
                            ?>
                            
                        </select>
                    </div>
                    
                    <div class="mb10">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <input type="submit" name="thaydoi" value="Thay đổi">
                        <a href="index.php?act=dskh"><input type="button" value="Danh sách"></a>
                    </div>
                </form>
            </div>
