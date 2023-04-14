<script>
      $('#data2').on("change", function(){
        var id = $(this).val();

        if(id == "Buatan")
        {
            $('#data3')
                .find('option')
                .remove()
                .end()
                .append('<option value="" disabled >.:Pilih Jenis:.</option>  <option value="Bekas Tebangan">Bekas Tebangan</option> <option value="lahan Perkebunan">lahan Perkebunan</option>  <option value="Lahan Pertanian">Lahan Pertanian</option> <option value="Bekas Kebakaran">Bekas Kebakaran</option> <option value="Tambak">Tambak</option>  <option value="Lainnya">Lainnya</option>'
                )
                .val('');
           
        }
        else if(id == "Alami")
        {
            $('#data3')
                .find('option')
                .remove()
                .end()
                .append('<option value="" disabled >.:Pilih Jenis:.</option>  <option value="Savana">Savana</option> <option value="Rawa/Sungai/Danau">Rawa/Sungai/Danau</option>  <option value="Bekas Longsor">Bekas Longsor</option> <option value="Karst/Tebing">Karst/Tebing</option>  <option value="Bekas Lahar">Bekas Lahar</option> <option value="Pantai">Pantai</option> <option value="Semak Belukar">Semak Belukar</option> <option value="Lainnya">Lainnya</option>'
                )
                .val('');
        } else {

        }
      });

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
        id_kawasan: {
            required: true
        },
        kegiatan: {
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
        waktu: {
            required: true
        }, 
        data1: {
            required: true
        }, 
        data2: {
            required: true
        }
        , 
        data3: {
            required: true
        }
        , 
        data4: {
            required: true
        },
        petugas: {
            required: true
        }
    },
    messages: {
    }
}); 



 
</script>