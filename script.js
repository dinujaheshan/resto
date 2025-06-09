function signUp() {
    //alert("ok");

    var fn = document.getElementById("fname");
    var ln = document.getElementById("lname");
    var e = document.getElementById("email");
    var pw = document.getElementById("password");
    var m = document.getElementById("mobile");
    var g = document.getElementById("gender");

    var f = new FormData();
    f.append("fname", fn.value);
    f.append("lname", ln.value);
    f.append("email", e.value);
    f.append("password", pw.value);
    f.append("mobile", m.value);
    f.append("gender", g.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "success") {

                alert("Success");
                window.location.reload();

            } else {
             alert(t);
               

            }

        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(f);
}



function signin() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "index.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "signinProcess.php", true);
    r.send(f);
}

function signout(){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;

            if(t == "success"){

                window.location="index.php";

            }else{
                alert (t);
            }
        }
    }

    r.open("GET","signoutProcess.php",true);
    r.send();
    
}

function forgotPassword() {


    // var m = document.getElementById("forgotPasswordModal");
    //bm = new bootstrap.Modal(m);
    //bm.show();

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "Success") {

                alert("Verification Code Has Sent To your Email. Please Check Your Inbox");

                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();

            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();


}

function togglePassword() {

    //alert("ok");

    var np = document.getElementById("np");
    var eye = document.getElementById("e1");

    if (np.type == "password") {
        np.type = "text";
        eye.className = "fa fa-eye-slash";
    } else {
        np.type = "password";
        eye.className = "fa fa-eye";
    }

}
function togglePassword2() {

    //alert("ok");

    var rnp = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (rnp.type == "password") {
        rnp.type = "text";
        eye.className = "fa fa-eye-slash";
    } else {
        rnp.type = "password";
        eye.className = "fa fa-eye";
}

}

function resetPassword() {

    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var f = new FormData();
    f.append("e", email.value);
    f.append("np", np.value);
    f.append("rnp", rnp.value);
    f.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "success") {

                bm.hide();
                alert("Your password has been updated.");
                window.location.reload();

            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "resetPasswordProcess.php", true);
    r.send(f);

}

function bookTable(){
    //alert("ok");
    
    var first_name = document.getElementById("fname");
    var last_name = document.getElementById("lname");
    var mobile_no = document.getElementById("mobile");
    var email_address = document.getElementById("email");
    var persons = document.getElementById("person");
    var date_booking = document.getElementById("date");

   var f = new FormData();
   f.append("fn",first_name.value);
   f.append("ln",last_name.value);
   f.append("mn",mobile_no.value);
   f.append("ea", email_address.value);
   f.append("p",persons .value);
   f.append("d",date_booking.value);

   var r = new XMLHttpRequest();

   r.onreadystatechange = function(){
      if(r.status == 200 && r.readyState ==  4){
        var t = r.responseText;

        if(t == "Success"){
              alert("Successfully booked!");   
              window.location.reload();
        }else{
            alert(t);
        }
      }
   }
       r.open("POST","bookingTableProcess.php",true);
       r.send(f);

}

function basicSearch(x) {
    //alert("ok");
    var text = document.getElementById("kw").value;
    var select = document.getElementById("c").value;
    

    var f = new FormData();
    f.append("t", text);
    f.append("s", select);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
       if (r.status == 200 && r.readyState == 4) {
           var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);
}

function updateProfile(){

  

    var profile_img = document.getElementById("profileimage");
    var first_name = document.getElementById("fname");
    var last_name = document.getElementById("lname");
    var mobile_no = document.getElementById("mobile");
    var password = document.getElementById("pw");
    var email_address = document.getElementById("email");
    var address_line_1 = document.getElementById("line1");
    var address_line_2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postal_code = document.getElementById("pc");
  

    var f = new FormData();
    f.append("img",profile_img.files[0]);
    f.append("fn",first_name.value);
    f.append("ln",last_name.value);
    f.append("mn",mobile_no.value);
    f.append("pw",password.value);
    f.append("ea",email_address.value);
    f.append("al1",address_line_1.value);
    f.append("al2",address_line_2.value);
    f.append("p",province.value);
    f.append("d",district.value);
    f.append("c",city.value);
    f.append("pc",postal_code.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;

            if(t == "success"){
                
                 window.location = "index.php";
            }else{
                alert (t);
            }
            
        }
    }

    r.open("POST","userProfileUpdateProcess.php",true);
    r.send(f);
    
}


function changeImage() {
  var view = document.getElementById("viewimg");
  var file = document.getElementById("profileimage");

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  }
}

function addToCart(id) {

    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
      if (r.status == 200 && r.readyState == 4) {
        var t = r.responseText;
        alert(t);
      }
    };
  
    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();
  
  }

function deleteFromCart(id){

    //alert("ok");
    var  r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;

            if(t == "deleted"){
             alert("Product Removed from cart");
                window.location.reload();
            }else{
               alert (t);
           }
       }
    }

    r.open("GET","deleteFromCart.php?id="+id,true);
    r.send();

}


function addToWatchlist(id){

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            if(t == "Added"){
                alert ("Product added to the watchlist successfully.");
                window.location.reload();
            }else if(t == "Removed"){
                alert ("Product removed from watchlist successfully.");
              
            }else{
                alert(t);
            }
            
        }
    }

    r.open("GET","addWatchListProcess.php?id="+id,true);
    r.send();

}



function removeFromWatchlist(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.status == 200 && r.readyState == 4){
            var t = r.responseText;
            if(t == "Deleted"){
                alert ("Product removed from watchlist successfully.");
                window.location.reload();
            }else{
                alert(t);
            }
            
            
        }
    }

    r.open("GET","removeFromWatchListProcess.php?id="+id,true);
    r.send();
}

function payNow(pid) {

    var qty = document.getElementById("qty_input").value;
  
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if (r.status == 200 && r.readyState == 4) {
        var t = r.responseText;
        //alert(t);
        var obj = JSON.parse(t);
  
        var umail = obj["umail"];
        var amount = obj["amount"];
  
        if (t == "1") {
  
          alert("Please Log In or Sign up");
          window.location = "index.php";
  
        } else if (t == "2") {
  
          alert("Please Update your Profile First");
          window.location = "userProfile.php";
  
        } else {
  
          // Payment completed. It can be a successful failure.
          payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            //window.location = "invoice.php";
  
            saveInvoice(orderId, pid, umail, amount, qty);
  
            // Note: validate the payment and show success or failure page to the customer
          };
  
          // Payment window closed
          payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
          };
  
          // Error occurred
          payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:" + error);
          };
  
          // Put the payment variables here
          var payment = {
            "sandbox": true,
            "merchant_id": "1224797",    // Replace your Merchant ID
            "return_url": "http://localhost/eshop/singleProductView.php?id=" + pid, // Important
            "cancel_url": "http://localhost/eshop/singleProductView.php?id=" + pid, // Important
            "notify_url": "http://sample.com/notify",
            "order_id": obj["id"],
            "items": obj["item"],
            "amount": amount,
            "currency": "LKR",
            "hash": obj["hash"], // *Replace with generated hash retrieved from backend
            "first_name": obj["fname"],
            "last_name": obj["lname"],
            "email": umail,
            "phone": obj["mobile"],
            "address": obj["address"],
            "city": obj["city"],
            "country": "Sri Lanka",
            "delivery_address": obj["address"],
            "delivery_city": obj["city"],
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
          };
  
          // Show the payhere.js popup, when "PayHere Pay" is clicked
          //document.getElementById('payhere-payment').onclick = function (e) {
          payhere.startPayment(payment);
          //};
  
        }
      }
    }
  
    r.open("GET", "buyNowProcess.php?id=" + pid + "&qty=" + qty, true);
    r.send();
  
  }
  function saveInvoice(orderId, pid, umail, amount, qty) {

    var f = new FormData();
    f.append("o", orderId);
    f.append("i", pid);
    f.append("m", umail);
    f.append("a", amount);
    f.append("q", qty);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
  
      if (r.readyState == 4) {
  
        var t = r.responseText;
        if (t == 1) {
  
          window.location = "invoice.php?id=" + orderId;
  
        } else {
  
          alert(t);
  
        }
  
      }
  
    }
  
    r.open("POST", "saveInvoice.php", true);
    r.send(f);
  
  }

  var av;

  function adminVerification() {
  
    var email = document.getElementById("e");
  
    var f = new FormData();
  
    f.append("e", email.value);
  
    var r = new XMLHttpRequest();
  
    r.onreadystatechange = function () {
  
      if (r.readyState == 4) {
  
        var t = r.responseText;
  
        if (t == "success") {
  
          var m = document.getElementById("verificationModal");
          av = new bootstrap.Modal(m);
          av.show();
  
        } else {
  
          alert(t);
  
        }
  
      }
  
    }
  
    r.open("POST", "adminVerificationProcess.php", true);
    r.send(f);
  
  }
function verify() {

  var verification = document.getElementById("vcode");

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4) {

      var t = r.responseText;

      if (t == "success") {

        av.hide();
        window.location = "adminPanel.php";

      } else {

        alert(t);

      }

    }

  }

  r.open("GET", "verificationProcess.php?v=" + verification.value, true);
  r.send();

}

function printInvoice() {

  var restorepage = document.body.innerHTML;
  var page = document.getElementById("page").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = restorepage;
;
}

function adminsignout(){

  var r = new XMLHttpRequest();

  r.onreadystatechange = function(){
      if(r.readyState == 4 && r.status == 200){
          var t = r.responseText;

          if(t == "success"){

              window.location="adminSignIn.php";

          }else{
              alert (t);
          }
      }
  }

  r.open("GET","signoutProcess.php",true);
  r.send();
  
}

function blockUser(email) {

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {

    if (r.readyState == 4) {

      var t = r.responseText;

      if (t == "blocked") {

        window.location.reload();

      } else {

        alert(t);

      } if (t == "unblocked") {

        window.location.reload();

      } else {

        alert(t);

      }

    }

  }

  r.open("GET", "userBlockProcess.php?email=" + email, true);
  r.send();

}

  
function blockProduct(id) {

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("pb" + id).innerHTML = "Unblock";
        document.getElementById("pb" + id).classList = "btn btn-success";
      } else if (txt == "unblocked") {
        document.getElementById("pb" + id).innerHTML = "Block";
        document.getElementById("pb" + id).classList = "btn btn-danger";
      } else {
        alert(txt);
      }
    }
  }

  request.open("GET", "productBlockProcess.php?id=" + id, true);
  request.send();

}


function searchInvoiceId(){
  var txt = document.getElementById("searchtxt").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function (){
    if(r.readyState == 4){
      var t = r.responseText;

      document.getElementById("viewArea").innerHTML = t;

    }
  }
  r.open("GET","searchInvoiceIdProcess.php?id=" + txt,true);
  r.send();

  
}