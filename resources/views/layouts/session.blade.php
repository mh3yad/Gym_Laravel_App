@if(session()->has('successRenew'))
    <div class="alert alert-success">
        <h2 class="text-right">
            {{session()->get('successRenew')}}
        </h2>
    </div>

@endif

@if(session()->has('destroy'))
    <div class="alert alert-danger">
        <h2 class="text-right">
            {{session()->get('destroy')}}
        </h2>
    </div>

@endif
@if(session()->has('update'))
    <div class="alert alert-success">
        <h2 class="text-right">
            {{session()->get('update')}}
        </h2>
    </div>

@endif
@if(session()->has('add'))
    <div class="alert alert-success">
        <h2 class="text-right">
            {{session()->get('add')}}
        </h2>
    </div>

@endif
