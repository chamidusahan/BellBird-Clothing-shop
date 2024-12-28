function changeView() {
  var signinBox = document.getElementById("signinBox");
  var signupBox = document.getElementById("signupBox");

  signinBox.classList.toggle("d-none");
  signupBox.classList.toggle("d-none");
}

function signup() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var form = new FormData();

  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("email", email.value);
  form.append("password", password.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      if (resp == "success") {
        window.location.reload();
      } else {
        document.getElementById("errorMsg2").innerHTML = resp;
        document.getElementById("errorMsgDiv2").classList.remove("d-none");
      }
    }
  };
  req.open("POST", "signup-process.php", true);
  req.send(form);
}

function signin() {
  var email = document.getElementById("em");
  var password = document.getElementById("pw");
  var rmb = document.getElementById("rmb");

  var form = new FormData();

  form.append("email", email.value);
  form.append("password", password.value);
  form.append("rmb", rmb.checked);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      if (resp == "success") {
        window.location = "index.php";
      } else {
        document.getElementById("errorMsg1").innerHTML = resp;
        document.getElementById("errorMsgDiv1").classList.remove("d-none");
      }
    }
  };

  req.open("POST", "signin-process.php", true);
  req.send(form);
}

function forgotPassword() {
  var email = document.getElementById("email");

  var req = new XMLHttpRequest();

  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Messege has been sent", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };

  req.open("GET", "forgot-password-process.php?email=" + email.value, true);
  req.send();
}

function resetPassword() {
  var pw = document.getElementById("pw");
  var cpw = document.getElementById("cpw");
  var vcode = document.getElementById("vcode");

  var form = new FormData();
  form.append("pw", pw.value);
  form.append("cpw", cpw.value);
  form.append("vcode", vcode.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;  
      if (resp == "success") {
        window.location = "signin.php";
      } else {
        alert(resp);
      }
    }
  };
  req.open("POST", "reset-password-process.php", true);
  req.send(form);
}

function adminSignIn() {
  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      if (request.responseText == "success") {
        window.location = "admin-dashboard.php";
      } else {
        document.getElementById("errorMsg").innerHTML = request.responseText;
        document.getElementById("errorMsgDiv").className = "d-block";
      }
    }
  };
  request.open("POST", "admin-signin-process.php", true);
  request.send(form);
}

function registerBrand() {
  var brand = document.getElementById("brandName");

  var form = new FormData();
  form.append("brand", brand.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Brand Registered successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "register-brand-process.php", true);
  req.send(form);
}
function showAlert(title, text, icon) {
  return Swal.fire({
    title: title,
    text: text,
    icon: icon,
    color: "#fff",
  });
}

function registerCategory() {
  var category = document.getElementById("catName");

  var form = new FormData();
  form.append("category", category.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert(
          "Success",
          "Category Registered successfully",
          "success"
        ).then(() => {
          window.location.reload();
        });
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "register-category-process.php", true);
  req.send(form);
}

function registerColor() {
  var color = document.getElementById("colorName");

  var form = new FormData();
  form.append("color", color.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Color Registered successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "register-color-process.php", true);
  req.send(form);
}

function registerSize() {
  var size = document.getElementById("sizeName");

  var form = new FormData();
  form.append("size", size.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Size Registered successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "register-size-process.php", true);
  req.send(form);
}

function registerProduct() {
  var name = document.getElementById("prodName");
  var desc = document.getElementById("prodDesc");
  var brand = document.getElementById("prodBrand");
  var category = document.getElementById("prodCategory");
  var brand = document.getElementById("prodBrand");
  var color = document.getElementById("prodColor");
  var size = document.getElementById("prodSize");
  var image = document.getElementById("prodImage");

  var form = new FormData();
  form.append("name", name.value);
  form.append("desc", desc.value);
  form.append("brand", brand.value);
  form.append("category", category.value);
  form.append("brand", brand.value);
  form.append("color", color.value);
  form.append("size", size.value);
  form.append("img", image.files[0]);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.response;
      if (resp == "success") {
        showAlert("Success", "Size Registered successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "register-product-process.php", true);
  req.send(form);
}
function loadUsers(page) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  };
  req.open("GET", "load-users-process.php?page=" + page, true);
  req.send();
}
function changeUserStatus(id, status) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open(
    "GET",
    "change-user-status-process.php?id=" + id + "&s=" + status,
    true
  );
  req.send();
}

function adminSignIn() {
  var email = document.getElementById("email");
  var password = document.getElementById("password");

  var form = new FormData();
  form.append("email", email.value);
  form.append("password", password.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      resp = req.responseText;
      if (resp == "success") {
        window.location = "admin-dashboard.php";
      } else {
        document.getElementById("msg").innerHTML = resp;
        document.getElementById("msgDiv").className = "d-block mt-3";
      }
    }
  };

  req.open("POST", "admin-signin-process.php", true);
  req.send(form);
}
function printReport() {
  var content = document.body.innerHTML;
  var printArea = document.getElementById("printArea");

  document.body.innerHTML = printArea.innerHTML;

  window.print();

  document.body.innerHTML = original;
}

function loadProducts(page) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  };
  req.open("GET", "load-products-process.php?page=" + page, true);
  req.send();
}

function changeProductStatus(id) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open("GET", "change-product-status-process.php?id=" + id, true);
  req.send();
}

function addStock() {
  var product = document.getElementById("product");
  var qty = document.getElementById("qty");
  var price = document.getElementById("unitPrice");

  var form = new FormData();
  form.append("product", product.value);
  form.append("qty", qty.value);
  form.append("price", price.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      if (resp == "success") {
        showAlert("Success", "Stock Updated successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "add-stock-process.php", true);
  req.send(form);
}

function loadStock(page) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  };
  req.open("GET", "load-stock-process.php?page=" + page, true);
  req.send();
}
function changeStockStatus(id) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        window.location.reload();
      } else {
        alert(resp);
      }
    }
  };
  req.open("GET", "change-stock-status-process.php?id=" + id, true);
  req.send();
}
function loadProdUpdateData(id) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      var data = JSON.parse(resp);

      document.getElementById("uProdId").value = data.id;
      document.getElementById("uProdName").value = data.name;
      document.getElementById("uProdDesc").value = data.description;
      document.getElementById("uProdCategory").value = data.cat_id;
      document.getElementById("uProdBrand").value = data.brand_id;
      document.getElementById("uProdColor").value = data.color_id;
      document.getElementById("uProdSize").value = data.size_id;
      document.getElementById("uProdImgTag").src = data.img;

      new bootstrap.Modal("#updateProductModel").show();
    }
  };
  req.open("GET", "get-product-details.php?id=" + id, true);
  req.send();
}

function loadStockUpdateData(id) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      var data = JSON.parse(resp);

      document.getElementById("uStkId").value = data.id;
      document.getElementById("stkPrice").value = data.price;
      document.getElementById("stkQty").value = data.qty;

      new bootstrap.Modal("#updateStockModel").show();
    }
  };
  req.open("GET", "get-stock-details.php?id=" + id, true);
  req.send();
}
function updateProduct() {
  var id = document.getElementById("uProdId");
  var name = document.getElementById("uProdName");
  var desc = document.getElementById("uProdDesc");
  var cat = document.getElementById("uProdCategory");
  var brand = document.getElementById("uProdBrand");
  var size = document.getElementById("uProdSize");
  var color = document.getElementById("uProdColor");
  var image = document.getElementById("uProdImage");

  var form = new FormData();
  form.append("id", id.value);
  form.append("name", name.value);
  form.append("desc", desc.value);
  form.append("cat", cat.value);
  form.append("brand", brand.value);
  form.append("color", color.value);
  form.append("size", size.value);

  form.append("image", image.files[0]);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Product Updated successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "update-product-process.php", true);
  req.send(form);
}

function updateProfileImg() {
  var profileImg = document.getElementById("profileImg");

  var form = new FormData();
  form.append("img", profileImg.files[0]);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert(
          "Success",
          "Profile Image Updated successfully",
          "success"
        ).then(() => {
          window.location.reload();
        });
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "upload-profile-img-process.php", true);
  req.send(form);
}

function updateProfile() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var mobile = document.getElementById("mobile").value;
  var address = document.getElementById("address").value;
  var address2 = document.getElementById("address2").value;
  var district = document.getElementById("district").value;
  var city = document.getElementById("city").value;
  var zcode = document.getElementById("zcode").value;

  var form = new FormData();
  form.append("fname", fname);
  form.append("lname", lname);
  form.append("mobile", mobile);
  form.append("address", address);
  form.append("address2", address2);
  form.append("district", district);
  form.append("city", city);
  form.append("zcode", zcode);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Profile Updated successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("POST", "update-user-profile-process.php", true);
  req.send(form);
}

function search(page) {
  var search = document.getElementById("search");
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;

      document.getElementById("content").innerHTML = resp;
    }
  };
  req.open(
    "GET",
    "search-products-process.php?search=" + search.value + "&page=" + page,
    true
  );
  req.send();
}

function filter(page) {
  var category = document.getElementById("category");
  var brand = document.getElementById("brand");
  var size = document.getElementById("size");
  var color = document.getElementById("color");
  var priceFrom = document.getElementById("priceFrom");
  var priceTo = document.getElementById("priceTo");
  var search = document.getElementById("search");

  var form = new FormData();
  form.append("category", category.value);
  form.append("brand", brand.value);
  form.append("size", size.value);
  form.append("color", color.value);
  form.append("priceFrom", priceFrom.value);
  form.append("priceTo", priceTo.value);
  form.append("search", search.value);
  form.append("page", page);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  };
  req.open("POST", "filter-products-process.php", true);
  req.send(form);
}

function loadCart() {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      document.getElementById("content").innerHTML = resp;
    }
  };
  req.open("GET", "load-cart-process.php", true);
  req.send();
}

function addToCart(stock) {
  document.getElementById("qty");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Product Added To Cart successfully", "success").then(
          () => {
            window.location.reload();
          }
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }

  };
  req.open("GET","add-to-cart-process.php?stock=" + stock + "&qty=" + qty.value,true);
  req.send();
}
function incrementCartQty(cartId) {
  var qty = document.getElementById("qty-" + cartId);

  var newQty = parseInt(qty.value) + 1;

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        loadCart();
        window.location.reload();
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("GET","update-cart-qty-process.php?id=" + cartId + "&qty=" + newQty,true);
  req.send();
}

function decrementCartQty(cartId) {
  var qtyE = document.getElementById("qty-" + cartId);
  var qty = parseInt(qtyE.value);

  if (qty <= 1) {
    showAlert("Warning", "Quantity must be at least 1", "warning");
  } else {
    var newQty = qty - 1;

    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
      if (req.readyState == 4 && req.status == 200) {
        var resp = req.responseText;
        if (resp == "success") {
          loadCart();
          window.location.reload();
        } else {
          showAlert("Error", resp, "error");
        }
      }
    };
    req.open("GET", "update-cart-qty-process.php?id=" + cartId + "&qty=" + newQty, true);
    req.send();
  }
}

function removeFromCart(cartId) {
  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      if (resp == "success") {
        showAlert("Success", "Cart Item Removed Successfully!", "success").then(
          loadCart
        );
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open("GET", "remove-from-cart-process.php?id=" + cartId, true);
  req.send();
}

function checkout() {

  var form = new FormData();
  form.append("cart", true);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
      if (req.readyState == 4 && req.status == 200) {
          var json = req.responseText;
          var resp = JSON.parse(json);
         
          if (resp.status == "success") {
              doCheckout(resp.payment, "checkout-process.php")
          } else {
              showAlert("Warning", resp.error, "warning");
          }
      }
  }
  req.open("POST", "payment-process.php", true);
  req.send(form);
}

function doCheckout(payment, url) {

  payhere.onCompleted = function onCompleted(orderId) {

      showAlert("Success", "Payment completed. OrderID:" + orderId, "success");

      var form = new FormData();
      form.append("payment", JSON.stringify(payment));

      var req = new XMLHttpRequest();
      req.onreadystatechange = function name() {
          if (req.readyState == 4 && req.status == 200) {
              var json = req.responseText;             
              var resp = JSON.parse(json);

              if (resp.status == "success") {
                  showAlert("Success", "Order Success!", "success").then(() => {
                      window.location.href = "invoice.php?id=" + resp.ohId;
                  })
              } else {
                  showAlert("Error", resp.error, "error");
              }
          }
      }
      req.open("POST", url, true);
      req.send(form);

  };

  payhere.onDismissed = function onDismissed() {
      showAlert("Warning", "Payment dismissed", "warning");
  };

  payhere.onError = function onError(error) {
      showAlert("Error", error, "error");
  };

  payhere.startPayment(payment);

}

function buyNow(stockId) {

  var qty = document.getElementById("qty");

  if (qty.value > 0) {

      var form = new FormData();
      form.append("cart", false);
      form.append("stockId", stockId);
      form.append("qty", qty.value);

      var req = new XMLHttpRequest();
      req.onreadystatechange = function name() {
          if (req.readyState == 4 && req.status == 200) {
              var json = req.responseText;
              var resp = JSON.parse(json);

              console.log(resp);

              if (resp.status == "success") {
                  resp.payment.stock_id = stockId;
                  resp.payment.qty = qty.value;
                  doCheckout(resp.payment, "buy-now-process.php");
              } else {
                  showAlert("Warning", resp.error, "warning");
              }
          }
      }
      req.open("POST", "payment-process.php", true);
      req.send(form);

  } else {
      showAlert("Warning", "Quantity cannot be less than 1", "warning");
  }
}


function submitFeedback() {
  var c1 = document.getElementById('comments');
  var c2 = document.getElementById('comments2');

 var form = new FormData();
  form.append("comments",c1.value );
  form.append("comments2", c2.value);

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      
      if (resp == "success") {
        showAlert("Success", "Submitted Successfully!", "success");
      } else {
        showAlert("Error", resp, "error");
      }
    }
  };
  req.open('POST', 'submit-feedback.php', true); 
  req.send(form);
}

function loadChart() {
  var chart1 = document.getElementById("myChart");

  var req = new XMLHttpRequest();
  req.onreadystatechange = function () {
    if (req.readyState == 4 && req.status == 200) {
      var resp = req.responseText;
      var json = JSON.parse(resp);

      console.log(json);

      new Chart(chart1, {
        type: "line",
        data: {
          labels: json.labels,
          datasets: [
            {
              label: "# of Quantities",
              data: json.data,
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  };
  req.open("GET", "load-chart-process.php", true);
  req.send();
}