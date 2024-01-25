import b from"./AppLayout-2ba53a5a.js";import{o as a,c as p,w as r,a as t,b as d,f as v,C as g,e as l,F as c,i as u,t as s,D as y,E as f,n as k,O as w}from"./app-dd2b0e3a.js";import"./Banner-768fdd17.js";import"./Sidebar-609d95c6.js";import"./Header-b562610d.js";import"./DropdownLink-b79c5867.js";const L={class:"row"},C={class:"col-12"},$={class:"card m-b-30"},E={class:"card-header"},A=t("h4",{class:"pl-2"},"Events",-1),N={class:"card-header-right"},x={class:"card-body"},B={key:0,class:"table-rep-plugin"},D={class:"table-responsive b-0","data-pattern":"priority-columns"},T={id:"tech-companies-1",class:"table"},V=t("thead",null,[t("tr",null,[t("th",null,"Name"),t("th",null,"Price"),t("th",null,"StartingAt"),t("th",null,"EndingAt"),t("th",null,"Teams"),t("th",null,"Actions")])],-1),F=["data-target"],O={class:"btn-group btn-group-sm ml-auto menu-actions align-self-center"},S=["onClick"],M=t("i",{class:"fa fa-trash"},null,-1),j=[M],q={class:"modal-dialog modal-lg"},z={class:"modal-content"},I=t("div",{class:"modal-header"},[t("h5",{class:"modal-title mt-0",id:"myLargeModalLabel"}," Teams "),t("button",{type:"button",class:"close","data-dismiss":"modal","aria-label":"Close"},[t("span",{"aria-hidden":"true"},"×")])],-1),P={class:"modal-body"},G={class:"table-responsive b-0","data-pattern":"priority-columns"},H={id:"teams-table",class:"table table-xs table-striped"},J=t("thead",null,[t("tr",null,[t("th",null,[t("strong",null,"Team Name")]),t("th",null,[t("strong",null,"Start Date")]),t("th",null,[t("strong",null,"End Date")])])],-1),K=t("div",{class:"modal-footer"},[t("button",{type:"button",class:"btn btn-secondary","data-dismiss":"modal"}," Close ")],-1),Q={key:1},R=t("p",{class:"text-center"},"No Events Found. Click Add button to create a new Event.",-1),U=[R],at={__name:"Index",props:{camps:{type:Object,required:!0}},setup(i){const _=o=>{confirm("Are you sure you want to delete this event?")&&w.delete(route("club.camps.destroy",o))};return(o,W)=>(a(),p(b,{title:"Camps"},{default:r(()=>[t("div",L,[t("div",C,[t("div",$,[t("div",E,[A,t("div",N,[d(g,{routeLink:o.route("club.camps.create")},{default:r(()=>[v(" Add")]),_:1},8,["routeLink"])])]),t("div",x,[i.camps.data.length?(a(),l("div",B,[t("div",D,[t("table",T,[V,t("tbody",null,[(a(!0),l(c,null,u(i.camps.data,(e,h)=>(a(),l("tr",{key:h},[t("td",null,s(e.name),1),t("td",null,"$"+s(e.price),1),t("td",null,s(e.start_date),1),t("td",null,s(e.end_date),1),t("td",null,[t("button",{type:"button",class:"btn btn-primary waves-effect waves-light","data-toggle":"modal","data-target":`.teams-modal-${e.id}`}," View ("+s(e.teams_count)+") ",9,F)]),t("td",null,[t("div",O,[d(y,{routeLink:o.route("club.camps.show",e.id)},null,8,["routeLink"]),d(f,{routeLink:o.route("club.camps.edit",e.id)},null,8,["routeLink"]),t("button",{type:"button",class:"btn btn-danger btn-sm waves-effect waves-light",onClick:n=>_(e.id)},j,8,S)])]),t("div",{class:k(["modal fade",`teams-modal-${e.id}`]),tabindex:"-1",role:"dialog","aria-labelledby":"myLargeModalLabel","aria-hidden":"true"},[t("div",q,[t("div",z,[I,t("div",P,[t("div",G,[t("table",H,[J,t("tbody",null,[(a(!0),l(c,null,u(e.teams,(n,m)=>(a(),l("tr",{key:m},[t("td",null,s(n.name),1),t("td",null,s(n.start_date),1),t("td",null,s(n.end_date),1)]))),128))])])])]),K])])],2)]))),128))])])])])):(a(),l("div",Q,U))])])])])]),_:1}))}};export{at as default};
