(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["2d0df24a"],{"893f":function(e,t,a){"use strict";a.r(t);var o=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("q-page",{staticClass:"window-height window-width row justify-center items-center",staticStyle:{position:"absolute","z-index":"2"}},[a("div",{staticClass:"column q-pa-lg"},[a("q-form",{on:{submit:e.requestAxios}},[a("div",{staticClass:"row"},[a("q-card",{staticClass:"shadow-5 q-pb-lg",style:e.isMobileViewport?"width:310px; height:400px":"width:500px;height:400px",attrs:{square:""}},[a("q-card-section",{staticClass:"bg-blue"},[e.loading?e._e():a("div",{staticClass:"absolute-bottom-right q-mr-md",staticStyle:{transform:"translateY(50%)",position:"absolute","z-index":"9"},on:{click:function(t){return e.$router.push({path:"register"})}}},[a("q-btn",{attrs:{round:"",size:"18px",icon:"face",color:"blue-4"}},[a("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[e._v("Halaman Pendaftaran")])],1)],1),a("q-toolbar",{staticClass:"text-white"},[a("q-toolbar-title",[e._v("Login")])],1)],1),a("q-card-section",[a("div",{staticClass:"q-px-sm q-pt-xl"},[a("q-input",{ref:"email_employee",attrs:{square:"",disable:e.loading,clearable:"",type:"email",label:"Email",hint:e.isMobileViewport?"":"Wajib: isi nama lengkap karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length<=50||"Maximal 50 char"}]},scopedSlots:e._u([{key:"prepend",fn:function(){return[a("q-icon",{attrs:{name:"email"}})]},proxy:!0}]),model:{value:e.form.email_employee,callback:function(t){e.$set(e.form,"email_employee",t)},expression:"form.email_employee"}}),a("q-input",{ref:"password_employee",attrs:{square:"",disable:e.loading,clearable:"",type:"password",label:"Password",hint:e.isMobileViewport?"":"Wajib: isi nama lengkap karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length<=50||"Maximal 50 char"}]},scopedSlots:e._u([{key:"prepend",fn:function(){return[a("q-icon",{attrs:{name:"lock"}})]},proxy:!0}]),model:{value:e.form.password_employee,callback:function(t){e.$set(e.form,"password_employee",t)},expression:"form.password_employee"}})],1)]),a("q-card-actions",{staticClass:"q-px-lg"},[a("q-btn",{staticClass:"full-width text-white",attrs:{unelevated:"",size:"md",color:"purple-4",label:"Masuk",type:"submit","icon-right":e.isMobileViewport?"":"send",loading:e.loading},scopedSlots:e._u([{key:"loading",fn:function(){return[a("q-spinner-hourglass",{staticClass:"on-left"}),e._v("Wait...\n              ")]},proxy:!0}])})],1),a("q-card-section",{staticClass:"text-center q-pa-sm"},[a("p",{directives:[{name:"pointer",rawName:"v-pointer"}],staticClass:"text-grey-6",on:{click:function(t){return e.$router.push({path:"forget"})}}},[e._v("Forgot your password?")])])],1)],1)]),a("div",{staticClass:"demo-ribbon"}),a("q-toolbar",{staticClass:"q-pt-md"},[a("span",{staticClass:"text-grey",staticStyle:{"text-align":"center",width:"100%"}},[e._v("KPC@"+e._s((new Date).getFullYear()))])])],1)])},i=[],s={data:function(){return{loading:!1}},computed:{form:function(){return this["get_login_karyawan_form"]}},mounted:function(){},methods:{requestAxios:_.debounce((function(e){var t=this,a=n;for(var o in a)if(a.hasOwnProperty(o)){var i=a[o];if(void 0==t.$refs[o]&&t.$q.notify({color:"warning",message:"Perhatian! Element tidak tersedia, coba segarkan halaman",icon:"report_problem",position:"bottom"}),t.$refs[o].hasError)return void t.$q.notify({color:"warning",message:"Perhatian! Kolom ".concat(i," wajib diisi"),icon:"report_problem",position:"top",actions:[{label:"Tutup",color:"white",handler:function(){}}]})}t.loading=!0,t.$axios.post("/api/v1/login",{email_employee:t.form.email_employee,password_employee:t.form.password_employee}).then((function(e){t.vuexAction({data:null,type:"reset_form"})})).catch((function(e){t.loading=!1}))}),250)}},n={email_employee:"email karyawan",password_employee:"password karyawan"},r=s,l=a("2877"),c=Object(l["a"])(r,o,i,!1,null,null,null);t["default"]=c.exports}}]);