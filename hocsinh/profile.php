  <?php require_once __DIR__. '/autoload/autoload.php';
    $giaovien = $db->fetchsql("SELECT * FROM giaovien");

    ?>
     <?php foreach ($giaovien as $item): ?>
  <div class="card">
        <img src="<?php echo uploads() ?>product/<?php echo $item['thundar'] ?>" alt="">
      <div class="card-body">
          <h2 class="name"><?php echo $item['name'] ?></h2>
          <h4 class="job-title">Giáo viên lớp đai đen</h4>
          <div class="bio"><?php echo $item['comment'] ?></div>
          <div class="social-accounts">
            <a href="#"><img src="https://res.cloudinary.com/dj14cmwoz/image/upload/v1491077480/profile-card/images/dribbble.svg" alt=""><span class="sr-only">Dribbble</span></a>
            <a href="#"><img src="https://res.cloudinary.com/dj14cmwoz/image/upload/v1491077480/profile-card/images/twitter.svg" alt=""><span class="sr-only">Twitter</span></a>
            <a href="#"><img src="https://res.cloudinary.com/dj14cmwoz/image/upload/v1491077480/profile-card/images/instagram.svg" alt=""><span class="sr-only">Instagram</span></a>
          </div>
      </div>

      <div class="card-footer">
          <div class="stats">
              <div class="stat">
                <span class="label">Email</span>
                <span class="value"><?php echo $item['email'] ?></span>
              </div>
              <div class="stat">
                <span class="label">Address</span>
                <span class="value"><?php echo $item['address'] ?></span>
              </div>
              <div class="stat">
                <span class="label">Phone</span>
                <span class="value"><?php echo $item['phone'] ?></span>
              </div>
          </div>
      </div>
  </div>
<?php endforeach ?>
<style>
  @import url(https://fonts.googleapis.com/css?family=Exo+2:300,400,700);
body{
  padding:0;
  margin:0;
  font-size:14px;
  font-family: "Exo 2", sans-serif;
  color: #333;
}

.card{
  position: relative;
  width: 100%; /* Remove for full width */
  height: 60%; /* Remove for full width */
  margin:0px auto;
  box-shadow: 0 0 100px rgba(0,0,0, .3);
  display: flex;
}
img{
    width: 50%;
    height: 80%;
    border-radius: 50%;
    margin-left: 50px;
    margin-top: 30px;
}
.sr-only{
  position: absolute;
  width: 1px;
  height: 1px;
  clip: rect(0,0,0,0);
  border: none;
  overflow: hidden;
}
.btn-message{
  display: inline-block;
  width: 19.37px;
  height: 16.99px;
  margin-right:10px;
  margin-top:10px;
  float: right;
}
.btn-menu{
  display: inline-block;
  background: url(https://res.cloudinary.com/dj14cmwoz/image/upload/v1491077483/profile-card/images/menu.svg) no-repeat;
  width: 19px;
  height: 12.16px;
  margin-left:10px;
  margin-top:10px;
  float: left;
}

svg .polygon{
  fill: #fff;
}
.card-header-slanted-edge{
  position: absolute;
  bottom: -3px;
  z-index: 1;
  width: 100%;
  right:0;
  left:0;
}

.btn-follow{
  position: absolute;
  top: -15px;
  right: 25px;
  width: 45px;
  height: 45px;
  background: linear-gradient(to left, #2D77C1, #68FAC2);
  border-radius:100%;
  box-shadow: 0 10px 15px rgba(110,221,235, .53);
}

.btn-follow:after{
  content: '';
  position:absolute;
  width:17px;
  height: 17px;
  left: 50%;
  top:50%;
  transform: translate(-50%, -50%);
}

.card-body{
  text-align:center;
  padding-left: 10px;
  width: 50%;
}

.name{
  font-size: 20px;
  font-weight: 700;
  text-transform: uppercase;
  margin: 0 auto;
  margin-top: 100px  ;
}

.job-title{
  font-size: 14px;
  font-weight: 300;
  margin-top: 5px;
  color: #919191;
}

.bio{
  font-size: 14px;
  color: #7B7B7B;
  font-weight: 300;
  margin: 10px auto;
  line-height: 20px;
}

.social-accounts{
    display: flex;
    place-content: center;
}
.social-accounts img{
  width: 15px;
  margin-left: 0;
  margin-top: 0;

}

.social-accounts a{
  margin-left: 10px;
}
.social-accounts a:first-child{
  margin-left: 0;
}

.card-footer{
  /*position:fixed; /* Full card width/height */
 /* Fixed card width/height */

  left: 0;
  width: 50%;
  bottom: 20px;
}
.stat{
  box-sizing: border-box;
  text-align: center;
  border-left: 1px solid #EBEBEB;
  margin-top: 10px;
}
.stat .label{
  display: block;
  text-transform: uppercase;
  font-weight: 900;
  font-size: 15px;
  letter-spacing: 1px;
  color: #000;
}

.stat .value{
  display: block;
  font-weight: 700;
  font-size:20px;
  margin-top: 5px;
  color: lightgray;
}
.stats{
    display: grid;
    margin-top: 87px;
}
</style>