<script>
jQuery( document ).ready( function( $ ) {
    var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": true
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });


    

    
} );

$('#form').validate({ // initialize plugin
        highlight: function (label) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
            //$('.error').css({'font-size':'9px','margin-bottom':'0px'});
            $('#status-error').css({'font-size':'8px'});
        },
        success: function (label) {
            $(label).closest('.form-group').removeClass('has-error');
            label.remove();
        },
        errorPlacement: function (error, element) {
            var placement = element.closest('.input-group');
            if (!placement.get(0)) {
                placement = element;
            }
            if (error.text() !== '') {
                placement.after(error);
            }
            
        },

        rules: {
            username: {
                required: true
            },
            nama: {
                required: true
            },
            password: {
                required: true,
                minlength   : 6
            },
            email: {
                email: true
            },
            kpassword: {
                required: true,
                equalTo : password
            },
            jk: {
                required: true,
            },
           
        },
        messages: {
            username: {
                required: "Username tidak boleh kosong"
            },
            nama: {
                required: "Nama tidak boleh kosong"
            },
            password: {
                required: "Password tidak boleh kosong",
                minlength   : "Password minimal 6 karakter"
            },
            email: {
                email: "Format Email Salah"
            },
            kpassword: {
                required: "Konfirmasi Password tidak boleh kosong",
                equalTo : "konfirmasi Password harus sama dengan Password"
            },
            jk: {
                required: "Pilih Jenis Kelamin"
            },
           
        }
    });


</script>