<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
  {{ $message }}
  @if (isset($loading))
    <i class="fa-solid fa-spinner fa-spin-pulse"></i>
  @endif
  <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
</div>
