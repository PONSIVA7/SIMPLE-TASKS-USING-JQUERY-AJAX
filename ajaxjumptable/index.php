<html>
	<head>
		<title>jQuery DataTable Jump to a Specific Page with PHP Ajax</title>
		<!-- JS, Popper.js, and jQuery -->
		<script  src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<!-- CSS only -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
	</head>
	<body>
		<div class="container">
			<br />
			<h1 align="center" class="text-primary"><b>jQuery DataTable Jump to a Specific Page with PHP Ajax</b></h1>
			<br />
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-9">Customer Data</div>
						<div class="col-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">Page</span>
								</div>
								<select name="pagelist" id="pagelist" class="form-control"></select>
								<div class="input-group-append">
									<span class="input-group-text">of&nbsp;<span id="totalpages"></span></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">

						<table id="customer_table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Customer ID</th>
									<th>Customer First Name</th>
									<th>Customer Last Name</th>
									<th>Customer Email</th>
									<th>Customer Gender</th>
								</tr>
							</thead>
						</table>
						
					</div>
				</div>
			</div>
		</div>
		<br />
		<br />
	</body>
</html>

<script type="text/javascript" language="javascript">

$(document).ready(function(){

	function load_data(start, length)
	{
		var dataTable = $('#customer_table').DataTable({
			"processing" : true,
			"serverSide" : true,
			"order" : [],
			"retrieve": true,
			"ajax" : {
				url:"fetch.php",
				method:"POST",
				data:{start:start, length:length}
			},
			"drawCallback" : function(settings){
				var page_info = dataTable.page.info();

				$('#totalpages').text(page_info.pages);

				var html = '';

				var start = 0;

				var length = page_info.length;

				for(var count = 1; count <= page_info.pages; count++)
				{
					var page_number = count - 1;

					html += '<option value="'+page_number+'" data-start="'+start+'" data-length="'+length+'">'+count+'</option>';

					start = start + page_info.length;
				}

				$('#pagelist').html(html);

				$('#pagelist').val(page_info.page);
			}
		});
	}

	load_data();

	$('#pagelist').change(function(){

		var start = $('#pagelist').find(':selected').data('start');

		var length = $('#pagelist').find(':selected').data('length');

		load_data(start, length);

		var page_number = parseInt($('#pagelist').val());

		var test_table = $('#customer_table').dataTable();

		test_table.fnPageChange(page_number);

	});
	

});	
</script>