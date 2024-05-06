<form action="{{ route('filter') }}" method="post">
    @csrf
    <input type="hidden" name="q" value="{{ $hotels['search_parameters']['q'] }}">
    <input type="hidden" name="check_in_date" value="{{ $hotels['search_parameters']['check_in_date'] }}">
    <input type="hidden" name="check_out_date" value="{{ $hotels['search_parameters']['check_out_date'] }}">
    <input type="hidden" name="adults" value="{{ $hotels['search_parameters']['adults'] }}">
    <div class="filters">
        <label >Filters:</label>
        <select class="select" name="sort_by">
            <option value="">Select...</option>
            <option value="3" {{ isset($hotels['search_parameters']['sort_by']) && $hotels['search_parameters']['sort_by'] == 3 ? 'selected' : '' }}>
                Lowest price
            </option>
            <option value="8" {{ isset($hotels['search_parameters']['sort_by']) && $hotels['search_parameters']['sort_by'] == 8 ? 'selected' : '' }}>
                Highest rating
            </option>
            <option value="13" {{ isset($hotels['search_parameters']['sort_by']) && $hotels['search_parameters']['sort_by'] == 13 ? 'selected' : '' }}>
                Most reviewd
            </option>
        </select>

        <input type="number" name="min_price" placeholder="Min Price" @isset($hotels['search_parameters']['min_price'])
            value="{{ $hotels['search_parameters']['min_price'] }}"
        @endisset>

        <input type="number" name="max_price" placeholder="Max Price"@isset($hotels['search_parameters']['max_price'])
            value="{{ $hotels['search_parameters']['max_price'] }}"
        @endisset>

        <button class="btn-filter" type="submit">Filter</button>
    </div>
</form>