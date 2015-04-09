<section id="expense">
	<div class="container determineExpense" id="determineExpense">
			
		<h2>Text
        <span>Text</span>
        </h2>

        <form name="expenseCalc" id="expenseCalc">

            <!-- the <fieldset> snippet is shared with full page form and lightbox form -->
            <!-- =========== Start Include <fielset>=========== -->
            <?php include 'inc/inc_expensecalc_form.php' ?>
            <!-- =========== End Include <fielset> =========== -->
            
            <input type="hidden" name="expenseTotal" id="expenseTotal" value=0 />
            <div id="determineExpense-pg-total"></div>
            
            <div>
                <a href="#" class="bt medBtn blueBtn" onclick="submitExpCalc(); return false;">Add It Up</a>
                <a href="#" class="bt medBtn neutral" onclick="resetExpCalc(); populateWDPG(0); return false;">Clear</a>
                <a href="?section=modeler" class="bt medBtn blueBtn" id="gotoModeler">Take Me To The Modeler</a>
            </div>
        </form>
        
        <div id="moreinfo-expenseApply" class="lbcontent hide">
            <h2>Apply results from this calculator to the Modeler?</h2>
                <div>
                    <a href="#" id="applyResultOption" class="bt medBtn blueBtn">Yes</a>
                    <a href="?section=modeler" class="bt medBtn neutral">No</a>
                </div>
            </form>
        </div>
        
        <script>    
            $("#determineExpense h4").click(function(){
                $(this).next().toggle().end().toggleClass("active");
            })

            $("input[type='text']").focus(function(){
                $(this).select()
            });

            function populateWDPG(sum){
                $("#determineExpense-pg-total").html('');
                $("#determineExpense-pg-total").append('<h4>Total Annual Estimated Eligible Expense:</h4><div>$' + sum.formatMoney(0) + '</div>');
                $("#expenseTotal").val(sum);
                // Apply lightbox to provide option to apply result to Modeler
                if(sum > 0){
                    $("#applyResultOption").attr("href", "?section=modeler&expense=" + sum);
                    $("#gotoModeler").attr("href", "#moreinfo-expenseApply").addClass("fancybox-form")
                } else {
                    $("#gotoModeler").attr("href", "?section=modeler").removeClass("fancybox-form")
                }
            }

            function submitExpCalc(){
                var total = 0, fields = $("#expenseCalc input[name='exp']");
                
                for(i = 0; i < fields.length; i++){
                   
                    if(fields[i].value > 0){
                        total += parseInt(fields[i].value);
                    }
                }

                populateWDPG(total);
            }

            function resetExpCalc(){
                $("#expenseCalc")[0].reset();
                $("#determineExpense-pg-total").html('');
            }

            $("#expenseCalc").submit(function(e){
                submitExpCalc();
                e.preventDefault(); 
            });
            
            $("#determineExpense fieldset > ol").css("display", "none");
            $("#determineExpense fieldset:first > ol").css("display", "block").prev().addClass("active");
        </script>

	</div><!--/.container-->
</section>


