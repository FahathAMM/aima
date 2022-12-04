import colors from 'vuetify/es5/util/colors'

export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {

    titleTemplate: '%s - aima-frontend',
    title: 'aima-frontend',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'stylesheet', href: '/css/bootstrap.min.css' },
      { rel: 'stylesheet', href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' },
      { rel: 'stylesheet', href: '/css/font-awesome.min.css' },
      { rel: 'stylesheet', href: '/css/line-awesome.min.css' },
      { rel: 'stylesheet', href: '/css/style.css' },
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
    ],
    script: [
      {
        src: "/js/jquery-3.2.1.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src: "/js/popper.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src: "/js/bootstrap.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src: "/js/jquery.slimscroll.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src: "/plugins/morris/morris.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src: "/plugins/raphael/raphael.min.js",
        type: "text/javascript",
        body: true
      },
      {
        src: "/js/app.js",
        type: "text/javascript",
        body: true
      },
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    // '~/assets/bootstrap.css',
  ],


  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/vuetify
    '@nuxtjs/vuetify',
  ],

  axios: {
    baseURL: process.env.BASE_URL, // Used as fallback if no runtime config is provided
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest'
    },
    credentials: false,
  },

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxtjs/axios'
  ],

  // Vuetify module configuration: https://go.nuxtjs.dev/config-vuetify
  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    theme: {
      dark: false,
      themes: {
        dark: {
          primary: '#f43b48',
          primary1: colors.blue.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3
        },
        light: {
          primary: '#f43b48',
          primary1: colors.blue.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3
        }
      }
    }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}
