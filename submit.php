<?php  include 'header.php';
?>
<style>.boxy {
  border-radius: 15px;
  background-color: lightgray;
  padding: 20px;
  text-align: center;
}


input[type=text], select, textarea {
  width: 80%;
  padding: 12px;
  border: 5px solid #ccc;
  border-radius: 10px;
  resize: vertical;
}
input[type=email], select, textarea {
  width: 80%;
  padding: 12px;
  border: 5px solid #ccc;
  border-radius: 10px;
  resize: vertical;
}

label {
 
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}


.col-25 {
  float: left;
  width: 30%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 70%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.rowe:after {
  content: "";
  display: table;
  clear: both;
}
.subm{
  display: flex;
  justify-content: center;
  align-items: center;
  
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}</style>
<div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center">
			<div class="container">
					<div class="row">
						<div class="col-xl-12">
						<div class="hero-cap text-center pt-2">
								<h2>Submit Manuscript</h2>
							
						</div>
						</div>
					</div>
			</div>
		</div> 
        <div class="boxy">
            Authors are requested to submit the manuscript in word file on email id<br>
            <h3>indianfarmer2014@gmail.com</h3>
        </div>

<!-- 
<div class="boxy">
	<img src="pay.jpeg" alt="image description" width="200" height="250" align="right">
<p>Authors are requested to pay <b>Rs.1000/- </b>at the time of submission of manuscript<br> as a processing/publication charge.<br>
		<b>Account detail</b><br>

Name:  Monica V Kamble <br>
Account No.62204799816,<br>
SBI BANK<br>
Cantonment, Gawalipura, Aurangabad<br>
IFSC SBIN0020005<br>
</p>
  

  <form action="submitfile.php" class="form-horizontal"  method="post"  enctype="multipart/form-data" accept-charset="utf-8">
    <div class="rowe">
      <div class="col-25">
        <label for="fname">Title Of The Manuscript</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="title" placeholder="Title Here" required>
      </div>
    </div>
    <div class="rowe">
      <div class="col-25">
        <label for="lname">Name Of Corresponding Author</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="author" placeholder="Author Name" required>
      </div>
    </div>
    <div class="rowe">
      <div class="col-25">
        <label for="subject">Email-Id</label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="Email Here" required />
      </div>
    </div>
    <br>
    <div class="rowe">
      <div class="col-25">
        <label for="subject">Attach The Manuscript (Max Size 50MB)</label>
      </div>

      <div class="col-75">
        <input type="file"  name="file" onchange="validate_file(this.id, this.value)"  required>
      </div>
    </div><br>
    <div class="rowe">
      <div class="col-25">
        <label for="subject">Transaction-Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="trans" name="trans" placeholder="Proof Of Payment" required />
      </div>
    </div>
   
   
    <div class="subm">
      <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</div> -->

</div>









  <?php include 'footer.php';?>