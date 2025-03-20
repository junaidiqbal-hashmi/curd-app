 <!-- <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
 <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
 <!-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script> -->
 <script src="{{ asset('assets/js/scripts.js')}}"></script>
 <script src="{{ asset('assets/vendor/chart.js/Chart.min.js')}}" crossorigin="anonymous"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script> -->
 <script src="{{ asset('assets/vendor/datatables/simple-datatables.min.js') }}"></script>
 <script src="{{ asset('assets/js/datatables/datatables.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script src="{{ asset('assets/js/litepicker.js') }}"></script>
 <script src="{{ asset('assets/js/custom.js') }}"></script>
 <sb-customizer project="sb-admin-pro"></sb-customizer>
 <script>
     (function() {
         function c() {
             var b = a.contentDocument || a.contentWindow.document;
             if (b) {
                 var d = b.createElement('script');
                 d.innerHTML = "window.__CF$cv$params={r:'8ae5ec1cafafc914',t:'MTcyMjg1MTg0MC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='cdn-cgi/challenge-platform/h/b/scripts/jsd/8c81cb09042c/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";
                 b.getElementsByTagName('head')[0].appendChild(d)
             }
         }
         if (document.body) {
             var a = document.createElement('iframe');
             a.height = 1;
             a.width = 1;
             a.style.position = 'absolute';
             a.style.top = 0;
             a.style.left = 0;
             a.style.border = 'none';
             a.style.visibility = 'hidden';
             document.body.appendChild(a);
             if ('loading' !== document.readyState) c();
             else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c);
             else {
                 var e = document.onreadystatechange || function() {};
                 document.onreadystatechange = function(b) {
                     e(b);
                     'loading' !== document.readyState && (document.onreadystatechange = e, c())
                 }
             }
         }
     })();
     window.addEventListener('DOMContentLoaded', event => {
         const litepickerRangePluginele = document.getElementById('litepickerRangePlugin');
         if (litepickerRangePluginele) {
             new Litepicker({
                 element: litepickerRangePluginele,
                 startDate: '{{$date_from ?? ""}}',
                 endDate: '{{$date_to ?? ""}}',
                 singleMode: false,
                 numberOfMonths: 2,
                 numberOfColumns: 2,
                 format: 'MMM DD, YYYY',
                 plugins: ['ranges'],
                 setup: (picker) => {
                     picker.on('selected', (date1, date2) => {
                         console.log(date1)
                         console.log(date2)
                         let dateFrom = date1.format('YYYY-MM-DD');
                         let dateTo = date2.format('YYYY-MM-DD');
                         let url = new URL(window.location.href);
                         url.searchParams.set('date_from', dateFrom);
                         url.searchParams.set('date_to', dateTo);
                         window.location.href = url.toString();
                     });
                 },
             });
         }
     })

     function validateForm(event, form, id) {
         event.preventDefault();
         var inputs = form.querySelectorAll('input');
         var selects = form.querySelectorAll('select');
         var isValid = true;
         selects.forEach(function(select) {

         })
         inputs.forEach(function(input) {
             if (input.value.trim() === '') {
                 if (input.name == 'name' || input.name == 'cnic' || input.name == 'password' || input.name == 'password_confirmationd') {
                     input.classList.add('error');
                     isValid = false;
                     field_name = formatFieldName(input.name)
                     removeErrorComponent(input);
                     createErrorComponent(input, '' + field_name + ' required.', '');
                 }
             } else {
                 if (input.name == 'email') {
                     if (!emailValidations(input, input.name, input.value.trim(), '1')) {
                         isValid = false;
                     }
                 } else {
                     input.classList.remove('error');
                     removeErrorComponent(input);
                 }
             }
         });
         if (isValid) {
             event.target.submit();
         }
     }

     function confirmDelete(url, id) {
         Swal.fire({
             title: 'Are you sure?',
             text: "Do you really want to delete this item?",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#d33',
             cancelButtonColor: '#3085d6',
             confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
             if (result.isConfirmed) {
                 deleteItem(`${url}`);
             }
         });
     }
    
     function previewImage(event) {
        var reader = new FileReader();
        console.log(reader.result)
        reader.onload = function() {
            
            var output = document.getElementById('profile-image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
     function deleteItem(url) {
         fetch(`${url}`, {
                 method: 'DELETE',
                 headers: {
                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                     'Accept': 'application/json'
                 }
             })
             .then(response => response.json())
             .then(data => {
                 Swal.fire(
                     'Deleted!',
                     'Your item has been deleted.',
                     'success'
                 ).then(() => {
                     location.reload();
                 });
             })
             .catch(error => {
                 Swal.fire(
                     'Error!',
                     'There was a problem deleting the item.',
                     'error'
                 );
             });
     }
     function attachOnChangeToInputsSelects() {
            // Get all the input elements on the page
            var inputs = document.getElementsByTagName('input');
            var selects = document.getElementsByTagName('select');

            // Iterate over each input field
            for (var i = 0; i < inputs.length; i++) {
                // Attach the onchange event handler to the current input field
                // inputs[i].addEventListener('change', handleInputChange);
                // inputs[i].addEventListener('input', handleInputInput);
            }
            for (var i = 0; i < selects.length; i++) {
                // Attach the onchange event handler to the current input field
                selects[i].addEventListener('change', handleSelectChange);
                // selects[i].addEventListener('input', handleSelectInput);
            }
        }
        attachOnChangeToInputsSelects();
            function handleSelectChange(event) {
                var select = event.target;
                var value = select.value;
                var name = select.getAttribute('name');

                // Remove any non-numeric characters

                if (name === 'role_id') {
                    var districtDiv = document.querySelector('.district-div');
                    var entrypointDiv = document.querySelector('.entrypoints-div');

                    if (value ==5) {
                        districtDiv.style.display = "block";
                        entrypointDiv.style.display = "block";
                    } else if(value ==4) {
                        districtDiv.style.display = "block";
                        entrypointDiv.style.display = "none";
                    } else if(value==2 || value==3 ){
                        districtDiv.style.display = "none";
                        entrypointDiv.style.display = "none";
                    } else {
                        districtDiv.style.display = "none";
                        entrypointDiv.style.display = "none";
                    }
                }

            }
 </script>
 <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8ae5ec1cafafc914","version":"2024.7.0","serverTiming":{"name":{"cfL4":true}},"token":"6e2c2575ac8f44ed824cef7899ba8463","b":1}' crossorigin="anonymous"></script>