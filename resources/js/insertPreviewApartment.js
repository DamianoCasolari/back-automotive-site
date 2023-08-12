function showImagePreview(input, previewId) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            const imagePreview = document.getElementById(previewId);
            imagePreview.src = e.target.result;
            const previewContainer = document.getElementById(`${previewId}-container`);
            previewContainer.classList.remove('d-none');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const inputIds = ['cover_image', 'cover_image2', 'cover_image3', 'cover_image4', 'cover_image5'];

    inputIds.forEach(function (inputId) {
        const input = document.getElementById(inputId);
        const previewId = `${inputId}-preview`;

        input.addEventListener('change', function () {
            showImagePreview(this, previewId);
        });
    });
});


