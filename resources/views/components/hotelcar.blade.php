@foreach($hotels['properties'] as $hotel)
    @isset($hotel['rate_per_night'])
        <div class="hotel-card">
            <img src="{{ $hotel['images'][0]['thumbnail'] }}" alt="{{ $hotel['name'] }}">
            <div>
                <h2>{{ $hotel['name'] }}</h2>
                <p><strong>Price:</strong> {{ $hotel['rate_per_night']['lowest'] }}$ per night</p>
            </div>
        </div>
    @endisset
@endforeach