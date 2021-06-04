<div class="container-fluid">
  <button type="button" onclick="goBack()" class="btn btn-secondary mt-2 btn-sm"><span class="fas fa-long-arrow-alt-left"></span></button>
  <div class="card">
    <div class="card-header pb-0 p-3">
      <div class="row">
        <div class="col">
          <h5>Request No. <?= $request_in[0]['request_no']; ?></h5>
          <h6>Request By. <?= $request_in[0]['creator_name']; ?></h6>
        </div>
        <div class="col">
          <h6>Date: <span class="px-2"><?= date("l, d F Y", strtotime($request_in[0]['created_at'])); ?></span></h6>
          <h6>To. </h6>
        </div>
      </div>
    </div>
    <div class="card-footer pb-2 p-3">
      <div class="row mt-1">
        <div class="col-md-6">
          <?php if ($request_in[0]['status'] == "Waiting") {
            $bg = "bg-gradient-warning";
          } elseif ($request_in[0]['status'] == "Accepted") {
            $bg = "bg-gradient-success";
          } else {
            $bg = "bg-gradient-danger";
          } ?>
          <span class="badge badge-sm <?= $bg; ?>"><?= $request_in[0]['status']; ?></span>
        </div>
      </div>
      <div class="col">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-secondary text-s">Item</th>
              <th class="align-middle text-center text-secondary text-s">Supplier</th>
              <th class="align-middle text-center text-secondary text-s">Jumlah</th>
              <th class="align-middle text-center text-secondary text-s">Kategori</th>
              <th class="align-middle text-center text-secondary text-s">Price</th>
            </tr>
          </thead>
          <?php $total_item = 0;
          $total_price = 0; ?>
          <?php foreach ($request_in as $ri) : ?>
            <tr>
              <td class="text-xs font-weight-bold"><?= $ri['barang']; ?></td>
              <td class="align-middle text-center text-xs font-weight-bold"><?= $ri['supplier']; ?></td>
              <td class="align-middle text-center text-xs font-weight-bold"><?= $ri['qty']; ?></td>
              <td class="align-middle text-center text-xs font-weight-bold"><?= $ri['category']; ?></td>
              <td class="align-middle text-center text-xs font-weight-bold">Rp. <?= number_format($ri['harga_satuan'], 0, '.', '.'); ?></td>
            </tr>
            <?php $total_item += $ri['qty'];
            $total_price += $ri['harga_satuan'] * $ri['qty'] ?>
          <?php endforeach; ?>
        </table>

        <div class="card-footer pb-0 p-3">
          <div class="card card-plain">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="row mt-2">
                  <div class="col-md-3">
                    <div class="input-group input-group-sm">
                      <span class="input-group-text">Total Item</span>
                      <input type="text" aria-label="First name" class="form-control" value="<?= $total_item; ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-group input-group-sm">
                      <span class="input-group-text">Subtotal</span>
                      <span class="input-group-text">IDR</span>
                      <input type="text" aria-label="First name" class="form-control" value="<?= number_format($total_price, 0, '.', '.'); ?>">
                    </div>
                  </div>
                </div>
                <div class="card-footer pb-2 p-3">
                </div>
              </div>
            </div>
          </div>
        </div> <!-- /card-footer-->
        <?php if ($request_in[0]['status'] == "Waiting" && $this->session->userdata('role_id') == 2) : ?>
          <button class="btn btn-success me-4" data-toggle="modal" data-target="#approvalModal" id="approvebutton" data-id="<?= $request_in[0]['request_no']; ?>">Approve</button>
          <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal" id="rejectbutton" data-id="<?= $request_in[0]['request_no']; ?>">Reject</button>
        <?php endif; ?>
      </div>
    </div>
  </div>