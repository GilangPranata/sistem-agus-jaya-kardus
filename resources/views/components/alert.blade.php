@props(['type', 'message'])

@if ($message)
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        <i class="bi {{ $type === 'success' ? 'bi-check-circle' : 'bi-exclamation-triangle' }}"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
