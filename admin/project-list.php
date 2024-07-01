<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>

    <title>Projects - HRMS admin template</title>

    <?php include 'layouts/title-meta.php'; ?>

    <?php include 'layouts/head-css.php'; ?>

</head>

<body>
    <div class="main-wrapper">
    <?php include 'layouts/menu.php'; ?>

  <!-- Page Wrapper -->
  <div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Projects</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create_project"><i class="fa-solid fa-plus"></i> Create Project</a>
                            <div class="view-icons">
                                <a href="projects.php" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                <a href="project-list.php" class="list-view btn btn-link active"><i class="fa-solid fa-bars"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="input-block mb-3 form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Project Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="input-block mb-3 form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3"> 
                        <div class="input-block mb-3 form-focus select-focus">
                            <select class="select floating"> 
                                <option>Select Role</option>
                                <option>Web Developer</option>
                                <option>Web Designer</option>
                                <option>Android Developer</option>
                                <option>Ios Developer</option>
                            </select>
                            <label class="focus-label">Role</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <a href="#" class="btn btn-success w-100"> Search </a>  
                    </div>     
                </div>
                <!-- /Search Filter -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Project Id</th>
                                        <th>Leader</th>
                                        <th>Team</th>
                                        <th>Deadline</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Office Management</a>
                                        </td>
                                        <td>PRO-0001</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members text-nowrap">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li class="dropdown avatar-dropdown">
                                                    <a href="#" class="all-users dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">+15</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <div class="avatar-group">
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-11.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-12.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-13.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-01.jpg" alt="User Image">
                                                            </a>
                                                            <a class="avatar avatar-xs" href="#">
                                                                <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                            </a>
                                                        </div>
                                                        <div class="avatar-pagination">
                                                            <ul class="pagination">
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Previous">
                                                                        <span aria-hidden="true">«</span>
                                                                        <span class="visually-hidden">Previous</span>
                                                                    </a>
                                                                </li>
                                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Next">
                                                                        <span aria-hidden="true">»</span>
                                                                    <span class="visually-hidden">Next</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Project Management</a>
                                        </td>
                                        <td>PRO-0002</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-warning"></i> Medium </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Video Calling App</a>
                                        </td>
                                        <td>PRO-0003</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Low </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Hospital Administration</a>
                                        </td>
                                        <td>PRO-0004</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Office Management</a>
                                        </td>
                                        <td>PRO-0005</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Project Management</a>
                                        </td>
                                        <td>PRO-0006</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Video Calling App</a>
                                        </td>
                                        <td>PRO-0007</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Hospital Administration</a>
                                        </td>
                                        <td>PRO-0008</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Office Management</a>
                                        </td>
                                        <td>PRO-0009</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Project Management</a>
                                        </td>
                                        <td>PRO-0010</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="project-view.php">Video Calling App</a>
                                        </td>
                                        <td>PRO-0011</td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img src="assets/img/profiles/avatar-16.jpg" alt="User Image"></a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" title="John Doe" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-02.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Richard Miles" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-09.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="John Smith" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-10.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Mike Litorus" data-bs-toggle="tooltip"><img src="assets/img/profiles/avatar-05.jpg" alt="User Image"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>17 Apr 2019 </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-danger"></i> High </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> High</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-warning"></i> Medium</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Low</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                <a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-circle-dot text-success"></i> Active </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-success"></i> Active</a>
                                                    <a class="dropdown-item" href="#"><i class="fa-regular fa-circle-dot text-danger"></i> Inactive</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_project"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_project"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Create Project Modal -->
            <div id="create_project" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Project</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Project Name</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Client</label>
                                            <select class="select">
                                                <option>Global Technologies</option>
                                                <option>Delta Infotech</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Start Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">End Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Rate</label>
                                            <input placeholder="$50" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">&nbsp;</label>
                                            <select class="select">
                                                <option>Hourly</option>
                                                <option>Fixed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Priority</label>
                                            <select class="select">
                                                <option>High</option>
                                                <option>Medium</option>
                                                <option>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Add Project Leader</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Team Leader</label>
                                            <div class="project-members">
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor" class="avatar">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Add Team</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Team Members</label>
                                            <div class="project-members">
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe" class="avatar">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles" class="avatar">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith" class="avatar">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus" class="avatar">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <span class="all-team">+2</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Description</label>
                                    <div id="editor"></div>
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Create Project Modal -->
            
            <!-- Edit Project Modal -->
            <div id="edit_project" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Project</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Project Name</label>
                                            <input class="form-control" value="Project Management" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Client</label>
                                            <select class="select">
                                                <option>Global Technologies</option>
                                                <option>Delta Infotech</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Start Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">End Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control datetimepicker" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Rate</label>
                                            <input placeholder="$50" class="form-control" value="$5000" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">&nbsp;</label>
                                            <select class="select">
                                                <option>Hourly</option>
                                                <option selected>Fixed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Priority</label>
                                            <select class="select">
                                                <option selected>High</option>
                                                <option>Medium</option>
                                                <option>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Add Project Leader</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Team Leader</label>
                                            <div class="project-members">
                                                <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor" class="avatar">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Add Team</label>
                                            <input class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Team Members</label>
                                            <div class="project-members">
                                                <a href="#" data-bs-toggle="tooltip" title="John Doe" class="avatar">
                                                    <img src="assets/img/profiles/avatar-16.jpg" alt="User Image">
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="Richard Miles" class="avatar">
                                                    <img src="assets/img/profiles/avatar-09.jpg" alt="User Image">
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="John Smith" class="avatar">
                                                    <img src="assets/img/profiles/avatar-10.jpg" alt="User Image">
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" title="Mike Litorus" class="avatar">
                                                    <img src="assets/img/profiles/avatar-05.jpg" alt="User Image">
                                                </a>
                                                <span class="all-team">+2</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Description</label>
                                    <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                                </div>
                                <div class="input-block mb-3">
                                    <label class="col-form-label">Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Project Modal -->
            
            <!-- Delete Project Modal -->
            <div class="modal custom-modal fade" id="delete_project" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Project</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Project Modal -->
            
        </div>
        <!-- /Page Wrapper -->


</div>
<!-- end main wrapper-->

<?php include 'layouts/customizer.php'; ?>
<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>


</body>

</html>