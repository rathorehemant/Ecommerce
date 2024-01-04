
// for single product image
const imageInput = document.getElementById('imageUpload');
const previewImage = document.getElementById('preview-image');
const resetButton = document.getElementById('reset-button');

if(imageInput){
imageInput.addEventListener('change', handleImageChange);

function handleImageChange(event) {
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
            resetButton.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }
}

function resetPreview() {
    imageInput.value = '';
    previewImage.src = '';
    previewImage.style.display = 'none';
    resetButton.style.display = 'none';
}
}



$('.delete_product').on('click', function () {
    let product_id = $(this).data('product-id'); 
    let csrf = $(this).data('csrf-token');
    Swal.fire({
      title: 'Are you sure?',
      text: 'You won\'t be able to revert this!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      // If user clicks on 'Confirm'
      if (result.isConfirmed) {
        $.ajax({
          url: "delete-product/"+product_id,
          type: 'DELETE',
          data: {
            _token: csrf,
        },
          success: function (response) {
            if(response.success){
                Swal.fire({
                    title: 'Deleted!',
                    text: response.message,
                    icon: 'success',
                    didClose: () => {
                        location.reload(true);
                    }
                });
            }else{

                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    icon: 'error',
                    didClose: () => {
                        location.reload(true);
                    }
                });
                
            }
            

          },
          error: function (error) {
            // Handle the error response
            Swal.fire('Error!', 'An error occurred.', 'error');
          }
        });
       
      } else {
        // If user clicks on 'Cancel' or closes the dialog
        return false;
      }
     
    });

    
  });



  $('.delete_product_category').on('click', function () {
    let productCategory_id = $(this).data('product-category-id'); 
    let csrf = $(this).data('csrf-token');
    Swal.fire({
      title: 'Are you sure?',
      text: 'You won\'t be able to revert this!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      // If user clicks on 'Confirm'
      if (result.isConfirmed) {
        $.ajax({
          url: "/delete-product-category/"+productCategory_id,
          type: 'DELETE',
          data: {
            _token: csrf,
        },
          success: function (response) {
            if(response.success){
                Swal.fire({
                    title: 'Deleted!',
                    text: response.message,
                    icon: 'success',
                    didClose: () => {
                        location.reload(true);
                    }
                });
            }else{

                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    icon: 'error',
                    didClose: () => {
                        location.reload(true);
                    }
                });
                
            }
            

          },
          error: function (error) {
            // Handle the error response
            Swal.fire('Error!', 'An error occurred.', 'error');
          }
        });
       
      } else {
        // If user clicks on 'Cancel' or closes the dialog
        return false;
      }
     
    });

    
  });



  // for gallary image 

  var previewContainer = document.getElementById('image-preview-container');

  if(previewContainer){
  function previewImages() {
    var previewContainer = document.getElementById('image-preview-container');
    var files = document.getElementById('galleryImage').files;

    previewContainer.innerHTML = ''; // Clear existing preview

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();

        reader.onload = (function (file) {
            return function (e) {
                var imgContainer = document.createElement('div');
                imgContainer.className = 'image-container';

                var img = document.createElement('img');
                img.className = 'uploaded-image';
                img.src = e.target.result;

                var closeButton = document.createElement('button');
                closeButton.className = 'close-button';
                closeButton.innerHTML = 'x';
                closeButton.onclick = function () {
                    removeImage(imgContainer, file);
                };

                imgContainer.appendChild(img);
                imgContainer.appendChild(closeButton);

                previewContainer.appendChild(imgContainer);
            };
        })(file);

        reader.readAsDataURL(file);
    }
}

function removeImage(container, file) {
  container.parentNode.removeChild(container);

  // Reset the file input value and files array
  var inputElement = document.getElementById('galleryImage');
  var currentFiles = Array.from(inputElement.files);
  var updatedFiles = currentFiles.filter(function (f) {
      return f !== file;
  });

  // Create a new FileList and assign it to the input element
  var newFileList = new DataTransfer();
  updatedFiles.forEach(function (f) {
      newFileList.items.add(f);
  });
  inputElement.files = newFileList.files;
}

document.getElementById('galleryImage').addEventListener('change', previewImages);

  }
