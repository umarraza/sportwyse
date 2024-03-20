import{d as m,o as l,e as d,a as t,k as h,F as p,i as b,p as v,v as f,t as s,j as y,n as S,f as k,Q as N,O as g,M as x,N as w}from"./app-39d70025.js";import{_ as B}from"./_plugin-vue_export-helper-c27b6911.js";const a=o=>(x("data-v-39cac7de"),o=o(),w(),o),M={id:"runBatchScriptsModal",class:"modal fade",tabindex:"-1",role:"dialog","aria-labelledby":"myModalLabel","aria-hidden":"true"},C={class:"modal-dialog modal-xl"},O={class:"modal-content"},R=N('<div class="modal-header" data-v-39cac7de><h5 class="modal-title mt-0" id="myModalLabel" data-v-39cac7de><i class="fa fa-terminal" data-v-39cac7de></i> Run Batch Scripts</h5><button type="button" class="close close-button" data-dismiss="modal" aria-label="Close" data-v-39cac7de><span aria-hidden="true" data-v-39cac7de>×</span></button></div>',1),V={class:"modal-body"},D={key:0},F={class:"custom-control custom-checkbox pl-5 pt-4 pb-4"},I=["id","value"],E=["for"],L={class:"additional-info"},T={class:"table table-borderless table-sm"},j=a(()=>t("th",null,"Event Name (New):",-1)),q=a(()=>t("th",null,"Player Name (New):",-1)),A={key:0},P=a(()=>t("th",null,"Event Name (Old):",-1)),z=a(()=>t("th",null,"Player Name (Old):",-1)),Q=a(()=>t("th",null,"From Date:",-1)),U=a(()=>t("th",null,"To Date:",-1)),G=a(()=>t("th",null,"From Amount:",-1)),H=a(()=>t("th",null,"To Amount:",-1)),J={key:1,class:"text-center"},K={class:"modal-footer"},W=a(()=>t("button",{type:"button",class:"btn btn-secondary waves-effect","data-dismiss":"modal"},"Cancel",-1)),X=["disabled"],Y=a(()=>t("i",{class:"fa fa-terminal"},null,-1)),Z={__name:"RunBatchScripts",props:{prop_scripts:{type:Object,required:!0}},setup(o){const n=m([]),r=()=>{const c={scripts:n.value};g.post(route("search-filters.run"),c,{preserveScroll:!0,preserveState:!1,onSuccess:()=>{}}),document.querySelector(".close-button").click()};return(c,i)=>(l(),d("div",M,[t("div",C,[t("div",O,[R,t("form",{onSubmit:h(r,["prevent"])},[t("div",V,[o.prop_scripts.length?(l(),d("ul",D,[(l(!0),d(p,null,b(o.prop_scripts,(e,u)=>(l(),d("li",{key:u},[t("div",F,[v(t("input",{type:"checkbox",class:"custom-control-input",id:e.id,"data-parsley-multiple":"groups","data-parsley-mincheck":"2",value:e.id,"onUpdate:modelValue":i[0]||(i[0]=_=>n.value=_)},null,8,I),[[f,n.value]]),t("label",{class:"custom-control-label",for:e.id},s(e.search_name),9,E)]),t("div",L,[t("table",T,[t("tr",null,[j,t("td",null,s(e.camp.name),1),q,e.player?(l(),d("td",A,s(e.player.user.first_name+" "+e.player.user.last_name),1)):y("",!0)]),t("tr",null,[P,t("td",null,s(e.event_name),1),z,t("td",null,s(e.player_name),1)]),t("tr",null,[Q,t("td",null,s(e.from_date),1),U,t("td",null,s(e.to_date),1)]),t("tr",null,[G,t("td",null,s(e.from_amount),1),H,t("td",null,s(e.to_amount),1)])])])]))),128))])):(l(),d("p",J,"No scripts found!"))]),t("div",K,[W,t("button",{type:"submit",class:S(["btn waves-effect waves-light",[o.prop_scripts.length?"btn-primary":"btn-light disabled"]]),disabled:!o.prop_scripts.length},[Y,k(" Run")],10,X)])],32)])])]))}},et=B(Z,[["__scopeId","data-v-39cac7de"]]);export{et as default};
