<head>
    <style>
    .listsp {
        border-collapse: collapse;
        width: 100%;
    }

    .listsp td img {
        width: 50px;
        object-fit: cover;
    }

    .listsp tr:nth-last-of-type(1) {
        height: 20px;
    }
    </style>
</head>
<div class="row mb totle ">
    <div class="boxtrai mr demo">
        <div class="row">
            <div class="frmtitle">
                <h1>Giỏ hàng của tôi</h1>
            </div>
            <div class="frmcontent">
                <?php viewcart(1); ?>
                <div class="delete-cart">
                    <a href="index.php?act=index.php&act=bill"><button type="button">Đặt hàng</button></a>
                    <a href="index.php?act=xoacart"><button type="button">Xoá tất cả</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include "./view/boxright.php"; ?>
    </div>
</div>