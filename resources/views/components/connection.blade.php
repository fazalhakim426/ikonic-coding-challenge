<div class="my-2 shadow text-white bg-dark p-1" id="'{{$user->id}}">
  <div class="d-flex justify-content-between">
    <table class="ms-1"> 
      <td class="align-middle">{{ $user->name }}</td>
      <td class="align-middle"> - </td>
      <td class="align-middle">{{ $user->email }}</td>
      <td class="align-middle">
    </table>
    <div>
      <button style="width: 220px" 
                onclick="getConnectionsInCommon({{$user->id}})" 
                id="{{'get_connections_in_common_'.$user->id}}"
         class="btn btn-primary" type="button"
        data-bs-toggle="collapse" data-bs-target="{{'#collapse_'.$user->id}}" aria-expanded="false" aria-controls="collapseExample">
        Connections in common ({{ $user->connections->whereIn('id',Auth::user()->connections->pluck('id')->toArray())->count()}})
      </button>
      <button  onclick="withdrawRequest({{$user->pivot->id}},true)" id="create_request_btn_" class="btn btn-danger me-1">Remove Connection</button>
    </div>

  </div>
  <div class="collapse" id="{{'collapse_'.$user->id}}">

    <div id="{{'content_'.$user->id}}" class="p-2"> 
      
    </div>
    <div id="{{'connections_in_common_skeletons_'.$user->id}}">
            @for ($i = 0; $i < 5; $i++)
                <x-skeleton />
            @endfor
     </div> 
  </div>
</div>
