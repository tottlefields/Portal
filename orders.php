<?php

define('INCLUDE_CHECK',true);
require_once '.includes/php/connect.php';
require_once '.includes/php/functions.php';

$swab_data = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM swab_data ORDER BY ID"));	

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>AHT DNA Testing - AHT swab testing portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="icon" type="image/png" sizes="96x96" href=".includes/images/favicon.ico">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href=".includes/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href=".includes/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" type="text/css" href=".includes/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href=".includes/css/bootstrap-toggle.min.css">
<link rel="stylesheet" type="text/css" href=".includes/css/bootstrap-dialog.min.css">
<link rel="stylesheet" type="text/css" href=".includes/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href=".includes/css/styles.css">

</head>
<body>
	<div class="container-fluid">
		<div class="row" style="text-align: center">
			<!-- <img src=".includes/images/aht-logo.png" style="float:left" class="hidden-md hidden-sm hidden-xs" />
			<img src=".includes/images/aht-logo-sml.png" style="float:left" class="visible-md visible-sm visible-xs" /> -->
			<img src=".includes/images/aht-logo-sml.png" style="float: left" />
			<div class="btn-group-vertical pull-right" role="group" style="margin-top: 10px; margin-right: 15px">
				<a href="Instructions.pdf" target="_blank" class="btn btn-default" tabindex="-1"><i class="fa fa-file-pdf-o text-danger" aria-hidden="true"></i>&nbsp;<span class="hidden-sm hidden-xs">View </span>Docs</a>
				<button type="button" class="btn btn-default admin" tabindex="-1" id="but_clearall">
					<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Clear<span class="hidden-sm hidden-xs"> ALL Data</span>
				</button>
			</div>
			<!-- <h1 class="hidden-sm hidden-xs" style="line-height: 105px;margin: 0 463px 0 0;">AHT Swab Collection Portal</h1> -->
			<h1 class="hidden-sm hidden-xs"
				style="line-height: 105px; margin: 0 100px 0 0;">AHT Swab Collection Portal</h1>
		</div>
		<div class="row visible-sm visible-xs" style="text-align: center">
			<div class="col-sm-12">
				<h1>AHT Swab Collection Portal</h1>
			</div>
		</div>
		
		<canvas id="canvasBarcode" style="position: absolute; left: 5px; top: 5px; z-index: -999" width="250px" height="80px"></canvas>
		<div style="position: absolute; height: 90px; width: 260px; left: 0px; top: 0px; z-index: -10; background-color: #FFFFFF">&nbsp;</div>

		<div class="row">
			<ul class="nav nav-tabs">
				<li><a href="index.php" tabindex="-1">Input Form</a></li>
				<li class="active"><a href="orders.php" tabindex="-1">Orders</a></li>
			</ul>
		</div>

		<div class="tab-content ">
			<div class="tab-pane active" id="tab-table">
				<div class="row">
					<div class="col-sm-12" style="font-size: 0.8em">
						<table id="swab_details" class="table table-bordered table-hover display" style="width: 100%">
							<thead>
								<tr>
									<th>Returned?</th>
									<th>Swab#</th>
									<th>Test</th>
									<th>Vet Verified?</th>
									<th>Report?</th>
									<th>Registered Name</th>
									<th>Pet Name</th>
									<th>Reg No.</th>
									<th>Microchip</th>
									<th>DOB</th>
									<th>Breed</th>
									<th>Colour</th>
									<th>Sex</th>
									<th>Owner</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Address</th>
									<th>Town</th>
									<th>County</th>
									<th>Country</th>
									<th>Postcode</th>
									<th>Vet</th>
									<th>Vet Email</th>
									<th>Vet Phone</th>
									<th>Vet Fax</th>
									<th>Vet Address</th>
									<th>Vet Town</th>
									<th>Vet Postcode</th>
									<th>Research?</th>
									<th>Label</th>
									<th>SwabID</th>
								</tr>
							</thead>
<?php
if (count($swab_data) > 0){
	echo '<tbody>';
	foreach ($swab_data as $row){
		if ($row[4] == ''){ continue; }
		$vet = ($row[5] == 0) ? 'No' : 'Yes';
		$research = ($row[30] == 0) ? 'No' : 'Yes';
		echo '
								<tr>
									<td>'.$row[1].'</td>
									<td>'.$row[3].'</td>
									<td>'.$row[4].'</td>
									<td>'.$vet.'</td>
									<td>'.$row[6].'</td>
									<td>'.$row[7].'</td>
									<td>'.$row[8].'</td>
									<td>'.$row[9].'</td>
									<td>'.$row[10].'</td>
									<td>'.$row[11].'</td>
									<td>'.$row[12].'</td>
									<td>'.$row[13].'</td>
									<td>'.$row[14].'</td>
									<td>'.$row[15].'</td>
									<td>'.$row[16].'</td>
									<td>'.$row[17].'</td>
									<td>'.$row[18].'</td>
									<td>'.$row[19].'</td>
									<td>'.$row[20].'</td>
									<td>'.$row[21].'</td>
									<td>'.$row[22].'</td>
									<td>'.$row[23].'</td>
									<td>'.$row[24].'</td>
									<td>'.$row[25].'</td>
									<td>'.$row[26].'</td>
									<td>'.$row[27].'</td>
									<td>'.$row[28].'</td>
									<td>'.$row[29].'</td>
									<td>'.$research.'</td>
									<td></td>
									<td>'.$row[0].'</td>
								</tr>';
	}
	echo '</tbody>';	
}?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer> </footer>

	<!-- Verification Details Modal -->
	<div class="modal" id="vetModal" tabindex="-1" role="dialog"
		aria-labelledby="vetModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="vetModalLabel">Verifier Details</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" id="vet_details_form">
						<div class="form-group">
							<label class="col-sm-3 control-label">Verifier Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="" name="vet-name" id="vet-name" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Address</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="" name="vet-address" id="vet-address" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Town/City</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="" name="vet-city" id="vet-city" />
							</div>
							<label class="col-sm-2 control-label">Postcode</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" value="" name="vet-postcode" id="vet-postcode" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control required" value="" name="vet-email" id="vet-email" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Phone</label>
							<div class="col-sm-4">
								<input type="tel" class="form-control" value="" name="vet-phone" id="vet-phone" />
							</div>
							<label class="col-sm-2 control-label">Fax</label>
							<div class="col-sm-3">
								<input type="tel" class="form-control" value="" name="vet-fax" id="vet-fax" />
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="but-cancel-vet">Cancel</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="but-add-vet">Add Verifier</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src=".includes/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src=".includes/js/datatables.min.js"></script>
	<script type="text/javascript" src=".includes/js/bootbox.min.js"></script>
	<script type="text/javascript" src=".includes/js/bootstrap.min.js"></script>
	<script type="text/javascript" src=".includes/js/bootstrap-toggle.min.js"></script>
	<script type="text/javascript" src=".includes/js/bootstrap-dialog.min.js"></script>
	<script type="text/javascript" src=".includes/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src=".includes/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src=".includes/js/jspdf.min.js"></script>
	<script type="text/javascript" src=".includes/js/pdfmake.min.js"></script>
	<script type="text/javascript" src=".includes/js/vfs_fonts.js"></script>
	<script type="text/javascript" src=".includes/js/jquery-barcode.min.js"></script>
	<script type="text/javascript" src=".includes/js/data.js"></script>
	<script type="text/javascript" src=".includes/js/functions.js"></script>
<?php
if (isset($label_data) && count($label_data) > 0){ ?>
	<script type="text/javascript">
		$(document).ready(function() {
				createAllLabels(<?php echo json_encode($label_data); ?>);
		});
		var labelData = <?php echo json_encode($label_data); ?>;
	</script>
<?php $label_data = array();
} ?>
	
	<script>
		$(document).ready(function() {
			$.each(countryList, function(key, value) {
				$("#owner-country").append($('<option>').text(value).attr('value', key));
			});
			
			$("#noDogs").keyup(function() {
				if ($("#noDogs").val() == 0)
					$("#dogsTable").hide();
				else if ($("#noDogs").val() > 0) {
					$("#dogsTable > thead").html("");
					$("#dogsTable > tbody").html("");
					$("#dogsTable").show();
					var noDogs = $("#noDogs").val();
					
					var headerRowContent = '<tr><th style="width:30px;">&nbsp;</th>';
					headerRowContent += '<th style="width:10%;">Breed</th>';
					headerRowContent += '<th style="width:15%;">Registered Name</th>';
					headerRowContent += '<th style="width:10%;">Registration No.</th>';
					headerRowContent += '<th style="width:10%;">Pet Name</th>';
					headerRowContent += '<th style="width:10%;">Birth Date</th>';
					headerRowContent += '<th style="width:5%;">Sex</th>';
					headerRowContent += '<th style="width:10%;">Colour</th>';
					headerRowContent += '<th style="width:10%;">Microchip</th>';
					headerRowContent += '<th>Tests Available</th></tr>';
					$("#dogsTable thead").append(headerRowContent);
					
					for (i = 1; i <= noDogs; i++) {
						var newRowContent = '<tr><td style="vertical-align:top">'+ i + '</td>';
						newRowContent += '<td><select id="breed-select_'+i+'" class="form-control required input-sm breed-select" name="breed_'+i+'"><option value="">Select Breed...</option>';
						for (j=0; j<allBreeds.length; j++){
							newRowContent += '<option value="'+allBreeds[j]+'">'+ allBreeds[j]+ '</option>';
						}
						newRowContent += '</select></td>';
						newRowContent += '<td><input type="text" class="form-control input-sm" placeholder="Registered Name" value="" name="registered-name_'+i+'" id="registered-name_'+i+'"/></td>';
						newRowContent += '<td><input type="text" class="form-control input-sm" style="text-transform:uppercase" placeholder="Registration No." value="" name="registration-number_'+i+'" id="registration-number_'+i+'"/></td>';
						newRowContent += '<td><input type="text" class="form-control input-sm required" placeholder="Pet Name" value="" name="pet-name_'+i+'" id="pet-name_'+i+'"/></td>';
						newRowContent += '<td><input type="text" class="form-control input-sm datepicker-me num" value="" name="birth-date_'+i+'" id="birth-date_'+i+'" autocomplete="off" placeholder="dd/mm/yyyy" /></td>';
						newRowContent += '<td><select id="sex_'+i+'" class="form-control input-sm" name="sex_'+i+'"><option value="">Unknown</option><option value="Male">Male</option><option value="Female">Female</option></select></td>';
						newRowContent += '<td><input type="text" class="form-control input-sm" placeholder="Colour" value="" name="colour_'+i+'" id="colour_'+i+'"/></td>';
						newRowContent += '<td><input type="text" class="form-control input-sm" placeholder="Microchip" value="" name="microchip_'+i+'" id="microchip_'+i+'"/></td>';
						newRowContent += '<td id="available_tests_'+i+'"></td></tr>';
						$("#dogsTable tbody").append(newRowContent);
					}

					$('.datepicker-me').datepicker("destroy");
					$('.datepicker-me').datepicker({ format : 'dd/mm/yyyy' });

					$('.breed-select').change(function(event) {
						selectedBreed = $('#'+$(this).attr("id")+' option:selected').val();
						var a = $(this).attr("id").split("_");
						if (selectedBreed !== "") {
							var html = '';
							var testAll = breedTests['all'];
							for ( var key in testAll) {
								html += '<div class="checkbox input-sm"><label><input type="checkbox" class="test_checkbox" name="breed_tests_'+a[1]+'[]" value="'+key+'">'+ testAll[key]+ '</label></div>';
							}
							var testList = breedTests[selectedBreed];
							if (testList && Object.keys(testList).length > 0) {
								for ( var key in testList) {
									html += '<div class="checkbox input-sm"><label><input type="checkbox" class="test_checkbox" name="breed_tests_'+a[1]+'[]" value="'+key+'">'+ testList[key]+ '</label></div>';
								}
							}
							$('#available_tests_'+a[1]).html(html);
						}

						$('.test_checkbox').change(function(e) {
							if ($('#swab_details_form').valid()) { $('#form_submission_but').prop('disabled', false); }
							else { $('#form_submission_but').prop('disabled', 'disabled'); }
						});
					});
				}
			});
			
			var vetDetails;
			try {vetDetails = JSON.parse(localStorage.getItem('vetDetails'))|| []; }
			catch (err) { vetDetails = []; }
			for (var i = 0; i < vetDetails.length; i++) {
				var vet = vetDetails[i];
				$('#vet-select').append($('<option>', { value : vet.id, text : vet.name }));
			}
			
			$("#swab_details_form").validate({
				errorPlacement : function(error, element) {
					/* Need to add this function to remove the error default placement */
				}
			});
			$('input[class="radiorequired"]').rules("add", "required");
			$('#swab_details_form input').on('keyup blur',function() { // fires on every keyup & blur
				if ($("#noDogs").val() > 0 && $('#swab_details_form').valid()) { // checks form for validity
					$('#form_submission_but').prop('disabled', false); // enables button
				} else {
					$('#form_submission_but').prop('disabled', 'disabled'); // disables button
				}
			});
			
			$('input[name="format"]').change(function() {
				if ($(this).val() == 'Email') {
					$("#vet-email").addClass("required");
					$("#owner-email").addClass("required");
					$('#vet-address').removeClass("error required");
					$('#owner-address').removeClass("error required");
					$('#vet-postcode').removeClass("error required");
					$('#owner-postcode').removeClass("error required");
					$('#owner-phone').removeClass("error required");
				} else if ($(this).val() == 'Post') {
					$('#vet-address').addClass("required");
					$('#owner-address').addClass("required");
					$('#vet-postcode').addClass("required");
					$('#owner-postcode').addClass("required");
					$('#owner-phone').addClass("required");
					$("#vet-email").removeClass("error required");
					$("#owner-email").removeClass("error required");
				}
			});
			
			$('#vet-select').change(function(e) {
				if ($(this).val() == 0) { showVetModal(); }
			});
			
			$('#vet-verified').change(function() {
				if ($(this).prop('checked')) {
					if (vetDetails.length == 0) { showVetModal(); } 
					else { $('#vet-select option:last').prop('selected',true); }
					$('#vet-select-div').show();
				} else { $('#vet-select-div').hide(); }
			});
			
			$('#but-add-vet').click(function() { addVetDetails(); });
			
			var table = $('#swab_details').DataTable({
				order: [ [ 1, "desc" ] ],
				columns: [ {
						title: "Returned?",
						render: function(data, type, row) {
							if (type === 'display') {
								var cell_contents = '';
								if (data == 1) {
									cell_contents = '<i id="'+row[1]+'" class="fa fa-check-square-o fa-lg text-success" aria-hidden="true"></i>';
								} else {
									cell_contents = '<i id="'+row[1]+'" style="cursor:pointer" class="swab_ret fa fa-square-o fa-lg text-danger" aria-hidden="true"></i>';
								}
								cell_contents += '<span id="span_'+row[1]+'"  style="display:none;">'+ data+ '</span>';
								return cell_contents;
							}
							return data;
						},
						className: "text-center" 
				},
				{ title: "Swab#" },
				{ title: "Test" },
				{ title: "Vet Verified?" },
				{ title: "Report?" },
				{ title: "Registered Name" },
				{ title: "Pet Name" },
				{ title: "Reg No." },
				{ title: "Microchip" },
				{ title: "DOB" },
				{ title: "Breed" },
				{ title: "Colour" },
				{ title: "Sex" },
				{ title: "Owner" },
				{ title: "Email" },
				{ title: "Phone" },
				{ title: "Address" },
				{ title: "Town" },
				{ title: "County" },
				{ title: "Country" },
				{ title: "Postcode" },
				{ title: "Vet" },
				{ title: "Vet Email" },
				{ title: "Vet Phone" },
				{ title: "Vet Fax" },
				{ title: "Vet Address" },
				{ title: "Vet Town" },
				{ title: "Vet Postcode" },
				{ title: "Research?" },
				{
					title: "Label",
					render: function(data, type, row, meta) {
						if (type === 'display') {
							var cell_contents = "<a href='javascript:createSingleLabel("+JSON.stringify(row)+")'><i class='fa fa-tag fa-lg' aria-hidden='true'></i>&nbsp Label</a>";
							return cell_contents;
						}
						return data;
					},
					className: "text-center" 
				},
				{ title: "SwabID" },
			],
			columnDefs: [{
				targets: 0,
				width: "50px",
				searchable: false
			}, {
				targets: [ 7, 21 ],
				visible: false,
				searchable: true
			}, {
				targets: [ 4, 9, 11, 12, 14, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 27, 28, 30 ],
				visible: false,
				searchable: false
			}, {
				targets: [ 29 ],
				visible: true,
				searchable: false
			}],
			dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>"
					+ "<'row'<'col-sm-12'tr>>"
					+ "<'row'<'col-sm-5'i><'col-sm-7'p>>",
			buttons: [ {
				extend: 'csv',
				text: "Export",
				fieldSeparator: "\t",
				fieldBoundary: "",
				extension: '.tsv'
			} ], 
		});
		
		$("#swab_details").on('click','.swab_ret',function() {
			var id = $(this).attr('id');
			if ($(this).hasClass("swab_ret")) {
				$(this).css('cursor', 'default');
				$(this).toggleClass("fa-square-o fa-check-square-o");
				$(this).toggleClass("text-danger text-success");
				$(this).removeClass("swab_ret");
				$("span#span_" + id).html("1");
				var data = table.row($(this).parents('tr')).data();
				data[0] = 1;
				table.row($(this).parents('tr')).data(data).draw();
				$.ajax({
						type: "POST",
						url: ".includes/php/ajax.php",
						data: { 'returned' : 1, 'swabID' : data[30] },
						dataType: "json",
				});
			}
		});

		$('#swab_details_form').submit(function(event) {
			//event.preventDefault();
			if ($('input:checkbox[class="test_checkbox"]:checked').length === 0) {
				alert("You need to select one or more tests for your dog.");
				return false;
			}
		});
	});
	</script>

</body>
</html>
