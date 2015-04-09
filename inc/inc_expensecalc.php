<div id="determineExpense">

	<h2>Text
        <span>Text</span>
    </h2>
    
    <form name="expenseCalc" id="expenseCalc">
        
        <!-- the <fieldset> snippet is shared with full page form and lightbox form -->
        <!-- =========== Start Include <fielset>=========== -->
        <?php include 'inc_expensecalc_form.php' ?>
        <!-- =========== End Include <fielset> =========== -->
        
        <div>
            <a href="#" class="bt medBtn blueBtn" onclick="submitExpCalc()">Add It Up</a>
            <a href="#" class="bt medBtn neutral" onclick="resetExpCalc()">Clear</a>
            <a href="#" class="bt medBtn neutral" onclick="parent.$.fancybox.close(); clearExpCalc()">Cancel</a>
        </div>
	</form>
    
    <script>
        // Clear Calculator
        function clearExpCalc(){
            $("#moreinfo-expense").html("");
        }
        
		$("#determineExpense h4").click(function(){
            $(this).next().toggle().end().toggleClass("active");
        })
        
        $("input[type='text']").focus(function(){
            $(this).select()
        });
        
		function populateWD(sum){
            document.getElementById('withdraw').value = sum;
        }
        
        function submitExpCalc(){
            var total = 0, fields = $("#expenseCalc input[name='exp']");
            
            for(i = 0; i < fields.length; i++){
                total += parseInt(fields[i].value);
            }
            parent.$.fancybox.close();
            populateWD(total);
            clearExpCalc();
        }
        
        function resetExpCalc(){
            $("#expenseCalc")[0].reset();
        }
        
        $("#expenseCalc").submit(function(e){
            submitExpCalc();
            e.preventDefault(); 
        });
        
	</script>
    
</div><!-- /#determineExpense -->