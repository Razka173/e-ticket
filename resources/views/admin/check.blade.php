@extends('layouts.admin.main')

@section('content-header')
@endsection

@section('content')
  <div class="container-fluid">
    @include('layouts.notification')
    {{-- @include('layouts.navigation') --}}
    {{-- BEGIN FORM --}}
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('admin.check.validate') }}" method='POST' enctype="multipart/form-data">
          @csrf
          {{-- BEGIN CARD --}}
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">
                {{ isset($cardTitle) ? $cardTitle : 'Check In Pengunjung' }}
              </h3>
            </div>
            {{-- BEGIN CARD-BODY --}}
            <div class="card-body">
              <div class="form-group">
                <label for="slug">Nomor ID / Identifier</label>
                <div class="input-group">
                  <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }}" placeholder="ID / Identifier">
                  @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <div id="data">
              </div>
            </div>
            {{-- END CARD-BODY --}}
            <div class="card-footer">
              <div class="row d-flex justify-content-start mb-2">
                <div class="col-md-12 mb-0 d-flex d-none d-md-block d-lg-block mb-2">
                  <button id="search" type="button" class="btn btn-outline-primary col-12"><i class="fa fa-search"></i> Cari</button>
                </div>
                <div class="col-md-12 mb-0 d-flex d-none d-md-block d-lg-block mb-2">
                  <button type="submit" class="btn btn-outline-success col-12"><i class="fa fa-check"></i> Check In</button>
                </div>
              </div>
            </div>
          </div>
          {{-- END CARD --}}
        </form>
        {{-- END FORM --}}
      </div>
    </div>
  </div>
@endsection

@section('third_party_stylesheets')
@endsection

@section('third_party_scripts')
@endsection

@push('page_scripts')
  <script>
    $('#slug').on('keyup', function() {
      // alert('tes')

    });
    $('#search').on('click', function() {
      slug = $('#slug').val();
      $.ajax({
        url: "{{ url('admin/ticket/search') }}",
        method: 'post',
        dataType: 'json',
        data: {
          slug: slug,
          "_token": "{{ csrf_token() }}",
        },
        success: function(response) {
          if (response.status == true) {
            let profile = response.ticket;
            let content = '';
            $.each(profile, function(i, data) {
              content += '<p>Nama: ' + data.name + '</p>' + '<p>Email: ' + data.email + "</p>";
              if (data.is_valid == '0') {
                content += '<p>Status: Belum check-in</p>'
              }
              if (data.is_valid == '1') {
                content += '<p>Status: Sudah check-in</p>'
              }
            });
            $('#data').html(content);
          }
        }
      })
    });
  </script>
@endpush
