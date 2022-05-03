 <!-- Modal -->
 <form action="{{ route('size')}}" method="post">
    @csrf
    @include('sweetalert::alert')
  <div class="modal fade" id="exampleSize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="size_id" class="form-label">Input Size</label>
                <input type="text" class="form-control @error('size_id') is-invalid @enderror" id="size_id"
                    name="size_id" value="{{ old('size_id') }}" required autofocus>
                @error('size_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</form>