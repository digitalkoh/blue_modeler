$(document).ready(function () {
		
    function scrollTo(d) {
        $('html, body').animate({
            scrollTop: $(d).offset().top
        }, 800);
    }
    
    $("input[type='text']").focus(function(){
        $(this).select()
    });
		
		
    /*
        ========================================
        ========================================
        // START Form flow 
        ========================================
        ========================================
    */
    if ($("#modeler").length) { // Run below only when HSA modeler exists

        var form = $("#modeler form#modeler-hsa");

        // Onload, hide all fields except the first flow.
        $(".flowgroup", form).not(".firstflow").hide();

        var populateData = function () {
            //relocate form
            $("#editData").prepend($("#modeler form .flowgroup"));
            $(".flowgroup").show();
            $(".videobar").hide();

            // Modify look
            $("#flowMessage").hide();
//            $("#modeler form li").css({"width":"auto"});
        };

        var postCalc = function () {
            $("#output").slideToggle();
            $(".flowgroup", form).hide();
            $("#modeler .modeler-nav").hide();
            populateData();
            simulateHSA();
        };

        // Build VIDEO path
        var buildVideoPath = function (source) {
            $(".videobar .vidplayer img").attr('src', 'img/sample_vid_player_' + source + '.jpg');
            /*
                Above is placeholder only.
                In prod, the img src will be repalced by real video player
                the 'source' parameter would be a real video path
            */

            /* optional - id needed to populate href or any other onlclick event */
            //$(".videobar .vidlink a").attr('href', 'xxxxx' + source + 'xxxx');
        };	

        // NEXT BUTTON ==================================
        $("#model-next").click(function () {
            var thisBt = $(this);
            var activeGroup = $(".flowgroup:visible");
            var nextGroup = $(".flowgroup:visible").next(".flowgroup");


            // Hide current group only if next group exists
            if (nextGroup.length) {
                activeGroup.hide();
            }
            
            //nextGroup.fadeTo("slow", 1);
            nextGroup.show("slide", { direction: "right" }, 300);

            if ($(".calcReady").is(":visible")) {
                $("#model-calc").show();
                $("#model-next").hide();
            }

            if ($("#model-back").is(":hidden")) {
                $("#model-back").show();
            }

            /*if ($(".videobar").is(":visible")) {
                buildVideoPath($(nextGroup).attr("data-flowid"));
            }*/

            /*if ($(".vidlink").is(":visible") && $(".vidplayer").is(":visible")) {
                mobileVideoToggle('close');
            }*/
        });

        // BACK BUTTON ==================================
        $("#model-back").click(function () {
            var activeGroup = $(".flowgroup:visible"),
            nextGroup = $(".flowgroup:visible").prev(".flowgroup");
            
            // Hide current group only if next group exists
            if (nextGroup.length) {
                activeGroup.hide();
            }
            
            nextGroup.show("slide", { direction: "left" }, 300);

            if ($("#model-calc").is(":visible")) {
                $("#model-calc").hide();
            }
            if ($("#model-next").is(":hidden")) {
                $("#model-next").show();
            }

            if ($(".firstflow").is(":visible")) {
                $("#model-back").hide();
            }

            /*if ($(".videobar").is(":visible")) {
                buildVideoPath($(nextGroup).attr("data-flowid"));
            }

            if ($(".vidlink").is(":visible") && $(".vidplayer").is(":visible")) {
                mobileVideoToggle('close');
            }*/
        });

        $("#model-calc").click(function (e) {
            postCalc();
            e.preventDefault();
        });

        $("#model-over").click(function () {
            location.reload();
        });

        // EDIT DATA RECALC ==================================
        $("#editData .recalc").click(function (e) {
            simulateHSA();
            //e.preventDefault();		
        });


        // PLUGIN ======= Create text toggle plugin ==================================================
        $.fn.toggleText = function (t1, t2) {
            if (this.text() === t1) this.html(t2);
            else                   this.html(t1);
            return this;
        };

        // Initial button visibility settings
        $("#model-back").hide();

        // CHANGE CRITERIA SHOW/HIDE BUTTON ==================================
        $(".expanddiv .trigger a.change").click(function (e) {
            $(this).parent().next().slideToggle();
            $(this).toggleText('Hide Data', 'Change Your Data');
            scrollTo("#summary");
            e.preventDefault();
        });

        // Animate result bg color
        var bgAnimate = function () {
            
            if(get_cookie("style") === "theme_light"){
                $(".outputblock.head div").animate({
                    color: '#5fba04'
                }, 500, function() {
                    $(this).animate({
                        color: '#000'
                    });
                }); 
            } else {
                 $(".outputblock.head div").animate({
                    color: '#5fba04'
                }, 500, function() {
                    $(this).animate({
                        color: '#fff'
                    });
                }); 
            }
        };

    }
    /*
        ========================================
        ========================================
        // END Form flow 
        ========================================
        ========================================
    */



    // ================================================================================================================
    // START - Money functions (convert number into money and toggle between pay period and annual)
    Number.prototype.formatMoney = function (c, d, t) {
        var n = this, 
        c = isNaN(c = Math.abs(c)) ? 2 : c, 
        d = d == undefined ? "." : d, 
        t = t == undefined ? "," : t, 
        s = n < 0 ? "-" : "", 
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
        j = (j = i.length) > 3 ? j % 3 : 0;
       return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
     };
    // END - Money functions
    // ================================================================================================================



    // IMPORTANT Please Read!
    // This is a TEMPORARY simulation for demo purposes only.
    // Calculations below are placeholder only. 
    // These are fake calculations. 
    // This is ONLY a placeholder for the demo.
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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

            return parseInt($(e).val().replace(",", ""));
        }
    }

    function simulateHSA() {
        var hsabal = checkForBlank("#hsabalance");
        var ccont = checkForBlank("#companycont");
        var ycont = checkForBlank("#yourcont");
        //var catchup = checkForBlank("#catchup");
        var wd = checkForBlank("#withdraw");
        var totalcont = hsabal + ccont + ycont;
        var save = ycont * .020;
        var rate = .075;
        var estimated = totalcont + (totalcont * rate) - wd;

        $(valContribution).text("$" + (totalcont).formatMoney(2));
        $(valEarning).text("$" + (totalcont * rate).formatMoney(2));
        $(valEstimated).text("$" + (estimated).formatMoney(2));
        $(valTaxsave).text("$" + (save).formatMoney(2));
        $(valTotal).text("$" + (estimated + save).formatMoney(2));

        bgAnimate();
        
        //TEMP ACTION for DEMO only
        switchGraph();
    }
    // END demo placeholder
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



    // ATTACH LIGHTBOX EVENT ==============================
    // Append input label description Lightbox call
    if($(".moreInfoIcon").length) {
        $(".moreInfoIcon").addClass("fancybox");

        var infoIcons = $(".moreInfoIcon");

        $.each(infoIcons, function(i) {
            var txt = $(this).attr("data-moreinfo");  // extract 'for' value
            $(this).attr("href", "#moreinfo-" + txt); // rewrite href, append original text at end
        });
    };

    $(".various").fancybox({
        maxWidth	: 800,
        maxHeight	: 600,
        fitToView	: false,
        width		: '70%',
        height		: '70%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });

    $(".fancybox").fancybox({
        maxWidth	: 800,
        maxHeight	: 550,
        fitToView	: true
    });

    $(".fancybox-form").fancybox({
        maxWidth	: 800,
        maxHeight	: 550,
        modal       : true,
        closeClick  : true,
        width	    : '90%'
    });

    $(".fancybox-media").fancybox({
        openEffect  : 'none',
        closeEffect : 'none',
        helpers : {
            media : {}
        }
    });
    
    // Activate Calculators
    $("#activate-calc-exp").click(function(){
        if (!$("#determineExpense").length) {
            $.post("inc/inc_expensecalc.php",
                function (data) {
                    $("#moreinfo-expense").append(data);
                }
            ); // end .post > data	
        }
    });
    
    
})
// END jq document ready