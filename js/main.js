$(document).ready( function() {
  // Handler for .ready() called.
  var allAudios = $( ".track.quote-box" );

  var ifSomebodyElsePlaying = function(clicked){
    allAudios.each(
      function(index, element){

        if(
          $(element).find(".plyr.plyr--audio").hasClass("plyr--playing") &&
          !($(element).attr("id") === clicked)
        )
          $(element).find(".plyr__controls [data-plyr='play']").click();
      }
    );
  };

  setTimeout(
    function(){
      $( ".plyr__controls [data-plyr='play']" )
      .click( function() {
        var idClickedElement = $(this).closest(".track.quote-box").attr("id")
        ifSomebodyElsePlaying( idClickedElement );
      })
    },
    2000
  );
});