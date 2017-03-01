

function addVetDetails(){
	var vetDetails;
	try{ vetDetails = JSON.parse(localStorage.getItem('vetDetails')) || []; }
	catch (err) { vetDetails = []; }
			
	if ($('#vet-name').val()){
		var vet = {
			"id": vetDetails.length + 1,
			"name": $('#vet-name').val(),
			"phone": $('#vet-phone').val(),
			"fax": $('#vet-fax').val(),
			"email": $('#vet-email').val(),
			"address": $('#vet-address').val(),
			"city": $('#vet-city').val(),
			"postcode": $('#vet-postcode').val(),
		};
		$('#vet-select').append($('<option>', {value:vet.id, text:vet.name}));
		vetDetails.push(vet);
		
		$('#vet-name').val("");
		$('#vet-phone').val("");
		$('#vet-fax').val("");
		$('#vet-email').val("");
		$('#vet-address').val("");
		$('#vet-city').val("");
		$('#vet-postcode').val("");
	}
	
	if ($('#vet-select option').size() > 1){
		$('#vet-select option:last').prop('selected', true);
	}
	localStorage.setItem('vetDetails', JSON.stringify(vetDetails));
}

function showVetModal() {			
	$('#vetModal').modal('show');
	if ($('#vet-select option').size() > 1){
		$('#vet-select option:last').prop('selected', true);
	}
	
	$('#vetModal').on('hide.bs.modal', function (e) {
			if ($('#vet-select option').size() == 1){
				$('#vet-verified').prop('checked', false).change();
				$('#vet-select-div').hide();
			}
	});
}