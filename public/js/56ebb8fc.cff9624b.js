(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["56ebb8fc"],{"19c6":function(e,o,t){"use strict";t.r(o);var i=function(){var e=this,o=e.$createElement,t=e._self._c||o;return t("q-page",[t("div",{staticClass:"q-pa-md"},[t("q-card",{staticClass:"my-card"},[t("q-card-section",{staticStyle:{"padding-top":"12px"}},[t("q-toolbar",{staticStyle:{padding:"0px"}},[e.isMobileViewport?e._e():t("q-icon",{directives:[{name:"pointer",rawName:"v-pointer"}],attrs:{name:"keyboard_arrow_left",size:"lg"},on:{click:function(o){return e.$router.back()}}},[t("q-tooltip",{attrs:{"content-style":"font-size: 14px",anchor:"center left",self:"center right"}},[e._v("Kembali")])],1),t("q-toolbar-title",[t("q-item-section",[t("q-item-label",[e._v("Formulir Inspeksi")])],1)],1)],1)],1),t("q-card-section",[t("q-form",[t("div",{class:e.isMobileViewport?"row col-12 col-xs-2 col-sm-12 col-md-12 col-lg-8 col-xl-8":"row col-12 col-xs-2 col-sm-12 col-md-8 col-lg-8 col-xl-8 q-col-gutter-md"},[t("div",{staticClass:"col-12 col-xs-2 col-sm-6 col-md-4 col-lg-4 col-xl-4",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-select",{ref:"uuid_tb_equipment",staticStyle:{"min-width":"100%"},attrs:{outlined:"","emit-value":"","map-options":"",behavior:"dialog",readonly:"",options:e.equipmentColumns,"option-value":"value",label:"Alat"},scopedSlots:e._u([{key:"no-option",fn:function(){return[t("q-item",[t("q-item-section",{staticClass:"text-grey"},[e._v("No results")])],1)]},proxy:!0}]),model:{value:e.form.uuid_tb_equipment,callback:function(o){e.$set(e.form,"uuid_tb_equipment",o)},expression:"form.uuid_tb_equipment"}})],1),t("div",{staticClass:"col-12 col-xs-2 col-sm-6 col-md-4 col-lg-4 col-xl-4",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-select",{ref:"uuid_tb_location",staticStyle:{"min-width":"100%"},attrs:{outlined:"","emit-value":"","map-options":"",behavior:"dialog",options:e.locationColumns,"option-value":"value",label:"Alat",readonly:""},scopedSlots:e._u([{key:"no-option",fn:function(){return[t("q-item",[t("q-item-section",{staticClass:"text-grey"},[e._v("No results")])],1)]},proxy:!0}]),model:{value:e.form.uuid_tb_location,callback:function(o){e.$set(e.form,"uuid_tb_location",o)},expression:"form.uuid_tb_location"}})],1),t("div",{staticClass:"col-12 col-xs-2 col-sm-6 col-md-4 col-lg-4 col-xl-4",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-select",{ref:"place_inspection",staticStyle:{"min-width":"100%"},attrs:{"emit-value":"","map-options":"",outlined:"",behavior:"dialog",options:e.placeColumns,readonly:"","option-value":"value",label:"Letak"},model:{value:e.form.place_inspection,callback:function(o){e.$set(e.form,"place_inspection",o)},expression:"form.place_inspection"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-select",{ref:"uuid_tb_employee",attrs:{"use-input":"",behavior:"dialog",outlined:"",readonly:"","hide-selected":"","fill-input":"","input-debounce":"0",label:"Nama","emit-value":"","map-options":"","option-value":"value",options:e.employeeColumns},scopedSlots:e._u([{key:"no-option",fn:function(){return[t("q-item",[t("q-item-section",{staticClass:"text-grey"},[e._v("\n                                            No results\n                                          ")])],1)]},proxy:!0}]),model:{value:e.form.uuid_tb_employee,callback:function(o){e.$set(e.form,"uuid_tb_employee",o)},expression:"form.uuid_tb_employee"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-select",{ref:"uuid_tb_schedule",staticStyle:{"min-width":"100%"},attrs:{outlined:"","emit-value":"","map-options":"",behavior:"dialog",options:e.scheduleColumns,"option-value":"value",label:"Alat",readonly:""},scopedSlots:e._u([{key:"no-option",fn:function(){return[t("q-item",[t("q-item-section",{staticClass:"text-grey"},[e._v("No results")])],1)]},proxy:!0}]),model:{value:e.form.uuid_tb_schedule,callback:function(o){e.$set(e.form,"uuid_tb_schedule",o)},expression:"form.uuid_tb_schedule"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-select",{ref:"condition_inspection",attrs:{outlined:"",readonly:"",options:e.conditions,"emit-value":"","map-options":"","option-value":"value",label:"Kondisi",behavior:"dialog"},scopedSlots:e._u([{key:"option",fn:function(o){return[t("q-item",e._g(e._b({},"q-item",o.itemProps,!1),o.itemEvents),[t("q-item-section",{attrs:{avatar:""}},[t("q-icon",{attrs:{name:"check_circle_outline"}})],1),t("q-item-section",[t("q-item-label",{domProps:{innerHTML:e._s(o.opt.label)}})],1)],1)]}}]),model:{value:e.form.condition_inspection,callback:function(o){e.$set(e.form,"condition_inspection",o)},expression:"form.condition_inspection"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-select",{ref:"weather_inspection",attrs:{outlined:"",readonly:"",options:e.weathers,"emit-value":"","map-options":"","option-value":"value",behavior:"dialog",label:"Cuaca"},scopedSlots:e._u([{key:"option",fn:function(o){return[t("q-item",e._g(e._b({},"q-item",o.itemProps,!1),o.itemEvents),[t("q-item-section",{attrs:{avatar:""}},[t("q-icon",{attrs:{name:"check_circle_outline"}})],1),t("q-item-section",[t("q-item-label",{domProps:{innerHTML:e._s(o.opt.label)}})],1)],1)]}}]),model:{value:e.form.weather_inspection,callback:function(o){e.$set(e.form,"weather_inspection",o)},expression:"form.weather_inspection"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-input",{ref:"grease_shoot_inspection",attrs:{outlined:"",readonly:"",maxlength:"3",min:"0",type:"number",label:"Grease Shoot"},model:{value:e.form.grease_shoot_inspection,callback:function(o){e.$set(e.form,"grease_shoot_inspection",o)},expression:"form.grease_shoot_inspection"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-input",{ref:"temperature_inspection",attrs:{outlined:"",readonly:"",maxlength:"30",min:"0",type:"number",label:"Temperatur"},model:{value:e.form.temperature_inspection,callback:function(o){e.$set(e.form,"temperature_inspection",o)},expression:"form.temperature_inspection"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-input",{ref:"rain_inspection",attrs:{outlined:"",readonly:"",min:"0",maxlength:"3",type:"number",label:"Curah Hujan"},model:{value:e.form.rain_inspection,callback:function(o){e.$set(e.form,"rain_inspection",o)},expression:"form.rain_inspection"}})],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-field",{ref:"current_upnormal_inspection",staticStyle:{"padding-bottom":"0px"},attrs:{disable:"",borderless:"",dense:""},scopedSlots:e._u([{key:"control",fn:function(){return[t("q-item-section",{staticClass:"q-pl-sm",attrs:{avatar:""}},[t("q-icon",{attrs:{name:"build"}})],1),t("q-item-section",{attrs:{avatar:""}},[t("q-item-label",{staticClass:"radio-title"},[e._v("Kondisi Upnormal Sekarang")]),t("q-item-label",{staticClass:"radio-title",attrs:{caption:""}},[e._v("Jika ada keterangan tambahan")])],1),t("q-radio",{attrs:{"keep-color":"",val:"0",label:"Tidak Ada",color:"red"},model:{value:e.form.current_upnormal_inspection,callback:function(o){e.$set(e.form,"current_upnormal_inspection",o)},expression:"form.current_upnormal_inspection"}}),t("q-radio",{attrs:{"keep-color":"",val:"1",label:"Ada",color:"teal"},model:{value:e.form.current_upnormal_inspection,callback:function(o){e.$set(e.form,"current_upnormal_inspection",o)},expression:"form.current_upnormal_inspection"}})]},proxy:!0}]),model:{value:e.form.current_upnormal_inspection,callback:function(o){e.$set(e.form,"current_upnormal_inspection",o)},expression:"form.current_upnormal_inspection"}}),t("transition",{attrs:{name:"fade"}},["1"==e.form.current_upnormal_inspection||"ada"==e.form.current_upnormal_inspection?t("q-input",{ref:"cui_description_inspection_information",attrs:{readonly:"",outlined:"",label:"Keterangan",type:"textarea"},model:{value:e.form.current_upnormal_description_inspection,callback:function(o){e.$set(e.form,"current_upnormal_description_inspection",o)},expression:"form.current_upnormal_description_inspection"}}):e._e()],1)],1),t("div",{staticClass:"col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-field",{ref:"last_upnormal_inspection",staticStyle:{"padding-bottom":"0px"},attrs:{disable:"",borderless:"",dense:""},scopedSlots:e._u([{key:"control",fn:function(){return[t("q-item-section",{staticClass:"q-pl-sm",attrs:{avatar:""}},[t("q-icon",{attrs:{name:"build"}})],1),t("q-item-section",{attrs:{avatar:""}},[t("q-item-label",[t("div",{staticClass:"radio-title"},[e._v("Kondisi Upnormal Sebelumnya")])]),t("q-item-label",{staticClass:"radio-title",attrs:{caption:""}},[e._v("Jika ada keterangan tambahan")])],1),t("q-radio",{attrs:{"keep-color":"",val:"0",label:"Tidak Ada",color:"red"},model:{value:e.form.last_upnormal_inspection,callback:function(o){e.$set(e.form,"last_upnormal_inspection",o)},expression:"form.last_upnormal_inspection"}}),t("q-radio",{attrs:{"keep-color":"",val:"1",label:"Ada",color:"teal"},model:{value:e.form.last_upnormal_inspection,callback:function(o){e.$set(e.form,"last_upnormal_inspection",o)},expression:"form.last_upnormal_inspection"}})]},proxy:!0}]),model:{value:e.form.last_upnormal_inspection,callback:function(o){e.$set(e.form,"last_upnormal_inspection",o)},expression:"form.last_upnormal_inspection"}}),t("transition",{attrs:{name:"fade"}},["1"==e.form.last_upnormal_inspection||"ada"==e.form.last_upnormal_inspection?t("q-input",{ref:"lui_description_inspection_information",attrs:{readonly:"",outlined:"",label:"Keterangan",type:"textarea"},model:{value:e.form.last_upnormal_description_inspection,callback:function(o){e.$set(e.form,"last_upnormal_description_inspection",o)},expression:"form.last_upnormal_description_inspection"}}):e._e()],1)],1),t("div",{staticClass:"col-12",style:e.isMobileViewport?"margin-bottom:10px":""},[t("q-input",{ref:"com_description_inspection_information",attrs:{outlined:"",readonly:"",label:"Keterangan Lainnya",type:"textarea"},model:{value:e.form.common_description_inspection,callback:function(o){e.$set(e.form,"common_description_inspection",o)},expression:"form.common_description_inspection"}})],1)]),t("div",{class:e.isMobileViewport?"":"q-pt-lg q-pb-mb",style:e.isMobileViewport?"display: flex; justify-content: center; margin-top: 0px;":""},[e.routeProps.valid_inspection?e._e():t("q-btn",{staticStyle:{"min-width":"150px"},attrs:{color:"primary",label:"Ubah ",type:"submit",outline:"",to:{name:"formulir-inspeksi",query:{routeProps:{origin:e.routeProps.origin,valid_inspection:"true"==e.routeProps.valid_inspection}}},loading:e.loading}},[t("q-icon",{staticClass:"q-pl-lg",attrs:{name:"edit"}})],1),e.isMobileViewport?e._e():t("q-btn",{staticClass:"q-ml-sm",attrs:{disable:e.loading,label:"Sebelumnya",color:"primary",outline:""},on:{click:function(o){return e.$router.back()}}}),e.isMobileViewport?t("q-btn",{staticClass:"q-ml-sm",attrs:{disable:e.loading,round:"",icon:"keyboard_arrow_left",color:"primary",outline:""},on:{click:function(o){return e.$router.back()}}}):e._e()],1)])],1)],1)],1),t("scroll-to-top")],1)},l=[],n=(t("551c"),t("06db"),t("5c56")),a={mixins:[n["a"]],props:["routeProps"],data:function(){return{loading:!1,positions:c,conditions:s,weathers:r,employeeColumns:[],equipmentColumns:[],scheduleColumns:[],locationColumns:[],placeColumns:[{label:"Tidak Ada",value:"",disable:!1,category:"1"}]}},computed:{form:function(){return this["get_formulir_inspeksi_form"]}},mounted:function(){var e=this;0==e.get_formulir_inspeksi_update&&this.$router.back(),e.equipmentColumns=e["get_formulir_inspeksi_equipmentColumns"],e.locationColumns=e["get_formulir_inspeksi_locationColumns"],e.scheduleColumns=e["get_formulir_inspeksi_scheduleColumns"],e.employeeColumns=e["get_formulir_inspeksi_employeeColumns"],e.equipmentColumns.length<=0&&new Promise((function(o){o(e.requestTransformAxios({url:"/api/v1/library/equipment?type=select",key:"equipment"}))})).then((function(o){e.equipmentColumns=o,console.log("vm.equipmentColumns",e.equipmentColumns)})),e.locationColumns.length<=0&&new Promise((function(o){o(e.requestTransformAxios({url:"/api/v1/library/location?type=select",key:"location"}))})).then((function(o){e.locationColumns=o,console.log("vm.locationColumns",e.locationColumns)})),e.scheduleColumns.length<=0&&new Promise((function(o){o(e.requestTransformAxios({url:"/api/v1/library/schedule?type=select",key:"schedule"}))})).then((function(o){e.scheduleColumns=o,console.log("vm.scheduleColumns",e.scheduleColumns)})),e.employeeColumns.length<=0&&new Promise((function(o){o(e.requestTransformAxios({url:"/api/v1/employee?type=select",key:"employee"}))})).then((function(o){e.employeeColumns=o,console.log("vm.employeeColumns",e.employeeColumns)}))},methods:{requestTransformAxios:function(e){var o=this,t=[];return o.$axios.get(e.url).then((function(o){for(var i=0;i<o.data.payload.length;i++)"schedule"==e.key?t.push({label:o.data.payload[i]["label_"+e.key],value:o.data.payload[i].uuid,uuid:o.data.payload[i].uuid,disable:!1,required:0==i,category:i,location:o.data.payload[i].location}):t.push({label:o.data.payload[i]["name_"+e.key],value:o.data.payload[i].uuid,uuid:o.data.payload[i].uuid,disable:!1,required:0==i,category:i,location:o.data.payload[i].location})})).catch((function(e){})),o.actionVuex({data:t,type:e.key+"Columns"}),t},actionVuex:function(e){this["set_formulir_inspeksi"]({data:e.data,type:e.type})}}},s=[{label:"Noise",value:"1",disable:!1,required:!1,category:"1"},{label:"Dusty",value:"2",disable:!1,required:!1,category:"2"},{label:"Vibrate",value:"3",disable:!1,required:!1,category:"3"}],r=[{label:"Cerah",value:"1",disable:!1,required:!1,category:"1"},{label:"Mendung",value:"2",disable:!1,required:!1,category:"2"},{label:"Hujan",value:"3",disable:!1,required:!1,category:"3"},{label:"Kabut",value:"4",disable:!1,required:!1,category:"4"},{label:"Angin",value:"5",disable:!1,required:!1,category:"5"},{label:"Lainnya",value:"6",disable:!1,required:!1,category:"6"}],c=[{label:"Super Admin",value:"0",disable:!1,required:!1,category:"0"},{label:"Supervisor",value:"1",disable:!1,required:!1,category:"1"},{label:"Temperature Man",value:"2",disable:!1,required:!1,category:"2"}],u=a,m=(t("784b"),t("2877")),p=Object(m["a"])(u,i,l,!1,null,"15d08801",null);o["default"]=p.exports},"5c56":function(e,o,t){"use strict";t("c5f6"),t("a481"),t("7f7f");var i={beforeMount:function(){if(console.log(this.get_credentials),this.get_user||"login"==this.$route.name)if(this.get_credentials.logged||"login"==this.$route.name){if(null==this.get_credentials.role){if("login"!=this.$route.name)return void this.$router.replace({name:"login"})}else if(void 0!=this.$route.meta.roles){for(var e=0;e<this.$route.meta.roles.length;e++){var o=this.$route.meta.roles[e];if(Number(o)==Number(this.get_credentials.role))return void console.log(this.$route.meta.roles,Number(o),Number(this.get_credentials.role))}"laporan"!=this.$route.name&&this.$router.replace({name:"laporan",replace:!0})}}else this.$router.replace({name:"login"});else this.$router.replace({name:"login"})}};o["a"]=i},"784b":function(e,o,t){"use strict";var i=t("894b"),l=t.n(i);l.a},"894b":function(e,o,t){}}]);