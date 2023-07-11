//let submit = document.getElementById("submit")
let email = document.getElementById("email").value
submit.addEventListener("click", function (e) {
    e.preventDefault()
    axios.post("{{route('newsletter.post')}}", {
        email: document.getElementById("email").value,
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
})