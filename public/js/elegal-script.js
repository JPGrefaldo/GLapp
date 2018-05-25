$(document).ready(function(){

    $(document).on('keydown','.numonly',function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            // Allow: Num Pad Decimal
            ( event.keyCode == 190 ) ||
            ( event.keyCode == 110 ) ||
            // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }else{
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();
            }
        }
    });

});
(function ($){
    $.fn.serializeAssoc = function(check = false, excludeFields = []){
        let fields = {};
        let toaster = true;
        unmarker(this);
        $.each(this.serializeArray(), function(key,item){
            if(check){
                toaster = excludeFields.filter(field => {return field == item.name}).length || item.value || sendError(item);
            }
            fields[item.name] = item.value;
        });
        return toaster ? fields : nofity();
     };
    function nofity(){
        toastr['error']("Please fill up the red marked fields.");
        return false;
    }
    function unmarker(elem){
        elem.on('click',function(){
            $(this).closest("div").removeClass('has-error');
        });
    }
    function sendError(item){
        $(`[name=${item.name}`).closest("div").addClass('has-error'); 
        return false;
    }
})(jQuery);
