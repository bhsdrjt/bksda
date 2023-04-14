<script>
jQuery( document ).ready( function( $ ) {
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
        "order": [[ 0, "asc" ]],
        "fnDrawCallback": function () {
            
            $('.edit').click(function (e) {
            
            var v_id_kawasan = this.id;
            var v_url = "<?php echo base_url() ?>app/kawasanedit";
            
                $.ajax({
                    type: 'POST',
                    url: v_url,
                    data: {
                        id_kawasan: v_id_kawasan
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        $('#modal-edit').html(response)
                        $('#form2').validate({ // initialize plugin
                            
                            highlight: function (label) {
                                $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
                                //$('.error').css({'font-size':'9px','margin-bottom':'0px'});
                                $('#status-error').css({'font-size':'9px'});
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
                            messages: {
                                namakawasan: {
                                    required: "Nama kawasan Tidak boleh kosong"
                                },
                                lintang: {
                                    required: "Koordinat lintang Tidak boleh kosong",
                                    number: "Format salah, hanya isi dengan angka"
                                },
                                bujur: {
                                    required:"Koordinat Bujur Tidak boleh kosong",
                                    number: "Format salah, hanya isi dengan angka"
                                },
                                id_skw: {
                                    required:"SKW  Tidak boleh kosong"
                                }
                            }
                        });
                        
                     }
                });
            });

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
                            window.location.assign("<?php echo base_url() ?>app/kawasanhapus?id="+v_id);
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
    

        } );


$('#form').validate({ // initialize plugin
    highlight: function (label) {
        $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        //$('.error').css({'font-size':'9px','margin-bottom':'0px'});
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
    messages: {
        namakawasan: {
            required: "Nama kawasan Tidak boleh kosong"
        },
        lintang: {
            required: "Koordinat lintang Tidak boleh kosong",
            number: "Format salah, hanya isi dengan angka"
        },
        bujur: {
            required:"Koordinat Bujur Tidak boleh kosong",
            number: "Format salah, hanya isi dengan angka"
        },
        id_skw: {
            required:"SKW  Tidak boleh kosong"
        }
    }
});

 
</script>