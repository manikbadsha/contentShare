@extends('frontend.master')


@section('content')




<!-- Banner Area Starts -->
<section class="banner-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 px-0">
                <div class="banner-bg"></div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="banner-text">
                    <h1>Create Your<span>Own </span> Story</h1>
                    <p class="py-3">Wherein herb beginning. Moved after gathering. Sea hi crate fowl man replenish place divided likeness herb one two lnetn Winged moving saw, may over.</p>
                    <a href="#" class="secondary-btn">explore now<span class="flaticon-next"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="story">
    <div class="container">

        <div class="row p-5">
            <div class="col-lg-12 text-center">
                <h1>BEST STORY</h1>
            </div>
        </div>



        @php
        $data=DB::table('stories')

        ->where('status',1)

        ->get();
        @endphp


        <div class="row p-5">

            @foreach($data as $item)
            <div class="col-lg-6 text-center">
                <div class="card" style="width: 100%;">
                    <div class="img">
                        <img src="{{$item->image}}" alt="">

                        <div class=" tit">
                            <h1>{{$item->img_title}}</h1>
                        </div>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{!!$item->story!!}</p>
                        <form action="{{url('add/comment')}}/{{$item->id}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @php
                            $comment=DB::table('stories')
                            ->join('comments','comments.story_id','=','stories.id')
                            ->select('comments.comment')
                            ->where('stories.id',$item->id)

                            ->get();
                            @endphp

                            @if(Auth::check())
                            @foreach($comment as $com)



                            <h5 class="p-4 text-left">{{$com->comment}}</h5>
                            @endforeach
                            @endif

                            <textarea name="comment" placeholder="Add a comment" id="" cols="40" rows="3"></textarea>



                            <div class="row mt-4">
                                <div class="col-lg-12 text-center">
                                    <input type="submit" value="Comment" class="btn btn-success rounded">


                                </div>


                            </div>



                        </form>
                    </div>
                </div>
            </div>

            @endforeach





        </div>


        <style>
            .img img {

                width: 100%;


                text-align: center;
                height: 350px;
                z-index: 1
            }

            .img {
                width: 100%;

                position: relative;
                text-align: center;
                height: 350px;
                z-index: 1
            }

            .img:after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: -1
            }

            .img .tit {
                position: absolute;
                top: 50%;
                left: 50%;

                transform: translateX(-50%) translateY(-50%);



            }

            .img .tit h1 {
                color: #fff;
            }

            .card-title {
                font-size: 40px;
                font-weight: 700;
            }
        </style>


    </div>




</section>


<!-- Banner Area End -->





@endsection