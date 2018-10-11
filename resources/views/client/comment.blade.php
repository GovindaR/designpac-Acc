<?php
$comments=\App\CommentModel::where('task_id',$task_id)->orderBy('created_at', 'DESC')->get();
$cmt = 0;
foreach ($comments as $comment){
?>
<div class="comments">
    <ul>
        <li>
            <div class="usr-av">{{\App\User::where('id',$comment->created_by)->value('name')[0].\App\User::where('id',$comment->created_by)->value('last_name')[0]}}</div>
            <div class="content">
                                            <span class="inline-member">
                                                <span class="u-font-weight-bold">
                                                {{\App\User::where('id',$comment->created_by)->value('name').\App\User::where('id',$comment->created_by)->value('last_name')}}</span>
                                            </span>
                <h5 id="cmt-{{$task_id}}-{{ $cmt }}">{{ $comment->comment }}</h5>
                <p class="info">
                    <span class="date">{{ $comment->created_at }}</span>
                    <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>
                    {{--<a href="/comment/edit/{{$comment->id}}">Edit</a>--}}
                    <a href="{{url('/')}}/comment/delete/{{$comment->id}}" onclick="deleteComment{{$comment->id}}({{$comment->id}})">Delete</a>
                    <?php }?>
                </p>
                <script type="text/javascript">
                    console.log("cmt-{{$task_id}}"+"-{{$cmt}}");
                    convert("cmt-{{$task_id}}"+"-{{$cmt}}");
                </script>
            </div>
        </li>
    </ul>
</div>
<hr>
<script>
    
    function deleteComment{{$comment->id}}(CommentId){
        url="{{url('/')}}/comment/delete/"+CommentId;
        if(confirm('Are you sure?')){
        $.ajax({
            url:url,
            method:"Get",
            dataType:"text",

        });
        myComments{{$task_id}}({{$task_id}});
    }


    }

</script>

<?php $cmt++; }?>