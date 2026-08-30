<?php 
  $servername = "localhost:3306";
$username = "jatinr";
$password = "jatinr33";
$dbname = "aavpubli_farm";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
include 'header.php';
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
      <div class="container">
          <div class="row">
            <div class="col-xl-12">
            <div class="hero-cap text-center pt-2">
                <h2>Archives</h2>
            </div>
            </div>
          </div>
      </div>
    </div> 

          <style>
table,div{font-family: 'Poppins', sans-serif;font-size:13px; color:#000; line-height:1.3;font-weight: 500;}
a{color: #000; text-decoration: none; }
a:hover{color: #000;}
img{border:none;max-width: 100%;}
p{ margin:10px 0;}
article, aside, audio, canvas, command, datalist, details, embed, figcaption, figure, footer, header, hgroup, keygen, meter, nav, output, progress, section, source, video {display:block}
*{box-sizing: border-box;}
.img_left, #logo, #left, #social, .left, #contact-left{float:left;}
.img_right, #top_link, #right, #copy-logo, .right, #contact-right{float:right;}
input,select,textarea,button{font-family: 'Poppins', sans-serif;font-size: 13px;font-weight: 500;}


#main{margin:0 auto;}

.header-top{background: url(../images/map-img.png)no-repeat top right;}
#logo{padding-top: 10px;z-index: 9;position: relative;}
#logo img{vertical-align: top;width: 200px;}
/*-- 17-10-2016 mahesh --*/
#logo a{width: 100%;display: inline-block;margin: 0 auto;text-align: center;}
#logo span{display: block;text-align: center;background: #0256ca;color: #ffffff;font-size: 14px; padding: 5px 20px;margin-top: 4px;border-radius: 20px;text-transform: capitalize;}
#logo span:hover{background: #ffae00;color: #000000;cursor: pointer;}



.logo-text{float: left;padding-top: 30px;padding-left: 30px;}
.logo-text h2{font-size: 100px;line-height: 0.7;margin: 0;margin-bottom: 5px;}
.logo-text span{font-size: 21px;font-weight: 700;text-transform: uppercase;color: #4f4f4f;border-bottom: 2px solid #4f4f4f;display: inline-block;}

.logo-text label {font-size: 17px;text-transform: uppercase;display: block;margin-top: 10px;color: #7a7a7a;}
.header-top-right{float: right;padding-top: 30px;}
.header-top-right span{font-size: 18px;}
.header-top-right p i {color: #fff;font-size: 15px;width: 30px;height: 30px;text-align: center;background: #1658b3;line-height: 30px;border-radius: 100%;}
.header-top-right p { font-size: 16px; margin-bottom: 15px;}
#top_link{float: left;}
.menu-bg{background: #1658b3;border-top: 3px solid #ffae00;position: relative;z-index: 1;top: 2px;}


.second-menu{background: #ebecf1;border-bottom: 3px solid #ffae00;}
.second-menu #top_link{float: left;}


.main-content{border: 1px solid #dedfe7;box-shadow: #dedfe7 0 0 10px;margin-top: 30px !important;}
.left-side{width: 23%;float: left;border-right: 1px solid #dedfe7;}
.left-side h3{background: #ebecf1;margin: 0;padding: 15px 20px;font-size: 16px;border-bottom: 1px solid #dedfe7;}




.indexing ul{padding: 10px 0;}
.indexing li{padding: 6px 22px;text-align: center;}


.traffic ul{padding-top: 10px;}
.traffic li{padding: 10px 20px;width: 100%;display: inline-block;border-bottom: 1px solid #dedfe7;}

.traffic li p{float: left;margin: 0;line-height: 1.6;}
.traffic li span{font-weight: 700;}
.traffic li label{display: block;font-size: 12px;color: #747474;}
.traffic li img{float: right;}


.content-area{width: 54%;float: left;padding: 20px 30px;}

.home-content h2{font-size: 20px;margin-bottom: 20px;}
.home-content p{color: #6f6f6f;line-height: 1.8;margin-bottom: 15px;text-align: justify;}
.home-content span{font-weight: 700;color: #6f6f6f;}

.bank-detail{background: #e7eef7;border: 1px solid #dedfe7;}
.bank-detail p{margin: 0;padding: 10px;border-bottom: 1px solid #dedfe7;}
.bank-detail p span{font-weight: 300;width: 35%;display: inline-block;}

.most-popular-article-slider{margin-top: 20px;border: 1px solid #dedfe7;}
.most-popular-article-slider h2{background: #3b4076;color: #fff;font-size: 16px;padding: 15px;margin: 0;}

.most-popular-article-slider p span{color: #000;width: 20%;display: inline-block;}

.most-popular-article-slider .bx-wrapper{padding-bottom: 15px !important;}


.most-popular-article-slider .bxslider li{padding: 15px;}
.most-popular-article-slider .bx-controls-direction{display: none;}
.most-popular-article-slider .bx-wrapper .bx-controls.bx-has-controls-auto.bx-has-pager .bx-pager{text-align: center;width: 100%;bottom: -7px !important;}
.most-popular-article-slider .bx-wrapper .bx-pager.bx-default-pager a{background: #797c9d;width: 15px;height: 15px;border-radius: 10px;}
.most-popular-article-slider .bx-wrapper .bx-pager.bx-default-pager a:hover,.most-popular-article-slider .bx-wrapper .bx-pager.bx-default-pager a.active/*,.most-popular-article-slider .bx-wrapper .bx-pager.bx-default-pager a:focus*/{background: #ffae00;}



.right-side{width: 23%;float: left;background: #dedfe7;}
.right-side h3{background: #3b4076;color: #fff;font-size: 16px;padding: 15px;margin: 0;}
.latest-news li{padding: 15px 15px;border-bottom: 1px solid #c0c2d2;}
.latest-news li:last-child{border-bottom: 0;}
.latest-news li h4{margin: 0;font-size: 13px;}
.latest-news li p{color: #515151;margin-bottom: 20px;line-height: 1.6;}

.social-icon{margin-top: 10px;}
.social-icon ul li{width: 16.66%;float: left;text-align: center;padding: 25px 0;}
.social-icon ul li a{color: #fff;font-size: 18px;line-height: 4 !important;}
.social-icon ul li:hover{background: rgba(0,0,0,0.9);}

.fb{background: #3b579d;}
.go{background: #da4835;}
.tw{background: #00aced;}
.ln{background: #056695;}
.pin{background: #cb2530;}
.mail{background: #189612;}

.site-visitor{background: #ffae00;padding: 0;}
.site-visitor p{color: #fff;font-size: 16px;border-bottom: 1px solid #84879f;line-height: 1.6;margin: 0;}
.site-visitor p:last-child{border-bottom: 0;}
.site-visitor p span{font-weight: 700;}

.site-visitor p span:first-child{display: inline-block;width: 52%;padding: 12px 10px;background: #434767;margin-right: 10px;}

.book{text-align: center;margin: 6px 0;}
.newsletter{background: #3b4076;padding: 25px 15px;}
.newsletter h4{font-size: 16px;color: #fff;margin-bottom: 20px;}
.newsletter input{background: #fff;padding: 10px;width: 100%;border: 0;margin-bottom: 20px;}

.journals{padding: 30px 0;background: url(../images/map-bg.png)no-repeat center top;}
.journals h2{text-align: center;margin-bottom: 25px;font-size: 30px;}

.journals ul li{width: 33.33%;float: left;padding-left: 70px;}
.journals ul li .journals-img{width: 30%;float: left;}
.journals ul li .journals-text{width: 70%;float: left;padding-left: 10px;}
.journals ul li .journals-text span{font-size: 15px;display: block;margin-bottom: 15px;}
.journals ul li .journals-text .button{background: #0256ca;color: #fff;}

.rating{margin-top: 10px;text-align: center;line-height: 1.6;}
.rating label{display: block;}
.rating span{color: #ff3600;}
.rating span.google{color: #007eff;}

footer{background: #0b0d20;}
.footer-top{padding: 0px 0;text-align: center;}
.footer-top p{color: #fff;line-height: 1.3;font-size: 12px;}
.footer-top p.copy{color: #71727f;margin: 10px 0;}

.footer-menu{margin-bottom: 10px;}
.footer-menu li{display: inline-block;}
.footer-menu li a{color: #fff;padding: 0 10px;}
.footer-menu li::after{content: '|';color: #fff;}
.footer-menu li:last-child::after{content: '';}

.footer-bottom{background: #04050d;text-align: center;}
.footer-bottom p{color: #fff;padding: 10px;}

.hire-benifit{margin: 20px 0;}
.hire-benifit ul{background: #e7eef7;padding: 20px;border: 1px solid #dedfe7;}
.hire-benifit ul li{padding-bottom: 15px;color: #6f6f6f;}
.hire-benifit ul li::before{content: '\f00c';font-family: 'FontAwesome';}
.hire-benifit ul li:last-child{padding-bottom: 0;}
/*------------AboutUs-------------*/
.content-area.inner-page{width: 100%;}
.tab-left {float: left;width: 35%;background: #dedfe7;}
.tab-left li{border-bottom: 1px solid #fff;padding: 12px;text-align: right;}
.tab-left li a{color: #3b4076;}
.tab-left li.ui-tabs-active{background: #3b4076;position: relative;}
.tab-left li.ui-tabs-active::after{content: '';background: url(../images/arrow-icon.png)no-repeat center right;width: 11px;height: 21px;position: absolute;right: -10px;top: 10px;}
.tab-left li.ui-tabs-active a{color: #fff;}
.tab-right{width: 65%;float: left;border: 1px solid #3b4076;padding: 10px 20px;}

/*------------author-guidelines------------------*/
.author-guideline{margin: 40px 0;}
.author-guideline-icon{width: 20%;float: left;text-align: right;border-top: 10px solid #1658b3;}
.author-guideline-icon img{padding-top: 50px;}
.author-guideline-text{width: 80%;float: left;padding-left: 30px;}
.author-guideline-text h3{font-size: 16px;color: #1658b3;margin-top: 0;margin-bottom: 20px;}
.author-guideline-text p{line-height: 1.9;margin-bottom: 20px;}
.author-guideline-text p a{color: #1658b3;word-wrap: break-word;}

/*----------Book-Publication---------------*/
.inner-page .home-content h2 {font-size: 30px;margin-bottom: 20px;}

.book-publication-detail-list{padding: 10px;}
.book-publication-detail-list.grey{background: #eff0f4;padding: 15px;}
.book-publication-detail-icon{width: 20%;float: left;border-right: 5px solid #1658b3;margin-top: 15px;text-align: center;}
.book-publication-detail-text{width: 80%;float: left;padding-left: 30px;}

.book-publication-detail-text h3{font-size: 22px;color: #515151;font-weight: 500;margin-bottom: 10px;}
.book-publication-detail-text p{margin-bottom: 10px;}


.our-published-book{border: 1px solid #3b4076;padding: 0 20px 50px 20px;}
.our-published-book h3{background: #fff;display: inline-block;position: relative;top: -10px;padding: 0 10px;}
.our-published-book .bxslider li img{margin: 0 auto;}
.our-published-book .bx-wrapper .bx-prev {background: url("../images/slider-arrow-left1.png") no-repeat !important;left: 0 !important;}
.our-published-book .bx-wrapper .bx-next {background: url("../images/slider-arrow-right1.png") no-repeat !important;right: 0 !important;left: auto !important;}
.our-published-book .bx-wrapper .bx-controls-direction a{bottom: auto !important;top: 50% !important;}
.our-published-book .bx-pager{text-align: center !important;width: 100% !important;}


/*------------Download----------------*/
table {width: 100%;border-collapse: collapse;}
/*tr:nth-of-type(odd) {background: #eee;}*/
.download th {background: #3b4076;color: #fff;font-weight: 700;}
.download td, .download th {padding: 10px 0;border: 1px solid #e3e3e3;text-align: center;}

/*------------editionalboard--------------*/
.content-area.inner-page.editionalboard{width: 100%;}
.editionalboard table{border: 1px solid #e3e3e3;}
.editionalboard tr:nth-of-type(odd) {background: #f5f5f8;}
.editionalboard th {background: #3b4076;color: #fff !important;font-weight: 700;}
.editionalboard td, .editionalboard th {padding: 10px;text-align: left;color: #515151;}
.responsive-table{overflow: auto;}

.responsive-table.main tr:nth-of-type(odd) {background: #eee;}
.responsive-table.main th {background: #3b4076;color: #fff;font-weight: 700;}
.responsive-table.main td, .responsive-table.main th {padding: 10px 0;border: 1px solid #e3e3e3;text-align: center;}




/*----------past-issues--------------*/
.archives {margin-bottom: 1px;}
.archives th {background: #3b4076;color: #fff !important;font-weight: 700;}
.archives td, .archives th {padding: 20px;border: 1px solid #e3e3e3;text-align: center;color: #515151;}
.archives thead th{text-align: left;padding: 10px !important;} 

/*----------subscription-form------------*/




.home-content > div > h1 { text-align: center; } </style>
        <div class="content-area inner-page">
    <div class="home-content">
    <h2>Archives</h2>
                <div class="author-guideline clearfix">
                  <div class="author-guideline-icon">
                    <img src="images.jpg">
                  </div>
                  <div class="author-guideline-text">
                    <div class="responsive-table">

                      

                      
<table  class="archives">
    <thead>
      <tr>
           <th colspan="4">VOL-1 (2014)</th>
      </tr>
    </thead>
  
    <tbody>
      <tr>
        
           <td>
             <a href="/assets/archieves/2014/JUNE 2014.pdf"><b>  Issue 1</b><br> (June)</a>
           </td>
           <td>
             <a href="/assets/archieves/2014/JULY 2014.pdf"><b>  Issue 2</b><br> (July)</a>
           </td>
           <td>
             <a href="/assets/archieves/2014/AUGUST 2014.pdf"><b>  Issue 3</b><br> (August)</a>
           </td>
           <td>
             <a href="/assets/archieves/2014/SEPTEMBER 2014.pdf"><b>  Issue 4</b><br> (September)</a>
           </td> 
      </tr>
    </tbody>
    <tbody>
      <tr>
        
           <td>
             <a href="/assets/archieves/2014/OCTOBER 2014.pdf"><b>  Issue 5</b><br> (October)</a>
           </td>
           <td>
             <a href="/assets/archieves/2014/NOVEMBER 2014.pdf"><b>  Issue 6</b><br> (November)</a>
           </td>
           <td>
             <a href="/assets/archieves/2014/DECEMBER 2014.pdf"><b>  Issue 7</b><br> (December)</a>
           </td>
      </tr>
    </tbody>
</table>

<table class="archives">
    <thead>
      <tr>
           <th colspan="4">VOL-2 (2015)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2015/JANUARY 2015.pdf">
           <b>  Issue 1</b><br> (January)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/FEBRUARY 2015.pdf"><b>  Issue 2</b><br> (February)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/MARCH 2015.pdf"><b>  Issue 3</b><br> (March)</a>
           </td><td>
             <a href="/assets/archieves/2015/MARCH 2015 SPECIAL ISSUE II.pdf"><b>  Issue 4</b><br> (March Special)</a>
           </td>
           
        
      </tr>
    </tbody>
    <tbody>
      <tr>
       <td>
             <a href="/assets/archieves/2015/APRIL 2015.pdf"><b>  Issue 5</b><br> (April)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/MAY 2015.pdf"><b>  Issue 6</b><br> (May)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/JUNE 2015.pdf"><b>  Issue 7</b><br> (June)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/JULY 2015.pdf"><b>  Issue 8</b><br> (July)</a>
           </td>
           
      </tr>
    </tbody>
    <tbody>
      <tr>
       <td>
             <a href="/assets/archieves/2015/AUGUST 2015.pdf"><b>  Issue 9</b><br> (August)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/SEPTEMBER 2015.pdf"><b>  Issue 10</b><br> (September)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/OCTOBER 2015.pdf"><b>  Issue 11</b><br> (October)</a>
           </td>
           <td>
             <a href="/assets/archieves/2015/NOVEMBER 2015.pdf"><b>  Issue 12</b><br> (November)</a>
           </td>
           
      </tr>
    </tbody>
    <tbody>
      <tr>
       <td>
             <a href="/assets/archieves/2015/DECEMBER 2015.pdf"><b>  Issue 13</b><br> (December)</a>
           </td>
      </tr>
    </tbody>
</table>
<table class="archives">
<thead>
      <tr>
           <th colspan="4">VOL-3 (2016)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2016/JANUARY 2016.pdf">
           <b>  Issue 1</b><br> (January)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/FEBRUARY 2016.pdf"><b>  Issue 2</b><br> (February)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/MARCH 2016.pdf"><b>  Issue 3</b><br> (March)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/APRIL 2016.pdf"><b>  Issue 4</b><br> (April)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2016/MAY 2016.pdf"><b>  Issue 5</b><br> (May)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/JUNE 2016.pdf"><b>  Issue 6</b><br> (June)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/JULY 2016.pdf"><b>  Issue 7</b><br> (July)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/AUGUST 2016.pdf"><b>  Issue 8</b><br> (August)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2016/SEPTEMBER 2016.pdf"><b>  Issue 9</b><br> (September)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/OCTOBER 2016.pdf"><b>  Issue 10</b><br> (October)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/NOVEMBER 2016.pdf"><b>  Issue 11</b><br> (November)</a>
           </td>
           <td>
             <a href="/assets/archieves/2016/DECEMBER 2016.pdf"><b>  Issue 12</b><br> (December)</a>
           </td>
      </tr>
    </tbody>
</table>
    
<table class="archives">
    <thead>
      <tr>
           <th colspan="4">VOL-4 (2017)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2017/JANUARY 2017.pdf">
           <b>  Issue 1</b><br> (January)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/JANUARY 2017 Special Issue III.pdf">
           <b>  Issue 2</b><br> (January Special Issue III)</a>
           </td>
           
           <td>
             <a href="/assets/archieves/2017/FEBRUARY 2017.pdf"><b>  Issue 3</b><br> (February)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/MARCH 2017.pdf"><b>  Issue 4</b><br> (March)</a>
           </td>
           
           
      </tr>
    </tbody>
    <tbody>
      <tr>
       <td>
             <a href="/assets/archieves/2017/APRIL 2017.pdf"><b>  Issue 5</b><br> (April)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/MAY 2017.pdf"><b>  Issue 6</b><br> (May)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/JUNE 2017.pdf"><b>  Issue 7</b><br> (June)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/JULY 2017.pdf"><b>  Issue 8</b><br> (July)</a>
           </td>
           
      </tr>
    </tbody>
    <tbody>
      <tr>
       <td>
             <a href="/assets/archieves/2017/AUGUST 2017.pdf"><b>  Issue 9</b><br> (August)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/SEPTEMBER 2017.pdf"><b>  Issue 10</b><br> (September)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/OCTOBER 2017.pdf"><b>  Issue 11</b><br> (October)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/OCTOBER 2017 Special Issue IV.pdf"><b>  Issue 12</b><br> (October Special Issue IV)</a>
           </td>


      </tr>
    </tbody>
    <tbody>
      <tr>
    
       <td>
             <a href="/assets/archieves/2017/NOVEMBER 2017.pdf"><b>  Issue 13</b><br> (November)</a>
           </td>
           <td>
             <a href="/assets/archieves/2017/DECEMBER 2017.pdf"><b>  Issue 14</b><br> (December)</a>
           </td>
      </tr>
    </tbody>
</table>    
<table class="archives">
    <thead>
      <tr>
           <th colspan="4">VOL-5 (2018)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2018/JANUARY 2018.pdf">
           <b>  Issue 1</b><br> (January)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/FEBRUARY 2018.pdf"><b>  Issue 2</b><br> (February)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/MARCH 2018.pdf"><b>  Issue 3</b><br> (March)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/APRIL 2018.pdf"><b>  Issue 4</b><br> (April)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2018/MAY 2018.pdf"><b>  Issue 5</b><br> (May)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/JUNE 2018.pdf"><b>  Issue 6</b><br> (June)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/JULY 2018.pdf"><b>  Issue 7</b><br> (July)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/AUGUST 2018.pdf"><b>  Issue 8</b><br> (August)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2018/SEPTEMBER 2018.pdf"><b>  Issue 9</b><br> (September)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/OCTOBER 2018.pdf"><b>  Issue 10</b><br> (October)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/NOVEMBER 2018.pdf"><b>  Issue 11</b><br> (November)</a>
           </td>
           <td>
             <a href="/assets/archieves/2018/DECEMBER 2018.pdf"><b>  Issue 12</b><br> (December)</a>
           </td>
      </tr>
    </tbody>
</table>
            
    
<table class="archives">
    <thead>
      <tr>
           <th colspan="4">VOL-6 (2019)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2019/JANUARY 2019.pdf">
           <b>  Issue 1</b><br> (January)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/FEBRUARY 2019.pdf"><b>  Issue 2</b><br> (February)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/MARCH 2019.pdf"><b>  Issue 3</b><br> (March)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/APRIL 2019.pdf"><b>  Issue 4</b><br> (April)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2019/MAY 2019.pdf"><b>  Issue 5</b><br> (May)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/JUNE 2019.pdf"><b>  Issue 6</b><br> (June)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/JULY 2019.pdf"><b>  Issue 7</b><br> (July)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/AUGUST 2019.pdf"><b>  Issue 8</b><br> (August)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2019/SEPTEMBER 2019.pdf"><b>  Issue 9</b><br> (September)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/OCTOBER 2019.pdf"><b>  Issue 10</b><br> (October)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/NOVEMBER 2019.pdf"><b>  Issue 11</b><br> (November)</a>
           </td>
           <td>
             <a href="/assets/archieves/2019/DECEMBER 2019.pdf"><b>  Issue 12</b><br> (December)</a>
           </td>
      </tr>
    </tbody>
</table>
  
<table class="archives">
    <thead>
      <tr>
           <th colspan="4">VOL-7 (2020)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2020/JANUARY 2020.pdf">
           <b>  Issue 1</b><br> (January)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/FEBRUARY 2020.pdf"><b>  Issue 2</b><br> (February)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/MARCH 2020.pdf"><b>  Issue 3</b><br> (March)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/APRIL 2020.pdf"><b>  Issue 4</b><br> (April)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2020/MAY 2020.pdf"><b>  Issue 5</b><br> (May)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/JUNE 2020.pdf"><b>  Issue 6</b><br> (June)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/JULY 2020.pdf"><b>  Issue 7</b><br> (July)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/AUGUST 2020.pdf"><b>  Issue 8</b><br> (August)</a>
           </td>
      </tr>
    </tbody>
    <tbody>
      <tr>
           <td>
             <a href="/assets/archieves/2020/SEPTEMBER 2020.pdf"><b>  Issue 9</b><br> (September)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/OCTOBER 2020.pdf"><b>  Issue 10</b><br> (October)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/NOVEMBER 2020.pdf"><b>  Issue 11</b><br> (November)</a>
           </td>
           <td>
             <a href="/assets/archieves/2020/DECEMBER 2020.pdf"><b>  Issue 12</b><br> (December)</a>
           </td>
      </tr>
    </tbody>
</table>
<?php

// Assuming $conn is your database connection
$stmt = $conn->query("SELECT Month(ctime) as Month, Year(ctime) as Year, ctime, title FROM currentfiles ORDER BY ctime ASC"); // Added title to SELECT

$currentMonth = 0;
$currentYear = 0;
$vol = 7; // Initialize volume starting point
$issueCounterInRow = 0; // To track <td> elements in a row (max 4)
$isFirstYear = true; // Flag to handle table start

echo "<table class='archives'>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // Use PDO::FETCH_ASSOC for clarity

    // If the year changes
    if ($row['Year'] != $currentYear) {
        // If this isn't the very first year, we need to close the previous year's structures
        if (!$isFirstYear) {
            // If the last row of the previous year wasn't full, close the <td> and <tr>
            if ($issueCounterInRow > 0 && $issueCounterInRow < 4) {
                // Add empty TDs to fill the row if you want consistent columns
                for ($i = $issueCounterInRow; $i < 4; $i++) {
                    echo "<td></td>"; // Empty cell
                }
            }
            if ($issueCounterInRow > 0) { // If there were any issues in the last row
                 echo "</tr>"; // Close the last row of the previous year
            }
            echo "</tbody>"; // Close the previous year's body
        }

        $currentMonth = 0; // Reinitialize current month for the new year
        $currentYear = $row['Year'];
        $vol++; // Increment volume for the new year
        $issueForYear = 1; // Reset issue number for the new year

        echo "<thead><tr><th colspan='4'>VOL-$vol ($currentYear)</th></tr></thead>";
        echo "<tbody>";
        // No <tr> here yet, it will be opened when the first month or a new row starts

        $issueCounterInRow = 0; // Reset for the new year's layout
        $isFirstYear = false;
    }

    // If the month changes (and it will, if the year just changed and currentMonth is 0)
    if ($row['Month'] != $currentMonth) {
        if ($issueCounterInRow == 0) { // Start a new row if it's the first issue in this block or after 4 issues
            echo "<tr>";
        }

        $monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
        // $title = $row['title']; // You can use $title here if needed

        echo "<td>";
        echo "<a href='currernt.php?month={$row['Month']}&year={$currentYear}'><b>Issue-$issueForYear</b></a><br>";
        echo "($monthName)";
        // Potentially display $title here
        echo "</td>";

        $currentMonth = $row['Month'];
        $issueForYear++;
        $issueCounterInRow++;

        if ($issueCounterInRow == 4) {
            echo "</tr>"; // Close the row after 4 issues
            $issueCounterInRow = 0; // Reset for the next row
        }
    }
    // Removed the display posts section as it was empty in your original code.
    // If you have content per ctime (not just per month), you'd add it here,
    // likely outside the month change block or carefully within it.
}

// After the loop, close any open tags
if ($issueCounterInRow > 0 && $issueCounterInRow < 4) {
    // Add empty TDs to fill the last row if it's not full
    for ($i = $issueCounterInRow; $i < 4; $i++) {
        echo "<td></td>"; // Empty cell
    }
    echo "</tr>"; // Close the last row
}
if (!$isFirstYear) { // If any year was processed
    echo "</tbody>"; // Close the final body
}
echo "</table>";

?>        

</div>
                  </div>
</div>      </div>




<?php include 'footer.php'; ?>




















