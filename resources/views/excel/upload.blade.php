<form method="post" action="{{route('ex')}}"  enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit">
    @csrf
</form>
