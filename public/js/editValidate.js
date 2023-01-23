// Add 1
const add1 = new Array(getById('name') , getById('quantity') , getById('price') , getById('image') , getById('name_error') , getById('quantity_error') , getById('price_error') , getById('image_error'))

let editForm = document.getElementById('edit')

let valideName = /[^0-9]/
let valideNumber = /[0-9]/

editForm.addEventListener('submit' , e => {
    e.preventDefault()

    if(validateName(add1[0] , add1[4]) & validateQuantity(add1[1] , add1[5]) & validatePrice(add1[2] , add1[6]) & checkImage(add1[3] , add1[7])) {
        editForm.submit()
    }

})

function validateName(name , name_error) {
    if(name.value.trim() === '') {
        name_error.innerHTML = 'Name can\'t be empty'
        name_error.style.color = 'red'
        name_error.style.fontSize = '13px'
        name.classList.add('error')
        name.classList.remove('success')
        return false
    } else if(valideName.test(name.value) == false) {
        name_error.innerHTML = 'Please enter a valid name'
        name_error.style.color = 'red'
        name_error.style.fontSize = '13px'
        name.classList.add('error')
        name.classList.remove('success')
        return false
    } else {
        name_error.innerHTML = ''
        name.classList.add('success')
        name.classList.remove('error')
        return true
    }
}

function validateQuantity(quantity , quantity_error) {
    if(quantity.value.trim() === '') {
        quantity_error.innerHTML = 'Quantity can\'t be empty'
        quantity_error.style.color = 'red'
        quantity_error.style.fontSize = '13px'
        quantity.classList.add('error')
        quantity.classList.remove('success')
        return false
    } else if(parseInt(quantity.value.trim()) <= 0) {
        quantity_error.innerHTML = 'Quantity must be at least 1'
        quantity_error.style.color = 'red'
        quantity_error.style.fontSize = '13px'
        quantity.classList.add('error')
        quantity.classList.remove('success')
        return false
    } else if(valideNumber.test(quantity.value) == false) {
        quantity_error.innerHTML = 'Quantity must be only positive numbers'
        quantity_error.style.color = 'red'
        quantity_error.style.fontSize = '13px'
        quantity.classList.add('error')
        quantity.classList.remove('success')
        return false
    } else {
        quantity_error.innerHTML = ''
        quantity.classList.add('success')
        quantity.classList.remove('error')
        return true
    }
}

function validatePrice(price , price_error) {
    if(price.value.trim() === '') {
        price_error.innerHTML = 'Quantity can\'t be empty'
        price_error.style.color = 'red'
        price_error.style.fontSize = '13px'
        price.classList.add('error')
        price.classList.remove('success')
        return false
    } else if(parseInt(price.value.trim()) <= 0) {
        price_error.innerHTML = 'Price must be at least 1'
        price_error.style.color = 'red'
        price_error.style.fontSize = '13px'
        price.classList.add('error')
        price.classList.remove('success')
        return false
    } else if(valideNumber.test(price.value) == false) {
        price_error.innerHTML = 'Quantity must be only numbers'
        price_error.style.color = 'red'
        price_error.style.fontSize = '13px'
        price.classList.add('error')
        price.classList.remove('success')
        return false
    } else {
        price_error.innerHTML = ''
        price.classList.add('success')
        price.classList.remove('error')
        return true
    }
}

function checkImage(image , image_error) {
    if(image.files.length == 0) {
        image_error.innerHTML = 'This Field can\'t be empty'
        image_error.style.color = 'red'
        image_error.style.fontSize = '13px'
        image.classList.add('error')
        image.classList.remove('success')
        return false
    } else {
        image_error.innerHTML = ''
        image.classList.add('success')
        image.classList.remove('error')
        return true
    }
}



function getById(id) {
    return document.getElementById(id)
}