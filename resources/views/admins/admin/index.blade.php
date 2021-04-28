@extends ('layouts.layout_admin')

@section('content')
	<div class="row">
        <div class="col-12 text-center">
            <h2>List Admin</h2>
        </div>
        <div class="col-12 float-left">
            <a type="button" href="{{ route('admins.admin.create') }}" class="btn btn-success">New Admin</a>
        </div>
        
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-10 float-left">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</th>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                



                                @if ($admin->role == \App\Models\Admin::ROLE_SP_ADMIN)
                                    <div class="rounded-3 bg-primary text-center" style="width:60px;">
                                        @foreach (\App\Models\Admin::ROLES as $value => $name)
                                            @if ($value == $admin->role)
                                                <p class="text-white">{{ $name }}</p>        
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                                @if ($admin->role == \App\Models\Admin::ROLE_ADMIN)
                                    <div class="chip chip-primary" style="width:60px;">
                                        @foreach (\App\Models\Admin::ROLES as $value => $name)
                                            @if ($value == $admin->role)
                                                <p class="text-white">{{ $name }}</p>        
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </td>
                        </tr>
                     @endforeach
                </tbody>
                </table>
        </div>
    </div>
@stop()