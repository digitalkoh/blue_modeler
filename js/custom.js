$(document).ready(function(){
		
		function scrollTo(d){
			$('html, body').animate({
				scrollTop: $(d).offset().top
			}, 800);
		};
		
		
		/*
			========================================
			========================================
			// START Form flow 
			========================================
			========================================
		*/
		if($("#modeler-hsa").length){ // Run below only when HSA modeler exists
			
			var form = $("#modeler-hsa");
			
			// Onload, hide all fields except the first flow.
			$(".flowgroup", form).not(".firstflow").hide();
			
			function fillindollar(inputname){
				$("#summary #sum-" + inputname).text("$" + (parseInt($("#" + inputname).val())).formatMoney(2));
			}
			
			// Populate tile in the right rail after calculate
			function populateSideTiles(){
				// Call post only if #resultSide does not exist (to prevent from duplicating)
				if(!$("#resultSide").length){
					$.post("inc/result_tiles.php",
					function(data){
						$("#modeler-hsa form").after("<div id='resultSide' class='col w30'>"+ data +"</div>");
						winsize();
					}); // end .post > data	
				} 
			}
			
			function populateData(){
				//relocate form
				$("#editData").prepend($("#modeler-hsa .flowgroup"));
				$(".flowgroup").show();
				$(".flowgroup .video").hide();
				
				// Modify look
				$("#flowMessage").hide();
				$("#modeler-hsa").addClass("col2");
				$("#modeler-hsa").css("background","#fff url('img/tile_slash.png') 0 -24px repeat-x");
				
				populateSideTiles();									
			}
			
			function postCalc(){
				$("#output").slideToggle();
				$(".flowgroup", form).hide();
				$("#model-back").hide();
				$("#model-calc").hide();
				populateData();
				simulateHSA();
			}
			
			// NEXT BUTTON ==================================
			$("#model-next").click(function(){
				var thisBt = $(this);
				var activeGroup = $(".flowgroup:visible");
				var nextGroup = $(".flowgroup:visible").next(".flowgroup");
				
				
				// Hide current group only if next group exists
				if(nextGroup.length){
					activeGroup.hide("slide", { direction: "left" }, 300);
					//activeGroup.hide("fade", 500);
				}
				
				nextGroup.show("slide", { direction: "right" }, 300);
				//nextGroup.show("fade", 500);
				//$("input", nextGroup).focus();
				
				if($(".calcReady").is(":visible")){
					$("#model-calc").show();
					$("#model-next").hide();
				}
				
				if($("#model-back").is(":hidden")){
					$("#model-back").show();
				}
			});
			
			// BACK BUTTON ==================================
			$("#model-back").click(function(){
				var activeGroup = $(".flowgroup:visible");
				var nextGroup = $(".flowgroup:visible").prev(".flowgroup");
				// Hide current group only if next group exists
				if(nextGroup.length){
					activeGroup.hide("slide", { direction: "right" }, 300);
					//activeGroup.hide("fade", 500);
				}
				nextGroup.show("slide", { direction: "left" }, 300);
				//nextGroup.show("fade", 500);
				//$("input", nextGroup).focus();
				
				if($("#model-calc").is(":visible")){
					$("#model-calc").hide();
				}
				if($("#model-next").is(":hidden")){
					$("#model-next").show();
				}
				
				if($(".firstflow").is(":visible")){
					$("#model-back").hide();
				}
			});
			
			$("#model-calc").click(function() {
				postCalc();
				e.preventDefault();
			});
			
			$("#model-over").click(function() {
				location.reload();
			});
			
			
			// EDIT DTA RECALC ==================================
			$("#editData .recalc").click(function(e){
				simulateHSA();
				//e.preventDefault();		
			});
 			
 			// TAX RATE DROPDOWN ==================================
			$("#taxrate").change(function(){
				populateData();
				simulateHSA();		
			});
	
			
			// Create text toggle plugin
			$.fn.toggleText = function(t1, t2){
				if (this.text() == t1) this.text(t2);
				else                   this.text(t1);
				return this;
			};
			
			// Initial button visibility settings
			$("#model-back").hide();
			$(".taxrelated").hide();
			
			// SHOW TAX SAVINGS BUTTON ==================================
			$("#showtax").click(function(e) {
				$(".taxrelated").slideToggle();
				$("#showtax").toggleText('Hide', 'Show');
				e.preventDefault();
			});
			
			// CHANGE CRITERIA SHOW/HIDE BUTTON ==================================
			$(".expanddiv .trigger a.change").click(function(e){
				$(this).parent().next().slideToggle();
				$(this).toggleText('Hide Data', 'Change Your Data');
				scrollTo("#summary");
				e.preventDefault();
			});
			
			// detect screen size to determine where to place tiles
			function winsize(e){
				var winWidth = $(window).width();
				if($("#resultSide").length){
					if(winWidth < 781){
						$(".formfooter #modelerinfo").after($("#resultSide")); // --> to bottom of footer in mobile
					}else{
						$("#modeler-hsa form").after($("#resultSide")); // --> to right rail in desktop
					}
				}
			}
			
			$(window).resize(function(){
				winsize();
			});	
			
			
			// Animate result bg color
			function bgAnimate(){
				$(".outputblock.head div").animate({
					color:'#000',
					backgroundColor:'rgb(253, 251, 222)'
				},500, function(){
					$(this).animate({
						color:'#5fba04',
						backgroundColor:'transparent'
					});
				}); 
			}

		};
		/*
			========================================
			========================================
			// END Form flow 
			========================================
			========================================
		*/


		
		// ================================================================================================================
		// START - Money functions (convert number into money and toggle between pay period and annual)
		Number.prototype.formatMoney = function(c, d, t){
		var n = this, 
			c = isNaN(c = Math.abs(c)) ? 2 : c, 
			d = d == undefined ? "." : d, 
			t = t == undefined ? "," : t, 
			s = n < 0 ? "-" : "", 
			i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
			j = (j = i.length) > 3 ? j % 3 : 0;
		   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
		 };
		// END - Money functions
		// ================================================================================================================



		// IMPORTANT Please Read!
		// This is a TEMPORARY simulation for demo purposes only.
		// Calculations below are placeholder only. 
		// These are fake calculations. 
		// This is ONLY a placeholder for the demo.
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		var valContribution = $("#model-output-cont div");
		var valEarning = $("#model-output-earning div");
		var valEstimated = $("#model-output-estimated div");
		var valTotal = $("#model-output-total div");
		var valTaxsave = $("#model-output-taxsavings div");
		
		
		function checkForBlank(e) {
			if($(e).val() === "" || $(e).val() === null){
				//return parseInt($(e).val());
				return 0;
			}else{
				//return 0;
				
				return parseInt($(e).val().replace(",", ""));
			}
		}
		
		function simulateHSA(){
			var hsabal = checkForBlank("#hsabalance");
			var ccont = checkForBlank("#companycont");
			var ycont = checkForBlank("#yourcont");
			var catchup = checkForBlank("#catchup");
			var wd = checkForBlank("#withdraw");
			var totalcont = hsabal + ccont + ycont + catchup;
			var save = ycont * .020;
			var rate = .075;
			var estimated = totalcont + (totalcont * rate) - wd;
			
			$(valContribution).text("$" + (totalcont).formatMoney(2));
			$(valEarning).text("$" + (totalcont * rate).formatMoney(2));
			$(valEstimated).text("$" + (estimated).formatMoney(2));
			$(valTaxsave).text("$" + (save).formatMoney(2));
			$(valTotal).text("$" + (estimated + save).formatMoney(2));
			
			bgAnimate();
		}
		// END demo placeholder
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


		
		// ATTACH LIGHTBOX EVENT ==============================
		// Append input label description Lightbox call
		if($(".moreInfoIcon").length){
			$(".moreInfoIcon").addClass("fancybox");
			
			var infoIcons = $(".moreInfoIcon");
			
			$.each(infoIcons, function(i){
				var txt = $(this).attr("data-moreinfo");  // extract 'for' value
				$(this).attr("href", "#moreinfo-" + txt); // rewrite href, append original text at end
			});
		};
		
		$(".various").fancybox({
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
		
		$(".fancybox").fancybox({
			maxWidth	: 600,
			maxHeight	: 500
		});
		
		$(".fancybox-form").fancybox({
			maxWidth	: 600,
			maxHeight	: 500,
			modal       : true,
			closeClick  : true
		});
		
		$(".fancybox-media").fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});
})
// END jq document ready