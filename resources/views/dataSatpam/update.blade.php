@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Data Satpam</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit Data Satpam</a></li>
              <li class="breadcrumb-item active">Edit Data Satpam</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Satpam</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('data-satpam.update', $dataSatpam->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" value="{{ $dataSatpam->nama_lengkap }}">
              </div>
              <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" placeholder="Masukkan Jabatan" name="jabatan" value="{{ $dataSatpam->jabatan }}">
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
        <!-- /.row -->



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
