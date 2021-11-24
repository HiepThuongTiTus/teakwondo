<div class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div>
                <div class="hotline-phone-ring-img-circle">
                    <a href="tel:0123456789" class="pps-btn-img">
                    <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
                    </a>
                </div>
            </div>
            <div class="hotline-bar">
                <a href="tel:0123456789">
                <!-- <span class="text-hotline">012.345.6789</span> -->
                </a>
            </div>
        </div>
        <section class="news-letter padding-top-150 padding-bottom-1500" id="dangki" >
      <div class="container">
        <div class="heading light-head text-center margin-bottom-30">
          <h4 style="text-align: center;">Đăng ký</h4>
          <div style="border-bottom: 1px solid white;"></div>
          <span style="margin-top: 10px">Đăng kí với chúng tôi nếu bạn có nhu cầu học</span> </div>
        <form method="post">
          <input type="text" name="name" id="name" placeholder="Full name" style="margin-bottom: 10px  ;">
          <input type="email" placeholder="Enter your email address" name="email" id="email"><br>
          <div class="send"><input type="submit" value="send" name="btn" class="send"></div>
        </form>
      </div>
    </section>
 <!--======= FOOTER =========-->
  <footer>
    <div class="container"> 
      
      <!-- ABOUT Location -->
      <div class="col-md-3">
        <div class="about-footer"> <img class="margin-bottom-30" src="images/1.png" alt="" >
          <p><i class="icon-pointer"></i>08 Nguyễn Chánh, Đà Nẵng</p>
          <p><i class="icon-call-end"></i> 1.800.123.456789</p>
          <p><i class="icon-envelope"></i> info@ecoshop.com</p>
        </div>
      </div>
      
      <!-- HELPFUL LINKS -->
      <div class="col-md-3">
        <h6>HELPFUL LINKS</h6>
        <ul class="link">
          <li><a href="#."> Products</a></li>
          <li><a href="#."> Find a Store</a></li>
          <li><a href="#."> Features</a></li>
          <li><a href="#."> Privacy Policy</a></li>
          <li><a href="#."> Blog</a></li>
          <li><a href="#."> Press Kit </a></li>
        </ul>
      </div>
      
      <!-- SHOP -->
      <div class="col-md-3">
        <h6>SHOP</h6>
        <ul class="link">
          <li><a href="#."> About Us</a></li>
          <li><a href="#."> Career</a></li>
          <li><a href="#."> Shipping Methods</a></li>
          <li><a href="#."> Contact</a></li>
          <li><a href="#."> Support</a></li>
          <li><a href="#."> Retailer</a></li>
        </ul>
      </div>
      
      <!-- MY ACCOUNT -->
      <div class="col-md-3" style="color: white;">
       TAEKWONDO
      </div>
      
      <!-- Rights -->
      
      <div class="rights">
        <p>©  2016 ecoshop All right reserved. </p>
       
      </div>
    </div>
  </footer>
  
  <!--======= RIGHTS =========--> 
  
</div>
<script src="<?php echo base_url() ?>layouts/js/jquery-1.11.3.min.js"></script> 
<script src="<?php echo base_url() ?>layouts/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url() ?>layouts/js/own-menu.js"></script> 
<script src="<?php echo base_url() ?>layouts/js/jquery.lighter.js"></script> 
<script src="<?php echo base_url() ?>layouts/js/owl.carousel.min.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="<?php echo base_url() ?>layouts/rs-plugin/js/jquery.tp.t.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>layouts/rs-plugin/js/jquery.tp.min.js"></script> 
<script src="<?php echo base_url() ?>layouts/js/main.js"></script> 
<script src="<?php echo base_url() ?>layouts/js/main.js"></script>
</body>
</html>
<script>
     $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e) {
            e.preventDefault();
            $qty = $(this).parents("tr").find("#qty").val();

            $key = $(this).attr("data-key");

            
            $.ajax({
                url: 'update.php',
                type: 'GET',
                data: {'qty': $qty, 'key':$key},
                success:function(data)
                {
                  console.log(data)
                    if (data >= 1) 
                    {
                       
                        location.href='giohang.php';
                    }
                    else
                    {
                        alert('Xin lỗi! Số lượng bạn mua vượt quá số lượng hàng có trong kho!');
                        location.href='giohang.php';
                    }
                }
            });
            
        })
    })  
    
</script>
