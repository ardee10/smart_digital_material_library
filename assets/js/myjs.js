const base = $('#base').data('id');

$(document).ready(function() {
	if ($('.flash-data').length) {
		try {
			const flashDataElement = $('.flash-data').data('flashdata');
			const flashData = typeof flashDataElement === 'object' 
				? flashDataElement 
				: JSON.parse(flashDataElement || '{}');
			
			if (flashData.text) {
				Swal.fire({
					icon: flashData.type || 'info',
					title: flashData.type === 'success' ? 'Success!' : 'Oops...',
					text: flashData.text,
					timer: flashData.type === 'success' ? 2000 : 3000,
					showConfirmButton: flashData.type !== 'success',
					timerProgressBar: true
				});
			}
		} catch (e) {
			console.error('Error parsing flash data:', e);
		}
	}

	/* Hapus Data - pakai event delegation agar bekerja di DataTables */
	$(document).on('click', '.tombol-hapus', function (e) {
		e.preventDefault();
		const href = $(this).attr('href');

		Swal.fire({
			title: 'Are you sure?',
			text: "Data will be deleted!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#e74c3c',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = href;
			}
		});
	});

	/* Model Number */
	$("#tblModelNumber").DataTable({
		responsive: true,
		lengthChange: !0,
		autoWidth: !1,
		paging: !0,
		lengthMenu: [
			[10, 25, 50, -1],
			[10, 50, 100, "All"],
		],
	});	
	
	/* Location */
	$("#tblLocation").DataTable({
		responsive: true,
		lengthChange: !0,
		autoWidth: !1,
		paging: !0,
		lengthMenu: [
			[10, 25, 50, -1],
			[10, 50, 100, "All"],
		],
	});	

	$("#tblSupplier").DataTable({
		responsive: true,
		processing: true,
		serverSide: true,

		ajax: {
			url: base + 'Admin/supplierServerside',
			type: 'POST'
		},

		order: [[1, 'asc']],

		lengthMenu: [
			[10, 25, 50, 100],
			[10, 25, 50, 100]
		]
	});
	
	$('#tblMatAssets').DataTable({
	processing: true,
	serverSide: true,
	responsive: true,
	autoWidth: false,

	ajax: {
			url: base + 'Home/materialAssets',
			type: 'POST'
		},

	columnDefs: [{
	targets: [0, 2, 3, 4, 5,6],
	className: 'text-center'
	}],

	lengthMenu: [
	[10, 25, 50, 100],
	[10, 25, 50, 100]
	]
	});

// 	let table = $('#tblMaterials').DataTable({

// 	processing: true,

// 	serverSide: true,

// 	ajax: {

// 		// url: base + 'Material/materialServerside',
// 		url: base + 'Home/materialServerside',

// 		type: 'POST',

// 		data: function(d) {

// 			d.supplier =
// 				$('#filter_supplier').val();

// 			d.production_location =
// 				$('#filter_location').val();

// 			d.production_leadtime =
// 				$('#filter_production_leadtime').val();

// 			d.sample_leadtime =
// 				$('#filter_sample_leadtime').val();

// 			d.season =
// 				$('#filter_season').val();

// 			d.lifecycle =
// 				$('#filter_lifecycle').val();
// 		}
// 	}
// });

	$('#tblmodelAssets').DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		autoWidth: false,
		order: [],
		ajax: {
			url: base + 'Home/modelAssetsServerside',
			type: 'POST'
		},

		columnDefs: [
			{
				targets: [0,3,4],
				className: 'text-center',
				orderable: false
			}

		],

		lengthMenu: [

			[10,25,50,100],
			[10,25,50,100]

		]

	});

	$("#tblClassification").DataTable({
	responsive: true,
	processing: true,
	serverSide: true,
	autoWidth: false,

	ajax: {
		url: base + 'Admin/classificationServerside',
		type: 'POST'
	},

	lengthMenu: [
		[10, 25, 50, 100],
		[10, 25, 50, 100]
	]	
	});
	

		/*
    |--------------------------------------------------------------------------
    | DATATABLE INIT
    |--------------------------------------------------------------------------
    */

	let materialFilter = {

		keyword: '',
		supplier: '',
		lifecycle: '',
		classification: '',
		season: '',
		location: '',
		composition: '',
		minPrice: '',
		maxPrice: ''

	};

	// let materialsTable = $('#materials').DataTable({

	// 	responsive: true,
	// 	processing: true,
	// 	serverSide: true,

	// 	ajax: {

	// 		url: base + 'Home/materialServerside',
	// 		type: 'POST',

	// 		data: function(d) {

	// 			d.keyword = materialFilter.keyword;
	// 			d.supplier = materialFilter.supplier;
	// 			d.lifecycle = materialFilter.lifecycle;
	// 			d.classification = materialFilter.classification;
	// 			d.season = materialFilter.season;
	// 			d.location = materialFilter.location;
	// 			d.composition = materialFilter.composition;
	// 			d.minPrice = materialFilter.minPrice;
	// 			d.maxPrice = materialFilter.maxPrice;

	// 		}

	// 	},

	// 	columnDefs: [{
	// 		targets: [0, 1, 2, 9],
	// 		orderable: false
	// 	}],

	// 	lengthMenu: [
	// 		[10, 25, 50, 100],
	// 		[10, 25, 50, 100]
	// 	]

	// });
	/*
	|--------------------------------------------------------------------------
	| DEFAULT GRID LOAD gridWrapper materialsGrid
	|--------------------------------------------------------------------------
	*/

	function loadGridMaterials(page = 1) {
		$('#gridWrapper').html(` 
        <div class="col-12 text-center">
            <div class="spinner-border text-primary"></div>
        </div>
    `);
		$.ajax({
			url: base + 'Home/materialsGrid',
			type: 'POST',
			data: {
				page: page,
				filtermlm: $('#filtermlm').val(),
				filterSupplier: $('#filterSupplier').val(),
				filterMaterialName: $('#filterMaterialName').val(),
				filterClassification: $('#filterClassification').val(),
				filterLocation: $('#filterLocation').val(),
				filterLifecycle: $('#filterLifecycle').val(),
				filterComposition: $('#filterComposition').val(),
				filterConstruction: $('#filterConstruction').val(),
				filterTechnology: $('#filterTechnology').val(),
				filterSampleLeadtime: $('#filterSampleLeadtime').val(),
				filterProductionLeadtime: $('#filterProductionLeadtime').val(),
				filterPrice: $('#filterPrice').val()
			},
			success: function(response) {
				$('#gridWrapper').html(response);
			}
		});
	}

	$('.filterSelect').on('change', function() {
		if ($('#gridWrapper').is(':visible')) {
			loadGridMaterials();
		}
	});
	/*
	|--------------------------------------------------------------------------
	| GRID BUTTON
	|--------------------------------------------------------------------------
	*/

	$('#btnGridView').on('click', function() {
		/*
		|--------------------------------------------------------------------------
		| BUTTON ACTIVE
		|--------------------------------------------------------------------------
		*/

		$('#btnGridView')
			.removeClass('btn-outline-primary')
			.addClass('btn-primary active');

		$('#btnListView')
			.removeClass('btn-primary active')
			.addClass('btn-outline-primary');

		/*
		|--------------------------------------------------------------------------
		| SHOW GRID
		|--------------------------------------------------------------------------
		*/
		$('#listView').hide();
		$('#gridView').fadeIn(200);

		/*
		|--------------------------------------------------------------------------
		| LOAD GRID AJAX
		|--------------------------------------------------------------------------
		*/

		loadGridMaterials();

	});
	/*
	|--------------------------------------------------------------------------
	| LIST BUTTON
	|--------------------------------------------------------------------------
	*/
	$('#btnListView').on('click', function() {
		/*
		|--------------------------------------------------------------------------
		| BUTTON ACTIVE
		|--------------------------------------------------------------------------
		*/

		$('#btnListView')
			.removeClass('btn-outline-primary')
			.addClass('btn-primary active');

		$('#btnGridView')
			.removeClass('btn-primary active')
			.addClass('btn-outline-primary');
		/*
		|--------------------------------------------------------------------------
		| SHOW LIST
		|--------------------------------------------------------------------------
		*/
		$('#gridView').hide();
		$('#listView').fadeIn(200);

		/*
		|--------------------------------------------------------------------------
		| RELOAD DATATABLE
		|--------------------------------------------------------------------------
		*/
		if (window.materialsTable && window.materialsTable.ajax) {
			window.materialsTable.ajax.reload(null, false);
		}
	});

});

/* Table Materials Load */




