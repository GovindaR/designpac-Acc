<button class="uk-offcanvas-close" type="button" uk-close></button>

<h3>Notifications</h3>

<?php
foreach ($acts as $a){
$dc_name=\App\User::where('id',$a->created_by)->value('name');
$task_name=\App\TaskModel::where('id',$a->task_id)->value('title');
?>
<a href="{{url('/')}}">
    <p
        <?php if($a->seen != 0){?>
        style="background: #ffffff;"
    <?php }?>

    >
        <b><?php echo $dc_name ; ?> </b><?php  echo $a->action ?> <b> <?php echo $task_name ;?></b>  <i> <?php echo $a->created_at; ?> </i>
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