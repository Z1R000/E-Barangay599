$(document).ready(function() {
    $("select").change(function() {
        $(this).find("option:selected").each(function() {
            var optionValue = $(this).attr("value");
            if (optionValue) {
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else {
                $(".box").hide();
            }
        });
    }).change();
});


    

    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'rental' ? 'block' : 'none';
    }
    function showprecinct(divId, element) {
        document.getElementById(divId).style.display = element.value == 'reg' ? 'inline' : 'none';
    }

