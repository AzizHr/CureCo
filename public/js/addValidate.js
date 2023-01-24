// Add 1
const add1 = new Array(
  getById("name1"),
  getById("quantity1"),
  getById("price1"),
  getById("image1"),
  getById("name1_error"),
  getById("quantity1_error"),
  getById("price1_error"),
  getById("image1_error")
);

// Add 2
const add2 = new Array(
  getById("name2"),
  getById("quantity2"),
  getById("price2"),
  getById("image2"),
  getById("name2_error"),
  getById("quantity2_error"),
  getById("price2_error"),
  getById("image2_error")
);

let add_another_product = document.getElementById("add_another_product");
const anotherProduct = document.getElementById("anotherProduct");
let addForm = document.getElementById("add");

add_another_product.addEventListener("click", () => {
  anotherProduct.style.display = "block";
});

let valideName = /[^0-9]/;
let valideNumber = /[0-9]/;

addForm.addEventListener("submit", (e) => {
  e.preventDefault();

  if (
    validateName(add1[0], add1[4]) &
    validateQuantity(add1[1], add1[5]) &
    validatePrice(add1[2], add1[6]) &
    checkImage(add1[3], add1[7]) &
    validateName(add2[0], add2[4]) &
    validateQuantity(add2[1], add2[5]) &
    validatePrice(add2[2], add2[6]) &
    checkImage(add2[3], add2[7])
  ) {
    addForm.submit();
  }
});

function validateName(name, name_error) {
  if (name.value.trim() === "") {
    name_error.innerHTML = "Name can't be empty";
    name_error.style.color = "red";
    name_error.style.fontSize = "13px";
    name.classList.add("error");
    name.classList.remove("success");
    return false;
  } else if (valideName.test(name.value) == false) {
    name_error.innerHTML = "Please enter a valid name";
    name_error.style.color = "red";
    name_error.style.fontSize = "13px";
    name.classList.add("error");
    name.classList.remove("success");
    return false;
  } else {
    name_error.innerHTML = "";
    name.classList.add("success");
    name.classList.remove("error");
    return true;
  }
}

function validateQuantity(quantity, quantity_error) {
  if (quantity.value.trim() === "") {
    quantity_error.innerHTML = "Quantity can't be empty";
    quantity_error.style.color = "red";
    quantity_error.style.fontSize = "13px";
    quantity.classList.add("error");
    quantity.classList.remove("success");
    return false;
  } else if (parseInt(quantity.value.trim()) <= 0) {
    quantity_error.innerHTML = "Quantity must be at least 1";
    quantity_error.style.color = "red";
    quantity_error.style.fontSize = "13px";
    quantity.classList.add("error");
    quantity.classList.remove("success");
    return false;
  } else if (valideNumber.test(quantity.value) == false) {
    quantity_error.innerHTML = "Quantity must be only positive numbers";
    quantity_error.style.color = "red";
    quantity_error.style.fontSize = "13px";
    quantity.classList.add("error");
    quantity.classList.remove("success");
    return false;
  } else {
    quantity_error.innerHTML = "";
    quantity.classList.add("success");
    quantity.classList.remove("error");
    return true;
  }
}

function validatePrice(price, price_error) {
  if (price.value.trim() === "") {
    price_error.innerHTML = "Quantity can't be empty";
    price_error.style.color = "red";
    price_error.style.fontSize = "13px";
    price.classList.add("error");
    price.classList.remove("success");
    return false;
  } else if (parseInt(price.value.trim()) <= 0) {
    price_error.innerHTML = "Price must be at least 1";
    price_error.style.color = "red";
    price_error.style.fontSize = "13px";
    price.classList.add("error");
    price.classList.remove("success");
    return false;
  } else if (valideNumber.test(price.value) == false) {
    price_error.innerHTML = "Quantity must be only numbers";
    price_error.style.color = "red";
    price_error.style.fontSize = "13px";
    price.classList.add("error");
    price.classList.remove("success");
    return false;
  } else {
    price_error.innerHTML = "";
    price.classList.add("success");
    price.classList.remove("error");
    return true;
  }
}

function checkImage(image, image_error) {
  if (image.files.length == 0) {
    image_error.innerHTML = "This Field can't be empty";
    image_error.style.color = "red";
    image_error.style.fontSize = "13px";
    image.classList.add("error");
    image.classList.remove("success");
    return false;
  } else {
    image_error.innerHTML = "";
    image.classList.add("success");
    image.classList.remove("error");
    return true;
  }
}

function getById(id) {
  return document.getElementById(id);
}
