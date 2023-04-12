@extends('mami-clean.admin.layouts.app')
@section('title', 'Admin - Mami Clean | Profil')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/font/CS-Interface/style.css') }}">
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/select2-bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/bootstrap-datepicker3.standalone.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('acorn/acorn-elearning-portal/css/vendor/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .select2-selection__rendered {
            line-height: 40px !important;
        }
        .select2-container .select2-selection--single {
            height: 41px !important;
        }
        .select2-selection__arrow {
            height: 36px !important;
        }
        .modal-dialog{
            pointer-events: all !important;
        }
    </style>
@endsection

@section('content')
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <h1 class="mb-0 pb-0 display-4" id="title"> Profil</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('mami-clean.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('mami-clean.admin.profil.index') }}">Profil</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('mami-clean.admin.profil.store') }}" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-6" style="justify-content: center; align-self: center;">
                        <label for="" class="small-title">Atur Profil</label>
                    </div>
                    <div class="col-6" style="text-align: right">
                        <button class="btn btn-outline-primary waves-effect waves-light">Simpan Perubahan</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="mb-3 position-relative form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$profil->nama}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="pt" class="form-label">Nama PT</label>
                            <input type="text" class="form-control" name="pt" id="pt" value="{{$profil->pt}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$profil->email}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{$profil->no_hp}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="tanggal_mulai_usaha" class="form-label">Tanggal Mulai Usaha</label>
                            <input type="date" name="tanggal_mulai_usaha" id="tanggal_mulai_usaha" class="form-control" value="{{$profil->tanggal_mulai_usaha}}" required>
                        </div>
                        <div class="mb-3 position-relative form-group row">
                            <div class="col-6">
                                <label for="kerja_dari_jam" class="form-label">Kerja Dari Jam</label>
                                <input type="time" name="kerja_dari_jam" id="kerja_dari_jam" class="form-control" value="{{$profil->kerja_dari_jam}}" required>
                            </div>
                            <div class="col-6">
                                <label for="kerja_sampai_jam" class="form-label">Kerja Sampai Jam</label>
                                <input type="time" name="kerja_sampai_jam" id="kerja_sampai_jam" class="form-control" value="{{$profil->kerja_sampai_jam}}" required>
                            </div>
                        </div>
                        @php
                            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                        @endphp
                        <div class="mb-3 position-relative form-group row">
                            <div class="col-6">
                                <label for="kerja_dari_hari" class="form-label">Kerja Dari Hari</label>
                                <select name="kerja_dari_hari" id="kerja_dari_hari" class="form-control" required>
                                    <option value="">--- Pilih Hari ---</option>
                                    @for ($i = 0; $i < count($hari); $i++)
                                        <option value="{{$hari[$i]}}" @if($hari[$i] == $profil->kerja_dari_hari) selected @endif>{{$hari[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="kerja_sampai_hari" class="form-label">Kerja Sampai Hari</label>
                                <select name="kerja_sampai_hari" id="kerja_sampai_hari" class="form-control" required>
                                    <option value="">--- Pilih Hari ---</option>
                                    @for ($i = 0; $i < count($hari); $i++)
                                        <option value="{{$hari[$i]}}" @if($hari[$i] == $profil->kerja_sampai_hari) selected @endif>{{$hari[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="5" class="form-control" required>{{$profil->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <input type="file" class="dropify" name="logo" data-height="300" data-allowed-file-extensions="png jpg jpeg webp" data-default-file="{{ asset('images/mami-clean/logo/'.$profil->logo) }}" data-show-errors="true" required>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12" style="justify-content: center; align-self: center;">
                    <label for="" class="small-title">Atur Media Sosial</label>
                </div>
            </div>
            @if ($pivot_profil_media_sosial['status'] == 'ada')
                <form id="edit_media_sosial_profil_form" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        @php
                            $a = 1;
                        @endphp
                        @foreach ($pivot_profil_media_sosial['pivot'] as $item)
                            <div class="col-12 col-md-4 col-media-sosial-profil" id="{{$item->id}}">
                                <div class="border shadow p-3 mb-3">
                                    <div class="row mb-3">
                                        <div class="col-10">
                                            <label class="form-label">No: {{$a++}}</label>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn-close hapus-media-sosial-profil" type="button" aria-label="Close" data-id="{{$item->id}}" title="Hapus Media Profil"></button>
                                        </div>
                                    </div>

                                    <div class="form-group position-relative mb-3">
                                        <label for="" class="form-label">Media Sosial</label>
                                        <input type="text" class="form-control" value="{{$item->master_media_sosial->nama}}" disabled>
                                    </div>
                                    <div class="form-group position-relative mb-3">
                                        <label for="" class="form-label">Tautan</label>
                                        <input type="text" class="form-control" value="{{$item->tautan}}" disabled>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light text-white">Konfirmasi Hapus</button>
                        </div>
                    </div>
                </form>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="card border border-primary">
                            <div class="card-body text-primary">
                                <h5 class="card-title text-primary">Silahkan mengisi data dahulu</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <hr>
            <form class="form-horizontal" id="tambah_media_sosial_profil_form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="position-relative form-group mb-3" id="status_tambah_media_sosial_profil_form">
                            <label for="status_tambah_media_sosial_profil" class="form-label">Apakah ingin menambahkan Media Sosial Profil?</label>
                            <select id="status_tambah_media_sosial_profil" class="form-control" required>
                                <option value="">--- Pilih ---</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-12" style="text-align: right;">
                                <button class="btn btn-primary waves-effect waves-light text-right" id="btn_submit_tambah_media_sosial_profil" disabled>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/fontawesome.min.js" integrity="sha512-j3gF1rYV2kvAKJ0Jo5CdgLgSYS7QYmBVVUjduXdoeBkc4NFV4aSRTi+Rodkiy9ht7ZYEwF+s09S43Z1Y+ujUkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var mediaSosialOption = '@foreach ($media_sosial as $id => $nama) <option value="{{$id}}">{{$nama}}</option> @endforeach';
        var profil_id = "{{$profil->id}}";
        $(document).ready(function(){
            $('.dropify').dropify();

            // $('#indikator_kinerja_program_opd_id').select2({
            //     dropdownParent: $("#indikatorKinerjaProgramModal")
            // });
            $('#kerja_dari_hari').select2();
            $('#kerja_sampai_hari').select2();
        });

        // Media Sosial Profil

        var ID_PIVOT_PROFIL_MEDIA_SOSIAL = [];

        $('.hapus-media-sosial-profil').click(function(){
            var id = $(this).attr('data-id');
            ID_PIVOT_PROFIL_MEDIA_SOSIAL.push(id);
            $('div .col-media-sosial-profil#'+id).remove();
        });

        $('#edit_media_sosial_profil_form').submit(function(e){
            e.preventDefault();
            return new swal({
                title: "Apakah Anda Yakin?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#1976D2",
                confirmButtonText: "Ya"
            }).then((result)=>{
                if(result.value)
                {
                    $.ajax({
                        url: "{{ route('mami-clean.admin.profil.edit-media-sosial-profil') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id:ID_PIVOT_PROFIL_MEDIA_SOSIAL,
                        },
                        beforeSend: function()
                        {
                            return new swal({
                                title: "Checking...",
                                text: "Harap Menunggu",
                                imageUrl: "{{ asset('/images/preloader.gif') }}",
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function(data)
                        {
                            if(data.errors)
                            {
                                Swal.fire({
                                    icon: 'error',
                                    title: data.errors,
                                    showConfirmButton: true
                                });
                            }
                            if(data.success)
                            {
                                new swal({
                                    icon: 'success',
                                    title: data.success
                                    }).then(function() {
                                        window.location.href = "{{ route('mami-clean.admin.profil.index') }}";
                                });
                            }
                        }
                    });
                }
            });
        });

        $('#status_tambah_media_sosial_profil').change(function(){
            var value = $(this).val();

            if(value == 'ya')
            {
                $('#form_tambah_media_sosial_profil').remove();
                var tambah_media_sosial_profil = $(`<div class="form-group" id="form_tambah_media_sosial_profil">
                                                    <div class="row mb-3">
                                                        <div class="col-6 justify-content-center align-self-center text-left">
                                                            <label for="" class="control-label">Tambah Media Sosial</label>
                                                        </div>
                                                        <div class="col-6" style="text-align:right;">
                                                            <button class="btn btn-icon waves-effect waves-light btn-primary mr-2" type="button" id="btn_tambah_media_sosial_profil"><i class="fas fa-user-plus"></i></button>
                                                            <button class="btn btn-icon waves-effect waves-light btn-danger" type="button" id="btn_hapus_media_sosial_profil"><i class="fas fa-user-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>`);
                $('#status_tambah_media_sosial_profil_form').after(tambah_media_sosial_profil);
                $('#btn_submit_tambah_media_sosial_profil').prop('disabled', false);
            } else {
                $('#form_tambah_media_sosial_profil').remove();
                $('#btn_submit_tambah_media_sosial_profil').prop('disabled', true);
            }
        });

        var count_media_sosial = 0;
        dynamic_field_media_sosial();

        function dynamic_field_media_sosial(number_media_sosial)
        {
            var index_media_sosial = number_media_sosial - 1;
            html = '<div class="border shadow p-3 mb-3">'
            html += '<div class="form-group row">';
            html += '<div class="col-12">';
            html += '<h3>';
            html += '<span class="sw-4 sh-4 me-1 mb-1 d-inline-block bg-info d-flex justify-content-center align-items-center rounded-xl">'+number_media_sosial+'</span>';
            html += '</h3>';
            html += '</div>';
            html += '</div>';
            html += '<input type="hidden" name="data_media_sosial['+index_media_sosial+'][profil_id]" value="'+profil_id+'">';
            html += '<div class="position-relative mb-3 form-group row">';
            html += '<label class="col-md-3 col-form-label">Media Sosial</label>';
            html += '<div class="col-md-9">';
            html += '<select name="data_media_sosial['+index_media_sosial+'][master_media_sosial_id]" class="form-control select-media-sosial" id="select-media-sosial_'+number_media_sosial+'">';
            html += mediaSosialOption;
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '<div class="position-relative mb-3 form-group row">';
            html += '<label class="col-md-3 form-label">Tautan</label>';
            html += '<div class="col-md-9">';
            html += '<input type="text" name="data_media_sosial['+index_media_sosial+'][tautan]" class="form-control" required>';
            html += '</div>';
            html += '</div>';
            html += '</div>';

            if(number_media_sosial >= 1)
            {
                $('#form_tambah_media_sosial_profil').after(html);
                $('.select-media-sosial').select2();
            }
        }

        $(document).on('click', '#btn_tambah_media_sosial_profil', function(){
            count_media_sosial++;
            dynamic_field_media_sosial(count_media_sosial);
        });

        $(document).on('click', '#btn_hapus_media_sosial_profil', function(){
            count_media_sosial--;
            if(count_media_sosial < 0)
            {
                count_media_sosial = 0;
            }
            $('#form_tambah_media_sosial_profil').next('div').remove();
        });

        $('#tambah_media_sosial_profil_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('mami-clean.admin.profil.tambah-media-sosial-profil') }}",
                method: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function()
                {
                    return new swal({
                        title: "Checking...",
                        text: "Harap Menunggu",
                        imageUrl: "{{ asset('/images/preloader.gif') }}",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function(data){
                    if(data.errors)
                    {
                        Swal.fire({
                            icon: 'errors',
                            title: data.errors,
                            showConfirmButton: true
                        });
                    }
                    if(data.success) {
                        new swal({
                            icon: 'success',
                            title: data.success,
                            }).then(function() {
                                window.location.href = "{{ route('mami-clean.admin.profil.index') }}";
                        });
                    }
                }
            });
        });
    </script>
@endsection
