	<footer class="footer" id="footer">
		<div class="container">
			<div class="footer-widget row">
				<div class="col-sm-6">
					<img src="<?php echo $base_url.'/sites/all/themes/leverandors/images/logo_footer_dt_1x.svg' ?>" alt="" />
					<p>Leverand&oslash;rdatabasen er et redaksjonelt produkt eid av Kommunal Rapport.<br/>Sammenstillingen er opphavsrettslig beskyttet.<br/>
					Ansvarlig redakt&oslash;r og administrerende direkt&oslash;r: <a href="mailto:bsh@kommunal-rapport.no">Britt Sofie Hestvik</a></p><br>
					<p>Boks 1940 Vika, 0125 Oslo.<br/>
					<a href="mailto:leverandor@kommunal-rapport.no">leverandor@kommunal-rapport.no</a><br/>
					24 13 64 50.</p>
				</div>
				<div class="col-sm-6 subscription-form">
					<p>Abonner på vårt nyhetsbrev! Du får max én e-post i måneden.</p>
					<?php print render($page['newsletter']); ?>
					<!--<input name="subscribe" placeholder="E-postadresse" class="footer-search"/>
					<input type="submit" name="submit" value="Abonner" class="footer-btn" />-->
				</div>
			</div>
		</div>
	</footer>


<script type="text/javascript">
	WebFontConfig = {
		google: { families: [ 'Exo+2:400,600,800,700,300:latin' ] }
  	};
  	
	(function() {
		var wf = document.createElement('script');
		wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
  	})(); 


	 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	 
	  ga('create', 'UA-4041367-6', 'auto');
	  ga('send', 'pageview');
					
  	$(document).ready(function () {

		function headerStick(){
			var hd = $('.header').outerHeight();
			$('body').toggleClass("sticky", ($(window).scrollTop() > hd));
		}

		function mainContents() {
			var hd = $('.header').outerHeight() - 1;
			$('.main').css('margin-top', hd);
		}

		/*function sidebarSticking(){
			if($(".sidebar-stickable").length){
				var hd = $('.top-bar').outerHeight(),
					ft = $('.footer').outerHeight(),
					wd = $('.sidebar-stickable-container').width(),
					wn = $(document).height(),
					ht = wn - hd,
					caclHt = wn - (hd + ft);

				if ( $(document).scrollTop() > hd ){
					$(".sidebar-stickable").css({
						'width': wd,
						// 'height': ht,
						'position': 'fixed',
						'top': hd,
						'bottom': '0',
						'overflow': 'auto'
					});
				}
				else if ( $(document).scrollTop() > caclHt ){
					console.log('calc height area');
					$(".sidebar-stickable").css({
						'width': wd,
						// 'height': ht,
						'position': 'fixed',
						'top': hd,
						'bottom': ft,
						'overflow': 'auto'
					});
				}
				else {
					$(".sidebar-stickable").css({
						'width': 'auto',
						'height': 'auto',
						'position': 'static',
						'top': 'auto',
						'overflow': 'visible'
					});
				}
			}
		}*/

		function sidebarSticking(){
			if($(".sidebar-stickable").length){

				var winScroll = $(window).scrollTop(),
					ft = $(".footer").offset().top,
					stc = $('.stick-point').offset().top,
					bar = $(".sidebar-stickable").height(),
					padding = 20,
					tp = $('.top-bar').outerHeight(),
					wd = $('.sidebar-stickable-container').width(),
					win = $(window).width();

					if ( $(window).width() >= 768 ) {
		
						if ( winScroll + bar > ft - padding ){
							$(".sidebar-stickable").css({
								'width': wd,
								'position': 'fixed',
								'top': (winScroll + bar - ft + padding) * -1
							});
						}
						else if ( winScroll > stc ){
							$(".sidebar-stickable").css({
								'width': wd,
								'position': 'fixed',
								'top': tp
							});
						}
						else {
							$(".sidebar-stickable").css({
								'width': 'auto',
								'position': 'static',
								'top': 'auto',
								'overflow': 'visible'
							});
						}

					}
					else {
						$(".sidebar-stickable").css({
							'width': 'auto',
							'position': 'static',
							'top': 'auto',
							'overflow': 'visible'
						});
					}

			}
		}

		$(window).scroll(function () {
			headerStick();
			sidebarSticking();
		});


		headerStick();
		mainContents();
		sidebarSticking();

		$(window).resize(function() {
			mainContents();
			sidebarSticking();
		});

		
		$(".nav-btn").click(function(){
	        $(".user-link").slideToggle();
	        $(this).toggleClass('open');
	    });

		$('li.menuparent').append('<span class="menu-triger"></span>');

		$('.menu-triger').on('click', this, function(){
			$(this).closest('.menuparent').find('ul').toggleClass('open');
		});

		jQuery('#node-15 .submitted').hide();


		$("#edit-locale").css('display', 'none');
		$("#edit-timezone").css('display', 'none');
		$("#edit-picture").css('display', 'none');
		
		$("#edit-mergevars-email").removeClass('form-text').addClass('footer-search');
		
		$("#edit-mergevars-email").attr("placeholder", "E-postadresse");
		$("#edit-submit--2").removeClass('form-submit').addClass('submit-btn3');
		$("#edit-submit--3").removeClass('form-submit').addClass('submit-btn3');
		$("#edit-submit--4").removeClass('form-submit').addClass('submit-btn3');
		$('form.mailchimp-signup-subscribe-form input[type="submit"]').attr('class','').addClass('footer-btn');


		jQuery('#edit-chtype').change(function() {
			if($(this).is(":checked")) {
				$('#edit-meldingsfelt').val('Jeg &#248;nsker &#229; abonnere p&#229; tjenesten');
				$('#edit-meldingsfelt').prop("disabled", "disabled");
				
				$('.form-item-meldingsfelt').hide();
				$('#edit-dumpy').show();
		    }
			else
			{
				$('#edit-meldingsfelt').val("");
				$('#edit-meldingsfelt').removeAttr("disabled");

				$('.form-item-meldingsfelt').show();
				$('#edit-dumpy').hide();
			}
	 	});
		
		$("#edit-name").attr("placeholder", "brukernavn");
		$("#edit-pass").attr("placeholder", "passord");
		
		
	});
</script>


</body>
</html>
