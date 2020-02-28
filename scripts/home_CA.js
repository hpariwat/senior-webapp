var base_url=window.location.origin;
let noteID;
function hideNote(key)
{
	console.log(key);
	noteID = key;
	$('#confirm-hide').modal('show');
}

$(document).ready( function () {
	$('#edit-btn').click(function(){
		console.log("AA");
		$('#edit-todo').modal('show');
	});
	$('#btn-confirm-hide').click(function(){
		console.log("btn-confirm-hide");
		$.ajax({
			url: base_url + "/index.php/home_CA/deleteNote",
			type:"POST",
			data:{noteID:noteID},
			success:function()
			{
				removeElement('common-card-' + noteID);
				$('#confirm-hide').modal('hide');
			}
		});
	});
	// replace long sentences with ellipsis
	let myTag = $('#text-truncate').text();
	if (myTag.length > 70) {
		let truncated = myTag.trim().substring(0, 70).split(" ").slice(0, -1).join(" ") + "…";
		$('#text-truncate').text(truncated);
	}
} );
function removeElement(id) {
	console.log(id);
	let elem = document.getElementById(id);
	return elem.parentNode.removeChild(elem);
}
