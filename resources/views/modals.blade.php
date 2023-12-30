<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div class="row">
    <div class="col-sm-6 col-md-3 m-t-30">
      <div class=" text-center">
        <p class="text-muted">Standard Modal</p>
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
          data-target="#myModal">Standard Modal</button>
      </div>
      <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title mt-0" id="myModalLabel">Modal Heading</h5>
              <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3 m-t-30">
      <div class="text-center">
        <p class="text-muted">Large modal</p>
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
          data-target=".bs-example-modal-lg">Large modal</button>
      </div>
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
              <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3 m-t-30">
      <div class="text-center">
        <p class="text-muted">Small modal</p>
        <!-- Small modal -->
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
          data-target=".bs-example-modal-sm">Small modal</button>
      </div>

      <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title mt-0" id="mySmallModalLabel">Small modal</h5>
              <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3 m-t-30">
      <div class="text-center">
        <p class="text-muted">Center modal</p>
        <!-- Small modal -->
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
          data-target=".bs-example-modal-center">Center modal</button>
      </div>

      <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title mt-0">Center modal</h5>
              <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- end row -->
</body>

</html>