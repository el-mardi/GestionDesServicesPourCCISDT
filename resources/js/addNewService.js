$(document).ready(function(){

    if ($('#selectservice').length) {

        document.querySelector('#selectservice').addEventListener("change", function() {

            var value = this.value;
            // console.log(value);
    
                 $.ajax({    
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
     
                 type:'POST',
                 url:'getservice',
                 data:{service:value},
                 success:function(data){
                    //  alert(data);
                    if (window.location.pathname === '/dashboard/contrat-accompagnement') {
                        $('#hiddenservices').append(data);
                        
                    }else if (window.location.pathname === '/dashboard/packs/create') {
                        $('#hiddenPackServices').append(data);
                    }
                    else if(window.location.pathname === '/dashboard/orientation'){
                        $('#hiddenservices-orientation').append(data);
                    }else{
                        $('#hiddenPackServicesEdit').append(data);

                    }
                 },
                 error:function(data){
                    console.log(JSON.stringify(error));
                 }
    
              });
       
      });
      
    }
   

    
      
}); //Ready

