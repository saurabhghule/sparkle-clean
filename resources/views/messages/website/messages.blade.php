@if(session()->has('error') > 0)
    <div data-alert class="alert-box alert round message_box">
        <h4>
            <i class="icon fa fa-check"></i>
            <span class="tag">
                {{session('tag')}}
            </span>
        </h4>

        <p>{{session('message')}}</p>
        <a href="#" class="close">&times;</a>
    </div>
@elseif(session()->has('success')>0)
    <div data-alert class="alert-box success radius message_box">
        <h4><i class="icon fa fa-check"></i>
            <span class="tag">
            {{session('tag')}}
            </span>
        </h4>

        <p>{{session('message')}}</p>
        <a href="#" class="close">&times;</a>
    </div>
@endif