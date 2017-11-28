@if(session()->has('success'))
    <div class="alert alert-success">
    	<button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('success') }}
    </div>
@elseif(session()->has('fail'))
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session()->get('danger') }}
    </div>
@endif