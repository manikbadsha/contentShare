@extends('backend.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <b>Update User Information</b>
                </div>
                <div class="card-body">
                    <form action="{{url('update/user/info')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Dob:</label>
                                    <input type="date" id="cname" name="dob" value="@if($user_info != null) {{$user_info->dob}} @endif" class="form-control" class="@error('dob') is-invalid @enderror" require placeholder=" Name">
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <label>Phone</label>
                                <!-- <textarea name="description" class="form-control" placeholder="Description" required> -->
                                <input type="text" id="address" value="@if($user_info != null) {{$user_info->phone}} @endif" name="phone" class="form-control" class="@error('phone') is-invalid @enderror" require placeholder="phone">
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="text" id="cname" name="email" value="@if($user_info != null) {{$user_info->email}} @endif" class="form-control" class="@error('name') is-invalid @enderror" require placeholder=" Name">
                                </div>
                            </div>


                        </div>

                        <div class="row mt-3">



                            <div class="col-lg-4">
                                <div style="position: relative; overflow-x:auto; overflow-y:auto;max-height:100%;width: 100%; max-width: 100%;" class="col-lg-4" class='imgContainer' visible="false">
                                    <label>Image:</label>
                                    <input type="file" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="image">
                                    @if($user_info != null)
                                    @if($user_info->image!=null)
                                    <img id='img' src="{{url($user_info->image)}}" value="" alt="" class="form-fluid mt-1" style="height: 120px; width:120px;">

                                    @endif
                                    @endif

                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>name:</label>
                                    <input type="text" id="cname" name="name" value="@if($user_info != null) {{$user_info->name}} @endif" class="form-control" class="@error('name') is-invalid @enderror" require placeholder=" Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" id="category_id" class="form-control" value="@if($user_info != null) {{$user_info->gender}} @endif">
                                <option value="male">Male</option>


                                <option value="female">Female</option>

                            </select>
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

    </div>
</div>

@endsection