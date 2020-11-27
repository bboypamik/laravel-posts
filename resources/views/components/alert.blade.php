<div id="session-message" >
    @if(session()->has('message'))
        {{$slot}}
        <div class="alert alert-success"> {{session()->get('message')}} </div>
    @elseif(session()->has('error'))
        {{$slot}}
        <div class="alert alert-danger">{{session()->get('error')}}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<script>

    setTimeout(function () {
        $('#session-message').remove();
    }, 3000);
</script>
