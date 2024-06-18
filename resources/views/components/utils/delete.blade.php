
<form action="{{$url}}" method="post" class="form-inline" onsubmit="return confirm('Yakin Menghapus Data Ini?')">
    @csrf
    @method("delete")
    <button class="btn btn-danger btn-mat"><i class="feather icon-trash"></i></button>
</form>