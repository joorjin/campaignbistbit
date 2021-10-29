@extends('layouts.mastert')
@section('title')
    صفحه اصلی
@endsection


@section('head')

<style>


    .para1{
        animation: para1 5.2s ease-out forwards;
    }
    @keyframes para1{
        90%{opacity: 1;}
        95%{opacity: 0;}
        100%{transform: rotate(3600deg);opacity: 1;}
    }

    #show-award{
    position: relative;
    right: -51px;
    top: 0;
    font-size: 30px;
    width: 300px;
    text-align: center;
    color: #fcdd39;
    margin: 0 auto;
}

.modal {
    position: fixed;
    top: 25%;
    right: 10%;
    bottom: 0;
    width: 80%;
    left: 0;
    z-index: 1050;
    overflow: hidden;
    outline: 0;
    display: none;
    display: none;
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  margin-top: -50px;
  text-align: center;
}

.register input[type=tel]{
    width: 100%;
    text-align: center;
    border: 1px solid #00bf16;
}
.register input[type=password]{
    margin-top: 10px;
    width: 100%;
    text-align: center;
    border: 1px solid #00bf16;
}
.register button{
    width: 100px;
    position: relative;
    margin-top: 20px;
}
/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
@endsection





@section('content')

@isset($invitation_code)
    @include('part2')
@endisset


    @include('part3')

    <div class="part4">
      <a href="link?link=Twitter.com/bistbit"><img class="img1" src="img/c1.png"></a>
      <a href="link?link=Twitter.com/bistbit&b=2"><img class="img2" src="img/c2.png?ver=2" alt=""></a>
      <a href="link?link=Instagram.com/bistbit"><img class="img3" src="img/c3.png?ver=2" alt=""></a>
      <img class="img4" src="img/c4.png?ver=2" onclick="copyToClipboard('#matna4')" alt="">
      <a href="link?link=bistbit.com"><img class="img5" src="img/c5.png?ver=2" alt=""></a>
    </div>

    <div class="part5">
      <div class="logo"><img src="img/logo.svg" alt=""></div>
      <div class="text">
        <p>مجموعه‌ای از افراد فعال در زمینه ارزهای دیجیتال هستیم که با توجه به کمبودها، نارسایی‌ها و مشکلات مختلف برآن شدیم تا با ایجاد یک صرافی مطمئن خدمات دقیق، امن، سریع و راحت و با حداقل کارمزد را در اختیار مشتریان و علاقه‌مندان این حوزه قرار دهیم.
          ما در «بیست‌بیت» همه تلاش خود را بر پشتیبانی لحظه‌ای و دقیق معطوف کرده‌ایم و بر اصل مهم ارائه خدمات با کیفیت و پشتیبانی دقیق اصرار داریم.
          ما تلاش می‌کنیم که همواره رضایت مشتریان را از لحظه ورود به پلتفرم‌های موجودمان کسب کرده و جای خالی یک صرافی مطمئن و بدون انگیزه‌های سودآورانه کاذب را پر کنیم.</p>
      </div>
    </div>

    <div class="part6">

    </div>

    <div class="part7">
        <p>توجه داشته باشید برای دریافت جوایز خود ، حتما میبایست در صرافی بیست بیت ثبت نام و احراز هویت  نمایید.</p>
        <br>
    </div>

    <div class="part8">
        <p>تمامی حقوق برای صرافی بیست بیت محفوظ است. <i class="fa fa-copyright"></i></p>
    </div>



    <script>
        // copy
        function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        alert('لینک دعوت کپی شد ');
        }


        $(document).ready(function () {

                $(".Caracter").animate({marginTop:'-20%'},2000);
                $(".Caracter").animate({marginTop:'-20%'},2000);
                $("header .text").animate({marginTop:'-44%'},2000);
                $(".CloudD").animate({marginTop:'-10%'},2);
                $(".CloudDa").animate({left:'90%'},2);

                if (window.matchMedia('(max-width: 767px)').matches) {
                    for (let index = 0; index < 100; index++) {

                        $(".star1").animate({width:'0'},2500);
                        $(".star1").animate({width:'10px'},2500);

                        $(".star2").animate({width:'0'},1500);
                        $(".star2").animate({width:'10px'},2500);
                    }
                } else {
                    for (let index = 0; index < 100; index++) {

                        $(".star1").animate({width:'0'},3500);
                        $(".star1").animate({width:'25px'},2500);

                        $(".star2").animate({width:'0'},1500);
                        $(".star2").animate({width:'25px'},2500);
                    }
                }



            });
    </script>



     <script>


        const spin = (num_case_params,name_awrads) =>{


           num_case = num_case_params
           num_spin = num_case
           name_awrads_par = name_awrads
   //        console.log(num_spin + " - " + num_spin*30)

           $('.spin>img').addClass('para1');

       }

       const para2 = () =>{
           $('.spin>img').fadeOut(200)
           $('.spin>img').removeAttr('class')
           $('.spin>img').css('transform', 'rotate('+((num_spin*45)-20)+'deg)')
            $('.spin>img').fadeIn(500)

           switch(num_case){
               case num_spin: $('#show-award').text(' شما برنده '+name_awrads_par+' شدید. '); break;
           }
           $('.spin>img').fadeIn(500)
           $('.spin>img').addClass('spinImg');
       }


       function searchAward(params) {
           window.location.href= '/checkLicense';
       }
   </script>

   @isset($awrads)
   <?php
   foreach ($awrads as $item) {
       if ($item->type == 'physical') {
           if ($item->name == 'ledger nano S') {
               $number = 8;
           }
           if ($item->name == 'mi band 5') {
               $number = 4;
           }
       }
       elseif ($item->type == 'sat') {
           $number = rand(1,3);
           if ($number == 1) {
               $number = 1;
           }
           if ($number == 2) {
               $number = 5;
           }
           if ($number == 3) {
               $number = 7;
           }
       }
       elseif ($item->type == 'discount') {
           $number = rand(1,2);
           if ($number == 1) {
               $number = 2;
           }
           if ($number == 2) {
               $number = 6;
           }
       }
       elseif ($item->type == 'cash') {
           $number = 3;
       }

    //    session('awrads');
    
   echo '<script type="text/javascript">',
   'spin('.$number.',"'.$item->name.'");',
   'setTimeout(para2, 5000);',
   '</script>'
   ;
   }

   ?>
   @endisset

   @isset($_GET['login'])
       <?php $login=$_GET['login']; ?>
   @endisset
   @if (!$login)
   <script>
               // Get the modal
               var modal = document.getElementById("myModal");

               // Get the button that opens the modal
               var btn = document.getElementById("nologin");

               var becharck = document.getElementById("becharck");

               // Get the <span> element that closes the modal
               var span = document.getElementsByClassName("close")[0];



               // When the user clicks the button, open the modal

               btn.onclick = function() {
               modal.style.display = "block";
               }

               becharck.onclick = function() {
               modal.style.display = "block";
               }

               // falseWhen the user clicks on <span> (x), close the modal
               span.onclick = function() {
               modal.style.display = "none";
               }

               // When the user clicks anywhere outside of the modal, close it
               window.onclick = function(event) {
               if (event.target == modal) {
                   modal.style.display = "none";
               }
           }
   </script>




   @endif



   @error('phone')
   <script>
       alert("{{ $message }}");
   </script>
   @enderror

   @error('pass')
   <script>
       alert("{{ $message }}");
   </script>
   @enderror

   @isset($_GET['pass'])
           <script>
               alert('پسورد را اشتباه وارد کردید!');
               window.location.href = "/";
           </script>
   @endisset

   @isset($_GET['spin_permission'])
           <script>
               alert('هر هفته یک بار اجازه شرکت در چالش را دارید . می توانید با دعوت هر نفر یک بار دیگر شرکت کنید');
               window.location.href = "/";
           </script>
   @endisset



   @isset($_GET['offLink'])
           <script>
               alert('یک بار می توانید از این ویژگی استفاده کنید');
               window.location.href = "/";
           </script>
   @endisset

   @isset($_GET['register'])
           <script>
               alert('حساب شما با موفقیت ساخته شد.');
               window.location.href = "/";
           </script>
   @endisset

   @isset($_GET['login'])
       <script>
           alert('با موفقیت وارد حساب کاربری خود شدید');
           window.location.href = "/";
       </script>
   @endisset


   @endsection
