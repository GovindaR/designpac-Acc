
		
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
    .act{
        display: inline-block;
        line-height: 18px;
        width: calc(100% - 55px);
        position: relative;
    }
    #activity-stream i{
        position: absolute;
    left: 0px;
    top: -20px;
        background: none;
    }
    p.acts{
        border: none;
        margin-bottom: 14px;
            display: flex;
    align-items: baseline;
    }
    p.acts strong{
        text-decoration: none;
        font-weight: 700;
    }
</style>	
<button class="uk-offcanvas-close" type="button" uk-close></button>



<h3>Activity</h3>

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
    //dd($d);
$task_name=\App\TaskModel::where('id',$a->task_id)->value('title');
?>

<p class="acts"><span class="face"><?php echo \Illuminate\Support\Facades\Auth::user()->name[0]; ?></span><span class="act"><i><?php echo $d.' '.$atr.' ago';?></i><?php echo \Illuminate\Support\Facades\Auth::user()->name . " ".  $a->action ."<strong> ". $task_name.".   </strong>"; ?> </span></p>

<?php

}



?>