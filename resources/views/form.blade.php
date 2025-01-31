
<form action="{{ route('sendemail')}}" method="post"  enctype="multipart/form-data" >
  @csrf
    <div class="form-group">
      <label for="title">Name:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="name" value="">
      </div>

      <div class="form-group">
      <label for="title">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="">
      </div>
      
      <div class="form-group">
      <label for="title">messege:</label>
      <input type="text" class="form-control" id="messege" placeholder="Enter messege" name="messege" value="">
      </div>

      <button type="submit" class="btn btn-default">send</button>

  </form>