<!-- Modal -->
<div class="modal fade" id="modalFotoSantri{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="modalFotoSantriLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalFotoSantriLabel{{ $data->id }}">Foto Santri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <img src="{{ url('foto_santri/' . $data->image) }}" alt="Foto Santri" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
  