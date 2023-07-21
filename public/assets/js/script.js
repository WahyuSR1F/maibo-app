function showAlert (pesan){
    //menampilkan aletrt functional
    alert(pesan);
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