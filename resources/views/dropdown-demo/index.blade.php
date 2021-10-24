@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0">
        <div class="row m-0 justify-content-center">
            <div class="col-md-12 px-0">
                <a href="{{ route('dropzone.create') }}" type="button" class="btn btn-success">Add New</a>
                @if(session('message'))
                <div class="row m-0">
                    <div class="col-12 p-0 mt-3">
                        <div class="alert alert-info d-flex justify-content-between">
                            <p class="mb-0">{{ session('message') }}</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row m-0 d-none" id="session-message">
                    <div class="col-12 p-0 mt-3">
                        <div class="alert alert-info d-flex justify-content-between">
                            <p class="mb-0" id="sesion-text"></p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card mt-3 mb-4">
                    <div class="card-header">Content List</div>
                    <div class="card-body">
                        <div class="table-responsive">

                                @include('dropdown-demo.table')

                            <div class="row m-0">
                                <div class="col-6 pl-0">
                                    <?php $count = $dropzoneRecords->count();?>
                                    <small> Showing {{ $count }} {{ Str::of('item')->plural($count)}}</small>
                                </div>
                                <div class="col-6 pr-0">
                                    <div class="paginate-links float-right">
                                        {{ $dropzoneRecords->appends( Request::query())->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection