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
                <h1>Tình trạng hàng hoá</h1>
                
            </div>
            <div class="frmcontent-updatebill">
                <form action="index.php?act=suabill&id_bill=<?=$id_bill?>" method="post">
                    <div>
                        <h2>MÃ bill: <?=$id_bill?></h2>
                    </div>
                    <div >
                        <select name="ttdh" id="" >
                            <?php
                            $i=0;
                                $option=array("Đơn hàng mới","Đang xử lí","Đã giao","Đã bị boom");
                                foreach($option as $op){
                                    if($i==$status){
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
                        <!-- <input type="hidden" value="<?=$id_bill?>" name="id_bill"> -->
                        <input type="submit" name="thaydoi" value="Thay đổi">
                        <a href="index.php?act=listbill"><input type="button" value="Danh sách"></a>
                    </div>
                </form>
            </div>
