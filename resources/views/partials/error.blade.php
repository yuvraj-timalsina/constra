@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="error invalid-feedback">{{ $error }}</div>
    @endforeach
@endif
