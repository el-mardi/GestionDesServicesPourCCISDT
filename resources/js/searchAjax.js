
$(document).ready(function(){
var nFiche = 0;
    $('#checkSearch').click(function (){
        if ($('#checkSearch').is(":checked")) {
            $('#search-select option[value="ressortissant"]').attr("selected", "selected");
            $('#search-select').prop('disabled', true);
            $('#cinSearch').attr('placeholder', 'Rechercher en utilisant le numéro de fiche ');

            nFiche = 1;
        } else {
            $('#search-select').prop('disabled', false);
            $('#cinSearch').attr('placeholder', 'Rechercher en utilisant le N° Pièce d’identité');
            nFiche = 0;
        }
    })

        $('#cinSearch').keyup(function () {

        var cin = this.value;
        var value =   $('#search-select-quality').find(":selected").val();
        var table =   $('#search-select').find(":selected").val();
        // console.log(nFiche);
//         console.log('cin: ' + cin);
//         console.log('qualite: ' + value);
//         console.log('table: ' + table);
// console.log(window.location.origin);    

            $.ajax({    
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
    
                type:'POST',
                url:window.location.origin+'/chercher',
                data:{  
                    cin:cin,
                    qualite: value,
                    table:table,
                    nFiche:nFiche,
                },
                success:function(data){
                    // console.log(data);

                    if (data === 'vide') {
                        $('#SearchOutPutTable').css('display', 'none')
                        $('#results').css('display', 'none');
                    } 
                    else if(data=== 'pas') {
                        $('#results').css('display', 'block').html('Aucuns résultats trouvés.')
                        $('#SearchOutPutTable').css('display', 'none')   
                    }
                    else {
                        $('#SearchOutPutTable').css('display', 'block');
                        $('#SearchOutPut').css('display', 'table-row-group').html(data);
                        $('#results').css('display', 'none');

                        
                    }
                },
                error:function(data){
                //    console.log(JSON.stringify(error));
                $('#results').css('display', 'block').html('Erreur !§')

                }
   
             });
    
    });
   

      
});

