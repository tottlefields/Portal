

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

function clearCanvas(){
	var canvas = $('#canvasBarcode').get(0);
    var ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

function generateBarcode(value){
	clearCanvas();
	var settings = {
	  	output: 'canvas',
	    bgColor: '#FFFFFF',
	    color: '#000000',
		barWidth: 1,
		barHeight: 70,
		posX: 0,
		posY: 0,
		showHRI: 0
	};
	$("#canvasBarcode").show().barcode(value, "code39", settings);
	
	var canvas = document.getElementById("canvasBarcode");
	return canvas.toDataURL("image/png");
}


function createAllLabels(swabs, testList, petName, ownerName, mainContact){
	var doc = new jsPDF({
		orientation: 'landscape',
		unit: 'mm',
		format: [100, 62]
	});
	
	for (var i=0; i<testList.length; i++){
		createLabel(doc, swabs[i], testList[i], petName, ownerName, mainContact);
		if (i<testList.length-1)
			doc.addPage();
	}
	
	doc.autoPrint();
	doc.output('dataurlnewwindow');
}

function createLabel(doc, swabID, testCode, dogName, ownerName, contact){
	barcodeData = generateBarcode(swabID);
	
	doc.setFont("helvetica");
	doc.setFontSize(18);
	doc.setFontType("bold");
	//doc.text(23, 12, 'Swab #'+swabID);
	doc.text(25, 12, swabID);
	
	doc.setFontSize(18);
	doc.setFontType("bold");
	doc.text(3, 30, 'Test:');
	doc.setFontSize(16);
	doc.setFontType("normal");
	doc.text(25, 30, testCode);
	
	doc.setFontSize(18);
	doc.setFontType("bold");
	doc.text(3, 40, 'Dog:');
	doc.setFontSize(16);
	doc.setFontType("normal");
	doc.text(25, 40, dogName.toUpperCase());
	
	doc.setFontSize(18);
	doc.setFontType("bold");
	doc.text(3, 50, 'Contact:');
	doc.setFontSize(16);
	doc.setFontType("normal");
	doc.text(35, 50, ownerName.toUpperCase());
	doc.text(10, 58, contact);

	doc.addImage(aht, 'PNG', 1, 1, 20, 18);
	doc.addImage(barcodeData, 'PNG', 60, 1, 40, 40);
}