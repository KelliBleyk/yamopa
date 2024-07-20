<nav>
    <div class="search">
        <form action="{{ route('movies.index') }}" method="get">
            <label>
                <input type="text" name="search" id="search" value="{{ $search ?? Request::input('search') }}">
            </label>

            <button type="submit">Search</button>
        </form>
    </div>
</nav>