<!DOCTYPE html>

<html>
<head>
	
<?php include('partials-front/menu.php'); ?>
	
    
    
</head>
<body>
<link rel="stylesheet" href="order.css">

	<section id="last">
	<!-- heading -->
	<div class="full">
	
		<h3>Drop a Message</h3>

		<div class="food-menu">

		<!-- form starting -->
		<form class="form-horizontal"
				method="post" action="contactus.php">
			<div class="form-group">
			<div class="col-sm-12">
				<!-- name -->
				<input
				type="text"
				class="input-responsive"
				id="name"
				placeholder="NAME"
				name="name"
				value=""
				/>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
				<!-- email -->
				<input
				type="email"
				class="input-responsive"
				id="email"
				placeholder="EMAIL"
				name="email"
				value=""
				/>
			</div>
			</div>

			<!-- message -->
			<span class="send-text">Please Enter your text here : </span><br /><br /><br />
			<textarea
			class="order"
			rows="10"
			
			placeholder="MESSAGE"
			name="message">
			
			</textarea>
			<br /><br /><br />
			<button
			class="btn btn-primary send-button"
			id="submit"
			type="submit"
			value="SEND">
			<i class="fa fa-paper-plane"></i>
			<span class="send-text">SEND</span>
			</button>
		</form>
		<!-- end of form -->
		</div>

		<!-- Contact information -->
		<div class="rt">
		<ul class="contact-list">
			<li class="list-item">
			<i class="fa fa-map-marker fa-1x">
				<span class="contact-text place">
				Lebanon/hasbaya/AL khalwat
				</span>
			</i>
			</li>

			<li class="list-item">
			<i class="fa fa-envelope fa-1x">
				<span class="contact-text gmail">
				<a href="mailto:yourmail@gmail.com" title="Send me an email">
					nader.abouibrahim1@gmail.com</a>
				</span>
			</i>
			</li>

			<li class="list-item">
			<i class="fa fa-phone fa-1x">
				<span class="contact-text phone">
				+96178813046
				</span>
			</i>
			</li>
		</ul>
		</div>
	</div>
	<div>
     <iframe width="500" height="400" frameborder="0" src="https://www.bing.com/maps/embed?h=400&w=500&cp=33.906521567957284~35.57868719100952&lvl=16&typ=d&sty=r&src=SHELL&FORM=MBEDV8" scrolling="no">
     </iframe>
     <div style="white-space: nowrap; text-align: center; width: 500px; padding: 6px 0;">
        <a id="largeMapLink" target="_blank" href="https://www.bing.com/maps?cp=33.906521567957284~35.57868719100952&amp;sty=r&amp;lvl=16&amp;FORM=MBEDLD">View Larger Map</a> &nbsp; | &nbsp;
        <a id="dirMapLink" target="_blank" href="https://www.bing.com/maps/directions?cp=33.906521567957284~35.57868719100952&amp;sty=r&amp;lvl=16&amp;rtp=~pos.33.906521567957284_35.57868719100952____&amp;FORM=MBEDLD">Get Directions</a>
    </div>
</div>
        </div>
			
</body>
</html>
    <?php include('partials-front/footer.php'); ?>
	</section>
          
