<section id="modeler">
	<div class="container clearfix">
				
		<form action="" method="post" name="modeler-hsa" id="modeler-hsa">
			<fieldset>
				<ol>
					<li id="output" class="noborder-top hide">
						<div class="outputwrapper">
							<?php include 'inc/inc_output_top.php' ?>
							<?php include 'inc/inc_output_summary.php' ?>
						</div><!-- /.outputwrapper-->
					</li>
					
					<div class="flowgroup firstflow" data-flowid=1>
						<h4 class="flowMessage"><?php echo _slide1_text ?></h4>
						<span class="caret"></span>
						
						<li id="lb-coveragecategory" class="dualinput">
							<label for="coveragecategory">Your Coverage Level</label>
							<div class="ili">
								<select id="coveragecategory" name="coveragecategory">
									<option value="1" selected="selected">You Only</option>
									<option value="2">You + Spouse</option>
									<option value="3">You + Child(ren)</option>
									<option value="4">You + Family</option>
								</select>
							</div>
						</li>
						
                        <li id="lb-yourage" class="dualinput">
							<label for="yourage">Your Age</label>
							<div class="ili">
								<input type="text" id="yourage" name="yourage" />
							</div>
							<div class="clear"></div>
							<!-- =========================== SLIDER ============================ -->
							<div class="slider-ui" id="slider-yourage"></div>
							<script>
								$(function() {
									$( "#slider-yourage" ).slider({
										value:0,
										min: 18,
										max: 75,
										step: 1,
										slide: function( event, ui ) {
											$( "#yourage" ).val( ui.value );
										}
									});
									$( "#yourage" ).val( $( "#slider-yourage" ).slider( "value" ) );
								});
							</script>
							<!-- ======================== END SLIDER ============================ -->
						</li>
					</div><!--/.flowgroup-->
                    
                    <div class="flowgroup" data-flowid=2>
                        <h4 class="flowMessage"><?php echo _slide2_text ?></h4>
						<span class="caret"></span>
                        
                        <li id="lb-hsabalance" class="dualinput">
							<label for="hsabalance">Current HSA Balance</label>
							<div class="ili currency">
								<script>
									if(navigator.userAgent.toLowerCase().indexOf("android") > -1) { // detect android true or false
										// If Android 'true'
										document.writeln('<input type="number" id="hsabalance" name="hsabalance" />'); 
									} else {
										// If not Android 'false'
										document.writeln('<input type="text" id="hsabalance" name="hsabalance" pattern="[0-9]*" />');	
									}
								</script>
							</div>
						</li>
                        
                        <li id="lb-companycont" class="readonly">
							<label for="companycont" class="forReadonly">Annual Company Contribution:</label>
							<div class="ili currency">
								<input type="text" readonly="readonly" id="companycont" name="companycont" value="500" />
							</div>
						</li>
						
						<li id="lb-yourcont" class="dualinput">
							<label for="yourcont">Your Annual Contribution</label>
							<div class="ili currency">
								<input type="text" id="yourcont" name="yourcont" />
							</div>
							<div class="clear"></div>
							<!-- =========================== SLIDER ============================ -->
							<div class="slider-ui" id="slider-yourcont"></div>
							<script>
								$(function() {
									$( "#slider-yourcont" ).slider({
										value:0,
										min: 0,
										max: 10000,
										step: 100,
										slide: function( event, ui ) {
											$( "#yourcont" ).val( ui.value );
										}
									});
									$( "#yourcont" ).val( $( "#slider-yourcont" ).slider( "value" ) );
								});
							</script>
							<!-- ======================== END SLIDER ============================ -->
						</li>
                        
                       
                    </div><!--/.flowgroup-->
					
					<div class="flowgroup" data-flowid=3>
						<h4 class="flowMessage"><?php echo _slide3_text ?></h4>
						<span class="caret"></span>
						
                         <li id="lb-withdraw" class="dualinput">
							<label for="withdraw">Estimated Annual Withdrawals</label>
							<div class="ili currency">
								<input type="text" id="withdraw" name="withdraw" /> <a href="#moreinfo-expense" class="fancybox-form ml15" id="activate-calc-exp">Calculate Eligible Expense</a>
							</div>
							<div class="clear"></div>
							<!-- =========================== SLIDER ============================ -->
							<div class="slider-ui" id="slider-withdraw"></div>
                            
							<script>
                                withdrawSlide(0);
                                
                                function withdrawSlide(v) {
                                    var val = v;
									$( "#slider-withdraw" ).slider({
										value:val,
										min: 0,
										max: 10000,
										step: 100,
                                        highlight: true,
										slide: function( event, ui ) {
											$( "#withdraw" ).val( ui.value );
										}
									});
									$( "#withdraw" ).val( $( "#slider-withdraw" ).slider( "value" ) );
								};
							</script>
							<!-- ======================== END SLIDER ============================ -->
						</li>
					</div><!--/.flowgroup-->
					
					<div class="flowgroup calcReady" data-flowid=4>
						<h4 class="flowMessage"><?php echo _slide4_text ?></h4>
						<span class="caret"></span>
						
						<li id="lb-earning" class="dualinput">
							<label for="earning">Annual Earnings</label>
							<div class="ili">
								<input type="text" id="earning" name="earning" /> <span class="inputtail">%</span>
							</div>
							<div class="clear"></div>
							<!-- =========================== SLIDER ============================ -->
							<div class="slider-ui" id="slider-earning"></div>
							<script>
								$(function() {
									$( "#slider-earning" ).slider({
										value:0,
										min: 0,
										max: 6,
										step: 1,
										slide: function( event, ui ) {
											$( "#earning" ).val( ui.value );
										}
									});
									$( "#earning" ).val( $( "#slider-earning" ).slider( "value" ) );
								});
							</script>
							<!-- ======================== END SLIDER ============================ -->
						</li>
						
						<li id="lb-growth" class="dualinput">
							<label for="growth">Account Growth</label>
							<div class="ili">
								<input type="text" id="growth" name="growth" /> <span class="inputtail">yrs.</span>
							</div>
							<div class="clear"></div>
							<!-- =========================== SLIDER ============================ -->
							<div class="slider-ui" id="slider-growth"></div>
							<script>
								$(function() {
									$( "#slider-growth" ).slider({
										value:0,
										min: 0,
										max: 40,
										step: 1,
										slide: function( event, ui ) {
											$( "#growth" ).val( ui.value );
										}
									});
									$( "#growth" ).val( $( "#slider-growth" ).slider( "value" ) );
								});
							</script>
							<!-- ======================== END SLIDER ============================ -->
						</li>
						
                        <li id="lb-taxrate" class="dualinput">
                            
                            <label for="taxrate">Marginal Tax Rate</label>
                            <div class="ili">
                                <select id="taxrate" name="taxrate">
                                    <option value="10">10%</option>
                                    <option value="15">15%</option>
                                    <option value="25">25%</option>
                                    <option value="28">28%</option>
                                    <option value="33">33%</option>
                                    <option value="35">35%</option>
                                    <option value="39">39.6%</option>
                                </select>
                                
                                <!-- TODO: ADD resreset form on re-open -->
                                <a href="#moreinfo-determine" id="determine" class="fancybox-form ml15">Find Your Tax Bracket</a>
                                
                            </div>
                            
                        </li>
					</div><!--/.flowgroup-->
					
				</ol>			
			</fieldset>
			
			<!-- IF HAS VIDEO -->
			<?php if(_SET_VIDEO == 1){ ?>
				<a href="#" class="videobar">
                    <h3><span>Need help?</span> Watch our video</h3>
<!--					<div class="vidplayer"><img src="img/sample_vid_player_1.jpg" /></div>-->
<!--					<div class="vidlink"><a class="bt rnd medBtn blkBtn" href="#"><span class="icon-video"></span>Play Video</a></div>-->
				</a>
			<?php } ?>
			<!-- / IF HAS VIDEO -->
			
		</form>
		<div class="clear"></div>
		
		
						
	</div><!--/.container-->
	
	<div class="formfooter">
		<div class="inner">
            <div class="modeler-nav">
                <a href="#" class="bt neutral" id="model-back"><span class="sm left">Back</span></a>
                <a href="#" class="bt blueBtn" id="model-next"><span class="lg right">Next</span></a>
                <a href="#" class="bt blueBtn" style="display:none;" id="model-calc"><span>Calculate</span></a>
            </div><!--/.modeler-nav-->

            <div class="modeler-info">
                <p><strong>Note:</strong> This information will not be saved if you leave this site.</p>
                <div><a href="#moreinfo-about" class="fancybox"><span class="question-Wht"></span> About this modeler</a></div>
                <div><a href="?section=about"><span class="question-Wht"></span> Learn more about HSA.</a></div>
            </div><!--/.modeler-info-->
        </div>
		
		<div class='clear'></div>
	</div><!--/.formfooter-->
	
	<?php include 'inc/lb_content_form.php'; ?>
</section>

