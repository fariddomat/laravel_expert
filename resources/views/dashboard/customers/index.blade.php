@extends('dashboard.layouts.app')
@section('title', 'Customers')
@section('customersActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Customers</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
            <a href="{{ route('dashboard.customers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Background Images</th>
                        <th>Clients</th>
                        <th>URL</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->active == 1 ? 'Active' : 'Inactive' }}</td>
                        <td><a href="{{ route('dashboard.customers.vcardimages.index', $user->customer->id) }}" class="btn btn-info btn-sm"><i class="fas fa-images"></i> Images</a></td>
                        <td><a href="{{ route('dashboard.customers.clients',$user->id) }}" target="_blank">Order</a></td>
                        <td><a href="{{ route('customer',$user->customer->slug) }}" target="_blank">Link</a></td>
                        <td>
                            <a href="{{ route('dashboard.customers.edit', $user->id) }}"
                                class="btn btn-info btn-sm"><i class="fas fa-edit"></i> edit</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.customers.destroy', $user->id) }}" method="post" style="display: inline-block">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            </form><!-- end of form -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
