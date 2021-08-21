@extends('layouts.app')

@section('content')

<form action="{{route('forms.store')}}" method="post" >
    {{csrf_field()}}
    <div class="container">
    <div class="form-group">
      <label for="name">Employee Name</label>
      <input type="text" class="form-control" id="name">
    </div>
    {{-- <div class="dropdown">
        <label for="position">Position</label>
        <select name="position" id="position">
          <option value="Web Designer">Web Designer</option>
          <option value="Web Developer">Web Developer</option>
          <option value="BDE">BDE</option>
        </select>
        <br><br>
      </div> --}}

      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="position" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Position
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Web developer</a>
          <a class="dropdown-item" href="#">web designer</a>
          <a class="dropdown-item" href="#">graphic</a>
        </div>
      </div>

      <div class="mt-4 container">
    <button type="submit" id="saveform"  class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
 @endsection

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
      $(document).ready(function() {
$('#saveform').click(function(event) {
        event.preventDefault();
        // console.log($(this));

        var name = $('#name').val();
        var position = $('#position').val();
        console.log(position)

        $.ajax({
          url: "{{route('forms.store')}}", //Define Post URL
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            'name' : name,
            'position' : position,

          },

          success: function(data){
              console.log(data)

       },
      });
    });
      });
    </script>
