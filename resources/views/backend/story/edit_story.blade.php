@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="card mt-3">
        <div class="card-header bg-info text-white">
            Update Story
        </div>
        <div class="card-body">
            <form action="{{url('update/new/story')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">



                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" value="{{$data->title}}" name='title' class="@error('title') is-invalid @enderror" placeholder="Story Title" require>
                                </div>
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>




                        </div>



                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <label>Story</label>
                                <!-- <textarea name="description" class="form-control" placeholder="Description" required> -->
                                <textarea name="story" value="" class="form-control my-editor" class="@error('story') is-invalid @enderror">
                                {!! $data->story !!}
                                </textarea>

                                @error('story')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-lg-3" class='imgContainer' visible="false">
                                <label>Image:</label>
                                <input type="file" class="@error('image') is-invalid @enderror" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="image" required>

                                @if($data->image!=null)
                                <img id='img' src="{{url($data->image)}}" value="" alt="" class="form-fluid mt-1" style="height: 120px; width:120px;">

                                @endif
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Image Title</label>
                                    <input type="text" class="form-control" value="{{$data->img_title}}" name='img_title' class="@error('title') is-invalid @enderror" placeholder="image title" require>
                                </div>
                                @error('imgtitle')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>







                        </div>



                    </div>





                </div>


                <div class="row mt-4">
                    <div class="col-lg-12 text-center">
                        <input type="submit" value="Update" class="btn btn-success rounded">
                    </div>


                </div>



            </form>
        </div>
    </div>
</div>

@endsection


@section('footer_js')



<strong>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</strong>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>




<script>
    $('#datetimepicker5').datetimepicker({
        minDate: 0, // disable past date
    });

    var currentYear = new Date();
    $('#datetimepicker5').datetimepicker({
        format: 'Y-m-d',
        minDate: 0,
        yearStart: currentYear.getFullYear(), // Start value for current Year selector
        // onChangeDateTime:checkPastTime,
        // onShow:checkPastTime
    });
</script>


@endsection