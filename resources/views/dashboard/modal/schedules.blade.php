<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="formModal" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title">
                    Tambah Data
                </h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('schedules.store') }}" enctype="multipart/form-data">
                @csrf
                <label for="">Event</label>
                <input class="form-control mb-2" type="text" required name="event" value="{{ old('event') }}">
                @error('event')
                    <span class="text-danger small" role="alert">
                        {{ $message }}
                    </span><br>
                @enderror
                <label for="">Dibuka</label>
                <input type="date" class="form-control" required name="open" value="{{ old('open') }}">
                @error('open')
                    <span class="text-danger small" role="alert">
                        {{ $message }}
                    </span><br>
                @enderror
                <label for="">Ditutup</label>
                <input type="date" class="form-control" required name="close" value="{{ old('close') }}">
                @error('close')
                    <span class="text-danger small" role="alert">
                        {{ $message }}
                    </span><br>
                @enderror
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cls" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
