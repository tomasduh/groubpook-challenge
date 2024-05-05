@isset($hotel['amenities'])
    @php $row_count = 0; @endphp
    <table style="border-collapse: collapse; border: none; width: 420px;">
        @foreach(array_chunk($hotel['amenities'], 3, true) as $amenities)
            @if ($row_count < 3)
                <tr>
                    @foreach($amenities as $amenity)
                        <td style="border: none;">{{ $amenity }}</td>
                    @endforeach
                </tr>
                @php $row_count++; @endphp
            @else
                @break
            @endif
        @endforeach
    </table>
@endisset