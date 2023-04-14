<script>

jQuery( document ).ready( function( $ ) {
    $('.wysi').each(function() {
    $(this).wysihtml5();
});
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
        data: csfrData
    });
    var $table1 = jQuery( '#table-1' );            
    // Initialize DataTable
    $table1.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "bStateSave": false,
        "order": [[ 1, "desc" ]],
        "fnDrawCallback": function () {
            $(".hapus").click(function (e) {
                var v_id = this.id;
                $.confirm({
                    title: 'Hapus!',
                    content: 'Yakin ingin menghapus ?',
                    buttons: {
                        hapus: {
                            text: 'Hapus',
                            btnClass: 'btn-primary',
                            action: function(){
                                window.location.assign("<?php echo base_url() ?>app/dokumenhapus?id="+v_id);
                            }
                        },
                        batal: function () {

                        }
                        
                    }
                });
          });
        },
    });
    // Initalize Select Dropdown after DataTables is created
    $table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
        minimumResultsForSearch: -1
    });






$('#formprofil').validate({ // initialize plugin
    highlight: function (label) {
        $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        $('#status-error').css({'font-size':'6px'});
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
        namakawasan: {
            required: true
        },
        lintang: {
            required: true,
            number: true
        },
        bujur: {
            required: true,
            number: true
        }, 
        id_skw: {
            required: true,
        }
    },  
});


});

 
</script>