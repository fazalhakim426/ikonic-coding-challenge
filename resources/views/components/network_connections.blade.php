<div class="row justify-content-center mt-1">
    <div class="col-12">
        <div class="card shadow  text-white bg-dark">
            <div class="card-header">Coding Challenge - Network connections</div>
            <div class="card-body">
                <div class="btn-group w-100 mb-3" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio"   class="btn-check" name="btnradio"
                        id="suggestion" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="suggestion" id="get_suggestions_btn">Suggestions
                        ({{ $authUser->suggestions->count() }})</label>

                    <input type="radio"   class="btn-check" name="btnradio"
                        id="sent" autocomplete="off">
                    <label class="btn btn-outline-primary" for="sent" id="get_sent_requests_btn">Sent Requests
                        ({{ $authUser->followings->count()  }})</label>

                    <input type="radio"  class="btn-check" name="btnradio"
                        id="received" autocomplete="off">
                    <label class="btn btn-outline-primary" for="received" id="get_received_requests_btn">Received
                        Requests({{ $authUser->followers()->where('approved', 0)->count()
                        
                        
                        }})</label>

                    <input type="radio"  class="btn-check" name="btnradio"
                        id="connection" autocomplete="off">
                    <label class="btn btn-outline-primary" for="connection" id="get_connections_btn">Connections
                        ({{ $authUser->connections->count() }})</label>
                </div>
                <hr>
                {{-- Display data here --}}
                <div id="sent-content" class="d-none">

                </div>

                <div id="received-content" class="d-none">

                </div>

                <div id="suggestion-content" class="d-none">   
                </div>

                <div id="connection-content" class="d-none">

                </div>

                <div id="skeleton" class="d-none">
                  @for ($i = 0; $i < 10; $i++)
                      <x-skeleton />
                  @endfor
              </div> 
            </div>
        </div>
    </div>
</div>
