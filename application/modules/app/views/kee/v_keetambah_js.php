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
            jenis: {
                required: true
            },
            lokasi: {
                required: true,
            },
            luas: {
                required: true,
            },
            bentuk: {
                required: true,
            },
            sk: {
                required: true,
            },
            nilai: {
                required: true,
            }
        }
});

 

 
</script>