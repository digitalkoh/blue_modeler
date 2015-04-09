<section>
	<div class="grid">
		
		<div class="col w75">
			<div id="modeler-hsa">
				<h4>
					<strong style="font-size:120%">Lorem ipsum dolor sit amet</strong><br> consectetur adipiscing elit. Mauris dapibus mi suscipit sapien convallis, ut aliquet sapien tristique.
				</h4>
				<form action="" method="post" name="hsaModeler" id="hsaModeler">
					<fieldset>
						<ol>
							<li id="output" class="noborder-top hide">
								
								<div class="outputwrapper">
								
									<div class="outputsection">
										<div class="outputblock" id="model-output-estimated">
											<p>Estimated Value</p>
											<div class="txt-green">$387,670.54</div>
										</div>
										
										<div class="outputdetail">
											<div class="outputblock" id="model-output-cont">
												<p>Total Contributions</p>
												<div>$230,000.00</div>
											</div>
											
											<div class="outputblock" id="model-output-earning">
												<p>Earnings</p>
												<div>$149,000.98</div>
											</div>
										</div><!-- /.outputdetail-->
									</div><!-- /.outputsection-->
							
									
									<div id="taxoutput" class="outputsection taxrelated">
										<div class="outputblock" id="model-output-total">
											<p>Total Potential Value</p>
											<div class="txt-green">$429,990.12</div>
										</div>
										
										<div class="outputdetail">
											<div class="outputblock" id="model-output-taxsavings">
												<p>Estimated Tax Savings</p>
												<div>$38,800.70</div>
											</div>
										</div><!-- /.outputdetail-->
									</div><!-- /.outputsection #taxrelated-->
									
									<div class="clear"></div>
									
									<div id="summary">
										<ul>
											<li>Your Coverage Level: <span id="sum-coveragecategory"></span><a class="editIcon"></a></li>
											<li>Current HSA Balance: <span id="sum-hsabalance"></span><a class="editIcon"></a></li>
											<li>Annual Company Contribution: <span id="sum-companycont"></span><a class="editIcon"></a></li>
											<li>Your Annual Contribution: <span id="sum-yourcont"></span><a class="editIcon"></a></li>
											<li>Your Catch-up Contribution: <span id="sum-catchup"></span><a class="editIcon"></a></li>
											<li>Estimated Annual Withdrawals: <span id="sum-withdraw"></span><a class="editIcon"></a></li>
											<li>Annual Earnings on Account: <span id="sum-earning"></span><a class="editIcon"></a></li>
											<li>Years of Account Growth: <span id="sum-growth"></span><a class="editIcon"></a></li>
											<li class="dark">
												<a class="moreInfoIcon infront"></a><strong>Want to see tax savings on your contributions?</strong> 
												<a style="float:right; margin-right:4px;" href="#" id="showtax" class="bt blueBtn smBtn">Show</a>
											</li>
											<li class="taxrelated dark">
												<a class="moreInfoIcon infront"></a>Marginal Tax Rate: 
												<select id="taxrate" name="taxrate">
													<option value="10">10%</option>
													<option value="15">15%</option>
													<option value="25">25%</option>
													<option value="28">28%</option>
													<option value="33">33%</option>
													<option value="35">35%</option>
												</select>
											</li>
										</ul>
										
									</div><!--/#summary-->
									
								</div><!-- /.outputwrapper-->
							</li>
							
							<div class="flowgroup firstflow" id="lb-coveragecategory">
								<li>
									<label for="coveragecategory">Your Coverage Level</label>
									<div class="ili">
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
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
							
							<div class="flowgroup" id="lb-hsabalance">
								<li>
									<label for="hsabalance">Current HSA Balance <a class="moreInfoIcon"></a> </label>
									<div class="ili currency">
										<input type="text" id="hsabalance" name="hsabalance" />
									</div>
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
							
							<div class="flowgroup" id="lb-companycont">
								<li>
									<label for="companycont">Annual Company Contribution <a class="moreInfoIcon"></a> </label>
									<div class="ili currency">
										<input type="text" id="companycont" name="companycont" />
									</div>
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
							
							<div class="flowgroup" id="lb-yourcont">
								<li>
									<label for="yourcont">Your Annual Contribution <a class="moreInfoIcon"></a></label>
									<div class="ili currency">
										<input type="text" id="yourcont" name="yourcont" />
									</div>
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
							
							<div class="flowgroup" id="lb-catchup">
								<li>
									<label for="catchup">Your Catch-up Contribution <a class="moreInfoIcon"></a></label>
									<div class="ili currency">
										<input type="text" id="catchup" name="catchup" />
									</div>
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
							
							<div class="flowgroup" id="lb-withdraw">
								<li>
									<label for="withdraw">Estimated Annual Withdrawals <a class="moreInfoIcon"></a></label>
									<div class="ili currency">
										<input type="text" id="withdraw" name="withdraw" />
									</div>
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
								
							<div class="flowgroup" id="lb-earning">
								<li>
									<label for="earning">Annual Earnings on Account <a class="moreInfoIcon"></a> </label>
									<div class="ili percent">
										<select id="earning" name="earning">
											<option value="0">0%</option>
											<option value="1">1%</option>
											<option value="2">2%</option>
											<option value="3">3%</option>
											<option value="4">4%</option>
											<option value="5">5%</option>
											<option value="6">6%</option>
										</select>
									</div>
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
							
							<div class="flowgroup calcReady" id="lb-growth">
								<li>
									<label for="growth">Years of Account Growth <a class="moreInfoIcon"></a> </label>
									<div class="ili">
										<select id="growth" name="growth">
											<script>
												var selGrowth = "";
												for(i=0; i<=40; i++){
													selGrowth += "<option value='"+i+"'>"+i+"</option>";
												};	
												document.write(selGrowth);
											</script>
										</select>
									</div>
									<a href="#" class="bt blueBtn lbbt recalc">Recalculate</a> 
									<a href="#" class="bt neutral lbbt">Cancel</a>
								</li>
							</div><!--/.flowgroup-->
							
							<div class="flowgroup pauseflow taxgroup">
								<li>
									<label>Tax Savings on Your Contributions <a class="moreInfoIcon"></a></label>
									<div class="ili">
										<a href="#" id="showtax" class="blueBtn smBtn">Show</a>
									</div>
								</li>
								
								
							</div><!--/.flowgroup-->
							
						</ol>			
					</fieldset>
					
				</form>
				
				<div class="formnav">
					<a href="#" class="bt blueBtn medBtn neutral" id="model-back"><span class="sm left">Back</span></a>
					<a href="#" class="bt blueBtn sqBtn" id="model-next"><span class="lg right">Next</span></a>
					<a href="#" class="bt blueBtn sqBtn" style="display:none;" id="model-calc"><span>Calculate</span></a>
					<a href="#" class="bt blueBtn sqBtn" style="display:none;" id="model-over"><span>Start Over</span></a>
				</div><!--/.formnav-->
				
					<div id="modelerinfo">
						<p><strong>Note:</strong> This information will not be saved if you leave this site.</p>
						<div><a href="#"><span class="questionLg"></span> About this modeler</a></div>
						<div><a href="?section=learn"><span class="questionLg"></span> Learn more about HSA.</a></div>
					</div><!--/#learnmore-->
				
				<div class="clear"></div>
			</div><!-- /#modeler-hsa-->
		</div><!--.col-->
		
		
		<?php include 'inc/lb_content_form.php'; ?>
		
		<div class="col w25">
			<div class="box">
				<div class="box-inner border mt10">
					<h3>Lorem ipsum dolor sit amet</h3>
					<p>Consectetur adipiscing elit. Mauris dapibus mi su</p>
				</div>
			</div>
			
			<div class="box">
				<div class="box-inner border mt10">
					<h3>Lorem ipsum dolor sit amet</h3>
					<p>Consectetur adipiscing elit. Mauris dapibus mi su</p>
				</div>
			</div>
			
			<div class="box">
				<div class="box-inner border mt10">
					<h3>Lorem ipsum dolor sit amet</h3>
					<p>Consectetur adipiscing elit. Mauris dapibus mi su</p>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
	</div><!--/.grid-->
</section>


