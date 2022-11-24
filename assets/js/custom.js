
  
// Add product

const exampleName = document.querySelector('.exemple #name'),
      examplePrice = document.querySelector('.exemple #price'),
      exampleDescription = document.querySelector('.exemple #description'),
      exampleImg = document.querySelector('.example #img'),
      exampleImgWrapper = document.querySelector('.exemple .img__wrapper'),
      dataName = document.querySelector('.data #name'),
      dataPrice = document.querySelector('.data #price'),
      dataDescription = document.querySelector('.data #description'),
      dataImg = document.querySelector('.data #img');

function editExample(exampleElem, dataElem, placeholder){
  exampleElem.innerHTML = dataElem.value;
  if (dataElem.value === "") exampleElem.innerHTML = placeholder;
}

const handleImage = image => {

}

const createImage = image => {
  const imageEl = document.createElement('img')
  imageEl.src = URL.createObjectURL(image)
  imageEl.classList.add("card-img-top")
  exampleImgWrapper.append(image)
  URL.revokeObjectURL(image)
}

function renderImg(image){
  let type = file.type.replace(/\/.+/, '')
  if (type === 'image'){
    createImage(image)
  }
}

dataName.addEventListener('input', () => {
  editExample(exampleName, dataName, 'Название')
})

dataPrice.addEventListener('input', () => {
  editExample(examplePrice, dataPrice, 'Цена')
})

dataDescription.addEventListener('input', () => {
  editExample(exampleDescription, dataDescription, 'Описание')
})

dataImg.addEventListener('change', () => {
  let file = data.files[0];

})