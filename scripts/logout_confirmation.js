$(document).ready( function () {
	$('#link-logout').click(function(){
		console.log("Logout pressed");
		$('#modal-logout-confirm').modal();
	});
});
