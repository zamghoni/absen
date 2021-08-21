// delete
$(document).on("click",".hapus",function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Apakah Anda yakin?',
        text: "Data tersebut akan dihapus",
        type: 'warning',
        width : '25rem',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus Data!',
        cancelButtonText: 'Tidak, Batalkan!',
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false
    }).then((result) => {
      document.location.href = href;
    }, function (dismiss) {
        // dismiss can be 'cancel', 'overlay',
        // 'close', and 'timer'
        if (dismiss === 'cancel') {
          Lobibox.notify('warning', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            delayIndicator: true,
            icon: 'bx bx-error',
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: 'File yang anda pilih tidak dihapus'
          });
        }
    })
  });
