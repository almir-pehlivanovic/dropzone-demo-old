@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row m-0 justify-content-center">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="card mt-3">
                    <div class="card-header">Add Content</div>
                    <div class="card-body">
                        <form action="" method="">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-danger">Enter valid title.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" aria-describedby="emailTest"></textarea>
                                <small id="emailTest" class="form-text text-danger">Enter valid body.</small>
                            </div>
                            <a href="#" onclick="history.back()" type="button" class="btn btn-primary d-inline">Back</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection