/**
 * Account Settings - Account
 */

'use strict';

document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    const deactivateAcc = document.querySelector('#formAccountDeactivation');

    // Function to handle image upload and reset
    function handleImageUpload(imageSelector, fileInputSelector) {
      const accountUserImage = document.querySelector(imageSelector);
      const fileInput = document.querySelector(fileInputSelector);

      if (accountUserImage && fileInput) {

        fileInput.onchange = () => {
          if (fileInput.files[0]) {
            accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
          }
        };

      }
    }

    // Call the function for each image upload section
    handleImageUpload('#uploadedAvatarRuangTamu', '.account-file-input-ruang-tamu');
    handleImageUpload('#uploadedAvatarKolam', '.account-file-input-kolam');
    handleImageUpload('#uploadedAvatarKolamRooftop', '.account-file-input-rooftop');
    handleImageUpload('#uploadedAvatarCarport', '.account-file-input-carport');
    handleImageUpload('#uploadedAvatarRuangKeluarga', '.account-file-input-ruang-keluarga');
    handleImageUpload('#uploadedAvatarBathroom', '.account-file-input-bathroom');
    handleImageUpload('#uploadedAvatarSpa', '.account-file-input-spa');
    handleImageUpload('#uploadedAvatarKamar1', '.account-file-input-kamar1');
    handleImageUpload('#uploadedAvatarKamar2', '.account-file-input-kamar2');
    handleImageUpload('#uploadedAvatarKamar3', '.account-file-input-kamar3');
    handleImageUpload('#uploadedAvatarGambar1', '.account-file-input-gambar1');
    handleImageUpload('#uploadedAvatarGambar2', '.account-file-input-gambar2');
    handleImageUpload('#uploadedAvatarGambar3', '.account-file-input-gambar3');
    handleImageUpload('#uploadedAvatarGambar4', '.account-file-input-gambar4');
    handleImageUpload('#uploadedAvatarGambar5', '.account-file-input-gambar5');

    // Add more calls to handleImageUpload for each different image upload section
  })();
});
