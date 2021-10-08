const DOG_URL = "https://dog.ceo/api/breeds/image/random";

const imageGallery = document.querySelector(".image-gallery");

for (let i = 0; i < 50; ++i) {
  const dogUrlResponse = fetch(DOG_URL);
  dogUrlResponse
    .then((response) => {
      const processingResponse = response.json();
      return processingResponse;
    })
    .then((processedResponse) => {
      const newImage = document.createElement("img");
      newImage.src = processedResponse.message;
      newImage.classList.add("image");
      imageGallery.insertBefore(newImage, imageGallery.firstChild);
    });
}
