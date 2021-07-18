@if (session()->has('succuss'))
    
<div class="alert alert-primary">{{session()->get('succuss')}}</div>
@endif
@if (session()->has('delete'))

<div class="alert alert-danger">{{session()->get('delete')}}</div>
@endif