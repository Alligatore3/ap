$(document).ready( function() {
  // Handler for .ready() called.

  setTimeout(
    function(){
      $( ".plyr__controls [data-plyr='play']" )
      .click( function() {
        console.log("1",  $( this ).closest('.quote-box') );
      })
    },
    2000
  );
});