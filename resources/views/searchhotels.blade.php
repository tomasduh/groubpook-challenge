@include('index')
    @if (session('error'))
        @include('components.error')
    @endif
    <div class="search">
        @include('components.search')
    </div>

    <div class="container">
        @include('components.filters')
        <label>{{ $hotels['search_parameters']['q'] }}</label>
        @include('components.hotelcar')
        @include('components.pagination')
    </div>
@include('footer')
