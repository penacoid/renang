jQuery( document ).ready(function() {
	var minLength = 1;
	var serviceRegion = null;
        var serviceCity = null;
        var serviceTown = null;
        
        var idRegion = null;
        var idCity = null;
        var idTown = null;
	
        function getSource(request, response, serviceUrl) {
            jQuery.ajax({
                    url: serviceUrl + request.term +"",
                    dataType: "json",			   
                    success: function( data ) {
                        response(jQuery.map(data, function(v,i){
                            return {
                                label: v.name,
                                value: v.id
                            };	
                        }));
                    },
                    error: function( data ) {
                        console.log("error : "+data);
                    }
            });
	}
        
        jQuery(".autocomplete-region").autocomplete({
		minLength: minLength,
		source: function( request, response ) {
                    serviceRegion = "http://localhost:8000/api/list/region/idcountry=1&name=";
                    getSource(request, response, serviceRegion);
		},
		select: function (event, ui) {
                    idRegion = ui.item.value;
                    var name = ui.item.label;
                    jQuery(".autocomplete-region").val(name);
                    jQuery(".autocomplete-region-id").val(idRegion); 
                    jQuery(".autocomplete-city").val("");
                    jQuery(".autocomplete-town").val("");
                    return false;
		},
                change: function tester(event, ui) {
                    if (ui.item == null || ui.item == undefined)
                        jQuery(".autocomplete-region").val("");
                }
	});
        
        if(idRegion==null)
            idRegion=jQuery(".autocomplete-region-id").val(); 
        
        jQuery(".autocomplete-city").autocomplete({
		minLength: minLength,
		source: function( request, response ) {
                    serviceCity = "http://localhost:8000/api/list/city/idregion="+ idRegion +"&name=";
                    getSource(request, response, serviceCity);
		},
		select: function (event, ui) {
                    idCity = ui.item.value;
                    var name = ui.item.label;
                    jQuery(".autocomplete-city").val(name);
                    jQuery(".autocomplete-city-id").val(idCity);
                    jQuery(".autocomplete-town").val("");
                    return false;
		},
                change: function tester(event, ui) {
                    if (ui.item == null || ui.item == undefined)
                        jQuery(".autocomplete-city").val("");
                }
	});
        
        if(idCity==null)
            idCity=jQuery(".autocomplete-city-id").val();
  
	jQuery(".autocomplete-town").autocomplete({
		minLength: minLength,
		source: function( request, response ) {
                    serviceTown = "http://localhost:8000/api/list/town/idcity="+ idCity +"&name=";
                    getSource(request, response, serviceTown);
		},
		select: function (event, ui) {
                    idTown = ui.item.value;
                    var name = ui.item.label;
                    jQuery(".autocomplete-town").val(name);
                    jQuery(".autocomplete-town-id").val(idTown);
                    return false;
		},
                change: function tester(event, ui) {
                    if (ui.item == null || ui.item == undefined)
                        jQuery(".autocomplete-town").val("");
                }
	});
});