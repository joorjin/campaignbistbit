@extends('layouts.mastert')
@section('title')
    صفحه اصلی
@endsection

@section('style')
<style>
    .spin-section{
        width: 100%;
    }
    .spin{
        width: 40%;
        margin: 80px auto;
/*            border: 1px solid red;*/
        position: relative;
    }
    .spin::before{
        content: '';
        display: block;
        width: 50px;height: 50px;
        background: #8e3333;
        clip-path:polygon(0 0, 100% 0, 50% 100%);
        position: absolute;
        top: -50px;
        left: calc(50% - 25px);
    }
    .spin>img{
        display: block;
        width: 100%;
        cursor: pointer;
        transition-property: transform !important;
        transition-duration: 2s !important;
        transition-timing-function: linear !important;
    }
    .spin>img:active{
        transform: scale(.9)
    }
    .spin-section h2{
        position: relative;
        margin: 0 auto;
        width: 301px;
        font-size: 30px;
    }
    .spin-section p{
        position: relative;
        right: 10px;
        top: 0;
        font-size: 30px;
        width: 80%;
        text-align: center;
        color: #0e02e9;
        margin: 0 auto;
    }
    .para1{
        animation: para1 5.2s ease-out forwards;
    }
    @keyframes para1{
        90%{opacity: 1;}
        95%{opacity: 0;}
        100%{transform: rotate(3600deg);opacity: 1;}
    }

    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 100px;
  width: 50%; /* Full width */
  height: 50%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  margin: 0 auto;
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
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
@media screen and (max-width: 602px){
    .spin{
        width: 80%;
    }
    .logoImg{
        width: 50%;
    }
}
<<<<<<< HEAD

.register input[type=tel]{
    width: 100%;
    text-align: center;
}
.register button{
    width: 100px;
    left: calc(50% - 50px);
    position: relative;
    margin-top: 10px;
}
=======
>>>>>>> 972c3671e87369e30025a7425372111deafa4939
</style>
@endsection




@section('content')


 <!-- Hero section -->
	<section class="hero-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 hero-text">
					<h2>سرمایه ‌گذاری روی <span>بیت‌کوین</span> <br>سرمایه گذاری در دنیایی جدید</h2>
					<h4>برای کسب جوایز شگفت انگیز گردونه شاس را امتحان کنید. </h4>
						<a class="site-btn sb-gradients" href="#spin">شانس خود را امتحان کنید!</a>
				</div>
				<div class="col-md-6">
					<img src="img/laptop.png" class="laptop-image" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<<<<<<< HEAD
    <p>لطفا شماره خود را وارد کنید.</p>
    <form action="#" method="post" class="register">
        <input type="tel" pattern="[0-9]{11}" name="" id="">
        <button class="btn btn-success"> بزن بریم! </button>
    </form>
=======
    <p>Some text in the Modal..</p>
    <input type="text">
>>>>>>> 972c3671e87369e30025a7425372111deafa4939
  </div>

</div>

     <!-- Hero section -->
	<section class="spin-section">
			<div class="row"> 
                <div class="col-md-0 col-lg-1"></div>
				<div class="col-md-12 col-lg-11 hero-text">
                    <h2>با تولید سادگی نامفهوم از صنعت چاپ <span>بیت‌کوین</span> <br>با تولید سادگی نامفهوم از صنعت چاپ</h2>
                    <figure class="spin" id="spin" onclick="setTimeout(para2, 5000);">
                        {{-- <div onclick="spin()" style="width: 10px; height: 10px;background: #4989;"></div> --}}
<<<<<<< HEAD
                        <img onclick="spin()" id="nologin" src="img/WheelOfFortune.png" alt="">
=======
                        <img onclick="spin()" id="nologinn" src="img/WheelOfFortune.png" alt="">
>>>>>>> 972c3671e87369e30025a7425372111deafa4939
                    </figure>
                    <p id="show-award"></p>
				</div>
			</div>
		
	</section>
	<!-- Hero section end -->
    @section('script')  
        <script>
<<<<<<< HEAD
    let num_spin
    let num_case
     const spin = () =>{
        num_case = 6
         num_spin = num_case
//        console.log(num_spin + " - " + num_spin*30)

        $('.spin>img').addClass('para1');

    }
    
    const para2 = () =>{
        $('.spin>img').fadeOut(200)
        $('.spin>img').removeAttr('class')
        $('.spin>img').css('transform', 'rotate('+((num_spin*45)-20)+'deg)')
         $('.spin>img').fadeIn(500)
        
        switch(num_case){
            case 8: $('p').text('your gift is pen'); break;
            case 7: $('p').text('your gift is power bank'); break;
            case 6: $('p').text('your gift is pen'); break;
            case 5: $('p').text('your gift is pen drive'); break;
            case 4: $('p').text('your gift is card holder'); break;
            case 3: $('p').text('your gift is pen'); break;
            case 2: $('p').text('your gift is pen driver'); break;
            case 1: $('p').text('your gift is pen'); break;
        }
        
        
    }
            

            // // Get the modal
            // var modal = document.getElementById("myModal");

            // // Get the button that opens the modal
            // var btn = document.getElementById("nologin");

            // // Get the <span> element that closes the modal
            // var span = document.getElementsByClassName("close")[0];

            // // When the user clicks the button, open the modal 
            // btn.onclick = function() {
            // modal.style.display = "block";
            // }

            // // When the user clicks on <span> (x), close the modal
            // span.onclick = function() {
            // modal.style.display = "none";
            // }

            // // When the user clicks anywhere outside of the modal, close it
            // window.onclick = function(event) {
            // if (event.target == modal) {
            //     modal.style.display = "none";
            // }
            // }
=======
            let num_spin
            let num_case
            const spin = () =>{
                // num_case = Math.floor((Math.random()*12)+1)
                num_case = 12;
                num_spin = num_case
        //        console.log(num_spin + " - " + num_spin*30)
        
                $('.spin>img').addClass('para1');
        
            }
            
            const para2 = () =>{
                $('.spin>img').fadeOut(200)
                $('.spin>img').removeAttr('class')
                $('.spin>img').css('transform', 'rotate('+((num_spin*30)-15)+'deg)')
                $('.spin>img').fadeIn(500)
                
                switch(num_case){
                    case 12: $('#show-award').text('شما برنده ۶ در صد کد تخفیف شدید'); break;
                    case 11: $('p').text('your gift is pen drive'); break;
                    case 10: $('p').text('your gift is voucher'); break;
                    case 9: $('p').text('your gift is card holder'); break;
                    case 8: $('p').text('your gift is pen'); break;
                    case 7: $('p').text('your gift is power bank'); break;
                    case 6: $('p').text('your gift is pen'); break;
                    case 5: $('p').text('your gift is pen drive'); break;
                    case 4: $('p').text('your gift is card holder'); break;
                    case 3: $('p').text('your gift is pen'); break;
                    case 2: $('p').text('your gift is pen driver'); break;
                    case 1: $('p').text('your gift is pen'); break;
                }
                
                
            }
            

            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("nologin");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
            modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            }
>>>>>>> 972c3671e87369e30025a7425372111deafa4939
        </script>
    @endsection
	@endsection