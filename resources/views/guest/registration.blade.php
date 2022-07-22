@extends('layouts.guest.main')

@section('content')
  <section class="content">
    <div class="container-fluid">
      {{-- BEGIN MAIN ROW --}}
      <div class="row justify-content-center">
        {{-- BEGIN MAIN COLUMN --}}
        <div class="col-lg-10">
          {{-- BEGIN FORM --}}
          <form id="kuesionerForm" method="POST" action="{{ route('guest.registration') }}">
            @csrf
            <div class="card card-primary mb-5">
              {{-- BEGIN CARD HEADER --}}
              <div class="card-header">
                <h3 class="card-title">Registrasi</h3>
              </div>
              {{-- END CARD HEADER --}}
              {{-- BEGIN CARD BODY --}}
              <div class="card-body">
                {{-- BEGIN TEXT --}}
                <div class="form-group" id="field_name">
                  <label for="name">Nama Lengkap <span class="text text-danger">*</span></label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                {{-- END TEXT --}}

                {{-- EMAIL TYPE --}}
                <div class="form-group" id="field_name">
                  <label for="email">Email <span class="text text-danger">*</span></label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" placeholder="Email">
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                {{-- END EMAIL TYPE --}}
              </div>
              {{-- END CARD BODY --}}
            </div>
            {{-- END CARD --}}
            <div class="mb-5 d-flex justify-content-end">
              <button type="reset" class="btn btn-outline-primary col-3 mr-2">Reset</button>
              <button type="submit" class="btn btn-success col-3">Daftar</button>
            </div>
          </form>
          {{-- END FORM --}}
        </div>
        {{-- END MAIN COLUMN --}}
      </div>
      {{-- END MAIN ROW --}}
    </div>
    {{-- END CONTAINER --}}
  </section>
  {{-- END SECTION --}}
@endsection
