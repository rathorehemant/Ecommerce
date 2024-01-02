@include('components.header')
@include('components.sidebar')

<div class="col-auto col-md-9 col-xl-10 px-sm-12 table">
   
    <div class="card">
    <div class="card-body">
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Title</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>




    <div id="image-container" class="mb-3">
        <label for="imageUpload" class="form-label">Product Image</label>
        <input type="file" class="form-control" id="imageUpload">
        <img id="preview-image" alt="Image Preview">
        <div id="reset-button" onclick="resetPreview()">X Reset</div>
    </div>


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Gallary Image (optional)</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Price</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>

@include('components.footer')