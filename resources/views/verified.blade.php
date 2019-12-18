<!DOCTYPE html>
<html>
  <head>
    <!-- Do you need Material Icons? -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet" type="text/css">

    <!-- Do you need Fontawesome? -->
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

    <!-- Do you need Ionicons? -->
    <link href="https://cdn.jsdelivr.net/npm/ionicons@^4.0.0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Do you need MDI? -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@^3.0.0/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Do you need all animations? -->
    <link href="https://cdn.jsdelivr.net/npm/animate.css@^3.5.2/animate.min.css" rel="stylesheet">


    <!--
      Finally, add Quasar's CSS:
      Replace version below (1.0.0) with your desired version of Quasar.
      Add ".rtl" for the RTL support (example: quasar.rtl.min.css).
    -->
    <link href="https://cdn.jsdelivr.net/npm/quasar@^1.0.0/dist/quasar.min.css" rel="stylesheet" type="text/css">
  </head>

  <body>
<div id="q-app">
  <div :class="$q.platform.is.mobile != undefined ? 'fixed-center text-center' : 'text-center'">
    <q-toolbar style="padding:0px; margin-top:100px">
      <q-toolbar-title class="text-h5 text-grey">
        <strong>Selamat Bergabung</strong>
      </q-toolbar-title>
    </q-toolbar>
    <p>
      <q-icon name="verified_user" color="green" size="100px" />
    </p>
    <p class="text-faded">
      <strong class="text-h6">Informasi</strong>
      <br />Terimakasih sudah melakukan verifikasi akun, ketika login ternyata akun anda masih belum aktif, silahkan menghubungi admin.
    </p>
    <div class="q-pa-md q-gutter-sm">
      <q-btn
        color="secondary"
        icon="keyboard_arrow_left"
        outline
        @click="location.href = '{{ url('home') }}'"
        label="login"
      />
    </div>
  </div>
</div>
    <!-- Do you want IE support? Replace "1.0.0" with your desired Quasar version -->
    <script src="https://cdn.jsdelivr.net/npm/quasar@^1.0.0/dist/quasar.ie.polyfills.umd.min.js"></script>

    <!-- You need Vue too -->
    <script src="https://cdn.jsdelivr.net/npm/vue@latest/dist/vue.min.js"></script>

    <!--
      Add Quasar's JS:
      Replace version below (1.0.0) with your desired version of Quasar.
    -->
    <script src="https://cdn.jsdelivr.net/npm/quasar@^1.0.0/dist/quasar.umd.min.js"></script>

    <!--
      If you want to add a Quasar Language pack (other than "en-us").
      Notice "pt-br" in "i18n.pt-br.umd.min.js" for Brazilian Portuguese language pack.
      Replace version below (1.0.0) with your desired version of Quasar.
      Also check final <script> tag below to enable the language
      Language pack list: https://github.com/quasarframework/quasar/tree/dev/ui/lang
    -->
    <script src="https://cdn.jsdelivr.net/npm/quasar@^1.0.0/dist/lang/pt-br.umd.min.js"></script>

    <!--
      If you want to make Quasar components (not your own) use a specific set of icons (unless you're using Material Icons already).
      Replace version below (1.0.0) with your desired version of Quasar.
      Icon sets list: https://github.com/quasarframework/quasar/tree/dev/ui/icon-set
    -->
    <script src="https://cdn.jsdelivr.net/npm/quasar@^1.0.0/dist/icon-set/fontawesome-v5.umd.min.js"></script>

    <script>
      // if using a Quasar language pack other than the default "en-us";
      // requires the language pack style tag from above
      Quasar.lang.set(Quasar.lang.ptBr) // notice camel-case "ptBr"

      // if you want Quasar components to use a specific icon library
      // other than the default Material Icons;
      // requires the icon set style tag from above
      Quasar.iconSet.set(Quasar.iconSet.fontawesomeV5) // fontawesomeV5 is just an example

      /*
        Example kicking off the UI.
        Obviously, adapt this to your specific needs.
       */

      // custom component example, assumes you have a <div id="my-page"></div> in your <body>
      Vue.component('my-page', {
        template: '#my-page'
      })

      // start the UI; assumes you have a <div id="q-app"></div> in your <body>
      new Vue({
        el: '#q-app',
        data: function () {
          return {}
        },
        methods: {},
        // ...etc
      })
    </script>
  </body>
</html>