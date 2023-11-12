const deleteRow = (id) => {
  let form = document.getElementById('formDelete')
  let input = document.getElementById('id')

  let result = confirm('Apakah anda ingin menghapus data ini?')

  if (result) {
    input.value = id
    form.submit()
  }
}

const logout = (id) => {
  let form = document.getElementById('formLogout')
  let input = document.getElementById('logout')
  form.submit()
}

const jenisBayar = () => {
  const select = document.getElementById('jenis_bayar')
  const beras = document.getElementById("Beras")
  const tunai = document.getElementById("Tunai")

  if (select.value == "") {
    beras.style = 'display: none'
    tunai.style = 'display: none'
  }

  if (select.value == "Beras") {
    beras.style = 'display: block'
    beras.setAttribute('require', 'require')

    tunai.style = 'display: none'
    tunai.removeAttribute('require')
  }

  if (select.value == "Tunai") {
    tunai.style = 'display: block'
    tunai.setAttribute('require', 'require')

    beras.style = 'display: none'
    beras.removeAttribute('require')
  }
}
