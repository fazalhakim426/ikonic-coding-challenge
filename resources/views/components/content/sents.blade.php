<span class="fw-bold">Sent Request </span>
                     
@foreach ($users as $user) 
    <x-request :mode="'sent'" :user="$user" />
@endforeach 

<x-paginate :total="$total" :page="$page">
    <button class="btn btn-primary" onclick="getSent({{$page+1}})" id="load_more_btn">Load more</button>
</x-paginate>