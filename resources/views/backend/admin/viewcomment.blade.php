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
                                <th scope="col">Comment</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Action</th>




                            </tr>
                        </thead>
                        <tbody>


                            @foreach($data as $index=>$item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>

                                <td>{{$item->comment}}</td>

                                <td>{{$item->user_id}}</td>



                                <td><a href="{{url('delete/comment')}}/{{$item->id}}" class="btn btn-sm btn-danger rounded">Delete</i></a>
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