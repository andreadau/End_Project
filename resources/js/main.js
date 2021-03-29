function formatState(state) {
    if (!state.id) {
        return state.text;
    }
     // Write the location of images folder ( make sure that the name of images in this folder is must be the same as the name of select optoin set ) 
    var baseUrl = "images";
    var $state = $(
        '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>' // Add css for img-flag class which is( height:18px; width:18px; display:inherit/block; ) 
        );
    return $state;
};  


$(document).ready(function() {
//custome-dropdown
    $(".custome-dropdown").each(function() { // Suppose if we have two select dropdown and both have different placeholder, that time this method used to declare placeholder dynamically.
        var _this = $(this);
        var jQuerypl = _this.attr("data-placeholder");
        _this.select2({
            dropdownParent: _this.closest("div"), // By default the select2 html contains position at the bottom of body tag..to change that position use this
            // dropdownParent: $(".custome-dropdown-wrapper"), // Insted of above code we can also use thi code ( Select2 does not function properly when I use it inside a Bootstrap modal. For this issue we can also use the same code... )
            // placeholder: "Select State", // To set placeholder Default (must not that for single select there is must be the first option is empty in html)
            placeholder: jQuerypl, // Intesed of above code we can also declare the plceholder dynamically 
            minimumResultsForSearch: Infinity, //for removing search-box
            allowClear: true, // When there is a requirenment to select multiple option( for that it is compulsory to add multiple = "true/multiple" in our 'html' page) it is usefull to clear that all selected option. 
            // selectOnClose: true, // Last hover item selected on close
            // maximumSelectionLength: 2 // This property set restrictions regarding the maximum number of options that can be selected ( when there is a search box is shown ). 
            templateSelection: formatState, // To add image dynamically with option-set( for this show below 'formatState' function )  
            theme: "classic" // To set the theme ( box shodow and more... ) for select2 
        });
    }).on('select2:opening select2:closing', function(event) {
        var $searchfield = $(this).parent().find('.select2-search__field');
        $searchfield.prop('disabled', true);
    }); // Sometimes 'minimumResultsForSearch: Infinity' this option not work for 'multiple select' at that time add this function for 'single selction' there is no neccessory to add this method.

});

//to clear select to options
$('#id').val(null).trigger('change');