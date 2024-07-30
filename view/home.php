<div class="row mb totle ">
                <div class="boxtrai mr demo">
                    <div class="row">
                        <div class="banner n1">
                           <!-- Slideshow container -->
                            <div class="slideshow-container">

                                <!-- Full-width images with number and caption text -->
                                <div class="mySlides fade">
                                  <div class="numbertext">1 / 3</div>
                                  <img src="img/1.jpg" style="width:100%">
                                  <div class="text">San</div>
                                </div>

                                <div class="mySlides fade">
                                  <div class="numbertext">2 / 3</div>
                                  <img src="img/2.jpg" style="width:100%">
                                  <div class="text">Caption Two</div>
                                </div>

                                <div class="mySlides fade">
                                  <div class="numbertext">3 / 3</div>
                                  <img src="img/3.jpg" style="width:100%">
                                  <div class="text">Caption Three</div>
                                </div>

                                <!-- Next and previous buttons -->
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                            <br>

                            <!-- The dots/circles -->
                            <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            foreach($listsp as $sp){
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
                            
                                    <form action="index.php?act=addcart" method="post">
                                        <input type="hidden" name="tensp" value="<?=$ten_hh?>" >
                                        <input type="hidden" name="giasp" value="<?=$don_gia?>" >
                                        <input type="hidden" name="ma_hh" value="<?=$ma_hh?>" >
                                        <input type="hidden" name="image" value="<?=$hinh?>" >
                                        <input type="submit" name="submit" value="Thêm vào giỏ hàng">
                                    </form>

                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="boxphai">
                    <?php include "boxright.php"; ?>
                </div>

            </div>