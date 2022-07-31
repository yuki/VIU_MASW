
<div class="row pb-5">
    <div class="col ">
        <form class="" name="search_platform" action="" method="POST">
            @csrf
            <div class="row offset-4 col">
                <div class="col">
                    <input type="text" class="form-control" id="name" name="name" required placeholder="{{__('viudb.buscar')}}"
                        @if (isset($name))
                            value="{{$name}}"
                        @endif
                    />
                </div>
                <div class="col">
                    <button id="search_button" type="submit" class="btn btn-primary" name="search">{{__('viudb.buscar')}}</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col text-center align-self-center">
        <a class="btn btn-outline-primary" href="{{$route_path}}" role="button">{{$button_name}}</a>
    </div>
</div>
