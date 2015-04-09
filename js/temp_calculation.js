// IMPORTANT Please Read!
// This is a TEMPORARY simulation for demo purposes only.
// Calculations below are placeholder only. 
// These are fake calculations. 
// This is ONLY a placeholder for the demo.
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$(document).ready(function(){

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
})

// END demo placeholder
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
