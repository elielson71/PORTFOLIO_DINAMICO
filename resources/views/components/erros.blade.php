@if ($errors->any())
<div class="container">
    @foreach ($errors->all() as $error)
    <div align="center" class="alert alert-danger">
        {{ $error }}
    </div>
        @endforeach
</div>
@endif
