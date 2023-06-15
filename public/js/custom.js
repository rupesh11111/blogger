$(document).ready(function() {
    $("#ajaxFormSubmit").validate({
        rules: rules,
        messages: messages,
        submitHandler: function(form) {
            $(form).submit(function(e) {
                e.preventDefault(); 
                const thisValue = $(this) 
                var formData = thisValue.serialize();
                $.ajax({
                    url: thisValue.data('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        console.log(thisValue.data('redirect'))
                            $.toast({
                                heading: 'Success',
                                text: response.message,
                                showHideTransition: 'slide',
                                icon: 'success'
                            })
                            setTimeout(function (e) {
                                window.location.href = thisValue.data('redirect');
                            }, 2000);
                    },
                    error: function(xhr) {
                        $.toast({
                            heading: 'Error',
                            text: xhr.responseJSON.message,
                            showHideTransition: 'fade',
                            icon: 'error'
                        })
                    }
                });
            });        
          }
    });




    ajaxDataTableObject = $('#ajaxDataTable').DataTable({
        processing: false,
        serverSide: true,
        paging: true,
        ajax: {
            method: 'GET',
            url: url,
            beforeSend() {
                $('.loader_image').show();
            },
            complete() {
                $('.loader_image').hide();
            }
        },
        columns: columns,
        order: [
            [0, 'desc']
        ],
      
    });
    
});