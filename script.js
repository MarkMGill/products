
// ajax code for login form
$(function () {
   $("#loginForm").submit(function (e) {
       e.preventDefault();
       var form_data = $(this).serialize();
       var url = $(this).attr('action');
       $.ajax({
           type: "POST",
           url: url,
           dataType: "json", // Add datatype
           data: form_data,
           success: function(res) {
               console.log(res);
               if (res.status == true) {
                   window.location.href = res.redirect;
               }else {
                   document.getElementById('loginError').innerHTML = 'Please enter correct Username and Password.';
               }
           },
           error: function(error) {
               console.log(error.responseText);
           }
       });
   });
});

// create global variable to track pagination page for use in create new function
var pageNum = '';

// load products data
function getProducts(page) {
   $.ajax({
       url: 'getProducts.php',
       method: "POST",
       dataType: "json",
       data: {page: page},
       success: function(data) {
            pageNum = page;
           document.getElementById('tableBody').innerHTML = '';
           $('#tableBody').append(data.table);
           document.getElementById('pagination-links').innerHTML = '';
           $('#pagination-links').append(data.links);
           
           // set up event listeners for newly added buttons
           showUpdateVals();
           showDeleteVals(); 
       }
   })
}

// load data with pagination links
function loadPaginationLinks() {
   $(document).on('click', '.pagination-link', function(e) {
      e.preventDefault();
      var page = $(this).attr("id");
      console.log(page);
      getProducts(page);
   });
}

// ajax form for create new product
$(function () {    
   $("#createForm").submit(function (e) {
      e.preventDefault();
      var form_data = $(this).serialize(); 
      $.ajax({
         type: "POST", 
         url: "createProduct.php",
         dataType: "json", // Add datatype
         data: form_data
      }).done(function (data) {
           if(data.status == true) {
               $('#createName').val('');
               $('#createDesc').val('');
               $('#createQuantity').val('');
               $('#createPrice').val('');
               $('#createModal').modal('hide');
               //document.getElementById('tableBody').innerHTML = data.table;
               console.log(data);
               //$('#productsTable').append('<tr id="' + data.SKU_Code + '"><th scope="row">' + data.SKU_Code + '</th><td class="productName">' + data.name + '</td><td class="productDesc">' + data.description + '</td><td class="productQuantity">' + data.quantity + '</td><td class="productPrice">' + data.price + '</td><td><input type="button" class="btn btn-primary btn-lg updateBtn" value="Edit" data-toggle="modal" data-target="#updateModal"></td><td><input type="button" class="btn btn-primary btn-lg deleteBtn" value="Delete" data-toggle="modal" data-target="#deleteModal"></td></tr>');

               getProducts(pageNum);          
               loadPaginationLinks();

               // set up event listeners for newly added buttons
               showUpdateVals();
               showDeleteVals(); 

           } else {
               alert("nope")
           }
      }).fail(function (data) {
            console.log(data);
      });
   }); 
   });

   // show values in update form
   function showUpdateVals() {
      $('.updateBtn').on('click', function() {
         $tr = $(this).closest('tr');
         
         var SKU = $tr.children('th').map(function() {
            return $(this).text();
         }).get();
   
         var formData = $tr.children('td').map(function() {
            return $(this).text();
         }).get();
   
         console.log(SKU);
         console.log(formData);
         $('#updateSKU').val(SKU[0]);
         $('#updateName').val(formData[0]);
         $('#updateDesc').val(formData[1]);
         $('#updateQuantity').val(formData[2]);
         $('#updatePrice').val(formData[3]);
   
      });
   }
   
   showUpdateVals();

   // ajax form for update product
   $(function () {    
      $("#updateForm").submit(function (e) {
         e.preventDefault();
         var form_data = $(this).serialize(); 
         $.ajax({
            type: "POST", 
            url: "updateProduct.php",
            dataType: "json", // Add datatype
            data: form_data
         }).done(function (data) {
            if(data.status == true) {
               console.log(data);
               $('#updateModal').modal('hide');
               $('#' + data.SKU + ' .productName').html(data.name);
               $('#' + data.SKU + ' .productDesc').html(data.description);
               $('#' + data.SKU + ' .productQuantity').html(data.quantity);
               $('#' + data.SKU + ' .productPrice').html(data.price);
            } else {
               alert("nope")
            }
         }).fail(function (data) {
               console.log(data);
         });
      }); 
      });

   // show values in delete form
   function showDeleteVals() {
      $('.deleteBtn').on('click', function() {
         $tr = $(this).closest('tr');
         
         var SKU = $tr.children('th').map(function() {
            return $(this).text();
         }).get();
   
         var formData = $tr.children('td').map(function() {
            return $(this).text();
         }).get();
   
         console.log(SKU);
         console.log(formData);
         $('#deleteSKU').val(SKU[0]);
         $('#deleteName').val(formData[0]);
         $('#deleteDesc').val(formData[1]);
         $('#deleteQuantity').val(formData[2]);
         $('#deletePrice').val(formData[3]);
      });
   }

   showDeleteVals();   

   // ajax form for delete product
   $(function () {    
      $("#deleteForm").submit(function (e) {
         e.preventDefault();
         var form_data = $(this).serialize(); 
         $.ajax({
            type: "POST", 
            url: "deleteProduct.php",
            dataType: "json", // Add datatype
            data: form_data
         }).done((data) => {
            if(data.status == true) {
               console.log(data);
               $('#deleteModal').modal('hide');
               $('#' + data.SKU).remove();
            } else {
               alert("nope");
            }
         }).fail(function (data) {
               console.log(data);
         });
      }); 
      });

      