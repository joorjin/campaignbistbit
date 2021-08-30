@extends('layouts.mastert')
@section('title')
    ثبت نام
@endsection

@section('style')
<style>
	.login-box{
		margin: 0 auto;
		text-align: center
	}
	.form{
		width: 100%;
		height: 300px;
	}
	.form input{
		text-align: center;
	}
</style>
@endsection

@section('content')


	<!-- Page info section -->
	<section class="page-info-section">
		<div class="container">
			<h2>ثبت نام در کمپین</h2>
			<div class="site-beradcamb">
				<a href="">صفحه نخست</a>
				<span><i class="fa fa-angle-right"></i>ثبت نام در کمپین</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->

	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 login-box">
					<h2>ثبت نام در کمپین</h2>
					<br>
						<form class="form">
							<div class="form-group row">
								<div class="col-sm-12">
								  <input type="email" class="form-control" id="inputPassword" placeholder="ایمیل">
								</div>
							  </div>
							<div class="form-group row">
								<div class="col-sm-12">
								  <input type="password" class="form-control" id="inputPassword" placeholder="رمز عبور">
								</div>
							  </div>
							  <button type="submit" class="btn btn-primary mb-2 col-sm-12">ورود</button>
							  <br>
							  <a href="#" class="text-secondary">رمز عبور خود را فراموش کردید؟</a>
							  <hr>
							  <a href="register" class="text-info">حساب کاربری ندارید؟</a>
						</form>
				</div>
				{{-- <div class="about-img">
				<img src="img/about-img.png" alt="">
			</div> --}}
			</div>
			
		</div>
	</section>
	<!-- About section end -->
