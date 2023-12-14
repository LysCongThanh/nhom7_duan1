<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-md-3">
                <nav class="list-group">
                    <a class="list-group-item active" href="ca-nhan">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Tổng quan về tài khoản </font>
                        </font>
                    </a>
                    <a class="list-group-item" href="dia-chi">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Địa chỉ của tôi</font>
                        </font>
                    </a>
                    <a class="list-group-item" href="don-hang">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Đơn hàng của tôi</font>
                        </font>
                    </a>
                    <a class="list-group-item" href="yeu-thich">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Sản phẩm yêu thích</font>
                        </font>
                    </a>
                    <a class="list-group-item" href="cai-dat">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Cài đặt</font>
                        </font>
                    </a>
                    <a class="list-group-item" href="cai-dat">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Đăng xuất</font>
                        </font>
                    </a>
                </nav>
            </aside>
            <main class="col-md-9">

                <a href="#" class="btn btn-light mb-3" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;"> Thêm địa chỉ</font>
                    </font>
                </a>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm Địa Chỉ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="profile/addAddress" method="post">
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="addressInput">Địa Chỉ</label>
                                                <input type="text" class="form-control" id="addressInput" name="address" placeholder="Thêm địa chỉ">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wardsInput">Phường/Xã</label>
                                                <input type="text" class="form-control" id="wardsInput" name="wards" placeholder="Thêm thành phố">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="districtInput">Quận/Huyện</label>
                                                <input type="text" class="form-control" id="districtInput" name="district" placeholder="Thêm quận/huyện">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zipInput">Zip Code</label>
                                                <input type="text" class="form-control" id="zipInput" name="zip_code" placeholder="Thêm zip code">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phoneInput">Số Điện Thoại</label>
                                                <input type="text" class="form-control" id="phoneInput" name="number_phone" placeholder="Thêm số điện thoại">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cityInput">Thành Phố</label>
                                                <input type="text" class="form-control" id="cityInput" name="city" placeholder="Thêm quốc gia">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Lưu Địa Chỉ</button>
                            </div>\
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($data as $key)
                    <?php
                        $address = $key['address'];
                        $variables = explode(", ", $address);
                        $wards = $variables[0];
                        $district = $variables[1];
                        $city = $variables[2];
                    ?>
                    <div class="col-md-6 col-{{$key['id']}}">
                        <article class="box mb-4">
                            <h6>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{$key['address']}}</font>
                                </font>
                            </h6>
                            <p>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{$key['specific_address']}}</font>
                                </font><br>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{$key['tel']}} </font>
                                </font>
                            </p>
                            <a href="#" class="btn btn-light disabled"> <i class="fa fa-check"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Mặc định</font>
                                </font>
                            </a> 
                            
                            <a href="#" class="btn btn-light" m data-toggle="modal" data-target="#edit{{($key['id'])}}"> <i class="fa fa-pen"></i> </a>
                                <!-- Modal -->
                                <div class="modal fade" id="edit{{($key['id'])}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sửa Địa Chỉ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="profile/updateAddress?id={{($key['id'])}}" method="post">
                                            <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="addressInput">Địa Chỉ</label>
                                                                <input type="text" class="form-control" id="addressInput" name="address" placeholder="Thêm địa chỉ" value="{{$key['specific_address']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="wardsInput">Phường/Xã</label>
                                                                <input type="text" class="form-control" id="wardsInput" name="wards" placeholder="Thêm phường/xã" value="{{$wards}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="districtInput">Quận/Huyện</label>
                                                                <input type="text" class="form-control" id="districtInput" name="district" placeholder="Thêm quận/huyện" value="{{$district}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="zipInput">Zip Code</label>
                                                                <input type="text" class="form-control" id="zipInput" name="zip_code" placeholder="Thêm zip code" value="{{$key['zip_code']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phoneInput">Số Điện Thoại</label>
                                                                <input type="text" class="form-control" id="phoneInput" name="number_phone" placeholder="Thêm số điện thoại" value="{{$key['tel']}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="cityInput">Thành Phố</label>
                                                                <input type="text" class="form-control" id="cityInput" name="city" placeholder="Thêm quốc gia" value="{{$city}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Lưu Địa Chỉ</button>
                                            </div>\
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <a href="#" class="btn btn-light" id="{{$key['id']}}" onclick="confirmDeleteAddress(event)"> <i class="text-danger fa fa-trash"></i> </a>
                        </article>
                    </div> <!-- col.// -->
                    @endforeach
                </div> <!-- row.// -->

            </main> <!-- col.// -->
        </div>

    </div> <!-- container .//  -->
</section>