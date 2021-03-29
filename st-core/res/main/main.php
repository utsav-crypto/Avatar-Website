<!DOCTYPE html>
<html lang="en">

<head>

	{{head}}
</head>

<body class="body">
	<div id="particles-js" class="container-fluid"></div>
	<div class="av-bg-logo anim-back-2d">
		<!-- <img src="asset/img/ext/bg1.jpg" width="100%" height="100%"> -->
	</div>

	<div class="mycontainer animated fadeIn" id="top-logo">
		<img src="asset/img/ext/avatar.png" width="100%" height="100%" />
	</div>
	<div id="solar" class="fadeIn">
		<div class="solar-bg"></div>
		<div id="at-solar" class="anim-solarStart">
			<div id="solar-events" class="anim-rClock orbit">
				<div class="planet anim-rPlanetClock" av-name="events">
					<dl style="color: dodgerblue;" class="infos">
						<dt></dt>
						<dd><span>Events</span></dd>
					</dl>
				</div>
			</div>
			<div id="solar-about-us" class="anim-rAntiClock orbit">
				<div class="planet anim-rPlanetAntiClock" av-name="aboutus">
					<dl style="color: dodgerblue;" class="infos">
						<dt></dt>
						<dd><span>About Us</span></dd>
					</dl>
				</div>
			</div>
			<div id="solar-contactus" class="anim-rClock orbit">
				<div class="planet anim-rPlanetClock" av-name="contactus">
					<dl style="color: dodgerblue;" class="infos">
						<dt></dt>
						<dd><span>Contact Us</span></dd>
					</dl>
				</div>
			</div>
			<div id="solar-sponsors" class="anim-rAntiClock otbit">
				<div class="planet anim-rPlanetAntiClock" av-name="sponsors">
					<dl style="color: dodgerblue;" class="infos">
						<dt></dt>
						<dd><span>Sponsors</span></dd>
					</dl>
				</div>
			</div>
			<div id="solar-ourteam" class="anim-rClock orbit">
				<div class="planet anim-rPlanetClock" av-name="ourTeam">
					<dl style="color: dodgerblue;" class="infos">
						<dt></dt>
						<dd><span>OUR TEAM</span></dd>
					</dl>
				</div>
			</div>
			<div id="solar-workshop" class="anim-rAntiClock orbit">
				<div class="planet anim-rPlanetAntiClock" av-name="workshop">
					<dl style="color: dodgerblue;" class="infos">
						<dt></dt>
						<dd><span>Work Shop</span></dd>
					</dl>
				</div>
			</div>
			<div id="at">
				<div class="planet anim-rSun" av-name="sun">

				</div>
			</div>
		</div>
	</div>

	<div id="bg-blur"></div>

	<canvas id="bubble"></canvas>
	<div id="clg-iic-logo" class="animated fadeIn">
		<div id="top-college-logo">
			<a target="_blank" href="http://recbanda.ac.in/"><img src="asset/img/ext/rec.png" width="100%" height="100%" /></a>
			<span class="logo-lable">REC Banda</span>
		</div>
		<div class="vertical-line"></div>
		<div id="top-iic-logo">
			<a target="_blank" href="http://recbanda.ac.in/"><img src="asset/img/ext/iic.png" width="100%" height="100%" /></a>
			<span class="logo-lable">IIC REC Banda</span>
		</div>
	</div>
	<div id="marquee" style="z-index:21;"><marquee width="100%"  onmouseover="this.stop();"
           onmouseout="this.start();" style="position:absolute; top:11%;color:white;"><b><a target="_blank" style="color:#1cb096;" href="https://forms.gle/brSykWtJnCWZE2cZ9"><h5 style="text-shadow:5px 5px 35px white;">New event "MEMEWAR" | <span style="color:red;">Register Now!</span></h5></a></b></marquee></div>
	<nav id="mainnav">
		<ul>
			<li><a class="nav-item">HOME</a></li>
			<li><a class="nav-item">EVENTS</a></li>
			<li><a class="nav-item">WORKSHOPS</a></li>
			<li><a class="nav-item">OUR TEAM</a></li>
			<li><a class="nav-item">CONTACT US</a></li>
			<li><a class="nav-item">ABOUT US</a></li>
		</ul>
	</nav>
	<!-- <li><a class="nav-item"><button type="button" data-toggle="modal" data-target="#exampleModalLong">MERCHANDISE</button></a></li> -->
<!-- Modal Merchandise -->
<div class="modal fade" id="exampleModalLong" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content shadow">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h2 class="modal-title" style="text-align: center; color: white; width: 100%; margin: auto;">Avatar'20 Official Merchandise
                    </h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                 <div class="container">
								  <div class="row justify-content-md-center">
									 <div class="col-md-auto">
									  <img src="asset/img/ext/design.jpg" alt="merchandise">
									 </div>
									</div>
									<div class="row justify-content-md-center">
									 <div class="col-md-2">
									  <button>Buy</button>
									 </div>
									</div>
								 </div>   
                </div>
								 <!-- Modal Footer -->
								 <div class="modal-footer" style="background-color:#1cb096;">
                    <h5 class="modal-title" style="text-align: center; color: white; width: 100%; margin: auto;">After buying, mail the receipt at, receipt@avtr.org.in
                    </h5>
                </div>
								<!-- end footer -->
            </div>

        </div>
    </div>
<!-- end Merchandise -->
	<div class="hamb">
		<a><i class="fa fa-bars"></i></a>
	</div>
	<div id="av-section">
		<div style="position: fixed; top: 1.5%; left: 50%; transform: translate(-50%,0); display: block;">
			<a class="homeOpen csr-pointer" style=" display: inline-block; color: #1cb096; font-size: 30px;">
				<i class="fas fa-home"></i>
			</a>
		</div>
		<div class="cnt scroll">

		</div>
	</div>
	<div class="drop-us animated slideInLeft" id="drop-us">
		<button type="button" onclick="this.parentElement.classList.remove('slideInLeft');this.parentElement.classList.add('bounceOutLeft');this.parentElement.style.display='block';" class="close">&times;</button>
		<span style="vertical-align: middle;" data-toggle="modal" data-target="#drop-us-modal">For any query, Write us...</span>
	</div>

	<div id="drop-us-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<form class="form-horizontal" method="post" action="">
						<span class="required">* Required</span>
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">
								<span class="required">*</span> Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="name" name="name" placeholder="First & Last" required>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">
								<span class="required">*</span> Email: </label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="email" name="email" placeholder="you@domain.com" required>
							</div>
						</div>
						<div class="form-group">
							<label for="message" class="col-sm-3 control-label">
								<span class="required">*</span> Message:</label>
							<div class="col-sm-9">
								<textarea name="message" rows="4" required class="form-control" id="message" placeholder="Comments"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
								<button type="submit" id="submit" name="submit" class="btn-primary">SUBMIT</button>
							</div>
						</div>
						<!--end Form-->
					</form>
					<div class="success">

					</div>
					<div class="error">

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="astro">
		<img src="asset/img/ext/asteroid.png">
		<div class="arrow">
			<div class="astrodrop">
			</div>
		</div>
	</div>

	<div class="exclemation">!</div> -->
	{{footer}}
</body>

</html>
