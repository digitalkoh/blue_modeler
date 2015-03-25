<div id="determineTaxBracket">
	<h2>Determine Your Tax Rate</h2>
	<form name="determineTaxBracketForm" id="determineTaxBracketForm">
		<fieldset>
			<ol>
				<li>
					<label>Filing Status:</label>
					<div class="ili">
						<input type="radio" name="filing" value="1" onchange="change_filing()">&nbsp;Single<br>
						<input type="radio" name="filing" value="2" onchange="change_filing()">&nbsp;Married Filing Joint<br>
						<input type="radio" name="filing" value="3" onchange="change_filing()">&nbsp;Married Filing Separate<br>
						<input type="radio" name="filing" value="4" onchange="change_filing()">&nbsp;Head of Household<br>
					</div>
				</li>
				<li class="hide" id="determine-income">
					<label>Taxable Income:</label>
					<div class="ili">
						<select onchange="pop_rate()" id="income">
							<option value="0">Select</option>
						</select>
					</div>
				</li>
				<li class="hide" id="determine-myrate">
					<label>My Tax Rate:</label>
					<div class="ili">
						<input readonly="readonly" type="text" id="rate" />
					</div>
				</li>
				<li>
					<a href="#" style="display:none;" id="determine-done" class="bt medBtn blueBtn" onclick="submitTaxCalc()">Done</a>
					<a href="#" class="bt medBtn neutral" onclick="parent.$.fancybox.close()">Cancel</a>
				</li>
			</ol>
		</fieldset>
	</form>
    
    <script>
		var rate=["10%","15%","25%","28%","33%","35%","39.6%"];
		var income = new Array();
		income[1]=["Up to $9,075","$9,076 - $36,900","$36,901 - $89,350","$89,351 - $186,350","$186,351 - $405,100","$405,101 - $406,750","Over $406,750"];
		income[2]=["Up to $18,150","$18,151 - $73,800","$73,801 - $148,850","$148,851 - $226,850","$226,851 - $405,100","$405,101 - $457,600","Over $457,600"];
		income[3]=["Up to $9,075","$9,076 - $36,900","$36,901 - $74,425","$74,426 - $113,425","$113,426 - $202,550","$202,551 - $228,800","Over $228,800"];
		income[4]=["Up to $12,950","$12,951 - $49,400","$49,401 - $127,550","$127,551 - $206,600","$206,601 - $405,100","$405,101 - $432,200","Over $432,200"];
		function cr(){document.getElementById('rate').value="";}
		function change_filing(){
			cr();
			var ele = document.getElementsByName('filing');
			var i = ele.length;
			for (var j = 0; j < i; j++) {
				if (ele[j].checked) { //index has to be j.
					pop_income(income[j+1]);}}}
		
		function removeOptions(selectbox){
			var i;
			for(i=selectbox.options.length-1;i>=0;i--){selectbox.remove(i);}}
		
		function pop_income(incomes){
			var sel = document.getElementById('income');
			removeOptions(sel);
			$("#determine-income").show();
		
			var opt = document.createElement('option');
			opt.innerHTML = "Select";
			opt.value = "0";
			sel.appendChild(opt);
		
			for(var i = 0; i < incomes.length; i++) {
				var opt = document.createElement('option');
				opt.innerHTML = incomes[i];
				opt.value = rate[i];
				sel.appendChild(opt);}}
		
		function pop_rate(){
			var sel = document.getElementById('income');
			document.getElementById('rate').value= sel[sel.selectedIndex].value;
			$("#determine-myrate,#determine-done").show();}
		
		function populate(sindex){
			if (sindex > 0){
				parent.document.getElementById('taxrate').selectedIndex = sindex-1;
				// parent.document.getElementById('taxrate').value = rate[sindex-1];	
			}
        }
        
        function submitTaxCalc(){
            parent.$.fancybox.close();
            populate(document.determineTaxBracketForm.income.selectedIndex)
        }
        
        $("#determineTaxBracketForm").submit(function(e){
            submitTaxCalc();
            e.preventDefault(); 
        });
	</script>
    
</div><!-- /#determineTacBracket -->