import u from"./AppLayout-b2e8a778.js";import{o as a,c as _,w as l,a as t,e as r,i as m,t as s,b as n,f as i,u as h,l as p,C as b,F as f}from"./app-7a8b179d.js";import"./Banner-b93de5fb.js";import"./Sidebar-634d55e0.js";import"./Header-0425138d.js";import"./DropdownLink-acdd1c4a.js";const v={class:"row"},y={class:"col-12"},g={class:"card m-b-30"},k=t("div",{class:"card-header"},[t("h4",{class:"pl-2"},"Players")],-1),B={class:"card-body"},N={class:"table-rep-plugin"},w={class:"table-responsive b-0","data-pattern":"priority-columns"},L={id:"tech-companies-1",class:"table table-striped"},x=t("thead",null,[t("tr",null,[t("th",null,"First Name"),t("th",null,"Last Name"),t("th",null,"Date of Birth"),t("th",null,"Teams"),t("th",null,"Actions")])],-1),F={class:"btn-group btn-group-sm ml-auto menu-actions align-self-center"},j={__name:"Index",props:{players:{type:Object,required:!0}},setup(c){return(o,T)=>(a(),_(u,{title:"Players"},{default:l(()=>[t("div",v,[t("div",y,[t("div",g,[k,t("div",B,[t("div",N,[t("div",w,[t("table",L,[x,t("tbody",null,[(a(!0),r(f,null,m(c.players,(e,d)=>(a(),r("tr",{key:d},[t("td",null,s(e.user.first_name),1),t("td",null,s(e.user.last_name),1),t("td",null,s(e.birth_date),1),t("td",null,[n(h(p),{href:o.route("club.players.teams",e.id)},{default:l(()=>[i("Teams ("+s(e.teams_count)+")",1)]),_:2},1032,["href"])]),t("td",null,[t("div",F,[n(b,{routeLink:o.route("club.players.details",e.id)},{default:l(()=>[i("Show")]),_:2},1032,["routeLink"])])])]))),128))])])])])])])])])]),_:1}))}};export{j as default};
