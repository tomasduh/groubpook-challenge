@include('index')
    @if (session('error'))
        @include('components.error')
    @endif
    <div class="search">
        @include('components.search')
    </div>

    <div class="container">
        @include('components.filters')
        <label>{{ $req->q }}</label>
        @include('components.hotelcar')
    </div>
@include('footer')
