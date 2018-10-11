<div class="uk-modal-dialog">

    <button class="uk-modal-close-default" type="button" uk-close></button>

    <form action="/update/task/{{$data_ur->id}}" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="uk-modal-header">

            <h3>Title</h3>

            <h2 class="uk-modal-title has-edit"><textarea name="title" id="title-{{$data_ur->id}}" onFocus="btnChange({{$data_ur->id}},1)" style="font-weight:bold;" placeholder="Enter Title"><?php echo $data_ur->title?></textarea></h2>



            <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;display: none;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},1)" id="btn-{{$data_ur->id}}-1">Save</button>

        </div>





        <div class="uk-modal-body">



            <h3 class="u-inline-block">Description</h3>

            <div id="brief-{{$data_ur->id}}" class="has-edit">

                <p id="brief"><textarea placeholder="Type your design brief here" name="description" id="comment-{{$data_ur->id}}" onClick="autoSizeText({{$data_ur->id}});" onFocus="btnChange({{$data_ur->id}},2)" style="display:none;"> <?php echo $data_ur->description?></textarea></p>

                <div class="inner-editor"><?php echo $data_ur->description ?></div>

            </div>

            <?php if($data_ur->description == "") { ?>

            <script>

                document.getElementById('comment-{{$data_ur->id}}').style.display = "block";

                document.getElementById('comment-{{$data_ur->id}}').value = "";

            </script>

            <?php } ?>

            <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="edit({{$data_ur->id}}); return false;">Edit</button>

            <button style="background: #f78d1e;border: none;padding: 10px 15px;color: #fff;margin-top: 4px;vertical-align: bottom;border-radius: 3px;outline: 0;" onClick="saveInfo({{$data_ur->id}},2)" id="btn-{{$data_ur->id}}-2">Save</button>

            <h3 class="Attach">Attachments</h3>



            <div class="js-upload uk-placeholder uk-text-center">

                <span uk-icon="icon: cloud-upload"></span>

                <span class="uk-text-middle">Upload Files</span>

                <div uk-form-custom>

                    <input type="file" name="attach" multiple id="input-file">

                    <span class="uk-link">selecting one</span>

                </div>

            </div>



            <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>







            <div class="uk-margin" uk-margin>

                {{--<div uk-form-custom="target: true">--}}

                {{--<input type="file" id="fileU" name="attach" size="2048KB" multiple>--}}

                {{--<input class="uk-input uk-form-width-medium" type="text" placeholder="Upload File (Computer)" disabled>--}}

                {{--<!-- <button style="background: #f78d1e;border: none;display:none;padding: 10px 15px;color: #fff;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" type="submit">Upload</button> -->--}}

                {{--<input type="submit"  value="Upload" style="background: #f78d1e;border: none;display:none;padding: 10px 15px;color: #fff;margin-top: 10px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" class="del__file">--}}

                {{--</div><br>--}}



                {{--<div id="progressbar" class="uk-progress uk-hidden">--}}

                {{--<div class="uk-progress-bar" style="width: 0%;">...</div>--}}

                {{--</div>--}}

                <meta name="csrf-token" content="{!! csrf_token() !!}">

                <div class="files">

                    <div class="attachment-thumbnail">

                        <a href="#" class="attachment-thumbnail-preview">

                            <!-- <img src="../images/fi_0000_jpng.png"> -->

                        </a>

                        <p class="attachment-thumbnail-details">

                            <span class="attachment-thumbnail-name js-attachment-name">1407793943-nation-top-consumer-watchdog-warning-bitcoin-danger.jpg</span>

                            <span class="u-block quiet attachment-thumbnail-details-title-options">

                               <span>Added <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">an hour ago</span></span>

                                <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->

                               <span><a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete" href="#"><span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>

                           </span>

                        </p>

                    </div>

                </div>

                <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: nonee;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Save Task</a>



                <a href="{{url('client/tasks/delete')."/".$data_ur->id}}" style="background: nonee;border: #ddd 3px solid;color: #8e8d8d;padding: 7px 15px;margin-top: 4px;display: inline-block;vertical-align: bottom;border-radius: 3px;outline: 0;" onclick="return confirm('Are you sure ?')">Delete Task</a>

            </div>

            <div class="files">



                <ul>

                    <?php

                    $files=\App\FileModel::where('task_id',$data_ur->id)->get();

                    foreach ($files as $file){

                    $newstring = substr($file->path, -4);

                    ?>



                    <?php if($newstring ==".png"){?>

                    <li>

                        <div class="file-thumb">

                            <img src="images/fi_0000_jpng.png" alt="">

                        </div>

                        <a href="/uploads/{!! $file->path !!}"

                           target="_blank">{{$file->path}} </a> 

                    </li>

                    <?php }elseif($newstring ==".jpg" || $newstring ==".gif"){?>

                    <li>

                        <div class="file-thumb">

                            <img src="images/fi_0000_jpng.png" alt="">

                        </div>

                        <a href="/uploads/{!! $file->path !!}"

                           target="_blank">{{$file->path}} </a> 

                    </li>

                    <?php }elseif($newstring ==".doc" || $newstring =="docx"){?>

                    <li>

                        <div class="file-thumb">

                            <img src="images/fi_0003_word.png" alt="">

                        </div>

                        <a href="/uploads/{!! $file->path !!}"

                           target="_blank">{{$file->path}} </a> 

                    </li>

                    <?php }elseif($newstring ==".txt" || $newstring ==".psd"){?>

                    <li>

                        <div class="file-thumb">

                            <img src="images/fi_0004_file.png" alt="">

                        </div>

                        <a href="/uploads/{!! $file->path !!}"

                           target="_blank">{{$file->path}} </a> 

                    </li>

                    <?php }elseif($newstring ==".pdf"){?>

                    <li>

                        <div class="file-thumb">

                            <img src="images/fi_0001_pdf.png" alt="">

                        </div>

                        <a href="/uploads/{!! $file->path !!}"

                           target="_blank">{{$file->path}} </a> 

                    </li>

                    <?php }else{?>

                    <li>

                        <div class="file-thumb">

                            <img src="images/fi_0004_file.png" alt="">

                        </div>

                        <a href="/uploads/{!! $file->path !!}"

                           target="_blank">{{$file->path}} </a> 

                    </li>

                    <?php }?>







                    <?php

                    }

                    ?>



                </ul>



            </div>

        </div>

    </form>



    <div class="uk-modal-body1">

        <h4 style="clear:both;"><span>

                                <?php echo \App\CommentModel::where('task_id',$data_ur->id)->get()->count();?>

                            </span>Comment(s)</h4>



        <form action="create/comment" class="comment" method="post">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" name="task_id" value="{{ $data_ur->id }}">

            <input type="hidden" name="created_by" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">



            <label for="" class="name">{{\Illuminate\Support\Facades\Auth::user()->name[0].\Illuminate\Support\Facades\Auth::user()->last_name[0]}}</label>

            <textarea name="comment"  placeholder="Comment here.."></textarea>

            <input type="submit" value="Comment">

        </form>



        <!-- preloader start -->

        <div class="comments dommy__cmt">

            <ul>

                <li>

                    <div class="usr-av">



                    </div>

                    <div class="content">

                                            <span class="inline-member">

                                                <span class="u-font-weight-bold">

                                                </span>

                                            </span>

                        <h5 class="loading"></h5>

                        <p class="info loading">

                            <span class="date"></span>

                            <a href="#"></a>

                            <a href="#"></a>

                        </p>

                    </div>

                </li>

            </ul>

        </div>

        <!-- preloader start end -->



        <?php

        $comments=\App\CommentModel::where('task_id',$data_ur->id)->get();

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

                                                ABC</span>

                                            </span>

                        <h5 id="cmt-{{$data_ur->id}}-{{ $cmt }}">{{ $comment->comment }}</h5>

                        <p class="info">

                            <span class="date">{{ $comment->created_at }}</span>

                            <?php if($comment->created_by == \Illuminate\Support\Facades\Auth::user()->id){?>

                            <a href="/comment/edit/{{$comment->id}}">Edit</a>

                            <a href="/comment/delete/{{$comment->id}}">Delete</a>

                            <?php }?>

                        </p>

                        <script type="text/javascript">

                            console.log("cmt-{{$data_ur->id}}"+"-{{$cmt}}");

                            convert("cmt-{{$data_ur->id}}"+"-{{$cmt}}");

                        </script>

                    </div>

                </li>

            </ul>

        </div>

        <hr>



        <?php $cmt++; }?>



    </div>

    <!--<div class="uk-modal-footer uk-text-right">

        <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>

        <button class="uk-button uk-button-primary" type="button">Save</button>

    </div>-->

</div>



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

            url="/update/file/166";

            var param1="test test tetst";

            var file_data = $('#input-file').prop('attach');

            var form_data = new FormData(); // Creating object of FormData class

            form_data.append("attach", file_data) ;// Appending parameter named file with properties of file_field to form_data

            var test ="test yr";

            $.ajax({

                url: url,

                dataType: 'script',

                cache: false,

                contentType: false,

                processData: false,

                data: {

                    "_method": 'POST',

                    '_token': $('meta[name="csrf-token"]').attr('content'),

                    "test": test,

                },// Setting the data attribute of ajax with file_data

                type: 'post',

                success: function(data) {

                    alert(data);

                }

            });

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

        },



        completeAll: function () {

            console.log('completeAll', arguments);



            setTimeout(function () {

                bar.setAttribute('hidden', 'hidden');

            }, 1000);



            //alert('Upload Completed');

        }



    });



</script>