<div class="modal fade text-left" id="{{ $id }}Modal" tabindex="-1" role="dialog"
  aria-labelledby="{{ $label }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <form id="{{ $id }}Form">
        @csrf
        <div class="modal-header {{ $variant }}">
          <h5 class="modal-title{{ $variant !== '' ? ' white' : '' }}" id="{{ $label }}">{{ $title }}</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
          {{ $slot }}
        </div>
        <div class="modal-footer">
          <button type="button" id="cancelModal" class="btn" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Batal</span>
          </button>
          <button type="submit" id="confirmModal" class="btn btn-{{ $btn }} ms-1">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">{{ $btn === 'primary' ? 'Simpan' : 'Hapus' }}</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
