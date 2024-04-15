@if(session('success'))
    <div class="alert alert-successx  alert-dismissable fade show text-center"
     style="background-color:rgb(78, 226, 78);color:white; 230, 81); font-size:27px;margin-top:52px">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{session('success')}}
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissable fade show text-center" 
     style="color:rgb(6, 29, 31); font-size:29px; margin-top:52px">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{session('error')}}
    </div>
@endif