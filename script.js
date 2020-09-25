
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
               $('#productsTable').append('<tr id="' + data.SKU_Code + '"><th scope="row">' + data.SKU_Code + '</th><td class="productName">' + data.name + '</td><td class="productDesc">' + data.description + '</td><td class="productQuantity">' + data.quantity + '</td><td class="productPrice">' + data.price + '</td><td><input type="button" class="btn btn-primary btn-lg updateBtn" value="Edit" data-toggle="modal" data-target="#updateModal"></td><td><input type="button" class="btn btn-primary btn-lg deleteBtn" value="Delete" data-toggle="modal" data-target="#deleteModal"></td></tr>');

           } else {
               alert("nope")
           }
      }).fail(function (data) {
            console.log(data);
      });
   }); 
   });

   // show values in update form
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

   // ajax form for update product
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

      