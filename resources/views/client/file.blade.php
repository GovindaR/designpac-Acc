<ul id="reset-file" >
    <?php
    $files=\App\FileModel::where('task_id',$task_id)->orderBy('created_at', 'DESC')->get();
    foreach ($files as $file){
    $newstring = substr($file->path, -4);
    ?>

    <?php if($newstring ==".png"){?>
    <li id="files{{$file->id}}">
        <div class="files">
            <div class="attachment-thumbnail">
                <a href="{{url('/')}}/uploads/{!! $file->path !!}" class="attachment-thumbnail-preview-yes" target="_blank">
                    <img class="attachment-thumbnail-preview" src="/uploads/{!! $file->path !!}">
                </a>
                <p class="attachment-thumbnail-details">

                    <span class="attachment-thumbnail-name js-attachment-name">{{$file->path}} </span>
                    <span class="u-block quiet attachment-thumbnail-details-title-options">
                             <span>
                                   <a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete" href="#" onclick="deleteFile({{$file->id}})">
                                       <span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>
                               <span>Created :: <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">{{ $file->created_at }}</span></span>
                        <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->
                          
                           </span>


                </p>
            </div>
        </div>
    </li>
    <?php }elseif($newstring ==".jpg"){?>
        <li  id="files{{$file->id}}">
            <div class="files">
                <div class="attachment-thumbnail">
                    <a href="{{url('/')}}/uploads/{!! $file->path !!}" class="attachment-thumbnail-preview-yes" target="_blank">
                        <img class="attachment-thumbnail-preview" src="/uploads/{!! $file->path !!}">
                    </a>
                    <p class="attachment-thumbnail-details">
                        <span class="attachment-thumbnail-name js-attachment-name">{{$file->path}} </span>
                        <span class="u-block quiet attachment-thumbnail-details-title-options">
                            <span><a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete" href="#" onclick="deleteFile({{$file->id}})"><span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>
                               <span>Created :: <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">{{ $file->created_at }}</span></span>
                            <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->
                               
                           </span>
                    </p>
                </div>
            </div>
        </li>
    <?php }elseif($newstring ==".doc" || $newstring =="docx"){?>
        <li  id="files{{$file->id}}">
            <div class="files">
                <div class="attachment-thumbnail">
                    <a href="{{url('/')}}/uploads/{!! $file->path !!}" class="attachment-thumbnail-preview" target="_blank">
                        {{--<img class="attachment-thumbnail-preview" src="/uploads/images/fi_0000_jpng.png">--}}
                    </a>
                    <p class="attachment-thumbnail-details">
                        <span class="attachment-thumbnail-name js-attachment-name">{{$file->path}} </span>
                        <span class="u-block quiet attachment-thumbnail-details-title-options">
                             <span><a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete" href="#" onclick="deleteFile({{$file->id}})"><span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>
                               <span>Created :: <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">{{ $file->created_at }}</span></span>
                            <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->
                              
                           </span>
                    </p>
                </div>
            </div>
        </li>
    <?php }elseif($newstring ==".txt" || $newstring ==".psd"){?>
        <li  id="files{{$file->id}}">
            <div class="files">
                <div class="attachment-thumbnail">
                    <a href="{{url('/')}}/uploads/{!! $file->path !!}" class="attachment-thumbnail-preview" target="_blank">
                        {{--<img class="attachment-thumbnail-preview" src="/uploads/images/fi_0000_jpng.png">--}}
                    </a>
                    <p class="attachment-thumbnail-details">
                        <span class="attachment-thumbnail-name js-attachment-name">{{$file->path}} </span>
                        <span class="u-block quiet attachment-thumbnail-details-title-options">
                               <span><a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete" href="#" onclick="deleteFile({{$file->id}})"><span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>
                               <span>Created :: <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">{{ $file->created_at }}</span></span>
                            <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->
                            
                           </span>
                    </p>
                </div>
            </div>
        </li>
    <?php }elseif($newstring ==".pdf"){?>
        <li  id="files{{$file->id}}">
            <div class="files">
                <div class="attachment-thumbnail">
                    <a href="{{url('/')}}/uploads/{!! $file->path !!}" class="attachment-thumbnail-preview" target="_blank">
                        {{--<img class="attachment-thumbnail-preview" src="/uploads/images/fi_0000_jpng.png">--}}
                    </a>
                    <p class="attachment-thumbnail-details">
                        <span class="attachment-thumbnail-name js-attachment-name">{{$file->path}} </span>
                        <span class="u-block quiet attachment-thumbnail-details-title-options">
                              <span><a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete" href="#" onclick="deleteFile({{$file->id}})"><span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>
                               <span>Created :: <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">{{ $file->created_at }}</span></span>
                            <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->
                             
                           </span>
                    </p>
                </div>
            </div>
        </li>
    <?php }else{?>
        <li  id="files{{$file->id}}">
            <div class="files">
                <div class="attachment-thumbnail">
                    <a href="{{url('/')}}/uploads/{!! $file->path !!}" class="attachment-thumbnail-preview" target="_blank">
                        {{--<img class="attachment-thumbnail-preview" src="/uploads/images/fi_0000_jpng.png">--}}
                    </a>
                    <p class="attachment-thumbnail-details">
                        <span class="attachment-thumbnail-name js-attachment-name">{{$file->path}} </span>
                        <span class="u-block quiet attachment-thumbnail-details-title-options">
                             <span><a class="attachment-thumbnail-details-title-options-item dark-hover js-confirm-delete"  href="#" onclick="deleteFile({{$file->id}})"><span class="attachment-thumbnail-details-options-item-text">Delete</span></a></span>
                           </span>
                               <span>Created :: <span class="date" dt="2018-05-18T08:09:48.973Z" title="May 18, 2018 1:54 PM">{{ $file->created_at }}</span></span>
                            <!-- <span><a class="attachment-thumbnail-details-title-options-item js-reply" href="#"><span class="attachment-thumbnail-details-options-item-text">Comment</span></a></span> -->
                              
                    </p>
                </div>
            </div>
        </li>
    <?php }?>



    <?php
    }
    ?>

</ul>
<script>
    function deleteFile(fileId) {
        url="{{url('/')}}/file/delete/"+fileId;
        $.ajax({
            url:url,
            method:"post",
            dataType:"text",
            success:function(data)
            {
                myFileDelete(data);
            }
        });

    }
    function myFileDelete(taskId) {
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

</script>