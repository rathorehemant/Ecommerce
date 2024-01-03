
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