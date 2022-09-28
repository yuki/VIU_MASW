@if ($errors->any())
<div class="container">
    <div class="alert alert-danger offset-2 col-md-8">
        <b>Error:</b>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
