<span class="fw-bold">Suggestions</span>
@foreach ($users as $user)
    <x-suggestion :user="$user" />
@endforeach  

<x-paginate :total="$total" :page="$page">
    <button class="btn btn-primary" onclick="getSuggestions({{$page+1}})" id="load_more_btn">Load more</button>
</x-paginate>