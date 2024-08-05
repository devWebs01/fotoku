<div class="modal fade" id="modal-logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pemberitahuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan keluar dari sistem?</p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Keluar</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div class="modal" id="modal-loading">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Sedang memuat data...</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <center>
            <img src="{{ asset(Setting::getValue('app_loading_gif')) }}" alt="{{ Setting::getName('app_loading_gif') }}" class="img" width="200">
        </center>
        </div>
    </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-changePassword">
            <div class="form-group">
              <label for="oldPassword">Password Lama</label>
              <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
            </div>
            <div class="form-group">
              <label for="newPassword">Password Baru</label>
              <input type="password" class="form-control" id="newPassword" name="newPassword" required>
            </div>
            <div class="form-group">
              <label for="confirmPassword">Konfirmasi Password Baru</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-action">Simpan</button>
          </form>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="filterBookingModal" tabindex="-1" role="dialog" aria-labelledby="filterBookingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterBookingModalLabel">Filter Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-filterBooking">
          <x-form-date id='tgl_acara' text='Tanggal Mulai Acara' addClass='dmy' required='required' />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-action">Filter</button>
        </form>
      </div>
    </div>
  </div>
</div>
  