// require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

  
$('#show_interv').click(function (){
    
  var interv  = document.querySelector("#interv");
  var btn  = document.querySelector("#show_interv");

  if (interv.classList.contains('hidden')) {
      interv.classList.remove('class', "hidden");
      interv.classList.add('class', "show");
      btn.innerText = "Masquer"
    } else {
      interv.classList.add('class', "hidden");
      interv.classList.remove('class', "show");
      btn.innerText = "Ajouter des Details"
    }

});

$('#show_act').click(function (){
    
  var interv  = document.querySelector("#act_abrege");
  var btn  = document.querySelector("#show_act");

  if (interv.classList.contains('hidden')) {
      interv.classList.remove('class', "hidden");
      interv.classList.add('class', "show");
      btn.innerText = "Masquer"
    } else {
      interv.classList.add('class', "hidden");
      interv.classList.remove('class', "show");
      btn.innerText = "Activité abrégée (Pour la carte pro)"
    }

});

if ($('#partenaire').length) {

document.querySelector('#partenaire').addEventListener('change', function() {

    var partenaire = this.value;

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    type:'POST',
    url: '/dashboard/getpartenaire',
    data: {partenaire: partenaire},
    success: function (data){
        console.log( data);
        $('#select_intervenant').html(data);
    },
    error: function (data){
        console.log(JSON.stringify(error));
    }
  });


  });
  }
///////////////////////////////////////////////////////////////////////
// user navigation

$('#N_acc').on('click', function () {
  $('.TheActiveLink').removeClass(['text-indigo-600'])
  $('#N_acc').addClass(['text-indigo-600'])
  $('#show_N_acc').css("display", "table-row-group");
  $('#show_N_or').css("display", "none");
  $('#show_N_doc').css("display", "none");
  $('#show_N_adh').css("display", "none");
  $('#N_recu').css("display", "none");
  $('#c_adh').text("N de contrat d'accompagnement");
});

$('#N_or').on('click', function () {
  $('.TheActiveLink').removeClass(['text-indigo-600'])
  $('#N_or').addClass(['text-indigo-600'])
  $('#show_N_or').css("display", "table-row-group");
  $('#show_N_acc').css("display", 'none');
  $('#show_N_doc').css("display", "none");
  $('#show_N_adh').css("display", "none");
  $('#N_recu').css("display", "none");
  $('#c_adh').text("N de contrat d'accompagnement");
});

$('#N_doc').on('click', function () {
  $('.TheActiveLink').removeClass(['text-indigo-600'])
  $('#N_doc').addClass(['text-indigo-600'])
  $('#show_N_doc').css("display", "table-row-group");
  $('#show_N_or').css("display", "none");
  $('#show_N_acc').css("display", 'none');
  $('#show_N_adh').css("display", "none");
  $('#N_recu').css("display", "none");
  $('#c_adh').text("N de contrat d'accompagnement");
});

$('#N_adh').on('click', function () {
  $('.TheActiveLink').removeClass(['text-indigo-600'])
  $('#N_adh').addClass(['text-indigo-600'])
  $('#show_N_adh').css("display", "table-row-group");
  $('#N_recu').css("display", "table-cell");
  $('#c_adh').text("N de contrat d'adhesion");
  $('#show_N_or').css("display", "none");
  $('#show_N_doc').css("display", "none");
  $('#show_N_acc').css("display", 'none');
});

// ///////////////////////////////////////////////////////////


