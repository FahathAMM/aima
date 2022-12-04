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

    <!-- <v-btn color="success" @click="deleteDialog = true">alert</v-btn> -->

    <v-dialog
      class="mt-10"
      v-model="AddModel"
      transition="dialog-top-transition"
      max-width="1200"
      style="min-height: 8000px; z-index: 10000"
    >
      <v-card>
        <v-toolbar flat class="header" dark dense>{{ title }} Client</v-toolbar>
        <v-container grid-list-xs>
          <v-row>
            <v-col md="8">
              <h5>Client</h5>
              <v-row>
                <v-col md="12">
                  <v-text-field
                    v-model="client.name"
                    outlined
                    dense
                    label="Name"
                    id="id"
                    :hide-details="!errors.name"
                    :error="errors && errors.name"
                    :error-messages="
                      errors && errors.name ? errors.name[0] : ''
                    "
                  ></v-text-field>
                </v-col>
                <v-col md="6">
                  <v-text-field
                    v-model="client.mobile"
                    outlined
                    type="number"
                    dense
                    label="Mobile"
                    id="id"
                    :hide-details="!errors.mobile"
                    :error="errors && errors.mobile"
                    :error-messages="
                      errors && errors.mobile ? errors.mobile[0] : ''
                    "
                  ></v-text-field>
                </v-col>
                <v-col md="6">
                  <v-text-field
                    v-model="client.telephone"
                    outlined
                    dense
                    type="number"
                    label="Telephone"
                    id="id"
                    :hide-details="!errors.telephone"
                    :error="errors && errors.telephone"
                    :error-messages="
                      errors && errors.telephone ? errors.telephone[0] : ''
                    "
                  ></v-text-field>
                </v-col>
                <v-col md="6">
                  <v-text-field
                    v-model="client.job"
                    outlined
                    dense
                    label="Job"
                    id="id"
                    :hide-details="!errors.job"
                    :error="errors && errors.job"
                    :error-messages="errors && errors.job ? errors.job[0] : ''"
                  ></v-text-field>
                </v-col>
                <v-col md="6">
                  <v-select
                    :items="['male', 'female']"
                    v-model="client.gender"
                    outlined
                    dense
                    label="Gender"
                    :hide-details="!errors.gender"
                    :error="errors && errors.gender"
                    :error-messages="
                      errors && errors.gender ? errors.gender[0] : ''
                    "
                  ></v-select>
                </v-col>
                <v-col md="12">
                  <v-text-field
                    v-model="client.city"
                    outlined
                    dense
                    label="City"
                    id="id"
                    :hide-details="!errors.city"
                    :error="errors && errors.city"
                    :error-messages="
                      errors && errors.city ? errors.city[0] : ''
                    "
                  ></v-text-field>
                </v-col>
                <div class="col-sm-6">
                  <div class="form-group">
                    <div>
                      <div class="profile-widget mb-0">
                        <div class="profile-img">
                          <a @click="onpick_attachment" class="avatar"
                            ><img
                              :src="isEdit ? client.profile : previewImage"
                              alt=""
                              height="80"
                              width="100"
                          /></a>
                        </div>
                      </div>
                      <input
                        required
                        type="file"
                        @change="attachment"
                        style="display: none"
                        accept="image/*"
                        ref="attachment_input"
                      />
                    </div>
                  </div>
                </div>

                <v-col md="12">
                  <v-textarea
                    v-model="client.address"
                    label="Address"
                    textarea
                    outlined
                    :rows="2"
                    :hide-details="!errors.address"
                    :error="errors && errors.address"
                    :error-messages="
                      errors && errors.address ? errors.address[0] : ''
                    "
                  ></v-textarea>
                </v-col>
              </v-row>
            </v-col>
            <v-col md="4">
              <h5>Bank</h5>
              <v-row>
                <v-col md="12">
                  <v-text-field
                    v-model="bank.name"
                    outlined
                    dense
                    label="Name"
                    id="id"
                    :hide-details="true"
                  ></v-text-field>
                </v-col>
                <v-col md="12">
                  <v-text-field
                    v-model="bank.branch"
                    outlined
                    dense
                    label="Branch"
                    id="id"
                    :hide-details="true"
                  ></v-text-field>
                </v-col>
                <v-col md="12">
                  <v-text-field
                    v-model="bank.account"
                    outlined
                    dense
                    label="Account"
                    id="id"
                    :hide-details="true"
                  ></v-text-field>
                </v-col>
                <v-col md="12">
                  <v-text-field
                    v-model="bank.owner"
                    outlined
                    dense
                    label="Owner"
                    id="id"
                    :hide-details="true"
                  ></v-text-field>
                </v-col>
                <v-col md="12">
                  <v-textarea
                    v-model="bank.description"
                    label="Description"
                    textarea
                    outlined
                    :rows="2"
                    :hide-details="true"
                  ></v-textarea>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-container>
        <v-card-actions class="justify-end">
          <v-btn color="primary" @click="store"> Save </v-btn>
          <v-btn @click="AddModel = false">Close</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    <v-dialog
      v-model="deleteDialog"
      :overlay="false"
      max-width="500px"
      transition="dialog-transition"
      class="rounded-lg"
    >
      <div class="modal-content rounded-lg pa-5">
        <div class="modal-body">
          <div class="form-header">
            <h3>Delete Client</h3>
            <p>Are you sure want to delete?</p>
          </div>
          <div class="modal-btn delete-action">
            <div class="row">
              <div class="col-6">
                <a
                  href="javascript:void(0);"
                  class="btn btn-primary continue-btn"
                  @click="deleteClient"
                >
                  Delete
                </a>
              </div>
              <div class="col-6">
                <a
                  href="javascript:void(0);"
                  data-dismiss="modal"
                  class="btn btn-primary cancel-btn"
                  @click="deleteDialog = false"
                  >Cancel</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </v-dialog>

    <div class="page-header">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="page-title">Clients</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Clients</li>
          </ul>
        </div>
        <div class="col-auto float-right ml-auto">
          <a
            @click="AddModel = true"
            class="btn white--text add-btn"
            data-toggle="modal"
            data-target="#add_client"
            ><i class="fa fa-plus"></i> Add Client</a
          >
          <div class="view-icons">
            <a href="clients.html" class="grid-view btn btn-link active"
              ><i class="fa fa-th"></i
            ></a>
            <a href="clients-list.html" class="list-view btn btn-link"
              ><i class="fa fa-bars"></i
            ></a>
          </div>
        </div>
      </div>
    </div>
    <!-- /Page Header -->

    <!-- Search Filter -->
    <div class="row filter-row">
      <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
          <input type="text" class="form-control floating" />
          <label class="focus-label">Client ID</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
          <input type="text" class="form-control floating" />
          <label class="focus-label">Client Name</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <a href="#" class="btn btn-success btn-block"> Search </a>
      </div>
    </div>
    <!-- Search Filter -->

    <div class="row staff-grid-row">
      <div
        class="col-md-3 col-sm-6 col-12 col-lg-3 col-xl-3"
        v-for="(item, index) in clients"
        :key="index"
      >
        <div class="profile-widget">
          <div class="profile-img">
            <a href="client-profile.html" class="avatar"
              ><img alt="" :src="item.profile" height="80" width="100"
            /></a>
          </div>
          <div class="dropdown profile-action">
            <a
              href="#"
              class="action-icon dropdown-toggle"
              data-toggle="dropdown"
              aria-expanded="false"
            >
              <v-icon>mdi-dots-vertical</v-icon>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a
                class="dropdown-item"
                href="#"
                data-toggle="modal"
                data-target="#edit_client"
                @click="updateItem(item)"
                ><i class="fa fa-pencil m-r-5"></i> Edit</a
              >
              <a
                class="dropdown-item"
                href="#"
                data-toggle="modal"
                data-target="#delete_client"
                @click="deleteItem(item)"
                ><i class="fa fa-trash-o m-r-5"></i> Delete</a
              >
            </div>
          </div>
          <h4 class="user-name m-t-10 mb-0 text-ellipsis">
            <a href="client-profile.html">{{ item && item.name }}</a>
          </h4>
          <h5 class="user-name m-t-10 mb-0 text-ellipsis">
            <a href="client-profile.html">{{ item && item.mobile }}</a>
          </h5>
          <div class="small text-muted">{{ item && item.job }}</div>
          <a
            @click="purchase(item)"
            class="btn btn-white text-primary btn-sm m-t-10"
            >Purchase</a
          >
          <a
            @click="selling(item)"
            class="btn text-primary btn-white btn-sm m-t-10"
            >Selling</a
          >
        </div>
      </div>
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
      AddModel: false,
      client: {
        name: "",
        address: "",
        gender: "",
        job: "",
        address: "",
        profile: "",
      },
      bank: {
        name: "",
        branch: "",
        account: "",
        owner: "",
        description: "",
      },
      clients: [],
      errors: [],
      imgPath: null,
      clientId: "",
      previewImage: null,
      upload: { name: "" },
      title: "",
      isEdit: false,
    };
  },
  watch: {
    AddModel(val) {
      val || this.close();
      this.title = this.isEdit ? "Edit " : "New";
    },
  },
  created() {
    console.log("baseurl" + process.env.BASE_URL);
    this.getData();
  },
  methods: {
    getData() {
      let payload = {
        params: {
          per_page: 50,
        },
      };

      this.$axios
        .get(`clients`, payload)
        .then(({ data }) => {
          this.clients = data.data;
        })
        .catch((err) => console.log(err));
    },

    mapper(obj, type) {
      let payload = new FormData();
      for (let x in obj) {
        payload.append(x, obj[x]);
      }
      if (type == "put") {
        payload.append("_method", type);
      }
      payload.append("profile", this.client.profile);

      payload.append("owner", this.bank.owner);
      payload.append("bank_name", this.bank.name);
      payload.append("branch", this.bank.branch);
      payload.append("account", this.bank.account);
      payload.append("description", this.bank.description);
      console.log(payload);
      return payload;
    },

    store() {
      if (this.isEdit) {
        let payload = this.mapper(this.client, "put");
        let id = this.client.id;
        console.log(payload);
        this.$axios
          .post(`clients/${id}`, payload)
          .then((e) => {
            this.alertMessage(e.data.message);
          })
          .catch((error) => {
            this.getErrors(error.response);
            // console.log(error.response.data.errors);
          });
      } else {
        let payload = this.mapper(this.client, "post");
        console.log(payload);
        this.$axios
          .post("clients", payload)
          .then((e) => {
            this.getData();
            this.close();
            console.log(e);
            this.alertMessage(e.data.message);
          })
          .catch((error) => {
            this.getErrors(error.response);
            // console.log(error.response.data.errors);
          });
      }
    },

    deleteItem(item) {
      this.clientId = item.id;
      this.deleteDialog = true;
      console.log(item);
    },

    deleteClient() {
      this.$axios
        .delete(`clients/${this.clientId}`)
        .then((e) => {
          this.getData();
          this.close();
          console.log(e);
          this.alertMessage(e.data.message);
          this.deleteDialog = false;
        })
        .catch((error) => {
          this.getErrors(error.response);
          // console.log(error.response.data.errors);
        });
    },

    updateItem(item) {
      console.log(item);
      this.isEdit = true;
      this.client = {
        ...item,
      };
      this.bank = {
        ...item.bank,
      };
      console.log(this.client);
      this.AddModel = true;
    },

    onpick_attachment() {
      this.$refs.attachment_input.click();
    },

    attachment(e) {
      this.client.profile = e.target.files[0] || "";
      let input = this.$refs.attachment_input;
      let file = input.files;
      if (file && file[0]) {
        let reader = new FileReader();
        reader.onload = (e) => {
          this.previewImage = e.target.result;
        };
        reader.readAsDataURL(file[0]);
        this.$emit("input", file[0]);
      }
      console.log(this.client.profile);
    },

    purchase(item) {
      this.$router.push(`/client/${item.id}`);
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
