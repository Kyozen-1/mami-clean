@extends('mami-clean.admin.layouts.app')
@section('title', 'Admin - Mami Clean | Layanan')

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
            <h1 class="mb-0 pb-0 display-4" id="title">Layanan</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('mami-clean.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('mami-clean.admin.layanan.index') }}">Layanan</a></li>
                </ul>
            </nav>
        </div>
        <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <!-- Content Start -->
    <div class="row mb-3">
        <div class="col-12" style="text-align:right">
            <button class="btn btn-outline-primary waves-effect waves-light mr-2 item_create" type="button" data-bs-toggle="modal" data-bs-target="#addEditModal" title="Tambah Data" id="create"><i class="fas fa-plus"></i></button>
        </div>
    </div>

    <div class="data-table-rows slim">
        <!-- Table Start -->
        <div class="data-table-responsive-wrapper">
            <table id="layanan_table" class="data-table w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi Mini</th>
                        <th>Deskripsi</th>
                        <th>Ikon</th>
                        <th>Gambar Kecil</th>
                        <th>Gambar Besar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Table End -->
    </div>
    <!-- Content End -->
    <div id="addEditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addEditModalLabel">Tambah Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form class="form-horizontal" id="layanan_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 position-relative form-group">
                            <label for="judul" class="control-label">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" required>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="deskripsi_mini" class="control-label">Deskripsi Mini</label>
                            <textarea name="deskripsi_mini" id="deskripsi_mini" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="deskripsi" class="control-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="ikon" class="control-label">Ikon</label>
                            <textarea name="ikon" id="ikon" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="gambar_kecil" class="control-label">Gambar Kecil <span class="text-danger text-small">*430x330</span></label>
                            <input type="file" class="dropify" name="gambar_kecil" id="gambar_kecil" data-height="150" data-allowed-file-extensions="png jpg jpeg webp" data-show-errors="true">
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="gambar_besar" class="control-label">Gambar Besar <span class="text-danger text-small">*760x440</span></label>
                            <input type="file" class="dropify" name="gambar_besar" id="gambar_besar" data-height="150" data-allowed-file-extensions="png jpg jpeg webp" data-show-errors="true">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect width-md waves-light" data-bs-dismiss="modal">Close</button>
                    <input type="hidden" name="aksi" id="aksi" value="Save">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <button type="submit" name="aksi_button" id="aksi_button" class="btn btn-primary waves-effect width-md waves-light">Save</button>
                </div>
            </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detail-title">Detail Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_judul" class="control-label">Judul</label>
                        <input type="text" id="detail_judul" class="form-control" disabled>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_deskripsi_mini" class="control-label">Deskripsi Mini</label>
                        <div id="detail_deskripsi_mini"></div>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_deskripsi" class="control-label">Deskripsi</label>
                        <div id="detail_deskripsi"></div>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_ikon" class="control-label">Ikon</label>
                        <div id="detail_ikon"></div>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_gambar_kecil" class="control-label">Gambar Kecil</label>
                        <img src="" alt="" id="detail_gambar_kecil" class="img-fluid">
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_gambar_besar" class="control-label">Gambar Besar</label>
                        <img src="" alt="" id="detail_gambar_besar" class="img-fluid">
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center" style="margin: 0;">Apakah anda yakin menghapus?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger waves-effect width-md waves-light">Ok</button>
                    <button class="btn btn-primary waves-effect width-md waves-light" type="button" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
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
        $(document).ready(function(){
            $('.dropify').dropify();

            var dataTables = $('#layanan_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('mami-clean.admin.layanan.index') }}"
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'deskripsi_mini',
                        name: 'deskripsi_mini'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'ikon',
                        name: 'ikon'
                    },
                    {
                        data: 'gambar_kecil',
                        name: 'gambar_kecil'
                    },
                    {
                        data: 'gambar_besar',
                        name: 'gambar_besar'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            });

            CKEDITOR.replace('deskripsi_mini');
            CKEDITOR.replace('deskripsi');
            CKEDITOR.config.allowedContent = true;
        });

        $('#create').click(function(){
            $('#layanan_form')[0].reset();
            $('.dropify-clear').click();
            CKEDITOR.instances['deskripsi_mini'].setData('');
            CKEDITOR.instances['deskripsi'].setData('');
            $('#aksi_button').text('Save');
            $('#aksi_button').prop('disabled', false);
            $('.modal-title').text('Add Data');
            $('#aksi_button').val('Save');
            $('#aksi').val('Save');
            $('#form_result').html('');
        });

        $('#layanan_form').on('submit', function(e){
            e.preventDefault();
            for ( instance in CKEDITOR.instances )
                CKEDITOR.instances[instance].updateElement();
            if($('#aksi').val() == 'Save')
            {
                $.ajax({
                    url: "{{ route('mami-clean.admin.layanan.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">'+data.errors+'</div>';
                            $('.dropify-clear').click();
                            $('#aksi_button').prop('disabled', false);
                            $('#aksi_button').text('Save');
                        }
                        if(data.success)
                        {
                            html = '<div class="alert alert-success">'+data.success+'</div>';
                            $('.dropify-clear').click();
                            $('#aksi_button').prop('disabled', false);
                            $('#layanan_form')[0].reset();
                            $('#aksi_button').text('Save');
                            CKEDITOR.instances['deskripsi_mini'].setData('');
                            CKEDITOR.instances['deskripsi'].setData('');
                            $('#layanan_table').DataTable().ajax.reload();
                        }

                        $('#form_result').html(html);
                    }
                });
            }
            if($('#aksi').val() == 'Edit')
            {
                $.ajax({
                    url: "{{ route('mami-clean.admin.layanan.update') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: "json",
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data)
                    {
                        var html = '';
                        if(data.errors)
                        {
                            html = '<div class="alert alert-danger">'+data.errors+'</div>';
                            $('#aksi_button').text('Save');
                        }
                        if(data.success)
                        {
                            $('#layanan_form')[0].reset();
                            $('#aksi_button').prop('disabled', false);
                            $('#aksi_button').text('Save');
                            $('#layanan_table').DataTable().ajax.reload();
                            $('#addEditModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil di ubah',
                                showConfirmButton: true
                            });
                        }

                        $('#form_result').html(html);
                    }
                });
            }
        });

        $(document.body).on('click', '.detail', function(){
            var id = $(this).attr('id');
            $.ajax({
                url: "{{ url('/mami-clean/layanan/detail/') }}" + '/' + id,
                dataType: "json",
                success: function(data)
                {
                    $('#detail-title').text('Detail Data');
                    $('#detail_judul').val(data.result.judul);
                    $('#detail_deskripsi_mini').html(data.result.deskripsi_mini);
                    $('#detail_deskripsi').html(data.result.deskripsi);
                    $('#detail_ikon').html(data.result.ikon);
                    $('#detail_gambar_kecil').attr('src', "{{ asset('images/mami-clean/layanan') }}" + '/' + data.result.gambar_kecil);
                    $('#detail_gambar_besar').attr('src', "{{ asset('images/mami-clean/layanan') }}" + '/' + data.result.gambar_besar);
                    $('#detail').modal('show');
                }
            });
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('/mami-clean/layanan/edit') }}"+'/'+id,
                dataType: "json",
                success: function(data)
                {
                    $('#judul').val(data.result.judul);
                    CKEDITOR.instances['deskripsi_mini'].setData(data.result.deskripsi_mini);
                    CKEDITOR.instances['deskripsi'].setData(data.result.deskripsi);
                    $('#ikon').val(data.result.ikon);

                    var lokasi_gambar_kecil = "{{ asset('images/mami-clean/layanan') }}"+'/'+data.result.gambar_kecil;
                    var fileDropperGambarKecil = $("#gambar_kecil").dropify();

                    fileDropperGambarKecil = fileDropperGambarKecil.data('dropify');
                    fileDropperGambarKecil.resetPreview();
                    fileDropperGambarKecil.clearElement();
                    fileDropperGambarKecil.settings['defaultFile'] = lokasi_gambar_kecil;
                    fileDropperGambarKecil.destroy();
                    fileDropperGambarKecil.init();

                    var lokasi_gambar_besar = "{{ asset('images/mami-clean/layanan') }}"+'/'+data.result.gambar_besar;
                    var fileDropperGambarBesar = $("#gambar_besar").dropify();

                    fileDropperGambarBesar = fileDropperGambarBesar.data('dropify');
                    fileDropperGambarBesar.resetPreview();
                    fileDropperGambarBesar.clearElement();
                    fileDropperGambarBesar.settings['defaultFile'] = lokasi_gambar_besar;
                    fileDropperGambarBesar.destroy();
                    fileDropperGambarBesar.init();

                    $('#hidden_id').val(id);
                    $('.modal-title').text('Edit Data');
                    $('#aksi_button').text('Edit');
                    $('#aksi_button').prop('disabled', false);
                    $('#aksi_button').val('Edit');
                    $('#aksi').val('Edit');
                    $('#addEditModal').modal('show');
                }
            });
        });

        var user_id;
        $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('.modal-title').text('Konfirmasi');
            $('#ok_button').prop('disabled', false);
            $('#confirmModal').modal('show');
            $('#ok_button').text('Ok');
        });

        $('#ok_button').click(function(){
            $.ajax({
                url: "{{ url('/mami-clean/layanan/destroy') }}"+'/'+user_id,
                beforeSend: function(){
                    $('#ok_button').text('Deleting....');
                    $('#ok_button').prop('disabled', true);
                },
                success: function(data)
                {
                    $('#ok_button').prop('disabled', false);
                    $('#confirmModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil di hapus',
                        showConfirmButton: true
                    });
                    $('#layanan_table').DataTable().ajax.reload();
                }
            });
        });
    </script>
@endsection
