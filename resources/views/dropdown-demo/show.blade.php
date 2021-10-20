@extends('layouts.app')

@section('content')
    <div class="container'fluid">
        <div class="row m-0 justify-content-center">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">Name</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <p class= "form-control-static" id="name"> Name</p>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <p class= "form-control-static" id="capacity"> Name</p>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <p class= "form-control-static" id="description"> Name</p>
                        </div>
                        <a href="#" onclick="history.back()" type="button" class="btn btn-primary d-inline">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection