<?php 

$db = mysqli_connect('localhost:3306', 'root', 'bestofluck', 'envault');

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$name = "";
$email = "";
$msg = "";

if (isset($_POST['send'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['nm']);
    $email = mysqli_real_escape_string($db, $_POST['em']);
    $msg = mysqli_real_escape_string($db, $_POST['ms']);

    if (empty($name)) { echo "Name is required"; }
    if (empty($email)) { echo "Email is required"; }
    if (empty($msg)) { echo "Query is required"; }

    $query = "INSERT INTO query (name, email, message) VALUES('$name', '$email', '$msg')";
    mysqli_query($db, $query);

    } 
?>

<!DOCTYPE html>
<html amp>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Envault 2019">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="images/sqff1bde_128x127.png" type="image/x-icon">
  <meta name="description" content="Contact Information to reach Envault Team">
  <title>Contact Us</title>
  
<link rel="canonical" href="contact.php">
 <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
 
 <style amp-custom>
   
div,span,h3,h4,p,a,ul,li,textarea,input{
    font: inherit;
}
*{
    box-sizing: border-box;
    outline: none;
}
*:focus{
    outline: none;
}
body{
    position: relative;
    font-style: normal;
    line-height: 1.5;
    color: #000000;
}
section{
    background-color: #ffffff;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
    padding: 30px 0;
}
section,.container,.container-fluid{
    position: relative;
    word-wrap: break-word;
}
h3,h4{
    margin: 0;
    padding: 0;
}
p,li{
    letter-spacing: 0.5px;
    line-height: 1.7;
}
ul,p{
    margin-bottom: 0;
    margin-top: 0;
}
a{
    cursor: pointer;
}
a,a:hover{
    text-decoration: none;
}
h3,h4,.display-1,.display-2,.display-5,.display-7{
    word-break: break-word;
    word-wrap: break-word;
}
strong{
    font-weight: bold;
}
input:-webkit-autofill,input:-webkit-autofill:hover,input:-webkit-autofill:focus,input:-webkit-autofill:active{
    transition-delay: 9999s;
    transition-property: background-color,color;
}
body{
    height: auto;
    min-height: 100vh;
}
.mbr-section-title{
    margin: 0;
    padding: 0;
    font-style: normal;
    line-height: 1.2;
    width: 100%;
}
.mbr-section-subtitle{
    line-height: 1.3;
    width: 100%;
}
.mbr-text{
    font-style: normal;
    line-height: 1.6;
    width: 100%;
}
.btn{
    text-align: center;
    position: relative;
    margin: .4rem .8rem;
    font-weight: 700;
    border-width: 2px;
    border-style: solid;
    font-style: normal;
    white-space: normal;
    transition: all .2s ease-in-out,box-shadow 2s ease-in-out;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    word-break: break-word;
    line-height: 1.5;
    letter-spacing: 1px;
}
.btn-form{
    padding: 1rem 2rem;
}
.btn-form:hover{
    cursor: pointer;
}
.card-title{
    margin: 0;
}
.card-img{
    border-radius: 0;
    width: auto;
    flex-shrink: 0;
}
.card{
    position: relative;
    background-color: transparent;
    border: none;
    border-radius: 0;
    width: 100%;
    padding-left: 1rem;
    padding-right: 1rem;
}
@media (max-width: 767px){
    .card:not(.last-child){
        padding-bottom: 2rem;
    }
}
.card .card-wrapper{
    height: 100%;
}
@media (max-width: 767px){
    .card .card-wrapper{
        flex-direction: column;
    }
}
@media (max-width: 991px){
    .md-pb{
        padding-bottom: 2rem;
    }
}
.gallery-img-wrap amp-img{
    height: 100%;
}
amp-image-lightbox a.control{
    position: absolute;
    width: 32px;
    height: 32px;
    right: 48px;
    top: 32px;
    z-index: 1000;
}
amp-image-lightbox a.control .close{
    position: relative;
}
amp-image-lightbox a.control .close:before,amp-image-lightbox a.control .close:after{
    position: absolute;
    left: 15px;
    content: ' ';
    height: 33px;
    width: 2px;
    background-color: #fff;
}
amp-image-lightbox a.control .close:before{
    transform: rotate(45deg);
}
amp-image-lightbox a.control .close:after{
    transform: rotate(-45deg);
}
.mbr-white{
    color: #ffffff;
}
.align-center{
    text-align: center;
}
@media (max-width: 767px){
    .align-center{
        text-align: center;
    }
}
.mbr-bold{
    font-weight: 700;
}
.mbr-section-btn{
    margin-left: -.8rem;
    margin-right: -.8rem;
    font-size: 0;
}
nav .mbr-section-btn{
    margin-left: 0rem;
    margin-right: 0rem;
}
section.menu{
    min-height: 70px;
}
.menu-container{
    display: flex;
    justify-content: space-between;
    align-items: center;
    min-height: 70px;
}
@media (max-width: 991px){
    .menu-container{
        max-width: 100%;
        padding: 0 2rem;
    }
}
@media (max-width: 767px){
    .menu-container{
        padding: 0 1rem;
    }
}
.navbar{
    z-index: 100;
    width: 100%;
}
.navbar-fixed-top{
    position: fixed;
    top: 0;
}
.navbar-brand{
    display: flex;
    align-items: center;
    word-break: break-word;
    z-index: 1;
}
.navbar-logo{
    margin-right: .8rem;
}
@media (max-width: 767px){
    .navbar-logo amp-img{
        max-height: 55px;
        max-width: 55px;
    }
}
.navbar-caption-wrap{
    display: flex;
}
.navbar .navbar-collapse{
    display: flex;
    flex-basis: auto;
    align-items: center;
    justify-content: flex-end;
}
@media (max-width: 991px){
    .navbar .navbar-collapse{
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        min-height: 100vh;
        padding: 70px 2rem 1rem;
        z-index: 1;
    }
}
.navbar-nav{
    list-style-type: none;
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    min-width: 10rem;
}
@media (max-width: 991px){
    .navbar-nav{
        flex-direction: column;
    }
}
.nav-item{
    word-break: break-all;
}
.nav-link{
    display: flex;
    align-items: center;
    justify-content: center;
}
.nav-link,.navbar-caption{
    transition: all 0.2s;
    letter-spacing: 1px;
}
.navbar-buttons{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}
@media (max-width: 991px){
    .navbar-buttons{
        flex-direction: column;
    }
}
.hamburger span{
    position: absolute;
    right: 0;
    width: 30px;
    height: 2px;
    border-right: 5px;
}
.hamburger span:nth-child(1){
    top: 0;
    transition: all .2s;
}
.hamburger span:nth-child(2){
    top: 8px;
    transition: all .15s;
}
.hamburger span:nth-child(3){
    top: 8px;
    transition: all .15s;
}
.hamburger span:nth-child(4){
    top: 16px;
    transition: all .2s;
}
.ampstart-btn.hamburger{
    position: absolute;
    top: 25px;
    right: 15px;
    margin-left: auto;
    width: 30px;
    height: 20px;
    background: none;
    border: none;
    cursor: pointer;
    z-index: 1000;
}
@media (min-width: 992px){
    .ampstart-btn,amp-sidebar{
        display: none;
    }
}
.close-sidebar{
    width: 30px;
    height: 30px;
    position: relative;
    cursor: pointer;
    background-color: transparent;
    border: none;
}
.close-sidebar span{
    position: absolute;
    left: 0;
    width: 30px;
    height: 2px;
    border-right: 5px;
}
.close-sidebar span:nth-child(1){
    transform: rotate(45deg);
}
.close-sidebar span:nth-child(2){
    transform: rotate(-45deg);
}
.builder-sidebar{
    position: relative;
    min-height: 100vh;
    z-index: 1030;
    padding: 1rem 2rem;
    max-width: 20rem;
}
.google-map{
    position: relative;
    width: 100%;
}
@media (max-width: 992px){
    .google-map{
        padding: 0;
        margin: 0;
    }
}
div[submit-success]{
    padding: 1rem;
    margin-bottom: 1rem;
}
div[submit-error]{
    padding: 1rem;
    margin-bottom: 1rem;
}
amp-img{
    width: 100%;
}
amp-img img{
    max-height: 100%;
    max-width: 100%;
}
.is-builder amp-img > a + img[async],.is-builder amp-img > a + img[decoding="async"]{
    display: none;
}
html:not(.is-builder) amp-img > a{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
}
.is-builder .temp-amp-sizer{
    position: absolute;
}
.is-builder amp-youtube .temp-amp-sizer,.is-builder amp-vimeo .temp-amp-sizer{
    position: static;
}
.is-builder section.horizontal-menu .ampstart-btn{
    display: none;
}
div.placeholder{
    z-index: 4;
    background: rgba(255,255,255,0.5);
}
div.placeholder svg{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 20%;
    height: auto;
}
div.placeholder svg circle.big{
    animation: big-anim 3s linear infinite;
}
div.placeholder svg circle.small{
    animation: small-anim 1.5s linear infinite;
}
@keyframes big-anim{
    from{
        stroke-dashoffset: 900;
    }
    to{
        stroke-dashoffset: 0;
    }
}
@keyframes small-anim{
    from{
        stroke-dashoffset: 850;
    }
    to{
        stroke-dashoffset: 0;
    }
}
.placeholder-loader .amp-active > div{
    display: none;
}
.container{
    padding-right: 1rem;
    padding-left: 1rem;
    width: 100%;
    margin-right: auto;
    margin-left: auto;
}
@media (max-width: 767px){
    .container{
        max-width: 540px;
    }
}
@media (min-width: 768px){
    .container{
        max-width: 720px;
    }
}
@media (min-width: 992px){
    .container{
        max-width: 960px;
    }
}
@media (min-width: 1200px){
    .container{
        max-width: 1140px;
    }
}
.container-fluid{
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    padding-left: 1rem;
    padding-right: 1rem;
}
.mbr-flex{
    display: flex;
}
.mbr-jc-c{
    justify-content: center;
}
.mbr-row{
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -1rem;
    margin-left: -1rem;
}
.mbr-column{
    flex-direction: column;
}
@media (max-width: 767px){
    .mbr-col-sm-12{
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        padding-right: 1rem;
        padding-left: 1rem;
    }
}
@media (min-width: 768px){
    .mbr-col-md-8{
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    .mbr-col-md-12{
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        padding-right: 1rem;
        padding-left: 1rem;
    }
}
@media (min-width: 992px){
    .mbr-col-lg-4{
        -ms-flex: 0 0 33.33%;
        flex: 0 0 33.33%;
        max-width: 33.33%;
        padding-right: 1rem;
        padding-left: 1rem;
    }
    .mbr-col-lg-6{
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
        padding-right: 1rem;
        padding-left: 1rem;
    }
}
.mbr-pt-2{
    padding-top: 1rem;
}
.mbr-pt-3{
    padding-top: 1.5rem;
}
.mbr-pb-4{
    padding-bottom: 2rem;
}
.mbr-px-2{
    padding-left: 1rem;
    padding-right: 1rem;
}
.mbr-m-auto{
    margin: auto;
}
.form-block{
    z-index: 1;
    background-color: transparent;
    padding: 3rem;
    position: relative;
    overflow: visible;
}
@media (max-width: 992px){
    .form-block{
        padding: 1rem;
    }
}
.form-block input,.form-block textarea{
    border-radius: 0;
    background-color: #ffffff;
    margin: 0;
    transition: 0.4s;
    width: 100%;
    border: 1px solid #e0e0e0;
    padding: 11px 1rem;
}
form .fieldset{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    align-items: center;
}
.field{
    flex-basis: auto;
    flex-grow: 1;
    flex-shrink: 1;
    padding: 0.5rem;
}
@media (max-width: 768px){
    .field{
        flex-basis: 100%;
    }
}
textarea{
    width: 100%;
    margin-right: 0;
}
.text-field{
    flex-basis: 100%;
    flex-grow: 1rem;
    flex-shrink: 1;
    padding: 0.5rem;
}
amp-img{
    height: 100%;
    width: 100%;
}
amp-sidebar{
    background: transparent;
}
.amp-carousel-button{
    outline: none;
    border-radius: 50%;
    border: 10px transparent solid;
    transform: scale(1.5) translateY(-50%);
    height: 45px;
    width: 45px;
    transition: 0.4s;
    cursor: pointer;
}
.amp-carousel-button:hover{
    opacity: 1;
}
.amp-carousel-button-next{
    background-position: 75% 50%;
}
.amp-carousel-button-prev{
    background-position: 25% 50%;
}
.iconfont-wrapper{
    display: inline-block;
    width: 1.5rem;
    height: 1.5rem;
}
.amp-iconfont{
    vertical-align: middle;
    width: 1.5rem;
    height: 100%;
    font-size: 1.5rem;
}
body{
    font-family: Didact Gothic;
}
div[submit-success]{
    background: #365c9a;
}
div[submit-error]{
    background: #767676;
}
.display-1{
    font-family: 'Montserrat',sans-serif;
    font-size: 3.5rem;
    line-height: 1.25;
    letter-spacing: 4px;
}
.display-2{
    font-family: 'Lato',sans-serif;
    font-size: 2.8rem;
    line-height: 1.25;
    letter-spacing: 4px;
}
.display-5{
    font-family: 'Montserrat',sans-serif;
    font-size: 1.6rem;
    line-height: 1.25;
    letter-spacing: 4px;
    font-weight: 300;
}
.display-7{
    font-family: 'Montserrat',sans-serif;
    font-size: 1.2rem;
    line-height: 1.7;
    font-weight: 300;
    letter-spacing: normal;
}
.form-block input,.form-block textarea{
    font-family: 'Montserrat',sans-serif;
    font-size: 1.2rem;
    line-height: 1;
}
@media (max-width: 768px){
    .display-1{
        font-size: 2.8rem;
        font-size: calc( 1.875rem + (3.5 - 1.875) * ((100vw - 20rem) / (48 - 20)));
        line-height: calc( 1.4 * (1.875rem + (3.5 - 1.875) * ((100vw - 20rem) / (48 - 20))));
    }
    .display-2{
        font-size: 2.24rem;
        font-size: calc( 1.63rem + (2.8 - 1.63) * ((100vw - 20rem) / (48 - 20)));
        line-height: calc( 1.4 * (1.63rem + (2.8 - 1.63) * ((100vw - 20rem) / (48 - 20))));
    }
    .display-5{
        font-size: 1.28rem;
        font-size: calc( 1.21rem + (1.6 - 1.21) * ((100vw - 20rem) / (48 - 20)));
        line-height: calc( 1.4 * (1.21rem + (1.6 - 1.21) * ((100vw - 20rem) / (48 - 20))));
    }
    .display-7{
        font-size: 0.96rem;
        font-size: calc( 1.07rem + (1.2 - 1.07) * ((100vw - 20rem) / (48 - 20)));
        line-height: calc( 1.4 * (1.07rem + (1.2 - 1.07) * ((100vw - 20rem) / (48 - 20))));
    }
}
.btn{
    padding: 10px 30px;
    border-radius: 0px;
}
.btn-md{
    padding: 10px 30px;
    border-radius: 0px;
}
.btn-primary,.btn-primary:active{
    background-color: #ca4336;
    border-color: #ca4336;
    color: #ffffff;
}
.btn-primary:hover,.btn-primary:focus{
    background-color: #7a2820;
    border-color: #7a2820;
    color: #ffffff;
}
.btn-primary:disabled{
    color: #ffffff;
    background-color: #7a2820;
    border-color: #7a2820;
}
.btn-black,.btn-black:active{
    background-color: #010101;
    border-color: #010101;
    color: #ffffff;
}
.btn-black:hover,.btn-black:focus{
    background-color: #000000;
    border-color: #000000;
    color: #ffffff;
}
.btn-black:disabled{
    color: #ffffff;
    background-color: #000000;
    border-color: #000000;
}
.text-white{
    color: #fcfcfc;
}
.text-black{
    color: #010101;
}
a[class*="text-"],.amp-iconfont{
    transition: 0.2s ease-in-out;
}
.amp-iconfont{
    color: #ca4336;
}
a.text-white:hover,a.text-white:focus{
    color: #e6e6e6;
}
a.text-black:hover,a.text-black:focus{
    color: #cccccc;
}
.mbr-section-subtitle,.mbr-text,.card-text{
    color: #767676;
}
.card-title{
    color: #ca4336;
}
.nav-link{
    font-weight: 400;
}
.btn{
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    min-height: 40px;
    padding: 0 30px;
    order: 1;
}
.title{
    padding-bottom: 5rem;
}
.cid-qYZnUZOpsq{
    background-color: #efefef;
}
.cid-qYZnUZOpsq .navbar{
    box-shadow: 0 4px 18px rgba(0,0,0,0.04);
    background: #efefef;
}
.cid-qYZnUZOpsq .menu-container{
    position: relative;
}
.cid-qYZnUZOpsq .navbar-brand{
    position: relative;
    left: -1rem;
    padding: 1rem;
    bottom: 0;
    top: 0;
    background: #ca4336;
}
.cid-qYZnUZOpsq .navbar-brand .navbar-logo{
    min-width: 30px;
    max-width: 120px;
}
.cid-qYZnUZOpsq .navbar-brand .navbar-logo amp-img{
    object-fit: contain;
    height: auto;
    width: 2.4rem;
}
.cid-qYZnUZOpsq .navbar-caption{
    line-height: inherit;
}
@media (max-width: 991px){
    .cid-qYZnUZOpsq .navbar .navbar-collapse{
        background: #efefef;
    }
}
.cid-qYZnUZOpsq .nav-link{
    margin: .667em 1em;
    padding: 0;
}
.cid-qYZnUZOpsq .hamburger span{
    background-color: #232323;
}
.cid-qYZnUZOpsq .builder-sidebar{
    background-color: #efefef;
}
.cid-qYZnUZOpsq .close-sidebar:focus{
    outline: 2px auto #ca4336;
}
.cid-qYZnUZOpsq .close-sidebar span{
    background-color: #232323;
}
.cid-rC1dHKRSYN{
    padding-top: 5rem;
    padding-bottom: 5rem;
    background-color: #efefef;
}
@media (max-width: 991px){
    .cid-rC1dHKRSYN .card-wrapper{
        flex-wrap: wrap;
    }
}
.cid-rC1dHKRSYN .card-box{
    width: 100%;
}
.cid-rC1dHKRSYN .iconfont-wrapper{
    display: inline-block;
    width: 4.5rem;
    height: 4.5rem;
}
.cid-rC1dHKRSYN .amp-iconfont{
    color: #ca4336;
    vertical-align: middle;
}
@media (min-width: 768px){
    .cid-rC1dHKRSYN .amp-iconfont{
        font-size: 4.5rem;
        width: 4.5rem;
    }
}
@media (max-width: 767px){
    .cid-rC1dHKRSYN .amp-iconfont{
        font-size: 2.5rem;
        width: 2.5rem;
    }
}
.cid-rC1dHKRSYN .mbr-section-subtitle{
    color: #000000;
}
.cid-rC1dTTCGd7{
    padding-top: 3rem;
    padding-bottom: 3rem;
    background-color: #efefef;
}
.cid-rC1dTTCGd7 .map-block{
    width: 100%;
}
@media (max-width: 992px){
    .cid-rC1dTTCGd7 .map-block{
        margin-bottom: 2rem;
    }
}
.cid-rC1dTTCGd7 .map-block .google-map,.cid-rC1dTTCGd7 .map-block amp-iframe{
    min-height: 400px;
    width: 100%;
}
.cid-rC1ee52ee7{
    padding-top: 4rem;
    padding-bottom: 4rem;
    background-color: #efefef;
}
.cid-rC1ee52ee7 .mbr-form .fieldset input,.cid-rC1ee52ee7 .mbr-form .fieldset textarea{
    background-color: #efefef;
    color: #000000;
    border: 1px solid #000000;
}
.cid-rC1ee52ee7 .mbr-form .fieldset input::-webkit-input-placeholder{
    color: rgba(0,0,0,0.5);
}
.cid-rC1ee52ee7 .mbr-form .fieldset input::-moz-placeholder{
    color: rgba(0,0,0,0.5);
}
.cid-rC1ee52ee7 .mbr-form .fieldset textarea::-webkit-input-placeholder{
    color: rgba(0,0,0,0.5);
}
.cid-rC1ee52ee7 .mbr-form .fieldset textarea::-moz-placeholder{
    color: rgba(0,0,0,0.5);
}
.cid-rC1ee52ee7 .mbr-form .fieldset textarea{
    min-height: 200px;
}
.cid-rC1ee52ee7 .form-block{
    padding: 0;
}
.cid-rC1ee52ee7 .mbr-section-title{
    color: #000000;
}
.cid-rC1ee52ee7 .mbr-section-subtitle{
    color: #000000;
}
.cid-qYZoU3gNAk{
    padding-top: 2rem;
    padding-bottom: 2rem;
    background-color: #000000;
}
[class*="-iconfont"]{
    display: inline-flex;
}

   
 </style>
 
  <script async  src="https://cdn.ampproject.org/v0.js"></script>
  <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
  <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
  <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
  <script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
  <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
  
  
</head>
<body><amp-sidebar id="sidebar" class="cid-qYZnUZOpsq" layout="nodisplay" side="right">
    <div class="builder-sidebar" id="builder-sidebar">
      <button on="tap:sidebar.close" class="close-sidebar">
      <span></span>
      <span></span>
      </button>
    
        
        <!-- NAVBAR ITEMS -->
        <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown">
            <a class="nav-link mbr-bold link text-black display-4" href="about.php" aria-expanded="true">
              About us</a>
          </li><li class="nav-item"><a class="nav-link mbr-bold link text-black display-4" href="contact.php">
              Contact us<br></a></li>
          <li class="nav-item">
            <a class="nav-link mbr-bold link text-black display-4" href="auth/login.php">
              Sign In<br></a>
          </li></ul>
        <!-- NAVBAR ITEMS END -->
        <!-- SOCIAL ICON -->
        
        <!-- SOCIAL ICON END -->
        <!-- SHOW BUTTON -->
        <div class="navbar-buttons mbr-section-btn"><a class="btn btn-md mbr-bold btn-black display-4" href="auth/signup.php">
            Sign Up</a></div>
        <!-- SHOW BUTTON END -->
      </div>
  </amp-sidebar>
  <section class="menu1 menu horizontal-menu cid-qYZnUZOpsq" id="menu1-0">
  
  <!-- <div class="menu-wrapper"> -->
  <nav class="navbar navbar-dropdown navbar-expand-lg navbar-fixed-top">
    <div class="menu-container container-fluid">
      <!-- SHOW LOGO -->
      <div class="navbar-brand">
        <div class="navbar-logo">
          <amp-img src="images/noun_Cloud_2845836-h_k0ax1k70-509x341.png" layout="responsive" height="27" width="40.302052785923756" alt="" class="placeholder-loader">
            <div placeholder="" class="placeholder">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
                                    <circle class="big" fill="none" stroke="#c2e0e0" stroke-width="3" stroke-dasharray="230" stroke-dashoffset="230" cx="150" cy="150" r="145"></circle>
                                    <circle class="small" fill="none" stroke="#c2e0e0" stroke-width="3" stroke-dasharray="212" cx="150" cy="150" r="135"></circle>
                                </svg></div>
            <a href="index.php"></a>
          </amp-img>
        </div>
        <span class="navbar-caption-wrap"><a class="navbar-caption mbr-bold text-black display-5" href="index.php">Envault<br></a></span>
      </div>
      <!-- SHOW LOGO END -->
      <!-- COLLAPSED MENU -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <!-- NAVBAR ITEMS -->
        <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown">
            <a class="nav-link mbr-bold link text-black display-4" href="about.php" aria-expanded="true">
              About us</a>
          </li><li class="nav-item"><a class="nav-link mbr-bold link text-black display-4" href="contact.php">
              Contact us<br></a></li>
          <li class="nav-item">
            <a class="nav-link mbr-bold link text-black display-4" href="auth/login.php">
              Sign In<br></a>
          </li></ul>
        <!-- NAVBAR ITEMS END -->
        <!-- SOCIAL ICON -->
        
        <!-- SOCIAL ICON END -->
        <!-- SHOW BUTTON -->
        <div class="navbar-buttons mbr-section-btn"><a class="btn btn-md mbr-bold btn-black display-4" href="auth/signup.php">
            Sign Up</a></div>
        <!-- SHOW BUTTON END -->
      </div>
      <!-- COLLAPSED MENU END -->
      
      <button on="tap:sidebar.toggle" class="ampstart-btn hamburger">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </nav>
  <!-- AMP plug -->
  
  <!-- </div> -->
</section>

<section class="contacts7 map cid-rC1dHKRSYN" id="contacts7-w">
    
    
    <div class="container">
        <div class="title mbr-pb-4 align-center">
            <h3 class="mbr-section-title mbr-bold mbr-fonts-style display-1">Having Problems?</h3>
            <h4 class="mbr-section-subtitle mbr-fonts-style mbr-pt-2 display-2"><strong>Contact Us.</strong></h4>
        </div>
        <div class="mbr-row mbr-px-2 mbr-jc-c">
            <div class="card mbr-col-sm-12 mbr-col-md-8 mbr-col-lg-4 align-center md-pb">
                <div class="card-wrapper mbr-flex mbr-column">
                    <div class="card-img align-center">
                        <div class="iconfont-wrapper">
                            <span class="amp-iconfont fa-map-marker fa"><svg width="100%" height="100%" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path d="M1152 640q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm256 0q0 109-33 179l-364 774q-16 33-47.5 52t-67.5 19-67.5-19-46.5-52l-365-774q-33-70-33-179 0-212 150-362t362-150 362 150 150 362z"></path></svg></span>
                        </div>
                    </div>
                    <div class="card-box mbr-pt-3">
                        <h4 class="card-title mbr-bold mbr-fonts-style display-5"><strong>Address</strong></h4>
                        <p class="card-text mbr-fonts-style mbr-pt-2 display-7"><strong>Pillai College of Engineering, New Panvel, Maharashtra, India</strong></p>
                    </div>
                </div>
            </div>
            <div class="card mbr-col-sm-12 mbr-col-md-8 mbr-col-lg-4 align-center md-pb">
                <div class="card-wrapper mbr-flex mbr-column">
                    <div class="card-img align-center">
                        <div class="iconfont-wrapper">
                            <span class="amp-iconfont fa-phone fa"><svg width="100%" height="100%" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path d="M1600 1240q0 27-10 70.5t-21 68.5q-21 50-122 106-94 51-186 51-27 0-53-3.5t-57.5-12.5-47-14.5-55.5-20.5-49-18q-98-35-175-83-127-79-264-216t-216-264q-48-77-83-175-3-9-18-49t-20.5-55.5-14.5-47-12.5-57.5-3.5-53q0-92 51-186 56-101 106-122 25-11 68.5-21t70.5-10q14 0 21 3 18 6 53 76 11 19 30 54t35 63.5 31 53.5q3 4 17.5 25t21.5 35.5 7 28.5q0 20-28.5 50t-62 55-62 53-28.5 46q0 9 5 22.5t8.5 20.5 14 24 11.5 19q76 137 174 235t235 174q2 1 19 11.5t24 14 20.5 8.5 22.5 5q18 0 46-28.5t53-62 55-62 50-28.5q14 0 28.5 7t35.5 21.5 25 17.5q25 15 53.5 31t63.5 35 54 30q70 35 76 53 3 7 3 21z"></path></svg></span>
                        </div>
                    </div>
                    <div class="card-box mbr-pt-3">
                        <h4 class="card-title mbr-bold mbr-fonts-style display-5"><strong>Phone</strong></h4>
                        <p class="card-text mbr-fonts-style mbr-pt-2 display-7"><strong>+91 98205 40980</strong></p>
                    </div>
                </div>
            </div>
            <div class="card mbr-col-sm-12 mbr-col-md-8 mbr-col-lg-4 align-center last-child">
                <div class="card-wrapper mbr-flex mbr-column">
                    <div class="card-img align-center">
                        <div class="iconfont-wrapper">
                            <span class="amp-iconfont fa-envelope-o fa"><svg width="100%" height="100%" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><path d="M1664 1504v-768q-32 36-69 66-268 206-426 338-51 43-83 67t-86.5 48.5-102.5 24.5h-2q-48 0-102.5-24.5t-86.5-48.5-83-67q-158-132-426-338-37-30-69-66v768q0 13 9.5 22.5t22.5 9.5h1472q13 0 22.5-9.5t9.5-22.5zm0-1051v-24.5l-.5-13-3-12.5-5.5-9-9-7.5-14-2.5h-1472q-13 0-22.5 9.5t-9.5 22.5q0 168 147 284 193 152 401 317 6 5 35 29.5t46 37.5 44.5 31.5 50.5 27.5 43 9h2q20 0 43-9t50.5-27.5 44.5-31.5 46-37.5 35-29.5q208-165 401-317 54-43 100.5-115.5t46.5-131.5zm128-37v1088q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-1088q0-66 47-113t113-47h1472q66 0 113 47t47 113z"></path></svg></span>
                        </div>
                    </div>
                    <div class="card-box mbr-pt-3">
                        <h4 class="card-title mbr-bold mbr-fonts-style display-5"><strong>E-mail</strong></h4>
                        <p class="card-text mbr-pt-3 mbr-fonts-style display-7"><strong>thegodfathercy@gmail.com</strong></p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="contacts6 map cid-rC1dTTCGd7" id="contacts6-x">
    
    
    <div class="container">
        <div class="title mbr-pb-4 align-center">
            <h3 class="mbr-section-title mbr-bold mbr-fonts-style display-1">Visit Us.</h3>
            
        </div>
        <div class="map-block mbr-col-md-12 mbr-jc-c mbr-flex mbr-m-auto mbr-column">
            <div class="google-map"><amp-iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDlqUgrubRDixmu6OnRsHrqa1XpJBGnlKQ&amp;q=place_id:ChIJf2aI3mbo5zsRXw9h3LrVxcE" height="400" layout="fill" sandbox="allow-scripts allow-same-origin                                 allow-popups" frameborder="0" class="placeholder-loader">
                <div placeholder="" class="placeholder">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300">
                                    <circle class="big" fill="none" stroke="#c2e0e0" stroke-width="3" stroke-dasharray="230" stroke-dashoffset="230" cx="150" cy="150" r="145"></circle>
                                    <circle class="small" fill="none" stroke="#c2e0e0" stroke-width="3" stroke-dasharray="212" cx="150" cy="150" r="135"></circle>
                                </svg></div>
            </amp-iframe></div>
            
        </div>
    </div>
</section>

<section class="contacts5 cid-rC1ee52ee7" id="contacts5-y">
    
    
    <div class="container">
        <div class="title mbr-pb-4 align-center">
            <div class="title-block">
                <h3 class="mbr-section-title mbr-bold mbr-fonts-style display-1">Write To Us</h3>
                <h4 class="mbr-section-subtitle mbr-fonts-style mbr-pt-2 display-5"><strong>Write to us your Queries or Suggestions</strong></h4>
            </div>
        </div>
        <div class="form-block mbr-col-lg-6 mbr-m-auto" data-form-type="formoid">
            <form class="mbr-form mbr-jc-c mbr-flex mbr-m-auto mbr-column" method="post" action-xhr="contact.php" data-form-title="Query Form">

                <div class="fieldset">
                    <div class="field">
                        <input type="text" name="nm" data-form-field="Name" placeholder="Full Name.." required="" id="form[data][0][1]-contacts5-y">
                    </div>
                    
                    <div class="field">
                        <input type="email" name="em" data-form-field="E-mail" placeholder="Your E-mail Address.." required="" id="form[data][2][1]-contacts5-y">
                    </div>
                    
                    <div class="text-field" >
                        <textarea name="ms" rows="7" data-form-field="Message" placeholder="Your query or suggestion.." id="form[data][4][1]-contacts5-y"></textarea>
                    </div>
                </div>
              
                <div class="mbr-section-btn align-center">
                    <button type="submit" class="btn btn-md btn-primary btn-form display-7" name="send" onclick="alert('Message Successfully Sent')">Send</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="footer1 cid-qYZoU3gNAk" id="footer1-a">
    
    
    <div class="footer-container container">
        
        <div class="copyright mbr-px-2 mbr-flex mbr-jc-c">
            <p class="mbr-text mbr-fonts-style mbr-white align-center display-7">
                ©<span>2019</span> <span><strong>envault.ml</strong></span><br><span>All Rights Reserved.</span></p>
        </div>
    </div>
</section>

  
  
</body>
</html>