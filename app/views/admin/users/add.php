<div class="row">
    <div class="col-12 col-lg-8 m-auto">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Thêm Người Dùng</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-4">
                        <form  method="post" action="<?= _WEB_ROOT . $action; ?>" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Họ</label>
                                        <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="Nhập họ...">
                                        <?= form_error('first_name', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Tên</label>
                                        <input class="form-control" type="text" name="last_name" placeholder="Nhập tên...">
                                        <?= form_error('last_name', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                        <?= form_error('email', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                <div class="form-group">
                                        <label for="exampleFormControlSelect1">Vai Trò</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                                            <option value="">---Chọn Chức Năng---</option>
                                            <option value="1">Quản Trị Viên</option>
                                            <option value="0">Người Dùng</option>
                                        </select>
                                        <?= form_error('role', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="example-password-input" class="form-control-label">Mật Khẩu</label>
                                        <input class="form-control" type="password"  name="password" id="example-password-input">
                                        <?= form_error('password', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <div class="form-group">
                                        <label for="example-password-input" class="form-control-label">Xác Nhận Mật Khẩu</label>
                                        <input class="form-control" type="password" name="confirm_password" id="example-password-input">
                                        <?= form_error('confirm_password', '<span style="color: #ea0606">', '</span>') ?>
                                    </div>
                                </div>
                            </div>
                    
                            <button type="submit" class="btn bg-gradient-primary btn-sm float-end">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>