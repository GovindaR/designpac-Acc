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

