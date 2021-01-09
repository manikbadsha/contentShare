@extends('backend.master')


@section('content')
<div class="container-fluaid">
    <div class="row">
        <div class="col-lg-12">
            <div class="crad">
                <div class="card-header bg-info text-white">
                    <b>New Story</b>
                </div>



                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">IMG Title</th>
                                <th scope="col">Story</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>


                            @foreach($data as $index=>$item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->title}}</td>
                                <td>
                                    @if($item->image != null)
                                    <img src="{{url($item->image)}}" class="image-fluid" width="70px" height="70px">

                                    @endif
                                </td>
                                <td>{{$item->img_title}}</td>
                                <td>{!!$item->story!!}</td>



                                <td><a href="{{url('unblocked/story')}}/{{$item->id}}" class="btn btn-sm btn-danger rounded">Add To Listed</i></a>
                                </td>






                            </tr>
                            @endforeach






                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer_js')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>


@endsection