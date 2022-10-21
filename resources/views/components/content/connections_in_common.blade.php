@foreach($commonUsers as $user) 
<x-connection_in_common  :user="$user" />
@endforeach 
<x-paginate :total="$commonTotal" :page="$commonPage" >
    <button class="btn btn-primary" onclick="getConnectionsInCommon({{$commonUser->id}},{{$commonPage+1}})" id="load_more_btn">Load more</button>
</x-paginate>