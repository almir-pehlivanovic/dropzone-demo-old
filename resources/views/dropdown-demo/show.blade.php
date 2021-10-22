
@extends('layouts.app')

@section('style')
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">{{ $dropzone->title }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <p class= "form-control-static" id="title"> {{ $dropzone->title }}</p>
                        </div>
                        <div class="form-group">
                            <label for="body">Description</label>
                            <p class= "form-control-static" id="body"> {{ $dropzone->body }}</p>
                        </div>
                        <div class="form-group">
                            <label for="description">Created at</label>
                            <p class= "form-control-static" id="description">{{ $dropzone->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <div class="border fancybox-gallery-container py-3 rounded-lg" id="images">
                                
                                @if(!$dropzone->images)
                                <p class="pl-3 mb-0 form-control-static">There is no images for this record</p>
                                @else
                                    @foreach( json_decode($dropzone->images, true) as $image)
                                        <a class="view-image position-relative my-2" data-fancybox="gallery" data-src="{{ asset(imagePath($image)) }}">
                                            <img class="img-fluid" src="{{ asset(imagePath($image)) }}" />
                                        </a>
                                    @endforeach
                                @endif
                            
                            </div>
                        </div>
                        <a href="#" onclick="history.back()" type="button" class="btn btn-primary d-inline">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection