@foreach ($movie as $fieldKey => $fieldValue)
    @switch($fieldKey)
        @case('imdbID')
            <div class="field {{ $fieldKey }}">{{ $fieldKey }}:
                <a href="https://www.imdb.com/title/{{ $fieldValue }}/">{{ $fieldValue }}</a>
            </div>
        @break

        @case('poster')
            @unless ($fieldValue === 'N/A')
                <div class="field {{ $fieldKey }}">
                    <a href="{{ route('movies.show', ['id' => $movie['imdbID']]) }}"><img src="{{ $fieldValue }}"></a>
                </div>
            @else
                <div class="field {{ $fieldKey }} error">No poster image</div>
            @endunless
        @break

        @case('ratings')
            <div class="field ratings">Ratings:
                @forelse ($fieldValue as $rating)
                    <div class="rating" data-rating-source="{{ $rating['Source'] }}">
                        {{ $rating['Source'] }}: {{ $rating['Value'] }}</div>
                @empty
                    There're no ratings
                @endforelse
            </div>
        @break

        @case('updated_at')
        @case('created_at')

        @case('lastAccessed')
        @break

        @default
            {{-- <div class="field {{ $fieldKey }}">{{ $fieldKey }}: {{ $fieldValue }}</div> --}}
            <x-field :fieldKey="$fieldKey" :fieldValue="$fieldValue" />
    @endswitch
@endforeach

<style>
    .card {
        display: flex;
        flex-direction: column;
        border: 2px solid black;
    }

    .field {
        display: grid;
        grid-template-columns: 30ch 1fr;
        grid-gap: 2ch;
    }

    .field.poster {
        order: -1;
    }

    .field.ratings {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .field.ratings .rating {
        padding-left: 4ch;
    }
</style>
