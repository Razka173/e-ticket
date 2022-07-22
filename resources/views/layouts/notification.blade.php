{{-- BEGIN NOTIFICATION --}}
<div class="row">
  <div class="col-12">
    @if (session('success'))
      <x-alert type="success" message="{{ session('success') }}" />
    @endif
    @if (session('error'))
      <x-alert type="danger" message="{{ session('error') }}" />
    @endif
  </div>
</div>
{{-- END NOTIFICATION --}}
