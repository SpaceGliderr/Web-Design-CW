<div class="container">
    <div class="nav-bar">

        <header class="page-header">
          <nav>
            <svg style="display:none;">
              <symbol id="products" viewBox="0 0 16 16">
                <rect width="7" height="7" />
                <rect y="9" width="7" height="7" />
                <rect x="9" width="7" height="7" />
                <rect x="9" y="9" width="7" height="7" />
              </symbol>
              <symbol id="vendor" viewBox="0 0 23 22">
                <g xmlns="http://www.w3.org/2000/svg"><g/>
                  <g>
                    <g><path d="M16.67,13.13C18.04,14.06,19,15.32,19,17v3h4v-3 C23,14.82,19.43,13.53,16.67,13.13z" fill-rule="evenodd"/></g>
                    <g><circle cx="9" cy="8" fill-rule="evenodd" r="4"/></g>
                    <g><path d="M15,12c2.21,0,4-1.79,4-4c0-2.21-1.79-4-4-4c-0.47,0-0.91,0.1-1.33,0.24 C14.5,5.27,15,6.58,15,8s-0.5,2.73-1.33,3.76C14.09,11.9,14.53,12,15,12z" fill-rule="evenodd"/></g>
                    <g><path d="M9,13c-2.67,0-8,1.34-8,4v3h16v-3C17,14.34,11.67,13,9,13z" fill-rule="evenodd"/></g>
                    <g xmlns="http://www.w3.org/2000/svg"><rect fill="none" height="50" width="50"/></g>
                  </g>
              </symbol>
              <symbol id="admin" viewBox="0 0 21 22">
                <g xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"><path d="M9 17l3-2.94c-.39-.04-.68-.06-1-.06-2.67 0-8 1.34-8 4v2h9l-3-3zm2-5c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4"/><path d="M15.47 20.5L12 17l1.4-1.41 2.07 2.08 5.13-5.17 1.4 1.41z"/></g>              </symbol>
              <symbol id="users" viewBox="0 0 16 16">
                <path d="M8,0a8,8,0,1,0,8,8A8,8,0,0,0,8,0ZM8,15a7,7,0,0,1-5.19-2.32,2.71,2.71,0,0,1,1.7-1,13.11,13.11,0,0,0,1.29-.28,2.32,2.32,0,0,0,.94-.34,1.17,1.17,0,0,0-.27-.7h0A3.61,3.61,0,0,1,5.15,7.49,3.18,3.18,0,0,1,8,4.07a3.18,3.18,0,0,1,2.86,3.42,3.6,3.6,0,0,1-1.32,2.88h0a1.13,1.13,0,0,0-.27.69,2.68,2.68,0,0,0,.93.31,10.81,10.81,0,0,0,1.28.23,2.63,2.63,0,0,1,1.78,1A7,7,0,0,1,8,15Z" />
              </symbol>
              <symbol id="logout" viewBox="0 0 23 23">
                <path xmlns="http://www.w3.org/2000/svg" d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z"/>
                <path xmlns="http://www.w3.org/2000/svg" d="M0 0h24v24H0z" fill="none"/>
              </symbol>
            </svg>
            <a href="home.php">
                <img class="admin-logo" src="images/logo-and-word.png" >
            </a>

            <ul class="admin-menu">
                <li class="menu-heading">
                    <h3>Admin</h3>
                </li>
                <li>
                    <a href="admin-product-page.php">
                        <svg>
                          <use xlink:href="#products"></use>
                        </svg>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="admin-vendor-page.php">
                        <svg>
                          <use xlink:href="#vendor"></use>
                        </svg>
                        <span>Vendor</span>
                    </a>
                </li>
                <li>
                    <a href="admin-user-page.php">
                        <svg>
                          <use xlink:href="#users"></use>
                        </svg>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="admin-admins-page.php">
                        <svg>
                          <use xlink:href="#admin"></use>
                        </svg>
                        <span>Admins</span>
                    </a>
                </li>
                <li>
                    <a href="processes/admin-logout.php">
                        <svg>
                          <use xlink:href="#logout"></use>
                        </svg>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
</div>
