<div class="bg-4" id="sidebar-wrapper">
    <div class="list-group list-group-flush my-3">
        @hasanyrole('admin|pegawai')
        <a href="{{ route('dashboard.index') }}" 
        class="list-group-item list-group-item-action bg-4   {{ Request()->routeIs('dashboard.*') ? 'fw-bold' : '' }}">
         <i class="bi bi-house me-2"></i>Dashboard
     </a>
     @endhasanyrole
     @hasanyrole('admin|pegawai')
     <a href="{{ route('kategori.index') }}" 
        class="list-group-item list-group-item-action bg-4  {{ Request()->routeIs('kategori.*') ? 'fw-bold' : '' }}">
         <i class="bi bi-laptop me-2"></i>Kategori 
     </a>
        @endhasanyrole

      
        <a href="{{ route('produk.index') }}" 
        class="list-group-item list-group-item-action bg-4  {{ Request()->routeIs('produk.*') ? 'fw-bold' : '' }}">
         <i class="bi bi-box-arrow-in-down me-2"></i>Produk
     </a>
    
        
        <a href="{{ route('purchase.create') }}" 
        class="list-group-item list-group-item-action bg-4  {{ Request()->routeIs('purchase.*') ? 'fw-bold' : '' }}">
         <i class="bi bi-box-arrow-down me-2"></i>Pembelian
     </a>

        <a href="{{ route('sale.create') }}" 
        class="list-group-item list-group-item-action bg-4  {{ Request()->routeIs('sale.*') ? 'fw-bold' : '' }}">
         <i class="bi bi-box-arrow-up me-2"></i>Penjualan
     </a>
  
        <a href="{{ route('transaction.index') }}" 
           class="list-group-item list-group-item-action bg-4  {{ Request()->routeIs('transaction.*') ? 'fw-bold' : '' }}">
            <i class="bi bi-box-arrow-in-down me-2"></i>Riwayat Transaksi
        </a>
        <a href="{{ route('staff.index') }}" 
           class="list-group-item list-group-item-action bg-4 {{ Request()->routeIs('staff.*') ? 'fw-bold' : '' }}">
            <i class="bi bi-people me-2"></i>Kelola Pegawai
        </a>
        <a href="{{ route('pelanggan.index') }}" 
           class="list-group-item list-group-item-action bg-4 {{ Request()->routeIs('pelanggan.*') ? 'fw-bold' : '' }}">
            <i class="bi bi-people me-2"></i>Kelola Pelanggan
        </a>
        <a href="{{ route('collector.index') }}" 
           class="list-group-item list-group-item-action bg-4 {{ Request()->routeIs('collector.*') ? 'fw-bold' : '' }}">
            <i class="bi bi-people me-2"></i>Kelola Pengepul
        </a>


      
    </div>
</div>

    <form method="POST">
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengaturan User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="invisible position-absolute">
                            <input type="text" class="form-control" name="id_user" value="">
                        </div>
                        <div class="row">
                            <div class="col-5 mt-1"><label>Nama</label></div>
                            <div class=col>
                                <input class="form-control" name="nama" type="text" value=""><br>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-5 mt-1"><label>No HP</label></div>
                            <div class=col>
                                <input class="form-control" name="no_hp" type="text" value=""><br>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-5 mt-1"><label>Password Lama</label></div>
                            <div class=col>
                                <input class="form-control" name="password_lama" type="password" placeholder="Masukan Password"><br>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-5 mt-1"><label>Password Baru</label></div>
                            <div class=col>
                                <input class="form-control" name="password_baru" type="password" placeholder="Opsional"><br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row mt-3">  
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Keluar</button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#alertEditModal">Simpan</button>
                                </div>                                     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="alertEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Edit data ID User ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="eksekusiEdit">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>