@section('title', 'Admin | Single Product')
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
                @foreach($productDetails as $productDetail)
                <p><strong>Product </strong>: # {{ ucfirst($productDetail->categoryName)}}</p>
                <form method = "post" action = "{{ route('product.save')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="mb-3">
                    <label for="title" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name = "title" value ="{{ $productDetail->title}}" id="title" aria-describedby="titleHelp">
                    @if($errors->has('title'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('title') }}</span>
                     </div>
                      @endif
                    </div>
                    
                <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control" value ="{{ $productDetail->price}}"  id="price" name = "price">
                @if($errors->has('price'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('price') }}</span>
                     </div>
                @endif
                </div>




                <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea id="product_description" name="product_description">{{ $productDetail->description}}</textarea>
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
            <button type="button" class="btn btn-primary">Update</button>
                  </form>
                @endforeach
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


