
{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="xhrButton"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#xhr">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="xhr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="xhrBody" class="modal-body">
        Please Choose a Product First
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        {{--<button type="button" class="btn btn-primary">Understood</button>--}}
      </div>
    </div>
  </div>
</div>


{{----}}











{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="csrf1Button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#csrf1">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="csrf1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><span class="text-warning">Alert</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="csrf1Body" class="modal-body">
        Please refresh this page in less than 1 hour.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        <button onclick="window.location.reload(true);" type="button" class="btn btn-primary">Refresh Now</button>
      </div>
    </div>
  </div>
</div>


{{----}}














{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="csrf2Button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#csrf2">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="csrf2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><span class="text-warning">Alert!</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="csrf2Body" class="modal-body">
        Please refresh this page in less than 45 minutes.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        <button onclick="window.location.reload(true);" type="button" class="btn btn-primary">Refresh Now</button>
      </div>
    </div>
  </div>
</div>


{{----}}








{{-- modal popup--}}
<!-- Button trigger modal -->
<button hidden type="button" id="csrf3Button"class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#csrf3">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="csrf3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><span class="text-danger">Alert!!!!</span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="csrf3Body" class="modal-body text-danger">
        Please refresh this page in less than 20 minutes.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
        <button onclick="window.location.reload(true);" type="button" class="btn btn-primary">Refresh Now</button>
      </div>
    </div>
  </div>
</div>


{{----}}
