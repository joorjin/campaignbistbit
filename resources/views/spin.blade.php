<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;    
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            background-image: linear-gradient(14deg, red, yellow, orange);
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
        p{
            position: absolute;
            right: 10px;
            top: 40%;
            font-size: 30px;
            width: 25%;
            text-align: center;
            color: #6d2e00;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            text-transform: capitalize;
            text-shadow: 1px 1px 5px #653914;
            letter-spacing: 5px;
        }
        .para1{
            animation: para1 5.2s ease-out forwards;
        }
        @keyframes para1{
            90%{opacity: 1;}
            95%{opacity: 0;}
            100%{transform: rotate(3600deg);opacity: 1;}
        }
    </style>
</head>
<body>
    <figure class="spin" onclick="setTimeout(para2, 5000);">
        <img onclick="spin()" src="img/WheelOfFortune.png" alt="">
    </figure>
    <p></p>
</body>

<script>
    let num_spin
    let num_case
     const spin = () =>{
        num_case = Math.floor((Math.random()*12)+1)
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
            case 12: $('p').text('your gift is card holder'); break;
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
    
</script>



















</html>