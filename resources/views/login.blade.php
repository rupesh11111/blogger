@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form id="ajaxFormSubmit" data-action={{$action}} data-redirect={{$redirect}}>
                            @csrf
                            <div class="form-group"  >
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>

                        <a href="{{route('signup')}}">Register as a blogger</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        rules = {
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                min:6
            },
        }
        messages = {};
    </script>
@endsection
