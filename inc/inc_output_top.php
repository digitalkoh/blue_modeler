
<div class="output-top">	
	<div class="outputsection">
		<div class="outputblock head" id="model-output-estimated">
			<p class="txt120p">Total Potential HSA Account Value</p>
			<div>$429,990.12</div>
		</div>
		
		<div class="outputdetail">
			<div class="outputblock" id="model-output-cont">
				<p>Total <br>Contributions</p>
				<div>$230,000.00</div>
			</div>
			
			<div class="outputblock" id="model-output-earning">
				<p>Earned <br>Interest</p>
				<div>$149,000.98</div>
			</div>
            
            <div class="outputblock" id="model-output-taxsavings">
				<p>Estimated <br>Pre-Tax Savings</p>
				<div>$38,800.70</div>
			</div> 
		</div><!-- /.outputdetail-->
        
		<div class="clear"></div>
	</div><!-- /.outputsection-->
</div><!--/.output-top-->

<div id="output-graph">
<!--    <img src="img/sample_graph.png" />-->
</div>

<!-- IMAGE SWITCH FOR DEMO PURPOSE ONLY -->
<script>
    function switchGraph(){
        if(get_cookie("style") === ''){
            $('#output-graph').html('<img src="img/sample_graph_theme_dark.png" />');
        }else{
            $('#output-graph').html('<img src="img/sample_graph_' + get_cookie("style") + '.png" />');
        }
    }
</script>