<form action="{{ route('search') }}" method="post">
    @csrf
    <input type="text" name="q" placeholder="Location or Hotels" @isset($req)
        value="{{ $req->q }}"
    @endisset>
    <input type="date" name="check_in_date" @isset($req)
     value="{{ $req->check_in_date }}"
    @endisset>to
    <input type="date" name="check_out_date" @isset($req)
        value="{{ $req->check_out_date }}"
    @endisset>
    <div class="select-container">
        <i class="fas fa-user"></i>
        <select name="adults">
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ isset($req->adults) && $req->adults == $i ? 'selected' :  ''}}>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <button type="submit">Search</button>
</form>