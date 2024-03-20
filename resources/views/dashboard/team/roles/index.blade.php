@extends('dashboard.layouts.app')
@section('title', 'Team Roles')
@section('teamActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">تصنيفات @lang('site.our_team')</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="card-block">
           <a href="{{ route('dashboard.teamRoles.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة </a>
       </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>المستوى / Level</th>
                        <th>تعديل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teamRoles as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->level }}</td>
                        <td>
                            <a href="{{ route('dashboard.teamRoles.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> تعديل</a>
                        </td>
                        <td>
                            <form action="{{ route('dashboard.teamRoles.destroy', $item) }}" method="post" style="display: inline-block">
                                @csrf()
                                @method('delete')
                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fas fa-trash"></i> حذف</button>
                            </form><!-- end of form -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><!-- end of table -->
        </div>
    </div>
</div>
@endsection
