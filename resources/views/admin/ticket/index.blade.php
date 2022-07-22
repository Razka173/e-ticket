@extends('layouts.admin.main')

@section('content-header')
  {{-- @include('layouts.breadcrumb') --}}
@endsection

@section('content')
  @php
  \Carbon\Carbon::setLocale('id');
  @endphp
  <div class="container-fluid">
    @include('layouts.notification')
    {{-- @include('layouts.navigation') --}}
    {{-- BEGIN MAIN ROW --}}
    <div class="row">
      <div class="col-12">
        <div class="card">
          {{-- BEGIN CARD HEADER --}}
          <div class="card-header">
            <h3 class="card-title">{{ $tableName }}</h3>
            <div class="card-tools">
              <!-- This will cause the card to maximize when clicked -->
              <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
              <!-- This will cause the card to collapse when clicked -->
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          {{-- END CARD HEADER --}}
          {{-- BEGIN CARD BODY --}}
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-wrap">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Waktu</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tickets as $index => $ticket)
                  <tr>
                    <td>{{ $index + 1 + ($tickets->currentPage() - 1) * $tickets->perPage() }}</td>
                    <td>{{ $ticket->name }}</td>
                    <td>{{ $ticket->email }}</td>
                    <td>{{ isset($ticket->created_at) ? \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() : '-' }}</td>
                    <td>
                      @if ($ticket->is_valid == 0)
                        <span class="badge badge-success">Tiket belum digunakan</span>
                      @endif
                      @if ($ticket->is_valid == 1)
                        <span class="badge badge-success">Tiket sudah digunakan</span>
                      @endif
                    </td>
                    <td>
                      {{-- <a href="{{ route('admin.user.edit', $ticket->id) }}" class="btn btn-sm btn-warning mb-1 col-12"><i class="fa fa-edit"></i> Edit </a> --}}
                      <a href="{{ route('admin.ticket.edit', $ticket->id) }}" value="{{ $ticket->id }}" class="btn btn-sm btn-warning mb-1 col-12 edit-button"><i class="fa fa-edit"></i> Edit</a>
                      <button value="{{ $ticket->id }}" class=" btn btn-sm btn-danger mb-1 col-12 delete-button"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{-- END CARD BODY --}}
          {{-- BEGIN CARD FOOTER --}}
          <div class="card-footer">
            <div class="row d-flex justify-content-start mb-2">
              <h6 class="col-12">Halaman : {{ $tickets->currentPage() }}</h6>
              <h6 class="col-12">Jumlah Data : {{ $tickets->total() }}</h6>
              <h6 class="col-12">Data Per Halaman : {{ $tickets->perPage() }}</h6>
            </div>
            <div class="row d-flex justify-content-start">
              {{ $tickets->links() }}
            </div>
          </div>
          {{-- END CARD FOOTER --}}
        </div>
      </div>
    </div>
    {{-- END MAIN ROW --}}
  </div>
@endsection

@section('third_party_stylesheets')
@endsection

@section('third_party_scripts')
@endsection

@push('page_scripts')
  {{-- BEGIN DELETE SCRIPT --}}
  <script>
    jQuery(document).ready(function() {
      jQuery('.delete-button').on('click', function() {
        var titleText = 'Hapus Tiket'
        var descText = 'Data tiket akan di hapus, apakah anda yakin?'
        var iconType = 'question'
        var confText = 'Ya'
        var urlTarget = "{{ url('admin/ticket/delete') }}"
        var titleTextSuccess = 'Yeayy!'
        var descTextSuccess = 'Anda berhasil hapus data tiket pengunjung'
        var iconTypeSuccess = 'success'
        var titleTextFailed = 'Gagal Hapus Tiket'
        var descTextFailed = 'Maaf, coba lagi nanti!'
        var iconTypeFailed = 'error'
        Swal.fire({
          title: titleText,
          text: descText,
          icon: iconType,
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonText: confText,
        }).then((result) => {
          if (result.isConfirmed) {
            var id = jQuery(this).val();
            jQuery.ajax({
              url: urlTarget,
              method: "DELETE",
              data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
              },
              success: function(response) {
                Swal.fire({
                  title: titleTextSuccess,
                  text: descTextSuccess,
                  icon: iconTypeSuccess,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  };
                });
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                var text = jQuery.parseJSON(XMLHttpRequest.responseText);
                Swal.fire({
                  title: titleTextFailed,
                  text: descTextFailed,
                  icon: iconTypeFailed,
                });
              },
            });
          };
        });
      });
    });
  </script>
  {{-- END DELETE SCRIPT --}}
@endpush
