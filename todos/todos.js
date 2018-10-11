var EnterKey = 13;

$.fn.isBound = function(type, fn) {
    var data = this.data('events')[type];

    if (data === undefined || data.length === 0) {
        return false;
    }

    return (-1 !== $.inArray(fn, data));
};

$(document).ready(function() {
    function printOut(){
         return $('#todo-list').html();
    }
		function runBind() {
        $('.destroy').on('click', function(e) {
          $currentListItem = $(this).closest('li');

          $currentListItem.remove();
            printOut();
        });

        $('.toggle').on('click', function(e) {
          var $currentListItemLabel = $(this).closest('li').find('label');
		  /*
		   * Do this or add css and remove JS dynamic css.
		   */
		  if ( $currentListItemLabel.attr('data') == 'done' ) {
			  $currentListItemLabel.attr('data', '');
		      $currentListItemLabel.css('text-decoration', 'none');
           $currentListItemLabel.prev().prop("checked",false);
             printOut();
		  }
		  else {
			  $currentListItemLabel.attr('data', 'done');
        $currentListItemLabel.css('text-decoration', 'line-through');
              $currentListItemLabel.prev().prop("checked",true);
//              $currentListItemLabel.parent().addClass('done');
              printOut();
		  }
			});
		}
	
	$todoList = $('#todo-list');
    $cnt = 0;
	$('#new-todo').keypress(function(e) {
    if (e.which === EnterKey) {
			$('.destroy').off('click');
			$('.toggle').off('click');
			var todos = $todoList.html();
       $cnt = $todoList.find('li').length;
       console.log($cnt);
      todos += ""+
				"<li>" +
          "<div class='view'>" +
            "<input class='toggle' type='checkbox' id='li-"+$cnt+"'>" +
            "<label data='' for='li-"+$cnt+"'>" + " " + $('#new-todo').val() + "</label>" +
            "<a class='destroy'></a>" +
          "</div>" +
        "</li>";
   	  
	  $(this).val('');
		$todoList.html(todos);
        printOut();
		runBind();
		$('#main').show();
    
  }}); // end if
});

