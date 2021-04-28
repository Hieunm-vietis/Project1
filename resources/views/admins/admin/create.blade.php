@extends ('layouts.layout_admin')

@section('content')
	<div class="row">
        <div class="col-12 text-center">
            <h2>Create Admin</h2>
        </div>
        <div class="col-12 float-left">
            <a type="button" href="{{ route('admins.admin.index') }}" class="btn btn-success">List Admin</a>
        </div>
        
    </div>
    <section class="row flexbox-container justify-content-center mt-2">
        <div class="col-10 p-0">
            <div class="card rounded-0 mb-0 pb-4">
                <div class="card-content">
                    <div class="card-body">
                        @if (Session::has( 'success' ))
                            <div class="alert alert-success">
                                {{ Session::get( 'success' ) }}
                            </div>
                        @endif
                        <form class="form form-horizontal" method="post" action="{{ route('admins.admin.store') }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-2 mb-1">
                                                <span>Name</span>
                                                <small class="text-danger align-top">*</small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="col-md-6 col-sm-12">
                                                    <input type="text" class="form-control" name="name" placeholder="name" value="{{ old('name') }}">
                                                    <p class="text-danger small mt-1 mb-1">
                                                        @if ($errors->has('name'))
                                                            {{ $errors->first('name') }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-2 mb-1">
                                                <span>Email</span>
                                                <small class="text-danger align-top">*</small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="col-md-6 col-sm-12">
                                                    <input type="text" class="form-control" name="email" placeholder="email" value="{{ old('email') }}">
                                                    <p class="text-danger small mt-1 mb-1">
                                                        @if ($errors->has('email'))
                                                            {{ $errors->first('email') }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-2 mb-1">
                                                <span>Password</span>
                                                <small class="text-danger align-top">*</small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="col-md-6 col-sm-12">
                                                    <input type="password" class="form-control" name="password" placeholder="password">
                                                    <p class="text-danger small mt-1 mb-1">
                                                        @if ($errors->has('password'))
                                                            {{ $errors->first('password') }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-sm-2 mb-1">
                                                <span>Role</span>
                                                <small class="text-danger align-top">*</small>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="col-md-6 col-sm-12">
                                                    <select class="form-select" name="role" aria-label="Default select example">
                                                        @foreach (\App\Models\Admin::ROLES as $value => $name)
                                                            <option value={{ $value }} >{{ $name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-10 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop()