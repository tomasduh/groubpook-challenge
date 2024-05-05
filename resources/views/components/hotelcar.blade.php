@foreach($hotels['properties'] as $hotel)
    @if(isset($hotel['rate_per_night']) && isset($hotel['images']))
        <div class="hotel-card">
            <img src="{{ $hotel['images'][0]['thumbnail'] }}" alt="{{ $hotel['name'] }}">
            <div>
                <h2>{{ $hotel['name'] }}
                    @isset($hotel['overall_rating'])
                    {{ $hotel['overall_rating'] }} <i class="fa-solid fa-star" style="color: #FFD43B;"></i>({{ $hotel['reviews'] }})
                    @endisset
                    <div class="amenties"> 
                        @include('components.amenties')
                    </div>
                <p><strong>Price:</strong> {{ $hotel['rate_per_night']['lowest'] }}</p>
                @isset($hotel['link'])
                    <a href="{{ $hotel['link'] }}" class="btn">Visit Hotel</a>
                @endisset
            </div>
        </div>
    @endif
@endforeach