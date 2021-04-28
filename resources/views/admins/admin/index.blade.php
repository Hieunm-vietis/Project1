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
        <div class="col-8 float-left">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
                </table>
        </div>
    </div>
@stop()