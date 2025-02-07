<x-app-layout>

    <div class="container mt-4">
        <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-sm mx-1">
            <i class="fa-solid fa-key opacity-75"></i>&nbsp;&nbsp;Permissions
        </a>
        <a href="{{ route('roles.index') }}" class="btn btn-warning btn-sm mx-1">
            <i class="fa-solid fa-person-circle-question opacity-75"></i>&nbsp;&nbsp;Roles
        </a>
        <a href="{{ route('users.index') }}" class="btn btn-success btn-sm mx-1">
            <i class="fa-solid fa-user-group opacity-75"></i>&nbsp;&nbsp;Users
        </a>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success mt-2">{{ session('status') }}</div>
                @endif

                <div class="card mt-3 mb-6">
                    <div class="card-header">
                        <h2><b>Permissions</b>
                            @can('create permission')
                                <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary float-end">
                                    <i class="fa-solid fa-plus opacity-75"></i>&nbsp;&nbsp;Add
                                </a>
                            @endcan
                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Name</th>
                                <th width="40%" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="text-center">{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td class="text-center">
                                        @can('update permission')
                                            <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-sm btn-success">
                                                <i class="fa-solid fa-pen-to-square opacity-75"></i>&nbsp;&nbsp;Edit
                                            </a>
                                        @endcan
                                        @can('delete permission')
                                            <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-sm btn-danger mx-2">
                                                <i class="fa-solid fa-trash opacity-75"></i>&nbsp;&nbsp;Delete
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
