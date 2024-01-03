@section('title', 'Admin | Add New Category')
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
                <form method = "post" action = "{{ route('product.category.save')}}">
                  @csrf
                    <div class="mb-3">
                    <label for="title" class="form-label">Category Title</label>
                    <input type="text" class="form-control" name = "title" value ="{{ old('title')}}" id="title" aria-describedby="titleHelp">
                    @if($errors->has('title'))
                      <div id = "titleHelp" class="form-text">
                     <span class="text-danger">{{ $errors->first('title') }}</span>
                     </div>
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
@include('components.footer')

