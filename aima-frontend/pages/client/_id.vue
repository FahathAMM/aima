<template>
  <div>
    <!-- Page Header -->
    <v-snackbar
      v-model="snackbar"
      absolute
      min-width="5"
      class="alert-snackbar"
      top
    >
      {{ text }}
      <!-- :timeout="timeout" -->
    </v-snackbar>
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="page-title">Purchase</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a>Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Purchase</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="card mb-0">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="profile-view">
              <div class="profile-img-wrap">
                <div class="profile-img">
                  <a href="#"
                    ><img
                      alt=""
                      src="https://image.shutterstock.com/image-photo/stock-photo-portrait-of-smiling-red-haired-millennial-man-looking-at-camera-sitting-in-caf-or-coffeeshop-250nw-1194497251.jpg"
                  /></a>
                </div>
              </div>
              <div class="profile-basic">
                <div class="row">
                  <div class="col-md-5">
                    <div class="profile-info-left">
                      <h3 class="user-name m-t-0 mb-0">
                        {{ client.name || "---" }}
                      </h3>
                      <h6 class="text-muted">{{ client.job || "---" }}</h6>
                      <small class="text-muted">{{
                        client.gender || "---"
                      }}</small>
                      <div class="staff-id">
                        Employee ID : FT-00{{ client.id || "---" }}
                      </div>
                      <div class="small doj text-muted">
                        Date of Join : {{ client.created_at || "---" }}
                      </div>
                      <div class="staff-msg">
                        <a class="btn btn-custom" href="chat.html"
                          >Send Message</a
                        >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <ul class="personal-info">
                      <li>
                        <div class="title">Phone:</div>
                        <div class="text">
                          <a href="">{{ client.mobile || "---" }}</a>
                        </div>
                      </li>
                      <li>
                        <div class="title">Telephone:</div>
                        <div class="text">
                          <a href="">{{ client.telephone || "---" }}</a>
                        </div>
                      </li>
                      <li>
                        <div class="title">Email:</div>
                        <div class="text">
                          <a href="">{{ client.mobile || "---" }}</a>
                        </div>
                      </li>
                      <li>
                        <div class="title">City:</div>
                        <div class="text">{{ client.city || "---" }}</div>
                      </li>
                      <li>
                        <div class="title">Address:</div>
                        <div class="text">
                          {{ client.address || "---" }}
                        </div>
                      </li>
                      <li>
                        <div class="title">Gender:</div>
                        <div class="text">{{ client.gender || "---" }}</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="pro-edit">
                <a
                  data-target="#profile_info"
                  data-toggle="modal"
                  class="edit-icon"
                  href="#"
                  ><i class="fa fa-pencil"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card tab-box">
      <div class="row user-tabs">
        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
          <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="nav-item">
              <a href="#emp_profile" data-toggle="tab" class="nav-link active"
                >Profile</a
              >
            </li>
            <li class="nav-item">
              <a href="#emp_projects" data-toggle="tab" class="nav-link"
                >Projects</a
              >
            </li>
            <li class="nav-item">
              <a href="#bank_statutory" data-toggle="tab" class="nav-link"
                >Bank & Statutory
                <small class="text-danger">(Admin Only)</small></a
              >
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="tab-content">
      <!-- Profile Info Tab -->
      <div id="emp_profile" class="pro-overview tab-pane fade show active">
        <div class="row">
          <div class="col-md-12 d-flex">
            <div class="card profile-box flex-fill">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-hover table-white">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th class="col-sm-2">Item</th>
                            <th class="col-md-6">Description</th>
                            <th style="width: 100px">Purchase Cost</th>
                            <th style="width: 100px">Selling Amount</th>
                            <th style="width: 80px">Qty</th>
                            <th>Amount</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>
                              <input
                                v-model="temp.item"
                                class="form-control"
                                type="text"
                                style="min-width: 180px"
                              />
                            </td>
                            <td>
                              <input
                                v-model="temp.description"
                                class="form-control"
                                type="text"
                                style="min-width: 180px"
                              />
                            </td>
                            <td>
                              <input
                                v-model="temp.purchase_amount"
                                class="form-control"
                                style="width: 120px"
                                @keyup="totalAmount"
                                type="number"
                              />
                            </td>
                            <td>
                              <input
                                v-model="temp.selling_amount"
                                class="form-control"
                                style="width: 120px"
                                type="number"
                              />
                            </td>
                            <td>
                              <input
                                v-model="temp.qty"
                                class="form-control"
                                style="width: 120px"
                                type="number"
                                @keyup="totalAmount"
                              />
                            </td>
                            <td>
                              <input
                                v-model="temp.total_purchase"
                                class="form-control"
                                readonly
                                style="width: 120px"
                                type="number"
                              />
                            </td>
                            <td>
                              <a
                                @click="addPurchaseData"
                                class="text-success font-18"
                                title="Add"
                                ><i class="fa fa-plus"></i
                              ></a>
                            </td>
                          </tr>
                          <tr v-for="(item, index) in purchseData" :key="index">
                            <td>1</td>
                            <td>
                              <input
                                v-model="item.item"
                                class="form-control"
                                type="text"
                                readonly
                                style="min-width: 180px"
                              />
                            </td>
                            <td>
                              <input
                                v-model="item.description"
                                class="form-control"
                                type="text"
                                readonly
                                style="min-width: 180px"
                              />
                            </td>
                            <td>
                              <input
                                v-model="item.purchase_amount"
                                class="form-control"
                                readonly
                                style="width: 120px"
                                type="number"
                              />
                            </td>
                            <td>
                              <input
                                v-model="item.selling_amount"
                                class="form-control"
                                readonly
                                style="width: 120px"
                                type="number"
                              />
                            </td>
                            <td>
                              <input
                                v-model="item.qty"
                                class="form-control"
                                readonly
                                style="width: 120px"
                                type="number"
                                @keyup="totalAmount"
                              />
                            </td>
                            <td>
                              <input
                                v-model="item.total_purchase"
                                class="form-control"
                                readonly
                                style="width: 120px"
                                type="text"
                              />
                            </td>
                            <td>
                              <a
                                @click="removePurchaseData(index)"
                                class="text-danger font-18"
                                title="Remove"
                                ><i class="fa fa-trash-o"></i
                              ></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover table-white">
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">Total Purchase</td>
                            <td>
                              {{ total.purchse }}
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">Total Selling</td>
                            <td
                              style="
                                text-align: right;
                                padding-right: 30px;
                                width: 230px;
                              "
                            >
                              {{ total.selling }}
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">Total Profit</td>
                            <td
                              style="
                                text-align: right;
                                padding-right: 30px;
                                width: 230px;
                              "
                            >
                              {{ total.profit }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <v-btn color="primary" @click="store"> Save </v-btn>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-2 d-flex pa-0">
            <div class="col-md-12 col-sm-12 pt-0 col-lg-12 col-xl-3">
              <div
                class="card dash-widget elevation-0"
                v-for="(item, index) in totalCount"
                :key="index"
              >
                <div class="card-body">
                  {{ item.amount }}
                  <span class="dash-widget-icon"
                    ><i class="fa fa-usd"> </i
                  ></span>
                  <div class="dash-widget-info">
                    <h4></h4>
                    <span>{{ item.title }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-10 d-flex pt-0">
            <div class="card profile-box flex-fill">
              <div class="card-body">
                <v-data-table
                  dense
                  :headers="headers"
                  :items="data"
                  item-key="name"
                  class="elevation-0"
                >
                  <template v-slot:item.action="{ item }">
                    <v-icon small class="mr-2" @click="editItem(item)">
                      mdi-pencil
                    </v-icon>
                    <v-icon small @click="deleteItem(item)">
                      mdi-delete
                    </v-icon>
                  </template>
                  <template v-slot:no-data>
                    <v-btn color="primary" @click="initialize"> Reset </v-btn>
                  </template>
                </v-data-table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
              <div class="card-body">
                <h3 class="card-title">Bank information</h3>
                <ul class="personal-info">
                  <li>
                    <div class="title">Bank name</div>
                    <div class="text">{{ bank.name || "---" }}</div>
                  </li>
                  <li>
                    <div class="title">Branch</div>
                    <div class="text">{{ bank.branch || "---" }}</div>
                  </li>
                  <li>
                    <div class="title">Bank account No.</div>
                    <div class="text">{{ bank.name || "---" }}</div>
                  </li>
                  <li>
                    <div class="title">Owner</div>
                    <div class="text">{{ bank.owner || "---" }}</div>
                  </li>
                  <li>
                    <div class="title">Description</div>
                    <div class="text">{{ bank.description || "---" }}</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
              <div class="card-body">
                <h3 class="card-title">
                  Family Informations
                  <a
                    href="#"
                    class="edit-icon"
                    data-toggle="modal"
                    data-target="#family_info_modal"
                    ><i class="fa fa-pencil"></i
                  ></a>
                </h3>
                <div class="table-responsive">
                  <table class="table table-nowrap">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Relationship</th>
                        <th>Date of Birth</th>
                        <th>Phone</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Leo</td>
                        <td>Brother</td>
                        <td>Feb 16th, 2019</td>
                        <td>9876543210</td>
                        <td class="text-right">
                          <div class="dropdown dropdown-action">
                            <a
                              aria-expanded="false"
                              data-toggle="dropdown"
                              class="action-icon dropdown-toggle"
                              href="#"
                              ><i class="material-icons">more_vert</i></a
                            >
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="#" class="dropdown-item"
                                ><i class="fa fa-pencil m-r-5"></i> Edit</a
                              >
                              <a href="#" class="dropdown-item"
                                ><i class="fa fa-trash-o m-r-5"></i> Delete</a
                              >
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
        </div>
        <div class="row">
          <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
              <div class="card-body">
                <h3 class="card-title">
                  Education Informations
                  <a
                    href="#"
                    class="edit-icon"
                    data-toggle="modal"
                    data-target="#education_info"
                    ><i class="fa fa-pencil"></i
                  ></a>
                </h3>
                <div class="experience-box">
                  <ul class="experience-list">
                    <li>
                      <div class="experience-user">
                        <div class="before-circle"></div>
                      </div>
                      <div class="experience-content">
                        <div class="timeline-content">
                          <a href="#/" class="name"
                            >International College of Arts and Science (UG)</a
                          >
                          <div>Bsc Computer Science</div>
                          <span class="time">2000 - 2003</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="experience-user">
                        <div class="before-circle"></div>
                      </div>
                      <div class="experience-content">
                        <div class="timeline-content">
                          <a href="#/" class="name"
                            >International College of Arts and Science (PG)</a
                          >
                          <div>Msc Computer Science</div>
                          <span class="time">2000 - 2003</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
              <div class="card-body">
                <h3 class="card-title">
                  Experience
                  <a
                    href="#"
                    class="edit-icon"
                    data-toggle="modal"
                    data-target="#experience_info"
                    ><i class="fa fa-pencil"></i
                  ></a>
                </h3>
                <div class="experience-box">
                  <ul class="experience-list">
                    <li>
                      <div class="experience-user">
                        <div class="before-circle"></div>
                      </div>
                      <div class="experience-content">
                        <div class="timeline-content">
                          <a href="#/" class="name"
                            >Web Designer at Zen Corporation</a
                          >
                          <span class="time"
                            >Jan 2013 - Present (5 years 2 months)</span
                          >
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="experience-user">
                        <div class="before-circle"></div>
                      </div>
                      <div class="experience-content">
                        <div class="timeline-content">
                          <a href="#/" class="name">Web Designer at Ron-tech</a>
                          <span class="time"
                            >Jan 2013 - Present (5 years 2 months)</span
                          >
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="experience-user">
                        <div class="before-circle"></div>
                      </div>
                      <div class="experience-content">
                        <div class="timeline-content">
                          <a href="#/" class="name"
                            >Web Designer at Dalt Technology</a
                          >
                          <span class="time"
                            >Jan 2013 - Present (5 years 2 months)</span
                          >
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Profile Info Tab -->

      <!-- Projects Tab -->
      <div class="tab-pane fade" id="emp_projects">
        <div class="row">
          <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="dropdown profile-action">
                  <a
                    aria-expanded="false"
                    data-toggle="dropdown"
                    class="action-icon dropdown-toggle"
                    href="#"
                    ><i class="material-icons">more_vert</i></a
                  >
                  <div class="dropdown-menu dropdown-menu-right">
                    <a
                      data-target="#edit_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-pencil m-r-5"></i> Edit</a
                    >
                    <a
                      data-target="#delete_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-trash-o m-r-5"></i> Delete</a
                    >
                  </div>
                </div>
                <h4 class="project-title">
                  <a href="project-view.html">Office Management</a>
                </h4>
                <small class="block text-ellipsis m-b-15">
                  <span class="text-xs">1</span>
                  <span class="text-muted">open tasks, </span>
                  <span class="text-xs">9</span>
                  <span class="text-muted">tasks completed</span>
                </small>
                <p class="text-muted">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. When an unknown printer took a galley of
                  type and scrambled it...
                </p>
                <div class="pro-deadline m-b-15">
                  <div class="sub-title">Deadline:</div>
                  <div class="text-muted">17 Apr 2019</div>
                </div>
                <div class="project-members m-b-15">
                  <div>Project Leader :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="Jeffery Lalor"
                        ><img alt="" src="assets/img/profiles/avatar-16.jpg"
                      /></a>
                    </li>
                  </ul>
                </div>
                <div class="project-members m-b-15">
                  <div>Team :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Doe"
                        ><img alt="" src="assets/img/profiles/avatar-02.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Richard Miles"
                        ><img alt="" src="assets/img/profiles/avatar-09.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Smith"
                        ><img alt="" src="assets/img/profiles/avatar-10.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Mike Litorus"
                        ><img alt="" src="assets/img/profiles/avatar-05.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" class="all-users">+15</a>
                    </li>
                  </ul>
                </div>
                <p class="m-b-5">
                  Progress <span class="text-success float-right">40%</span>
                </p>
                <div class="progress progress-xs mb-0">
                  <div
                    style="width: 40%"
                    title=""
                    data-toggle="tooltip"
                    role="progressbar"
                    class="progress-bar bg-success"
                    data-original-title="40%"
                  ></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="dropdown profile-action">
                  <a
                    aria-expanded="false"
                    data-toggle="dropdown"
                    class="action-icon dropdown-toggle"
                    href="#"
                    ><i class="material-icons">more_vert</i></a
                  >
                  <div class="dropdown-menu dropdown-menu-right">
                    <a
                      data-target="#edit_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-pencil m-r-5"></i> Edit</a
                    >
                    <a
                      data-target="#delete_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-trash-o m-r-5"></i> Delete</a
                    >
                  </div>
                </div>
                <h4 class="project-title">
                  <a href="project-view.html">Project Management</a>
                </h4>
                <small class="block text-ellipsis m-b-15">
                  <span class="text-xs">2</span>
                  <span class="text-muted">open tasks, </span>
                  <span class="text-xs">5</span>
                  <span class="text-muted">tasks completed</span>
                </small>
                <p class="text-muted">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. When an unknown printer took a galley of
                  type and scrambled it...
                </p>
                <div class="pro-deadline m-b-15">
                  <div class="sub-title">Deadline:</div>
                  <div class="text-muted">17 Apr 2019</div>
                </div>
                <div class="project-members m-b-15">
                  <div>Project Leader :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="Jeffery Lalor"
                        ><img alt="" src="assets/img/profiles/avatar-16.jpg"
                      /></a>
                    </li>
                  </ul>
                </div>
                <div class="project-members m-b-15">
                  <div>Team :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Doe"
                        ><img alt="" src="assets/img/profiles/avatar-02.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Richard Miles"
                        ><img alt="" src="assets/img/profiles/avatar-09.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Smith"
                        ><img alt="" src="assets/img/profiles/avatar-10.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Mike Litorus"
                        ><img alt="" src="assets/img/profiles/avatar-05.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" class="all-users">+15</a>
                    </li>
                  </ul>
                </div>
                <p class="m-b-5">
                  Progress <span class="text-success float-right">40%</span>
                </p>
                <div class="progress progress-xs mb-0">
                  <div
                    style="width: 40%"
                    title=""
                    data-toggle="tooltip"
                    role="progressbar"
                    class="progress-bar bg-success"
                    data-original-title="40%"
                  ></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="dropdown profile-action">
                  <a
                    aria-expanded="false"
                    data-toggle="dropdown"
                    class="action-icon dropdown-toggle"
                    href="#"
                    ><i class="material-icons">more_vert</i></a
                  >
                  <div class="dropdown-menu dropdown-menu-right">
                    <a
                      data-target="#edit_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-pencil m-r-5"></i> Edit</a
                    >
                    <a
                      data-target="#delete_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-trash-o m-r-5"></i> Delete</a
                    >
                  </div>
                </div>
                <h4 class="project-title">
                  <a href="project-view.html">Video Calling App</a>
                </h4>
                <small class="block text-ellipsis m-b-15">
                  <span class="text-xs">3</span>
                  <span class="text-muted">open tasks, </span>
                  <span class="text-xs">3</span>
                  <span class="text-muted">tasks completed</span>
                </small>
                <p class="text-muted">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. When an unknown printer took a galley of
                  type and scrambled it...
                </p>
                <div class="pro-deadline m-b-15">
                  <div class="sub-title">Deadline:</div>
                  <div class="text-muted">17 Apr 2019</div>
                </div>
                <div class="project-members m-b-15">
                  <div>Project Leader :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="Jeffery Lalor"
                        ><img alt="" src="assets/img/profiles/avatar-16.jpg"
                      /></a>
                    </li>
                  </ul>
                </div>
                <div class="project-members m-b-15">
                  <div>Team :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Doe"
                        ><img alt="" src="assets/img/profiles/avatar-02.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Richard Miles"
                        ><img alt="" src="assets/img/profiles/avatar-09.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Smith"
                        ><img alt="" src="assets/img/profiles/avatar-10.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Mike Litorus"
                        ><img alt="" src="assets/img/profiles/avatar-05.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" class="all-users">+15</a>
                    </li>
                  </ul>
                </div>
                <p class="m-b-5">
                  Progress <span class="text-success float-right">40%</span>
                </p>
                <div class="progress progress-xs mb-0">
                  <div
                    style="width: 40%"
                    title=""
                    data-toggle="tooltip"
                    role="progressbar"
                    class="progress-bar bg-success"
                    data-original-title="40%"
                  ></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="dropdown profile-action">
                  <a
                    aria-expanded="false"
                    data-toggle="dropdown"
                    class="action-icon dropdown-toggle"
                    href="#"
                    ><i class="material-icons">more_vert</i></a
                  >
                  <div class="dropdown-menu dropdown-menu-right">
                    <a
                      data-target="#edit_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-pencil m-r-5"></i> Edit</a
                    >
                    <a
                      data-target="#delete_project"
                      data-toggle="modal"
                      href="#"
                      class="dropdown-item"
                      ><i class="fa fa-trash-o m-r-5"></i> Delete</a
                    >
                  </div>
                </div>
                <h4 class="project-title">
                  <a href="project-view.html">Hospital Administration</a>
                </h4>
                <small class="block text-ellipsis m-b-15">
                  <span class="text-xs">12</span>
                  <span class="text-muted">open tasks, </span>
                  <span class="text-xs">4</span>
                  <span class="text-muted">tasks completed</span>
                </small>
                <p class="text-muted">
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry. When an unknown printer took a galley of
                  type and scrambled it...
                </p>
                <div class="pro-deadline m-b-15">
                  <div class="sub-title">Deadline:</div>
                  <div class="text-muted">17 Apr 2019</div>
                </div>
                <div class="project-members m-b-15">
                  <div>Project Leader :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="Jeffery Lalor"
                        ><img alt="" src="assets/img/profiles/avatar-16.jpg"
                      /></a>
                    </li>
                  </ul>
                </div>
                <div class="project-members m-b-15">
                  <div>Team :</div>
                  <ul class="team-members">
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Doe"
                        ><img alt="" src="assets/img/profiles/avatar-02.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Richard Miles"
                        ><img alt="" src="assets/img/profiles/avatar-09.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="John Smith"
                        ><img alt="" src="assets/img/profiles/avatar-10.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="Mike Litorus"
                        ><img alt="" src="assets/img/profiles/avatar-05.jpg"
                      /></a>
                    </li>
                    <li>
                      <a href="#" class="all-users">+15</a>
                    </li>
                  </ul>
                </div>
                <p class="m-b-5">
                  Progress <span class="text-success float-right">40%</span>
                </p>
                <div class="progress progress-xs mb-0">
                  <div
                    style="width: 40%"
                    title=""
                    data-toggle="tooltip"
                    role="progressbar"
                    class="progress-bar bg-success"
                    data-original-title="40%"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Projects Tab -->

      <!-- Bank Statutory Tab -->
      <div class="tab-pane fade" id="bank_statutory">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Basic Salary Information</h3>
            <form>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Salary basis <span class="text-danger">*</span></label
                    >
                    <select class="select">
                      <option>Select salary basis type</option>
                      <option>Hourly</option>
                      <option>Daily</option>
                      <option>Weekly</option>
                      <option>Monthly</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Salary amount
                      <small class="text-muted">per month</small></label
                    >
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Type your salary amount"
                        value="0.00"
                      />
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Payment type</label>
                    <select class="select">
                      <option>Select payment type</option>
                      <option>Bank transfer</option>
                      <option>Check</option>
                      <option>Cash</option>
                    </select>
                  </div>
                </div>
              </div>
              <hr />
              <h3 class="card-title">PF Information</h3>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">PF contribution</label>
                    <select class="select">
                      <option>Select PF contribution</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >PF No. <span class="text-danger">*</span></label
                    >
                    <select class="select">
                      <option>Select PF contribution</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Employee PF rate</label>
                    <select class="select">
                      <option>Select PF contribution</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Additional rate <span class="text-danger">*</span></label
                    >
                    <select class="select">
                      <option>Select additional rate</option>
                      <option>0%</option>
                      <option>1%</option>
                      <option>2%</option>
                      <option>3%</option>
                      <option>4%</option>
                      <option>5%</option>
                      <option>6%</option>
                      <option>7%</option>
                      <option>8%</option>
                      <option>9%</option>
                      <option>10%</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Total rate</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="N/A"
                      value="11%"
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Employee PF rate</label>
                    <select class="select">
                      <option>Select PF contribution</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Additional rate <span class="text-danger">*</span></label
                    >
                    <select class="select">
                      <option>Select additional rate</option>
                      <option>0%</option>
                      <option>1%</option>
                      <option>2%</option>
                      <option>3%</option>
                      <option>4%</option>
                      <option>5%</option>
                      <option>6%</option>
                      <option>7%</option>
                      <option>8%</option>
                      <option>9%</option>
                      <option>10%</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Total rate</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="N/A"
                      value="11%"
                    />
                  </div>
                </div>
              </div>

              <hr />
              <h3 class="card-title">ESI Information</h3>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">ESI contribution</label>
                    <select class="select">
                      <option>Select ESI contribution</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >ESI No. <span class="text-danger">*</span></label
                    >
                    <select class="select">
                      <option>Select ESI contribution</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Employee ESI rate</label>
                    <select class="select">
                      <option>Select ESI contribution</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Additional rate <span class="text-danger">*</span></label
                    >
                    <select class="select">
                      <option>Select additional rate</option>
                      <option>0%</option>
                      <option>1%</option>
                      <option>2%</option>
                      <option>3%</option>
                      <option>4%</option>
                      <option>5%</option>
                      <option>6%</option>
                      <option>7%</option>
                      <option>8%</option>
                      <option>9%</option>
                      <option>10%</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Total rate</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="N/A"
                      value="11%"
                    />
                  </div>
                </div>
              </div>

              <div class="submit-section">
                <button class="btn btn-primary submit-btn" type="submit">
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /Bank Statutory Tab -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      deleteDialog: false,
      snackbar: false,
      text: "",
      timeout: 2000,
      temp: {
        item: "",
        selling_amount: 0,
        purchase_amount: 0,
        description: "",
        qty: 0,
        total_selling: 0,
        total_purchase: 0,
        client_id: this.$route.params.id,
      },
      total: {
        purchse: 0,
        profit: 0,
        selling: 0,
      },
      client: {},
      bank: {},
      purchseData: [],
      errors: [],
      data: [],
      totalCount: [],

      headers: [
        {
          text: "Item",
          align: "start",
          sortable: false,
          value: "item",
        },
        { text: "QTY", value: "qty" },
        { text: "Purchase Amount", value: "purchase_amount" },
        { text: "Selling Amount", value: "selling_amount" },
        { text: "Total Selling", value: "total_selling" },
        { text: "Date", value: "created_at" },
        { text: "Description", value: "description" },
        { text: "Action", value: "action" },
      ],
    };
  },
  watch: {
    AddModel(val) {
      val || this.close();
      this.title = this.isEdit ? "Edit " : "New";
    },
  },
  created() {
    this.getData();
    this.getTotalCount();
    this.getClient();
  },
  methods: {
    totalAmount() {
      let purchase = this.temp.purchase_amount;
      let selling = this.temp.selling_amount;
      let qty = this.temp.qty;
      let total_purchase = parseFloat(purchase) * qty;
      let total_selling = parseFloat(selling) * qty;
      this.temp.total_purchase = total_purchase || 0;
      this.temp.total_selling = total_selling || 0;
    },

    addPurchaseData() {
      if (this.temp.item == "") {
        alert("Enter atlease one purchase");
        return;
      }
      this.purchseData.push(this.temp);
      this.calTotalPurchase();
      this.resetTemp();
    },

    resetTemp() {
      this.temp = {
        item: "",
        selling_amount: 0,
        purchase_amount: 0,
        description: "",
        qty: 0,
        total_selling: 0,
        total_purchase: 0,
        client_id: this.$route.params.id,
      };
    },

    removePurchaseData(index) {
      this.purchseData.splice(index, 1);
      this.calTotalPurchase();
    },

    calTotalPurchase() {
      let cal_total_purchase = 0;
      let cal_total_selling = 0;
      this.purchseData.forEach((e) => {
        cal_total_purchase += parseFloat(e.total_purchase);
        cal_total_selling += parseFloat(e.total_selling);
      });

      this.total.purchse = cal_total_purchase;
      this.total.selling = cal_total_selling;
      this.total.profit =
        parseFloat(cal_total_selling) - parseFloat(cal_total_purchase);
    },

    getData() {
      let id = this.$route.params.id;
      let payload = {
        params: {
          per_page: 50,
        },
      };

      this.$axios
        .get(`get_purchase_list_by_client/${id}`, payload)
        .then(({ data }) => {
          this.data = data;
          console.log(data);
        })
        .catch((err) => console.log(err));
    },

    getTotalCount() {
      let id = this.$route.params.id;
      this.$axios
        .get(`get_total_count/${id}`)
        .then(({ data }) => {
          this.totalCount = data;
          console.log(data);
        })
        .catch((err) => console.log(err));
    },

    getClient() {
      let id = this.$route.params.id;
      this.$axios
        .get(`clients/${id}`)
        .then(({ data }) => {
          this.client = data.record;
          this.bank = data.record.bank;
          console.log(data);
        })
        .catch((err) => console.log(err));
    },

    store() {
      let payload = {
        ...this.purchseData,
      };
      console.log(payload);
      this.$axios
        .post("purchases", payload)
        .then((e) => {
          console.log(e);
          this.alertMessage(e.data.message);
        })
        .catch((error) => {
          this.getErrors(error.response);
          // console.log(error.response.data.errors);
        });
    },

    deleteItem(item) {
      this.clientId = item.id;
      this.deleteDialog = true;
    },

    deleteClient() {
      this.$axios
        .delete(`clients/${this.clientId}`)
        .then((e) => {
          this.getData();
          this.close();
          this.alertMessage(e.data.message);
          this.deleteDialog = false;
        })
        .catch((error) => {
          this.getErrors(error.response);
          // console.log(error.response.data.errors);
        });
    },

    close() {
      this.AddModel = false;
      this.previewImage = null;
      this.isEdit = false;
      setTimeout(() => {
        this.client = {};
        this.bank = {};
      }, 300);
    },

    getErrors(err) {
      if (err.status == 422) {
        this.errors = err.data.errors;
      } else {
        this.errors = [];
      }
    },

    alertMessage(txt) {
      this.text = txt;
      this.snackbar = true;
      this.close();
    },
  },
};
</script>

<style>
.alert-snackbar {
  z-index: 1500000;
}
</style>



