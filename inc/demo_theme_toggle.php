<br><br>
Theme: 
<a href="#" class="temp-theme-options" id="theme_dark" style="background-color:#777; padding:2px 8px; color:#000">Dark</a> 
<a href="#" class="temp-theme-options" id="theme_light" style="background-color:#777; padding:2px 8px; color:#000">Light</a>


<!-- Below scripts are for DEMO pueposes ONLY -->
<!-- No need to include these in the build -->
<script>
    // READ SESSION COOKIE
    /* ************************************************************************************************** */
    function get_cookie(Name) {
        var search = Name + "="
        var returnvalue = "";
        if (document.cookie.length > 0) {
            offset = document.cookie.indexOf(search)
            // if cookie exists
            if (offset != -1) {
                offset += search.length
                // set index of beginning of value
                end = document.cookie.indexOf(";", offset);
                // set index of end of cookie value
                if (end == -1) end = document.cookie.length;
                returnvalue=unescape(document.cookie.substring(offset, end))
            }
        }
        return returnvalue;
    }

    $('.temp-theme-options').click(function(){
        var theme = $(this).attr('id');
        document.cookie = "style=" + theme;
        readCookie();
        return false;
    });

    function readCookie(){
       if(get_cookie('style') != ""){
            $("#themeToggle").attr("href", get_cookie("style")+".css");
        } else {
            $("#themeToggle").attr("href", "theme_dark.css"); 
        } 
    }
    
     readCookie();
    
    
</script>