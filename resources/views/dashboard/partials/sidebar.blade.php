		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item {{ Request::is('dashboard') ? 'active' : ''}}">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li class="{{ Request::is('dashboard') ? 'active' : ''}}">
										<a href="/dashboard">
											<span class="sub-item">Dashboard</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Daftar Opsi</h4>
						</li>
						<li class="nav-item {{ Request::is('dashboard/*') ? 'active' : ''}}">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Opsi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li class="{{ Request::is('dashboard/users*') ? 'active' : ''}}">
										<a href="/dashboard/users">
											<span class="sub-item">Pengguna</span>
										</a>
									</li>
									<li class="{{ Request::is('dashboard/user-info*') ? 'active' : ''}}">
										<a href="/dashboard/user-info">
											<span class="sub-item">Informasi Pengguna</span>
										</a>
									</li>
									<li class="{{ Request::is('dashboard/device*') ? 'active' : ''}}">
										<a href="/dashboard/device">
											<span class="sub-item">Perangkat</span>
										</a>
									</li>
									<li class="{{ Request::is('dashboard/user-card*') ? 'active' : ''}}">
										<a href="/dashboard/user-card">
											<span class="sub-item">Kartu</span>
										</a>
									</li>
									<li class="{{ Request::is('dashboard/userlog*') ? 'active' : ''}}">
										<a href="/dashboard/userlog">
											<span class="sub-item">Histori Pengguna</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->