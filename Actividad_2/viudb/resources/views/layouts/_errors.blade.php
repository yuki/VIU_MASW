@if ($errors->any())
    <div class="alert alert-danger offset-4 col-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
