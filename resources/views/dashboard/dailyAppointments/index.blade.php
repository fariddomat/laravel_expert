@extends('dashboard.layouts.app')
@section('dayOfWorksActive', 'active')
@section('title')
    Manage Daily Appointment
@endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card-header">أيام العمل</div>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" id="search" autofocus
                                value="{{ request()->search }}" aria-describedby="helpId" placeholder="search">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i>
                            Search</button>
                        <a href="{{ route('dashboard.dailyAppointments.create') }}" class="btn btn-outline-primary"><i
                                class="fa fa-plus" aria-hidden="true"></i> Create</a>

                    </div>
                </div>
            </form>
        </div>


        <div class="col-lg-12" style="margin-top: 15px">

            <div class="card-block table-responsive">

                @if ($dailyAppointment->count() > 0)
                    <table id="dataTable" class="table table-striped display responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailyAppointment as $index => $dayOfWork)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dayOfWork->day }}</td>
                                    <td>

                                        <a href="{{ route('dashboard.dailyAppointments.index', $dayOfWork->id) }}"
                                            class="btn btn-outline-primary" style="display: inline-block"><i
                                                class="fa fa-clock"></i> Set</a>

                                    </td>
                                    <td>

                                        <a href="{{ route('dashboard.dailyAppointments.edit', $dayOfWork->id) }}"
                                            class="btn btn-outline-warning" style="display: inline-block"><i
                                                class="fa fa-edit"></i> Edit</a>


                                        <form action="{{ route('dashboard.dailyAppointments.destroy', $dayOfWork->id) }}"
                                            method="POST" style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger delete"
                                                style="display: inline-block"><i class="fa fa-trash" aria-hidden="true"></i>
                                                Delete</button>
                                        </form>



                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 style="font-weight: 400">Sorry no record found !</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
