<!-- Success modal -->
<center><div id="modal-success" class="modal fade" role="dialog" style="margin-top: 65px;">
      <div class="alert alert-dismissible alert-success" id="alert-success" style="margin-right: -16px !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="margin-top: 10px;" id="h1-success-modal" class="white-fg">Thread was successfully added.</h4>
      </div>
</div>


<!-- Passwords don't match modal -->
<div id="modal-failure" class="modal fade" role="dialog" style="margin-top: 65px;">
      <div class="alert alert-dismissible alert-danger" id="alert-danger" style="margin-right: -16px !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="margin-top: 10px;" id="h1-failure-modal" class="white-fg">Bummer! Something went wrong.</h4>
      </div>
</div>

<button class="hidden btn btn-success" id="show-success-modal" data-target="#modal-success" data-toggle="modal">Show</button>
<button class="hidden btn btn-danger" id="show-failure-modal" data-target="#modal-failure" data-toggle="modal">Show</button>
