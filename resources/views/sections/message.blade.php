
@if(Session::has('message'))
    <br>
    <div class="container">
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {!! Session::get('message') !!}
        </div>
    </div>
@endif

@if(Session::has('error'))
    <br>
    <div class="container">
        @if(!is_array(Session::get('error')))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {!! Session::get('error') !!}
            </div>
        @else
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @foreach(Session::get('error') as $key => $error)
                    @if($key == 0)
                        {!! $error !!}
                    @else
                        <li>{!! $error !!}</li>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endif