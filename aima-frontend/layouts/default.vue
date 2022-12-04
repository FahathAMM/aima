<template>
  <div>
    <div class="main-wrapper">
      <!-- Header -->
      <Appheader></Appheader>
      <!-- /Header -->

      <!-- Sidebar -->
      <sidebar></sidebar>
      <!-- /Sidebar -->

      <!-- Page Wrapper -->
      <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
          <v-app class="pa-0 ma-0" style="background-color: #f7f7f7">
            <nuxt />
          </v-app>
        </div>
        <!-- /Page Content -->
      </div>
      <!-- /Page Wrapper -->
    </div>
  </div>
</template>

<script>
import Appheader from "../components/layouts/Appheader.vue";
import Sidebar from "../components/layouts/Sidebar.vue";
export default {
  components: { Appheader, Sidebar },
  data() {
    return {};
  },
};
</script>
