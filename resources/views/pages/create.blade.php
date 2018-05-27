@extends('pages.layout')

@section('content')
    @if (Session::get('message') != Null)
    <div class="row">
        <div class="col">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('message') }}
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col">
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card">
                <div class="card-header">
                    Sumbit a report
                </div>
                <div class="card-block">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input name="title" class="form-control" type="text" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea name="body" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" >images</label> <a class="btn btn-success" id="images-btn">+Add More</a>
                        <br>
                        <br>
                        <input type="file" accept="image/*" name="images[]" id="images"/><br><br>
                        <div id="images-div">

                        </div>
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection