//// Show Password /////

function showPassword1() {
  var x = document.getElementById("password1");
  if (x.type === "password") {
    x.type = "text";
    $('#icon1').removeClass('fa-eye-slash');
    $('#icon1').addClass('fa-eye');
  } else {
    x.type = "password";
    $('#icon1').removeClass('fa-eye');
    $('#icon1').addClass('fa-eye-slash');
  }
}

function showPassword2() {
  var x = document.getElementById("password2");
  if (x.type === "password") {
    x.type = "text";
    $('#icon2').removeClass('fa-eye-slash');
    $('#icon2').addClass('fa-eye');
  } else {
    x.type = "password";
    $('#icon2').removeClass('fa-eye');
    $('#icon2').addClass('fa-eye-slash');
  }
}

//// Form Validasi /////

function daftar_form() {
  let nama = document.forms["fdaftar"]["nama"].value;
  let alamat = document.forms["fdaftar"]["alamat"].value;
  let nim = document.forms["fdaftar"]["nim"].value;
  let nohp = document.forms["fdaftar"]["nohp"].value;
  let email = document.forms["fdaftar"]["email"].value;
  let password = document.forms["fdaftar"]["password"].value;
  if (nim == "") {

    //console.log("ini")
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Nim harus di isi ya'
    });
    return false;
  } else if (nama == "") {
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Nama harus di isi ya'
    });
    return false;
  } else if (alamat == "") {
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Alamat harus di isi ya'
    });
    return false;
  } else if (nohp == "") {
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'NoHp harus di isi ya'
    });
    return false;
  } else if (password == "") {
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Password harus di isi ya'
    });
    return false;
  } else if (email == "") {
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Email Harus di isi ya'
    });
    return false;
  }

}

function login_mhs() {
  let nim = document.forms["mhs_login"]["nim"].value;
  let password = document.forms["mhs_login"]["password"].value;
  console.log("ini")
  if (nim == "") {
    //console.log("ini")
    Swal.fire({
      icon: 'warning',
      text: 'Nim harus di isi ya',
      timer: 4000
    });
    return false;
  } else if (password == "") {
    Swal.fire({
      icon: 'warning',
      text: 'password harus di isi ya',
      timer: 4000
    });
    return false;
  }
}

function login_s() {
  let username = document.forms["s_login"]["username"].value;
  let password = document.forms["s_login"]["password"].value;

  if (username == "") {
    //console.log("ini")
    Swal.fire({
      icon: 'warning',
      text: 'Username harus di isi ya',
      timer: 4000
    });
    return false;
  } else if (password == "") {
    Swal.fire({
      icon: 'warning',
      text: 'password harus di isi ya',
      timer: 4000
    });
    return false;
  }
}




/////////// Sweet Alert /////////////

$(document).ready(function () {
  $("#basic").click(function () {
    Swal.fire('Ini adalah sweetalert Basic');
  });

  $("#animate").click(function () {
    Swal.fire({
      title: 'Custom animation with Animate.css',
      animation: false,
      customClass: 'animated tada'
    })
  });

  $("#DaftarSuccess").click(function () {
    Swal.fire(
      'Berhasil Mendaftar',
      '',
      'success'
    )
  });

  $("#withFooter").click(function () {
    Swal.fire({
      type: 'error',
      title: 'Oops...',
      text: 'Something went wrong!',
      footer: '<a href="https://dewankomputer.com/">Why do I have this issue?</a>'
    });
  });

  $("#tallImage").click(function () {
    Swal.fire({
      imageUrl: 'https://placeholder.pics/svg/300x1500',
      imageHeight: 1500,
      imageAlt: 'A tall image'
    })
  });

  $("#customHtml").click(function () {
    Swal.fire({
      title: '<strong>HTML <u>example</u></strong>',
      type: 'info',
      html:
        'You can use <b>bold text</b>, ' +
        '<a href="//github.com">links</a> ' +
        'and other HTML tags',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText:
        '<i class="fa fa-thumbs-up"></i> Great!',
      confirmButtonAriaLabel: 'Thumbs up, great!',
      cancelButtonText:
        '<i class="fa fa-thumbs-down"></i>',
      cancelButtonAriaLabel: 'Thumbs down',
    })
  });

  $("#kananAtas").click(function () {
    Swal.fire({
      position: 'top-end',
      type: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
  });

  $("#kananBawah").click(function () {
    Swal.fire({
      position: 'bottom-end',
      type: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
  });

  $("#kiriBawah").click(function () {
    Swal.fire({
      position: 'bottom-start',
      type: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
  });

  $("#kiriAtas").click(function () {
    Swal.fire({
      position: 'top-start',
      type: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
  });

  $("#confirm").click(function () {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  });

  $("#confirm2").click(function () {
    const swalWithBootstrapButtons = Swal.mixin({
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        swalWithBootstrapButtons.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    })
  });

  $("#image").click(function () {
    Swal.fire({
      title: 'Sweet!',
      text: 'Modal with a custom image.',
      imageUrl: 'https://unsplash.it/400/200',
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: 'Custom image',
      animation: false
    })
  });

  $("#custom").click(function () {
    Swal.fire({
      title: 'Custom width, padding, background.',
      width: 600,
      padding: '3em',
      background: '#fff url(trees.png)',
      backdrop: `
            rgba(0,0,123,0.4)
            url("nyan-cat.gif")
            center left
            no-repeat
          `
    })
  });

  $("#timer").click(function () {
    let timerInterval
    Swal.fire({
      title: 'Auto close alert!',
      html: 'I will close in <strong></strong> seconds.',
      timer: 2000,
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
          Swal.getContent().querySelector('strong')
            .textContent = Swal.getTimerLeft()
        }, 100)
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        result.dismiss === Swal.DismissReason.timer
      ) {
        console.log('I was closed by the timer')
      }
    })
  });

  $("#ajax").click(function () {
    Swal.fire({
      title: 'Submit your Github username',
      input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'Look up',
      showLoaderOnConfirm: true,
      preConfirm: (login) => {
        return fetch(`//api.github.com/users/${login}`)
          .then(response => {
            if (!response.ok) {
              throw new Error(response.statusText)
            }
            return response.json()
          })
          .catch(error => {
            Swal.showValidationMessage(
              `Request failed: ${error}`
            )
          })
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  });

  $("#chain").click(function () {
    Swal.mixin({
      input: 'text',
      confirmButtonText: 'Next &rarr;',
      showCancelButton: true,
      progressSteps: ['1', '2', '3']
    }).queue([
      {
        title: 'Question 1',
        text: 'Chaining swal2 modals is easy'
      },
      'Question 2',
      'Question 3'
    ]).then((result) => {
      if (result.value) {
        Swal.fire({
          title: 'All done!',
          html:
            'Your answers: <pre><code>' +
            JSON.stringify(result.value) +
            '</code></pre>',
          confirmButtonText: 'Lovely!'
        })
      }
    })
  });

  $("#mixin").click(function () {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    Toast.fire({
      type: 'success',
      title: 'Signed in successfully'
    })
  });

  $("#animateDemo").click(function () {
    var animasi = $('#animasi').val();

    Swal.fire({
      title: 'Custom animation with Animate.css',
      animation: false,
      customClass: 'animated ' + animasi
    })
  });
});