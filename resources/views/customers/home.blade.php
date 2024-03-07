@extends('customers.layouts.app')
@section('title', 'Dashboard Home')
@section('homeActive', 'active')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card-header">Dashboard</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h5>Welcome {{auth()->user()->name}}</h5>
        </div>
    </div>
</div>
@endsection
