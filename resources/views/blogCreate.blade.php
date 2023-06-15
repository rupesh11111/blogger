@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Create Blog</h4>
                    </div>
                    <div class="card-body">
                        <form id="ajaxFormSubmit" data-action={{ $action }} data-redirect={{ $redirect }}>
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" placeholder="Enter Image">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                            </div>
                            <a type="button" class="btn btn-primary" href="{{url("dashboard")}}">Back</a>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        rules = {
            title: {
                required: true
            },
            description: {
                required: true
            },
        }

        messages = {};
    </script>
@endsection
