(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["5d09e14e"],{"48fa":function(e,t,o){"use strict";o.r(t);var r=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("fragment",[o("q-page",[o("data-table-karyawan",{attrs:{_store_module:e.store_module},scopedSlots:e._u([{key:"row",fn:function(t){return[o("q-tr",[o("q-td",{directives:[{name:"row-color",rawName:"v-row-color",value:{val:t.visibleColumns,oldColor:"#c1f4cdd3",newColor:"#fff"},expression:"{val: props.visibleColumns, oldColor: '#c1f4cdd3', newColor: '#fff'}"}],key:"name_employee",staticClass:"ellipsis",staticStyle:{background:"#c1f4cdd3",padding:"0px"},attrs:{props:t.props}},[o("q-item",{staticStyle:{padding:"0px"}},[o("q-item-section",{staticClass:"q-pa-sm bg-white",attrs:{avatar:""}},[o("q-btn-dropdown",{attrs:{split:"",outline:"",rounded:"",icon:"view_list",color:"red"}},[o("q-list",[o("q-item",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{clickable:""},on:{click:function(o){return e.gotoEmployeeFormHandler(t.props.row,"formulir-karyawan-detail")}}},[o("q-item-section",{attrs:{avatar:""}},[o("q-avatar",{attrs:{icon:"filter_none",color:"primary","text-color":"white"}})],1),o("q-item-section",[o("q-item-label",[e._v("Lihat")]),o("q-item-label",{attrs:{caption:""}},[e._v("detail informasi")])],1)],1),o("q-item",{directives:[{name:"close-popup",rawName:"v-close-popup"}],attrs:{clickable:""},on:{click:function(o){return e.gotoEmployeeFormHandler(t.props.row,"formulir-karyawan")}}},[o("q-item-section",{attrs:{avatar:""}},[o("q-avatar",{attrs:{icon:"create",color:"red","text-color":"white"}})],1),o("q-item-section",[o("q-item-label",[e._v("Ubah")]),o("q-item-label",{attrs:{caption:""}},[e._v("inspeksi ulang")])],1)],1)],1)],1)],1),o("q-item-section",{staticClass:"q-pa-md",staticStyle:{"text-align":"left","border-left":"1px solid rgba(0, 0, 0, 0.12)","border-right":"1px solid rgba(0, 0, 0, 0.12)"}},[o("span",[e._v("\n                  "+e._s(t.props.row.name_employee)+"\n                  "),o("inner-loading",{ref:"spinner_name_employee_"+t.props.row.__index,attrs:{_visible:!1}})],1)])],1)],1),o("q-td",{key:"position_employee",attrs:{props:t.props}},[o("q-btn-dropdown",{directives:[{name:"arrow",rawName:"v-arrow"}],attrs:{split:"",rounded:"",outline:"","disable-main-btn":"",color:e.position_color(t.props.row.position_employee),label:e._f("position")(t.props.row.position_employee)}},[o("dropdown-item",{attrs:{payload:{label:"Supervisor",value:1}},on:{onBubble:function(o){t.props.row.position_employee=o,e.onUpdateHandler(t.props.row)}}},[o("q-item-label",{attrs:{slot:"item-label",caption:""},slot:"item-label"},[e._v("jabatan petugas")])],1),o("dropdown-item",{attrs:{payload:{label:"Temperature Man",value:2}},on:{onBubble:function(o){t.props.row.position_employee=o,e.onUpdateHandler(t.props.row)}}},[o("q-item-label",{attrs:{slot:"item-label",caption:""},slot:"item-label"},[e._v("jabatan petugas")])],1),o("q-separator"),o("dropdown-item",{attrs:{payload:{label:"Super Admin",value:0}},on:{onBubble:function(o){t.props.row.position_employee=o,e.onUpdateHandler(t.props.row)}}},[o("q-item-label",{attrs:{slot:"item-label",caption:""},slot:"item-label"},[e._v("jabatan petugas")])],1)],1)],1),o("q-td",{key:"verification_employee",attrs:{props:t.props}},[1==t.props.row.verification_employee?o("q-btn",{attrs:{split:"",rounded:"",outline:"",disable:"",color:e.verification_color(t.props.row.verification_employee),label:e._f("verification")(t.props.row.verification_employee)}}):o("q-btn-dropdown",{attrs:{split:"",rounded:"",outline:"","disable-main-btn":"",color:e.verification_color(t.props.row.verification_employee),label:e._f("verification")(t.props.row.verification_employee)}},[o("dropdown-item",{attrs:{payload:{label:"Verifikasi",value:1}},on:{onBubble:function(o){t.props.row.verification_employee=o,e.onUpdateHandler(t.props.row)}}},[o("q-avatar",{attrs:{slot:"avatar",icon:"assignment_turned_in",color:"secondary","text-color":"white"},slot:"avatar"}),o("q-item-label",{attrs:{slot:"item-label",caption:""},slot:"item-label"},[e._v("akun baru")])],1)],1)],1),o("q-td",{key:"disable_employee",attrs:{props:t.props}},[o("q-toggle",{attrs:{color:"red",value:t.props.row.disable_employee,label:e._f("disable")(t.props.row.disable_employee)},on:{input:function(o){return e.onUpdateHandler(t.props.row)}},model:{value:t.props.row.disable_employee,callback:function(o){e.$set(t.props.row,"disable_employee",o)},expression:"props.props.row.disable_employee"}})],1),o("q-td",{key:"created_at",attrs:{props:t.props}},[e._v(e._s(t.props.row.created_at))]),o("q-td",{key:"updated_at",attrs:{props:t.props}},[e._v(e._s(t.props.row.updated_at))])],1)]}}])},[o("q-toolbar",{staticStyle:{padding:"0px"},attrs:{slot:"title"},slot:"title"},[e.isMobileViewport?e._e():o("q-icon",{directives:[{name:"pointer",rawName:"v-pointer"}],attrs:{name:"keyboard_arrow_left",size:"lg"},on:{click:function(t){return e.$router.back()}}},[o("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[e._v("Kembali")])],1),o("q-toolbar-title",[e._v("Aturan Karyawan")])],1),o("info-karyawan",{attrs:{slot:"info"},slot:"info"})],1),e.isMobileViewport?o("q-page-scroller",{attrs:{position:"bottom-left","scroll-offset":150,offset:[18,18]}},[o("div",{staticStyle:{display:"flex","justify-content":"center",padding:"10px"}},[o("q-btn",{staticClass:"bg-white",attrs:{icon:"arrow_upward",outline:"",rounded:"",color:"negative",label:"Back To Top","no-caps":""}})],1)]):e._e(),o("scroll-to-top")],1)],1)},a=[],i=(o("551c"),o("06db"),o("c5f6"),o("5c56")),l={mixins:[i["a"]],data:function(){return{store_module:"karyawan_role_edit"}},beforeDestroy:function(){this.set_karyawan_role_edit({type:"payload",data:[]})},computed:{position_color:function(){return function(e){switch(Number(e)){case 0:return"deep-purple-10";case 1:return"deep-purple-8";case 2:return"deep-purple-6"}}},verification_color:function(){return function(e){switch(Number(e)){case 0:return"negative";case 1:return"positive"}}},disabled_color:function(){return function(e){switch(Number(e)){case 0:return"negative";case 1:return"positive"}}}},methods:{onUpdateHandler:function(e){var t=this,o=t.$refs["spinner_name_employee_"+e.__index];void 0!=o&&(o.visible=!0,t.$axios.put("/api/v1/employee",t.get_karyawan_role_edit_data[e.__index]).then((function(e){o.visible=!1,t.set_karyawan_biodata({type:"replace",data:e.data.payload}),t.set_karyawan_role({type:"replace",data:e.data.payload})})).catch((function(e){o.visible=!1})))},gotoEmployeeFormHandler:function(e){var t=this;new Promise((function(o){t.set_formulir_karyawan({type:"update_form",data:e}),o()})).then((function(e){t.$router.push({name:"formulir-karyawan"})}))}}},n=l,s=o("2877"),p=Object(s["a"])(n,r,a,!1,null,null,null);t["default"]=p.exports},"5c56":function(e,t,o){"use strict";o("c5f6"),o("a481"),o("7f7f");var r={beforeMount:function(){if(this.get_user||"login"==this.$route.name)if(this.get_credentials.logged||"login"==this.$route.name){if(null==this.get_credentials.role){if("login"!=this.$route.name)return void this.$router.replace({name:"login"})}else if(void 0!=this.$route.meta.roles){for(var e=0;e<this.$route.meta.roles.length;e++){var t=this.$route.meta.roles[e];if(Number(t)==Number(this.get_credentials.role))return}"laporan"!=this.$route.name&&this.$router.replace({name:"laporan",replace:!0})}}else this.$router.replace({name:"login"});else this.$router.replace({name:"login"})}};t["a"]=r}}]);