@extends('frontend.master.master')
@section('content')
    <h1>Homepage</h1>
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dolorem id iusto nesciunt quidem reprehenderit sunt! Asperiores autem beatae deserunt eligendi enim in numquam praesentium sit. Magni modi sit tempore?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dolorem id iusto nesciunt quidem reprehenderit sunt! Asperiores autem beatae deserunt eligendi enim in numquam praesentium sit. Magni modi sit tempore?
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dolorem id iusto nesciunt quidem reprehenderit sunt! Asperiores autem beatae deserunt eligendi enim in numquam praesentium sit. Magni modi sit tempore?</p>
    <hr>
    <h3>Gallery</h3>
    <div class="row">
        @foreach($galleryData as $key=>$gallery)
        <div class="container">
            <div class="col-md-12">
                <img src="{{url('uploads/images/gallery/'.$gallery->image_name)}}" alt="image not found" width="400px" height="300px" style="float:left">
            </div>
        </div>
            @endforeach
    </div>
    @stop