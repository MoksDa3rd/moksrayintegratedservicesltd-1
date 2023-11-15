<style>
        /* Add your CSS styles here */
        .loading-animation::before {
            content: "Loading...";
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .success-tick::before {
            content: "\2713"; /* Unicode for checkmark */
            color: green;
        }
    </style>


<!-- Start Footer & Subscribe Section -->
<section class="footer-subscribe-wrapper">
		<!-- Start Subscribe Section -->
		<div class="subscribe-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="subscribe-content">
                    <h2>Sign Up for Our Newsletter</h2>
                    <p>We Offer an Informative Monthly Technology Newsletter - Check It Out.</p>
					
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <form id="newsletter-form" class="newsletter-form">
                    <input type="email" class="input-newsletter" name="email" id="email" placeholder="Enter Your Email" required autocomplete="off">
                    <button type="submit">Subscribe Now</button>
					
                </form>
				<div id="subscribe-message"></div>

            </div>
        </div>
    </div>
</div>
		<!-- End Subscribe Section -->
		<!-- Start Footer Section -->
		<div class="footer-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<a class="footer-logo" href="#">
								<img src="assets/img/moksray.png" width="100" class="white-logo" alt="logo">
							</a>
							<p>Your Gateway to Technological Excellence</p>
							<p>Moksray Integrated Services LTD is a dynamic and forward-thinking company dedicated to providing a wide array of innovative solutions to meet the diverse needs of businesses and individuals. With a rich tapestry of services and a commitment to excellence, we are your trusted partner in navigating the ever-evolving world of technology and services.</p>
							<!-- <ul class="footer-social">
								<li>
									<a href="#"> <i class="fab fa-facebook-f"></i></a>
								</li>
								<li>
									<a href="#"> <i class="fab fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"> <i class="fab fa-youtube"></i></a>
								</li>
								<li>
									<a href="#"> <i class="fab fa-linkedin"></i></a>
								</li>
							</ul> -->
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Our Services</h3>
							</div>
							<ul class="footer-quick-links">
							<li> <a href="mediaservices.php">Media Magic</a></li>
								<li> <a href="HR.php">HR Excellence</a></li>
								<li> <a href="elect.php">Tech Wizards</a></li>
								<li> <a href="renewable.php">Renewable-energy Services</a></li>
								<li> <a href="medical.php">Healthcare Innovators</a></li>
								<li> <a href="industrial.php">Robotics Revolution</a></li>
								<li> <a href="website.php">Digital Dreamweavers</a></li>
								<li> <a href="sales.php">Your One-Stop Shop</a></li>
							
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Useful Links</h3>
							</div>
							<ul class="footer-quick-links">
								<li><a href="about.php">About Us</a></li>
								<li><a href="index.php">Home</a></li>
								<li><a href="contact.php">Contact Us</a></li>
								<li><a href="services.php">Services</a></li>
								<li><a href="privacy-policy.php">Privacy Policy</a></li>
								<li><a href="terms-condition.php">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6">
						<div class="single-footer-widget">
							<div class="footer-heading">
								<h3>Contact Info</h3>
							</div>
							<div class="footer-info-contact">
								<i class="flaticon-phone-call"></i>
								<h3>Phone</h3>
								<span><a href="tel:+234 705 870 0722">+234 705 870 0722</a></span>
							</div>
							<div class="footer-info-contact">
								<i class="flaticon-envelope"></i>
								<h3>Email</h3>
								<span><a href="mailto:mokoloraymond5@gmail.com">mokoloraymond5@gmail.com</a></span>
							</div>
							<div class="footer-info-contact">
								<i class="flaticon-placeholder"></i>
								<h3>Address</h3>
								<span>No. 28, Refinery Drive, NNPC Housing Complex, Ekpan, Warri, Delta State.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Section -->
	</section>
	<!-- End Footer & Subscribe Section -->
	
	<!-- Start Copy Right Section -->
	<div class="copyright-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-md-6">
					<p><i class="far fa-copyright"></i>  <script>
                  document.write(new Date().getFullYear());
                </script> Moksray Integrated Services LTD - All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 col-md-6">
					<ul>
						<li><a href="terms-condition.php">Terms & Conditions</a></li>
						<li><a href="privacy-policy.php">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Copy Right Section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.newsletter-form').submit(function(event) {
                event.preventDefault();

                // Store the button element
                var subscribeButton = $('.subscribe-button');

                // Add loading animation
                subscribeButton.html('<span class="loading-animation"></span> Subscribing...');

                $.ajax({
                    type: 'POST',
                    url: 'subscribe.php', // The PHP script URL
                    data: $(this).serialize(),
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status === 'success') {
                            // Replace loading animation with success tick
                            subscribeButton.html('<span class="success-tick">&#10004;</span> Subscribed');
                        } else if (result.status === 'error') {
                            // Revert button to its original state on error
                            subscribeButton.text('Subscribe Now');
                            alert('An error occurred: ' + result.message);
                        }
                    },
                    error: function() {
                        // Revert button to its original state on error
                        subscribeButton.text('Subscribe Now');
                        alert('An error occurred.');
                    }
                });
            });
        });
    </script>
