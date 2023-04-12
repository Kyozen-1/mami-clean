@extends('mami-clean.admin.layouts.app')
@section('title', 'Admin - Mami Clean | brosur')

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
            <h1 class="mb-0 pb-0 display-4" id="title"> brosur</h1>
            <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                <ul class="breadcrumb pt-0">
                    <li class="breadcrumb-item"><a href="{{ route('mami-clean.admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('mami-clean.admin.brosur.index') }}">brosur</a></li>
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
            <table id="brosur_table" class="data-table w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipe Brosur</th>
                        <th>Layanan</th>
                        <th>Nama</th>
                        <th>Berkas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Table End -->
    </div>
    <!-- Content End -->
    <div id="addEditModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addEditModalLabel">Tambah Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="form_result"></span>
                    <form class="form-horizontal" id="brosur_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 position-relative form-group" id="form_status_brosur">
                            <label for="status_brosur" class="control-label">Status Brosur</label>
                            <select name="status_brosur" id="status_brosur" class="form-control" required>
                                <option value="">--- Status Brosur ---</option>
                                <option value="layanan">Layanan</option>
                                <option value="perusahaan">Perusahaan</option>
                            </select>
                        </div>
                        <div class="mb-3 position-relative form-group">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="mb-3 position-relative form-group" id="form_berkas">
                            <label for="berkas" class="control-label">Berkas</label>
                            <input type="file" class="dropify" name="berkas" id="berkas" data-height="150" data-allowed-file-extensions="pdf" data-show-errors="true">
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="detail-title">Detail Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3 position-relative" id="form_detail_status_brosur">
                        <label for="detail_status_brosur" class="control-label">Status Brosur</label>
                        <input type="text" class="form-control" id="detail_status_brosur" disabled>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_nama" class="control-label">Nama</label>
                        <input type="text" id="detail_nama" class="form-control" disabled>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="detail_berkas" class="control-label">Berkas</label>
                        <embed src="" id="detail_berkas" style="width: 100%; height: 20rem;">
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
        var layananOption = '@foreach ($layanan as $id => $nama)<option value="{{$id}}">{{$nama}}</option>@endforeach';
        $(document).ready(function(){
            $('.dropify').dropify();

            var dataTables = $('#brosur_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('mami-clean.admin.brosur.index') }}"
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'status_brosur',
                        name: 'status_brosur'
                    },
                    {
                        data: 'layanan_id',
                        name: 'layanan_id'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'berkas',
                        name: 'berkas'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            });
        });

        $('#status_brosur').change(function(){
            var value = $(this).val();
            if(value == 'layanan')
            {
                var layanan = $('<div class="mb-3 position-relative form-group" id="form_layanan_id">'+
                    '<label for="layanan_id" class="control-label">Layanan</label>'+
                    '<select name="layanan_id" id="layanan_id" class="form-control" required>'+
                        '<option value="">--- Pilih Layanan ---</option>'+
                        layananOption+
                    '</select>'+
                '</div>');

                $('#form_status_brosur').after(layanan);
                $('#layanan_id').select2({
                    dropdownParent: $("#addEditModal")
                });
            } else {
                $('#form_layanan_id').remove();
            }
        });

        $('#create').click(function(){
            $('#brosur_form')[0].reset();
            $('#form_layanan_id').remove();
            $('.dropify-clear').click();
            $('#aksi_button').text('Save');
            $('#aksi_button').prop('disabled', false);
            $('.modal-title').text('Add Data');
            $('#aksi_button').val('Save');
            $('#aksi').val('Save');
            $('#form_result').html('');
        });

        $('#brosur_form').on('submit', function(e){
            e.preventDefault();
            if($('#aksi').val() == 'Save')
            {
                $.ajax({
                    url: "{{ route('mami-clean.admin.brosur.store') }}",
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
                            $('#brosur_form')[0].reset();
                            $('#aksi_button').text('Save');
                            $('#brosur_table').DataTable().ajax.reload();
                        }

                        $('#form_result').html(html);
                    }
                });
            }
            if($('#aksi').val() == 'Edit')
            {
                $.ajax({
                    url: "{{ route('mami-clean.admin.brosur.update') }}",
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
                            $('#brosur_form')[0].reset();
                            $('#aksi_button').prop('disabled', false);
                            $('#aksi_button').text('Save');
                            $('#brosur_table').DataTable().ajax.reload();
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
                url: "{{ url('/mami-clean/brosur/detail/') }}" + '/' + id,
                dataType: "json",
                success: function(data)
                {
                    $('#detail-title').text('Detail Data');
                    $('#form_detail_layanan').remove();
                    $('#detail_status_brosur').val(data.result.status_brosur);
                    if(data.result.status_brosur == 'layanan')
                    {
                        var detail_layanan = $('<div class="form-group mb-3 position-relative" id="form_detail_layanan">'+
                            '<label for="detail_layanan" class="control-label">Layanan</label>'+
                            '<input type="text" class="form-control" id="detail_layanan" disabled>'+
                        '</div>');

                        $('#form_detail_status_brosur').after(detail_layanan);
                        $('#detail_layanan').val(data.result.layanan);
                    }
                    $('#detail_nama').val(data.result.nama);
                    $('#detail_berkas').attr('src', "{{ asset('berkas/brosur') }}" + '/' + data.result.berkas);
                    $('#detail').modal('show');
                }
            });
        });

        $(document).on('click', '.edit', function(){
            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('/mami-clean/brosur/edit') }}"+'/'+id,
                dataType: "json",
                success: function(data)
                {
                    $("#form_layanan_id").remove();
                    $('#form_status_aktif').remove();
                    $("[name='status_brosur']").val(data.result.status_brosur).trigger('change');
                    if(data.result.layanan_id)
                    {
                        var layanan = $('<div class="mb-3 position-relative form-group" id="form_layanan_id">'+
                            '<label for="layanan_id" class="control-label">Layanan</label>'+
                            '<select name="layanan_id" id="layanan_id" class="form-control" required>'+
                                '<option value="">--- Pilih Layanan ---</option>'+
                                layananOption+
                            '</select>'+
                        '</div>');

                        $('#form_status_brosur').after(layanan);
                        $('#layanan_id').select2({
                            dropdownParent: $("#addEditModal")
                        });
                        $("[name='layanan_id']").val(data.result.layanan_id).trigger('change');
                    }

                    if(data.result.status)
                    {
                        var status_aktif = $('<div class="mb-3 position-relative form-group" id="form_status_aktif">'+
                            '<label for="status_aktif" class="control-label">Status</label>'+
                            '<select name="status_aktif" id="status_aktif" class="form-control" required>'+
                                '<option value="">--- Pilih ---</option>'+
                                '<option value="1">Aktif</option>'+
                                '<option value="0">Tidak Aktif</option>'+
                            '</select>'+
                        '</div>');

                        $('#form_berkas').after(status_aktif);
                        $("[name='status_aktif']").val(data.result.status).trigger('change');
                    }

                    $('#nama').val(data.result.nama);

                    var lokasi_berkas = "{{ asset('berkas/brosur') }}"+'/'+data.result.berkas;
                    var fileDropperBerkas = $("#berkas").dropify();

                    fileDropperBerkas = fileDropperBerkas.data('dropify');
                    fileDropperBerkas.resetPreview();
                    fileDropperBerkas.clearElement();
                    fileDropperBerkas.settings['defaultFile'] = lokasi_berkas;
                    fileDropperBerkas.destroy();
                    fileDropperBerkas.init();

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
                url: "{{ url('/mami-clean/brosur/destroy') }}"+'/'+user_id,
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
                    $('#brosur_table').DataTable().ajax.reload();
                }
            });
        });
    </script>
@endsection
