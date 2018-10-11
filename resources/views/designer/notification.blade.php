<button class="uk-offcanvas-close" type="button" uk-close></button>

<h3>Notifications</h3>

<?php
foreach ($acts as $a){
$dc_name=\App\User::where('id',$a->created_by)->value('name');
$task_name=\App\TaskModel::where('id',$a->task_id)->value('title');
?>
<?php if($a->action =="created new task" && $a->seen == 0  ){?>
<a href="{{url('designer/tasks/'.\App\TaskModel::where('id',$a->task_id)->value('created_by'))}}">
<?php
}else{  ?>
<a href="#modal-section{{$a->task_id}}"  onclick="myModel({{$a->task_id}})" uk-toggle>
    <?php }?>
    <p
        <?php if($a->seen != 0){?>
        style="background: #ffffff;"
    <?php }?>

    >
        <b><?php echo $dc_name ; ?> </b><?php  echo $a->action ?> <b> <?php echo $task_name ;?></b>

        <?php if($a->action =="commented on" ){?>
        "
        <?php
        echo \App\CommentModel::where('id',$a->comment)->value('comment');
        ?>
        "
        <?php
        }  ?>

        <i> <?php echo $a->created_at; ?> </i>

        <?php if($a->file !=null){?>
        <span class="logo__image">
                <img src="{{url('/uploads/'.$a->file)}}" alt="images">
            </span>
        <?php }?>
    </p>
</a>

<?php
}

?>