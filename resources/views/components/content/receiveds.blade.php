<span class="fw-bold">Received Request</span>
@foreach ($users as $user)
    <x-request :mode="'received'" :user="$user" />
@endforeach
  

<x-paginate :total="$total" :page="$page">
    <button class="btn btn-primary" onclick="getReceived({{$page+1}})" id="load_more_btn">Load more</button>
</x-paginate>