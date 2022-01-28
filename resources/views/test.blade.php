

<form action="{{ url('/test/store') }}" enctype="multipart/form-data" method="post">
    @csrf
    <label for="">name</label> <br>
<input type="text" name="name"><br>


<label for="">img</label> <br>
<input type="file" name="img"><br>
<input type="submit" value="add">

</form>

