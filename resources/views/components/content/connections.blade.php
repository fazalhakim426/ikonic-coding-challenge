<span class="fw-bold">Connections  </span>
@foreach ($users as $user) 
<x-connection :user="$user"/>
@endforeach

<x-paginate :total="$total" :page="$page">
    <button class="btn btn-primary" onclick="getConnections({{$page+1}})" id="load_more_btn">Load more</button>
</x-paginate>

