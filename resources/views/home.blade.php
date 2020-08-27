@extends('layouts.' . $layout)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Бронирования билетов') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class="flex-center position-ref">
                    <div class="cinoteatr" id="seats">
                        @for ($i = 1; $i <= 30; $i++)
                            @if(isset($mapped[$i]))
                                <div class="mesta" id="{{ $i }}" style="background: red; color: white;">{{ $i }}</div>
                            @else
                                <div class="mesta" id="{{ $i }}">{{ $i }}</div>
                            @endif
                        @endfor
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
