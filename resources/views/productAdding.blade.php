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
                  <input type="file" multiple class="form-control" name = "gallaryImage[]" id="galleryImage">
                  <div id="image-preview-container"></div>
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


                <div class="mb-3">
                <label for="product_category" class="form-label">Product Category</label>
                <select class="form-control" id="product_category" name="productCategory">
                  <option value ="">Choose Category</option>
                @foreach($products_categories as $product_category)
                    <option value="{{ $product_category->id }}" 
                        {{ (old('productCategory') == $product_category->id) ? 'selected' : '' }}>
                        {{ $product_category->title }}
                    </option>
                @endforeach
            </select>
              @if($errors->has('productCategory'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('productCategory') }}</span>
                     </div>
                @endif
                </div>



                <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea id="product_description" name="product_description">{{ old('product_description') }}</textarea>
                @if($errors->has('product_description'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('product_description') }}</span>
                     </div>
                @endif
                </div>

                
                <div class="mb-3">
                <label for="stock" class="form-label">Stocks</label>
                <input type="number" class="form-control" value ="{{ old('stock')}}"  id="stock" name = "stock">
                @if($errors->has('stock'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('stock') }}</span>
                     </div>
                @endif
                </div>


              
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
             

@include('components.footer')
<script>
 tinymce.init({
    selector: '#product_description',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
 </script>


