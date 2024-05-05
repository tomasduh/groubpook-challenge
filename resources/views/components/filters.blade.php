<form action="{{ route('filter') }}" method="post">
    @csrf
    <input type="hidden" name="q" value="{{ $req->q }}">
    <input type="hidden" name="check_in_date" value="{{ $req->check_in_date }}">
    <input type="hidden" name="check_out_date" value="{{ $req->check_out_date }}">
    <input type="hidden" name="adults" value="{{ $req->adults }}">
    <div class="filters">
        <label >Filters:</label>
        <select class="select" name="sort_by">
            <option value="">Select...</option>
            <option value="3" {{ $req->sort_by == 3 ? 'selected' : '' }}>Lowest price</option>
            <option value="8" {{ $req->sort_by == 8 ? 'selected' : '' }}>Highest rating</option>
            <option value="13" {{ $req->sort_by == 13 ? 'selected' : '' }}>Most reviewd</option>
        </select>

        <input type="number" name="min_price" placeholder="Min Price" @isset($req)
            value="{{ $req->min_price }}"
        @endisset>

        <input type="number" name="max_price" placeholder="Max Price"@isset($req)
            value="{{ $req->max_price }}"
        @endisset>

        <button class="btn-filter" type="submit">Filter</button>
    </div>
</form>