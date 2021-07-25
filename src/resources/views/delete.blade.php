@extends('layouts.app')

@section('title', 'Delete confirm')

@section('content')
    @isset($employee)
        <div class="row">
            <div class="col-lg-12">
                @include('components.header1', ['title' => $employee->getFullName(), 'subtitle' => 'delete'])
            </div>
        </div>
        <form method="POST" action="">
            <div class="row">
                <div class="col-lg-12">
                    <p>Are you sure you want to delete this employee's information?</p>
                    <a href="{{ route("getHomePage") }}" class="btn btn-outline-danger">Cancel</a>
                    <div class="form-group float-end">
                        <button type="submit" class="btn btn-danger">Yes, delete it!</button>
                    </div>
                </div>
            </div>
        </form>
    @endisset
@endsection
