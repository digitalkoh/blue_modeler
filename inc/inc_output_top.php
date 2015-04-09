
<div class="output-top">	
	<div class="outputsection">
		<div class="outputblock head" id="model-output-estimated">
			<p class="txt120p">TextText</p>
			<div>$429,990.12</div>
		</div>
		
		<div class="outputdetail">
			<div class="outputblock" id="model-output-cont">
				<p>Total <br>TextTextText</p>
				<div>$230,000.00</div>
			</div>
			
			<div class="outputblock" id="model-output-earning">
				<p>Text <br>Text</p>
				<div>$149,000.98</div>
			</div>
            
            <div class="outputblock" id="model-output-taxsavings">
				<p>Text <br>Text</p>
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