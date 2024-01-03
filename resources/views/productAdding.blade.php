@section('title', 'Admin | Add New Product')
@include('components.header')
    <!-- Sidebar Start -->
    @include('components.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('components.navbar')
      <!--  Header End -->
      
      <div class="card">
                <div class="card-body">
                <form method = "post" action = "{{ route('product.save')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                    <label for="title" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name = "title" value ="{{ old('title')}}" id="title" aria-describedby="titleHelp">
                    @if($errors->has('title'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('title') }}</span>
                     </div>
                      @endif
                    </div>
                    <div id="image-container" class="mb-3">
                    <label for="imageUpload" class="form-label">Product Image</label>
                  <input type="file" class="form-control" id="imageUpload" accept="image/*"  name = "productImage">
                  <img id="preview-image" alt="Image Preview">
                  <div id="reset-button" onclick="resetPreview()">X Reset</div>

                  @if($errors->has('productImage'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('productImage') }}</span>
                     </div>
                      @endif

                    </div>
                    <div class="mb-3">
                  <label for="galleryImage" class="form-label">Product Gallary Image (optional)</label>
                  <input type="file" multiple class="form-control" name = "gallaryImage" id="galleryImage">
                </div>

                <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control" value ="{{ old('price')}}"  id="price" name = "price">
                @if($errors->has('price'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('price') }}</span>
                     </div>
                @endif
              </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@include('components.footer')

