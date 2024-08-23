<footer id="kontak">
        <div class="container secondary shadow">
            <div class="row mt-3 gap-3">
                <div class="col-12 col-md-2">
                @foreach($kontaks as $item)
                    <h5>Kontak</h5>
                    <div class="nav flex-column">
                        <p>{{ $item->lokasi }}</p>
                        <p>{{ $item->pos }}</p>
                        <p>{{ $item->email }}</p>
                        <p>{{ $item->phone }}</p>
                    </div>
                </div>
                @endforeach

                <div class="col-12 col-md-3  rounded-4">
                    <div class="mapouter"> 
                        <!-- warning, input tanpa iframe, ambil dari kutip https//:google sama kutip lagi. -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63834.99076153489!2d100.7869499!3d0.4650035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d52f9224822b0b%3A0x69f99eff92053208!2sGiti%2C%20Kec.%20Kabun%2C%20Kabupaten%20Rokan%20Hulu%2C%20Riau!5e0!3m2!1sid!2sid!4v1662436665954!5m2!1sid!2sid"
                            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </iframe>
                        <div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                        
                            </div>
                        </div>
                    </div>
                </div>>


                <div class="col-12 col-md-6 rounded-4 bg-secondary p-4">
                    <p>Formulir Kontak:</p>
                    <form action="proses_formulir.php" method="post">
                        <label for="nama">Nama:</label>
                        <input class="w-100 rounded-3" type="text" id="nama" name="nama" required>

                        <label for="email">Email:</label>
                        <input class="w-100 rounded-3" type="email" id="email" name="email" required>

                        <label for="pesan">Pesan:</label>
                        <textarea class="w-100 rounded-3" id="pesan" name="pesan" rows="3" required></textarea>
                        <input type="submit" class="w-100 btn btn-primary" value="Kirim">
                    </form>
                </div>
            </div>

            <div class="row center py-4 my-4 border-top">
                <small class="muted">&copy; 2024 Company, Inc. All rights reserved.</small>
            </div>
    </footer>