@if ($errors->any())
    <div class="alert alert-danger offset-2 col-8">
        <b>Error:</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
