<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            width: 100%;
            margin: 0 auto;
            
        }
        .sp{
            width: 100%;
            border: 1px solid gray;
        }
        .image{
            width: 40%;
            margin: 10px auto;
        }
        .image>img{
            width: 100%;
            object-fit: cover;
        }
        .container ul{
            list-style: circle;
            margin-left: 40px;
        }
        .content{
            margin: 20px;
        }
        .commodity{
            margin-top: 20px;
            border: 1px solid gray;
        }
        .commodity ul li{
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sp">
            <?php 
                extract($spct);
                $img_spct=$img_path.$hinh;
                echo    '<div class="image">
                            <img src="'.$img_spct.'" alt="">
                        </div>
                        <ul>
                            <li>Mã HH: '.$ma_hh.'</li>
                            <li>Tên HH: '.$ten_hh.'</li>
                            <li>Đơn giá : '.$don_gia.'</li>
                            <li>Giảm giá: '.$giam_gia.'</li>
                        </ul>'
             ?>
            
            <div class="content">
                <?php echo $mo_ta?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$ma_hh?>});
            });
        </script>
        <div id="binhluan">
            
        </div>
        <div class="commodity">
            <div class="detail-title">
                <h1>Hàng cùng loại</h1>
            </div>
            <div class="commodity-same">

                <ul>
                <?php
                    foreach($spcungloai as $spcl){
                        extract($spcl);

                        echo "<li><a href='index.php?act=chitietsp&ma_hh=$ma_hh&ma_loai=$ma_loai'>$ten_hh</a></li>";
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</body>
</html>