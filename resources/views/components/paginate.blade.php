<div>
<span class="fw-bold"> 0 - {{ 10*$page<$total?10*$page:$total }} in {{$total}} </span>
<div class="d-flex justify-content-center mt-2 py-3 @if(10*$page>=$total) d-none @endif" id="load_more_btn_parent">
    {{ $slot }}
</div>
</div>
