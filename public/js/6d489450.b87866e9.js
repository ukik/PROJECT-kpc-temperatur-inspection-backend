(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["6d489450","21c638e8"],{"86e6":function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("q-layout",{attrs:{view:"lHr LpR lfr"}},[i("q-header",{staticClass:"bg-white text-white",attrs:{elevated:"","height-hint":"100"}},[i("q-toolbar",{staticClass:"bg-white text-black"},[i("img",{staticStyle:{height:"40px"},attrs:{src:a("8c36")}}),i("q-toolbar-title",[t.isMobileViewport?t._e():i("strong",[t._v("Conveyor Inspector")])]),i("q-btn",{staticClass:"q-ml-md",attrs:{dense:"",flat:"",size:"md",round:"",icon:"menu"},on:{click:function(e){t.left=!t.left}}})],1),"inspeksi-temperatur-panel"==t.$route.name?i("div",{staticClass:"q-gutter-y-md"},[i("q-tabs",{staticClass:"text-grey-4 bg-negative",attrs:{align:"justify","indicator-color":"white","active-color":"white","inline-label":"",value:t.get_inspection_tab}},[i("q-tab",{attrs:{name:"0",breakpoint:0,"no-caps":"",icon:"assignment",label:t.isMobileViewport?"Invalid":"Belum Divalidasi",disable:t.disabled},on:{click:function(e){return t.onTabHandler("0","inspection")}}}),i("q-tab",{attrs:{name:"1",breakpoint:0,"no-caps":"",icon:"assignment_turned_in",label:t.isMobileViewport?"Valid":"Sudah Divalidasi",disable:t.disabled},on:{click:function(e){return t.onTabHandler("1","inspection")}}})],1)],1):t._e()],1),i("q-drawer",{attrs:{width:210,breakpoint:500,bordered:"","content-class":"bg-grey-2"},on:{"!click":function(e){return t.drawerClick(e)}},model:{value:t.left,callback:function(e){t.left=e},expression:"left"}},[i("content-drawer")],1),i("q-page-container",{staticStyle:{"padding-bottom":"75px"}},[i("router-view"),1!=t.get_credentials.role?i("q-page-sticky",{staticStyle:{"z-index":"9"},attrs:{position:"bottom-right",offset:[18,18]}},[i("q-fab",{attrs:{icon:"add",direction:"up",color:"accent"}},[0==t.get_credentials.role?i("q-fab-action",{attrs:{color:"primary",icon:"person_add"},on:{click:t.gotoKaryawan}},[i("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[t._v("Buat data karyawan baru")])],1):t._e(),0==t.get_credentials.role||2==t.get_credentials.role?i("q-fab-action",{attrs:{color:"primary",icon:"playlist_add"},on:{click:t.gotoInspeksi}},[i("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[t._v("Buat Data Inspeksi")])],1):t._e()],1)],1):t._e()],1)],1)},n=[],r=(a("7f7f"),a("ea96")),s={components:{ContentDrawer:r["default"]},data:function(){return{link:"library_equipment",left:!1,disabled:!1,miniState:!1}},created:function(){this.isMobileViewport?this.left=!1:this.left=!0},computed:{avatar:function(){return this.miniState?"height: calc(100% - 0px); margin-top: 0px;":"height: calc(100% - 200px); margin-top: 200px;"}},methods:{onTabHandler:_.debounce((function(t,e){var a=this;this.disabled=!0,this.set_tab({type:e,data:t}),setTimeout((function(){a.disabled=!1}),500)}),500),drawerClick:function(t){this.miniState&&(this.miniState=!1,t.stopPropagation())},gotoKaryawan:function(){this.set_formulir_karyawan({type:"reset_form"}),"formulir-karyawan"!=this.$route.name&&this.$router.push({name:"formulir-karyawan"})},gotoInspeksi:function(){this.set_formulir_inspeksi({data:null,type:"reset_form"}),this.set_formulir_inspeksi_new({data:null,type:"reset_form"}),"formulir-inspeksi-new"!=this.$route.name&&this.$router.push({name:"formulir-inspeksi-new"})}}},o=s,l=(a("e0a9"),a("2877")),c=Object(l["a"])(o,i,n,!1,null,"841dce3c",null);e["default"]=c.exports},a52d:function(t,e,a){},b54a:function(t,e,a){"use strict";a("386b")("link",(function(t){return function(e){return t(this,"a","href",e)}}))},ba21:function(t,e,a){"use strict";var i=a("f8a4"),n=a.n(i);n.a},e0a9:function(t,e,a){"use strict";var i=a("a52d"),n=a.n(i);n.a},ea96:function(t,e,a){"use strict";a.r(e);var i=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("fragment",[a("q-scroll-area",{style:t.avatar,attrs:{id:"drawer"}},[a("q-list",[0==t.get_credentials.role||1==t.get_credentials.role||2==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"laporan"===t.link,to:{name:"laporan"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"assessment"}})],1),a("q-item-section",[a("q-item-label",[t._v("Laporan")])],1)],1):t._e(),0==t.get_credentials.role||1==t.get_credentials.role||2==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"temperatur"===t.link,to:{name:"inspeksi-temperatur-panel"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"brightness_medium"}})],1),a("q-item-section",[a("q-item-label",[t._v("\n            Temperatur\n            "),t.unread_notification_inspection>0?a("q-badge",{attrs:{color:"red"}},[t._v(t._s(t.unread_notification_inspection))]):t._e()],1)],1)],1):t._e(),a("q-separator"),0==t.get_credentials.role||1==t.get_credentials.role||2==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"biodata"===t.link,to:{name:"karyawan-biodata"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"assignment_ind"}})],1),a("q-item-section",[a("q-item-label",[t._v("\n            Biodata\n            ")])],1)],1):t._e(),0==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"role"===t.link,to:{name:"karyawan-role"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"assignment"}})],1),a("q-item-section",[a("q-item-label",[t._v("Role")])],1)],1):t._e(),0==t.get_credentials.role?a("q-separator"):t._e(),0==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"equipment"===t.link,to:{name:"library-equipment"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"build"}})],1),a("q-item-section",[a("q-item-label",[t._v("Equipment")])],1)],1):t._e(),0==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"lokasi"===t.link,to:{name:"library-lokasi",query:{leadId:"contact.id",startTab:"profileTab"}},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"room"}})],1),a("q-item-section",[a("q-item-label",[t._v("Lokasi")])],1)],1):t._e(),0==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"schedule"===t.link,to:{name:"library-schedule"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"timer"}})],1),a("q-item-section",[a("q-item-label",[t._v("Shift")])],1)],1):t._e(),a("q-separator"),0==t.get_credentials.role||1==t.get_credentials.role||2==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"",active:"help"===t.link,to:{name:"help"},"active-class":"my-menu-link"}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"help"}})],1),a("q-item-section",[a("q-item-label",[t._v("Informasi")])],1)],1):t._e(),a("q-separator"),0==t.get_credentials.role||1==t.get_credentials.role||2==t.get_credentials.role?a("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"q-pt-sm q-pb-sm",attrs:{clickable:"",dense:"","active-class":"my-menu-link"},on:{click:function(e){t.confirm=!0}}},[a("q-item-section",{attrs:{avatar:""}},[a("q-icon",{attrs:{name:"power_settings_new"}})],1),a("q-item-section",[a("q-item-label",[t._v("Logout")])],1)],1):t._e(),a("q-dialog",{attrs:{persistent:""},model:{value:t.confirm,callback:function(e){t.confirm=e},expression:"confirm"}},[a("q-card",[a("q-card-section",{staticClass:"row items-center",style:t.isMobileViewport?"center; display: flex; justify-content: center; padding-bottom: 10px; text-align: center;":""},[a("q-avatar",{style:t.isMobileViewport?"margin: 5px 0 20px;":"",attrs:{color:"red","text-color":"white"}},[t.loading?t._e():a("q-icon",{attrs:{name:"power_settings_new"}}),t.loading?a("q-spinner-hourglass",{attrs:{color:"white"}}):t._e()],1),a("span",{staticClass:"q-ml-sm"},[t._v("Apa anda yakin ingin keluar dari akun?")])],1),a("q-card-actions",{style:t.isMobileViewport?"padding-bottom:15px":"",attrs:{align:t.isMobileViewport?"center":"right"}},[a("q-btn",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{outline:"",label:"Batal",color:"primary"}}),a("q-btn",{attrs:{disable:t.loading,outline:"",label:"Ya Keluar",color:"primary"},on:{click:t.onLogoutHandler}})],1)],1)],1),a("q-item-label",{attrs:{header:""}})],1)],1),a("q-img",{staticClass:"absolute-top",staticStyle:{height:"200px"},attrs:{src:t.drawer_background_base64}},[a("div",{staticClass:"absolute-bottom bg-transparent"},[a("q-avatar",{staticClass:"q-mb-sm",attrs:{size:"80px","font-size":"52px",color:"teal","text-color":"white"}},[a("img",{attrs:{id:"avatar-image",src:t.get_user_photo},on:{click:function(e){return t.onZoom(t.get_user_photo,"avatar")}}})]),a("div",{staticClass:"text-weight-bold"},[t._v(t._s(t._f("capitalize")(t.name)))]),a("div",[t._v(t._s(t._f("position")(t.position)))])],1)])],1)},n=[],r=(a("b54a"),{data:function(){return{link:"laporan",confirm:!1,loading:!1}},watch:{"$route.name":function(t){switch(t){case"laporan":this.link="laporan";break;case"inspeksi-temperatur-panel":this.link="temperatur";break;case"karyawan-biodata":this.link="biodata";break;case"karyawan-role":this.link="role";break;case"library-equipment":this.link="equipment";break;case"library-lokasi":this.link="lokasi";break;case"library-schedule":this.link="schedule";break;case"help":this.link="help";break;default:this.link="";break}}},computed:{get_user_photo:function(){if(void 0!=this.get_user)return this.get_user.photo_employee},unread_notification_inspection:function(){return void 0!=this.get_unread_notification?this.get_unread_notification.inspection:0},name:function(){return this.get_user?this.get_user.name_employee:""},position:function(){return this.get_user?this.get_user.position_employee:""},avatar:function(){return"height: calc(100% - 200px); margin-top: 200px;"}},beforeMount:function(){this.avatarExist(this.get_user_photo,"avatar-image")},methods:{onLogoutHandler:function(){this.loading=!0,this.$axios.get("/api/v1/logout").then((function(t){})).catch((function(t){}))}}}),s=r,o=(a("ba21"),a("2877")),l=Object(o["a"])(s,i,n,!1,null,"730a8b30",null);e["default"]=l.exports},f8a4:function(t,e,a){}}]);