<div class="col ">
    <form class="" name="search_platform" action="" method="POST">
        @csrf
        <div class="row offset-4 col-7">
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
