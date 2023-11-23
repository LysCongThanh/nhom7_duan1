<div class="px-5 py-4 container-fluid">
    <div class="mt-6 row">
        <div class="col-lg-3 col-sm-6">
            <div class="mb-4 card blur rounded-2">
                <div class="p-4 card-body">
                    <div class="mb-3 text-center bg-white shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                        <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 3.5C9 5.43299 7.43299 7 5.5 7C3.56701 7 2 5.43299 2 3.5C2 1.56701 3.56701 0 5.5 0C7.43299 0 9 1.56701 9 3.5Z" fill="#111827" />
                            <path d="M18 3.5C18 5.43299 16.4331 7 14.5 7C12.5669 7 11 5.43299 11 3.5C11 1.56701 12.5669 0 14.5 0C16.4331 0 18 1.56701 18 3.5Z" fill="#111827" />
                            <path d="M13.5245 15C13.5744 14.619 13.6002 14.2294 13.6002 13.8333C13.6002 11.9256 13.0021 10.1707 12 8.78062C12.7844 8.28408 13.6953 8 14.6668 8C17.6122 8 20 10.6117 20 13.8333V15H13.5245Z" fill="#111827" />
                            <path d="M5.5 8C8.53756 8 11 10.6117 11 13.8333V15H0V13.8333C0 10.6117 2.46244 8 5.5 8Z" fill="#111827" />
                        </svg>
                    </div>
                    <p class="mb-1 text-sm">Người dùng đang hoạt động</p>
                    <h3 class="mb-0 font-weight-bold">{{$count_users['nguoidung']}}
                        <span class="text-base font-weight-semibold text-success"><svg class="mx-1 mb-2" width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.91583 5.83036C10.0289 5.71726 10.0855 5.58333 10.0855 5.42857C10.0855 5.27381 10.0289 5.13988 9.91583 5.02679L5.91583 1.02679C5.80273 0.913691 5.6688 0.857143 5.51404 0.857143C5.35928 0.857143 5.22535 0.913691 5.11226 1.02679L1.11226 5.02679C0.999161 5.13988 0.942614 5.27381 0.942614 5.42857C0.942614 5.58333 0.999161 5.71726 1.11226 5.83036C1.22535 5.94345 1.35928 6 1.51404 6H9.51404C9.6688 6 9.80273 5.94345 9.91583 5.83036Z" fill="#67C23A" />
                                @if($count_users['nguoidung'] == 0)
                            </svg>0%</span>
                        @else
                        </svg>100%</span>
                        @endif
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="mb-4 card blur rounded-2">
                <div class="p-4 card-body">
                    <div class="mb-3 text-center bg-white shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                        <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 0C1.11929 0 0 1.11929 0 2.5V7.5C0 8.88075 1.11929 10 2.5 10V4.5C2.5 3.39543 3.39543 2.5 4.5 2.5H15C15 1.11929 13.8807 0 12.5 0H2.5Z" fill="#111827" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 7.5C5 6.11929 6.11929 5 7.5 5H17.5C18.8807 5 20 6.11929 20 7.5V12.5C20 13.8807 18.8807 15 17.5 15H7.5C6.11929 15 5 13.8807 5 12.5V7.5ZM12.5 12.5C13.8807 12.5 15 11.3807 15 10C15 8.61925 13.8807 7.5 12.5 7.5C11.1193 7.5 10 8.61925 10 10C10 11.3807 11.1193 12.5 12.5 12.5Z" fill="#111827" />
                        </svg>
                    </div>
                    <p class="mb-1 text-sm">Mua Hàng</p>
                    <h3 class="mb-0 font-weight-bold">{{$count_orders['giaodich']}}
                        <span class="text-base font-weight-semibold text-success"><svg class="mx-1 mb-2" width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.91583 5.83036C10.0289 5.71726 10.0855 5.58333 10.0855 5.42857C10.0855 5.27381 10.0289 5.13988 9.91583 5.02679L5.91583 1.02679C5.80273 0.913691 5.6688 0.857143 5.51404 0.857143C5.35928 0.857143 5.22535 0.913691 5.11226 1.02679L1.11226 5.02679C0.999161 5.13988 0.942614 5.27381 0.942614 5.42857C0.942614 5.58333 0.999161 5.71726 1.11226 5.83036C1.22535 5.94345 1.35928 6 1.51404 6H9.51404C9.6688 6 9.80273 5.94345 9.91583 5.83036Z" fill="#67C23A" />
                                @if($count_orders['giaodich'] == 0)
                            </svg>0%</span>
                        @else
                        </svg>100%</span>
                        @endif
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="mb-4 card blur rounded-2">
                <div class="p-4 card-body">
                    <div class="mb-3 text-center bg-white shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.14284 0C8.51164 0 7.99998 0.51168 7.99998 1.14286C7.99998 1.77403 8.51164 2.28571 9.14284 2.28571H12.098L4.90614 9.4776C4.45983 9.92389 4.45983 10.6475 4.90614 11.0938C5.35246 11.5401 6.07607 11.5401 6.52239 11.0938L13.7143 3.90195V6.85714C13.7143 7.48832 14.2259 8 14.8571 8C15.4883 8 16 7.48832 16 6.85714V1.14286C16 0.51168 15.4883 0 14.8571 0H9.14284Z" fill="#111827" />
                            <path d="M2.28571 2.28571C1.02335 2.28571 0 3.30905 0 4.57142V13.7143C0 14.9767 1.02335 16 2.28571 16H11.4286C12.691 16 13.7143 14.9767 13.7143 13.7143V10.2857C13.7143 9.65451 13.2026 9.14285 12.5714 9.14285C11.9402 9.14285 11.4286 9.65451 11.4286 10.2857V13.7143H2.28571V4.57142H5.71429C6.34546 4.57142 6.85714 4.05974 6.85714 3.42856C6.85714 2.79739 6.34546 2.28571 5.71429 2.28571H2.28571Z" fill="#111827" />
                        </svg>
                    </div>
                    <p class="mb-1 text-sm">Đánh Giá</p>
                    <h3 class="mb-0 font-weight-bold">{{$count_ratings['rating']}}
                        <span class="text-base font-weight-semibold text-success"><svg class="mx-1 mb-2" width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.91583 5.83036C10.0289 5.71726 10.0855 5.58333 10.0855 5.42857C10.0855 5.27381 10.0289 5.13988 9.91583 5.02679L5.91583 1.02679C5.80273 0.913691 5.6688 0.857143 5.51404 0.857143C5.35928 0.857143 5.22535 0.913691 5.11226 1.02679L1.11226 5.02679C0.999161 5.13988 0.942614 5.27381 0.942614 5.42857C0.942614 5.58333 0.999161 5.71726 1.11226 5.83036C1.22535 5.94345 1.35928 6 1.51404 6H9.51404C9.6688 6 9.80273 5.94345 9.91583 5.83036Z" fill="#67C23A" />
                                @if($count_ratings['rating'] == 0)
                            </svg>0%</span>
                        @else
                        </svg>100%</span>
                        @endif
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="mb-4 card blur rounded-2">
                <div class="p-4 card-body">
                    <div class="mb-3 text-center bg-white shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.17479 0.697371C5.04034 0.195608 4.52458 -0.102171 4.02282 0.0322857C3.52104 0.166733 3.22328 0.682491 3.35772 1.18425L3.60116 2.09279C3.73561 2.59455 4.25137 2.89233 4.75313 2.75788C5.2549 2.62343 5.55267 2.10767 5.41823 1.60591L5.17479 0.697371Z" fill="#111827" />
                            <path d="M1.18425 3.35772C0.682491 3.22328 0.166733 3.52104 0.0322857 4.02282C-0.102171 4.52458 0.195608 5.04034 0.697371 5.17479L1.60591 5.41823C2.10767 5.55267 2.62343 5.2549 2.75788 4.75313C2.89233 4.25137 2.59455 3.73561 2.09279 3.60116L1.18425 3.35772Z" fill="#111827" />
                            <path d="M9.47405 2.82314C9.84135 2.45582 9.84135 1.86027 9.47405 1.49296C9.10666 1.12564 8.51117 1.12564 8.14383 1.49296L7.47873 2.15805C7.11142 2.52537 7.11142 3.12092 7.47873 3.48823C7.84606 3.85555 8.44157 3.85555 8.80896 3.48823L9.47405 2.82314Z" fill="#111827" />
                            <path d="M2.82308 9.47405L3.48817 8.80896C3.85549 8.44157 3.85549 7.84606 3.48817 7.47873C3.12085 7.11142 2.52531 7.11142 2.15799 7.47873L1.49289 8.14383C1.12558 8.51117 1.12558 9.10666 1.49289 9.47405C1.86021 9.84135 2.45576 9.84135 2.82308 9.47405Z" fill="#111827" />
                            <path d="M5.83291 4.61021C5.48355 4.47047 5.08454 4.55237 4.81849 4.81843C4.55243 5.08448 4.47053 5.4835 4.61027 5.83284L8.37265 15.2387C8.51016 15.5826 8.83673 15.8138 9.20685 15.8291C9.57687 15.8445 9.9215 15.6412 10.0872 15.31L11.3848 12.7149L14.2243 15.5544C14.5916 15.9217 15.1872 15.9217 15.5545 15.5544C15.9219 15.1871 15.9219 14.5916 15.5545 14.2243L12.7149 11.3846L15.31 10.0871C15.6414 9.92147 15.8445 9.57684 15.8292 9.20672C15.8138 8.8367 15.5826 8.51013 15.2387 8.37252L5.83291 4.61021Z" fill="#111827" />
                        </svg>
                    </div>
                    <p class="mb-1 text-sm">Nhấp vào sự kiện</p>
                    <h3 class="mb-0 font-weight-bold">2,399</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 row">
        <div class="col-12">
            <div class="card z-index-2">
                <div class="p-3 pb-0 card-header">
                    <div class="flex-row justify-content-between d-flex">
                        <div class="my-auto">
                            <h6 class="text-lg font-weight-semibold">Các trang hàng đầu</h6>
                            <p>Tìm các thiết bị hàng đầu của bạn là gì.</p>
                        </div>
                        <div class="my-auto align-self-end d-flex flex-nowrap">
                            <div class="btn-group" role="tablist">
                                <input class="btn-check active" type="radio" name="charttab" id="charttab1" autocomplete="off" role="tab" aria-selected="true" checked>
                                <label class="px-4 mb-0 btn btn-white" for="charttab1">Top Pages</label>
                                <input class="btn-check active" type="radio" name="charttab" id="charttab2" autocomplete="off" role="tab" aria-selected="false">
                                <label class="px-4 mb-0 btn btn-white" for="charttab2">Entry Pages</label>
                                <input class="btn-check active" type="radio" name="charttab" id="charttab3" autocomplete="off" role="tab" aria-selected="false">
                                <label class="px-4 mb-0 btn btn-white" for="charttab3">Exit pages</label>
                            </div>
                            <div class="ms-2 dropdown">
                                <button class="mb-0 btn btn-white dropdown-toggle" data-bs-toggle="dropdown">last 30 days </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownChart" data-popper-placement="bottom-end">
                                    <li><a class="dropdown-item" href="javascript:;">yesterday</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">last 7 days</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">last 30 days</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="chart w-80">
                                <canvas id="pie-chart" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                        <div class="py-2 my-auto col-6">
                            <div class="flex-row mb-1 position-relative d-flex justify-content-between">
                                <div class="position-absolute bg-info opacity-1 w-50 h-100"></div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm">/home</h6>
                                </div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm align-self-end">52.341</h6>
                                </div>
                            </div>
                            <div class="flex-row mb-1 position-relative d-flex justify-content-between">
                                <div class="position-absolute bg-info opacity-1 w-15 h-100"></div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm">/site</h6>
                                </div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm align-self-end">10.223</h6>
                                </div>
                            </div>
                            <div class="flex-row mb-1 position-relative d-flex justify-content-between">
                                <div class="w-9 position-absolute bg-info opacity-1 h-100"></div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm">/documentation</h6>
                                </div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm align-self-end">9.092</h6>
                                </div>
                            </div>
                            <div class="flex-row mb-1 position-relative d-flex justify-content-between">
                                <div class="w-8 position-absolute bg-info opacity-1 h-100"></div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm">/docs/components</h6>
                                </div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm align-self-end">8.241</h6>
                                </div>
                            </div>
                            <div class="flex-row mb-1 position-relative d-flex justify-content-between">
                                <div class="w-7 position-absolute bg-info opacity-1 h-100"></div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm">/signin</h6>
                                </div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm align-self-end">6.002</h6>
                                </div>
                            </div>
                            <div class="flex-row mb-1 position-relative d-flex justify-content-between">
                                <div class="w-6 position-absolute bg-info opacity-1 h-100"></div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm">/landing</h6>
                                </div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm align-self-end">5.706</h6>
                                </div>
                            </div>
                            <div class="flex-row mb-1 position-relative d-flex justify-content-between">
                                <div class="w-5 position-absolute bg-info opacity-1 h-100"></div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm">/illustration</h6>
                                </div>
                                <div class="p-1 px-3 z-index-2">
                                    <h6 class="mb-0 text-sm align-self-end">5.028</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div class="mb-0 btn btn-white">See More</div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 row">
        <div class="col-12">
            <div class="py-4 border-0 card">
                <div class="table-responsive">
                    <table class="table mb-0 align-items-center">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                    Tên</th>
                                <th class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7 ps-2">
                                    Vai Trò</th>
                                <th class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7 ps-2">
                                    Đánh Giá</th>
                                <th class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                    Email</th>
                                <th class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                    Ngày Tạo</th>
                                <th class="text-uppercase text-secondary border-top-0 text-xxs font-weight-bolder opacity-7">
                                    Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <div class="px-2 py-1 d-flex">
                                        <div>
                                            <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/{{$user['avatar']}}" class="avatar avatar-sm me-3" alt="avatar image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$user['name']}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 text-sm text-secondary">{{$user['role']}}</p>
                                </td>
                                <td>
                                    <span class="badge badge-dot me-4">
                                        <i class="bg-info"></i>
                                        <span class="text-xs text-dark">Tích Cực</span>
                                    </span>
                                </td>
                                <td class="text-sm align-middle">
                                    <p class="mb-0 text-sm text-secondary"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="295b404a41485b4d694a5b4c485d405f4c045d4044074a4644">{{$user['email']}}</a>
                                    </p>
                                </td>
                                <td class="px-3 align-middle">
                                    <span class="text-xs text-secondary font-weight-bold">{{$user['created_at']}}</span>
                                </td>
                                <td class="align-middle">
                                    <span class="text-sm text-secondary">{{$user['id']}}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-3  ">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-xs text-muted text-lg-start">
                    Copyright
                    ©
                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Corporate UI Dashboard PRO by
                    <a href="https://www.creative-tim.com" class="text-secondary" target="_blank">Creative
                        Tim</a>.
                </div>
            </div>
            <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link text-xs text-muted" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link text-xs text-muted" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/blog" class="nav-link text-xs text-muted" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/license" class="nav-link text-xs pe-0 text-muted" target="_blank">License</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>

