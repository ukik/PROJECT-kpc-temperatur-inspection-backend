(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["6c9ff8ae","3b2bcf94"],{"0563":function(e,t,a){},"19a3":function(e,t,a){"use strict";var i=a("57ed"),n=a.n(i);n.a},"57ed":function(e,t,a){},"7f8b":function(e,t,a){"use strict";var i=a("0563"),n=a.n(i);n.a},"86e6":function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,i=e._self._c||t;return i("q-layout",{attrs:{view:"lHr LpR lfr"}},[i("q-header",{staticClass:"bg-white text-white",attrs:{elevated:"","height-hint":"100"}},[i("q-toolbar",{staticClass:"bg-white text-black"},[i("img",{staticStyle:{height:"40px"},attrs:{src:a("8c36")}}),i("q-toolbar-title",[e.isMobileViewport?e._e():i("strong",[e._v("Conveyer Inspector")]),e.get_total_unread_notification>0&&0==e.get_credentials.role?i("q-badge",{attrs:{align:"top",color:"red"}},[e._v(e._s(e.get_total_unread_notification))]):e._e()],1),i("q-btn",{staticClass:"q-ml-md",attrs:{dense:"",flat:"",size:"md",round:"",icon:"menu"},on:{click:function(t){e.left=!e.left}}})],1),"inspeksi-temperatur-panel"==e.$route.name?i("div",{staticClass:"q-gutter-y-md"},[i("q-tabs",{staticClass:"text-grey-4 bg-negative",attrs:{align:"justify","indicator-color":"white","active-color":"white","inline-label":"",value:e.get_inspection_tab}},[i("q-tab",{attrs:{name:"0",breakpoint:0,"no-caps":"",icon:"assignment",label:e.isMobileViewport?"Invalid":"Belum Divalidasi",disable:e.disabled},on:{click:function(t){return e.onTabHandler("0","inspection")}}}),i("q-tab",{attrs:{name:"1",breakpoint:0,"no-caps":"",icon:"assignment_turned_in",label:e.isMobileViewport?"Valid":"Sudah Divalidasi",disable:e.disabled},on:{click:function(t){return e.onTabHandler("1","inspection")}}})],1)],1):e._e()],1),i("q-drawer",{attrs:{width:210,breakpoint:500,bordered:"","content-class":"bg-grey-2"},on:{"!click":function(t){return e.drawerClick(t)}},model:{value:e.left,callback:function(t){e.left=t},expression:"left"}},[i("content-drawer")],1),i("q-page-container",{staticStyle:{"padding-bottom":"75px"}},[i("router-view"),1!=e.get_credentials.role?i("q-page-sticky",{staticStyle:{"z-index":"9"},attrs:{position:"bottom-right",offset:[18,18]}},[i("q-fab",{attrs:{icon:"add",direction:"up",color:"accent"}},[0==e.get_credentials.role?i("q-fab-action",{attrs:{color:"primary",icon:"person_add"},on:{click:e.gotoKaryawan}},[i("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[e._v("Buat data karyawan baru")])],1):e._e(),0==e.get_credentials.role||2==e.get_credentials.role?i("q-fab-action",{attrs:{color:"primary",icon:"playlist_add"},on:{click:e.gotoInspeksi}},[i("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[e._v("Buat Data Inspeksi")])],1):e._e()],1)],1):e._e()],1)],1)},n=[],r=(a("7f7f"),a("ea96")),s={components:{ContentDrawer:r["default"]},data:function(){return{link:"library_equipment",left:!1,disabled:!1,miniState:!1}},created:function(){this.isMobileViewport?this.left=!1:this.left=!0},computed:{avatar:function(){return this.miniState?"height: calc(100% - 0px); margin-top: 0px;":"height: calc(100% - 200px); margin-top: 200px;"}},methods:{onTabHandler:_.debounce((function(e,t){var a=this;this.disabled=!0,this.set_tab({type:t,data:e}),setTimeout((function(){a.disabled=!1}),500)}),500),drawerClick:function(e){this.miniState&&(this.miniState=!1,e.stopPropagation())},gotoKaryawan:function(){this.set_formulir_karyawan({type:"reset_form"}),"formulir-karyawan"!=this.$route.name&&this.$router.push({name:"formulir-karyawan"})},gotoInspeksi:function(){this.set_formulir_inspeksi({data:null,type:"reset_form"}),"formulir-inspeksi"!=this.$route.name&&this.$router.push({name:"formulir-inspeksi"})}}},l=s,o=(a("19a3"),a("2877")),c=Object(o["a"])(l,i,n,!1,null,"4132ec0b",null);t["default"]=c.exports},b54a:function(e,t,a){"use strict";a("386b")("link",(function(e){return function(t){return e(this,"a","href",t)}}))},ea96:function(e,t,a){"use strict";a.r(t);var i=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("fragment",[a("q-scroll-area",{style:e.avatar,attrs:{id:"drawer"}},[a("q-list",[0==e.get_credentials.role||1==e.get_credentials.role||2==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"laporan"===e.link,to:{name:"laporan"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"assessment"}})],1),a("q-item-section",[a("q-item-label",[e._v("Laporan")])],1)],1):e._e(),0==e.get_credentials.role||1==e.get_credentials.role||2==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"temperatur"===e.link,to:{name:"inspeksi-temperatur-panel"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"brightness_medium"}})],1),a("q-item-section",[a("q-item-label",[e._v("\n            Temperatur\n            "),e.get_unread_notification.inspection>0?a("q-badge",{attrs:{color:"red"}},[e._v(e._s(e.get_unread_notification.inspection))]):e._e()],1)],1)],1):e._e(),a("q-separator"),0==e.get_credentials.role||1==e.get_credentials.role||2==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"biodata"===e.link,to:{name:"karyawan-biodata"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"assignment_ind"}})],1),a("q-item-section",[a("q-item-label",[e._v("\n            Biodata\n            "),e.get_unread_notification.employee>0?a("q-badge",{attrs:{color:"red"}},[e._v(e._s(e.get_unread_notification.employee))]):e._e()],1)],1)],1):e._e(),0==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"role"===e.link,to:{name:"karyawan-role"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"assignment"}})],1),a("q-item-section",[a("q-item-label",[e._v("Role")])],1)],1):e._e(),0==e.get_credentials.role?a("q-separator"):e._e(),0==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"equipment"===e.link,to:{name:"library-equipment"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"build"}})],1),a("q-item-section",[a("q-item-label",[e._v("Equipment")])],1)],1):e._e(),0==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"lokasi"===e.link,to:{name:"library-lokasi",query:{leadId:"contact.id",startTab:"profileTab"}},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"room"}})],1),a("q-item-section",[a("q-item-label",[e._v("Lokasi")])],1)],1):e._e(),0==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"schedule"===e.link,to:{name:"library-schedule"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"timer"}})],1),a("q-item-section",[a("q-item-label",[e._v("Shift")])],1)],1):e._e(),a("q-separator"),0==e.get_credentials.role||1==e.get_credentials.role||2==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"help"===e.link,to:{name:"help"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"help"}})],1),a("q-item-section",[a("q-item-label",[e._v("Informasi")])],1)],1):e._e(),a("q-separator"),0==e.get_credentials.role||1==e.get_credentials.role||2==e.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"","active-class":"my-menu-link"},on:{click:function(t){e.confirm=!0}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"power_settings_new"}})],1),a("q-item-section",[a("q-item-label",[e._v("Logout")])],1)],1):e._e(),a("q-dialog",{attrs:{persistent:""},model:{value:e.confirm,callback:function(t){e.confirm=t},expression:"confirm"}},[a("q-card",[a("q-card-section",{staticClass:"row items-center",style:e.isMobileViewport?"center; display: flex; justify-content: center; padding-bottom: 10px; text-align: center;":""},[a("q-avatar",{style:e.isMobileViewport?"margin: 5px 0 20px;":"",attrs:{color:"red","text-color":"white"}},[e.loading?e._e():a("q-icon",{attrs:{name:"power_settings_new"}}),e.loading?a("q-spinner-hourglass",{attrs:{color:"white"}}):e._e()],1),a("span",{staticClass:"q-ml-sm"},[e._v("Apa anda yakin ingin keluar dari akun?")])],1),a("q-card-actions",{style:e.isMobileViewport?"padding-bottom:15px":"",attrs:{align:e.isMobileViewport?"center":"right"}},[a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{disable:e.loading,outline:"",label:"Batal",color:"primary"}}),a("q-btn",{attrs:{disable:e.loading,outline:"",label:"Ya Keluar",color:"primary"},on:{click:e.onLogoutHandler}})],1)],1)],1),a("q-item-label",{attrs:{header:""}})],1)],1),a("q-img",{staticClass:"absolute-top",staticStyle:{height:"200px","background-position":"initial"},attrs:{src:"https://pavarazi.files.wordpress.com/2011/04/liebherr.jpg"}},[a("div",{staticClass:"absolute-bottom bg-transparent"},[a("q-avatar",{staticClass:"q-mb-sm",attrs:{size:"80px","font-size":"52px",color:"teal","text-color":"white"}},[a("img",{staticStyle:{display:"none"},attrs:{id:"avatar-image",src:e.global_image_url+e.get_user.photo_employee},on:{click:function(t){return e.onZoom(e.get_user.photo_employee,"avatar")}}})]),a("div",{staticClass:"text-weight-bold"},[e._v(e._s(e._f("capitalize")(e.name)))]),a("div",[e._v(e._s(e._f("position")(e.position)))])],1)])],1)},n=[],r=(a("b54a"),{data:function(){return{link:"laporan",confirm:!1,loading:!1}},watch:{"$route.name":function(e){switch(console.log("drawer",e),e){case"laporan":this.link="laporan";break;case"inspeksi-temperatur-panel":this.link="temperatur";break;case"karyawan-biodata":this.link="biodata";break;case"karyawan-role":this.link="role";break;case"library-equipment":this.link="equipment";break;case"library-lokasi":this.link="lokasi";break;case"library-schedule":this.link="schedule";break;case"help":this.link="help";break;default:this.link="";break}}},computed:{name:function(){return console.log(this.get_user),this.get_user?this.get_user.name_employee:""},position:function(){return this.get_user?this.get_user.position_employee:""},avatar:function(){return"height: calc(100% - 200px); margin-top: 200px;"}},beforeMount:function(){alert(this.global_image_url),this.avatarExist(this.get_user.photo_employee,"avatar-image")},methods:{onLogoutHandler:function(){this.loading=!0,this.$axios.get("/api/v1/logout").then((function(e){})).catch((function(e){}))}}}),s=r,l=(a("7f8b"),a("2877")),o=Object(l["a"])(s,i,n,!1,null,"0089edcc",null);t["default"]=o.exports}}]);