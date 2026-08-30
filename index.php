<?php  include 'header.php';
?><style>


.crnt-isues {
border: 1px solid #ebebeb;
background: #FDFDFD;
padding: 15px 15px 15px 15px;
}
.crnt-isues ol {
padding-left: 5px;
font-family: arial;
}
ul, ol {
margin-top: 0;
margin-bottom: 2px;
}
ol {
display: block;
list-style-type: decimal;
margin-block-start: 1em;
margin-block-end: 1em;
margin-inline-start: 0px;
margin-inline-end: 0px;
padding-inline-start: 40px;
}
.crnt-isues ol li {
border-bottom: 1px solid #dcdcdc;
margin-bottom: 10px;
padding-bottom: 5px;
list-style-type: none;
}
.boxy {
border-radius: 15px;
background-color: #ffffe6;
padding: 5px;
}

.title {
font-size: 16px;
margin-bottom: 0px;
padding-left: 20px;
line-height: 3px;
font-family: Georgia, serif;
}
.title a{
color : darkblue;
}
h3 {
font-size: 16px;
font-weight: 400;
}
.content-type-outer {
display: flex;
justify-content: space-between;
padding-left: 20px;
}
.marginTop10 {
margin-top: 10px !important;
}
.page-range {
color: darkred;
font-size: 20px;
right: 20px;
bottom: 13px;
float: right;
}
</style>


    <main>

        <!-- slider Area Start-->
        <div class="slider-area slider-height" data-background="assets/img/hero/h1_hero.jpg">
            <div class="slider-active">
                <!-- Single Slider -->
                
                <!-- Single Slider -->
                <div class="single-slider">
                    <div class="slider-cap-wrapper">
                        <div class="hero__caption">
                            <!-- <p data-animation="fadeInLeft" data-delay=".2s">Publish your financial goal</p> -->
                            <h1 data-animation="fadeInLeft" data-delay=".5s">INDIAN FARMER</h1>
                            <h2 data-animation="fadeInLeft" data-delay=".9s">Open Access Journal</h2>
                            <h2 data-animation="fadeInLeft" data-delay=".9s">ISSN 2394-1227</h2>
                            <!-- Hero Btn --><br>
                            <a href="currentissues" class="btn hero-btn" data-animation="fadeInLeft" data-delay="2s">Current Issue</a>
                        </div>
                        <div class="hero__img">
                            <img src="assets/img/hero/new.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        

        </div>
        <!-- slider Area End-->
        <!-- About Law Start-->
        <hr class="style-seven">
        <div class="about-low-area section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                                <span>About Us</span>
                                <h2>INDIAN FARMER</h2>
                            </div>
                            <p>Agriculture is the backbone of rural India. Much emphasis is required to transfer the scientific technologies/information  to farmers and policy makers. </p>
                            <p>The Indian Farmer is monthly magazine with ISSN number 2394-1227 publish scientific articles.</p>
                            <p>Indian Farmer is open access scientific research journal publishes articles from multidisciplinary fields.  The Journal publishes selected original research articles, reviews , short communication and Policy Papers in the fields of Agricultural Sciences, Veterinary Sciences and Animal Husbandry,  Fisheries Sciences, Poultry Science, Home Science, Horticultural Sciences, Dairy Science and any other branch. The Journal publishes issue monthly. 
</p>
                            <a href="submit" class="btn">Submit Manuscript</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <div class="about-font-img d-none d-lg-block" >
                                <img src="assets/img/gallery/home2.jpg" alt="" >
                            </div>
                            <div class="about-back-img ">
                                <img src="assets/img/gallery/home1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="style-seven">
        <!-- About Law End-->
        <h2 style='text-align:left; padding:25px;'>Latest Articles</h2>
         <div class="toc crnt-isues" >
    <?php 
                    
                  
                    
                    $mysqli = new mysqli("localhost:3306", "jatinr", "jatinr33", "aavpubli_farm");
                   
                      $query = "SELECT * FROM currentfiles  WHERE  MONTH(ctime) >= MONTH(CURDATE())-1 ORDER BY id desc LIMIT 15";
                   
                    if ($result = $mysqli->query($query)) {

                        while ($row = $result->fetch_assoc()) {
                          ?>
    
                          <?php 
                                            $newDate = date("d-m-Y", strtotime($row['ctime']));  
                                            
                                        ?>  
                                                                      
                                                                      <ol>
                          
                                                                          
                                                                              <li><div class="boxy"  style=" display: flex; ">
                                                                                  <div class="toc-item no-access">
                          
                          
                                                                                      <h3 class="title">
                                                                                          <a href="download.php?url=/uploads/<?php echo $row['cfile'] ?>&id=<?php echo $row['id'] ?>&count=<?php echo $row['dcount'] ?>" target="_blank">
                                                                                          <span class="margin0">
                                                                                              <div style="text-align: justify; white-space: nowrap;"><b><?php echo $row['title'] ?></b></div>
                                                                                          </span>
                                                                                          </a>
                          
                                                                                      </h3><br>
                                                                                      <div class="abstract-content formatted"></div>
                                                                                      <div class="authors" style="padding-left: 20px;">
                                                                                          <?php echo "Author : ".$row['cname'] ?>
                                                                                      </div>
                          
                                                                                      <div class="content-type-outer marginTop10">
                                                                                          <p class="content-type content-type1">
                                                                                              <strong class="labelGray">Date: </strong>
                                                                                             <?php echo $newDate ?>&nbsp;
                                                                                              |
                                                                                              <strong class="labelGray">Download :</strong>
                                                                                              <a style="color:darkblue;" href="download.php?url=/uploads/<?php echo $row['cfile'] ?>&id=<?php echo $row['id'] ?>&count=<?php echo $row['dcount'] ?>" target="_blank">
                                                                                                 PDF&nbsp;
                                                                                              |
                                                                                              </a><strong class="labelGray">Pages :</strong>
                                                                                              <?php echo $row['pages'] ?>
                                                                                              |
                                                                                              <strong class="labelGray">Downloads :</strong>
                                                                                              <?php echo $row['dcount'] ?>
                                                                                          </p>
                                                                                          
                                                                                      </div>
                          
                                                                                  </div></div>
                                                                              </li>
                                                                          
                                                                             
                                                                          
                          
                                                                      </ol>
                          
                                                               <?php
                         }
                         }
                      ?>
                    
                    </div>
                    <div class="section-top-border">
					<h2 style='text-align:left; padding:25px;'>Image Gallery</h2>
					<div class="row gallery-item">
						<div class="col-md-4">
							<a href="assets/gallery/1.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/gallery/1.jpg);"></div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="assets/gallery/2.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/gallery/2.jpg);"></div>
							</a>
						</div>
						<div class="col-md-4">
							<a href="assets/gallery/3.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/gallery/3.jpg);"></div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="assets/gallery/4.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/gallery/4.jpg);"></div>
							</a>
						</div>
						<div class="col-md-6">
							<a href="assets/gallery/5.jpg" class="img-pop-up">
								<div class="single-gallery-image" style="background: url(assets/gallery/5.jpg);"></div>
							</a>
						</div>
					
					</div>
				</div>
                        </div>
        
    </main>
  <?php include 'footer.php';?>