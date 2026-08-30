<?php  include 'header.php';
?>

<style>
    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: #4CAF50;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 

    .crnt-isues {
    border: 1px solid #ebebeb;
    background: #FDFDFD;
    padding: 15px 15px 25px 15px;
}
.crnt-isues ol {
    padding-left: 5px;
    font-family: arial;
}
ul, ol {
    margin-top: 0;
    margin-bottom: 10px;
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
    margin-bottom: 15px;
    padding-bottom: 11px;
    list-style-type: none;
}
.boxy {
  border-radius: 15px;
  background-color: #ffffe6;
  padding: 6px;
}

.title {
    font-size: 16px;
    margin-bottom: 3px;
    padding-left: 20px;
    line-height: 23px;
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

<?php
if(isset($_GET['month']))
{
    $month=$_GET['month'];
    $year=$_GET['year'];
}

$monthName = date("F", mktime(0, 0, 0, $month, 10));
?>





        <div class="slider-area slider-height" data-background="assets/img/hero/h1_hero.jpg">
            <div class="slider-active">
                <!-- Single Slider -->
                
                <!-- Single Slider -->
                <div class="single-slider">
                    <div class="slider-cap-wrapper">
                        <div class="hero__caption">
                            <!-- <p data-animation="fadeInLeft" data-delay=".2s">Publish your financial goal</p> -->
                            <h2 data-animation="fadeInLeft" data-delay=".5s">Archives <?php echo $monthName ," ",$year?></h2>
                           
                            <!-- Hero Btn -->
                          </div>
                        <div class="hero__img">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        
        <div class="toc crnt-isues">
    <?php 
                    
                  
                    
                    $mysqli = new mysqli("localhost:3306", "jatinr", "jatinr33", "aavpubli_farm");
                   
                      $query = "SELECT * FROM currentfiles  WHERE  MONTH(ctime) = $month AND YEAR(ctime) = $year ORDER BY id desc";
                   
                    if ($result = $mysqli->query($query)) {

                        while ($row = $result->fetch_assoc()) {
                          ?>
    
                          <?php 
                                            $newDate = date("d-m-Y", strtotime($row['ctime']));  
                                            
                                        ?>  
                                                                      
                                                                      <ol>
                          
                                                                          
                                                                              <li><div class="boxy">
                                                                                  <div class="toc-item no-access">
                          
                          
                                                                                      <h3 class="title">
                                                                                          <a href="download.php?url=/uploads/<?php echo $row['cfile'] ?>&id=<?php echo $row['id'] ?>&count=<?php echo $row['dcount'] ?>" target="_blank">
                                                                                          <span class="margin0">
                                                                                              <div style="text-align: justify;"><b><?php echo $row['title'] ?></b></div>
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
                                                                                      </div>
                          
                                                                                  </div></div>
                                                                              </li>
                                                                          
                                                                             
                                                                          
                          
                                                                      </ol>
                          
                                                               <?php
                         }
                         }
                      ?>
                    
                    </div> <!-- end article section -->
            



  <?php include 'footer.php';?>