@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Blogger Registration</h4>
                    </div>
                    <div class="card-body">
                        <form id="ajaxFormSubmit" data-action={{$action}} data-redirect={{$redirect}}>
                            @csrf
                            <div class="form-group"  >
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group"  >
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group"  >
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirmation password">
                            </div>
                            <button type="submit" class="btn btn-primary">Signup</button>
                        </form>
                        <a href="{{route('login')}}">Login</a>

                    </div>
                
                </div>
                
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        rules = {
            name :{
                required: true,   
            }
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                min:6
            },
            password_confirmation: {
                required: true,
                min :6
            },
        }
    </script>
@endsection
