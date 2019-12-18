(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["61dcad98"],{1892:function(e,o,t){"use strict";t.r(o);var l=function(){var e=this,o=e.$createElement,t=e._self._c||o;return t("q-page",[t("div",{staticClass:"q-pa-md"},[null==e.rule_props||e.loading?e._e():t("info-validation",{attrs:{_rule:e.rule_props}}),t("q-card",{staticClass:"my-card"},[t("q-card-section",{staticStyle:{"padding-top":"12px"}},[t("q-toolbar",{staticStyle:{padding:"0px"}},[e.isMobileViewport?e._e():t("q-icon",{directives:[{name:"pointer",rawName:"v-pointer"}],attrs:{name:"keyboard_arrow_left",size:"lg"},on:{click:function(o){return e.$router.back()}}},[t("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[e._v("Kembali")])],1),t("q-toolbar-title",[t("q-item-section",[t("q-item-label",[e._v("Formulir Karyawan")])],1)],1)],1)],1),t("q-card-section",[t("q-form",{on:{submit:e.onSubmitHandler,reset:e.onResetHandler}},[t("div",{class:e.isMobileViewport?"row":"row q-col-gutter-md"},[t("div",{class:e.isMobileViewport?"row col-12 col-xs-2 col-sm-12 col-md-8 col-lg-8 col-xl-8":"row col-12 col-xs-2 col-sm-12 col-md-8 col-lg-8 col-xl-8 q-col-gutter-md"},[t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"name_employee",attrs:{outlined:"",counter:"",maxlength:"50",clearable:"",disable:e.loading,label:"Nama",hint:e.isMobileViewport?"":"Wajib: isi nama lengkap karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length<=50||"Maximal 50 char"}]},model:{value:e.form.name_employee,callback:function(o){e.$set(e.form,"name_employee",o)},expression:"form.name_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-select",{ref:"position_employee",attrs:{outlined:"",clearable:"",disable:e.loading,options:e.positions,"emit-value":"","map-options":"","option-value":"value",label:"Posisi",hint:e.isMobileViewport?"":"Wajib: pilih posisi karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length<=1||"Maximal 1 char"}]},scopedSlots:e._u([{key:"option",fn:function(o){return[t("q-item",e._g(e._b({},"q-item",o.itemProps,!1),o.itemEvents),[t("q-item-section",{attrs:{avatar:""}},[t("q-icon",{attrs:{name:"assignment_ind"}})],1),t("q-item-section",[t("q-item-label",{domProps:{innerHTML:e._s(o.opt.label)}})],1)],1)]}},{key:"append",fn:function(){},proxy:!0}]),model:{value:e.position_employee,callback:function(o){e.position_employee=o},expression:"position_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"nik_employee",attrs:{outlined:"",clearable:"",disable:e.loading,counter:"",maxlength:"16",type:"text",label:"Nomor Induk",hint:e.isMobileViewport?"":"Wajib: isi nomor induk karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&16==e.length||"Harus 16 char"},function(e){return!isNaN(e)||"Harus angka"}]},model:{value:e.form.nik_employee,callback:function(o){e.$set(e.form,"nik_employee",o)},expression:"form.nik_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"telpon_employee",attrs:{outlined:"",clearable:"",disable:e.loading,counter:"",maxlength:"20",type:"text",label:"Telpon",hint:e.isMobileViewport?"":"Wajib: isi nomor telpon karyawan",mask:"(+62###) #### - ########","unmasked-value":"","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length<=20||"Maximal 16 char"}]},model:{value:e.form.telpon_employee,callback:function(o){e.$set(e.form,"telpon_employee",o)},expression:"form.telpon_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"email_employee",attrs:{outlined:"",clearable:"",disable:e.loading,counter:"",maxlength:"50",type:"text",label:"Email",hint:e.isMobileViewport?"":"Wajib: isi email karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length<=50||"Maximal 50 char"},function(e){return/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(e)||"Please type correct email"}]},model:{value:e.form.email_employee,callback:function(o){e.$set(e.form,"email_employee",o)},expression:"form.email_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"birth_place_employee",attrs:{outlined:"",clearable:"",disable:e.loading,counter:"",maxlength:"50",label:"Tempat Lahir",hint:e.isMobileViewport?"":"Wajib: isi tempat lahir karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length<=50||"Maximal 50 char"}]},model:{value:e.form.birth_place_employee,callback:function(o){e.$set(e.form,"birth_place_employee",o)},expression:"form.birth_place_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"birth_date_employee",attrs:{outlined:"",clearable:"",disable:e.loading,readonly:"",mask:"date",label:"Tanggal Lahir",hint:e.isMobileViewport?"":"Wajib: isi tanggal lahir karyawan","lazy-rules":"",rules:["date"]},scopedSlots:e._u([{key:"append",fn:function(){return[t("q-icon",{staticClass:"cursor-pointer",attrs:{name:"event"}},[t("q-popup-proxy",{ref:"qDateProxy",attrs:{"transition-show":"scale","transition-hide":"scale"}},[t("q-date",{on:{input:function(){return e.$refs.qDateProxy.hide()}},model:{value:e.form.birth_date_employee,callback:function(o){e.$set(e.form,"birth_date_employee",o)},expression:"form.birth_date_employee"}})],1)],1)]},proxy:!0}]),model:{value:e.form.birth_date_employee,callback:function(o){e.$set(e.form,"birth_date_employee",o)},expression:"form.birth_date_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"},[t("div",{staticClass:"q-field__label no-pointer-events  ellipsis"},[e._v("Jenis Kelamin")]),t("q-field",{ref:"gender_employee",attrs:{borderless:"",clearable:"",disable:e.loading,hint:e.isMobileViewport?"":"Wajib: pilih jenis kelamin karyawan","lazy-rules":"",rules:[function(e){return!!e||"Required *"}]},scopedSlots:e._u([{key:"control",fn:function(){return[t("q-radio",{attrs:{"keep-color":"",val:"0",label:"Laki-laki",color:"teal"},model:{value:e.form.gender_employee,callback:function(o){e.$set(e.form,"gender_employee",o)},expression:"form.gender_employee"}}),t("q-radio",{attrs:{"keep-color":"",val:"1",label:"Perempuan",color:"orange"},model:{value:e.form.gender_employee,callback:function(o){e.$set(e.form,"gender_employee",o)},expression:"form.gender_employee"}})]},proxy:!0}]),model:{value:e.form.gender_employee,callback:function(o){e.$set(e.form,"gender_employee",o)},expression:"form.gender_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"},[t("div",{staticClass:"q-field__label no-pointer-events  ellipsis"},[e._v("Status Pernikahan")]),t("q-field",{ref:"marital_employee",attrs:{borderless:"",clearable:"",disable:e.loading,hint:e.isMobileViewport?"":"Wajib: pilih status pernikahan karyawan","lazy-rules":"",rules:[function(e){return!!e||"Required *"}]},scopedSlots:e._u([{key:"control",fn:function(){return[t("q-radio",{attrs:{"keep-color":"",val:"0",label:"Lajang",color:"red"},model:{value:e.form.marital_employee,callback:function(o){e.$set(e.form,"marital_employee",o)},expression:"form.marital_employee"}}),t("q-radio",{attrs:{"keep-color":"",val:"1",label:"Menikah",color:"cyan"},model:{value:e.form.marital_employee,callback:function(o){e.$set(e.form,"marital_employee",o)},expression:"form.marital_employee"}})]},proxy:!0}]),model:{value:e.form.marital_employee,callback:function(o){e.$set(e.form,"marital_employee",o)},expression:"form.marital_employee"}})],1),t("div",{staticClass:"col-12",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-input",{ref:"address_employee",attrs:{outlined:"",clearable:"",disable:e.loading,label:"Alamat",hint:e.isMobileViewport?"":"Wajib: isi alamat karyawan",counter:"",type:"textarea","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length>=10||"Minimal 10 char"}]},model:{value:e.form.address_employee,callback:function(o){e.$set(e.form,"address_employee",o)},expression:"form.address_employee"}})],1),e.updated?t("q-toggle",{staticClass:"full-width q-mb-md",attrs:{label:"Perbarui password?"},model:{value:e.renewal_password,callback:function(o){e.renewal_password=o},expression:"renewal_password"}}):e._e(),e.renewal_password||!e.updated?t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"password_employee",attrs:{outlined:"",clearable:"",disable:e.loading,counter:"",type:"password",label:"Password",hint:e.isMobileViewport?"":"Wajib: isi password karyawan","lazy-rules":"",rules:[function(e){return e&&e.length>0||"Required *"},function(e){return e&&e.length>=5||"Minimal 5 char"}]},model:{value:e.form.password_employee,callback:function(o){e.$set(e.form,"password_employee",o)},expression:"form.password_employee"}})],1):e._e(),e.renewal_password||!e.updated?t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:15px":""},[t("q-input",{ref:"password_confirmation",attrs:{outlined:"",clearable:"",disable:e.loading,counter:"",label:"Password Confirmation",minlength:"5",type:e.password_confirmation.visibility?"password":"text",hint:e.isMobileViewport?"":"Wajib: isi konfirmasi password karyawan",rules:[e.passwordConfirmationRule]},scopedSlots:e._u([{key:"append",fn:function(){return[t("q-icon",{staticClass:"cursor-pointer",attrs:{name:e.password_confirmation.visibility?"visibility_off":"visibility"},on:{click:function(o){e.password_confirmation.visibility=!e.password_confirmation.visibility}}})]},proxy:!0}],null,!1,1197848416),model:{value:e.password_confirmation.confirmation,callback:function(o){e.$set(e.password_confirmation,"confirmation",o)},expression:"password_confirmation.confirmation"}})],1):e._e()],1),t("div",{class:(e.isMobileViewport,"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4")},[t("q-field",{ref:"photo_employee",attrs:{borderless:"",hint:e.isMobileViewport?"":"Opsional: upload foto profil di HP"},model:{value:e.form.photo_employee,callback:function(o){e.$set(e.form,"photo_employee",o)},expression:"form.photo_employee"}},[t("q-uploader",{staticStyle:{width:"100%"},attrs:{label:"Foto",factory:e.onFilePickerHandler},scopedSlots:e._u([{key:"header",fn:function(o){return[t("div",{staticClass:"row no-wrap items-center q-pa-sm q-gutter-xs"},[o.queuedFiles.length>0&&e.isMobileViewport?t("q-btn",{attrs:{disable:e.loading,icon:"delete",round:"",dense:"",flat:""},on:{click:o.removeQueuedFiles}},[t("q-tooltip",{attrs:{"content-style":"font-size: 13px"}},[e._v("Hapus semua gambar")])],1):e._e(),o.uploadedFiles.length>0?t("q-btn",{attrs:{disable:e.loading,icon:"done_all",round:"",dense:"",flat:""},on:{click:o.removeUploadedFiles}},[t("q-tooltip",{attrs:{"content-style":"font-size: 13px"}},[e._v("Hapus gambar dari upload")])],1):e._e(),t("div",{staticClass:"col"},[t("div",{staticClass:"q-uploader__title"},[e._v("Foto Profil")]),t("div",{staticClass:"q-uploader__subtitle"},[e._v("silahkan diisi")])]),o.canAddFiles?t("q-btn",{attrs:{disable:e.loading,type:"a",icon:"add_box",round:"",dense:"",flat:""}},[t("q-uploader-add-trigger"),t("q-tooltip",{attrs:{"content-style":"font-size: 13px"}},[e._v("Ambil gambar")])],1):e._e()],1)]}},{key:"list",fn:function(o){return[t("q-list",{attrs:{separator:""}},e._l(o.files,(function(l){return t("q-item",{key:l.name},[t("q-item-section",[t("q-item-label",{staticClass:"full-width ellipsis"},[e._v("\n                                                                "+e._s(l.name)+"\n                                                            ")]),t("q-item-label",{attrs:{caption:""}},[e._v("\n                                                                Status: "+e._s(l.__status)+"\n                                                            ")]),t("q-item-label",{attrs:{caption:""}},[e._v("\n                                                                "+e._s(l.__sizeLabel)+" / "+e._s(l.__progressLabel)+"\n                                                            ")])],1),l.__img?t("q-item-section",{staticStyle:{margin:"0px"},attrs:{thumbnail:""}},[t("img",{directives:[{name:"pointer",rawName:"v-pointer"}],staticStyle:{height:"100%"},attrs:{src:l.__img.src},on:{click:function(o){return e.onZoom(l.__img.src)},load:function(o){return e.onFilePickerHandler(l.__img.src)}}})]):e._e(),e.isMobileViewport?e._e():t("q-item-section",{attrs:{top:"",side:""}},[t("q-btn",{staticClass:"gt-xs",attrs:{size:"12px",flat:"",dense:"",round:"",icon:"delete"},on:{click:function(e){return o.removeFile(l)}}},[t("q-tooltip",{attrs:{"content-style":"font-size: 12px"}},[e._v("Hapus gambar")])],1)],1)],1)})),1)]}}])})],1),e.updated||e.form.photo_employee.length>0?t("div",[t("div",{staticClass:"q-pb-md q-mt-md text-center text-bold text-black-4"},[e._v("Photo Terakhir")]),t("div",{staticStyle:{display:"flex","justify-content":"center","margin-bottom":"30px"}},[t("img",{directives:[{name:"pointer",rawName:"v-pointer"}],staticStyle:{height:"100%",width:"100%","border-radius":"10px"},attrs:{id:"image",src:e.form.photo_employee},on:{click:function(o){return e.onZoom(e.form.photo_employee)}}})])]):e._e()],1)]),t("div",{class:e.isMobileViewport?"":"q-pt-lg q-pb-mb",style:e.isMobileViewport?"display: flex; justify-content: center; margin-top: 0px;":""},[t("q-btn",{staticStyle:{"min-width":"150px"},attrs:{color:"primary",label:"proses ",type:"submit",outline:"",loading:e.loading},scopedSlots:e._u([{key:"loading",fn:function(){return[t("q-spinner-hourglass",{staticClass:"on-left"}),e._v("\n                                Wait...\n                              ")]},proxy:!0}])},[t("q-icon",{staticClass:"q-pl-lg",attrs:{name:"cloud_upload"}})],1),e.isMobileViewport?e._e():t("q-btn",{staticClass:"q-ml-sm",attrs:{disable:e.loading,label:"Reset",type:"reset",color:"primary",outline:""}}),e.isMobileViewport?e._e():t("q-btn",{staticClass:"q-ml-sm",attrs:{disable:e.loading,label:"Sebelumnya",color:"primary",outline:""},on:{click:function(o){return e.$router.back()}}}),e.isMobileViewport?t("q-btn",{staticClass:"q-ml-sm",attrs:{disable:e.loading,round:"",icon:"delete_outline",type:"reset",color:"primary",outline:""}}):e._e(),e.isMobileViewport?t("q-btn",{staticClass:"q-ml-sm",attrs:{disable:e.loading,round:"",icon:"keyboard_arrow_left",color:"primary",outline:""},on:{click:function(o){return e.$router.back()}}}):e._e()],1)])],1)],1)],1),t("scroll-to-top")],1)},a=[],i=(t("551c"),t("6b54"),t("06db"),t("5c56")),r=t("0831"),n=r["a"].getScrollTarget,s=r["a"].setScrollPosition,c={mixins:[i["a"]],data:function(){return{loading:!1,buildURL:"/api/v1/employee",picked:!1,positions:p,renewal_password:!1,rule_props:null}},computed:{password_confirmation:function(){return this["get_formulir_karyawan_password_confirmation"]},form:function(){return this["get_formulir_karyawan_form"]},updated:function(){return this.$store.state.formulir_karyawan.data.update},position_employee:{get:function(){return this.form.position_employee.toString()},set:function(e){this.form.position_employee=e.toString()}}},mounted:function(){this.updated&&this.imageExist(this.form.photo_employee,"image")},methods:{passwordConfirmationRule:function(e){var o=this;return new Promise((function(t,l){e!==o.form.password_employee&&t("Password konfirmasi salah"),t(!!e.toString()||"* Required")}))},actionVuex:function(e){this["set_formulir_karyawan"]({data:e.data,type:e.type})},requestAxios:_.debounce((function(){var e=this;e.$axios[e.updated?"put":"post"](e.buildURL,e.form).then((function(o){if(e.loading=!1,"validation"!=o.data.status)o.data.payload&&(e.actionVuex({data:null,type:"reset_form"}),e["set_karyawan_biodata"]({data:o.data.payload,type:"replace"}),e.$router.push({name:"private-redirect-success-karyawan"}));else{var t=o.data.payload,l="";for(var a in t)if(t.hasOwnProperty(a)){var i=t[a];l+="- "+i+"<br>"}e.rule_props=l;var r=n(document.getElementById("top-element")),c=document.getElementById("top-element").offsetTop,m=750;s(r,c,m)}})).catch((function(o){e.loading=!1}))}),1e3),onFilePickerHandler:function(e){this.picked=!0,this.form.photo_employee=e},onSubmitHandler:function(){var e=this,o=m;for(var t in e.renewal_password&&(o["password_employee"]="password karyawan"),o)if(o.hasOwnProperty(t)){var l=o[t];if(e.$refs[t].hasError)return void e.$q.notify({color:"warning",message:"Perhatian! Kolom ".concat(l," wajib diisi"),icon:"report_problem",position:"top",actions:[{label:"Tutup",color:"white",handler:function(){}}]})}e.requestAxios(),e.loading=!0},onResetHandler:function(){this.actionVuex({data:null,type:"reset_form"})}}},m={name_employee:"mama karyawan",position_employee:"posisi karyawan",nik_employee:"nomor induk karyawan",telpon_employee:"telpon karyawan",email_employee:"email karyawan",birth_place_employee:"tempat lahir karyawan",birth_date_employee:"tanggal lahir karyawan",gender_employee:"jenis kelamin karyawan",marital_employee:"status pernikahan karyawan",address_employee:"alamat karyawan",photo_employee:"foto profil karyawan"},p=[{label:"Super Admin",value:"0",disable:!1,required:!1,category:"0"},{label:"Supervisor",value:"1",disable:!1,required:!1,category:"1"},{label:"Temperature Man",value:"2",disable:!1,required:!1,category:"2"}],d=c,u=(t("dd93"),t("2877")),f=Object(u["a"])(d,l,a,!1,null,"6c5bc77c",null);o["default"]=f.exports},"5c56":function(e,o,t){"use strict";t("c5f6"),t("a481"),t("7f7f");var l={beforeMount:function(){if(this.get_user||"login"==this.$route.name)if(this.get_credentials.logged||"login"==this.$route.name){if(null==this.get_credentials.role){if("login"!=this.$route.name)return void this.$router.replace({name:"login"})}else if(void 0!=this.$route.meta.roles){for(var e=0;e<this.$route.meta.roles.length;e++){var o=this.$route.meta.roles[e];if(Number(o)==Number(this.get_credentials.role))return}"laporan"!=this.$route.name&&this.$router.replace({name:"laporan",replace:!0})}}else this.$router.replace({name:"login"});else this.$router.replace({name:"login"})}};o["a"]=l},dd93:function(e,o,t){"use strict";var l=t("ed2f"),a=t.n(l);a.a},ed2f:function(e,o,t){}}]);