<template>
  <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
        <!-- v-for="(child, index) in item.hasChild" :key="index" -->
        <ul v-for="(item, index) in lists" :key="index">
          <li class="menu-title">
            <span>{{ item.label }}</span>
          </li>

          <li class="submenu" v-if="item.hasChild">
            <a href="#">
              <i class="fa fa-dashboard"></i>
              <span> {{ item.title }}</span>
              <span class="menu-arrow"></span>
            </a>
            <ul style="display: none">
              <li>
                <p v-for="(child, index) in item.hasChild" :key="index">
                  <nuxt-link
                    :class="child.to == $nuxt.$route.path ? 'active' : ''"
                    :to="child.to"
                    >{{ child.title }}
                  </nuxt-link>
                </p>
              </li>
            </ul>
          </li>
          <li v-else>
            <a href="#"
              ><i class="fa fa-users"></i> <span>{{ item.title }}</span></a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      lists: [
        {
          label: "main",
          title: "Dashboard",
          hasChild: [
            {
              title: "Admin Dashboard",
              to: "/",
            },
            {
              title: "Employee Dashboard",
              to: "/employee",
            },
          ],
        },
        {
          label: "Clients",
          title: "Clients",
          hasChild: [
            {
              title: "All Clients",
              to: "/client",
            },
          ],
        },
        {
          label: "Products",
          title: "single",
        },
      ],
    };
  },
};
</script>

