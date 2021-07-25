@extends('layouts.app')

@section('title', 'Employee dataset')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('components.header1', ['title' => 'Employees', 'subtitle' => 'dataset'.($showFrequency ? ' (including name frequency)' : '')])
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('components.filters')
        </div>
        <div class="col-md-4">
            @include('components.search', ['search' => ($search ?: null)])
        </div>
    </div>
    @if(count($records))
        <div class="row">
            <div class="col-lg-12">
                @include('components.table', ['fields' => $fields, 'records' => $records])
            </div>
        </div>
    @else
        <p>Found 0 employee. Please try adding some using the button below.</p>
    @endif
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route("getCreatePage") }}" class="btn btn-success float-end">Add employee</a>
            </div>
        </div>
@endsection
