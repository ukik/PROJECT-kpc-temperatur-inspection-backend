(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["5d057760"],{"5c56":function(e,t,r){"use strict";r("c5f6"),r("a481"),r("7f7f");var o={beforeMount:function(){if(this.get_user||"login"==this.$route.name)if(this.get_credentials.logged||"login"==this.$route.name){if(null==this.get_credentials.role){if("login"!=this.$route.name)return void this.$router.replace({name:"login"})}else if(void 0!=this.$route.meta.roles){for(var e=0;e<this.$route.meta.roles.length;e++){var t=this.$route.meta.roles[e];if(Number(t)==Number(this.get_credentials.role))return}"laporan"!=this.$route.name&&this.$router.replace({name:"laporan",replace:!0})}}else this.$router.replace({name:"login"});else this.$router.replace({name:"login"})}};t["a"]=o},9593:function(e,t,r){"use strict";r.r(t);var o=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("fragment",[r("q-page",[r("data-table-report",{attrs:{_store_module:e.store_module}},[r("q-toolbar",{staticStyle:{padding:"0px"},attrs:{slot:"title"},slot:"title"},[e.isMobileViewport?e._e():r("q-icon",{directives:[{name:"pointer",rawName:"v-pointer"}],attrs:{name:"keyboard_arrow_left",size:"lg"},on:{click:function(t){return e.$router.back()}}},[r("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[e._v("Kembali")])],1),r("q-toolbar-title",[e._v("Laporan Conveyer")])],1),r("info-report",{attrs:{slot:"info"},slot:"info"})],1),r("scroll-to-top")],1)],1)},n=[],i=r("5c56"),a={mixins:[i["a"]],data:function(){return{store_module:"laporan_custom"}}},l=a,s=r("2877"),u=Object(s["a"])(l,o,n,!1,null,null,null);t["default"]=u.exports}}]);