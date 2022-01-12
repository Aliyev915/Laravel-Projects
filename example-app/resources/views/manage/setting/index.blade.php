@extends('manage.layouts.layout')

@section('content')
    <div name="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Setting</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="file" accept="image/*" name="image" />

                                        @error('image')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror

                                        @if ($setting->header_image)
                                            <div class="my-3">
                                                <img src="{{ asset('uploads/setting/' . $setting->header_image) }}" alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="header_title" type="text"
                                            placeholder="Header Title" value="{{ $setting->header_title!=null?$setting->header_title : "" }}" />
                                        <label for="header_title">Header Title</label>
                                        @error('header_title')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="header_text" type="text"
                                            placeholder="Header Text" value="{{ $setting->header_text!=null?$setting->header_text : "" }}" />
                                        <label for="header_text">Header Text</label>
                                        @error('header_text')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="about_text_1" type="text"
                                            placeholder="About Text 1" value="{{ $setting->about_text_1!=null?$setting->about_text_1 : "" }}" />
                                        <label for="about_text_1">About Text 1</label>
                                        @error('about_text_1')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="about_text_2" type="text"
                                            placeholder="About Text 2" value="{{ $setting->about_text_2!=null?$setting->about_text_2 : "" }}" />
                                        <label for="about_text_2">About Text 2</label>
                                        @error('about_text_2')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="address" type="text" placeholder="Address" value="{{ $setting->address!=null?$setting->address : "" }}" />
                                        <label for="address">Address</label>
                                        @error('address')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="footer_about" type="text"
                                            placeholder="Footer About" value="{{ $setting->footer_about!=null?$setting->footer_about : "" }}" />
                                        <label for="footer_about">Footer About</label>
                                        @error('footer_about')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="copyright" type="text"
                                            placeholder="Footer About" value="{{ $setting->copyright!=null?$setting->copyright : "" }}" />
                                        <label for="copyright">Copyright</label>
                                        @error('copyright')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="facebook" type="text" placeholder="Facebook" value="{{ $setting->facebook!=null?$setting->facebook : "" }}" />
                                        <label for="facebook">Facebook</label>
                                        @error('facebook')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="twitter" type="text" placeholder="Twitter" value="{{ $setting->twitter!=null?$setting->twitter : "" }}" />
                                        <label for="twitter">Twitter</label>
                                        @error('twitter')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="linkedin" type="text" placeholder="Linkedin" value="{{ $setting->linkedin!=null?$setting->linkedin : "" }}" />
                                        <label for="linkedin">Linkedin</label>
                                        @error('linkedin')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="dribbble" type="text" placeholder="Dribbble" value="{{ $setting->dribbble!=null?$setting->dribbble : "" }}" />
                                        <label for="dribbble">Dribbble</label>
                                        @error('dribbble')
                                            <div class="text-danger my-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
