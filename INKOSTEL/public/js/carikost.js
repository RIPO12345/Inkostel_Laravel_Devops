// untuk mengembalikan data card setelah pencarian
document.addEventListener("DOMContentLoaded", function () {
  // Bersihkan nilai pencarian jika tidak ada kata kunci pencarian
  const searchInput = document.getElementById('searchInput');
  if (!searchInput.value) {
      searchInput.value = '';
  }
});


// convert harga
document.addEventListener("DOMContentLoaded", function() {
    var cardText1Elements = document.querySelectorAll('.card-text1');
    cardText1Elements.forEach(function(cardText1Element) {
        var hargaValue = parseFloat(cardText1Element.getAttribute('data-harga'));
        cardText1Element.textContent = formatHarga(hargaValue);
    });
});


// Fungsi untuk mengonversi harga
function formatHarga(harga) {
  if (harga >= 1000000) {
    return (harga / 1000000)+ " jt/thn";
  } else {
      return harga + " /thn";
  }
}


// convert nilai terdekat
var cardText2Elements = document.querySelectorAll('.card-text2');
cardText2Elements.forEach(function(cardText2Element) {
  var cardText2Value = parseFloat(cardText2Element.textContent);
  // Memeriksa dan mengupdate nilai sesuai kondisi
    if (cardText2Value >= 1000) {
      cardText2Element.textContent = (cardText2Value / 1000) + " KM";
    } else {
      cardText2Element.textContent = cardText2Value + " Meter";
    }
});


document.addEventListener("DOMContentLoaded", function () {
  // Ambil semua tombol filter
  const filterButtons = document.querySelectorAll('.filter-button .btn');

  // Tambahkan event listener pada setiap tombol filter
  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      const filterType = button.getAttribute('data-filter');
      // Lakukan pemfilteran berdasarkan jenis filter
      const cardItems = document.querySelectorAll('#coba');

      cardItems.forEach(card => {
        const cardData = {
          harga: parseFloat(card.querySelector('.card-text1').getAttribute('data-harga')),
          jarak: parseInt(card.querySelector('.card-text2').textContent),
          jenis: card.querySelector('.card-title').textContent.toLowerCase(),
        };

        if (filterType === 'semua' ||
          (filterType === 'terdekat' && cardData.jarak > 100 && cardData.jarak < 1000) ||
          (filterType === 'termurah' && cardData.harga <= 5000000) ||
          (filterType === 'putra' && cardData.jenis.includes('putra')) ||
          (filterType === 'putri' && cardData.jenis.includes('putri'))) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});



// untuk pindah ke halaman detailkos
function handleCardClick(element) {

  // Mengambil URL dari atribut data-href
  var href = element.closest('.card-title, .card-text1, .card-text2').getAttribute('data-href');

  // Mengarahkan pengguna ke halaman detailKos.blade.php
  window.location.href = href;
}


// icon Bookmark
function bookmarkKost(button) {
  // Mengganti warna saat diklik
  if (button.classList.contains('bookmarked')) {
    button.innerHTML = '<i class="bi bi-bookmark"></i>';
    button.classList.remove('bookmarked');
  } else {
    button.innerHTML = '<i class="bi bi-bookmark-fill"></i>';
    button.classList.add('bookmarked');
  }

  const kostId = button.getAttribute('data-id');
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // Kirim AJAX request ke server untuk menyimpan kost
  fetch(`/simpan/${kostId}`, {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
      },
  })
      .then(response => {
          if (!response.ok) {
              throw new Error('Network response was not ok');
          }
          return response.json();
      })
      .then(data => {
          if (data.success) {
              alert('Kost berhasil disimpan!');
          } else {
              alert('Gagal menyimpan kost!');
          }
      })
      .catch(error => console.error('Error:', error));
}



