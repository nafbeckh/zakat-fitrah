const deleteRow = (id) => {
  let form = document.getElementById("formDelete");
  let input = document.getElementById("id");

  let result = confirm("Apakah anda ingin menghapus data ini?");

  if (result) {
    input.value = id
    form.submit()
  }
}

const logout = (id) => {
  let form = document.getElementById("formLogout");
  let input = document.getElementById("logout");
  form.submit()
}
