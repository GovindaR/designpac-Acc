<style type="text/css">
    .face{
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    text-align: center;
    line-height: 40px;
    background: #ececec;
    margin-right: 14px;
        vertical-align: top;
        font-weight: bold;
    }
    p{
        display: inline-block;
        line-height: 18px;
        width: calc(100% - 55px);
        position: relative;
    }
    #notification-stream i{
        position: absolute;
    left: 0px !important;
    top: -16px !important;
        font-style: normal;
        background: none !important;
    }
    p.acts{
        border: none;
        margin-bottom: 14px;
        display: flex;
    align-items: baseline;
        width: 100%;
    }
    p.acts strong{
        text-decoration: none;
        font-weight: 700;
    }
    .uk-offcanvas-bar1 p{
        background: none;
        border-left: 2px solid #f47207;
    }
    .uk-offcanvas-bar1 p:hover{
        background: #f5f8fb !important;
    }
    span{font-style: normal !important;}
    .act .notice{
    min-height: 30px;
        display: block;
    }
</style>
<button class="uk-offcanvas-close" type="button" uk-close></button>

<h3>Notifications</h3>

<?php
$t=time();
$atr = "days";
//$td = date("Y-m-d h:i:s",$t);
foreach ($acts as $a){
$dy = strtotime($a->created_at);
   // $dy = date("Y-m-d",$dy);
   //dd($dy);
//$dy = $dy/86400;
    $d = abs($dy - $t);
    $d = round($d/86400);
    if($d < 1){
        $d = round(abs($dy - $t));
        if($d > 0 && $d < 60){
            $atr = "sec";
        }else if($d > 60 && $d < 3600){
            $atr = "min";
            $d = round($d/60);
        }else if ($d > 3600 && $d < 86400){
            $atr = "hour";
            $d = round($d/3600);
        }
    }else if($d == 1){
       $atr = "day"; 
    }else if($d > 1){
       $atr = "days"; 
    }
$dc_name=\App\User::where('id',$a->created_by)->value('name');
$task_name=\App\TaskModel::where('id',$a->task_id)->value('title');
?>
<a href="#modal-section{{$a->task_id}}"  onclick="myModel({{$a->task_id}})" uk-toggle>
   
    <p
            <?php if($a->seen != 0){?>
            style="background: #ffffff;border-color:#fff;"
            <?php }?>

    class="acts">
       <span class="face"><?php echo $dc_name[0];?></span>
       <span class="act">
       <span class="notice">
        <b><?php echo $dc_name ; ?> </b><?php  echo $a->action ?> <b> <?php echo $task_name ;?></b>
        </span>
        <?php if($a->action =="commented on" ){?>
        
        <?php
            echo '<strong style="display:block;background:#f1f1f14f;border-radius:5px;border-bottom:2px solid #ececec;margin-left:-55px;font-weight:normal;padding:5px;margin-top:10px;font-style:italic;">'.\App\CommentModel::where('id',$a->comment)->value('comment').'</strong>';
            ?>
        
        <?php
        }  ?>

        <i> <?php echo $d." ".$atr." ago"; ?> </i>

        <?php if($a->file !=null){?>
        <span class="logo__image">
                <img src="{{url('/uploads/'.$a->file)}}" alt="images">
            </span>
        <?php }?>
        </span>
    </p>
</a>

<?php
}

?>