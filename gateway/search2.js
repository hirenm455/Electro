$(document).ready(function(){
    filterSearch();	
    $('.productDetail').click(function(){
        filterSearch();
    });	
	$('#priceSlider').slider({		
	}).on('change', priceRange); 	
});
function priceRange(e){
	$('.priceRange').html($(this).val() + " - 65000");
	$('#minPrice').val($(this).val());
	filterSearch();	
}
function filterSearch() {
	$('.searchResult').html('<div id="loading">Loading .....</div>');
	var action2 = 'fetch_data';
	var minPrice = $('#minPrice').val();
	var maxPrice = $('#maxPrice').val();
	var brand = getFilterData('brand');
	var ram = getFilterData('ram');
	var storage = getFilterData('storage');
	$.ajax({
		url:"action2.php",
		method:"POST",
		dataType: "json",		
		data:{action2:action2, minPrice:	minPrice, maxPrice:maxPrice, brand:brand, ram:ram, storage:storage},
		success:function(data){
			$('.searchResult').html(data.html);
		}
	});
}
function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function(){
		filter.push($(this).val());
	});
	return filter;
}