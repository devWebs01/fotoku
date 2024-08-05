$(document).ready(function () {
  window._token = $('meta[name="csrf-token"]').attr('content')
  
  flatpickr(".dmy", {
    allowInput: true,
    locale: 'id',
    dateFormat: "d/m/Y",
  }); 
  
  flatpickr(".jam", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true
  }); 

  $('#changePasswordModal .btn-action').click(function(event) {
    event.preventDefault(); // prevent form submission
    var form = $('#form-changePassword');

    var oldPassword = $('#oldPassword').val();
    var newPassword = $('#newPassword').val();
    var confirmPassword = $('#confirmPassword').val();
  
    if (newPassword !== confirmPassword) {
      alert('New passwords do not match');
      return;
    }
    
    $(this).prop('disabled', true).text('Menyimpan data...');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: `${url}/admin/gantiPassword`,
      type: 'POST',
      data: {
        oldPassword: oldPassword,
        newPassword: newPassword,
      },
      beforeSend: function() {
        form.find('.text-danger').remove();
        form.find('.form-group .is-invalid').removeClass('is-invalid');
      },
      success: function(response, status, xhr) {
        if(xhr.status == 200){
          location.reload();
        }
      },
      error: function(err) {
        if (err.status == 422){
          $.each(err.responseJSON.errors, function (i, error) {
              let el = $("#changePasswordModal form").find('[name="'+i+'"]');
              el.addClass( "is-invalid" );
              el.after($('<span class="text-danger">'+error[0]+'</span>'));
            });
            $('#changePasswordModal .btn-action').removeAttr('disabled').text('Simpan');
        }else if (err.status == 401){
            let el = $("#oldPassword");
            el.addClass( "is-invalid" );
            el.after($('<span class="text-danger">'+err.responseJSON.message+'</span>'));
            $('#changePasswordModal .btn-action').removeAttr('disabled').text('Simpan');
        }else{
            location.reload();
        }
      }
    });
  });

  $('#filterBookingModal .btn-action').click(function(event) {
    event.preventDefault(); 
    var tgl_acara = $('#tgl_acara').val();
  
    $(this).prop('disabled', true).text('Menyimpan data...');
    window.location.href = `${url}/admin/booking?param=`+tgl_acara;

  });

  $('.currency').autoNumeric('init');


  // $('.date').datetimepicker({
  //   format: 'YYYY',
  //   locale: 'en',
  //   icons: {
  //     up: 'fas fa-chevron-up',
  //     down: 'fas fa-chevron-down',
  //     previous: 'fas fa-chevron-left',
  //     next: 'fas fa-chevron-right'
  //   }
  // })

  // $('.datetime').datetimepicker({
  //   format: 'DD-MM-YYYY HH:mm:ss',
  //   locale: 'en',
  //   sideBySide: true,
  //   icons: {
  //     up: 'fas fa-chevron-up',
  //     down: 'fas fa-chevron-down',
  //     previous: 'fas fa-chevron-left',
  //     next: 'fas fa-chevron-right'
  //   }
  // })

  // $('.timepicker').datetimepicker({
  //   format: 'HH:mm:ss',
  //   icons: {
  //     up: 'fas fa-chevron-up',
  //     down: 'fas fa-chevron-down',
  //     previous: 'fas fa-chevron-left',
  //     next: 'fas fa-chevron-right'
  //   }
  // })

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2({ width: '100%' })

  $('.treeview').each(function () {
    var shouldExpand = false
    $(this).find('li').each(function () {
      if ($(this).hasClass('active')) {
        shouldExpand = true
      }
    })
    if (shouldExpand) {
      $(this).addClass('active')
    }
  })
  
})

