
    <div class="container-fluid py-4">
      <div class="card">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col">
              <h5>Request No. </h5>
              <h6>Request By. </h6>
            </div>
            <div class="col">
              <h6>Date</h6>
              <h6>To. </h6>
            </div>
          </div>
        </div>

        <div class="card-body p-3">
          <button type="button" class="btn btn-icon btn-outline-info btn-tooltip btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add more item" data-container="body" data-animation="true">
            <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
          </button>
          <button type="button" class="btn btn-icon btn-outline-danger btn-tooltip btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove selected item" data-container="body" data-animation="true">
            <span class="btn-inner--icon"><i class="fa fa-times"></i></span>
          </button>

          <form action="" method="post">
            <div class="row">
              <div class="col-md-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group input-group-sm">
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option>Pilih Barang</option>
                  </select>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group input-group-sm">
                  <input type="number" class="form-control" id="exampleFormControlInput1">
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Alasan Pengambilan</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>


  </main>