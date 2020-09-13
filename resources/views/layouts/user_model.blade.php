@if ($user->predictions()->count() < 1)
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="userModelTitle">informations sur l'utilisateur</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <p>
          Pas d'informations supplementaires sur {{$user->name}} .
        </p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
@else
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="userModelTitle">informations sur l'utilisateur</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <p>
          <b>Nombre des predictions Pneumonie:  </b>
          {{$user->predictions()->where('predicted_class','LIKE','%neumonia')->count()}} .
        </p>
        <p>
          <b>Nombre des predictions Normal:  </b>
          {{$user->predictions()->where('predicted_class','LIKE','%mal')->count()}} .
        </p>
        <p>
          <b>Dernière prediction était : </b>
          {{$user->predictions()->orderBy('created_at','desc')->first()->created_at}} .
        </p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
@endif
