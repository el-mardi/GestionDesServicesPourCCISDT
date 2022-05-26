$(document).ready(function(){

    if ($('#selectpack').length) {

        document.querySelector('#selectpack').addEventListener("change", function() {

            var value = this.value;
            // console.log(value);
    
                 $.ajax({    
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
     
                 type:'POST',
                 url:'getpack',
                 data:{pack:value},
                 success:function(data){
                    //  alert(data);
                        $('#hiddenpacks').append(data);
        
                 },
                 error:function(data){
                    console.log(JSON.stringify(error));
                 }
    
              });
       
      });
    }
   

    
      
}); //Ready

