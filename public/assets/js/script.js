function showAlertDelete (url,id){
  Swal.fire({
    title: 'Are you sure?',
    text: "semua data yang berhubungan dengan data ini akan otomatis terhapus !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if (result.isConfirmed) {
        // Jika pengguna mengklik "Yes, delete it!"
        // Kirim permintaan GET ke server dengan parameter khusus untuk penghapusan data
        window.location.href = url+`/${id}`;
    }
});
}

function showAlertCreate (){
  Swal.fire({
    title: 'Apa Kamu yakin?',
    text: "Data Kampus baru akan segerah ditambahakan",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Simpan'
}).then((result) => {
    if (result.isConfirmed) {
        // Jika pengguna mengklik "Yes, delete it!"
        // Kirim permintaan GET ke server dengan parameter khusus untuk penghapusan data
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data mu akan ditambahkan',
          showConfirmButton: false,
          timer: 1500
        })
          document.getElementById('form-create').submit();
    }
});
}

function showAlertEdit (){
  Swal.fire({
    title: 'Are you sure?',
    text: "Data kamu akan diedit",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Simpan Perubahan'
}).then((result) => {
    if (result.isConfirmed) {
        // Jika pengguna mengklik "Yes
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Data mu akan ditambahkan',
          showConfirmButton: false,
          timer: 1500
        })
        // Kirim permintaan GET ke server dengan parameter khusus untuk penghapusan data
        document.getElementById('form-edit').submit();
    }
});
}

function loading (){
  let timerInterval
  Swal.fire({
  title: 'Loading',
  html: 'Take data<b></b> milliseconds.',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('Take data')
  }
})
}


// Fungsi untuk memuat ulang konten setelah jangka waktu tertentu (dalam milidetik)
function reloadContent() {
  setTimeout(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("reload-ajax").innerHTML = this.responseText;
        reloadContent(); // Memulai pembaruan berikutnya
      }
    };
    xhttp.open("GET", "path/to/your/file.html", true); // Ganti dengan URL atau path ke file yang memuat konten yang diperbarui
    xhttp.send();
  }, 5000); // Pembaruan setiap 5 detik (5000 milidetik)
}

// Panggil fungsi reloadContent saat halaman dimuat
window.onload = reloadContent;

function gantiKonten (){
  $.get("{{ url('page.ajax_containt}}", {}, function(data, status){
    $("#konten").html(data);
  })
}


function showAlertAddAnggota (url,id){
  Swal.fire({
    title: 'Are you sure?',
    text: "anggota baru akan ditambahkan!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((result) => {
    if (result.isConfirmed) {
        // Jika pengguna mengklik "Yes, delete it!"
        // Kirim permintaan GET ke server dengan parameter khusus untuk penghapusan data
        window.location.href = url+`/${id}`;
    }
});
}