@php
$counter = 0;
@endphp

@extends('manage.layouts.layout')
@section('content')
    <div name="layoutAuthentication_content">
        <main>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Portfolios
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                                {{ $counter++ }}
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>
                                        <img width="50" src="{{ asset('uploads/portfolios/'.$portfolio->image) }}" alt="">
                                    </td>
                                    <td>{{$portfolio->title}}</td>
                                    <td>{{ Str::length($portfolio->description) >50 ? Str::substr($portfolio->description, 0, 50) : $portfolio->description }}</td>
                                    <td>
                                        <a href="/admin/portfolio/edit/{{$portfolio->id}}" class="btn btn-warning">Edit</a>
                                        <a href="/admin/portfolio/delete/{{$portfolio->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
