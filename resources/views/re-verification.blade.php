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
  <div class="fixed-center text-center">
  
    <q-toolbar>
      <q-toolbar-title class="text-h5 text-grey">
        <strong>Terjadi Kesalahan</strong>
      </q-toolbar-title>
    </q-toolbar>
    <p>
      <q-icon name="verified_user" color="red" size="100px" />
    </p>
    <p class="text-faded">
      <strong class="text-h6">Informasi</strong>
      <br />Tautan verifikasi anda tidak dikenali oleh server, kirim tautan verfikasi terbaru ke email anda.
    </p>
 <q-form @submit="requestAxios">

        <div class="row" style="display: flex;justify-content: center;">
          <q-card
            square
            class="shadow-1 q-pt-sm q-pb-md"
            style="width:100%"
          >
            <q-card-section>
              <div class="q-px-sm">
                <q-input
                  ref="email_employee"
                  square
                  clearable
                  class="full-width"
                  type="email"
                  label="Email"
				  :disable="loading"
				  v-model="email_employee"
                >
                  <template v-slot:prepend>
                    <q-icon name="email" />
                  </template>
                </q-input>
              </div>
            </q-card-section>

            <q-card-actions style="display: flex;justify-content: center;">
              <q-btn
                unelevated
                size="md"
                outline
				color="purple-5"
                class="text-white"
                label="kirim verifikasi"
                type="submit"
                icon-right="send"
                :disable="loading"
              />

              </q-btn>
			       <q-btn
				   :disable="loading"
					color="secondary"
					icon-right="home"
					outline
					@click="location.href = '{{ url('home') }}'"
					label="home"
				  />
            </q-card-actions>

          </q-card>
        </div>
</q-form>
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
	
	
	<script src=/axios.min.js></script>
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
	   
      // start the UI; assumes you have a <div id="q-app"></div> in your <body>
      new Vue({
        el: '#q-app',
        data: function () {
          return {
			  loading: false,
			  email_employee: "",
		  }
        },
        methods: {

			requestAxios(payload) {
			  const vm = this;

			  let object = formName;

			  for (const key in object) {
				if (object.hasOwnProperty(key)) {
				  const element = object[key];
				  // console.log(vm.$refs[key].hasError, element);

				  if (vm.$refs[key].hasError) {
					vm.$q.notify({
					  color: "warning",
					  message: `Perhatian! Kolom ${element} wajib diisi`,
					  icon: "report_problem",
					  position: "top",
					  actions: [
						{
						  label: "Tutup",
						  color: "white",
						  handler: () => {
							/* console.log('wooow') */
						  }
						}
					  ]
					});
					return;
				  }
				}
			  }

			  vm.loading = true;

			  axios
				.post("/api/v1/re-verification", {
				  email_employee: vm.email_employee
				})
				.then(function(response) {

				
				  console.log("response", response.data);
				
				  vm.loading = false;
				  
				  if(response.data.status == "invalid_email"){
					vm.$q.notify({
						color: 'red',
						message: "Maaf! Email tidak dikenali server... ",
						icon: "report_problem",
						html: true,
						actions: [{
							label: "Tutup",
							color: "white",
							handler: () => {
								/* console.log('wooow') */
							}
						}]
					});		
					return					
				  }
				  
					vm.$q.notify({
						color: 'green',
						message: "Terimakasih! Email verifikasi sudah dikirim... ",
						icon: "report_problem",
						html: true,
						actions: [{
							label: "Tutup",
							color: "white",
							handler: () => {
								/* console.log('wooow') */
							}
						}]
					});		
					return					
				  
				})
				.catch(function(error) {
					
					vm.$q.notify({
						color: 'red',
						message: "Maaf! Server tidak merespon... ",
						icon: "report_problem",
						html: true,
						actions: [{
							label: "Tutup",
							color: "white",
							handler: () => {
								/* console.log('wooow') */
							}
						}]
					});	
					
					vm.loading = false;
				});
			}	
			
		},
        // ...etc
      })
	  
		const formName = {
		  email_employee: "email karyawan"
		};	  
    </script>
  </body>
</html>