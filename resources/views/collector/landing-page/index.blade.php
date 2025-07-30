<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="{{ asset('img/LOGO.png') }}">
  <title>Profil PT Agus Jaya Kardus</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="bg-white text-gray-900">

  <!-- Navbar -->
  <nav class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="max-w-6xl mx-auto px-4 py-3 flex justify-between items-center">
      <a href="#" class="text-xl font-bold text-black-700">PT Agus Jaya Kardus</a>
      <div class="space-x-6 hidden md:flex">
        <a href="#beranda" class="text-gray-700 hover:text-blue-600">Beranda</a>
        <a href="#about" class="text-gray-700 hover:text-blue-600">Tentang Kami</a>
        <a href="#produk" class="text-gray-700 hover:text-blue-600">Produk</a>
        <a href="#cta" class="text-gray-700 hover:text-blue-600">Kontak</a>
        <a href="/login" class="text-gray-700 hover:text-blue-600">Login</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <!-- <header class="relative bg-blue-600 h-[70vh] flex items-center justify-center pt-20">
    <div class="relative z-10 text-center px-6">
      <h1 class="text-4xl md:text-5xl font-bold text-white drop-shadow-lg mb-4">PT Agus Jaya Kardus</h1>
      <p class="text-lg md:text-xl text-white mb-6">Tempat terpercaya menjual kardus bekas Anda</p>
      <a href="#cta" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-6 py-3 rounded-2xl shadow-lg transition">Mulai Jual Kardus</a>
    </div>
  </header> -->

  <!-- About Section -->
  <section id="beranda" class="py-20 px-6 md:px-20 max-w-6xl mx-auto bg-white">

    <div class="grid md:grid-cols-2 gap-10 items-center">
      <img src="img/LIMBAH KERTAS.jpeg" alt="Gudang Kardus" class="rounded-2xl shadow-lg w-full h-auto" />
      <p class="leading-relaxed text-lg md:text-2xl font-semibold text-gray-800">
        Pusat Jual Beli Limbah Barang Bekas di Bali, 30 tahun telah dipercaya oleh berbagai perusahaan sebagai distributor utama dalam pengelolaan sampah, khususnya limbah kertas.
      </p>
    </div>
  </section>

  <!-- WhatsApp Contact -->
  <div class="bg-white border rounded-2xl p-4 flex items-center justify-between shadow-md mt-8 max-w-md mx-auto">
    <div class="flex items-center gap-3">
      <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WA" class="w-8 h-8" />
      <div>
        <p class="text-sm text-gray-500">Hubungi:</p>
        <p class="font-semibold text-lg text-gray-900">0896-8578-6894</p>
      </div>
    </div>
    <a href="https://wa.me/6289685786894" target="_blank" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow">Hubungi Via WA</a>
  </div>

  <!-- How to Sell -->
  <section id="about" class="py-20 px-6 md:px-20 bg-white">
    <h2 class="text-3xl font-bold mb-10 text-center">Cara Menjual Barang Bekas</h2>
    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-2">1. Timbang </h3>
        <p class="text-gray-700">Datang ke lokasi kami dengan barang bekas Anda. Pegawai kami akan menimbang dan mengecek kualitas barang.</p>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-2">2. Dapatkan Harga</h3>
        <p class="text-gray-700">Kami menawarkan harga transparan berdasarkan berat dan jenis barang. Harga terupdate ditampilkan di sistem.</p>
      </div>
      <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <h3 class="text-xl font-semibold mb-2">3. Terima Pembayaran</h3>
        <p class="text-gray-700">Pembayaran dapat dilakukan tunai maupun transfer. Bukti transaksi akan diberikan saat pembayaran.</p>
      </div>
    </div>
  </section>

  <!-- Produk Section -->
  <section id="produk" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <h3 class="text-2xl font-bold text-black-600 text-center mb-10">Produk yang kami terima</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white shadow-md rounded-lg p-4">
          <img src="img/LIMBAH KERTAS.jpeg" alt="Kardus A" class="rounded mb-4">
          <h4 class="text-xl font-semibold text-black-700">Kardus</h4>
          <p class="text-gray-800 font-semibold text-xl mt-2">Rp 3200/kg</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
          <img src="img/LIMBAH KERTAS.jpeg" alt="Kardus B" class="rounded mb-4">
          <h4 class="text-xl font-semibold text-black-700">Majalah</h4>
          <p class="text-gray-800 font-semibold text-xl mt-2">Rp 3500/kg</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
          <img src="img/LIMBAH KERTAS.jpeg" alt="Kardus C" class="rounded mb-4">
          <h4 class="text-xl font-semibold text-black-700">Koran</h4>
          <p class="text-gray-800 font-semibold text-xl mt-2">Rp 2800/kg</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
          <img src="img/LIMBAH KERTAS.jpeg" alt="Kardus A" class="rounded mb-4">
          <h4 class="text-xl font-semibold text-black-700">Pet Bening</h4>
          <p class="text-gray-800 font-semibold text-xl mt-2">Rp 3100/kg</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
          <img src="img/LIMBAH KERTAS.jpeg" alt="Kardus B" class="rounded mb-4">
          <h4 class="text-xl font-semibold text-black-700">Pet Campur</h4>
          <p class="text-gray-800 font-semibold text-xl mt-2">Rp 3000/kg</p>
        </div>
        <div class="bg-white shadow-md rounded-lg p-4">
          <img src="img/LIMBAH KERTAS.jpeg" alt="Kardus C" class="rounded mb-4">
          <h4 class="text-xl font-semibold text-black-700">Rumput</h4>
          <p class="text-gray-800 font-semibold text-xl mt-2">Rp 4000/kg</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="faq" class="py-20 px-6 md:px-20 max-w-4xl mx-auto bg-white">
    <h2 class="text-3xl font-bold mb-10 text-center">Pertanyaan Umum (FAQ)</h2>
    <div class="space-y-4">
      <details class="bg-white p-4 rounded-2xl cursor-pointer shadow-sm">
        <summary class="font-semibold">Apakah menerima kardus rusak?</summary>
        <p class="mt-2 text-gray-700">Kami menerima kardus dengan kerusakan ringan (sobek kecil) namun tidak menerima kardus yang basah atau sangat hancur.</p>
      </details>
      <details class="bg-white p-4 rounded-2xl cursor-pointer shadow-sm">
        <summary class="font-semibold">Apakah harga kardus selalu sama setiap hari?</summary>
        <p class="mt-2 text-gray-700">Harga dapat berubah tergantung kondisi pasar dan jenis kardus. Kami selalu menginformasikan harga terbaru kami.</p>
      </details>
      <details class="bg-white p-4 rounded-2xl cursor-pointer shadow-sm">
        <summary class="font-semibold">Jam operasional?</summary>
        <p class="mt-2 text-gray-700">Senin–Sabtu, 08.00–17.00 WITA.</p>
      </details>
    </div>
  </section>

  <!-- CTA Section -->
  <!--<section id="cta" class="bg-yellow-400 py-20 px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-4 text-gray-900">Siap menjual kardus bekas Anda?</h2>
      <p class="text-lg mb-6 text-gray-800">Daftar atau login untuk mulai transaksi dan dapatkan harga terbaik hari ini.</p>
      <a href="/login" class="inline-block bg-gray-900 hover:bg-gray-800 text-white font-semibold px-8 py-3 rounded-2xl shadow-lg transition">Login</a>
    </div>
  </section> -->

  <!-- Footer -->
  <footer class="bg-black text-white py-12 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8">
      <div>
        <h3 class="font-semibold mb-2">PT Agus Jaya Kardus</h3>
        <p>Jl. Mukuh Merta Sari No. 5XX, Ubung Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali. </p>
      </div>
      <div>
        <h3 class="font-semibold mb-2">Kontak</h3>
        <p>Telepon: 0361-123456</p>
        <p>Email: agusjayakardus@gmail.com</p>
        <p>WhatsApp: 0896-8578-6894</p>
      </div>
      <div>
        <h3 class="font-semibold mb-2">Sosial Media</h3>
        <p>Instagram: @agusjayakardus</p>
        <p>Facebook: PT Agus Jaya Kardus</p>
      </div>
    </div>
    <p class="text-center mt-10 text-sm text-white-500">© 2025 PT Agus Jaya Kardus. All rights reserved.</p>
  </footer>

</body>
</html>
