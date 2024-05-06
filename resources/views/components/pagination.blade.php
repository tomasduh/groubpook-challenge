<div class="pagination">
    <form action="{{ route('next') }}" method="post">
        @csrf
        <input type="hidden" name="next_page" value="{{ $hotels['serpapi_pagination']['next'] }}">
        <button class="btn-pagination" type="submit">Next</button>
    </form>
</div>