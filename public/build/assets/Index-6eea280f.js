import b from"./AppLayout-9cef5a10.js";import{s as i,o as s,c as p,w as d,a as t,b as o,g as u,x as g,e as l,j as f,t as a,F as k}from"./app-365665b1.js";import"./Banner-4d349501.js";import"./Sidebar-ace67fa3.js";import"./Header-5ba95090.js";import"./DropdownLink-226527ff.js";const v={class:"row"},B={class:"col-12"},y={class:"card m-b-30"},L={class:"card-header"},P=t("h4",{class:"pl-4"},"Players",-1),w={class:"card-header-right"},N={class:"card-body"},$={class:"table-rep-plugin"},A={class:"table-responsive b-0","data-pattern":"priority-columns"},S={id:"tech-companies-1",class:"table table-striped"},j=t("thead",null,[t("tr",null,[t("th",null,"Photo"),t("th",null,"First Name"),t("th",null,"Last Name"),t("th",null,"Status"),t("th",null,"Parent Name"),t("th",null,"Parent Email"),t("th",null,"Parent Phone"),t("th",null,"Actions")])],-1),x=t("td",null,"-",-1),D={key:0,class:"badge badge-success"},F={key:1,class:"badge badge-info"},T=["href"],V={class:"btn-group btn-group-sm ml-auto menu-actions align-self-center"},z={__name:"Index",props:{players:{type:Object,required:!0},team:{type:Object,required:!0}},setup(r){return(n,q)=>{const c=i("AddButton"),_=i("ShowButton"),m=i("DeleteButton");return s(),p(b,{title:"Players"},{default:d(()=>[t("div",v,[t("div",B,[t("div",y,[t("div",L,[P,t("div",w,[o(g,{backToListRoute:n.route("club.teams.index")},{default:d(()=>[u(" Back")]),_:1},8,["backToListRoute"]),o(c,{routeLink:n.route("club.teams.players.add",r.team.id),class:"btn btn-success ml-1"},{default:d(()=>[u(" Add Players ")]),_:1},8,["routeLink"])])]),t("div",N,[t("div",$,[t("div",A,[t("table",S,[j,t("tbody",null,[(s(!0),l(k,null,f(r.players,(e,h)=>(s(),l("tr",{key:h},[x,t("td",null,a(e.user.first_name),1),t("td",null,a(e.user.last_name),1),t("td",null,[e.pivot.status==="Primary"?(s(),l("span",D,"Primary")):(s(),l("span",F,"Guest"))]),t("td",null,a(`${e.guardian.user.first_name} ${e.guardian.user.last_name}`),1),t("td",null,[t("a",{href:`mailto:${e.guardian.user.email}`},a(e.guardian.user.email),9,T)]),t("td",null,a(e.guardian.phone),1),t("td",null,[t("div",V,[o(_,{routeLink:n.route("club.players.show",e.id)},null,8,["routeLink"]),o(m,{routeLink:n.route("club.teams.players.delete",[r.team.id,e.id])},null,8,["routeLink"])])])]))),128))])])])])])])])])]),_:1})}}};export{z as default};