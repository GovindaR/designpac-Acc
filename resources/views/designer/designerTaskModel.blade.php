<div class="uk-modal-dialog" id="task-model-test">
    <button class="uk-modal-close-default" type="button" uk-close ></button>
    <form action="/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="uk-modal-header">
            <h3>Title</h3>
            <h2 class="uk-modal-title has-edit"><textarea name="title" id="title-{{$data_ur->id}}"  style="font-weight:bold;" placeholder="Enter Title"><?php echo $data_ur->title?></textarea></h2>

            <!-- {{--<button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;display: none;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},1)" id="btn-{{$data_ur->id}}-1">Save</button>--}} -->
        </div>


        <div class="uk-modal-body">

            <h3 class="u-inline-block">Description</h3>
            <div id="brief-{{$data_ur->id}}" class="has-edit">
                <p id="brief"><!-- <textarea placeholder="Type your design brief here" name="description" id="comment-{{$data_ur->id}}" onClick="autoSizeText({{$data_ur->id}});edit({{$data_ur->id}});" onFocus="btnChange({{$data_ur->id}},2)" style="display:none;"> --> <?php echo $data_ur->description?></textarea></p>
                <!-- <div class="inner-editor" onClick="edit({{$data_ur->id}}); return false;"><?php echo $data_ur->description ?></div> -->
            </div>
            <?php if($data_ur->description == "") { ?>
            <script>
                document.getElementById('comment-{{$data_ur->id}}').style.display = "block";
                document.getElementById('comment-{{$data_ur->id}}').value = "";
            </script>
            <?php } ?>
            <!-- <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="edit({{$data_ur->id}}); return false;">Edit</button>
            <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},2)" id="btn-{{$data_ur->id}}-2">Save</button> -->
            <h3 class="Attach">Attachments</h3>

            <div class="js-upload uk-placeholder uk-text-center">
                <span uk-icon="icon: cloud-upload"></span>
                <span class="uk-text-middle">Upload Files</span>
                <div uk-form-custom>
                    <input id="avatar{{$data_ur->id}}" type="file" name="avatar{{$data_ur->id}}[]" multiple="multiple" />
                    <span class="uk-link">Click to choose files</span>
                </div>
            </div>

            <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>



            <!-- <div class="uk-margin" uk-margin>

                <meta name="csrf-token" content="{!! csrf_token() !!}">


                <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: nonee;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Delete Task</a>
            </div> -->
            <div class="files" id="file-uploaded{{$data_ur->id}}">
                <div></div>


            </div>
        </div>
    </form>

    <div class="uk-modal-body1">
        <h4 style="clear:both;"><span>
                                <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>
                            </span>Comment(s)</h4>

        <form id="comment-form" class="comment">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="task_id" id="comment-name-{{ $data_ur->id }}" value="{{ $data_ur->id }}">
            <input type="hidden" name="created_by" id="comment-created_by-{{ $data_ur->id }}" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

            <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>
            <textarea name="comment" id="comment-comment-{{ $data_ur->id }}"  placeholder="Type comment here.."></textarea>
            <input id="submit"  type="button" value="Submit" onclick="saveComments{{$data_ur->id}}()">
        </form>

        <div id="comments-{{$data_ur->id}}">

        </div>


    </div>
    <!--<div class="uk-modal-footer uk-text-right">
        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
        <button class="uk-button uk-button-primary" type="button">Save</button>
    </div>-->


    <script>

        var bar = document.getElementById('js-progressbar');

        UIkit.upload('.js-upload', {

            beforeSend: function () {
                console.log('beforeSend', arguments);
            },
            beforeAll: function () {
                console.log('beforeAll', arguments);
            },
            load: function () {
                console.log('load', arguments);
                var file_data = $('#input-file').prop('attach');
                var form_data = new FormData(); // Creating object of FormData class
                form_data.append("attach", file_data) ;// Appending parameter named file with properties of file_field to form_data
                // form_data.append("user_id", 123) // Adding extra parameters to form_data
//            url="/update/file/166";
//            $.ajax({
//                url: url,
//                dataType: 'script',
//                cache: false,
//                contentType: false,
//                processData: false,
//                data: {"status": status, "name": name},// Setting the data attribute of ajax with file_data
//                type: 'get',
//                success: function(data) {
//                    alert(data);
//                }
//            });

            },
            error: function () {
                console.log('error', arguments);
            },
            complete: function () {
                console.log('complete', arguments);
            },

            loadStart: function (e) {
                console.log('loadStart', arguments);
                var ins=$("#avatar{{$data_ur->id}}").prop("files").length;
                for (var x = 0; x < ins; x++) {
                    var file_data = $("#avatar{{$data_ur->id}}").prop("files")[x];   // Getting the properties of file from file field
                    var form_data = new FormData();                  // Creating object of FormData class
                    form_data.append("file", file_data) ;              // Adding extra parameters to form_data
                    $.ajax({
                        url: "/update/file/{{$data_ur->id}}",
                        dataType: 'script',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,                         // Setting the data attribute of ajax with file_data
                        type: 'post',
                        success:function(data)
                        {
                            document.getElementById("file-uploaded").innerHTML = myFile{{$data_ur->id}}({{$data_ur->id}});
                        }
                    })
                }
                bar.removeAttribute('hidden');
                bar.max = e.total;
                bar.value = e.loaded;
            },

            progress: function (e) {
                console.log('progress', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
            },

            loadEnd: function (e) {
                console.log('loadEnd', arguments);

                bar.max = e.total;
                bar.value = e.loaded;
                myFile{{$data_ur->id}}({{$data_ur->id}});
            },

            completeAll: function () {
                console.log('completeAll', arguments);
                document.getElementById("file-uploaded").innerHTML = myFile{{$data_ur->id}}({{$data_ur->id}});
                setTimeout(function () {
                    bar.setAttribute('hidden', 'hidden');
                }, 1000);

                //alert('Upload Completed');
            }

        });

    </script>
    <script>
        function myFile{{$data_ur->id}}(taskId) {
            url="{{url('/')}}/file-uploaded/"+taskId;
            $.ajax({
                url:url,
                method:"Get",
                dataType:"text",
                success:function(data)
                {
                    $('#file-uploaded'+taskId).html(data);
                }
            });
        }
        myFile{{$data_ur->id}}({{$data_ur->id}});
        {{--setInterval(function(){--}}
            {{--myFile{{$data_ur->id}}({{$data_ur->id}});--}}
        {{--}, 1000);--}}
    </script>
     <script>
          function countcmt(tskid){
        var cnt = $('#modal-section'+tskid+' .comments').not(".dommy__cmt").length;
        $('#modal-section'+tskid+' form.comment').prev().find('span').text(cnt);
        $("#"+tskid).find('.comment').find('span').text(cnt);
    }
    
        function myComments{{$data_ur->id}}(taskId) {
            url="{{url('/')}}/comment-uploaded/"+taskId;
            $.ajax({
                url:url,
                method:"Get",
                dataType:"text",
                success:function(data)
                {
                    $('#comments-'+taskId).html(data);
                    countcmt(taskId);
                }
            });
        }
        myComments{{$data_ur->id}}({{$data_ur->id}});
        /*{{--setInterval(function(){--}}
            {{--myComments{{$data_ur->id}}({{$data_ur->id}});--}}
        {{--}, 1000);--}}*/

        $('#submit').on('click',function(){
         myComments{{$data_ur->id}}({{$data_ur->id}});
       });
    </script>
    <script>

        function autoTitle{{$data_ur->id}}(taskId)
        {
            var title= document.getElementById("title-{{$data_ur->id}}").value;
            url="{{url('/')}}/title-upload/"+taskId;
            $.ajax({
                url:url,
                method:"post",
                dataType:"text",
                data: {title: title}
            });

        }
        setInterval(function(){
            autoTitle{{$data_ur->id}}({{$data_ur->id}});
        }, 10000);
    </script>

    <script>
        function saveComments{{$data_ur->id}}() {
            var task_id= document.getElementById("comment-name-{{ $data_ur->id }}").value;
            var comment= document.getElementById("comment-comment-{{ $data_ur->id }}").value;
            var created_by= document.getElementById("comment-created_by-{{ $data_ur->id }}").value;
            url="{{url('/')}}/comments-save";
            if( comment != ""){
                $.ajax({
                    url:url,
                    method:"Get",
                    dataType:"text",
                    data:{task_id:task_id,comment:comment,created_by:created_by}
                });
                myComments{{$data_ur->id}}({{$data_ur->id}});
            }
            document.getElementById("comment-comment-{{ $data_ur->id }}").value = "";
        }
    </script>

</div>



