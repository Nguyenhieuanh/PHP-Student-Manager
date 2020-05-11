// function checkUsername(username) {
//     let pattern = new RegExp(/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/);
//     return pattern.test(username);
// }
//
// function checkId(id) {
//     let length = id.length;
//     if (length === 0) {
//         return false;
//     } else {
//         return true;
//     }
// }
//
// function checkEmail(email) {
//     let pattern = new RegExp(/^[A-Za-z0-9]+[A-Za-z0-9.]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/);
//     return pattern.test(email);
// }
//
// function checkPhone(phone) {
//     let pattern = new RegExp(/^0(32|33|34|35|36|37|38|39|96|97|98|86|81|82|83|84|85|88|91|94|70|76|77|78|79|89|90|93)+[0-9]{7}$/);
//     return pattern.test(phone);
// }
//
// function checkPassword(password) {
//     let pattern = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/);
//     return pattern.test(password);
// }
//
// $(function () {
//     let isErr = false;
//
//     $('#username').focusout(function () {
//         let username = $(this).val();
//         if (!checkUsername(username)) {
//             isErr = true;
//             $('.userErr').html("Username from 8 - 20 characters not include special characters");
//         } else {
//             $('.userErr').html("");
//         }
//     })
//
//     $('#studentId').focusout(function () {
//         let id = $(this).val().trim();
//         if (!checkId(id)) {
//             isErr = true;
//             $('.idErr').html("Please input your student ID");
//         } else {
//             $('.idErr').html("");
//         }
//     })
//
//     $('#email').focusout(function () {
//         let email = $(this).val();
//         if (!checkEmail(email)) {
//             isErr = true;
//             $('.emailErr').html("Email is required john.smith@example.com.");
//         } else {
//             $('.emailErr').html("");
//         }
//     })
//
//     $('#phone').focusout(function () {
//         let phone = $(this).val();
//         if (!checkPhone(phone)) {
//             isErr = true;
//             $('.phoneErr').html("Your phone number is not from Viettel, Vinaphone or Mobiphone");
//         } else {
//             $('.phoneErr').html("");
//         }
//     })
//
//     $('#password').focusout(function () {
//         let password = $(this).val();
//         if (!checkPassword(password)) {
//             isErr = true;
//             $('.pswErr').html("Username from 8 - 20 characters not include special characters");
//         } else {
//             $('.pswErr').html("");
//         }
//     })
//
//     $('#re_psw').focusout(function () {
//         let re_psw = $(this).val();
//         let psw = $('#password').val();
//         if (re_psw !== psw) {
//             isErr = true;
//             $('.retypeErr').html('Passwords miss match');
//         } else {
//             $('.retypeErr').html("");
//         }
//     })
//
//     if (isErr === true) {
//         $('#register-form').submit(function () {
//             return false;
//         })
//     } else{
//         $('#register-form').submit(function () {
//             return true;
//         })
//     }
//
// })