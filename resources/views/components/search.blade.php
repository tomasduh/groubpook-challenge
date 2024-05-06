<form action="{{ route('search') }}" method="post">
    @csrf
    <input type="text" name="q" placeholder="Location or Hotels" @isset($hotels)
        value="{{ $hotels['search_parameters']['q'] }}"
    @endisset>
    <input type="date" name="check_in_date"  @isset($hotels)
     value="{{ $hotels['search_parameters']['check_in_date'] }}" 
    @endisset required>to
    <input type="date" name="check_out_date"  @isset($hotels)
        value="{{ $hotels['search_parameters']['check_out_date'] }}" required
    @endisset required>
    <div class="select-container">
        <i class="fas fa-user"></i>
        <select name="adults">
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ isset($hotels['search_parameters']['adults']) && $hotels['search_parameters']['adults'] == $i ? 'selected' :  ''}}>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <button type="submit">Search</button>
</form>