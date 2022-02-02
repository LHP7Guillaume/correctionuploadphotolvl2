// Il faut créer au préalable un élément de type <img id="preview"> dans votre code html.
// Celui-ci vous permettra d'afficher l'aperçu de l'image.
// Vous allez pouvoir modifier les dimensions de l'aperçu via un css respectif : "uploadPreview.css" fourni dans le dossier.

// Il faut également que votre input soit de cette forme :
// <input type="file" name="fileToUpload" id="fileToUpload">

fileToUpload.addEventListener("change", function () {
  let imageSend = new FileReader();

  imageSend.readAsDataURL(this.files[0]);

  imageSend.onload = () => {
    preview.src = imageSend.result;
  };
});
