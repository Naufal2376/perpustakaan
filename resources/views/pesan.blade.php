@if (session('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
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
