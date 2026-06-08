
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
					title: flashData.type === 'success' ? 'Sukses!' : 'Oops...',
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

});


/*
|--------------------------------------------------------------------------
| TOGGLE PASSWORD
|--------------------------------------------------------------------------
*/

$('#togglePassword').on('click', function () {

	let password =
		$('#password');

	let icon =
		$(this).find('i');

	if (password.attr('type') == 'password') {

		password.attr('type', 'text');

		icon.removeClass('bi-eye');

		icon.addClass('bi-eye-slash');

	} else {

		password.attr('type', 'password');

		icon.removeClass('bi-eye-slash');

		icon.addClass('bi-eye');
	}
});
