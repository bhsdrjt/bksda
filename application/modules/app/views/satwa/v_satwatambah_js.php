<script>


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
            noseri: {
                required: true
            },
            pemilik: {
                required: true,
            },
            alamat: {
                required: true,
            },
            email: {
                email: true,
            },
            jenis: {
                required: true,
            },
            namasatwa: {
                required: true,
            },
            jumlah: {
                required: true,
                number: true
            },
            sejak: {
                required: true,
            },
            usul: {
                required: true,
            },
            sumber: {
                required: true,
            },
            genetik: {
                required: true,
            },
            kesehatan: {
                required: true,
            },
            waktu: {
                required: true,
            }
        }
});

 

 
</script>