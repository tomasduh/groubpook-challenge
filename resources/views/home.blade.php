@include('index')
    @if (session('error'))
        @include('components.error')
    @endif
    <div class="search">
        @include('components.search')
    </div>
@include('footer')