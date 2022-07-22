@extends('layouts.admin.main')

@section('content-header')
  {{-- @include('layouts.breadcrumb') --}}
@endsection

@section('content')
  <div class="container-fluid">
    @include('layouts.notification')
    {{-- @include('layouts.navigation') --}}
    <div class="row">
      <div class="col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">{{ isset($formTitle) ? $formTitle : 'Form Edit' }}</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.ticket.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
              {{-- Full name --}}
              <div class="form-group">
                <label for="name_field">Nama Lengkap</label><span class="text text-danger">*</span>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name_field" placeholder="Enter full name" name="name" value="{{ old('name', $ticket->name) }}">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              {{-- End Full name --}}
              {{-- Email --}}
              <div class="form-group">
                <label for="email_field">Email</label><span class="text text-danger">*</span>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email_field" placeholder="Enter email" name="email" value="{{ old('email', $ticket->email) }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              {{-- End Email --}}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="row d-flex justify-content-start mb-2">
                <div class="col-md-6 mb-0 d-flex d-none d-md-block d-lg-block mb-2">
                  <button type="submit" class="btn btn-primary col-12"><i class="fa fa-save"></i> Simpan</button>
                </div>
                <div class="col-md-6 mb-0 d-flex d-none d-md-block d-lg-block">
                  <a href="{{ route('admin.ticket.index') }}" class="btn btn-secondary col-12"><i class="fa fa-undo"></i> Kembali</a>
                </div>
              </div>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection

@section('third_party_stylesheets')
@endsection

@section('third_party_scripts')
@endsection

@push('page_scripts')
@endpush
