import p from"./AppLayout-84326281.js";import{s as h,o as n,c as m,w as l,a as t,b,f as y,e as c,i as v,t as e,n as f,F as k,O as B}from"./app-c753a372.js";import"./Banner-9a1a5b09.js";import"./Sidebar-ad1e64fb.js";import"./Header-a95cc538.js";import"./DropdownLink-ade22c32.js";const T={class:"row"},g={class:"col-12"},C={class:"card m-b-30"},L={class:"card-header"},P=t("h4",{class:"pl-4"},"Players",-1),w={class:"card-header-right"},x={class:"card-body"},N={class:"table-rep-plugin"},O={class:"table-responsive b-0","data-pattern":"priority-columns"},S={id:"tech-companies-1",class:"table table-striped"},D=t("thead",null,[t("tr",null,[t("th",null,"Team Name"),t("th",null,"Gender"),t("th",null,"Start Date"),t("th",null,"End Date"),t("th",null,"Status")])],-1),V=["onClick"],z={__name:"Teams",props:{player:{type:Object,required:!0},teams:{type:Object,required:!0}},setup(r){const i=r,d=a=>{const o={status:a.pivot.status==="Primary"?"Guest":"Primary"};confirm("Are you sure you want to update the status?")&&B.post(route("club.players.teams.update-status",[i.player.id,a.id]),o)};return(a,u)=>{const o=h("BackToList");return n(),m(p,{title:"Players"},{default:l(()=>[t("div",T,[t("div",g,[t("div",C,[t("div",L,[P,t("div",w,[b(o,{backToListRoute:a.route("club.players.index")},{default:l(()=>[y(" Back")]),_:1},8,["backToListRoute"])])]),t("div",x,[t("div",N,[t("div",O,[t("table",S,[D,t("tbody",null,[(n(!0),c(k,null,v(r.teams,(s,_)=>(n(),c("tr",{key:_},[t("td",null,e(s.name),1),t("td",null,e(s.gender),1),t("td",null,e(s.start_date),1),t("td",null,e(s.end_date),1),t("td",null,[t("button",{class:f(["btn",s.pivot.status==="Primary"?"btn-success":"btn-info"]),onClick:j=>d(s)},e(s.pivot.status),11,V)])]))),128))])])])])])])])])]),_:1})}}};export{z as default};
