@extends('mami-clean.admin.layouts.app')
@section('title', 'Mami Clean | Landing Page Perusahaan')

@section('css')
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/font/CS-Interface/style.css') }}">
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2-bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/bootstrap-datepicker3.standalone.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dropify/css/dropify.min.css') }}">
@endsection

@section('content')
    @php
        use App\Models\LandingPagePerusahaan;

        $perusahaan = LandingPagePerusahaan::first();

        $section_1 = json_decode($perusahaan->section_1, true);
        $section_2 = json_decode($perusahaan->section_2, true);
        $section_3 = json_decode($perusahaan->section_3, true);
        $section_4 = json_decode($perusahaan->section_4, true);
        $section_5 = json_decode($perusahaan->section_5, true);
        $section_6 = json_decode($perusahaan->section_6, true);
    @endphp

    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title">Mami Clean | Landing Page Perusahaan</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('mami-clean.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Landing Page Perusahaan</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <!-- Content Start -->
    <h2 class="small-title">Atur</h2>
    <!-- Content End -->

    {{-- Section 1 Start --}}
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="small-title">Edit Section 1</h2>
            <div class="row mb-3">
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_1.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('mami-clean.landing-page.perusahaan.store.section-1') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="position-relative form-group">
                            <label for="" class="form-label">Gambar</label>
                            @if ($section_1)
                            <input type="file" class="dropify" name="gambar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-default-file="{{ asset('images/landing-page/perusahaan/'.$section_1['gambar']) }}" data-show-errors="true" required>
                            @else
                            <input type="file" class="dropify" name="gambar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" required>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
        </div>
    </div>
    {{-- Section 1 End --}}

    {{-- Section 2 Start --}}
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="small-title">Edit Section 2</h2>
            <div class="row mb-3">
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_2.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('mami-clean.landing-page.perusahaan.store.section-2') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control" name="sub_judul" value="{{ $section_2?$section_2['sub_judul'] : '' }}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{ $section_2?$section_2['judul'] : '' }}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="5" class="form-control" id="dekripsi_section_2" required>{{ $section_2?$section_2['deskripsi'] : ''}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="position-relative form-group mb-3">
                            <label for="" class="form-label">Gambar Kecil</label>
                            @if ($section_2)
                                <input type="file" class="dropify" name="gambar_kecil" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-default-file="{{ asset('images/landing-page/perusahaan/'.$section_2['gambar_kecil']) }}" required>
                            @else
                                <input type="file" class="dropify" name="gambar_kecil" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" required>
                            @endif
                            <span class="text-small">*360x360</span>
                        </div>
                        <div class="position-relative form-group">
                            <label for="" class="form-label">Gambar Besar</label>
                            @if ($section_2)
                                <input type="file" class="dropify" name="gambar_kecil" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-default-file="{{ asset('images/landing-page/perusahaan/'.$section_2['gambar_besar']) }}" required>
                            @else
                                <input type="file" class="dropify" name="gambar_besar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" required>
                            @endif
                            <span class="text-small">*570x630</span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
        </div>
    </div>
    {{-- Section 2 End --}}

    {{-- Section 3 Start --}}
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="small-title">Edit Section 3</h2>
            <div class="row mb-3">
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_3.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('mami-clean.landing-page.perusahaan.store.section-3') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control" name="sub_judul" value="{{$section_3?$section_3['sub_judul']:'' }}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_3?$section_3['judul']:'' }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
        </div>
    </div>
    {{-- Section 3 End --}}

    {{-- Section 4 Start --}}
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="small-title">Edit Section 4</h2>
            <div class="row mb-3">
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_4.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('mami-clean.landing-page.perusahaan.store.section-4') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control" name="sub_judul" value="{{$section_4?$section_4['sub_judul'] : ''}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_4?$section_4['judul'] : ''}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="5" class="form-control" id="dekripsi_section_4" required>{{ $section_4?$section_4['deskripsi'] : '' }}</textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Tautan Youtube</label>
                            <input type="text" class="form-control" name="tautan" value="{{$section_4?$section_4['tautan'] : ''}}" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="position-relative form-group mb-3">
                            <label for="" class="form-label">Gambar Kecil</label>
                            @if ($section_4)
                                <input type="file" class="dropify" name="gambar_kecil" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-default-file="{{ asset('images/landing-page/perusahaan/'.$section_4['gambar_kecil']) }}" required>
                            @else
                                <input type="file" class="dropify" name="gambar_kecil" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" required>
                            @endif
                            <span class="text-small">*220x220</span>
                        </div>
                        <div class="position-relative form-group">
                            <label for="" class="form-label">Gambar Besar</label>
                            @if ($section_4)
                                <input type="file" class="dropify" name="gambar_kecil" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" data-default-file="{{ asset('images/landing-page/perusahaan/'.$section_4['gambar_besar']) }}" required>
                            @else
                                <input type="file" class="dropify" name="gambar_besar" data-height="300" data-allowed-file-extensions="png jpg jpeg" data-show-errors="true" required>
                            @endif
                            <span class="text-small">*558x550</span>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
        </div>
    </div>
    {{-- Section 4 End --}}

    {{-- Section 5 Start --}}
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="small-title">Edit Section 5</h2>
            <div class="row mb-3">
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_5.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('mami-clean.landing-page.perusahaan.store.section-5') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control" name="sub_judul" value="{{$section_5?$section_5['sub_judul']:'' }}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_5?$section_5['judul']:'' }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
        </div>
    </div>
    {{-- Section 5 End --}}

    {{-- Section 6 Start --}}
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="small-title">Edit Section 6</h2>
            <div class="row mb-3">
                <div class="col-12">
                    <img src="{{ asset('images/landing-page/perusahaan/section_6.png') }}" alt="" class="img-fluid rounded">
                </div>
            </div>
            <form action="{{ route('mami-clean.landing-page.perusahaan.store.section-6') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Sub Judul</label>
                            <input type="text" class="form-control" name="sub_judul" value="{{$section_6?$section_6['sub_judul']:'' }}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="" class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul" value="{{$section_6?$section_6['judul']:'' }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-0">Submit</button>
            </form>
        </div>
    </div>
    {{-- Section 6 End --}}
@endsection

@section('js')
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/cs/scrollspy.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/select2.full.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/tagify.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script src="{{ asset('dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/dropzone.min.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/vendor/singleimageupload.js') }}"></script>
    <script src="{{ asset('acorn/acorn-elearning-portal/js/cs/dropzone.templates.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
            $('.dropify-wrapper').css('line-height', '3rem');

            CKEDITOR.replace('dekripsi_section_2',{
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": 'clipboard',
                        "groups": ['Undo', 'Paste', 'Cut', 'Copy' ]
                    },
                    {
                        "name" : 'editing',
                        "groups" : ['Find', 'Replace', 'SelectAll']
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "blocks"]
                    },
                    {
                        "name": "document",
                        "groups": ["mode"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Source'
            });

            CKEDITOR.replace('dekripsi_section_4',{
                toolbarGroups: [{
                        "name": "basicstyles",
                        "groups": ["basicstyles"]
                    },
                    {
                        "name": 'clipboard',
                        "groups": ['Undo', 'Paste', 'Cut', 'Copy' ]
                    },
                    {
                        "name" : 'editing',
                        "groups" : ['Find', 'Replace', 'SelectAll']
                    },
                    {
                        "name": "paragraph",
                        "groups": ["list", "blocks"]
                    },
                    {
                        "name": "document",
                        "groups": ["mode"]
                    },
                    {
                        "name": "styles",
                        "groups": ["styles"]
                    }
                ],
                // Remove the redundant buttons from toolbar groups defined above.
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Source'
            });

            CKEDITOR.config.allowedContent = true;
        });
    </script>
@endsection
