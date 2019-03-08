@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(session()->has('alert-' . $msg))
        <div class="alerts">
            <div class="alert alert-{{ $msg }}">
                {!! Session::get('alert-' . $msg) !!}
            </div>
        </div>
    @endif
@endforeach