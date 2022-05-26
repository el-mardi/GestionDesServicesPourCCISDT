$(document).ready(function(){
//Ajouter domaine et activite pour creer nouveau ressortissant
if ($('#SelectSecteur').length) {

    document.querySelector('#SelectSecteur').addEventListener('change', function() {
        var value = this.value;
        // console.log(value);

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type:'POST',
            url: '/dashboard/getactivite',
            data: {secteur: value},
            success: function (data){
                // console.log('activite' + data);
                $('#activite').html(data);

            },
            error: function (data){
                console.log(JSON.stringify(error));
            }
        });

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type:'POST',
            url: '/dashboard/getdomaine',
            data: {secteur: value},
            success: function (data){
                // console.log('domaine'+ data);
                $('#domaine').html(data);
            },
            error: function (data){
                console.log(JSON.stringify(error));
            }
        });
    })

}
});