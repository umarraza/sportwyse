import p from"./AppLayout-6747b03f.js";import{I as f,J as v,o as s,c as o,w as r,a as t,b,f as c,x as k,t as l,e as w,i as x,n as d,F as D,K as T,L as g}from"./app-829f4a20.js";import u from"./FamilyDetails-a1a5b3be.js";import C from"./Index-3a0be647.js";import"./Banner-a74a72e4.js";import"./Sidebar-5c8a8614.js";import"./Header-d09709fb.js";import"./DropdownLink-4c77cc91.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Create-d246e6b2.js";import"./VueSearchSelect-b66bf8eb.js";import"./Edit-1315b238.js";const B={class:"row"},F={class:"col-12"},P={class:"card m-b-30"},L={class:"card-header"},N=t("h4",{class:"pl-2"},"Player Details",-1),O={class:"card-header-right"},$={class:"card-body"},A={class:"table"},E=t("th",null,"First Name",-1),R=t("th",null,"Last Name",-1),S=t("th",null,"Email",-1),V=t("th",null,"Parent Phone",-1),q=t("th",null,"Parent Email",-1),z=["href"],K=t("th",null,"Phone",-1),j=t("th",null,"Date Of Birth",-1),G=t("th",null,"Gender",-1),I=t("th",null,"Address",-1),J=t("th",null,"State",-1),Z=t("th",null,"City",-1),H=t("th",null,"Zip Code",-1),M={class:"row mt-2"},Q={class:"col-12"},U={class:"nav nav-tabs",id:"ex-with-icons",role:"tablist"},W=["onClick"],X={class:"tab-content",id:"ex-with-icons-content"},mt={__name:"Show",props:{player:{type:Object,required:!0},campsOptions:{type:Array,required:!0}},setup(e){const h=e,m=[{title:"Family Details",name:"FamilyDetails",component:u,icon:"fas fa-user-friends"},{title:"Transactions",name:"Transactions",component:C,icon:"fas fa-money-check-alt"}],n=f(u),_=i=>{n.value=i.component};return v("campsOptions",h.campsOptions),(i,Y)=>(s(),o(p,{title:"Player Details"},{default:r(()=>[t("div",B,[t("div",F,[t("div",P,[t("div",L,[N,t("div",O,[b(k,{backToListRoute:i.route("club.players.index"),class:"mr-1"},{default:r(()=>[c(" Back")]),_:1},8,["backToListRoute"])])]),t("div",$,[t("table",A,[t("tr",null,[E,t("td",null,l(e.player.user.first_name),1)]),t("tr",null,[R,t("td",null,l(e.player.user.last_name),1)]),t("tr",null,[S,t("td",null,l(e.player.user.email),1)]),t("tr",null,[V,t("td",null,l(e.player.user.last_name),1)]),t("tr",null,[q,t("td",null,[t("a",{href:`mailto:${e.player.guardian.user.email}`},l(e.player.guardian.user.email),9,z)])]),t("tr",null,[K,t("td",null,l(e.player.phone),1)]),t("tr",null,[j,t("td",null,l(e.player.birth_date),1)]),t("tr",null,[G,t("td",null,l(e.player.gender),1)]),t("tr",null,[I,t("td",null,l(e.player.address),1)]),t("tr",null,[J,t("td",null,l(e.player.state),1)]),t("tr",null,[Z,t("td",null,l(e.player.city),1)]),t("tr",null,[H,t("td",null,l(e.player.zip_code),1)])])])])])]),t("div",M,[t("div",Q,[t("ul",U,[(s(),w(D,null,x(m,(a,y)=>t("li",{class:"nav-item",role:"presentation",key:y},[t("a",{"data-mdb-tab-init":"",class:d(["nav-link",{active:n.value===a.component}]),href:"#",role:"tab","aria-controls":"ex-with-icons-tabs-1","aria-selected":"true",onClick:tt=>_(a)},[t("i",{class:d(["fa-fw me-2",a.icon])},null,2),c(l(a.title),1)],10,W)])),64))]),t("div",X,[t("div",null,[(s(),o(T,null,[(s(),o(g(n.value),{player:e.player},null,8,["player"]))],1024))])])])])]),_:1}))}};export{mt as default};