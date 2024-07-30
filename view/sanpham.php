            <div class="row mb totle ">
                <div class="boxtrai mr demo">
                <div class="row">
                <h2> <?php if(isset($dm)){ echo "Sản phẩm ".$dm['ten_loai'];} ?></h2>
                        <?php
                            foreach($dssp as $sp){
                                extract($sp);
                                $i=0;
                                $image=$img_path.$hinh;
                                $linkchitiet="index.php?act=chitietsp&ma_hh=".$ma_hh."&ma_loai=".$ma_loai; 
                                if($i==2||$i==5||$i==8){
                                    $mr="";
                                }else{
                                    $mr="mr";
                                }
                                $i++;                  
                        ?>
                       
                        <div class="boxsp <?php echo $mr?>">
                            <div class=" row img"> <img src="<?php echo $image ?>" alt></div>
                            <p><?php echo $don_gia ?></p>
                            <a href="<?php echo $linkchitiet ?>"><?php echo $ten_hh ?> </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="boxphai">
                    <?php include "./view/boxright.php"; ?>
                </div>

            </div>