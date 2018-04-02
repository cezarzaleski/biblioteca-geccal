(function($){
    $(function(){
        $('.multiselect').multiSelect();
        
        $('a.selectAll').click(function(){
            var submodulo = $(this).attr('rel');
            submodulo = "select#"+submodulo;
            $(submodulo).multiSelect('select_all');
            return false;
        });
    
        $('a.deselectAll').click(function(){
            var submodulo = $(this).attr('rel');
            submodulo = "select#"+submodulo;
            $(submodulo).multiSelect('deselect_all');
            return false;
        });
    
    });
})(jQuery)