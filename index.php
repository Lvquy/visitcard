
<?php
    require('includes/db.php');
    session_start();
    include('includes/php.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include('includes/head.html');?>
<title>SmartCard | Home</title>
</head>

<body>

  <!-- ***** Preloader Start ***** -->
<?php include('includes/preloader.html');?>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php include('includes/menu.html');?>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12 col-sm-12 ">
                    <div class="info-stat ">
                      <h5>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        Chia sẻ thông tin với công nghệ 4.0</h5>
                    </div>
                    <div class="info-stat ">
                      <h5>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        Không cần cài đặt
                      </h5>
                    </div>
                    <div class="info-stat ">
                      <h5>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        Chạy trên cả IOS & Android <i class="fa fa-android" aria-hidden="true"></i> <i class="fa fa-apple" aria-hidden="true"></i>
                      </h5>
                    </div>
                    <div class="info-stat">
                      <h5>
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        Không thu phí hàng tháng, mua 1 lần dùng trọn đời
                      </h5>
                    </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <h2>Thẻ cá nhân thông minh 01 chạm</h2>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/banner-right-image.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="features" class="features section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          
          <h2>BẠN CÓ THỂ CHIA SẺ NHỮNG GÌ?</h2>
          <br>
          <br>
        </div>
        <div class="col-lg-12">

          <div class="features-content">
            <div class="row">
              
              <div class="col-lg-3">
                <div class="features-item first-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                  <div class="first-number number">
                    <h6>01</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>CÁC LIÊN KẾT MẠNG XÃ HỘI</h4>
                  <div class="line-dec"></div>
                  <p>Bạn có thể chia sẻ các liên kết như Facebook, Zalo, Instagram, G+, Youtube, Tiktok, Twiter,... Hay bất cứ liên kết nào bạn muốn</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item second-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                  <div class="second-number number">
                    <h6>02</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>GỌI ĐIỆN & LƯU DANH BẠ</h4>
                  <div class="line-dec"></div>
                  <p>Bạn bè có thể gọi cho bạn nhanh hơn chỉ cần bấm và gọi, hoặc LƯU DANH BẠ chỉ với 1 chạm mà không cần làm gì thêm.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item three-feature wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                  <div class="third-number number">
                    <h6>03</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>LIÊN KẾT BÁN HÀNG, SHOPEE...</h4>
                  <div class="line-dec"></div>
                  <p>Lưu các liên kết sản phẩm của bạn như Shopee, Tiki, Sendo, Lazada,... giúp bạn giới thiệu sản phẩm nhanh hơn, chuyên nghiệp hơn.</p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="features-item four-feature last-features-item wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                  <div class="fourth-number number">
                    <h6>04</h6>
                  </div>
                  <div class="icon"></div>
                  <h4>SỐ TÀI KHOẢN, VÍ ĐIỆN TỬ</h4>
                  <div class="line-dec"></div>
                  <p>Lưu các ví điện tử cũng như tài khoản ngân hàng tích hợp tính năng sao chép nhanh, giảm thiểu sai sót khi chuyển khoản.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image wow fadeInLeft text-center" data-wow-duration="1s" data-wow-delay="0.5s">
            <img class="img-gif"src="static/images/card.gif" height="auto" width="200px" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="section-heading">
            <h2>CÁCH <em>HOẠT ĐỘNG</em> CỦA THẺ THÔNG MINH <span>01 CHẠM</span></h2>
          </div>
          <p>Thẻ được sử dụng công nghệ CẢM ỨNG TỪ TRƯỜNG. Chỉ cần CHẠM thẻ vào gần Smartphone là máy tự động nhận thẻ và hiển thị các thông tin của bạn lưu trên thẻ lên máy người chạm thẻ mà không cần cài thêm bất kỳ ứng dụng nào. Trong trường hợp máy không hỗ trợ cảm ứng từ trường thì bạn có thể dùng mã QR Code được in trên thẻ cũng có thể sử dụng bình thường.</p>
          
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-6 align-self-center wow fadeInRight mb-5" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="section-heading">
            <h2>TÍNH NĂNG <em>ƯU VIỆT</em> KHI SỬ DỤNG THẺ VISITCARD THÔNG MINH</h2>
          </div>
          <p>Chạm thẻ là có thông tin, nhanh chóng tiện lợi & chuyên nghiệp với công nghệ 4.0 sẽ giúp bạn "UY TÍN" hơn trong mắt bạn bè và đối tác.</p>
          <ul >

            <li><i class="bi bi-check2-circle features"></i> Không thu phí hàng tháng, mua 1 lần dùng mãi mãi</li>
            <li><i class="bi bi-check2-circle features"></i> Thoải mái đổi thông tin không giới hạn, nếu sử dụng thẻ visitcard truyền thống thì bạn phải đi in lại mỗi lần thay đổi thông tin</li>
            <li><i class="bi bi-check2-circle features"></i> Không giới hạn số lần chạm thẻ, thẻ có tuổi thọ trung bình từ 5-10 năm</li>
            <li><i class="bi bi-check2-circle features"></i> Không cần cài đặt phần mềm gì thêm</li>
            <li><i class="bi bi-check2-circle features"></i> Lưu các liên kết mạng xã hội, kỹ năng của bạn muốn giới thiệu tới đối tác, bạn bè, tài khoản ví điện tử, liên kết giới thiệu sản phẩm, công ty...</li>
            <li><i class="bi bi-bar-chart-line features"></i> Thống kê số lần Chạm/ Quét thẻ cũng như số lần ai đó bấm vào liên kết của bạn</li>
            <li><i class="bi bi-check2-circle features"></i> Hỗ trợ tất cả các dòng smartphone chạy IOS, Android</li>
            <li><i class="bi bi-shield-check features"></i> <em>An toàn</em>, không yêu cầu quyền truy cập và mật khẩu từ các tài khoản mạng xã hội cũng như tài khoản ngân hàng.</li>
          </ul>
          <!-- <div class="main-green-button"><a href="#">Discover company</a></div> -->
        </div>
        <div class="col-lg-6 mt-2">
          <div class="left-image wow fadeInLeft text-center" data-wow-duration="1s" data-wow-delay="0.5s">
            <img class=""src="static/images/social.gif" height="auto" width="2rem" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
<div id="shop" class="about-us section">
  <div class="container">
      <div class="row">
        <div class="col-12 mb-3">
          <h2>ĐẶT MUA THẺ</h2>
        </div>
        <div class="col-12 col-lg-6 text-center">
          <img class="card-shop" src="static/images/card.png" alt="hình minh họa" >
          <p class="cus-name">Tên của bạn...</p>
        </div>
        <div class="col-12 col-lg-6 mt-1">
          <h3>Loại thẻ: 
            <button class="btn btn-success">Loại 1</button>
            <button class="btn btn-success">Loại 2</button>
            <button class="btn btn-success">Loại 3</button>
            <button class="btn btn-success">Nhờ thiết kế theo yêu cầu</button>
          </h3>
          <h3>Tên của bạn <span>(30 kí tự)</span> <input class="form-control" onkeyup="change_cusname(this.value)" type="text"></h3>
          <h3 class="mt-1">150.000đ <del>199.000đ</del><span>(Free ship toàn quốc)</span></h3>
          <h3><button class="btn btn-success">Đặt mua</button></h3>
        </div>
      </div>
  </div>
</div>
</body>
<script>
  function change_cusname(name){
    $(".cus-name").html(name)
  }
</script>

  <div id="hoidap" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 offset-lg-12">
          <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h6>HỎI ĐÁP MỘT SỐ THẮC MẮC</h6>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faq-1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="false" aria-controls="collapseTwo">
                  #1 Dùng thẻ này tôi có bị hack tài khoản ngân hàng, Facebook, Zalo...không?
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse" aria-labelledby="faq-1" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Trả lời: Tất nhiên là không rồi, An toàn tuyệt đối nhé bạn, chúng tôi chỉ sử dụng các liên kết đến tài khoản Facebook, Zalo, số Tài khoản ngân hàng của bạn chứ không yêu cầu mật khẩu hay quyền truy cập gì từ ứng dụng.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="collapseTwo">
                  #2 Tôi có thể thêm/bớt, sửa/xóa thông tin theo ý muốn?
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq-2" >
                <div class="accordion-body">
                  Trả lời: Được chứ, bạn có thể thêm/ sửa/ xóa bất cứ khi nào bạn muốn, với vô vàn mạng xã hộị của bạn mà không bị giới hạn.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq-3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="collapseThree">
                  #3 Khi bị đánh rơi thẻ, người khác có thể sửa thông tin của tôi không?
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq-3" >
                <div class="accordion-body">
                  Trả lời:  KHÔNG bạn nhé. Thẻ được bảo mật bởi tên đăng nhập và mật khẩu chỉ có bạn mới biết và truy cập được thôi. Kể cả người quản trị website chúng tôi cũng không thể biết mật khẩu của bạn, mật khẩu đã được mã hóa theo chuẩn trước khi lưu vào hệ thống.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="faq-4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="collapseThree">
                  #4 Dữ liệu của tôi có bị đánh cắp/ bán thông tin cho bên thứ 3 không?
                </button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faq-4" >
                <div class="accordion-body">
                  Trả lời: Tuyệt đối không bạn nhé! Chúng tôi cam kết dữ liệu thông tin của khách hàng được bảo mật tuyệt đối, và không tiết lộ bất cứ thông tin gì cho bên thứ 3 trong mọi trường hợp, trừ khi bạn muốn chia sẻ thông tin của bạn thì sẽ cho người đó chạm / quét thẻ của bạn.
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  

  

<!--   footer start -->
<?php include('includes/footer.html'); ?>
<!--   footer end -->

<?php include('includes/script.html');?>

</body>
</html>