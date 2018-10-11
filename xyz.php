<div class="preload"><img src="http://i.imgur.com/KUJoe.gif">
	<div class="content">
		
	
<button class="uk-offcanvas-close" type="button" uk-close></button>



<h3>Activity</h3>

<?php

foreach ($acts as $a){

$task_name=\App\TaskModel::where('id',$a->task_id)->value('title');

?>

<p><?php echo \Illuminate\Support\Facades\Auth::user()->name . " ".  $a->action ."<strong> ". $task_name.".   </strong><i>" .$a->created_at ."</i>"; ?> </p>

<?php

}



?>

</div>


<script type="text/javascript">
    $(function() {
    $(".preload").fadeOut(2000, function() {
        $(".content").fadeIn(1000);        
    });
});
</script>