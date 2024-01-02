
const imageInput = document.getElementById('imageUpload');
const previewImage = document.getElementById('preview-image');
const resetButton = document.getElementById('reset-button');

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