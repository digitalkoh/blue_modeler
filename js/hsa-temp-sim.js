//$(document).ready(function(){
	
		// Widget Flow Style Form
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
				$("#summary #sum-coveragecategory").text($("#coveragecategory option:selected").text());
				fillindollar("hsabalance");
				fillindollar("companycont");
				fillindollar("yourcont");
				fillindollar("catchup");
				fillindollar("withdraw");
				$("#summary #sum-earning").text($("#earning").val());
				$("#summary #sum-growth").text($("#growth").val());
				
				// Modify the look
				$("#flowMessage").hide();
				$("#modeler-hsa").addClass("col2");
				$("#modeler-hsa").css("background","#fff url('img/tile_slash.png') 0 -20px repeat-x");
				
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
			
			
			$("#model-next").click(function(){
				var thisBt = $(this);
				var activeGroup = $(".flowgroup:visible");
				var nextGroup = $(".flowgroup:visible").next(".flowgroup").not(".pauseflow");
				
				
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
			
			
			//Edit button
			function stripsub(t){
				var inputname = t.prev().attr("id");
				inputname = inputname.substring(4);
				return inputname;
			}
			
			if($(".editIcon").length){
				$(".editIcon").addClass("fancybox-form");
				var editbt = $(".editIcon");
				
				$.each(editbt, function(i){
					var inputname = stripsub($(this));
					$(this).attr("href", "#hsaModeler #lb-" + inputname); // rewrite href
				});
			};
			
			
			$(".lbbt").click(function(){
				$.fancybox.close();
				
				if($(this).hasClass("recalc")){
					populateData();
					simulateHSA();
				}
				e.preventDefault();		
			});
 			
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
			
			$("#model-back").hide();
			$(".taxrelated").hide();
			$("#showtax").click(function(e) {
				$(".taxrelated").slideToggle();
				$("#showtax").toggleText('Hide', 'Show');
				e.preventDefault();
			});
			
			// Show/Hide div
			$(".expanddiv .trigger a.change").click(function(e){
				$(this).parent().next().slideToggle();
				$(this).toggleText('Hide Criteria', 'Change Your Criteria');
				e.preventDefault();
			});
			
			// get screen size
			function winsize(e){
				var winWidth = $(window).width();
				
				if($("#resultSide").length){
					if(winWidth < 781){
						$(".formfooter #modelerinfo").after($("#resultSide"));	
					}else{
						$("#modeler-hsa form").after($("#resultSide"));
					}
				}
				
			}
			
			$(window).resize(function(){
				winsize();
			});	
		
		};// END Widget Flow Style Form ========================================


		
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

	
		// TEMP HSA Simulation
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// !IMPORTANT !!!! --- Below calculation is only a placeholder for demo. 
		// This is NOT how real calculation will occur.
		// This is ONLY a placeholder for the demo.
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
 		var valContribution = $("#model-output-cont div");
 		var valEarning = $("#model-output-earning div");
 		var valEstimated = $("#model-output-estimated div");
 		var valTotal = $("#model-output-total div");
 		var valTaxsave = $("#model-output-taxsavings div");
 		
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
 		
 		function checkForBlank(e) {
 			if($(e).val() === "" || $(e).val() === null){
 				//return parseInt($(e).val());
 				return 0;
 			}else{
 				//return 0;
 				return parseInt($(e).val());
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
		
		
		
	//})