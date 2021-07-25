@extends('layouts.app')

@section('title', 'Add employee')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('components.header1', ['title' => 'Employee', 'subtitle' => 'add'])
        </div>
    </div>
    <form method="POST" action="#">
        <div class="row">
            <div class="col-md-6">
                @include('components.input', ['field' => 'id', 'fieldLabel' => 'ID', 'value' => ($employee->id ?? null)])
                <div class="row">
                    <div class="col-md-6">
                        @include('components.input', ['field' => 'firstName', 'fieldLabel' => 'First name', 'value' => ($employee->firstName ?? null)])
                    </div>
                    <div class="col-md-6">
                        @include('components.input', ['field' => 'lastName', 'fieldLabel' => 'Last name', 'value' => ($employee->lastName ?? null)])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @include('components.input', ['field' => 'age', 'fieldLabel' => 'Age', 'type' => 'number', 'value' => ($employee->age ?? null)])
                    </div>
                    <div class="col-md-6">
                        @include('components.select', ['field' => 'gender', 'fieldLabel' => 'Gender', 'value' => ($employee->gender ?? null), 'options' => ['male', 'female', 'other'], 'default' => ($employee->gender ?? 'male')])
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('components.input', ['field' => 'address', 'fieldLabel' => 'Address', 'value' => ($employee->address ?? null)])
                @include('components.input', ['field' => 'phone', 'fieldLabel' => 'Phone number', 'value' => ($employee->phone ?? null)])
            </div>
            <div class="col-md-12">
                <hr class="my-4">
            </div>
            <div class="col-md-12">
                <a href="{{ route("getHomePage") }}" class="btn btn-outline-danger">Cancel</a>
                <div class="form-group float-end">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </div>
        </div>
    </form>
@endsection
