<div class="container">
    <div class="row justify-content-center">
        <div class="{{$width}}">
            @include($include, [
                'route_path' => $route_path,
                'button_name'=> $button_name
            ])
        </div>
    </div>
</div>
