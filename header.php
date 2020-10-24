<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                <div class="mr-auto">
                <button class="btn btn-transparent btn-cus no-focus rounded-circle" onclick="toggleSidebar();">
                    <i class="fa fa-navicon"></i>
                </button>
                <a class="nav-brand font-weight-bold text-cus ml-2" href="/">
                    <?php print(ucwords(WEBSITE_NAME)); ?>
                </a>
                </div>

                <div class="ml-auto d-flex">
                    <span class="small font-weight-bold pr-2 d-flex align-self-center"><?php print($_SESSION['admin'][1]); ?></span>
                    <button class="btn btn-transparent btn-cus no-focus rounded-circle" onclick="toggleProfileBox();">
                        <i class="fa fa-user-o"></i>
                    </button>
                </div>
            </nav>
            <div class="position-absolute shadow rounded-lg bg-white d-none" id="profile-box" style="right:20px; top:45px; z-index:100">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action border-0 pl-4 pr-5 small">
                        <div class="pr-3 d-inline"><i class="fa fa-user fa-lg"></i></div> Profile
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0 pl-4 pr-5 small">
                        <div class="pr-3 d-inline"><i class="fa fa-gear fa-lg"></i></div> Settings
                    </a>
                    <a href="/logout" class="list-group-item list-group-item-action pl-4 pr-5 small">
                        <div class="pr-3 d-inline"><i class="fa fa-sign-out fa-lg"></i></div> Logout
                    </a>
                </div>
            </div>
