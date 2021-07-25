<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://bootswatch.com/5/flatly/bootstrap.css">
    <link rel="stylesheet" href="https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    </head>
  <body>
  <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a href="{{ route("getHomePage") }}" class="navbar-brand">Assignment 1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route("getHomePage")}}">Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("getHomePageWithFrequency")}}">Employees (with frequency)</a>
                </li>
            </ul>
        </div>
      </div>
</div>

    <div class="container">
    <div class="bs-docs-section clearfix">

    @isset($alert)
    <div class="row">
        <div class="col-lg-12">
            @include('components.alert', ['type' => $alert, 'content' => $alertMessage])
        </div>
    </div>
    @endisset
