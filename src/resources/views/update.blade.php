@extends('layouts.app')

@section('title', 'Employee details')

@section('content')
@isset($employee)
    <div class="row">
        <div class="col-lg-12">
            @include('components.header1', ['title' => $employee->getFullName(), 'subtitle' => 'details'])
        </div>
    </div>
    <form method="POST" action="">
        <div class="row">
            <div class="col-md-6">
                @include('components.input', ['field' => 'id', 'fieldLabel' => 'ID', 'readonly' => true, 'value' => ($employee->id ?? null)])
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
                        @include('components.input', ['field' => 'age', 'fieldLabel' => 'Age', 'value' => ($employee->age ?? null), 'type' => 'number'])
                    </div>
                    <div class="col-md-6">
                        @include('components.select', ['field' => 'gender', 'fieldLabel' => 'Gender', 'options' => ['male', 'female', 'other'], 'default' => ($employee->gender ?? 'male')])
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('components.input', ['field' => 'address', 'fieldLabel' => 'Address', 'value' => ($employee->address ?? null)])
                @include('components.input', ['field' => 'phone', 'fieldLabel' => 'Phone number', 'value' => ($employee->phone ?? null)])
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <hr class="my-4">
            </div>
            <div class="col-md-12">
                <div class="form-group float-start">
                    <a href="{{route('getDeletePage', ['id' => $employee->id]);}}" class="btn btn-outline-danger">Delete</a>
                </div>
                <div class="form-group float-end">
                    <button type="submit" class="btn btn-success">Save details</button>
                </div>
            </div>
        </div>
    </form>
@endisset
@endsection
