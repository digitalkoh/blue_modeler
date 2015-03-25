<section id="expense">
	<div class="container determineExpense" id="determineExpense">
			
		<h2>Eligible Expense Calculator
        <span>Enter annual amounts</span>
        </h2>

        <form name="expenseCalc" id="expenseCalc">

            <!-- the <fieldset> snippet is shared with full page form and lightbox form -->
            <!-- =========== Start Include <fielset>=========== -->
            <?php include 'inc/inc_expensecalc_form.php' ?>
            <!-- =========== End Include <fielset> =========== -->
            
            <div id="determineExpense-pg-total"></div>
            
            <div>
                <a href="#" class="bt medBtn blueBtn" onclick="submitExpCalc(); return false;">Add It Up</a>
                <a href="#" class="bt medBtn neutral" onclick="resetExpCalc(); return false;">Clear</a>
                <a href="?section=modeler" class="bt medBtn blueBtn ml15">Take me to the Modeler</a>
            </div>
        </form>
        
        <script>

            $("#determineExpense h4").click(function(){
                $(this).next().toggle().end().toggleClass("active");
            })

            $("input[type='text']").focus(function(){
                $(this).select()
            });

            function populateWDPG(sum){
                $("#determineExpense-pg-total").html('');
                $("#determineExpense-pg-total").append('<h4>Total Annual Estimated Eligible Expense:</h4><div>$' + sum + '</div>');
            }

            function submitExpCalc(){
                var total = 0, fields = $("#expenseCalc input[name='exp']");

                for(i = 0; i < fields.length; i++){
                    total += parseInt(fields[i].value);
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
            
            $("#determineExpense fieldset > ol").css("display", "block");
            $("#determineExpense fieldset h4").addClass("active");

        </script>

	</div><!--/.container-->
</section>


