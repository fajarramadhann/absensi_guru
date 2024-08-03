@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="me-2 py-2 d-flex justify-content-end">
              <a href="{{ route('user-management.create') }}" class="btn btn-primary">Tambah Pengguna baru</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role->name }}</td>
                  <td>
                      <a href="{{ route('user-management.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                      <form action="{{ route('user-management.destroy', $user->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Delete</button>
                      </form>
                  </td>
              </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center">Data Pengguna Kosong</td>
                @endforelse
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection