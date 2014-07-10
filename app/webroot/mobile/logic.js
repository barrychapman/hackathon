/**
 * 
 */

function getThrillerList() {

	$.getJSON(serviceURL + 'get-lista-libri-thriller.php', function(data) {
		$('#thrillerList li').remove();
		employees = data.items;
		$.each(employees,
		    function(index, employee) {
			    $('#thrillerList').append(
			        '<li><a href="libri-details.html?id=' + employee.id
			            + '"><img src="' + employee.img
			            + '" width="58px" height="80px" /><h4>' + employee.title
			            + '</h4><p>' + employee.info1 + '</p></a></li>');

		    });
		$('#thrillerList').trigger('create');
		$('#thrillerList').listview('refresh');
	});
}