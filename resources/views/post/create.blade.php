<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.error{
color: red;
}
</style>

</head>


<body>


    <div class="container">
        <h2>Add Books</h2>
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title here">
                @error('title')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" name="number" class="form-control" step="any">

            </div>
            <div class="form-group">
                <label>
                    <span class="tab-form__label">Description</span>
                    <textarea class="form-control" type="text" name="description"
                        placeholder="Enter post here"
                        rows="6" style="width: 500%;"> </textarea>
                        @error('description')
                        <div class="error error-danger">{{ $message }}</div>
                    @enderror
                </label>

            </div>
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image">
                @error('image')
                <div class="error error-danger">{{ $message }}</div>
            @enderror
            </div>


            {{-- <button type="submit" class="btn btn-primary"  >Add</button> --}}
            <input type="submit" class="btn btn-primary" name="submit" />


        </form>


    </div>



</body>

</html>

