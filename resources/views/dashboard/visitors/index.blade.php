@extends('dashboard.layouts.app')
@section('title', 'Visitor')
@section('visitorActive', 'active')
@section('content')

<div style="background: #e4e5e6;">

    <div class="card container">
        <div class="row justify-content-center">
            <div class="card-header">
                <h3>الموقع</h3>

            </div>
        </div>
        <div class=" justify-content-center">
            <div class="card-block">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>العنوان url</th>
                            <th>اليوم</th>
                            <th>آخر أسبوع</th>
                            <th>آخر شهر</th>
                            <th>العدد الكلي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($urlCounts  as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->url }}</td>
                                <td>{{ $item->today_count }}</td>
                                <td>{{ $item->last_week_count  }}</td>
                                <td>{{ $item->last_month_count  }}</td>
                                <td>{{ $item->total_count  }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table><!-- end of table -->
            </div>
        </div>
    </div>
    
    <div class="card container">
        <div class="row justify-content-center">
            <div class="card-header">
                <h3>المدونات</h3>

            </div>
        </div>
        <div class=" justify-content-center">
            <div class="card-block">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>اليوم</th>
                            <th>آخر أسبوع</th>
                            <th>آخر شهر</th>
                            <th>العدد الكلي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ views($item)->period($day)->count() }}</td>
                                <td>{{ views($item)->period($week)->count() }}</td>
                                <td>{{ views($item)->period($month)->count() }}</td>
                                <td>{{ views($item)->count() }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table><!-- end of table -->
            </div>
        </div>
    </div>

    <div class="card container">
        <div class="row justify-content-center">
            <div class="card-header">
                <h3>الخدمات</h3>

            </div>
        </div>
        <div class=" justify-content-center">
            <div class="card-block">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الخدمة</th>
                            <th>اليوم</th>
                            <th>آخر أسبوع</th>
                            <th>آخر شهر</th>
                            <th>العدد الكلي</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ views($item)->period($day)->count() }}</td>
                                <td>{{ views($item)->period($week)->count() }}</td>
                                <td>{{ views($item)->period($month)->count() }}</td>
                                <td>{{ views($item)->count() }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table><!-- end of table -->
            </div>
        </div>
    </div>

</div>

@endsection
