import b from"./AppLayout-02ff6c6d.js";import{s as r,o as a,c as p,w as d,a as t,t as s,b as l,f as u,x as f,e as i,i as g,F as k}from"./app-d1115d7c.js";import"./Banner-95ea4352.js";import"./Sidebar-340361d0.js";import"./Header-e1301bb1.js";import"./DropdownLink-c65e5ef3.js";const v={class:"row"},B={class:"col-12"},y={class:"card m-b-30"},L={class:"card-header"},P=t("h4",{class:"ml-4"},"Players",-1),w={class:"mb-0"},N={class:"card-header-right"},$={class:"card-body"},A={class:"table-rep-plugin"},S={class:"table-responsive b-0","data-pattern":"priority-columns"},x={id:"tech-companies-1",class:"table table-striped"},D=t("thead",null,[t("tr",null,[t("th",null,"Photo"),t("th",null,"First Name"),t("th",null,"Last Name"),t("th",null,"Status"),t("th",null,"Parent Name"),t("th",null,"Parent Email"),t("th",null,"Parent Phone"),t("th",null,"Actions")])],-1),F=t("td",null,"-",-1),T={key:0,class:"badge badge-success"},V={key:1,class:"badge badge-info"},j=["href"],q={class:"btn-group btn-group-sm ml-auto menu-actions align-self-center"},H={__name:"Index",props:{players:{type:Object,required:!0},team:{type:Object,required:!0}},setup(n){return(o,C)=>{const c=r("AddButton"),m=r("ShowButton"),_=r("DeleteButton");return a(),p(b,{title:"Players"},{default:d(()=>[t("div",v,[t("div",B,[t("div",y,[t("div",L,[P,t("p",w,s(n.team.name),1),t("div",N,[l(f,{backToListRoute:o.route("club.teams.index")},{default:d(()=>[u(" Back")]),_:1},8,["backToListRoute"]),l(c,{routeLink:o.route("club.teams.players.add",n.team.id),class:"btn btn-success ml-1"},{default:d(()=>[u(" Add Players ")]),_:1},8,["routeLink"])])]),t("div",$,[t("div",A,[t("div",S,[t("table",x,[D,t("tbody",null,[(a(!0),i(k,null,g(n.players,(e,h)=>(a(),i("tr",{key:h},[F,t("td",null,s(e.user.first_name),1),t("td",null,s(e.user.last_name),1),t("td",null,[e.pivot.status==="Primary"?(a(),i("span",T,"Primary")):(a(),i("span",V,"Guest"))]),t("td",null,s(`${e.guardian.user.first_name} ${e.guardian.user.last_name}`),1),t("td",null,[t("a",{href:`mailto:${e.guardian.user.email}`},s(e.guardian.user.email),9,j)]),t("td",null,s(e.guardian.phone),1),t("td",null,[t("div",q,[l(m,{routeLink:o.route("club.players.show",e.id)},null,8,["routeLink"]),l(_,{routeLink:o.route("club.teams.players.delete",[n.team.id,e.id])},null,8,["routeLink"])])])]))),128))])])])])])])])])]),_:1})}}};export{H as default};
