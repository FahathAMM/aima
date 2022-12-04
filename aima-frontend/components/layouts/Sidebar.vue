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
              <i :class="item.icon"></i>
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
              ><i :class="item.icon"></i> <span>{{ item.title }}</span></a
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
          icon: "fa fa-dashboard",
          title: "Dashboard",
          hasChild: [
            {
              title: "Admin Dashboard",
              to: "/",
              icon: "fa fa-dashboard",
            },
            {
              title: "Employee Dashboard",
              to: "/employee",
              icon: "fa fa-dashboard",
            },
          ],
        },
        {
          label: "Clients",
          icon: "fa fa-users",
          title: "Clients",
          hasChild: [
            {
              title: "All Clients",
              to: "/client",
              icon: "fa fa-users",
            },
          ],
        },
        {
          label: "Products",
          title: "single",
          icon: "fa fa-users",
        },
      ],
    };
  },
};
</script>

