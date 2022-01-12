@extends('manage.layouts.layout')
@section('content')
    <div name="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Portfolio</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="file" accept="image/*" name="image" />

                                        @error('image')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="title" type="text"
                                            placeholder="Title"/>
                                        <label for="title">Title</label>
                                        @error('title')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="description" type="text"
                                            placeholder="Description" />
                                        <label for="description">Description</label>
                                        @error('description')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
