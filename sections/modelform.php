<section>
	<div class="container">
		
		<div id="modelerWrapper">
			<?php include "inc/inc_logowrapper.php" ?>
			<div id="modeler-hsa">
				
				<form action="" method="post" name="hsaModeler" id="hsaModeler">
					<fieldset>
						<ol>
							<li id="output" class="noborder-top hide">
								<div class="outputwrapper">
									<?php include 'inc/inc_output_top.php' ?>
									<?php include 'inc/inc_output_summary.php' ?>
								</div><!-- /.outputwrapper-->
							</li>
							
							<div class="flowgroup firstflow">
								<h4 class="flowMessage">
									Lorem ipsum dolor sit amet consectetur adipiscing elit. Mauris dapibus mi suscipit sapien convallis, ut aliquet sapien tristique.
								</h4>
									
								<li id="lb-coveragecategory">
									<label for="coveragecategory">Your Coverage Level:</label>
									<div class="ili realinput">
										<select id="coveragecategory" name="coveragecategory">
											<option value="1" selected="selected">You Only</option>
											<option value="2">You + Spouse</option>
											<option value="3">You + Child(ren)</option>
											<option value="4">You + Family</option>
											<option value="5">You (age 55+) Only</option>
											<option value="6">You (age 55+) + Spouse</option>
											<option value="7">You (age 55+) + Child(ren)</option>
											<option value="8">You (age 55+) + Family</option>
										</select>
									</div>
								</li>
								
								<li id="lb-hsabalance" class="mt20">
									<label for="hsabalance">Current HSA Balance:</label>
									<div class="ili currency realinput">
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
								
								<!-- IF HAS VIDEO -->
								<?php if(_SET_VIDEO == 1){ ?>
									<div class="video">
										<div class="vidplayer"></div>
										<div class="vidlink"><a class="bt rnd medBtn blkBtn" href="#"><span class="icon-video"></span>Watch Video</a></div>
									</div>
								<?php } ?>
								<!-- / IF HAS VIDEO -->
								
							</div><!--/.flowgroup-->
							
							<div class="flowgroup">
								<h4 class="flowMessage">
									Lorem ipsum dolor sit amet consectetur adipiscing elit. Mauris dapibus mi suscipit sapien convallis, ut aliquet sapien tristique.
								</h4>
								
								<li id="lb-companycont" class="readonly mb30">
									<label for="companycont" class="forReadonly">Annual Company Contribution:</label>
									<div class="ili currency">
										<input type="text" id="companycont" readonly="readonly" name="companycont" value="500" />
									</div>
								</li>
								
								<li id="lb-yourcont" class="mt20">
									<label for="yourcont" class="forReadonly">Your Annual Contribution:</label>
									<div class="ili currency">
										<input type="text" readonly="readonly" id="yourcont" name="yourcont" />
									</div>
									<div class="clear"></div>
									<!-- =========================== SLIDER ============================ -->
									<div class="slider-money" id="slider-yourcont"></div>
									<script>
										$(function() {
											$( "#slider-yourcont" ).slider({
												value:100,
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
								
								<li id="lb-catchup" class="mt20">
									<label for="catchup" class="forReadonly">Your Catch-up Contribution:</label>
									<div class="ili currency">
										<input type="text" readonly="readonly" id="catchup" name="catchup" />
									</div>
									<div class="clear"></div>
									<!-- =========================== SLIDER ============================ -->
									<div class="slider-money" id="slider-catchup"></div>
									<script>
										$(function() {
											$( "#slider-catchup" ).slider({
												value:0,
												min: 0,
												max: 10000,
												step: 100,
												slide: function( event, ui ) {
													$( "#catchup" ).val( ui.value );
												}
											});
											$( "#catchup" ).val( $( "#slider-catchup" ).slider( "value" ) );
										});
									</script>
									<!-- ======================== END SLIDER ============================ -->
								</li>
								
								<!-- IF HAS VIDEO -->
								<?php if(_SET_VIDEO == 1){ ?>
									<div class="video">
										<div class="vidplayer"></div>
										<div class="vidlink"><a class="bt rnd medBtn blkBtn" href="#"><span class="icon-video"></span>Watch Video</a></div>
									</div>
								<?php } ?>
								<!-- / IF HAS VIDEO -->
								
							</div><!--/.flowgroup-->
							
							<div class="flowgroup calcReady">
								<h4 class="flowMessage">
									Lorem ipsum dolor sit amet consectetur adipiscing elit. Mauris dapibus mi suscipit sapien convallis, ut aliquet sapien tristique.
								</h4>
								
								<li id="lb-withdraw">
									<label for="withdraw" class="forReadonly">Estimated Annual Withdrawals:</label>
									<div class="ili currency">
										<input type="text" readonly="readonly" id="withdraw" name="withdraw" />
									</div>
									<div class="clear"></div>
									<!-- =========================== SLIDER ============================ -->
									<div class="slider-money" id="slider-withdraw"></div>
									<script>
										$(function() {
											$( "#slider-withdraw" ).slider({
												value:0,
												min: 0,
												max: 10000,
												step: 100,
												slide: function( event, ui ) {
													$( "#withdraw" ).val( ui.value );
												}
											});
											$( "#withdraw" ).val( $( "#slider-withdraw" ).slider( "value" ) );
										});
									</script>
									<!-- ======================== END SLIDER ============================ -->
								</li>
								
								<li id="lb-earning" class="mt20">
									<label for="earning" class="forReadonly">Annual Earnings on Account:</label>
									<div class="ili">
										<input style="width:24px" type="text" readonly="readonly" id="earning" name="earning" /> %
									</div>
									<div class="clear"></div>
									<!-- =========================== SLIDER ============================ -->
									<div class="slider-money" id="slider-earning"></div>
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
								
								<li id="lb-growth" class="mt20">
									<label for="growth" class="forReadonly">Years of Account Growth:</label>
									<div class="ili">
										<input type="text" readonly="readonly" id="growth" name="growth" />
									</div>
									<div class="clear"></div>
									<!-- =========================== SLIDER ============================ -->
									<div class="slider-money" id="slider-growth"></div>
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
								
								<!-- IF HAS VIDEO -->
								<?php if(_SET_VIDEO == 1){ ?>
									<div class="video">
										<div class="vidplayer"></div>
										<div class="vidlink"><a class="bt rnd medBtn blkBtn" href="#"><span class="icon-video"></span>Watch Video</a></div>
									</div>
								<?php } ?>
								<!-- / IF HAS VIDEO -->
								
							</div><!--/.flowgroup-->
							
							
						</ol>			
					</fieldset>
				</form>
				
				<div class="clear"></div>
			</div><!-- /#modeler-hsa-->
		</div><!-- /#modelerWrapper -->
		
		<div class="formfooter">
			<div class="formnav">
				<a href="#" class="bt neutral" id="model-back"><span class="sm left">Back</span></a>
				<a href="#" class="bt blueBtn" id="model-next"><span class="lg right">Next</span></a>
				<a href="#" class="bt blueBtn" style="display:none;" id="model-calc"><span>Calculate</span></a>
				<!-- <a href="#" class="bt blueBtn" style="display:none;" id="model-over"><span>Start Over</span></a> -->
			</div><!--/.formnav-->
			
			<div id="modelerinfo">
				<p><strong>Note:</strong> This information will not be saved if you leave this site.</p>
				<div><a href="#moreinfo-about" class="fancybox"><span class="questionLg"></span> About this modeler</a></div>
				<div><a href="?section=learn"><span class="questionLg"></span> Learn more about HSA.</a></div>
			</div><!--/#modelerinfo-->
			
			<div class='clear'></div>
		</div><!--#formfooter-->
		
		
		
		<?php include 'inc/lb_content_form.php'; ?>
	</div><!--/.container-->
</section>

<script>
	
</script>


