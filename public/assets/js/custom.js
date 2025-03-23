function createErrorComponent(targetElement, errorMessage) {
    // Create the main error container
    let errorContainer = document.createElement('div');
    errorContainer.className = 'errorMessage';
    errorContainer.textContent = errorMessage;
    // Append the error container to the target element
    targetElement.insertAdjacentElement('afterend', errorContainer);
}
function removeErrorComponent(targetElement) {
    let errorDiv = targetElement.nextElementSibling;
    if (errorDiv && errorDiv.classList.contains('errorMessage')) {
        errorDiv.remove();
    }
}
function formatFieldName(fieldName) {
    let words;
    if (fieldName.includes('_')) {
        words = fieldName.split('_');
    } else if(fieldName=='cnic'){
        words = ['CNIC']
    } else {
        words = [fieldName];
    }
    let capitalizedWords = words.map(word => word.charAt(0).toUpperCase() + word.slice(1));
    let formattedName = capitalizedWords.join(' ');
    return formattedName;
}


function emailValidations(input, elemName, elemeValue) {
    if (elemeValue.trim() !== '') {
        var advanceRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\\.,;:\s@\"]+\.)+[^<>()[\]\\.,;:\s@\"]{2,})$/;
        if (/(.+)@(.+){2,}\.(.+){2,}/.test(elemeValue.trim()) && advanceRegex.test(elemeValue.trim())) {
            input.classList.remove('error');
            removeErrorComponent(input);
            return true
        } else {
            removeErrorComponent(input);
            createErrorComponent(input, 'Must be a valid email example@yourdomain.com.', 'example@yourdomain.com');
            // showToast("Please Enter a valid email", "left", "bottom");
            input.classList.add('error');
            return false
        }
    }
}
function cnicValidations(input, elemName, elemeValue){
    let inputValue = elemeValue.replace(/\D/g, '');
    let field_name= formatFieldName(elemName)
    if (inputValue.length !== 13) {
        removeErrorComponent(input);
        createErrorComponent(input, '' + field_name + ' must be 13 digits.', '');
        input.classList.add('error');
        return false
    } else {
        removeErrorComponent(input)
        let part1 = inputValue.slice(0, 5);
        let part2 = inputValue.slice(5, 12);
        let part3 = inputValue.slice(12, 13);
    
        let formattedInput = `${part1}-${part2}-${part3}`;
        input.value = formattedInput;
        return true
    }
}
function showToast(msg, pos, grv) {
    var existingToast = $(".toastify");
    if (existingToast.length) {
      // If the toast div exists, update its content
      existingToast.text(msg);
      setTimeout(function() {
  
      }, 3000)
    } else {
      Toastify({
        text: msg,
        duration: 3000,
        // destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        // close: true,
        gravity: grv, // `top` or `bottom`
        position: pos, // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
          background: "linear-gradient(to right, red, red)",
        },
        onClick: function () { } // Callback after click
      }).showToast();
    }
  }

  function handleInputInput(event) {
    var input = event.target;
    var value = input.value;
    var name = input.getAttribute('name');

    // Remove any non-numeric characters
    if (name === 'user_phone') {
        var numericValue = value.replace(/\D/g, '');
        
        if (numericValue.length > 14) {
            numericValue = numericValue.slice(0, 14);
        }
        input.value = numericValue;
    }

}
    