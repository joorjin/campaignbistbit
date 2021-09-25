<div class="part3">

    <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>

  <p>ابتدا شماره خود را وارد کنید.</p>
  <form action="add_phone" method="post" class="register">
      @csrf
      <input type="tel" pattern="[0-9]{11}" name="phone" placeholder="شماره شما">
      <input type="password" name="pass" id="pass" placeholder="یک پسورد برای خود انتخاب کنید" minlength="8">
      <button class="btn btn-success"> بزن بریم! </button>
  </form>

</div>

</div>


    <div class="spin-loc">
        <div class="startbox">
            <i class="fas fa-star"></i>
            <br>
            <button id="becharck">  بچرخانید</button>
          </div>
      <div class="Triangle"></div>
 <!-- Hero section -->
 <section class="spin-section">
    <div class="row">
      <div class="col-md-0 col-lg-1"></div>
      <div class="col-md-12 col-lg-11 hero-text">
        <!-- <h2>با تولید سادگی نامفهوم از صنعت چاپ <span>بیت‌کوین</span> <br>با تولید سادگی نامفهوم از صنعت چاپ</h2> -->
        <figure class="spin">
            <!-- {{-- <div onclick="spin()" style="width: 10px; height: 10px;background: #4989;"></div> --}} -->
            <div id="spin-location"></div>
            <img onclick="searchAward()" id="nologin" src="img/WheelOfFortune.png" class="spinImg" alt="">
        </figure>
        <p id="show-award"></p>
      </div>
    </div>
  </section>

<!-- Hero section end -->
    </div>
    <div class="text">
        <h2>گردونه شانس!</h2>
        <b>نکته:</b>
        <p>توجه داشته باشید که شما در
            <br> هر هفته تا پایان کمپین فرصت
            <br>گرداندن چرخونه برای در یافت
            <br> جوایز بیشتر خواهید داشت.
            <br><br>با دعوت از دوستانتان میتوانید
            <br>تعداد دفعات بیشتری اقدام  به
            <br>گراندن چرخونه نمایید
        </p>
    </div>
</div>

